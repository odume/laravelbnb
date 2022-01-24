<template>
  <div class="row">
    <div class="col-md-8 mb-4">
      <div class="card">
        <div v-if="!loading">
          <div class="card-body">
            <h2>{{ bookable.title }}</h2>
            <hr />
            <article>{{ bookable.description }}</article>
          </div>
        </div>
        <div v-else>Loading ...</div>
      </div>

      <review-list></review-list>
    </div>
    <div class="col-md-4 mb-4">
      <availability></availability>
    </div>
  </div>
</template>

<script>
import Availability from "./Availability";
import ReviewList from "./ReviewList";

export default {
  components: {
    Availability,
    ReviewList,
  },

  data() {
    return {
      bookable: null,
      loading: false,
    };
  },

  created() {
    this.loading = true;
    axios
      .get(`/api/bookables/${this.$route.params.id}`)
      .then((res) => {
        this.bookable = res.data.data;
        this.loading = false;
      })
      .catch((err) => {
        console.error(err);
      });
  },
};
</script>
