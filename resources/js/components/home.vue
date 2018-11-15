<template>
    <div>
        <main>
            <div class="center">
                <h1 class="center-title">Account aanmaken<span class="gradient">?</span></h1>
                <button @click="usePuppeteer()" class="button">Account aanmaken</button>
            </div>
        </main>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                registreren: require("../pptr-auto/Scripts/Registreren.js")

            }
        },
    }
</script>

<style>

</style>