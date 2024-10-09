F1GENZ.Index = {
	init: function(){
		F1GENZ.Helper.productSlider('.section_index--slider .section_index--slider-items', 1, 1, 1, 1, { autoplay: true, infinite: true, fade: true }); 
		if($(".home-flashsale-right .product-item").length > 0) F1GENZ.Helper.productSlider('.home-flashsale-right', 4, 3, 2, 2,{ autoplay: true, infinite: true, dots: false })
		
		F1GENZ.Helper.productSlider('.home-product-new-slider', 3, 2, 1, 1, { autoplay: true, infinite: true, dots: false })
		F1GENZ.Helper.productSlider('.home-product-list-slider-1', 5, 4, 3, 2, { autoplay: true, infinite: true, dots: false })
		F1GENZ.Helper.productSlider('.home-product-list-slider-2', 4, 3, 2, 2, { autoplay: true, infinite: true, dots: false })
		F1GENZ.Helper.productSlider('.home-product-stylist-item-wrapper', 2, 2, 2, 2, { autoplay: true, infinite: false, dots: false })
		F1GENZ.Helper.productSlider('.home-blogs-items', 3, 2, 1, 1, { autoplay: true, infinite: true, dots: false });
		this.home_pos();
		
		F1GENZ.Helper.productSlider('.test-slicks', 5, 4, 3, 1, { autoplay: true, infinite: true, dots: false })
	},
	home_pos: function(){
		$('body').on('click touch', '.home-product-pos .home-product-pos-item .home-product-pos-item-dots', function(){
			var that = $(this);
			var elem_width = $(".home-product-pos").width();
			that.parent().siblings().removeClass('left right');
			if(elem_width - that.offset().left < 400)
				that.parent().toggleClass('right');
			else
				that.parent().toggleClass('left');

			if($(window).width() < 991) $('body, html').addClass('open-noscroll open-overplay'); 
		}) 
	},
}
f1genzPS && F1GENZ.Index.init();