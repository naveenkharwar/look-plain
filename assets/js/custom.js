var swiper = new Swiper(
	'.featured-container',
	{
		pagination: {
			el: '.swiper-pagination',
		},
		autoplay: {
			delay: 3000,
		},
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
	}
);

	var swiper = new Swiper(
		'.related-post-container',
		{
			slidesPerView: 3,
			spaceBetween: 30,
			pagination: {
				el: '.related-post-pagination',
				clickable: true,
			},
		}
	);
