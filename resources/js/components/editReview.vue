<template>
    <div>
        <div class="goedkeuren" v-if="data.review && data.status === 0">
            <textarea v-model="data.review" id="reviewText"
                      onclick='this.style.height = ""; this.style.height = this.scrollHeight + "px"'
                      class="review-text">{{data.review}}</textarea>
            <button class="btn green" @click="changeStatus(data.id)"><i class="fas fa-check"></i></button>
            <button class="btn red" @click="deleteFromPage(data.id)"><i class="fas fa-times"></i></button>
        </div>
    </div>
</template>

<script>

    export default {
        props: ['data', 'reviews'],

        data() {
            return {
                title: this.data.review,
                aantalReviews: '',
            }
        },

        methods: {
            reFresh(){
                this.$parent.getReviews();
            },

            //add button
            changeStatus(id) {
                this.$http.put(`http://review-tool.test/api/update/${id}`, {
                    review: this.data.review,
                    status: 1,
                }).then(function () {
                    this.reFresh(id)

                });
            },

            //delete button
            deleteFromPage(id) {
                this.$http.put(`http://review-tool.test/api/delete/${id}`, {
                    status: 2,
                }).then(function () {
                    this.reFresh(id)
                });
            }
        },
    }
</script>
