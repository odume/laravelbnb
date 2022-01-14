<template>
  <div>
    <div v-if="loading">Data is loading ...</div>
    <div v-else>
      <bookable-list-item
        v-for="(bookable, index) in bookables"
        :key="index"
        :title="bookable.title"
        :content="bookable.content"
        :price="bookable.price"
      ></bookable-list-item>
    </div>
  </div>
</template>

<script>
import BookableListItem from "./BookableListItem";

export default {
  components: { BookableListItem },

  data() {
    return {
      bookables: null,
      loading: false,
      colNumber: 3,
    };
  },

  computed: {
    rows() {
      return this.bookables === null ? 0 : Math.ceil(this.bookables.length / this.colNumber);
    },
  },

  created() {
    this.loading = true;
    setTimeout(() => {
      this.bookables = [
        {
          title: "Cheap Villa",
          content: "A very cheap villa",
          price: 2000,
        },
        {
          title: "Expensive Villa",
          content: "A very expensive villa",
          price: 20_000,
        },
        {
          title: "Expensive Villa 2",
          content: "A second expensive villa",
          price: 25_000,
        },
        {
          title: "Expensive Villa 2",
          content: "A second expensive villa",
          price: 25_000,
        },
        {
          title: "Expensive Villa 2",
          content: "A second expensive villa",
          price: 25_000,
        },
        {
          title: "Expensive Villa 2",
          content: "A second expensive villa",
          price: 25_000,
        },
        {
          title: "Expensive Villa 2",
          content: "A second expensive villa",
          price: 25_000,
        },
        {
          title: "Expensive Villa 2",
          content: "A second expensive villa",
          price: 25_000,
        },
        {
          title: "Expensive Villa 2",
          content: "A second expensive villa",
          price: 25_000,
        },
        {
          title: "Expensive Villa 2",
          content: "A second expensive villa",
          price: 25_000,
        },
        {
          title: "Expensive Villa 2",
          content: "A second expensive villa",
          price: 25_000,
        },
      ];
      this.loading = false;
    }, 2000);
  },
};
</script>
