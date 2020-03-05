<template>
  <div class="register">
    <div class="button" @click="displayContent = !displayContent">New Account</div>
    <div class="modal" v-if="displayContent" @click.self="displayContent = false">
      <div class="modal-container">
        <div class="modal-header">Registration</div>
        <div class="modal-content">
          <div v-for="(item, index) in user" :key="index" :class="{'input-container': true, 'focused': item.focused || item.text !== ''}">
            <div class="input">
              <i class="material-icons">{{ item.icon }}</i>
              <span :class="{'placeholder': true, 'focused': item.focused || item.text !== ''}">{{ item.placeholder }}</span>
              <input
                :type="item.inputType"
                v-model="item.text"
                @focus="item.focused = true, item.error = ''"
                @blur="item.focused = false"
              />
              <span v-if="item.error !== ''" class="error">{{ item.error }}</span>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-actions">
        <div class="input">
          <input class="button" type="submit" @click="register" :value="'Login'">
          <span v-if="error !== ''" class="error">{{ error }}</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Register',
  data () {
    return {
      displayContent: false,
      user: {
        username: {
          text: '',
          icon: 'account_box',
          error: '',
          inputType: 'text',
          focused: false,
          placeholder: 'Your Username',
        },
        email: {
          text: '',
          icon: 'mail',
          error: '',
          inputType: 'email',
          focused: false,
          placeholder: 'Your Email',
        },
        password: {
          text: '',
          icon: 'vpn_key',
          error: '',
          inputType: 'password',
          focused: false,
          placeholder: 'Password',
        },
      },
    };
  },
  methods: {
    register() {
      axios.post('/api/auth/register', {
        email: this.user.email.text,
        username: this.user.username.text,
        password: this.user.password.text,
      })
      .then(response => console.warn('response', response.data))
      .catch(error => {
        const errors = error.response.data.errors;
        for (const userObjectKey in errors) {
          this.user[userObjectKey].error = errors[userObjectKey][0];
        }
      });
    },
  },
};
</script>

<style lang="scss">
.register {
  flex: 1;

  .button {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 60px;
    cursor: pointer;
    letter-spacing: 1.4px;
    background: transparent;
    text-transform: uppercase;
    transition: all 0.3s ease;

    &:hover {
      background: rgba(0, 0, 0, 0.1);
    }

    &-active {
      background: rgba(0, 0, 0, 0.3);
    }
  }
}
</style>
