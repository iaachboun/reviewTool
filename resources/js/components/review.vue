<template>
    <div class="review-container">
        <div class="reviewGedeelte">
            <div v-for="data in reviews" class="goedkeuren" v-if="data.status === 0">
                <textarea id="reviewText" class="review-text">{{data.review}}</textarea>
                <button class="btn green" @click="changeStatus(data.id)"><i class="fas fa-check"></i></button>
                <button class="btn red" @click="deleteFromPage(data.id)"><i class="fas fa-times"></i></button>
            </div>
        </div>
        <div class="center">
            <h1 class="center-title">Get more reviews<span class="gradient">?</span></h1>
            <button @click="getReviews" class="button">Get more</button>
        </div>
        <div class="centerData">
            <p class="amountReviews">Amount of reviews: {{aantalReviews}}</p>
        </div>
    </div>
</template>

<script>
    import axios from "axios"

    export default {
        props: ['reviews'],

        data() {
            return {
                reviewTekst: this.reviews.review,
                aantalReviews: ''

            }
        },

        methods: {
            getAantal() {
                this.aantalReviews = document.querySelectorAll('.goedkeuren').length;
                console.log(this.aantalReviews)
            },

            getReviews() {
                axios.get('http://localhost:8080/echo/getReviews');
            },
            //add button
            changeStatus(id) {
                this.$http.put(`http://review-backend.test/api/update/${id}`, {
                    review: "hoi mpp",
                    status: 1,
                }).then(function () {
                    location.reload();
                });
            },
            //delete button
            deleteFromPage(id) {
                this.$http.put(`http://review-backend.test/api/update/${id}`, {
                    review: 'Deleted review',
                    status: 2,
                }).then(function () {
                    location.reload()
                });
            }
        },

        mounted() {
            setTimeout(this.getAantal, 100)
        },

    }
</script>

<style>
    .centerData {
        position: fixed;
        top: 35%;
        right: 122%;
        margin-right: -50%;
        -webkit-transform: translate(-50%, -45%);
        transform: translate(-50%, -45%);
        width: 250px;
        height: 56px;
        border-radius: 5px;
        background-color: #3b3b3b;
        text-align: center;
    }
</style>