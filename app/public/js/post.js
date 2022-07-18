// スライダー用JS
// 画像スライダー
const mySpeed = 20000;
const slideLength = document.querySelectorAll('.card .swiper-slide').length;

const changeTranslate = (swiper) => {
  let currentTranslate = swiper.getTranslate();
  let slideWidth = document.querySelector('.card .swiper-slide-active').offsetWidth;
  swiper.setTranslate(currentTranslate - slideWidth);
  swiper.setTransition(mySpeed);
}

const initSwiper = () => {
  const mySwiper = new Swiper('.card .swiper', {
	slidesPerView: 'auto',
	spaceBetween: 16,
	loop: true,
	loopedSlides: slideLength,
	speed: mySpeed,
	autoplay: {
	  delay: 0,
	  disableOnInteraction: false,
	},
	freeMode: {
	  enabled: true,
	  momentum: false,
	},
	grabCursor: true,
	breakpoints: {
	  1025: {
		spaceBetween: 32,
	  }
	},
	on: {
	  touchEnd: (swiper) => {
		changeTranslate(swiper);
	  },
	}
  });
};

window.addEventListener('load', function(){
  initSwiper();
});
// スライダー用JS
