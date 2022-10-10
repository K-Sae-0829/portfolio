import autoScroll from '../functions/_autoScroll'
// スムーズスクロールの補正要素　要素IDか数値で指定
const scrollAdjust = '#header'
// const scrollAdjust = 0

// アンカーをクリックしたらスクロール
const anchorLinks = document.querySelectorAll('a[href*="#"]:not(.no-move):not([target="_blank"])')
for (let index = 0; index < anchorLinks.length; index++) {
  const anchorLink = anchorLinks[index]
  anchorLink.addEventListener(
    'click',
    function (e) {
      const href = this.getAttribute('href') // hrefの中身全体
      const url = href.replace(/#.*/gi, '') // 比較用　ハッシュを除いたURLを取得

      // デバッグ表示　一行目が他の行のいずれと一致すればスムーズスクロール処理
      // console.table([[url], [''], [location.href], ['./'], [location.pathname]])

      if (url !== '' && url !== location.href && url !== './' && url !== location.pathname) {
        // ページ遷移が行われる場合は普通のリンクにする
        return
      }

      e.preventDefault() // デフォルトのイベントを除去

      const hash = href.replace(/.*#/gi, '#') // 移動用　ハッシュのみ取得

      if (document.body.classList.contains('js-scrollLock--active')) {
        // scrollLockモジュールでbodyが固定されている場合は少し待機して解除を期待する
        setTimeout(() => {
          autoScroll(hash, scrollAdjust)
        }, 100)
      } else {
        autoScroll(hash, scrollAdjust)
      }
    },
    false
  )
}

// アクセス時にハッシュがある場合はスクロール
if (location.hash) {
  window.setTimeout(() => {
    autoScroll(location.hash, scrollAdjust, false)
  }, 100)
}
