// Main javascript entry point
// Should handle bootstrapping/starting application

'use strict';

global.$ = global.jQuery;
//global._ = require('underscore');

var Header = require('../_modules/header/header');
var Slider = require('../_modules/slider/slider');
var SendMail = require('./sendMail');

$(function() {

    new Header();
    new Slider();
    new SendMail();
});
