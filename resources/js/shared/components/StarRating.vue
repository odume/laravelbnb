<template>
    <div class="d-flex">
        <i class="fas fa-star" v-for="star in fullStars" :key="'full' + star"></i>
        <i class="fas fa-star-half-alt" v-if="halfStar"></i>
        <i class="far fa-star" v-for="star in emptyStars" :key="'empty' + star"></i>
    </div>
</template>

<script>
export default {
    props: {
        rating: Number,
    },

    computed: {
        // 3.5 -> 4 stars
        // 3.6 -> 4 stars
        // 3.2 -> 3.5 stars
        // 3.0 -> 3 stars
        halfStar() {
            const fraction = Math.round((this.rating - Math.floor(this.rating)) * 100);
            return fraction > 0 && fraction < 50;
        },
        fullStars() {
            return Math.round(this.rating);
        },
        emptyStars() {
            return 5 - Math.ceil(this.rating);
        }
    },
}
</script>
