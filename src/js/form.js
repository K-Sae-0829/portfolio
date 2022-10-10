// import flatpickr from 'flatpickr' // flatpickr
// import 'flatpickr/dist/l10n/ja' // flatpickr日本語化
/*
<script src="<?php echo T_URL; ?>/js/form.min.js?v=<?php echo filemtime(T_PATH . '/js/form.min.js'); ?>"></script>
*/

/*
##     ##    ###    ##       #### ########     ###    ######## ########
##     ##  ##   ##  ##        ##  ##     ##  ##   ##     ##    ##
##     ## ##     ## ##        ##  ##     ## ##     ##    ##    ######
 ##   ##  ######### ##        ##  ##     ## #########    ##    ##
   ###    ##     ## ######## #### ########  ##     ##    ##    ########
*/
/*
jQuery-Validation-Engine
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.0.1/jquery-migrate.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/languages/jquery.validationEngine-ja.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/jquery.validationEngine.min.js"></script>
*/
if (document.querySelector('[name^="ok"]')) {
  // 規約同意のエラー文を変更する
  document.querySelector('[name^="ok"]').setAttribute('data-errormessage', '同意の上チェックしてください')
}

if (document.getElementsByClassName('mw_wp_form')[0]) {
  // MW側のSubmit禁止処理を外す
  const observeItem = document.querySelector('input[type="submit"]')
  const observer = new MutationObserver((records) => {
    if (!observeItem.hasAttribute('disabled')) {
      return
    }
    observeItem.removeAttribute('disabled')
  })
  observer.observe(observeItem, {
    // 指定要素の変化を監視
    attributes: true, // 属性の変化を監視
    attributeFilter: ['disabled'], // 監視する属性
  })

  $('.mw_wp_form').find('form').validationEngine({
    scrollOffset: 200,
  })
}
/*
条件に応じて以下のclassを各inputに設定する
■必須入力
validate【required】
■指定の書式
validate【custom【email】】
validate【custom【phone】】
validate【custom【url】】
custom【date】
■複合
validate【required,custom【email】】
validate【required,custom【phone】】
■指定IDと入力内容が一致
validate【equals【id】】
■指定IDがチェック済みなら必須入力に変更
validate【condRequired【id】】
■指定範囲の文字数
validate【maxSize【10】】
validate【minSize【10】】
■整数のみ
validate【custom【integer】】
■数字のみ
validate【custom【number】】
■英数字のみ
validate【custom【onlyLetterNumber】】
■英字と空白のみ
validate【custom【onlyLetterSp】】
■数字と空白のみ
validate【custom【onlyNumberSp】】
■指定範囲の数値
validate【min【-5】】
validate【max【30】】
■指定範囲の日付
validate【custom【date】,past【2010/01/01】】
validate【custom【date】,future【NOW】】
■チェックボックスのチェック数
validate【minCheckbox【2】】
validate【maxCheckbox【2】】
*/

// ショートコード誤認回避の【】を[]に戻す
const validateItems = document.querySelectorAll('[class*="【"]')
if (validateItems[0]) {
  for (let index = 0; index < validateItems.length; index++) {
    const validateItem = validateItems[index]
    const validateClass = validateItem.getAttribute('class').replace(/【/g, '[').replace(/】/g, ']')
    validateItem.setAttribute('class', validateClass)
  }
}

/*
 ######  ######## ##       ########  ######  ########
##       ##       ##       ##       ##          ##
 ######  ######   ##       ######   ##          ##
      ## ##       ##       ##       ##          ##
 ######  ######## ######## ########  ######     ##
*/
// // 空のセレクトボックスに文を入れる
// const blankSelect = document.querySelectorAll('.mw_wp_form select option[value=""]')
// if (blankSelect[0]) {
//   for (let index = 0; index < blankSelect.length; index++) {
//     blankSelect[index].innerText = '選択してください'
//   }
// }

/*
######## #### ########
    ##    ##  ##     ##
   ##     ##  ########
  ##      ##  ##
######## #### ##
*/
/*
郵便番号から住所を検索する
以下の外部JSが必要
<script src="//ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
*/
// /* global AjaxZip3 */
// if (document.getElementById('js-zip')) {
//   document.getElementById('js-zip').addEventListener(
//     'click',
//     function () {
//       // 各入出力先をnameから指定
//       // 郵便番号上3桁もしくは7桁, 郵便番号下4桁（不要なら空欄）, 都道府県の出力先, 市区町村～町域の出力先
//       AjaxZip3.zip2addr('zip', '', 'address', 'address')
//     },
//     false
//   )
// }

/*
 ######   #######  ##    ## ##     ## ######## ########  ########
##       ##     ## ####  ## ##     ## ##       ##     ##    ##
##       ##     ## ## ## ## ##     ## ######   ########     ##
##       ##     ## ##  ####  ##   ##  ##       ##   ##      ##
 ######   #######  ##    ##    ###    ######## ##     ##    ##
*/
// 特定のテキストフォームを適した形式に変える

// // 電話番号→tel
// let convertInput = document.querySelector('[type="text"][name="tel"]')
// if (convertInput) {
//   convertInput.setAttribute('type', 'tel')
// }

// // 郵便番号→number
// // スピンボタンが付いてしまうので以下のようなCSSで消す必要がある
// /*
// input[type="number"]::-webkit-outer-spin-button,
// input[type="number"]::-webkit-inner-spin-button {
//   -webkit-appearance: none;
//   margin: 0;
// }
// input[type="number"] {
//   -moz-appearance: textfield;
// }
// */
// convertInput = document.querySelector('[type="text"][name="zip1"]')
// if (convertInput) {
//   convertInput.setAttribute('type', 'number')
// }
// convertInput = document.querySelector('[type="text"][name="zip2"]')
// if (convertInput) {
//   convertInput.setAttribute('type', 'number')
// }
// // メール→email
// convertInput = document.querySelector('[type="text"][name="mail"]')
// if (convertInput) {
//   convertInput.setAttribute('type', 'email')
// }

/*
########          ########  ####  ######  ##    ## ######## ########
##     ##         ##     ##  ##  ##    ## ##   ##  ##       ##     ##
##     ##         ##     ##  ##  ##       ##  ##   ##       ##     ##
##     ## ####### ########   ##  ##       #####    ######   ########
##     ##         ##         ##  ##       ##  ##   ##       ##   ##
##     ##         ##         ##  ##    ## ##   ##  ##       ##    ##
########          ##        ####  ######  ##    ## ######## ##     ##
*/
/*
flatpickrによるデートピッカー
本コード冒頭のインポートと_js.scssのCSSインポートを有効化して使用

例：
<input type="text" name="date1" class="js-date">
<input type="text" name="date2" class="js-date">
*/

// // ブラウザバック時に入力値を戻すためにpageshowで動作させる
// window.addEventListener('pageshow', function () {
//   const datepicker = flatpickr('.js-date', {
//     // 指定クラスにデートピッカーを付ける
//     // minDate: new Date().fp_incr(1), // 最短設定日 n日後から
//     // maxDate: new Date().fp_incr(30), // 最長設定日 n日後まで
//     // mode: 'range', // 範囲で指定させる
//     locale: 'ja',
//     altFormat: 'Y/m/d',
//     dateFormat: 'Y/m/d',
//     disableMobile: true, // SP時にブラウザ標準の日付UIに切り替えない
//     // altFormat: 'Y/m/d H:i',
//     // dateFormat: 'Y/m/d H:i',
//     // enableTime: true, // 時間指定可能にする
//     // time_24hr: false, // 24h/AMPM形式
//     disable: [
//       // 選択禁止する日付　trueを返すと禁止
//       // function (date) {
//       //   // 指定番号の曜日と合致したら禁止　0:日曜～6:土曜
//       //   if (date.getDay() === 0) {
//       //     return true
//       //   }
//       // },
//     ],
//     onChange: function (selectedDates, dateStr, instance) {},
//   })

//   // デフォルトのflatpickrにはクリアボタンが無いのでカレンダー内に増設する
//   const datepickerList = document.querySelectorAll('.flatpickr-calendar')
//   for (let index = 0; index < datepickerList.length; index++) {
//     const element = datepickerList[index]
//     const datepickerBtn = document.createElement('button')
//     datepickerBtn.innerHTML = '×クリア' // 文言
//     datepickerBtn.setAttribute('type', 'button')
//     datepickerBtn.setAttribute('style', 'padding: 5px;color: #F67A79')
//     datepickerBtn.setAttribute('data-datepicker-clear', index)
//     datepickerBtn.addEventListener('click', function (e) {
//       if (Array.isArray(datepicker)) {
//         datepicker[this.dataset.datepickerClear].clear() // クリア処理
//         datepicker[this.dataset.datepickerClear].close() // カレンダーを閉じる
//       } else {
//         datepicker.clear() // クリア処理
//         datepicker.close() // カレンダーを閉じる
//       }
//     })
//     element.appendChild(datepickerBtn)
//   }
// })
