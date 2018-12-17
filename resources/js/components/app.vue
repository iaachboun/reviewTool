<template>
    <div>
        <header>
            <router-link to="/" class="title">Review tool</router-link>
            <nav>
                <ul>
                    <li>
                        <a href='/' class="nav-item">Review plaatsen</a>
                        <div class="hover_stripe"></div>
                    </li>
                    <li>
                        <router-link to="/review" class="nav-item">Review toevoegen</router-link>
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
            reFresh() {
                location.reload()
            },

            getReviews() {
                axios.get('http://review-tool.test/api/reviewData')
                    .then(response => {
                        this.reviews = response.data.data;
                    });
            },
        },

        //reloads alleen Review plaatsen wanneer je ernaar toe gaat
        watch: {
            '$route'(to) {
                if (to.path === '/') {
                    location.reload();
                }
            }
        },

        created() {
            this.getReviews();
        },
    }
</script>
