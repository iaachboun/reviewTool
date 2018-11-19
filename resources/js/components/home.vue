<template>
    <div>
        <main>
            <div class="center">
                <h1 class="center-title">Account aanmaken<span class="gradient">?</span></h1>
                <button @click="getPuppeteer()" class="button">Account aanmaken</button>
            </div>
        </main>
    </div>
</template>

<script>
    import axios from "axios"
    export default {
        data() {
            return {}
        },

        methods: {
            getPuppeteer() {
                axios.get('http://localhost:8080/echo');
            },
        }
    }
</script>

<style>

</style>