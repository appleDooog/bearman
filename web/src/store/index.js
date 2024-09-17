import { createStore } from 'vuex'
import createPersistedState from "vuex-persistedstate"
import auth from './modules/auth'
import SecureLS from 'secure-ls'

const ls = new SecureLS({ isCompression: false })

export default createStore({
  state: {
  },
  getters: {
  },
  mutations: {
  },
  actions: {
  },
  modules: {
    auth,
  },
  plugins:[createPersistedState({
    // storage: window.localStorage,
    key: 'bearman',  //儲存在 localStorage 的 key
    storage: {
        getItem: key => ls.get(key),
        setItem: (key, value) => ls.set(key, value),
        removeItem: key => ls.remove(key)
    }
  })]
})
