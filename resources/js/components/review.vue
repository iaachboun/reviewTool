<template>
    <div class="review-container">
        <div class="reviewGedeelte">
           <editReview v-if="reviews.length > 0" v-bind:data="firstItem"></editReview>
            <p v-else class="error">Er zijn geen reviews , klik rechts op GET MORE voor meer reviews</p>
        </div>
        <div class="center">
            <h1 class="center-title">Get more reviews<span class="gradient">?</span></h1>
            <button @click="makeReviews" class="button">Get more</button>
        </div>
    </div>
</template>
<script>
    import editReview from "../components/editReview"
    import axios from "axios"

    export default {
        props: ['reviews'],
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
                data: [],
                test: 'test',
            }
        },

        methods: {
            getAantal() {
                this.aantalReviews = document.querySelectorAll('.goedkeuren').length;
            },

            getReviews() {
                axios.get('http://review-tool.test/api/reviewData')
                    .then(response => {
                        const reviews = response.data.data.filter(item => item.review !== null && item.status === 0);
                        this.reviews = reviews;
                    });
            },

            makeReviews() {
                axios.post('http://review-tool.test/api/moreReviews');
            },

            //add button
            changeStatus(id) {
                this.$http.put(`http://review-tool.test/api/update/${id}`, {
                    status: 1,
                });
            },

            //delete button
            deleteFromPage(id) {
                this.$http.put(`http://review-tool.test/api/update/${id}`, {
                    review: 'deleted file',
                    status: 2,
                });
            }
        },
        mounted() {
            this.getReviews();
        },
    }
</script>
