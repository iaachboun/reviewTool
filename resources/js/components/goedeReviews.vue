<template>
    <div>
        <p class="review-text"
           onclick='this.style.height = ""; this.style.height = this.scrollHeight + "px"'>
            {{data.review}}</p>
        <button class="btn blue" id="uploadReview" @click="plaatsReview">Plaats
            review
        </button>
        <button class="btn red" @click="deleteFromPage(data.id)"><i class="fas fa-times"></i></button>
    </div>
</template>

<script>
    import axios from "axios"

    export default {
        props: ['data'],

        methods: {
            //make review
            makeReview() {
                axios.get('http://localhost:3306/echo/getReviews');
            },

            plaatsReview() {
                axios.get('http://localhost:3306/echo/formInvullen');
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
        }
    }
</script>