export default {
  namespaced: true,
  state: {
    username: "",
    token: "",
    job: "",
    isLogin: false,
  },
  getters: {},
  mutations: {
    set_auth(state, options) {
      state.username = options.username;
      state.token = options.token;
      state.job = options.job;
      state.isLogin = options.isLogin;
    },
  },
  actions: {
    setAuth(context, options){
        context.commit('set_auth', {
            username: options.username,
            token: options.token,
            job: options.job,
            isLogin: options.isLogin,
        });
    }
  },
  modules: {},
};
