<template>
    <div class="review-container">
        <div class="reviewGedeelte">
            <div v-for="data in reviews" class="goedkeuren">
                <textarea class="review-text">{{data.review}}</textarea>
                <button class="btn green"><i class="fas fa-check"></i></button>
                <button class="btn red"><i class="fas fa-times"></i></button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['reviews'],
}
</script>