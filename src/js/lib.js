// ライブラリ読み込み用ファイル
// expose-loaderを通してインポートすることでグローバルオブジェクトにする

import 'expose-loader?exposes[]=$&exposes[]=jQuery!jquery' // jQuery

// import 'expose-loader?exposes[]=baguetteBox!baguettebox.js' // BaguetteBox

// import 'trunk8' // Trunk8

import './module/_hashScroll' // アンカーリンクスクロール
import './module/_spMenuToggle' // SPメニュー開閉

// closestのポリフィル
if (!Element.prototype.matches) {
  Element.prototype.matches = Element.prototype.msMatchesSelector || Element.prototype.webkitMatchesSelector
}

if (!Element.prototype.closest) {
  Element.prototype.closest = function (s) {
    var el = this

    do {
      if (Element.prototype.matches.call(el, s)) return el
      el = el.parentElement || el.parentNode
    } while (el !== null && el.nodeType === 1)
    return null
  }
}
