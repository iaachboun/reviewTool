<template>
    <div>
        <websocket></websocket>
        <div class="reviewGedeelte">
            <div v-for="data in reviews" class="goedkeuren" v-if="data.status === 1">
                <goedeReviews v-bind:data="data"></goedeReviews>
            </div>
            <p v-if="ifTrue" class="error">Er zijn geen reviews.<br>Ga naar Review toevoegen en klik rechts op GET MORE
                voor meer reviews</p>
        </div>
    </div>
</template>

<script>
    import websocket from "../components/websocket"
    import goedeReviews from "../components/goedeReviews"
    import axios from "axios"

    export default {
        props: ['reviews'],
        components: {
            'websocket': websocket,
            'goedeReviews': goedeReviews,
        },

        data() {
            return {
                ifTrue: false,
                aantalReviews: 'test'
            }
        },

        methods: {
            getAantal() {
                var aantaldite = document.querySelectorAll('.goedkeuren').length;
                if (aantaldite < 1) {
                    this.ifTrue = true;
                }
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

        created() {
            setTimeout(this.getAantal, 1000)
        },
    }
</script>
