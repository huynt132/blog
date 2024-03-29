import Vue from 'vue'
import Vuex from 'vuex'

import comment from './comment'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {},
    mutations: {},
    actions: {},
    modules: {
        comment,
    }
})
