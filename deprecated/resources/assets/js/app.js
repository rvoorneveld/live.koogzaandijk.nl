require('../sass/app.scss');
window.jQuery = window.$ = require('jquery');
require('jquery-countdown');
require('@fancyapps/fancybox');
require('skipper-slider/dist/skippr.min');

jQuery(document).ready(function(){
    require('./Countdown');
    require('./Fancybox');
    require('./Skippr');
});