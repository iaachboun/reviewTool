<template>
    <div>
        <header>
            <router-link to="/" class="title">Review tool</router-link>
            <nav>
                <ul>
                    <li>
                        <router-link to="/" class="nav-item">Review plaatsen</router-link>
                        <div class="hover_stripe"></div>
                    </li>
                    <li>
                        <router-link to="/review" class="nav-item">Review plaatsen</router-link>
                        <div class="hover_stripe"></div>
                    </li>
                </ul>
            </nav>
        </header>
        <main>
            <router-view v-bind:reviews="reviews"></router-view>
        </main>
    </div>
</template>

<script>
    import axios from "axios"

    export default {
        data() {
            return {
                reviews: [],
                inlogGegevens: [],
                aantalReviews: ''
            }
        },
        methods: {
            getAantal() {
                this.aantalReviews = document.querySelectorAll('.goedkeuren').length;
            },
            getReviews() {
                axios.get('https://review.test/#/review')
                    .then(response => {
                        this.reviews = response.data.data;
                    });
            },
        },
        mounted() {
            this.getReviews();
        },
        created() {
            setTimeout(this.getAantal, 100)
        },

    }
</script>
