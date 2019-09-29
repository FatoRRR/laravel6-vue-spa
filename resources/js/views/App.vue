<template>
  <div>
    <Navigation></Navigation>
    <router-view></router-view>
  </div>
</template>

<script>
import Navigation from '@/views/components/Navigation'

export default {
  name: 'App',
  components: {
    Navigation,
  },
  created() {
    if (this.$store.state.token !== '') {
      axios.defaults.headers.common['Authorization'] = 'bearer ' + this.$store.state.token;
      axios.get('/api/auth/user', this.$store.state.token)
      .then(response => this.$store.commit('UPDATE_USER', response.data.user));
    }
  }
};
</script>

<style lang="scss">
@import url('https://fonts.googleapis.com/css?family=Raleway:200,300,400,500,600,700&display=swap');

html, body, #app {
  background: linear-gradient(to bottom right, #202040 65%, #202060);
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  font-family: 'Raleway', sans-serif;
  color: white;
  height: 100%;
  padding: 0px;
  width: 100%;
  margin: 0px;
  background-attachment: fixed;
}

.checkbox {
  width: 40px;
  height: 22px;
  background: rgba($color: #333, $alpha: 0.3);
  border-radius: 5px;
  position: relative;

  &::after {
    content: 'Off';
    position: absolute;
    width: 150px;
    top: 4px;
    left: 50px;
    font-size: 0.8em;
    color: rgba($color: #202040, $alpha: 0.6);
  }

  input {
    visibility: hidden;

    &:checked {
      &+ label {
        left: 21px;
        background: rgba($color: #202040, $alpha: 1);
      }
    }
  }

  label {
    background: rgba($color: #202040, $alpha: 0.7);
    display: block;
    width: 16px;
    height: 16px;
    border-radius: 3px;
    cursor: pointer;
    position: absolute;
    top: 3px;
    left: 3px;
    z-index: 1;
    transition: all .5s ease;
  }
}

.input {
  display: flex;
  position: relative;
  align-items: center;

  &-container {
    display: flex;
    margin: 7px 0px 14px 0px;
    flex-direction: column;

    &::after {
      content: '';
      display: flex;
      width: 100%;
      height: 100%;
      border-bottom: 2px solid rgba($color: #202040, $alpha: 0.3);
      transition: all 0.3s ease;
    }

    &.focused {

      &::after {
        border-bottom: 2px solid rgba($color: #202040, $alpha: 0.8);
      }
    }
  }

  .material-icons {
    color: #202040;
  }

  .placeholder {
    color: rgba(0, 0, 0, 0.4);
    position: absolute;
    font-size: 16px;
    width: 100%;
    z-index: 0;
    left: 33px;
    top: 7px;
    transition: all 0.3s ease;
    &.focused {
      left: 0px;
      top: -10px;
      font-size: 12px;
    }
  }

  .error {
    color: #f44336;
    position: absolute;
    font-size: 12px;
    width: 100%;
    z-index: 0;
    left: 0px;
    bottom: -18px;
  }

  input {
    border-bottom: 2px solid;
    background: transparent;
    letter-spacing: 1.4px;
    font-weight: 300;
    font-size: 0.9em;
    outline: none;
    padding: 7px;
    border: none;
    width: 100%;
    z-index: 1;
  }

  .button {
    background: #202040;
    border-radius: 3px;
    cursor: pointer;
    color: white;
    transition: all 0.3s ease;

    &:hover {
      background: #202060;
    }
  }
}

.modal {
  position: fixed;
  top: 0px;
  left: 0px;
  right: 0px;
  bottom: 0px;
  display: flex;
  align-items: center;
  flex-direction: column;
  justify-content: center;
  background: rgba($color: #000000, $alpha: 0.3);

  &-container {
    border-radius: 2px;
    padding: 2em;
    display: flex;
    color: #202040;
    min-width: 300px;
    max-width: 700px;
    flex-direction: column;
    background: rgba(255, 255, 255, 0.9);
    transition: all 0.3s ease;

    .modal-header {
      font-size: 2.4em;
      letter-spacing: 2px;
      margin-bottom: 0.8em;
    }

    .modal-content {
    }

    .modal-actions {
    }
  }
}
</style>
