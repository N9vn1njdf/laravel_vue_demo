<template lang="pug">
el-form.filter
  el-form-item(:label="'Min price ' + filter.min_price")
    .filter-slider
      el-slider(v-model="filter.min_price" :min="0" :max="1000000" :step="10000")
  el-form-item(:label="'Max price ' + filter.max_price")
    .filter-slider
      el-slider(v-model="filter.max_price" :min="100000" :max="1000000" :step="10000")
  el-form-item(label="Name")
    el-input(v-model="filter.name")
  el-form-item(label="Bedrooms")
    el-input(v-model="filter.bedrooms")
  el-form-item(label="Bathrooms")
    el-input(v-model="filter.bathrooms")
  el-form-item(label="Storeys")
    el-input(v-model="filter.storeys")
  el-form-item(label="Garages")
    el-input(v-model="filter.garages")
</template>

<script>

export default {
  watch: {
    filter: {
      handler() {
        if (this.timeout) {
          clearTimeout(this.timeout)
        }

        this.timeout = setTimeout(() => {
          this.$store.dispatch('search/searchHouses', this.filter)
        }, 600);
      },
      deep: true
    }
  },
  data() {
    return {
      filter: {
        max_price: 1000000,
      },
      timeout: null
    }
  }
}
</script>

<style lang="scss" scoped>
.filter {
  padding: 1rem;

  &-slider {
    margin: 30px 10px 0;
  }
}
</style>