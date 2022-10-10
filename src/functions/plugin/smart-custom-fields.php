<?php
/*━━━━━━━━━━━━━━━
Smart Custom Fields フィールド定義
━━━━━━━━━━━━━━━*/
function scf_meta_box($settings, $post_type, $post_id)
{
    $slug = '';
    $post = get_post($post_id);
    if (!empty($post)) {
        $slug = $post->post_name; //スラッグ取得
    }
    /*
        if (in_array($post_type, array('post')) && $slug === 'hoge') {  //メタボックスを追加する投稿タイプやスラッグの条件
            $Setting = SCF::add_setting('shop', 'カスタムフィールド');
            $Setting->add_group('shop', false, array(
                array('type'      => 'text', //テキスト
                    'name'        => 'shop',
                    'instruction' => '店舗名', //説明文
                    'notes'       => '', //注釈
                    'label'       => '', //nameの代替文字
                    'default'     => '',	//初期値
                ),
            ));
            $settings[] = $Setting;
        }
    */
    return $settings;
}
add_filter('smart-cf-register-fields', 'scf_meta_box', 10, 3);


/*
######  ## #######       ####### ######  ## ########  ######  ######
##   ## ## ##            ##      ##   ## ##    ##    ##    ## ##   ##
##   ## ## ####### ##### #####   ##   ## ##    ##    ##    ## ######
##   ## ##      ##       ##      ##   ## ##    ##    ##    ## ##   ##
######  ## #######       ####### ######  ##    ##     ######  ##   ##
*/
add_action('admin_enqueue_scripts', 'CSF_RemovePageEditor');    //指定固定ページの本文エディタ削除
function CSF_RemovePageEditor()
{
    $post = get_post(get_the_ID());
    if (empty($post)) {
        return;
    }
    $slug = $post->post_name;
    if (strpos($slug, 'parts-') !== false) {    //本文エディタを削除するページ
        remove_post_type_support('page', 'editor');
    }
}
/*

    ###    ########  ########                ##  ######
  ##   ##  ##     ## ##     ##               ## ##
 ##     ## ##     ## ##     ## #######       ##  ######
 ######### ##     ## ##     ##         ##    ##       ##
 ##     ## ########  ########           ######   ######

*/
// 入力改善用のJS追記　コメントアウトを外して有効化
// add_action('admin_footer','SCF_JSPlus');
function SCF_JSPlus()
{ ?>
    <script>
        // 指定フィールドの属性変更
        if (document.querySelector('[name="smart-custom-fields[hoge-number][0]"]')) {
            document.querySelector('[name="smart-custom-fields[hoge-number][0]"]').setAttribute('type', 'number')
        }
        if (document.querySelector('[name="smart-custom-fields[hoge-tel][0]"]')) {
            document.querySelector('[name="smart-custom-fields[hoge-tel][0]"]').setAttribute('type', 'tel')
        }
        if (document.querySelector('[name="smart-custom-fields[hoge-email][0]"]')) {
            document.querySelector('[name="smart-custom-fields[hoge-email][0]"]').setAttribute('type', 'email')
        }
    </script>
<?php }



/*
####### ########  #####  ######## ##  ######
##         ##    ##   ##    ##    ## ##
#######    ##    #######    ##    ## ##
     ##    ##    ##   ##    ##    ## ##
#######    ##    ##   ##    ##    ##  ######
*/
/*━━━━━━━━━━━━━━━━━━━━━
基本編集不要エリア
━━━━━━━━━━━━━━━━━━━━━*/
/*
 ###### ####### #######
##      ##      ##
##      ####### #######
##           ##      ##
 ###### ####### #######
*/
// 入力改善用のCSS/JS追記
add_action('admin_enqueue_scripts', function () { ?>
    <style>
        .smart-cf-meta-box-table th {
            width: 5rem;
        }

        .smart-cf-meta-box .smart-cf-upload-image img,
        .smart-cf-meta-box .smart-cf-upload-file img {
            max-width: 200px;
        }

        .smart-cf-meta-box .smart-cf-meta-box-table .smart-cf-relation-right,
        .smart-cf-meta-box .smart-cf-meta-box-table .smart-cf-relation-left {
            width: auto;
            max-height: 150px;
        }

        .smart-cf-meta-box .smart-cf-meta-box-table .smart-cf-relation-left .smart-cf-relation-children-select {
            height: 260px;
        }

        .smart-cf-meta-box-repeat-tables {
            counter-reset: count-number;
        }

        .smart-cf-meta-box-repeat-tables .smart-cf-meta-box-table:before {
            counter-increment: count-number;
            content: counters(count-number, ".") " ";
            display: inline-block;
        }

        .smart-cf-meta-box-table td:not(:hover) .smart-cf-upload-image img,
        .smart-cf-meta-box-table td:not(:hover) .smart-cf-upload-file img {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAYAAACNMs+9AAAAIElEQVQoU2NkYGDwZcAEm9GFGIeIQix+wfQgyDODXSEArboGjIsZJ6IAAAAASUVORK5CYII=);
        }

        input[value="hidden-dummy"] {
            display: none !important;
        }
    </style>
<?php });


/*
 ########  ########  ######## ##     ## #### ######## ##      ##
 ##     ## ##     ## ##       ##     ##  ##  ##       ##  ##  ##
 ########  ########  ######   ##     ##  ##  ######   ##  ##  ##
 ##        ##   ##   ##        ##   ##   ##  ##       ##  ##  ##
 ##        ##     ## ########    ###    #### ########  ###  ###
*/
/*
関数get_post_metaをプレビューに対応させる（SCF限定）

■動作条件
・値の入力にSmart Custom Fieldsを使用していること
・値の取得にget_post_metaを使用していること（SCF::get等はサポートしない）
・記事IDが確定していること（未保存+投稿タイトル未定だとIDは確定しない）

■動作フロー
1．プレビュー展開時のPOSTにSCFの入力内容があったらTransientAPIでキャッシュ
2．プレビュー画面でget_post_metaが呼び出された時、対応するキャッシュが存在すればそちらを返す
*/

// キャッシュ処理
add_action('wp_insert_post', function ($post_id) {
    // 以下は処理しない
    // リビジョン以外
    // 記事IDが確定していない（未保存+投稿タイトル未定でプレビューした時）
    // POST情報にSCFのデータがない
    if (
        !wp_is_post_revision($post_id) ||
        empty($_POST['post_ID']) ||
        !isset($_POST['smart-custom-fields'])
    ) {
        return;
    }

    $cacheName = 'custom-field-preview-data-' . $_POST['post_ID']; // キャッシュ用の名称

    // SCFからのPOST情報を記録
    $scfPost = $_POST['smart-custom-fields'];
    if (!empty($scfPost)) {
        $scfPost = wp_unslash($scfPost); // バックスラッシュでエスケープされているのでwp_unslashで解除する
        set_transient($cacheName, $scfPost, 60 * 60 * 24); // 1日キャッシュさせる
    }
});

// 出力処理
add_filter('get_post_metadata', function ($return, $post_id, $meta_key, $single) {
    // 以下の時はそのまま出す
    // プレビュー画面
    // WP関連（_wp）のフィールド
    if (
        !is_preview($post_id) ||
        strpos($meta_key, '_wp') !== false
    ) {
        return $return;
    }

    $cacheName = 'custom-field-preview-data-' . $post_id; // キャッシュ用の名称
    $scfPost = get_transient($cacheName); // キャッシュを取得

    // データが取れなければ通常の挙動に戻す
    if (empty($scfPost)) {
        return $return;
    }

    // singleオプションの挙動を反映しつつ目的のフィールドをセット
    $return = $single
        ? $scfPost[$meta_key][0]
        : $scfPost[$meta_key];

    return $return;
}, 10, 4);
