<template>
    <div class="review-container">
        <div class="reviewGedeelte" v-for="data in reviews">
            <editReview v-bind:data="data"></editReview>
        </div>
        <div class="center">
            <h1 class="center-title">Get more reviews<span class="gradient">?</span></h1>
<<<<<<< HEAD
            <button @click="makeReviews" class="button">Get more</button>
=======
            <button @click="getReviews" class="button">Get more</button>
        </div>
        <div class="centerData">
            <p class="amountReviews">Ongekeurde reviews: {{aantalReviews}}</p>
>>>>>>> a0d30fd8682dd49317bce8176f5074d32e9ed367
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
                axios.get('http://localhost:3306/echo/getReviews');
            },
        
            //add button
            changeStatus(id) {
                this.$http.put(`http://review-tool.test/api/update/${id}`, {
                    status: 1,
                }).then(function () {
                    location.reload();
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
