import $ from 'jquery';

export function fetchCategory(){
	$(function () {
		
		$('select[name="type"]').on('change', ()=>{
			let type_id = $('select[name="type"]').val();
			$.ajax({
	            headers: {
	                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	            },
	            url: '/category/'+ type_id,  
	            type: 'GET', 
	            dataType: 'json',
	             success: function(response){
	           		let categories = response.categories;
	           		$('.js-category-list').html('');
	           		categories.forEach(function(category,i){
	           			$('.js-category-list').append(
	             			'<option value="'+ category.id + '">' +
	             			category.name + '関連'+
	             			'</option>'	   
	             		)
	           		})			      	
			    },
			    error: function(){
			        console.log('エラー');

			    }
	    	})
	    })

		
	    

	    
	    return false;

	});

}