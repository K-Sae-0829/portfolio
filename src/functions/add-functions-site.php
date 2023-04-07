<?php
// サイト固有の機能
function add_featured_image_instruction($content)
{
    $screen = get_current_screen();
    if ($screen->post_type == 'works') { //投稿
        $content .= '<p>サイズは横720px、縦360pxを基準サイズとしています。</p>';
    }
    return $content;
}
add_filter('admin_post_thumbnail_html', 'add_featured_image_instruction');
