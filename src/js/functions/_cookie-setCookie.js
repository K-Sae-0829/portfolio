/**
 * Cookie設定関数（フロントエンド）
 * JSだけで完結する代わりに、寿命などに制約がある
 * @function setCookie
 * @param {string} key キー名
 * @param {string} val 値
 * @param {number} maxAge 寿命秒数 60 * 60 * 24 * 7で7日　iOS、macOSでは寿命7日が上限
 * @param {bool} secure SSLを必須とするか(ローカル環境などhttp下で発行されなくなるので注意)デフォルトtrue
 * @param {string} path パス　基本はデフォルト値の/で良い
 * @param {string} sameSite sameSite挙動　基本はデフォルト値のlaxで良い
 * @param {string} other その他のパラメータが必要な際に記述する
 * @return {Void}
 * Use
import setCookie from './functions/_cookie-setCookie.js' // Cookie発行
setCookie('hogeData', 'hogeText', 60 * 60) // Cookie発行
setCookie('hogeData', 'hogeText', 60 * 60, false) // Cookie発行
 */
const setCookie = (key, val, maxAge = 60 * 60 * 24 * 7, secure = true, path = '/', sameSite = 'lax', other = '') => {
  let setData = key + '=' + val + ';max-age=' + maxAge + ';path=' + path + ';samesite=' + sameSite + other
  if (secure) {
    setData += ';secure'
  }
  document.cookie = setData
}

export default setCookie

/*
長寿命のCookieが必要な場合はサーバーサイドで発行する
サーバーサイドならiOS、macOSでも7日を超えるCookieを発行できる
AjaxでPHPファイルにアクセスして発行する例

function setCookie(name, value, sec) {
  const ajaxParam = 'name=' + name + '&value=' + value + '&sec=' + sec
  const ajax = new XMLHttpRequest() // Ajaxリクエスト
  ajax.open('POST', '/cookie/', true) // GET/POST, URL, 非同期処理
  ajax.setRequestHeader('X-Requested-With', 'XMLHttpRequest') // Ajaxアクセスを明示するリクエストヘッダー
  ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded') // POST時に必要なリクエストヘッダー
  ajax.responseType = 'text' // 取得タイプ document text json
  ajax.timeout = 10000 // タイムアウト判定時間
  ajax.send(ajaxParam) // POSTリクエスト実行
  ajax.onload = function () {
    // 受信成功
    if (ajax.status < 200 || ajax.status >= 400) {
      console.log('Error: Code ' + ajax.status) // エラー
    }
    // console.log(this.response) // 要素を取得
  }
}

<?php
// AjaxでPOSTされた情報を元にCookie発行
if (
    !isset($_POST)
    || !isset($_SERVER['HTTP_X_REQUESTED_WITH'])
    || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) !== 'xmlhttprequest'
) {
    // AjaxPOST以外のアクセスはTOPに302リダイレクト
    header('Location: /');
    exit;
}
$inputArgs = array(
    'name' => FILTER_SANITIZE_SPECIAL_CHARS, // 名前
    'value' => '', // 値
    'sec' => FILTER_VALIDATE_INT, // 寿命秒数
);
$input = filter_input_array(INPUT_POST, $inputArgs);

date_default_timezone_set('Asia/Tokyo');
$setCookie = setcookie($input['name'], $input['value'], time() + $input['sec'], '/', '', true); // 名前,値,期限,パス,ドメイン,Secure

if ($setCookie) {
    echo 'Cookie: SUCCESS - ', $input['name'], '=', $input['value'], ' ', ($input['sec'] / 60 / 60), 'hour';
} else {
    echo 'Cookie: ERROR';
}
exit;
*/
