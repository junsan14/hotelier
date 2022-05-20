
import $ from 'jquery';
import {likeStore, unlikeStore, fetchLikeCount} from './like';

export function fetchComment(){
	$(function () {
		let question_id = $('.question').data('id');
	    $.ajax({
	            headers: {
	                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	            },
	            url: '/comment/'+ question_id,  
	            type: 'GET', 
	            dataType: 'json',
	            cache: false,
	            data:{
	            	'question_id':question_id,
	            },
	             success: function(response){
	             	let $list_area = $('.comment-list');
	             	let comments = response.comments;
	             	let users = response.users;
	             	let time = response.time;
	             	let comment_ids = [];
	             	comment_ids.push(0);	
			      //console.log(comments);
			      	$list_area.html('');

			      	comments.forEach(function(comment,i){			      
			      		$list_area.append(
			      			`<div class="comment-list-item" data-comment-id="${comment.id}">
			      			 	<div class="js-comment-content">${comment.content}</div>
			      			 	<div class="js-like-area like-area">
					      			 <div class="like-btn">
							        	 <a href="" class="js-unlike unlike show">
											<i class="fa-solid fa-heart" style="color: red;"></i>
										 </a>				   
										 <a href="" class="js-like like">
											<i class="fa-regular fa-heart"></i>
										 </a>
					        	     </div>
					        	     <div class="like-count js-like-count">

					        	     </div>
				        	    </div>	
			        	        <div class="post-desc">
					    			<div class="js-post-profile post-profile">
						        		${users[i].area}${users[i].hotel_type}/${users[i].work_title}/${users[i].work_length}/${users[i].username} さん
						        	</div>
						        	<div class="js-post-date post-date">
						        		${time[i]}
						        	</div>
			    		    	</div>
			    		    </div>
			      			`
			      			);
			      			comment_ids.push(comment.id);	      
			      	})
			      	fetchLikeCount();
			      	let $like_btns = $('.js-like');
			      	let $unlike_btns = $('.js-unlike');
			      	likeStore($like_btns,comment_ids);
			      	unlikeStore($unlike_btns,comment_ids);		     		      	
			    },
			    error: function(){
			        console.log('fetchCommentError');

			    }
	    })    
	    return false;
	});
}

export function storeComment(){
	$(function () {
	$('.js-store-comment').on('click', function (e) {
		e.preventDefault();
		let question_id = $('.question').data('id');
		let content = $("textarea[name='content']").val();
	    $.ajax({
	            headers: {
	                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	            },
	            url: '/comment/store',  //routeの記述
	            type: 'POST', //受け取り方法の記述（GETもある）
	            data: {
	                'question_id': question_id,
	                'content': content,
	            },
	            dataType: 'json',
	             success: function(response){
			      	//console.log(response.request);
			      	$("textarea[name='content']").val('');
			      	fetchComment();
			      	
			    },
			    error: function(){
			        console.log('storeCommentError');
			        alert('コメントや質問作成はプロフィール詳細情報の入力が必要です')
			    }
	    })

	    
	    return false;
	});
	});
}