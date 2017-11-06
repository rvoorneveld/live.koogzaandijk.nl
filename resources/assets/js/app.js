import Vue from 'vue'
import VueMaterial from 'vue-material';

Vue.use(VueMaterial);

import AppDialog from './components/Dialog.vue';

Vue.material.registerTheme('default', {
    primary: 'blue',
    accent: 'white',
    warn: 'red',
    background: 'white'
});

new Vue({
    el: '#app',
    components: { AppDialog }
});