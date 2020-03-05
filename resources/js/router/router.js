import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '@/views/Home'
import Profile from '@/views/components/Profile'

Vue.use(VueRouter)

export default new VueRouter({
    history: true,
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/profile',
            name: 'Profile',
            component: Profile
        },
    ],
});

