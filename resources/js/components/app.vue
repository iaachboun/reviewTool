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
                        <button @click="getReviews()" class="nav-item-button">Edit review</button>
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
            getLoginGegevens() {
                axios.get('http://review-backend.test/api/post')
                    .then(response => {
                        this.inlogGegevens = response.data.data;
                        this.$router.push({path: 'review'});

                    });
            },

            getReviews() {
                axios.get('http://review-backend.test/api/reviewData')
                    .then(response => {
                        this.reviews= response.data.data;
                        this.$router.push({path: 'review'});
                        console.log(response.data.data[0].review)
                    });
            },
        }
    }
</script>

<style>
    .nav-item-button{
        color: white;
        border: none;
        background: none;
        cursor: pointer;
        font-size: inherit;
    }

    header{
        top: 0;
        position: fixed;
        z-index: 2;
    }

</style>
