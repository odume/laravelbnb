<template>
  <div>
    <h6 class="text-uppercase text-secondary font-weight-bolder">
      Check Availability
      <span v-if="noAvailability" class="text-danger">(NOT AVAILABLE)</span>
      <span v-if="hasAvailability" class="text-success">(AVAILABLE)</span>
    </h6>

    <div class="row g-2 mb-2">
      <div class="form-group col-md-6">
        <label for="from">From</label>
        <input
          type="text"
          name="from"
          class="form-control form-control-sm"
          placeholder="Start date"
          v-model="from"
          @keyup.enter="check"
          :class="[{ 'is-invalid': this.errorFor('from') }]"
        />
        <div
          class="invalid-feedback"
          v-for="(error, index) in this.errorFor('from')"
          :key="'from' + index"
        >
          {{ error }}
        </div>
      </div>
      <div class="form-group col-md-6">
        <label for="to">To</label>
        <input
          type="text"
          name="to"
          class="form-control form-control-sm"
          placeholder="End date"
          v-model="to"
          @keyup.enter="check"
          :class="[{ 'is-invalid': this.errorFor('to') }]"
        />
        <div
          class="invalid-feedback"
          v-for="(error, index) in this.errorFor('to')"
          :key="'to' + index"
        >
          {{ error }}
        </div>
      </div>
    </div>

    <div class="d-grid gap-2 mt-2">
      <button class="btn btn-secondary" @click="check" :disabled="loading">
        Check !
      </button>
    </div>
  </div>
</template>

<style scoped>
label {
  font-size: 0.7rem;
  text-transform: uppercase;
  color: gray;
  font-weight: bolder;
}
</style>

<script>
export default {
  props: {
      bookableId: String
  },

  data() {
    return {
      from: null,
      to: null,
      loading: false,
      status: null,
      errors: null,
    };
  },

  methods: {
    check() {
      this.loading = true;
      this.errors = null;

      axios
        .get(`/api/bookables/${this.bookableId}/availability`, {
          params: { from: this.from, to: this.to },
        })
        .then((res) => {
          console.log(res);
          this.status = res.status;
        })
        .catch((err) => {
          if (422 === err.response.status) {
            this.errors = err.response.data.errors;
          }
          this.status = err.response.status;
        })
        .then(() => (this.loading = false));
    },

    errorFor(field) {
      return this.hasErrors && this.errors[field] ? this.errors[field] : null;
    },
  },

  computed: {
    hasErrors() {
      return 422 === this.status && this.errors !== null;
    },
    hasAvailability() {
      return 200 === this.status;
    },
    noAvailability() {
      return 404 === this.status;
    },
  },
};
</script>
