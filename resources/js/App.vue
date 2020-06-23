<template lang="pug">
el-container.container
  el-aside.sidebar(width="300px")
    HousesFilter
  el-main(v-loading="houses.loading")
    el-table(:data="houses.data")
      el-table-column(prop="name" label="Name" width="180")
      el-table-column(prop="price" label="Price" width="180")
      el-table-column(prop="bedrooms" label="Bedrooms" width="180")
      el-table-column(prop="bathrooms" label="Bathrooms" width="180")
      el-table-column(prop="storeys" label="Storeys" width="180")
      el-table-column(prop="garages" label="Garages" width="180")
      template(#empty)
        .empty(v-show="!houses.loading") No results
</template>

<script>
import { mapState } from 'vuex'
import HousesFilter from './components/HousesFilter'

export default {
  components: {
    HousesFilter
  },
  computed: mapState({
    houses: state => state.search.houses
  })
}
</script>

<style lang="scss" scoped>
.container {
  height: 100vh;
  border: 1px solid #eee;
}

.sidebar {
  background-color: #ECEFF1
}

.empty {
  font-size: 120%;
  color: #a851ff;
}
</style>