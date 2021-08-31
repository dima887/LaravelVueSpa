import createPersistedState from 'vuex-persistedstate'
import axios from 'axios'
import {comment} from "postcss";

const userModule = ({
    namespaced: true,
    // plugins: [
    //     createPersistedState()
    // ],
    state: {
        authenticated: false,
        user: null,
        test: 'hello',
        loading: false,
        errors: null,
    },
    getters: {
        authenticated (state) {
            return state.authenticated
        },

        user (state) {
            return state.user
        },

        test (state) {
            return state.test
        },
        loading (state) {
            return state.loading
        },
        errors (state) {
            return state.errors
        },
    },
    mutations: {
        setAuthenticated(state, authenticated) {
            state.authenticated = authenticated
        },
        setUser(state, user) {
            state.user = user
        },
        setLoading(state, loading) {
            state.loading = loading
        },
        setErrors(state, errors) {
            state.errors = errors
        },
        setTest(state, test) {
            state.test = test
        },
    },
    actions: {
        async signInAction({ commit }) {
            try {
                axios.get('/api/user').then((response)=>{
                    commit('setUser'. res.data)
                })
                commit('setAuthenticated', true)
                // const response = await axios.get('/api/v1/user')
                // commit('setUser', response.data)
                // return dispatch('me')

            } catch (e) {
                alert('Ошибка в signInAction')
                commit('setErrors', e.response.data.errors)
            }
        },
        async logoutAction({commit}) {
            commit('setAuthenticated', false)
            commit('setUser', null)
            await this.$router.push({name: 'login'})
        },
        async testAction({commit}) {
            // commit('setTest', 'world')
            //await this.$router.push({name: 'home'})
            // const response = await axios.get('/api/v1/ad')
            // commit('setTest', response.data.data)
            // axios.get('/user').then(()=>{
            //     commit('setTest'. data)
            // })
            // const response = await axios.get('api/v1/user')
            // commit('setTest'. response.data)
            // commit('setAuthenticated', true)
        },
        // me ({ commit }) {
        //     return axios.get('/api/user').then((response) => {
        //         commit('setAuthenticated', true)
        //         commit('setUser', response.data)
        //     }).catch(() => {
        //         commit('setAuthenticated', false)
        //         commit('setUser', null)
        //     })
            //return  commit('setAuthenticated', true)
        // }
    }
});

export default userModule;
