<template>
  <div class="login">
    <div @click="displayContent = !displayContent" class="login-button" :class="{'button-active': displayContent}">Login</div>
    <div class="modal" v-if="displayContent" @click.self="displayContent = false">
      <div class="modal-container">
        <div class="modal-header">Sign in</div>
        <div class="modal-content">
          <div v-for="(item, index) in user" :key="index" :class="{'input-container': true, 'focused': item.focused || item.text !== ''}">
            <div class="input">
              <i class="material-icons">{{ item.icon }}</i>
              <span :class="{'placeholder': true, 'focused': item.focused || item.text !== ''}">{{ item.placeholder }}</span>
              <input
                @keyup.enter="login"
                :type="item.inputType"
                v-model="item.text"
                @focus="item.focused = true, item.error = ''"
                @blur="item.focused = false"
              />
              <span v-if="item.error !== ''" class="error">{{ item.error }}</span>
            </div>
          </div>
        </div>
        <div class="modal-actions">
          <div class="input">
            <input class="button" type="submit" @click="login" :value="'Login'">
            <span v-if="error !== ''" class="error">{{ error }}</span>
          </div>
          <div class="checkbox">
            <input id="keep-logged-in" type="checkbox" v-model="stayLoggedIn">
            <label for="keep-logged-in"></label>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Login',
  data () {
    return {
      displayContent: false,
      stayLoggedIn: false,
      error: '',
      user: {
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
      }
    };
  },
  methods: {
      login() {
          axios.post('/api/auth/login', {
              email: this.user.email.text,
              password: this.user.password.text,
          })
          .then(response => {
              if (this.stayLoggedIn) {
                  localStorage.setItem('token', response.headers.authorization);
                  axios.defaults.headers.common['Authorization'] = response.headers.authorization;
              }
              this.$store.commit('UPDATE_USER', response.data.user);
          })
          .catch(error => {
            if (error.response.data.errors) {
              const errors = error.response.data.errors;
              for (const errorKey in errors) {
                this.user[errorKey].error = errors[errorKey][0];
              }
            } else if (error.response.data.error) {
              this.error = 'Please check your credentials';
            }
          });
      },
      toggleStayLoggedIn() {
          this.stayLoggedIn = !this.stayLoggedIn;
      },
  }
};
</script>

<style lang="scss">
.login {
  flex: 1;
  display: flex;
  flex-direction: column;

  &-button {
    min-height: 60px;
    display: flex;
    cursor: pointer;
    align-items: center;
    letter-spacing: 1.4px;
    justify-content: center;
    background: transparent;
    text-transform: uppercase;
    transition: all 0.3s ease;

    &:hover {
      background: rgba(0, 0, 0, 0.1);
    }

    &.button-active {
      background: rgba(0, 0, 0, 0.3);
    }
  }

  .button {
    margin: 7px;
    & + span {
      margin-bottom: 7px;
    }
  }

  .checkbox {
    margin: 14px 0px 0px 0px;

    &::after {
      content: 'Kepp me logged in';
    }
  }
}
</style>
