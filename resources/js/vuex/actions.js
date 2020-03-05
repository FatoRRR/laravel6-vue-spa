export default {
  LOGOUT({ commit }) {
    axios.post('/api/auth/logout')
    .then(response => {
      commit('UPDATE_USER');
      commit('UPDATE_TOKEN');
    });
  },
  METHOD_NAME({ commit }) {
    commit('COMMIT_NAME');
  }
}
