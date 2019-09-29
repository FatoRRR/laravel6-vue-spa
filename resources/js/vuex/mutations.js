export default {
  UPDATE_USER(state, user) {
    state.user = user;
  },
  COMMIT_NAME({ state }) {
    console.warn('STATE', state);
  }
}
