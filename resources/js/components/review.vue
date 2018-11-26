<template>
    <div class="review-container">
        <div class="reviewGedeelte">
            <div v-for="data in reviews" class="goedkeuren" v-if="data.review && data.status === 0">
                <textarea :input="form.title" id="reviewText" onclick='this.style.height = ""; this.style.height = this.scrollHeight + "px"' class="review-text">{{data.review}}</textarea>
                <button class="btn green" @click=" changeStatus(data.id); save();"><i class="fas fa-check"></i></button>
                <button class="btn red" @click="deleteFromPage(data.id)"><i class="fas fa-times"></i></button>
            </div>
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
    import axios from "axios"

    export default {
        props: ['reviews'],
        data() {
            return {
                updatedReview: '',
                title: '',
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

            getReviews() {
                axios.get('http://localhost:8080/echo/getReviews');
            },
            //add button
            changeStatus(id) {
                console.log(id);
                this.$http.put(`http://review-backend.test/api/update/${id}`, {
                    status: 1,
                }).then(function () {
                    location.reload();
                });
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
        mounted() {
            this.form.title = this.title;
        },
        created() {
            setTimeout(this.getAantal, 100);
        },
    }
</script>

