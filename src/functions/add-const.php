<?php
define('H_HTTP', home_url('/')); // ホーム　絶対パス
define('T_HTTP', get_template_directory_uri() . '/'); // テーマディレクトリ　絶対パス
define('H_URL', rootRelativeURL(H_HTTP)); //ホーム　ルート相対パス
define('T_URL', rootRelativeURL(T_HTTP)); // テーマディレクトリ　ルート相対パス
define('T_PATH', get_template_directory() . '/'); // テーマディレクトリ　フルパス
define('U_URL', content_url() . '/uploads/'); // メディアアップロードディレクトリURL
// define('U_PATH', wp_upload_dir()['basedir'] . '/'); // メディアアップロードディレクトリ　フルパス
// define('A_URL', get_theme_root_uri() . '/assets/'); // 共用ファイルテーマディレクトリURL
// define('A_PATH', get_theme_root() . '/assets/'); // 共用ファイルテーマディレクトリ　フルパス

define('SITE_NAME', get_bloginfo('name')); // サイト名

// フラグ
define('IS_ADMIN', is_admin()); // 管理ページフラグ
define('IS_LOGIN', is_user_logged_in()); // ログインユーザーフラグ
define('IS_MOBILE', wp_is_mobile()); // モバイルフラグ
define('IS_AJAX', isAjax()); // Ajaxフラグ

// 状態管理
if (IS_MOBILE) {
    define('STATE_DEVICE', 'sp'); // デバイス文字列
} else {
    define('STATE_DEVICE', 'pc'); // デバイス文字列
}
if (IS_LOGIN) {
    define('STATE_ROLE', 'login'); // デバイス文字列
} else {
    define('STATE_ROLE', 'guest'); // デバイス文字列
}

// いずれかの投稿が最後に更新された時間
define('LAST_UPDATE', get_transient('last-update'));



// 投稿タイプ等が確定してから取得可能になる情報を定数化
add_action('wp', function () {
    define('IS_HOME', is_top()); // TOPページフラグ

    // タクソノミー情報から定数を設定
    // $hogeFlag = false;
    // global $post;
    // $taxSlug = 'option';  //タクソノミースラッグ
    // $terms = get_the_terms($post->ID, $taxSlug);  //タクソノミー取得
    // foreach ((array) $terms as $term) {
    //     if ($term -> slug === 'hoge-term') {
    //         $hogeFlag = true;
    //     }
    // }
    // define('HOGE_FLAG', $hogeFlag);
});


// プラグインの初期化が完了してから取得可能になる情報を取る
// add_action('init', function () {
// SCFオプションページから定数を設定
// if (class_exists('Smart_Custom_Fields')) { // プラグインが有効
//     define('HOGE_CODE', SCF::get_option_meta('scf-options', 'hoge-code'));
// }
// });


// 内部URLをルート相対パスに加工する
function rootRelativeURL($url)
{
    $siteRootUrl = '';
    if (empty($_SERVER['HTTPS'])) { // SSLの有無で分岐
        $siteRootUrl = 'http://' . $_SERVER['HTTP_HOST'];
    } else {
        $siteRootUrl = 'https://' . $_SERVER['HTTP_HOST'];
    }
    $url = str_replace($siteRootUrl, '', $url);
    return $url;
}


// Ajaxによるリクエストかを判別する
function isAjax()
{
    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
        return true;
    }
    return false;
}
