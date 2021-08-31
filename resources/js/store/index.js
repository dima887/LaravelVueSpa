import Vue from "vue";
import Vuex from "vuex"
import createPersistedState from 'vuex-persistedstate'
import userModule from "./UserModule"

Vue.use(Vuex)

const store = new Vuex.Store({
    plugins: [
        createPersistedState()
    ],
    state: {
        like: 'hello'
    },
    getters: {
        test (state) {
            return state.like
        },
    },
    // mutations: {
    //
    // },
    // actions: {
    //
    // },
    modules: {
        auth: userModule
    }
})

export default store
