<template>
    <div>
        <header>
            <h1 class="title">Review tool</h1>
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
            }
        },
        methods: {
            getReviews() {
                axios.get('http://review-tool.test/api/reviewData')
                    .then(response => {
                        this.reviews= response.data.data;
                    });
            },
        },
        mounted() {
            this.getReviews();
        }
    }
</script>
