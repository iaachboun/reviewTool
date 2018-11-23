<template>
    <div class="review-container">
        <div class="reviewGedeelte">
            <div v-for="data in reviews" class="goedkeuren" v-if="data.review && data.status === 0">
                <div v-if="data.review">
                    <textarea id="reviewText" class="review-text">{{data.review}}</textarea>
                    <button class="btn green" @click=" changeStatus(data.id); save();"><i class="fas fa-check"></i></button>
                    <button class="btn red" @click="deleteFromPage(data.id)"><i class="fas fa-times"></i></button>
                </div>
            </div>
        </div>
        <div class="center">
            <h1 class="center-title">Get more reviews<span class="gradient">?</span></h1>
            <button @click="getReviews" class="button">Get more</button>
        </div>
        <div class="centerData">
            <p class="amountReviews">Ongekeurde reviews: {{aantalReviews}}</p>
        </div>
    </div>
</template>
<script>
    import axios from "axios"

    export default {
        props: ['reviews'],
        data() {
            return {
                updatedReview: '',
                title: 'hello',
                aantalReviews: '',
                form: {
                    title: ''
                }

            }
        },
        methods: {
            save() {
                this.$emit('save', this.form)
            },
            getAantal() {
                this.aantalReviews = document.querySelectorAll('.goedkeuren').length;

            },

            changeReview(id) {
                this.updatedReview = document.querySelectorAll('#reviewText')[0].innerHTML
            },
            getReviews() {
                axios.get('http://localhost:8080/echo/getReviews');
                location.reload();
            },
            //add button
            changeStatus(id) {
                this.$http.put(`http://review-backend.test/api/update/${id}`, {
                    review: this.form.title,
                    status: 1,
                }).then(function () {
                    location.reload();
                });
            },
            //delete button
            deleteFromPage(id) {
                this.$http.put(`http://review-backend.test/api/update/${id}`, {
                    status: 2,
                }).then(function () {
                    location.reload()
                });
            }
        },
        mounted() {
            this.form.title = this.title;
            this.changeReview
        },
        created() {
            setTimeout(this.getAantal, 100);

        },
    }
</script>
