<template>
  <div class="login">
    <div @click="displayContent = !displayContent" class="login-button" :class="{'button-active': displayContent}">Login</div>
    <div v-if="displayContent" class="login-content" :class="{'content-active': displayContent}">
      <Input :icon="'account_box'" :model.sync="user.username" :info="'Username'"/>
      <Input :type="'password'" :icon="'vpn_key'" :model.sync="user.password" :info="'Password'"/>
      <Input @click="login" :type="'submit'" :value="'Login'"/>
    </div>
  </div>
</template>

<script>
import Input from '@/views/components/Input'

export default {
  name: 'Login',
  components: {
    Input,
  },
  data () {
    return {
      displayContent: false,
      user: {
        username: '',
        password: '',
      }
    };
  },
};
</script>

<style lang="scss">
.login {
  position: absolute;
  right: 0px;
  width: 300px;
  display: flex;
  padding: 1em;
  align-self: flex-end;
  flex-direction: column;

  &-button {
    padding: 1em;
    cursor: pointer;
    text-align: center;
    letter-spacing: 1.4px;
    background: transparent;
    text-transform: uppercase;
    transition: all 0.3s ease;

    &.button-active {
      background: rgba(0, 0, 0, 0.3);
    }
  }

  &-content {
    padding: 1em;
    display: flex;
    flex-direction: column;
    background: transparent;
    transition: all 0.3s ease;

    &.content-active {
      background: rgba(255, 255, 255, 0.8);
    }
  }
}
</style>
