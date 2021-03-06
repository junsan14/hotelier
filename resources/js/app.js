/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */


import $ from 'jquery';

import {fetchCategory} from './category';
import {smartMenu} from './menu';
import {fixed, showList, flashOut} from './animation';
import {alert} from './delete';


fetchCategory();
smartMenu();
flashOut();
showList();

alert();

$('.js-back-btn').on('click', function(e){
    e.preventDefault();
    history.back();
})


/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

require('./components/Like');
require('./components/Comment');
