<template>
    <div>
        <main>
            <div class="reviewGedeelte">
                <div v-if="false" v-for="data in reviews" class="goedkeuren">
                    <p>{{data.status}}</p>
                    <p>{{data.review}}</p>
                    <p>{{data.source}}</p>
                </div>
            </div>
            <div class="center">
                <h1 class="center-title">Review plaatsen<span class="gradient">?</span></h1>
                <button @click="getPuppeteer()" class="button">Plaats review</button>
            </div>
        </main>
    </div>
</template>

<script>
    import axios from "axios"

    export default {
        props: ['reviews'],
        data() {
            return {
                false: false,
                true: true
            }
        },

        methods: {
            getPuppeteer() {
                axios.get('http://localhost:8080/echo');
            },
        }
    }
</script>