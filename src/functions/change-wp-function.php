<?php
/*

 ######## ##     ##  ######  ######## ########  ########  ########
 ##         ## ##   ##       ##       ##     ## ##     ##    ##
 ######      ###    ##       ######   ########  ########     ##
 ##         ## ##   ##       ##       ##   ##   ##           ##
 ######## ##     ##  ######  ######## ##     ## ##           ##
 */
// 抜粋の長さを変更
add_filter('excerpt_length', function ($length) {
    $length = 350;
    return $length;
}, 999);

// 抜粋の末尾を[...]から変更
add_filter('excerpt_more', function ($more) {
    $html = '...';
    return $html;
});

//アップした画像が勝手に縮小されないようにする
add_filter("big_image_size_threshold", "__return_false");
/*
##      ## ########          ##     ##    ###    #### ##
##  ##  ## ##     ##         #### ####  ##   ##   ##  ##
##  ##  ## ########  ####### ## ### ## ##     ##  ##  ##
##  ##  ## ##                ##     ## #########  ##  ##
 ###  ###  ##                ##     ## ##     ## #### ########
*/

// wp_mail関数の送信者情報を変更
// add_filter('wp_mail_from', function ($from_mail) { // メールアドレス
//     return 'example@example.com';
// });
// add_filter('wp_mail_from_name', function ($from_name) { // 差出人
//     return SITE_NAME;
// });


/*
 ########     ###    ########  ##     ##    ###    ##       #### ##    ## ##    ##
 ##     ##  ##   ##  ##     ## #### ####  ##   ##  ##        ##  ####  ## ##  ##
 ########  ##     ## ########  ## ### ## ##     ## ##        ##  ## ## ## #####
 ##        ######### ##   ##   ##     ## ######### ##        ##  ##  #### ##  ##
 ##        ##     ## ##     ## ##     ## ##     ## ######## #### ##    ## ##    ##
*/
// WP3.9.0未満で「get_the_permalink」が未定義の場合の応急処置
// if (!function_exists('get_the_permalink')) {
//     function get_the_permalink()
//     {
//         return get_permalink();
//     }
// }
