<template>
  <div class="navigation">
    <div class="hamburger"></div>
    <div class="links"></div>
    <div class="profile" v-if="user === undefined">
      <Register/>
      <Login/>
    </div>
    <div class="profile" v-else>
      <i @click="displayProfileNavigation = !displayProfileNavigation" class="material-icons">account_circle</i>
      <nav v-if="displayProfileNavigation">
        <div @click="$router.push('profile'), displayProfileNavigation = false">Your Profile</div>
        <div>Settings</div>
        <div @click="logout">Sign Out</div>
      </nav>

    </div>
  </div>
</template>

<script>
import Login from '@/views/components/Login'
import Register from '@/views/components/Register'

export default {
  name: 'Navigation',
  components: {
    Login,
    Register,
  },
  data () {
    return {
      displayProfileNavigation: false,
    };
  },
  computed: {
    user() {
      return this.$store.state.user;
    },
  },
  methods: {
    logout() {
      this.$store.dispatch('LOGOUT');
    },
  },
};
</script>

<style lang="scss">
.navigation {
  justify-content: space-between;
  align-items: center;
  position: fixed;
  display: flex;
  height: 60px;
  width: 100%;
  top: 0px;
  flex: 3;

  .profile {
    justify-content: flex-end;
    position: relative;
    display: flex;
    height: 60px;
    flex: 1;

    > i {
      align-items: center;
      padding: 0px 7px;
      cursor: pointer;
      font-size: 3em;
      display: flex;
    }

    nav {
    border: 1px solid rgba(255, 255, 255, 0.48);
    flex-direction: column;
    border-radius: 3px;
    position: absolute;
    display: flex;
    width: 200px;
    right: 13px;
    top: 70px;

    div {
      color: white;
      cursor: pointer;
      padding: 0.7em 0.9em;
      background: transparent;
      transition: all 0.3s ease;

      &:hover {
        color: #202040;
        background: rgba($color: #FFF, $alpha: .6)
      }
    }
    }
  }

  .hamburger {
    height: 60px;
    flex: 1;
  }

  .links {
    height: 60px;
    flex: 1;
  }
}
</style>
