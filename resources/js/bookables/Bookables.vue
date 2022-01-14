<template>
  <div>
    <div v-if="loading">Data is loading ...</div>
    <div v-else>
      <div class="row mb-4" v-for="row in rows" :key="'row' + row">
        <div class="col" v-for="(bookable, index) in bookablesInRow(row)" :key="'col' + row + index" >
          <bookable-list-item
            :title="bookable.title"
            :content="bookable.content"
            :price="bookable.price"
          ></bookable-list-item>
        </div>
        <div class="col" v-for="f in fillersInRow(row)" :key="'filler' + row + f"></div>
      </div>
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
      colNumber: 4,
    };
  },

  computed: {
    rows() {
      return this.bookables === null
        ? 0
        : Math.ceil(this.bookables.length / this.colNumber);
    },
  },

  methods: {
    bookablesInRow(row) {
      return this.bookables.slice( (row - 1) * this.colNumber, row * this.colNumber );
    },
    fillersInRow(row) {
        return this.colNumber - this.bookablesInRow(row).length;
    }
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
