<template>
  <div>
    <router-view></router-view>
  </div>
</template>

<script>
export default {
  name: 'App',
}
</script>

<style lang="scss">
@import url('https://fonts.googleapis.com/css?family=Raleway:200,300,400,500,600,700&display=swap');

*, html, body {
  background: linear-gradient(to bottom right, #202040 65%, #202060);
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  font-family: 'Raleway', sans-serif;
  color: white;
  height: 100%;
  padding: 0px;
  width: 100%;
  margin: 0px;
  -webkit-text-stroke: 0.45px;
  -webkit-text-stroke: 0.45px rgba(0, 0, 0, 0.1);
  text-shadow: rgba(0, 0, 0, 0.3) -15px -8px 6px;
}
</style>
