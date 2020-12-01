import '../css/app.css';
require('../css/app.scss');
require('./bootstrap');
const $ = require('jquery');

import Vue from 'vue';
import VueClipboard from 'vue-clipboard2';
import Route from '../js/router.js';
import App from '../js/views/App.vue';

Vue.component('btc-component', require('./components/BTC.vue').default);
Vue.component('mintme-btc-component', require('./components/mintme-vs-btc.vue').default);
Vue.component('eth-component', require('./components/ETH.vue').default);
Vue.component('mintme-eth-component', require('./components/mintme-vs-eth.vue').default);
Vue.component('mintme-usd-calc-component', require('./components/mintme-usd-calc.vue').default);
Vue.component('usd-mintme-calc-component', require('./components/usd-mintme-calc.vue').default);
Vue.component('video-component', require('./components/video.vue').default);
VueClipboard.config.autoSetContainer = true;
Vue.use(VueClipboard);

const app = new Vue({
    el: '#app',
    router: Route,
    render: h => h(App),
});

export default app;