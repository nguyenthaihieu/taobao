$(window).load(function(){		
	initCarousel();	
	initSlider();
	initTabs();
});

 function initCarousel(){
$("div.slaider-video").jCarouselLite({
    btnNext: "div.videos span.next",
    btnPrev: "div.videos span.prev",
    speed: 400,
	visible: 3,
	circular: false
});
}

function initSlider(){
$('.slider ul').cycle({
        fx:     'fade',
        timeout: 5000,
        pager:  '.pager'
});
$('div.slaide ul').cycle({
        fx:     'fade',
		next: 'div.slaider-box span.next',
		prev: 'div.slaider-box span.prev',
        timeout: 5000,
        pager:  '.pagers'

   	
});
}

function initTabs(){
 $('.tabs dt').click(function(){
 var thisClass = this.className.slice(0,2);
 $('div.t1').hide();
 $('div.t2').hide();
 $('div.t3').hide();
 $('div.' + thisClass).show();
 $('.tabs dt').removeClass('tab-current');
 $(this).addClass('tab-current');
 return false;
 });
 $('dt.t1').click();
}