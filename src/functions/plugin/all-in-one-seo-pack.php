<?php
/*
https://aioseo.com/doc-categories/filter-hooks/
*/

/*
 ######## #### ######## ##       ########
    ##     ##     ##    ##       ##
    ##     ##     ##    ##       ######
    ##     ##     ##    ##       ##
    ##    ####    ##    ######## ########

タイトルの差し替え
*/
// add_filter('aioseo_title', function ($title) {
//     if (is_page('hoge')) {
//         $title = 'hogehoge | ' .  SITE_NAME;
//     }
//     if (is_singular('hoge')) {
//         $title = 'hogehoge | ' .  SITE_NAME;
//     }
//     return $title;
// });

/*
 ########  ########  ######   ######
 ##     ## ##       ##       ##
 ##     ## ######    ######  ##
 ##     ## ##             ## ##
 ########  ########  ######   ######

ディスクリプションの差し替え
*/
// add_filter('aioseo_description', function ($description) {
//     if (is_category()) {
//         $description = '';
//     } elseif (is_date()) {
//         $description = '';
//     } elseif (is_archive()) {
//         $description = '';
//     }
//     return $description;
// });

/*
 ##    ## ######## ##    ## ##      ##  #######  ########  ########
 ##  ##   ##         ####   ##  ##  ## ##     ## ##     ## ##     ##
 #####    ######      ##    ##  ##  ## ##     ## ########  ##     ##
 ##  ##   ##          ##    ##  ##  ## ##     ## ##   ##   ##     ##
 ##    ## ########    ##     ###  ###   #######  ##     ## ########

キーワードの差し替え
オプションでキーワードを有効にしていないと動作しない
*/
// add_filter('aioseo_keywords', function ($keywords) {
//     if (empty($keywords)) {
//         $keywords = '';
//     }
//     return $keywords;
// });

/*
  #######   ######
 ##     ## ##
 ##     ## ##   ####
 ##     ## ##    ##
  #######   ######
*/

/**
 * $value 値
 * $type twitterもしくはfacebook titleなどのフィールドは名前が被っているので、それを区別したい場合使用
 * $field card,description,thumbnail,site_name,title,url
 */

// add_filter('aiosp_opengraph_meta', function ($value, $type, $field) {
//     if (IS_HOME && $type === 'twitter' && $field === 'title') {
//         $value = 'TOPページでTwitterカードのタイトルだけ変える例';
//     }
//     return $value;
// }, 10, 5);
/*
対応表　v3.5.2
$type : $field
facebook : title
facebook : description
facebook : url
facebook : sitename
facebook : thumbnail
facebook : width
facebook : height
facebook : video
facebook : videowidth
facebook : videoheight
facebook : key
facebook : appid
facebook : section
facebook : tag
facebook : published_time
facebook : modified_time
facebook : publisher
facebook : author
twitter : card
twitter : site
twitter : creator
twitter : domain
twitter : title
twitter : description
twitter : twitter_thumbnail
*/

/*
 ##     ## ######## ########    ###            ########   #######  ##     ##
 #### #### ##          ##     ##   ##          ##     ## ##     ##   ## ##
 ## ### ## ######      ##    ##     ## ####### ########  ##     ##    ###
 ##     ## ##          ##    #########         ##     ## ##     ##   ## ##
 ##     ## ########    ##    ##     ##         ########   #######  ##     ##
*/
// 編集画面のメタボックスを一番下に移動
add_action('admin_footer', function () {
    echo <<<'HTML'
    <script type="text/javascript">
    if(document.getElementById('aiosp_tabbed')){
        document.getElementById('normal-sortables').appendChild(document.getElementById('aiosp_tabbed'))
    }
    </script>
HTML;
});
