import $ from 'jquery';


export function fetchLikeCount(){
	$(function () {
		let question_id = $('.question').data('id');
	    $.ajax({
	            headers: {
	                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	            },
	            url: '/like/' + question_id,  
	            type: 'GET', //受け取り方法の記述（GETもある）
	            data: {
	                'question_id': question_id,
	            },
	            dataType: 'json',
	            cache: false,
	             success: function(response){
	             	let likes = response.likes;
	             	let authorLikes = response.authorLikes;
	             	let $like_count_areas = $('.js-like-count');
	             	let $unlike_icons = $('.js-unlike');
	             	let $like_icons = $('.js-like');
	             	if(response.auth){
	             		likes.forEach(function(like,i){
				      		$($like_count_areas[i]).html('');
				      		$($like_count_areas[i]).append(like);
				      		if(authorLikes[i]){
				      			$($like_icons[i]).removeClass('show');
				      			$($unlike_icons[i]).addClass('show');
				      
				      		}else{
				      			$($unlike_icons[i]).removeClass('show');
				      			$($like_icons[i]).addClass('show');
				      		}
			      		})	
	             	}			      	
			    },
			    error: function(){
			        console.log('likefetchError');

			    }
	    })

	    
	    return false;

	});
}


export function likeStore(btns, comment_ids){
	btns.on('click', function (e) {
		e.preventDefault();
		let index =btns.index($(this));
		let comment_id = comment_ids[index];
		let question_id = $('.question').data('id'); 
	    $.ajax({
	            headers: {
	                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	            },
	            url: '/like',
	            type: 'POST', //受け取り方法の記述（GETもある）
	            data: {
	                'question_id': question_id,
	                'comment_id': comment_id,
	            },
	            dataType: 'json',
	            cache: false,
	             success: function(response){
			      	fetchLikeCount();
			      		      	
			    },
			    error: function(){
			        console.log('likeStoreError');
			    }
	    })
	    
	    return false;
	});

}
export function unlikeStore(btns, comment_ids){
	$(function () {	
	btns.on('click', function (e) {
		e.preventDefault();
		let index =btns.index($(this));
		let comment_id = comment_ids[index];
		let question_id = $('.question').data('id');
	    $.ajax({
	            headers: {
	                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	            },
	            url: '/unlike',
	            type: 'POST', //受け取り方法の記述（GETもある）
	            data: {
	                'question_id': question_id,
	                'comment_id': comment_id,
	            },
	            dataType: 'json',
	            cache: false,
	             success: function(response){             	
			      	fetchLikeCount();
			    },
			    error: function(){
			        console.log('unlikeStoreError');
			    }
	    })
	    
	    return false;
	});
	});
}