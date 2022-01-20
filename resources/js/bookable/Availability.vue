<template>
  <div>
    <h6 class="text-uppercase text-secondary font-weight-bolder">
      Check Availability
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
        />
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
        />
      </div>
    </div>

    <div class="d-grid gap-2 mt-2">
      <button class="btn btn-secondary" @click="check">Check !</button>
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
    data() {
        return {
            from: null,
            to: null,
        }
    },

    methods: {
        check() {
            alert(" I'll check it now ! ");
        }
    },
}
</script>
