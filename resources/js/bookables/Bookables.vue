<template>
  <div>
    <bookable-list-item v-if="bookable1"
      :title="bookable1.title"
      :content="bookable1.content"
      :price="bookable1.price"
    ></bookable-list-item>
    <bookable-list-item v-if="bookable2"
      :title="bookable2.title"
      :content="bookable2.content"
      :price="bookable2.price"
    ></bookable-list-item>
  </div>
</template>

<script>
import BookableListItem from "./BookableListItem";

export default {
  components: { BookableListItem },

  data() {
      return {
          bookable1: null,
          bookable2: null,
      }
  },

  created() {

    setTimeout(() => {
        this.bookable1 = {
              title: "Cheap Villa",
              content: "A very cheap villa",
              price: 2000,
          };
        this.bookable2 = {
              title: "Expensive Villa",
              content: "A very expensive villa",
              price: 20_000,
          };
    }, 2000);
  },
};
</script>
