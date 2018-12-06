<template>
    <div>
        <p class="review-text"
           onclick='this.style.height = ""; this.style.height = this.scrollHeight + "px"'>
            {{data.review}}</p>
        <button class="btn blue" id="uploadReview" @click="plaatsReview(data.review)">Plaats review</button>
        <button class="btn red" @click="deleteFromPage(data.id)"><i class="fas fa-times"></i></button>
    </div>
</template>

<script>
    import axios from "axios"

    export default {
        props: ['data'],

        methods: {
            reFresh(id) {
                const saveReviewList = this.$parent.reviews.filter(review => review.id !== id);
                this.$parent.reviews = saveReviewList;
            },

            //make reviews
            makeReview() {
                axios.get('http://localhost:3306/echo/getReviews');
            },

            plaatsReview(review) {
                console.log(review);
                axios.post(`http://review-tool.test/api/selectedReview`, { review })
                    .then(function (response) {
                        console.log(response.data)
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

            //delete button
            deleteFromPage(id) {
                this.$http.put(`http://review-tool.test/api/update/${id}`, {
                    review: 'deleted file',
                    status: 2,
                }).then(function () {
                    this.reFresh(id)
                });
            }
        }
    }
</script>
