import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from '../js/pages/Home.vue';
import Upload from '../js/pages/Upload.vue';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
        	path: '/upload',
        	name: 'upload',
        	component: Upload
        }
    ]
});

export default router;