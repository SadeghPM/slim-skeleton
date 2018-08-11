window._ = require('lodash');
window.Popper = require('popper.js').default;

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
    require('./home');
} catch (e) {
}

/**
 * We'll load the axios HTTP library. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

let axios = require('axios');
window.axios = axios.create({
    transformRequest : [function (data, headers) {
        let csrf_name = document.head.querySelector('meta[name="csrf_name"]');
        let csrf_value = document.head.querySelector('meta[name="csrf_value"]');
        if (csrf_name && csrf_value) {
            return data+"&"+window.$.param({'csrf_name': csrf_name.content, 'csrf_value': csrf_value.content})
        }
        return data;
    }]
});


window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
