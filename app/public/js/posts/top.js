//投稿一覧画面

// スライダー用JS
// 画像スライダー
const mySpeed = 20000;
// const mySpeed = 2000000;
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


//フリップ用JS
function flip(obj, slideNum) {
	//表（画像、タイトルスライド）
	/*
	ここをidにせずクラスにして取得している理由は、スライダーの仕組み上
	1スライドのソースをコピーして3重にしている為
	idで取得すると同idが3ついることになってしまい、セレクタ操作がうまく動作しない
	なのでクラスにすることによって見た目上1つのスライドに対してdisplay=noneをかけているが、
	PG上だと3つ分（1スライド）全てにdisplay=noneをかけているという流れになっている
	なのでクラスで指定してセレクタ操作を行っている
	*/
	const slideFrontNodeList = document.querySelectorAll('.slide-front-item-' + slideNum);
	const slideBackNodeList = document.querySelectorAll('.slide-back-item-' + slideNum);
	/*------ IE11の対策 -----*/
	const slideFrontItems = Array.prototype.slice.call(slideFrontNodeList);  //Nodelistを配列化
	const slideBackItems = Array.prototype.slice.call(slideBackNodeList);  //Nodelistを配列化
	/*------ IE11の対策 -----*/

	//フリップ処理呼び出し
	rotationAnimationLoop(obj, slideFrontItems, slideBackItems, 0);

}
//フリップ用JS

//フリップ処理を指定された角度になるまでループさせる関数
const rotationAnimationLoop = (obj, slideFrontItems, slideBackItems, deg) =>{
	if( deg <= 180 ){
		rotationAnimation(obj, slideFrontItems, slideBackItems, deg);
		setTimeout( 
			() => {
				rotationAnimationLoop(obj, slideFrontItems, slideBackItems, deg+= 3 ) 
			}, 
		1 );
	}
}

//フリップ処理
const rotationAnimation = (obj, slideFrontItems, slideBackItems, deg) =>{
	if ( 90 === deg ){
		//既定値到達でスライド切替
		//対象のスライド表裏判定（active無：表、active有：裏）
		if (!obj.classList.contains('active')) {
			//表スライド表示中の場合（表→裏）
			// articleにactive付与（activeが付与されるとCSSで反転アニメーションが実行される）
			obj.classList.add('active');
	
			//表のスライド非表示
			slideFrontItems.forEach(function(element) {
				element.style.display = 'none';
				//左右反転してしまう為の対策
				element.classList.add('notRevers');
			});
		
			//裏のスライド表示
			slideBackItems.forEach(function(element) {
				element.style.display = 'block';
			});
		} else {
			//裏スライド表示中の場合（裏→表）
			// articleのactive削除（activeが削除されるとCSSで反転アニメーションが実行される）
			obj.classList.remove('active');
	
			//表のスライド表示
			slideFrontItems.forEach(function(element) {
				element.style.display = 'block';
			});
		
			//裏のスライド非表示
			slideBackItems.forEach(function(element) {
				element.style.display = 'none';
			});
		}

	} else {
		//回転
		obj.style.webkitTransform = 'rotateY(' + deg + 'deg)';
	}
}