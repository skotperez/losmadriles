(function($) {

	$(document).ready(function(){
		var count=0;
		var styleOutput='';
		$('.carousel-caption-bg').each(function() {
			count++;
			$(this).parent().addClass('carousel-caption-sides carousel-caption-sides-'+count);
			var bgHeight = $('.carousel-caption-sides-'+count+' .carousel-caption-bg').actual('outerHeight');
			styleOutput += '.carousel-caption-sides-'+count+':before { border-top-width:'+bgHeight/2+'px; border-bottom-width:'+bgHeight/2+'px; }.carousel-caption-sides-'+count+':after { border-top-width:'+bgHeight/2+'px; border-bottom-width:'+bgHeight/2+'px; }';
		});
		$('<style>'+styleOutput+'</style>').appendTo('body');
	});

})(jQuery);
