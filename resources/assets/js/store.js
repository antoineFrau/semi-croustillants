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
        async doesConnected(context) {
            let token = (await Axios.get('/user/')).data;
            if()
            context.commit("usertoken", data);
        }
    }
})
