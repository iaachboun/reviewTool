<template>
    <div>
        <div class="goedkeuren" v-if="data.review && data.status === 0">
            <textarea v-model="form.title" id="reviewText" onclick='this.style.height = ""; this.style.height = this.scrollHeight + "px"'
                      class="review-text">{{data.review}}</textarea>
            <button class="btn green" @click=" changeStatus(data.id); save();"><i class="fas fa-check"></i></button>
            <button class="btn red" @click="deleteFromPage(data.id)"><i class="fas fa-times"></i></button>
        </div>

    </div>
</template>

<script>
    export default {
        props: ['data'],

        data() {
            return {
                title: this.data.review,
                aantalReviews: '',
                form: {
                    title: ''
                }
            }
        },

        methods:{
            save() {
                this.$emit('save', this.title)
            },

            //add button
            changeStatus(id) {
                console.log(id);
                this.$http.put(`http://review-backend.test/api/update/${id}`, {
                    review: this.form.title,
                    status: 1,
                }).then(function () {
                    location.reload();
                });
            },
            //delete button
            deleteFromPage(id) {
                this.$http.put(`http://review-backend.test/api/delete/${id}`, {
                    status: 2,
                }).then(function () {
                    location.reload()
                });
            }
        },

        mounted() {
            this.form.title = this.title;
        },
    }
</script>