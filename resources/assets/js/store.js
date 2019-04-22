import Vue from 'vue'
import Vuex from 'vuex'
import createPersistedState from 'vuex-persistedstate'
import * as Cookies from 'js-cookie'

Vue.use(Vuex)

export const store = new Vuex.Store({
    state: {
        usertoken: '',
    },
    plugins: [
        createPersistedState({
            paths: ['usertoken'],
            getState: (key) => Cookies.getJSON(key),
            setState: (key, state) => Cookies.set(key, state, { expires: 365 })
        })
    ],
    mutations: {
        logout(state) {
            state.usertoken = ''
        },
        login(state, user) {
            state.usertoken = user.token
        }
    },
    getters: {
        getUserToken(state) {
            return state.usertoken
        }
    },
    actions: {
        async isConnected(state, options) {
            let result
            await window.axios.get('http://localhost:8000/api/auth/authentified', options)
                .then(response => {
                    result = true
                }).catch(error => {
                    state.usertoken = ''
                    result = false
                })
            return result
        }
    }
})
