<template>
  <div class="home">
    <div class="title">Laravel 6 + Vue 2.6</div>
  </div>
</template>

<script>
export default {
  name: 'Home',
}
</script>

<style lang="scss">
.home {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100%;
  .title {
    font-size: 5em;
    font-weight: 200;
    text-transform: uppercase;
    letter-spacing: 4px;
    -webkit-text-stroke: 0.45px;
    -webkit-text-stroke: 0.45px rgba(0, 0, 0, 0.1);
    text-shadow: rgba(0, 0, 0, 0.3) -15px -8px 6px;
  }
}
</style>
