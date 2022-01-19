<template>
  <div>
    <div v-if="loading">Data is loading ...</div>
    <div v-else>
      <div class="row mb-4" v-for="row in rows" :key="'row' + row">
        <div
          class="col d-flex align-items-stretch"
          v-for="(bookable, index) in bookablesInRow(row)"
          :key="'col' + row + index"
        >
          <bookable-list-item
            v-bind="bookable"
          ></bookable-list-item>
        </div>
        <div
          class="col"
          v-for="f in fillersInRow(row)"
          :key="'filler' + row + f"
        ></div>
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
      return this.bookables.slice(
        (row - 1) * this.colNumber,
        row * this.colNumber
      );
    },
    fillersInRow(row) {
      return this.colNumber - this.bookablesInRow(row).length;
    },
  },

  created() {
    this.loading = true;

    axios.get("/api/bookables").then((response) => {
      this.bookables = response.data;
      this.loading = false;
    });
  },
};
</script>
