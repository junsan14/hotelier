import $ from 'jquery';

function disableScroll(event) {
  event.preventDefault();
}

export function smartMenu(){
	 $('.smart-menu').on('click', function(){
    	$(this).toggleClass('active');
    	$(this).siblings('.menu').toggleClass('active');
        //iPhoneスクロール禁止
        $('body').toggleClass('no-scroll');
        if($('body').hasClass('no-scroll')){
            document.addEventListener('touchmove', disableScroll, { passive: false });
        }else{
            document.removeEventListener('touchmove', disableScroll, { passive: false });

        }
    })


}
