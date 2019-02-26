var OwlCarousel = function () {
	console.log("Hello");
	return {
		initOwlCarousel: function () {
			$('.owl-slider-v4').owlCarousel({
				loop: true,
				margin: 0,
				responsive: {
					300:{
						items: 1
					},
				},
				smartSpeed: 1000,
				nav: true,
				dots: false,
				navText: ["<span class='fa fa-chevron-left'></span>","<span class='fa fa-chevron-right'></span>"],
				navContainerClass: 'owl-buttons',
			});
			$('.owl-slider-v4-team').owlCarousel({
				loop: true,
				margin: 0,
				smartSpeed: 1000,
				responsive: {
					300:{
						items: 1
					},
					500:{
						items: 2
					},
					768:{
						items: 3
					},
				},
				nav: true,
				dots: false,
				navText: ["<span class='fa fa-chevron-left'></span>","<span class='fa fa-chevron-right'></span>"],
				navContainerClass: 'owl-buttons',
			});
			$('.owl-slider-v4-gallery').owlCarousel({
				loop: true,
				smartSpeed: 1000,
				margin: 0,
				responsive: {
					300:{
						items: 1
					},
				},
				nav: false,
				dots: true,
				dotsClass: 'owl-pagination',
				dotClass: 'owl-page',
			});
			$('.owl-slider-v4-gallery-2').owlCarousel({
				loop: true,
				margin: 0,
				smartSpeed: 1000,
				responsive: {
					300:{
						items: 1
					},
					500:{
						items: 2
					},
					768:{
						items: 3
					},
				},
				nav: false,
				dots: true,
				dotsClass: 'owl-pagination',
				dotClass: 'owl-page',
			});
			$('.owl-slider-v4-testo').owlCarousel({
				loop: true,
				smartSpeed: 1000,
				margin: 0,
				responsive: {
					300:{
						items: 1
					},
				},
				nav: false,
				dots: true,
				dotsClass: 'owl-pagination',
				dotClass: 'owl-page',
			});
		}
	};
}();
