// const uploadImageModule =(() => {
// 	const inputElement = document.getElementById('image_path')
// 	const previewElement = document.getElementById('image_prev')

// 	inputElement.addEventListener("change", event => {
// 		event.preventDefault();     // デフォルトイベントのキャンセル
// 		event.stopPropagation();    // イベントのバブリングを防ぐ

// 		// type="file"を指定されたinput要素のchangeイベントは「ファイルのリスト」を返す
// 		const file = event.target.files[0];

// 		// ファイルが存在しないか、ファイル形式が"image/*"ではないとき
// 		if (!file || !file.type.match(/image\/*/)) {
// 			alert('画像ファイルではありません。')
// 			return false;
// 		}

// 		// FileReaderのインスタンスを生成（ローカルファイルを読み込むオブジェクト）
// 		const reader = new FileReader();

// 		// FileReaderの読み込みが完了した結果（アップロードした画像ファイルのデータ）を、img要素のsrcにセット
// 		reader.addEventListener('load', event => {
// 			// event.target.resultは、base64エンコードされた画像データ
// 			previewElement.setAttribute('src', event.target.result);
// 		})

// 		// セットされたオブジェクトを読み込む
// 		reader.readAsDataURL(file);
// 	});
// })();

// 投稿一覧画面
// 画像スライダー
// window.addEventListener("DOMContentLoaded", () => {
// 	const infiniteSlider = new Swiper(".infinite-slider", {
// 	  loop: true,						//スライダーがループするようになる
// 	  loopedSlides: 1,					//ループ時に何枚のスライドを複製するか指定
// 	  slidesPerView: "auto",			//一度に何枚のスライドを表示するか指定
// 	  speed: 20000,						//
// 	  autoplay: {						//スライダー自動再生
// 		delay: 0,						//	スライドが表示されてから次のスライドに移動するまでの停止時間（今回は停止させたくないので0を指定）
// 		disableOnInteraction: false,	//
// 	  },
// 	});
// });

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
