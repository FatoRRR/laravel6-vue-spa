require('./bootstrap');
import Vue from 'vue'

import App from '@/views/App.vue'

const app = new Vue({
    el: '#app',
    components: {
        App,
    },
});
