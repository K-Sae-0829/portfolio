<?php
// 保存時の補正アクション
/**
 * @param int  $postID  投稿ID
 * @param post $post    投稿オブジェクト
 * @param bool $update  true:更新 false:新規投稿
 * $post->post_name; // (string) スラッグ
 * $post->post_type; // (string) 投稿タイプ (post|page|attachment)
 * $post->post_author; // (int) 作成者ID
 * $post->post_title; // (string) タイトル
 * $post->post_content; // (string) 本文
 * $post->post_excerpt; // (string) 抜粋
 * $post->post_date; // (string) 投稿日時 (YYYY-MM-DD HH:MM:SS)
 * $post->post_date_gmt; // (string) GMT での投稿日時 (YYYY-MM-DD HH:MM:SS)
 * $post->post_modified; // (string) 更新日時 (YYYY-MM-DD HH:MM:SS)
 * $post->post_modified_gmt; // (string) GMT での更新日時 (YYYY-MM-DD HH:MM:SS)
 * $post->post_status; // (string) 公開ステータス (publish|pending|draft|private|static|object|attachment|inherit|future|trash)
 * $post->ping_status; // (string) ピンバック／トラックバックステータス (open|closed)
 * $post->to_ping; // (string) ピン通知 URL
 * $post->pinged; // (string) ピン通知済み URL
 * $post->post_content_filtered; // (string)
 * $post->post_parent; // (int) 親 ID (固定ページや添付ファイルなどで使用)
 * $post->guid; // (string) 投稿へのリンクの書式になっている識別子
 * $post->menu_order; // (int) 固定ページ の表示順序
 * $post->post_mime_type; // (string) 添付ファイルのとき MIME タイプ（image/png など）
 * $post->post_password; // (string) 閲覧パスワード
 * $post->comment_status; // (string) コメントステータス (open|closed|registered_only)
 * $post->comment_count; // (int) コメント数
 */


// add_action('save_post', 'savePostAction', 99, 3); // Smart Custom Fieldの反映後に動かすために優先度を下げる

// function savePostAction($postID, $post, $update)
// { // 保存時のフック
//     if ($post->post_status !== 'publish') {
//         // 公開時以外は処理しない
//         return;
//     }


//     if ('job' === $post->post_type) {

//         return;
//     }
//     return;
// }
