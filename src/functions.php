<?php
// require_once 'functions/other/fix-aws.php'; // AWS向けの調整

require_once 'functions/add-const.php'; // 定数
require_once 'functions/add-global.php'; // グローバル変数
require_once 'functions/add-functions-common.php'; // 汎用関数
require_once 'functions/add-functions-site.php'; // サイト固有関数

require_once 'functions/add-cache.php'; // キャッシュ
require_once 'functions/add-custom-post.php'; // カスタム投稿宣言
require_once 'functions/add-img-size.php'; // 画像
require_once 'functions/add-shortcode.php'; // ショートコード
require_once 'functions/add-save-post.php'; // 投稿保存アクション
require_once 'functions/change-admin-page.php'; // 管理画面レイアウト
require_once 'functions/change-edit-page.php'; // エディタ改変
require_once 'functions/change-head.php'; // ヘッダー改変
require_once 'functions/change-login-page.php'; // ログイン画面カスタマイズ
require_once 'functions/change-post.php'; // 投稿改変
require_once 'functions/change-comment.php'; // 投稿改変
require_once 'functions/change-wp-function.php'; // WP関数改変

// WPプラグイン関連
if (function_exists('aioseo')) {
    require_once 'functions/plugin/all-in-one-seo-pack.php';
}
if (class_exists('MW_WP_Form')) {
    require_once 'functions/plugin/mw-wp-form.php';
}
if (class_exists('Smart_Custom_Fields')) {
    require_once 'functions/plugin/smart-custom-fields.php';
}

// require_once 'functions/other/force-ssl.php'; // SSL強制対応
