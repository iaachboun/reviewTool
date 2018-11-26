<template>
    <div>
        <main>
            <div class="reviewGedeelte">
                <div v-for="data in reviews" class="goedkeuren" v-if="data.status === 1">
                    <p class="review-text">{{data.review}}</p>
                    <button class="btn blue" id="uploadReview" @click=" getPuppeteer(); changeStatus(data.id);">Plaats review</button>
                    <button class="btn red" @click="deleteFromPage(data.id)"><i class="fas fa-times"></i></button>
                </div>
                <div class="centerData">
                    <p class="amountReviews">Gekeurde reviews: {{aantalReviews}}</p>
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
            //delete button
            deleteFromPage(id) {
                this.$http.put(`http://review-backend.test/api/update/${id}`, {
                    review: 'deleted file',
                    status: 2,
                }).then(function () {
                    location.reload()
                });
            }
        },
        created() {
            setTimeout(this.getAantal, 100)
        },
    }
</script>
<style>

</style>