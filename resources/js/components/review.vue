<template>
    <div class="review-container">
        <div class="reviewGedeelte">
            <editReview v-if="reviews.length > 0" v-bind:data="firstItem"></editReview>
            <p v-else class="error">Er zijn geen reviews , klik rechts op GET MORE voor meer reviews</p>
        </div>
        <div class="center">
            <h1 class="center-title">Get more reviews<span class="gradient">?</span></h1>
            <button @click="makeReview" class="button">Get more</button>
        </div>
        <div class="legendaBox">
            <p class="legenda">Klik op een review om alles te zien of om het te bewerken</p>
        </div>
    </div>
</template>
<script>
    import editReview from "../components/editReview"
    import axios from "axios"

    export default {
        components: {
            'editReview': editReview,
        },
        computed: {
          firstItem() {
              return this.reviews[0];
          }
        },
        data() {
            return {
                reviews: [],
                aantalReviews: '',
                test: 'test',
            }
        },

        methods: {
            //gebruikt puppeteer script om meer reviews te krijgen
            makeReview() {
                axios.get('http://localhost:8000/echo/getReviews');
            },
            //haalt reviews op van database
            getReviews() {
                axios.get('http://review-tool.test/api/reviewData')
                    .then(response => {
                        const reviews = response.data.data.filter(item => item.review !== null && item.status === 0);
                        this.reviews = reviews;
                    });
            },
        },
        mounted() {
            this.getReviews();
        },

    }
</script>

<style>

</style>
