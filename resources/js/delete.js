import $ from 'jquery';




export function alert(){


	let $button = $('.js-trash');

	$button.on('click', function(e){
		e.preventDefault();
		let result = window.confirm('本当に削除して良いですか');

		if(result){
			let question_id = $(this).parent().parent().data('id');
			//console.log(question_id)
			$.ajax({
	            headers: {
	                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	            },
	            url: '/question/delete',  
	            type: 'POST', 
	            dataType: 'json',
	            cache: false,
	            data:{
	            	'question_id':question_id,
	            },
	             success: function(){
	             		 
     		      	console.log('success');
     		      	location.reload();
			    },
			    error: function(){
			        console.log('alertError');

			    }
	    })



		}

	})
}