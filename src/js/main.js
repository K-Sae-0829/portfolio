/* global  */ // tUrl等のグローバル変数を宣言する
import luxy from 'luxy.js'
import 'core-js/features/number/is-nan' // SwiperのIE対応
import 'custom-event-polyfill' // SwiperのIE対応
import scrollLock from './functions/_scrollLock.js' // スクロールロック
import { Autoplay, Controller, EffectFade, Navigation, Pagination, Swiper } from 'swiper'
Swiper.use([Autoplay, Controller, EffectFade, Navigation, Pagination]) // Swiper宣言
// その他、Swiperで使う機能があったら上に追加で宣言する
// A11y, Autoplay, Controller, EffectCoverflow, EffectCube, EffectFade, EffectFlip, HashNavigation, History, Keyboard, Lazy, Mousewheel, Navigation, Pagination, Parallax, Scrollbar, Thumbs, Virtual, Zoom,
/*$.scrollify({
  section: '.js-box', //1ページスクロールさせたいエリアクラス名
  scrollbars: 'false', //スクロールバー表示・非表示設定
  interstitialSection: '#header,#footer', //ヘッダーフッターを認識し、1ページスクロールさせず表示されるように設定
  easing: 'swing', // 他にもlinearやeaseOutExpoといったjQueryのeasing指定可能
  scrollSpeed: 300, // スクロール時の速度
})
*/
//   ####  ##      ##  ####    #####
//  ##     ##      ##  ##  ##  ##
//   ###   ##      ##  ##  ##  #####
//     ##  ##      ##  ##  ##  ##
//  ####   ######  ##  ####    #####

if (document.getElementById('js-topWorkSlide')) {
  const swiper = new Swiper('.js-topWorkSlide', {
    direction: 'vertical',
    loop: true,
    slidesPerView: 'auto',
    loopedSlides: 6,
    speed: 5000,
    spaceBetween: 10,
    allowTouchMove: false,
    autoplay: {
      delay: 0,
      stopOnLastSlide: false,
      disableOnInteraction: false,
    },
  })
}

if (document.getElementById('js-topOriginalSlide')) {
  const swiper = new Swiper('.js-topOriginalSlide', {
    effect: 'fade',
    loop: true,
    speed: 2000,
    allowTouchMove: false,
    preloadImages: true, // スライド内の画像を読み終えてから開始
    fadeEffect: {
      // フェードオプション
      crossFade: true, // クロスフェード
    },
    autoplay: {
      delay: 4000, // 待機時間
      stopOnLastSlide: false,
      disableOnInteraction: false,
    },
  })
}

/*if (document.getElementById('js-mvNewsSlide')) {
  const swiper = new Swiper('.js-mvNewsSlide', {
    loop: true,
    slidesPerView: 1,
    speed: 600,
    allowTouchMove: false,
    autoplay: {
      delay: 3000,
      stopOnLastSlide: false,
      disableOnInteraction: false,
    },
  })
}

/*
if (document.getElementById('js-topWorkSlide--return')) {
  const swiper = new Swiper('.js-topWorkSlide--return', {
    direction: 'vertical',
    loop: true,
    slidesPerView: 'auto',
    loopedSlides: 6,
    speed: 5000,
    spaceBetween: 10,
    allowTouchMove: false,
    autoplay: {
      delay: 0,
      stopOnLastSlide: false,
      disableOnInteraction: false,
      reverseDirection: true,
    },
  })
}
*/

/*
#### ##    ## ########          #######  ########   ######
 ##  ####  ##    ##            ##     ## ##     ## ##
 ##  ## ## ##    ##    ####### ##     ## ########   ######
 ##  ##  ####    ##            ##     ## ##     ##       ##
#### ##    ##    ##             #######  ########   ######
*/

if (document.getElementsByClassName('js-in')[0]) {
  intObs()
}
function intObs() {
  const intObsOption = {
    // root: document.querySelector('#obsArea'), // 監視領域 省略でビューポート
    rootMargin: '-20px 0px', // 指定px,%分判定領域を増減する -50% 0pxで画面中央の走査線になる
    threshold: 0, // 発火判定の閾値 0.1=10%以上交差で発火 0で接触次第発火
  }
  const observer = new IntersectionObserver(intObsCallback, intObsOption)
  const intObsItems = document.getElementsByClassName('js-in')
  for (let index = 0; index < intObsItems.length; index++) {
    const intObsItem = intObsItems[index]
    observer.observe(intObsItem) // 監視対象に加える
  }
  function intObsCallback(entries) {
    for (let index = 0; index < entries.length; index++) {
      const entry = entries[index]
      if (entry.isIntersecting) {
        const entryItem = entry.target
        entryItem.classList.add('active')
        observer.unobserve(entryItem) // 監視対象から外す
      }
    }
  }
}

//  ###    ###   #####   ####      ###    ##
//  ## #  # ##  ##   ##  ##  ##   ## ##   ##
//  ##  ##  ##  ##   ##  ##  ##  ##   ##  ##
//  ##      ##  ##   ##  ##  ##  #######  ##
//  ##      ##   #####   ####    ##   ##  ######

const modalOverlay = document.getElementById('modalOverlay') // モーダル用オーバーレイ
const modals = document.getElementsByClassName('js-modal') // モーダル本体
const modalYoutube = document.getElementsByClassName('js-modal-youtube') // モーダル内YouTube
if (modals[0]) {
  window.addEventListener('click', (e) => {
    if (!e.target.closest('.js-modal-open')) {
      return
    }
    e.preventDefault()
    modalClose()
    const target = e.target.closest('.js-modal-open').dataset.modal

    const openModals = document.querySelectorAll('.js-modal--' + target)
    for (const openModal of openModals) {
      openModal.classList.add('active')
    }

    modalOverlay.classList.add('active')
    scrollLock('body', '#modalOverlay')

    // YouTubeのsrcを読み込む
    const youtube = document.querySelector('.js-modal--' + target + ' .js-modal-youtube')
    if (youtube) {
      youtube.setAttribute('src', youtube.dataset.src)
    }
  })
  // モーダル撤去
  window.addEventListener('click', (e) => {
    if (!e.target.closest('.js-modal-close')) {
      return
    }
    e.preventDefault()
    modalClose()
    modalOverlay.classList.remove('active')
    scrollLock('body', '#modalOverlay')
  })
}

function modalClose() {
  // モーダルを消す
  for (let index = 0; index < modals.length; index++) {
    const modal = modals[index]
    modal.classList.remove('active')
  }
  // YouTubeのsrcを消して動画を止める
  for (let index = 0; index < modalYoutube.length; index++) {
    modalYoutube[index].setAttribute('src', '')
  }
}

//luxy
window.onload = function () {
  luxy.init()
}
