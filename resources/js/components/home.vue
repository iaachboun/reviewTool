<template>
    <div>
        <main>
            <div class="reviewGedeelte">
                <div v-for="data in reviews" class="goedkeuren">
                    <p>{{data.status}}</p><p>{{data.review}}</p>
                    <p>{{data.source}}</p>
                </div>
            </div>
            <div class="center">
                <h1 class="center-title">Review plaatsen<span class="gradient">?</span></h1>
                <button @click="getPuppeteer()" class="button">Review Plaatsen</button>
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
                goedgekeurd: false
            }
        },

        methods: {
            getPuppeteer() {
                axios.get('http://localhost:8080/echo');
            },
        }
    }
</script>
