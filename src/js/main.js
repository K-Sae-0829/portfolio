/* global  */ // tUrl等のグローバル変数を宣言する
//import luxy from 'luxy.js'
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

if (document.getElementById('js-topOriginalSlide')) {
  const swiper = new Swiper('.js-topOriginalSlide', {
    effect: 'fade',
    loop: true,
    speed: 2000,
    allowTouchMove: false,
    //preloadImages: true, // スライド内の画像を読み終えてから開始
    fadeEffect: {
      // フェードオプション
      crossFade: true, // クロスフェード
    },
    autoplay: {
      delay: 1000, // 待機時間
      //stopOnLastSlide: false,
      disableOnInteraction: false,
    },
  })
}

/*
if (document.getElementById('js-topOriginalSlide')) {
  // Swiperコンテナを検出したら実行
  const slideItem = document.getElementById('js-topOriginalSlide')
  // eslint-disable-next-line no-unused-vars
  const topOriginalSlide = new Swiper(slideItem, {
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
      delay: 1000, // 待機時間
      //stopOnLastSlide: false,
      disableOnInteraction: false,
    },
  })
}
*/

if (document.getElementById('js-topWorkSlide')) {
  const swiper02 = new Swiper('.js-topWorkSlide', {
    direction: 'vertical',
    loop: true,
    slidesPerView: 'auto',
    loopedSlides: 6,
    speed: 5000,
    spaceBetween: 10,
    allowTouchMove: false,
    loopAdditionalSlides: 20,
    autoplay: {
      delay: 0,
      //stopOnLastSlide: false,
      //disableOnInteraction: false,
    },
  })
}

if (document.getElementById('js-workImgSlide')) {
  const swiper03 = new Swiper('.js-workImgSlide', {
    //effect: 'fade',
    slidesPerView: 1,
    loop: true,
    //slidesPerView: 1,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
      type: 'bullets',
    },
    //preloadImages: true, // スライド内の画像を読み終えてから開始
    //fadeEffect: {
    // フェードオプション
    //crossFade: true, // クロスフェード
    //},
  })
}

if (document.getElementById('js-workImgSlide-sp')) {
  const swiper04 = new Swiper('.js-workImgSlide-sp', {
    //effect: 'fade',
    slidesPerView: 1,
    loop: true,
    //slidesPerView: 1,
    pagination: {
      el: '.swiper-pagination-sp',
      clickable: true,
      type: 'bullets',
    },
    //preloadImages: true, // スライド内の画像を読み終えてから開始
    //fadeEffect: {
    // フェードオプション
    //crossFade: true, // クロスフェード
    //},
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
//const windowWidth = window.innerWidth
//const breakPointA = 1024
//const breakPointB = 769

//const isMobileSize = windowWidth < breakPointA
//const isTabletSize = windowWidth <= breakPointB && windowWidth > breakPointA
//const isPcSize = windowWidth > breakPointB
/*
if (isMobileSize) {
} else {
  window.onload = function () {
    luxy.init()
  }
}
*/

/*
########    ###    ########
   ##      ## ##   ##     ##
   ##     ##   ##  ##     ##
   ##    ##     ## ########
   ##    ######### ##     ##
   ##    ##     ## ##     ##
   ##    ##     ## ########
*/
//任意のタブにURLからリンクするための設定
function GethashID(hashIDName) {
  if (hashIDName) {
    //タブ設定
    $('.singleWorks__tab-area li')
      .find('a')
      .each(function () {
        //タブ内のaタグ全てを取得
        var idName = $(this).attr('href') //タブ内のaタグのリンク名（例）#lunchの値を取得
        if (idName === hashIDName) {
          //リンク元の指定されたURLのハッシュタグ（例）http://example.com/#lunch←この#の値とタブ内のリンク名（例）#lunchが同じかをチェック
          var parentElm = $(this).parent() //タブ内のaタグの親要素（li）を取得
          $('.singleWorks__tab-area li').removeClass('active') //タブ内のliについているactiveクラスを取り除き
          $(parentElm).addClass('active') //リンク元の指定されたURLのハッシュタグとタブ内のリンク名が同じであれば、liにactiveクラスを追加
          //表示させるエリア設定
          $('.singleWorks__main-area').removeClass('is-active') //もともとついているis-activeクラスを取り除き
          $(hashIDName).addClass('is-active') //表示させたいエリアのタブリンク名をクリックしたら、表示エリアにis-activeクラスを追加
        }
      })
  }
}

//タブをクリックしたら
$('.singleWorks__tab-area a').on('click', function () {
  var idName = $(this).attr('href') //タブ内のリンク名を取得
  GethashID(idName) //設定したタブの読み込みと
  return false //aタグを無効にする
})

// 上記の動きをページが読み込まれたらすぐに動かす
$(window).on('load', function () {
  $('.singleWorks__tab-area li:first-of-type').addClass('active') //最初のliにactiveクラスを追加
  $('.singleWorks__main-area:first-of-type').addClass('is-active') //最初の.areaにis-activeクラスを追加
  var hashName = location.hash //リンク元の指定されたURLのハッシュタグを取得
  GethashID(hashName) //設定したタブの読み込み
})

/*
##    ##    ###    ########  ########   #######  ##      ##
###   ##   ## ##   ##     ## ##     ## ##     ## ##  ##  ##
####  ##  ##   ##  ##     ## ##     ## ##     ## ##  ##  ##
## ## ## ##     ## ########  ########  ##     ## ##  ##  ##
##  #### ######### ##   ##   ##   ##   ##     ## ##  ##  ##
##   ### ##     ## ##    ##  ##    ##  ##     ## ##  ##  ##
##    ## ##     ## ##     ## ##     ##  #######   ###  ###
*/
$(window).on('load', function () {
  var box = $('.js_target') //検索対象のDOMを格納する
  var conditions = $('.js_conditions') //現在の条件の選択状況を保持するオブジェクト
  var findConditions //各data-typeの子要素(input)を格納する
  var currentType //現在のdata-typeを示す
  var count = 0 //検索ヒット数
  var checkcount = 0 //各data-typeのチェックボックス選択数
  var data_check = 0 //対象項目のデータがどれだけチェック状態と一致しているか

  var condition = {} //チェックボックスの入力状態を保持するオブジェクト

  $('.js_denominator').text(box.length) //件数表示の分母をセット

  for (var i = 0; i < conditions.length; i++) {
    //ターゲットのdata-typeを参照し、メソッドとしてconditionに個別に代入する
    currentType = conditions[i].getAttribute('data-type')
    condition[currentType] = []
  }

  function setConditions() {
    //条件設定

    count = 0
    box.removeClass('js_selected')

    for (var i = 0; i < conditions.length; i++) {
      //data-typeごとの処理

      currentType = conditions[i].getAttribute('data-type')

      findConditions = conditions[i].querySelectorAll('input')

      for (var n = 0; n < findConditions.length; n++) {
        //inputごとの処理

        if (findConditions[n].checked) {
          //現在選択中のインプットが選択されている場合
          condition[currentType][findConditions[n].value] = true
          checkcount++
        } else {
          condition[currentType][findConditions[n].value] = false
        }
        if (findConditions.length === n + 1) {
          //ループが最後の場合
          if (checkcount === 0) {
            for (var t = 0; t < findConditions.length; t++) {
              condition[currentType][findConditions[t].value] = true
            }
          }
          checkcount = 0
        }
      }
    }

    for (var m = 0, len = box.length; m < len; ++m) {
      //最初に取得したターゲットの情報と、現在のinputの選択状態を比較して処理を行う

      for (i = 0; i < conditions.length; i++) {
        //ターゲットのdata-typeを参照し、メソッドとしてconditionに個別に代入する
        currentType = conditions[i].getAttribute('data-type')
        //現在のターゲットのtype情報をカンマ区切りで分割し、配列に代入
        var currentBoxTypes = $(box[m]).data(currentType).split(',')

        for (var j = 0; j < currentBoxTypes.length; j++) {
          if (condition[currentType][currentBoxTypes[j]]) {
            data_check++ //選択した条件のうちひとつでもマッチしてたらdata_checkを加算してループを抜ける
            break
          } else {
          }
        }
      }

      if (data_check === conditions.length) {
        count++
        $(box[m]).addClass('js_selected')
      } else {
      }
      data_check = 0
    }

    $('.js_numerator').text(count) //件数表示の分子をセット
  }

  setConditions()

  $(document).on('click', 'input', function () {
    setConditions()
  })

  $(document).on('click', '.js_release', function () {
    $('.worksSelectBlock__check input').each(function () {
      $(this).prop('checked', false)
    })
    setConditions()
  })
})

/*
   ##       ####     ####    #####
  ####     ##  ##   ##  ##  ##   ##
 ##  ##   ##       ##       ##   ##
 ##  ##   ##       ##       ##   ##
 ######   ##       ##       ##   ##
 ##  ##    ##  ##   ##  ##  ##   ##
 ##  ##     ####     ####    #####

*/

document.querySelectorAll('.js-accordionBtn').forEach(function (el) {
  const next = el.nextElementSibling
  const nextH = next.scrollHeight + 'px'
  next.style.overflow = 'hidden'
  next.style.height = 0
  el.onclick = () => (next.style.height = el.classList.toggle('open') ? nextH : 0)
})
