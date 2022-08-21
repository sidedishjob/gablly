//投稿一覧画面

// スライダー用JS
// 画像スライダー
const mySpeed = 20000;
// const mySpeed = 20000000;
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

// ひっくり返し用JS
const insideOuts = document.getElementsByClassName('slide');
// 新しいHTML要素を作成
const new_element = document.createElement('p');
new_element.textContent = 'コメントコメントコメントコメントコメント';
for(let i = 0; i < insideOuts.length; i++){
	insideOuts[i].addEventListener('click',() => {
		console.log('ID : ' + document.querySelectorAll('id^=["inside"]'));
		insideOuts[i].classList.add('slide-active');
		setTimeout(() => {
			// 指定した要素の中の末尾に挿入
			insideOuts[i].appendChild(new_element);
		}, 1000);
	}, false);
};
// ひっくり返し用JS


