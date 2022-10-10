/**
 * Cookie設定関数（サーバーサイド）
 * AjaxでPHPにアクセスしてCookieを発行する
 * PHP側の準備が必要な代わりに、Cookieの制約が無い
 * フロントエンド用とは併用不可
 * @function setCookie
 * @param {string} key キー名
 * @param {string} val 値
 * @param {string} path アクセス先
 * @param {number} maxAge 寿命秒数 60 * 60 * 24 * 365で1年
 * @param {Object} callback コールバック関数
 * @return {Void}
 * Use
import setCookie from './functions/_cookie-setCookie-server.js' // Cookie発行（サーバーサイド）
setCookie('hogeData', 'hogeText', '/cookie/', 60 * 60 * 24 * 365) // Cookie発行
 */
const setCookie = (key, val, path, maxAge = 60 * 60 * 24 * 365, callback = function () {}) => {
  const ajaxParam = 'key=' + key + '&value=' + val + '&sec=' + maxAge
  const ajax = new XMLHttpRequest() // Ajaxリクエスト
  ajax.open('POST', path, true) // GET/POST, URL, 非同期処理
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
    // console.log(this.response) // デバッグ用の反応確認
    callback() // コールバック処理
  }
}

export default setCookie

/*
PHPサンプル
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
    'key' => FILTER_SANITIZE_SPECIAL_CHARS, // 名前
    'value' => '', // 値
    'sec' => FILTER_VALIDATE_INT, // 寿命秒数
);
$input = filter_input_array(INPUT_POST, $inputArgs);

date_default_timezone_set('Asia/Tokyo');
$setCookie = setcookie($input['key'], $input['value'], time() + $input['sec'], '/', '', true); // 名前,値,期限,パス,ドメイン,Secure

if ($setCookie) {
    echo 'Cookie: SUCCESS - ', $input['key'], '=', $input['value'], ' ', ($input['sec'] / 60 / 60), 'hour';
} else {
    echo 'Cookie: ERROR';
}
exit;
*/
