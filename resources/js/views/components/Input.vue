<template>
  <div class="input-container" :class="{'focused': focused || model !== ''}">
    <div class="input">
      <i class="material-icons">{{ icon }}</i>
      <span v-if="type !== 'submit' && placeholder === ''" class="placeholder" :class="{'focused': focused || model !== ''}">{{ info }}</span>
      <span v-else-if="type !== 'submit' && (placeholder !== '' && model)" class="placeholder" :class="{'focused': focused || model !== ''}">{{ info }}</span>
      <input v-if="type !== 'submit'" :placeholder="placeholder" :type="type" v-model="model" @focus="focused = true" @blur="focused = false">
      <input :type="type" class="button" :value="value" v-else></input>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Input',
  props: {
    value: {
      type: String,
      default: '',
    },
    icon: {
      type: String,
      default: '',
    },
    model: {
      type: String,
      default: '',
    },
    type: {
      type: String,
      default: 'text',
    },
    info: {
      type: String,
      default: '',
    },
    placeholder: {
      type: String,
      default: '',
    },
  },
  data () {
    return {
      focused: false,
    }
  }
};
</script>

<style lang="scss">
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
      clip-path: circle(15% at 10% 50%);
      transition: all 0.3s ease;
    }

    &.focused {

      &::after {
        clip-path: circle(100% at 50% 100%);
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
    background: linear-gradient(to bottom right, rgba($color: #202040, $alpha: 1.0), rgba($color: #202060, $alpha: 1.0));
    border-radius: 3px;
    cursor: pointer;
    color: white;
  }
}
</style>
