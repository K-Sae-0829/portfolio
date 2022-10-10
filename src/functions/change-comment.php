<?php

/*
 ########  ####  ######     ###    ########  ##       ########
 ##     ##  ##  ##        ##   ##  ##     ## ##       ##
 ##     ##  ##   ######  ##     ## ########  ##       ######
 ##     ##  ##        ## ######### ##     ## ##       ##
 ########  ####  ######  ##     ## ########  ######## ########
*/

/*
         ######   #######  ##     ## ##     ## ######## ##    ## ########
        ##       ##     ## #### #### #### #### ##       ####  ##    ##
####### ##       ##     ## ## ### ## ## ### ## ######   ## ## ##    ##
        ##       ##     ## ##     ## ##     ## ##       ##  ####    ##
         ######   #######  ##     ## ##     ## ######## ##    ##    ##
*/

// 投稿タイプに応じてコメント投稿を禁止する 分岐をコメントアウトで全て禁止
add_filter('comments_open', function ($open, $post_id) {
    // $post = get_post($post_id);
    // if ($post->post_type === 'post') {
    //     return false;
    // }
    // if ($post->post_type === 'page') {
    //     return false;
    // }
    // if ($post->post_type === 'attachment') { // メディア
    //     return false;
    // }
    return false;
}, 10, 2);

// 編集画面のメタボックスを除去する
add_action('admin_init', function () {
    $posts = array(
        'post',
        'page',
    );
    foreach ((array) $posts as $val) {
        remove_meta_box('commentsdiv', $val, 'normal');
    }
});

/*
        ########  #### ##    ##  ######   ########     ###     ######  ##    ##
        ##     ##  ##  ####  ## ##        ##     ##  ##   ##  ##       ##  ##
####### ########   ##  ## ## ## ##   #### ########  ##     ## ##       #####
        ##         ##  ##  #### ##    ##  ##     ## ######### ##       ##  ##
        ##        #### ##    ##  ######   ########  ##     ##  ######  ##    ##
*/

// セルフピンバックを除去
// add_action('pre_ping', function (&$links) {
//     $home = get_option('home');
//     foreach ($links as $l => $link) {
//         if (0 === strpos($link, $home)) {
//             unset($links[$l]);
//         }
//     }
// });

// HTTPレスポンスヘッダからX-Pingbackを除外
add_filter('pings_open', function () {
    return false;
});
