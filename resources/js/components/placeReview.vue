<template>
<p>testestest</p>
</template>

<script>
    var axios = require('axios')
    axios.get('https://api.github.com/users/codeheaven-io');

    function placeReview() {
        axios.get('http://review-backend.test/api/placeReview')
            .then(function (response) {
                let reviewData = response.data;
                console.log(response.data);
                console.log(response.status);
                page.type('[name="eigenwoorden"]', reviewData + "lol");
            });
    }
    placeReview();
    console.log('lol');



    export default {
        name: "place-review"


    }
</script>

<style scoped>

</style>
