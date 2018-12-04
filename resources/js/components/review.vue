<template>
    <div class="review-container">
        <div class="reviewGedeelte" v-for="data in reviews">
            <editReview v-bind:data="data"></editReview>
        </div>
        <div class="center">
            <h1 class="center-title">Get more reviews<span class="gradient">?</span></h1>
            <button @click="makeReview" class="button">Get more</button>
        </div>
        <div class="centerData">
            <p class="amountReviews">Ongekeurde reviews: {{aantalReviews}}</p>
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

        data() {
            return {
                reviews: [],
                aantalReviews: '',
                data: [],
                test: 'test',
            }
        },

        methods: {
            //make review
            makeReview() {
                axios.get('http://localhost:8000/echo/getReviews');
            },

            getReviews() {
                axios.get('http://review-tool.test/api/reviewData')
                    .then(response => {
                        const reviews = response.data.data.filter(item => item.review !== null);
                        this.reviews = reviews;
                    });
            },
            getAantal() {
                this.aantalReviews = document.querySelectorAll('.goedkeuren').length;
            },

        },
        mounted() {
            this.getReviews();
            setTimeout(this.getAantal, 100);
        },

    }
</script>
