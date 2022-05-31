
import $ from 'jquery';


export function fixed(){
	let $fixed_ele = $('.js-fixed');
	if($fixed_ele.length !==0){
		const fixed_ele_height = $fixed_ele.offset().top;

	//console.log($fixed_ele.offset().top);
	$(window).on('scroll', ()=>{
		let current_height = $(window).scrollTop();
		//console.log('current_height:'+current_height);
		//console.log('$fixed_ele.offset().top:'+$fixed_ele.offset().top);
		if(current_height >fixed_ele_height ) {
			$fixed_ele.addClass('fixed');

		}else if(current_height < fixed_ele_height ){
			$fixed_ele.removeClass('fixed');
		}
	})

	}
	
}
export function flashOut(){
        $('.js-flash-message').fadeOut(10000);

}


export function showList(){
	let $select = $('.js-select');
	let $student_area = $('.js-student-details');
	let $worker_area = $('.js-worker-details');
	//console.log($worker_area.find('select'))
	$(window).on('load', ()=>{
		if($select.val() === '在職'){
			$student_area.removeClass('show');
			$worker_area.addClass('show');
			$student_area.find('select').prop('disabled', true);
			$worker_area.find('select').prop('disabled', false);
		}else{
			$student_area.addClass('show');
			$worker_area.removeClass('show');
			$student_area.find('select').prop('disabled', false);
			$worker_area.find('select').prop('disabled', true);


		}

	})

	$select.on('change', ()=>{
		if($select.val() === '在職'){
			$student_area.removeClass('show');
			$worker_area.addClass('show');
			$student_area.find('select').prop('disabled', true);
			$worker_area.find('select').prop('disabled', false);
		}else{
			$student_area.addClass('show');
			$worker_area.removeClass('show');
			$student_area.find('select').prop('disabled', false);
			$worker_area.find('select').prop('disabled', true);

		}
	})
}