<template>
  <div class="navigation">
    <Login></Login>
  </div>
</template>

<script>
import Login from '@/views/components/Login'

export default {
  name: 'Navigation',
  components: {
    Login,
  },
};
</script>

<style lang="scss">
.navigation {
  position: fixed;
  height: 60px;
  width: 100%;
}
</style>
