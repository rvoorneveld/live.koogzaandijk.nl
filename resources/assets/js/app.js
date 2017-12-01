require('../sass/app.scss');
window.jQuery = require('jquery');
require('jquery-countdown');
require('@fancyapps/fancybox');

jQuery(document).ready(function(){
    require('./Countdown');
    require('./Fancybox');
});