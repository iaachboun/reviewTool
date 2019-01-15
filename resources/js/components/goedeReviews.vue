<template>
    <div>
        <p class="review-text"
           onclick='this.style.height = ""; this.style.height = this.scrollHeight + "px"'>
            {{data.review}}</p>
        <button class="btn blue" id="uploadReview" @click="plaatsReview()">Plaats review</button>
        <button class="btn red" @click="deleteFromPage(data.id)"><i class="fas fa-times"></i></button>
    </div>
</template>

<script>
    import axios from "axios"
    import {goTrue} from '../events/events';

    export default {
        props: ['data'],
        data() {
            return {
                blauwX: '',
                blauwY: ''
            }
        },
        methods: {
            reFresh(id) {
                const saveReviewList = this.$parent.reviews.filter(review => review.id !== id);
                this.$parent.reviews = saveReviewList;
            },

            ClickBlauwOnce() {
                this.blauwX = event.clientX;
                this.blauwY = event.clientY;
                this.plaatsReview().then(function () {
                    location.reload().then(function () {
                        document.elementFromPoint(this.blauwX, this.blauwY).click();
                    });
                });
            },

            plaatsReview() {
                goTrue.$emit('recaptcha');
                img.setAttribute('src', '/assets/img/default.gif');
                axios.post('http://review-tool.test/api/selectedreview', {review: this.data.review})
                    .then(function (response) {
                        console.log(response);
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
        },

    }
</script>
