<?php
/*
 ######     ###     ######  ##     ## ########
##        ##   ##  ##       ##     ## ##
##       ##     ## ##       ######### ######
##       ######### ##       ##     ## ##
 ######  ##     ##  ######  ##     ## ########
*/
/*
// キャッシュ名 LAST_UPDATE:更新時に切り替え STATE_DEVICE:PC/SPで切り分け STATE_ROLE:ログイン状態で切り分け
$cacheName = '' . LAST_UPDATE . STATE_DEVICE . STATE_ROLE;
$saveTime = 60 * 60 * 24; // 保存期間（秒） 0で永続（LAST_UPDATE適用時は0以外にする）
// delete_transient($cacheName); // キャッシュ削除（リセット用）
$cache = get_transient($cacheName); // キャッシュ取得

if (false === $cache) {  // キャッシュがなければ取得処理
    outputLog('Create Cache: ' . $cacheName);
    ob_start();  //出力結果を取得開始
?>

<?php
    $cache = ob_get_clean();  // 出力結果を格納
    $cache = str_replace(PHP_EOL, '', $cache); // 改行除去
    $cache = preg_replace('/ {2,}/',' ', $cache); // 不要なスペース除去
    set_transient($cacheName, $cache, $saveTime); //キャッシュ生成　キャッシュ名,データ,保存時間
}
echo $cache;
$cache = null;
*/

/*
##     ## ########  ########     ###    ######## ########
##     ## ##     ## ##     ##  ##   ##     ##    ##
##     ## ########  ##     ## ##     ##    ##    ######
##     ## ##        ##     ## #########    ##    ##
 #######  ##        ########  ##     ##    ##    ########
投稿・オプション更新時に最終更新時間を記録　定数LAST_UPDATEに渡す
*/
add_action('save_post', 'wpLastUpdateCache'); // 投稿
add_action('edited_term', 'wpLastUpdateCache'); // タクソノミー
add_action('updated_option', 'wpLastUpdateCache'); // オプション
function wpLastUpdateCache()
{
    $cacheName = 'last-update';  // キャッシュ名
    $saveTime = 0; // 保存期間（秒） 0で永続
    // delete_transient($cacheName); // キャッシュ削除（リセット用）
    set_transient($cacheName, time(), $saveTime);  //キャッシュ生成　キャッシュ名,データ,保存時間
}
