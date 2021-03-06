require('./bootstrap');
import Vue from 'vue'
import router from './router/router'
import store from './vuex/store'

import App from '@/views/App.vue'

const app = new Vue({
    el: '#app',
    components: {
        App,
    },
    router,
    store,
});
