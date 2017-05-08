
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.md5 = require('blueimp-md5');

window.printpage = function () {
    var printer = window.open('', '');
    printer.document.body.innerHTML = '<base href="' + window.location.origin + '">';
    printer.document.body.innerHTML += document.head.innerHTML;
    $('[printable]').each(function (idx, el) {
        printer.document.body.innerHTML += el.outerHTML;
    });
    printer.document.body.innerHTML += '<hr><small class="is-pulled-right">' + window.location.href + '</small><small>晴空工作室</small>';
    printer.document.body.innerHTML += '<style>.box {border: 1px solid lightgray; box-shadow: none;}</style>';
    $(printer.document).ready(function () {
        setTimeout(function () {
            printer.print();
            printer.close();
        }, 500);
    });
}

// window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example', require('./components/Example.vue'));
//
// const app = new Vue({
//     el: '#app'
// });
