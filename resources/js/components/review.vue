<template>
    <div class="review-container">
        <div class="reviewGedeelte" v-for="data in reviews">
            <editReview v-bind:data="data"></editReview>
        </div>
        <div class="center">
            <h1 class="center-title">Get more reviews<span class="gradient">?</span></h1>
            <button @click="getReviews" class="button">Get more</button>
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
        props: ['reviews'],
        components: {
            'editReview': editReview,
        },
        data() {
            return {
                data: [],
                test: 'test',
            }
        },
        methods: {
            getAantal() {
                this.aantalReviews = document.querySelectorAll('.goedkeuren').length;
            },

            getReviews() {
                axios.get('http://localhost:8080/echo/getReviews');
            },
<<<<<<< HEAD
            //add button
            changeStatus(id) {
                console.log(id);
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
                }).then(function () {
                    location.reload()
                });
            }
        },
        mounted() {
            this.form.title = this.title;
=======

>>>>>>> 610964c38cbd57cafee41443e27b3e7a81480b3d
        },

        created() {
            setTimeout(this.getAantal, 100);
        },
    }
</script>

