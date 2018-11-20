<template>
    <div>
        <div class="reviewGedeelte">
            <div v-for="data in reviews" class="goedkeuren">
                <p>{{data.status}}</p><p>{{data.review}}</p>
                <p>{{data.source}}</p>
            </div>
        </div>
        <div class="center">
            <h1 class="center-title">Review Goedkeuren<span class="gradient">?</span></h1>
            <button @click="getPuppeteer()" class="button">Goedkeuren</button>
        </div>
    </div>
</template>

<script>
export default {
    props: ['reviews'],

}
</script>

<style>
    .reviewGedeelte{
        margin: 117px 0 0 20px;
        width: 40%;
        float: left;
        border: 1px solid red;
    }
    .goedkeuren{
        border-bottom: 1px solid white;
    }
</style>