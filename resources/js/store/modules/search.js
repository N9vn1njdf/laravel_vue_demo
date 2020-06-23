import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex)

const state = () => ({
  houses: {
    loading: true,
    data: []
  }
})

const mutations = {
  setHousesLoading (state) {
    state.houses.loading = true
  },
  setHousesResult (state, { data }) {
    state.houses.loading = false
    state.houses.data = data
  },
}

const actions = {
  async searchHouses({ commit }, filter) {
    commit('setHousesLoading')
    let response = await axios.get('/api/search/houses', {params: filter})
    commit('setHousesResult', response.data)
  },
}

export default {
  namespaced: true,
  state,
  actions,
  mutations,
}