<template>
    <div class="review-container">
        <div class="reviewGedeelte">
            <div v-for="data in reviews" class="goedkeuren">
                <p>{{data.status}}</p><p>{{data.review}}</p>
                <p>{{data.source}}</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['reviews'],

}
</script>