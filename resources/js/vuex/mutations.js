export default {
  UPDATE_USER(state, user = undefined) {
    state.user = user;
  },
  UPDATE_TOKEN(state, token = '') {
    localStorage.setItem('token', token);
    state.token = token;
  },
  COMMIT_NAME({ state }) {
    console.warn('STATE', state);
  }
}
