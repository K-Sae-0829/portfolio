<?php

/*
######## ##          ###     ######
##       ##         ## ##   ##    ##
##       ##        ##   ##  ##
######   ##       ##     ## ##   ####
##       ##       ######### ##    ##
##       ##       ##     ## ##    ##
##       ######## ##     ##  ######
*/

define('IS_PAGE', $page['flag']); // ページの判別フラグを定数化
// TOPページフラグ
if (IS_PAGE === 'top') {
    define('IS_HOME', true);
} else {
    define('IS_HOME', false);
}
define('SLUG', $page['slug']); // ページスラッグを定数化

/*
##     ## ########  ##
##     ## ##     ## ##
##     ## ##     ## ##
##     ## ########  ##
##     ## ##   ##   ##
##     ## ##    ##  ##
 #######  ##     ## ########
*/

// $home = '/';
// if ($_SERVER['HTTP_HOST'] === 'stg-spc.net') {
//     // 開発環境用の補正
//     $home = '/projects/00000000000000000000/';
// }

define('HOME', $home); // TOPページURL
// define('H_PATH', dirname(__FILE__) . '/../'); // TOPページパス
