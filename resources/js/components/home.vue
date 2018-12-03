<template>
    <div>
        <div class="reviewGedeelte">
            <div v-for="data in reviews" class="goedkeuren" v-if="data.status === 1">
                <goedeReviews v-bind:data="data"> hello</goedeReviews>
            </div>
            <div class="centerData">
                <p class="amountReviews">Gekeurde reviews: {{aantalReviews}}</p>
            </div>
        </div>
    </div>
</template>

<script>
    import goedeReviews from "../components/goedeReviews"
    import axios from "axios"

    export default {
        props: ['reviews'],
        components: {
            'goedeReviews': goedeReviews,
        },

        data() {
            return {
                aantalReviews: 'test'
            }
        },

        methods: {
            getAantal() {
                this.aantalReviews = document.querySelectorAll('.goedkeuren').length;
                console.log(this.aantalReviews);
            },
            getPuppeteer(place) {
                axios.post('http://review-tool.test/api/placeReview', {place: place})
                    .then(function (response) {
                        console.log(place);
                    })


                /*axios.get('http://review-backend.test/api/reviewData/')
                    .then(function (response) {
                    console.log(response.data);
                    console.log(response.status);
                    console.log(id)
                });*/
            },
        },
        mounted() {
            setTimeout(this.getAantal, 100)
        },
    }
</script>
<style>

</style>
