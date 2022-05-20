require('./bootstrap');
import $ from 'jquery';
import {storeComment, fetchComment} from './comment';
import {fetchCategory} from './category';
import {smartMenu} from './menu';
import {fixed, showList, flashOut} from './animation';
import {fetchLikeCount} from './like';
import {alert} from './delete';

storeComment();
fetchComment();
fetchCategory();
smartMenu();
flashOut();
showList();
fetchLikeCount();
alert();

$('.js-back-btn').on('click', function(e){
	e.preventDefault();
	history.back();
})



