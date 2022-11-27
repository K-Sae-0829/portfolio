/* global  */ // tUrl等のグローバル変数を宣言する

// import 'core-js/features/number/is-nan' // SwiperのIE対応
// import 'custom-event-polyfill' // SwiperのIE対応
import { Autoplay, Controller, EffectFade, Navigation, Pagination, Swiper } from 'swiper'
Swiper.use([
  Autoplay,
  Controller,
  EffectFade,
  Navigation,
  Pagination,
  A11y,
  Autoplay,
  Controller,
  EffectCoverflow,
  EffectCube,
  EffectFade,
  EffectFlip,
  HashNavigation,
  History,
  Keyboard,
  Lazy,
  Mousewheel,
  Navigation,
  Pagination,
  Parallax,
  Scrollbar,
  Thumbs,
  Virtual,
  Zoom,
]) // Swiper宣言
// その他、Swiperで使う機能があったら上に追加で宣言する
// A11y, Autoplay, Controller, EffectCoverflow, EffectCube, EffectFade, EffectFlip, HashNavigation, History, Keyboard, Lazy, Mousewheel, Navigation, Pagination, Parallax, Scrollbar, Thumbs, Virtual, Zoom,
$.scrollify({
  section: '.js-box', //1ページスクロールさせたいエリアクラス名
  scrollbars: 'false', //スクロールバー表示・非表示設定
  interstitialSection: '#header,#footer', //ヘッダーフッターを認識し、1ページスクロールさせず表示されるように設定
  easing: 'swing', // 他にもlinearやeaseOutExpoといったjQueryのeasing指定可能
  scrollSpeed: 300, // スクロール時の速度
})
