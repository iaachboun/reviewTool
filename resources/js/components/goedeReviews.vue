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
            //refreshed de reviews list zonder pagina te reloaden
            reFresh(id){
                const saveReviewList = this.$parent.reviews.filter(review => review.id !== id);
                this.$parent.reviews = saveReviewList;
            },

            //gebruikt puppeteer script om de review te plaatsen
            plaatsReview() {
                axios.get('http://localhost:8000/echo/formInvullen').then(function () {
                    this.reFresh()
                });
            },

            //veranderd status van review zodat het uitgefilterd wordt
            deleteFromPage(id) {
                this.$http.put(`http://review-tool.test/api/delete/${id}`, {
                    status: 2,
                }).then(function () {
                    this.reFresh(id)
                });
            }
        }
    }
</script>