import Vue from 'vue'
import VueMaterial from 'vue-material';

Vue.use(VueMaterial);

window.Vue = Vue;

Vue.material.registerTheme('default', {
    primary: 'blue',
    accent: 'white',
    warn: 'red',
    background: 'white'
});

var vm = new Vue({
    el: '#app',
    data: {
        openDialog: '',
    },
    components: {
        appDialog: require('./components/Dialog.vue'),
    },
});

vm.openDialog('manipulateMatchboardScoreBox');