<template>
  <div class="navigation">
    <div class="hamburger"></div>
    <div class="links"></div>
    <div class="profile" v-if="$store.state.user === undefined">
      <Register/>
      <Login/>
    </div>
    <div class="profile" v-else>
      <div>LOGOUT</div>
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
};
</script>

<style lang="scss">
.navigation {
  position: fixed;
  display: flex;
  justify-content: space-between;
  align-items: center;
  height: 60px;
  width: 100%;
  flex: 3;

  .profile {
    position: relative;
    display: flex;
    height: 60px;
    flex: 1;
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
