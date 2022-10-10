<?php

//  ###    ###  #####  ##     ##  ##   ##
//  ## #  # ##  ##     ####   ##  ##   ##
//  ##  ##  ##  #####  ##  ## ##  ##   ##
//  ##      ##  ##     ##    ###  ##   ##
//  ##      ##  #####  ##     ##   #####

/*==============================
左メニュー削除
==============================*/
function remove_menu()
{
    remove_menu_page('edit-comments.php'); //コメント
}
add_action('admin_menu', 'remove_menu');

/*==============================
左メニュー並び替え
==============================*/
function custom_menu_order($menu_ord)
{
    if (!$menu_ord) {
        return true;
    }
    return array(
        'index.php', //ダッシュボード
        'edit.php', //投稿
        'edit.php?post_type=', //カスタム投稿
        'edit.php?post_type=page', //固定ページ
        'upload.php', //メディア
        'edit-comments.php', //コメント
        'separator2', //仕切り
        'themes.php', //外観
        'plugins.php', //プラグイン
        'users.php', //ユーザー
        'admin.php?page=all-in-one-seo-pack/aioseop_class.php', //All in One SEO Pack
        'tools.php', //ツール
        'options-general.php', //設定
        'separator-last', //仕切り
    );
}
add_filter('custom_menu_order', 'custom_menu_order');
add_filter('menu_order', 'custom_menu_order');


//   ####   #####   ##      ##   ##  ###    ###  ##     ##
//  ##     ##   ##  ##      ##   ##  ## #  # ##  ####   ##
//  ##     ##   ##  ##      ##   ##  ##  ##  ##  ##  ## ##
//  ##     ##   ##  ##      ##   ##  ##      ##  ##    ###
//   ####   #####   ######   #####   ##      ##  ##     ##

//              ###    ####    ####
//             ## ##   ##  ##  ##  ##
//  ########  ##   ##  ##  ##  ##  ##
//            #######  ##  ##  ##  ##
//            ##   ##  ####    ####

// 固定ページ
add_filter('manage_pages_columns', function ($columns) {
    $columns['slug'] = 'スラッグ';
    return $columns;
});
add_action('manage_pages_custom_column', function ($column_name, $post_id) {
    if ($column_name === 'slug') { // ページスラッグを表示する
        $breadPost = get_post($post_id);
        $bread = array($breadPost->post_name); // スラッグを格納
        while ($breadPost->post_parent) { // 親階層のスラッグを取得する
            $breadPost = get_post($breadPost->post_parent);
            $bread[] = $breadPost->post_name;
        }
        $bread = array_reverse($bread); // 配列を反転
        $bread = implode(' / ', $bread);
        echo esc_attr($bread);
    }
}, 10, 2);

// 投稿
add_filter('manage_posts_columns', function ($columns) {
    $columns['thumbnail'] = __('Thumbnail'); // サムネイルカラム追加
    return $columns;
});
add_action('manage_posts_custom_column', function ($column_name, $post_id) {
    if ('thumbnail' === $column_name) { // サムネイル画像表示
        $thumb = get_the_post_thumbnail($post_id, 'small', array('style' => 'width:100px;height:auto;', 'loading' => 'lazy'));
        if (!empty($thumb)) {
            echo $thumb;
            return;
        }
        echo __('None');
    }
}, 10, 2);

// カスタム投稿
// add_filter('manage_edit-○○_columns', function ($columns) {
//     $columns['slug'] = '型番';
//     return $columns;
// });
// add_action('manage_○○_posts_custom_column', function ($column_name, $post_id) {
//     if ('slug' === $column_name) {
//         echo '';
//     }
// }, 10, 2);


//            ####    #####  ##
//            ##  ##  ##     ##
//  ########  ##  ##  #####  ##
//            ##  ##  ##     ##
//            ####    #####  ######

// 固定ページ一覧の不要カラムを削除

add_filter('manage_pages_columns', function ($columns) {
    unset($columns['author'], $columns['comments'], $columns['date']);
    return $columns;
});


/*==============================
テーマ編集にJS追加
==============================*/
add_filter('wp_theme_editor_filetypes', function ($default_types) {
    $default_types[] = 'js';
    return $default_types;
});

/*==============================
フッター変更
==============================*/
function custom_admin_footer()
{
    echo '';
}
add_filter('admin_footer_text', 'custom_admin_footer');


//  ######  #####      ###     ####  ##   ##
//    ##    ##  ##    ## ##   ##     ##   ##
//    ##    #####    ##   ##   ###   #######
//    ##    ##  ##   #######     ##  ##   ##
//    ##    ##   ##  ##   ##  ####   ##   ##

// ゴミ箱の30日保持期限をなくし、手動でのみ完全削除する
add_action('init', function () {
    remove_action('wp_scheduled_delete', 'wp_scheduled_delete');
});


//  ##     ##   #####   ######  ##   ####
//  ####   ##  ##   ##    ##    ##  ##
//  ##  ## ##  ##   ##    ##    ##   ###
//  ##    ###  ##   ##    ##    ##     ##
//  ##     ##   #####     ##    ##  ####


//            ##   ##   ####  #####  #####
//            ##   ##  ##     ##     ##  ##
//  ########  ##   ##   ###   #####  #####
//            ##   ##     ##  ##     ##  ##
//             #####   ####   #####  ##   ##

/*==============================
初期設定用ユーザー「a」が存在する場合の警告
==============================*/
add_action('admin_notices', function () {
    // ユーザー名aを検索
    $userID = username_exists('a');
    if (!$userID) {
        return;
    }
    // パスワードもaか確認
    $auth = wp_authenticate($userID, 'a');
    if (!$auth) {
        return;
    }
    $userPage = admin_url() . 'users.php'; // ユーザー一覧URL
    echo '<div class="notice notice-error notice-alt"><p><a href="', $userPage, '" style="color:#d63638;">※サイト初期設定用の仮アカウントが存在しています。セキュリティ確保のため必ず削除してください。</a></p></div>';
});
