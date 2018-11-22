<template>
    <div>
        <main>
            <div class="reviewGedeelte">
                <div v-for="data in reviews" class="goedkeuren" v-if="data.status === 1">
                    <p class="review-text">{{data.review}}</p>
                    <button class="btn green" id="uploadReview" @click=" getPuppeteer(); changeStatus(data.id);">Plaats review</button>
                </div>
                <div class="centerData">
                    <p class="amountReviews">Amount of reviews: {{aantalReviews}}</p>
                </div>
            </div>

        </main>
    </div>
</template>

<script>
    import axios from "axios"

    export default {
        props: ['reviews'],

        data() {
            return {
                aantalReviews: ''
            }
        },

        methods: {
            getAantal() {
                this.aantalReviews = document.querySelectorAll('.goedkeuren').length;
                console.log(this.aantalReviews)
            },
            getPuppeteer() {
                axios.get('http://localhost:8080/echo/formInvullen');
            },
        },
        mounted() {
            setTimeout(this.getAantal, 100)
        },
    }
</script>
<style>
    .centerData {
        color: white;
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
    #uploadReview{
        width: 100%;
    }
</style>