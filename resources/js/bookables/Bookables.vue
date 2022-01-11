<template>
  <div>
    <bookable-list-item
      :title="bookable1.title"
      :content="bookable1.content"
      :price="bookable1.price"
    ></bookable-list-item>
    <bookable-list-item
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
          bookable1: {
              title: "Cheap Villa",
              content: "A very cheap villa",
              price: 2000,
          },

          bookable2: {
              title: "Expensive Villa",
              content: "A very expensive villa",
              price: 20_000,
          },
      }
  },

  created() {
    console.log("created");
    console.log(this.bookable1);
    console.log(this.bookable2);

    setTimeout(() => {
        this.bookable1.title = "Very Cheap Villa";
        this.bookable2.title = "Very Expensive Villa";
    }, 5000);
  },
};
</script>
