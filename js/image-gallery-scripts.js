jQuery(document).ready(function($){
	$('.section-gallery img').each(function(){
		$('.section-gallery p > a > img').parent().unwrap();
		$(this).parent().addClass('fancybox').attr('rel', 'gallery');
	});
});

jQuery(document).ready(function($){
	$('a.fancybox').fancybox({
		'overlayShow' : true,
		'overlayOpacity' : '0.8',
		'titleShow' : true,
		'titleFromAlt' : true,
		'titlePosition' : 'inside'
	});
});