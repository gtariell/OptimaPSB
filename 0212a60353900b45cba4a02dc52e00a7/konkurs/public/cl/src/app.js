import bsCustomFileInput from 'bs-custom-file-input'

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('jquery-nice-select')
    require('bootstrap');

} catch (e) { }

$(document).ready(function () {
    bsCustomFileInput.init()
})

$(document).ready(function() {
    $('select').niceSelect()
})