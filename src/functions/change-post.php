<?php
/*
初期投稿タイプ「post」のカスタマイズ
*/
// $post_option = new post_option();
// $post_option->post_rename('新着情報'); // 投稿名を変える
// $post_option->post_remove(false, false, false); // 左からtrueでエディタ、カテゴリー、タグを消す

//$post_option->post_permalink('スラッグ');


/*
指定投稿タイプのタクソノミーをラジオボタン化
*/
new taxonomyToRadio('post', 'category');




/*
########    ###     ######
   ##     ##   ##  ##
   ##    ##     ## ##   ####
   ##    ######### ##    ##
   ##    ##     ##  ######

タグに階層を付ける
*/

// add_action('init', function () {
//     global $wp_rewrite;
//     $rewrite = array(
//         'slug' => get_option('tag_base') ? get_option('tag_base') : 'tag',
//         'with_front' => !get_option('tag_base') || $wp_rewrite->using_index_permalinks(),
//         'ep_mask' => EP_TAGS,
//     );

//     $labels = array(
//         'name' => _x('Tags', 'taxonomy general name'),
//         'singular_name' => _x('Tag', 'taxonomy singular name'),
//         'search_items' => __('Search Tags'),
//         'popular_items' => __('Popular Tags'),
//         'all_items' => __('All Tags'),
//         'parent_item' => null,
//         'parent_item_colon' => null,
//         'edit_item' => __('Edit Tag'),
//         'view_item' => __('View Tag'),
//         'update_item' => __('Update Tag'),
//         'add_new_item' => __('Add New Tag'),
//         'new_item_name' => __('New Tag Name'),
//         'separate_items_with_commas' => __('Separate tags with commas'),
//         'add_or_remove_items' => __('Add or remove tags'),
//         'choose_from_most_used' => __('Choose from the most used tags'),
//         'not_found' => __('No tags found.')
//     );

//     register_taxonomy('post_tag', 'post', array(
//         'hierarchical' => true,
//         'query_var' => 'tag',
//         'rewrite' => $rewrite,
//         'public' => true,
//         'show_ui' => true,
//         'show_admin_column' => true,
//         '_builtin' => true,
//         'labels' => $labels
//     ));
// }, 1);


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
 ###### ##       #####  ####### #######
##      ##      ##   ## ##      ##
##      ##      ####### ####### #######
##      ##      ##   ##      ##      ##
 ###### ####### ##   ## ####### #######
*/

class post_option
{    //postの内容変更

    public $link;

    public $newname;

    public function post_rename($name)
    {
        $this->newname = $name;
        add_action('init', array($this, 'revcon_change_post_object'));
    }

    public function revcon_change_post_label()
    {
        global $menu;
        global $submenu;
        $menu[5][0] = $this->newname;
        $submenu['edit.php'][5][0] = $this->newname;
        $submenu['edit.php'][10][0] = $this->newname . 'を書く';
        $submenu['edit.php'][16][0] = 'タグ';
        echo '';
    }

    public function revcon_change_post_object()
    {
        global $wp_post_types;
        $labels = &$wp_post_types['post']->labels;
        $labels->name = $this->newname;
        $labels->singular_name = $this->newname;
        $labels->add_new = $this->newname . 'を書く';
        $labels->add_new_item = $this->newname . 'を書く';
        $labels->edit_item = $this->newname . 'の編集';
        $labels->new_item = $this->newname;
        $labels->view_item = $this->newname . 'を見る';
        $labels->search_items = $this->newname . 'を探す';
        $labels->not_found = $this->newname . 'はありません';
        $labels->not_found_in_trash = $this->newname . 'はありません';
        $labels->all_items = '全ての' . $this->newname;
        $labels->menu_name = $this->newname;
        $labels->name_admin_bar = $this->newname;
    }

    public function post_permalink($link)
    {
        $this->link = $link;
        add_filter('post_rewrite_rules', array($this, 'custom_post_rewrite_rules')); //アクセスされた際に条件を判定する
        add_filter('pre_post_link', array($this, 'custom_post_rewrite_structure'), 10, 2); //リンクを出力する時
    }

    public function custom_post_rewrite_rules($post_rewrite)
    {
        if ($post_rewrite) {
            $custom_rules = array();
            $prefix = $this->link . '/';
            foreach ($post_rewrite as $key => $post_rule) {
                $custom_rules[$prefix . $key] = $post_rule;
            }
            $post_rewrite = $custom_rules; //カスタマイズしたリンクをリターン
        }
        return $post_rewrite; //カスタマイズしたリンクを出力する
    }

    public function custom_post_rewrite_structure($permalink, $post)
    {
        if ($permalink && $post->post_type == 'post') { //$postはpostのインスタンス
            $permalink = '/' . $this->link . $permalink; //判定するリンクのカスタマイズ
        }
        return $permalink;
    }

    public function post_remove($editor = false, $cat = false, $tag = false)
    {
        if ($editor) {
            add_action('init', array($this, 'remove_post_editor'));
        }
        if ($cat) {
            add_action('init', array($this, 'remove_post_category'));
        }
        if ($tag) {
            add_action('init', array($this, 'remove_post_tag'));
        }
    }

    public function remove_post_editor()
    {
        remove_post_type_support('post', 'editor');
    }

    public function remove_post_category()
    {
        unregister_taxonomy_for_object_type('category', 'post');
    }

    public function remove_post_tag()
    {
        unregister_taxonomy_for_object_type('post_tag', 'post');
    }
}

//カテゴリーラジオボタン化
class taxonomyToRadio
{
    public $postName;

    public $taxName;

    public function __construct($post, $term)
    {
        $this->postName = $post;
        $this->taxName = $term;
        add_action('admin_print_footer_scripts', array($this, 'cat_radio'), 21);
    }

    public function cat_radio()
    { //カテゴリー入力をラジオボタン化
        global $post_type;
        if ($post_type === $this->postName) {
            echo '<script type="text/javascript">';
            echo <<< JS
// チェックボックスを変換
var editCheckbox = document.querySelectorAll("#{$this->taxName}checklist input[type=checkbox],.{$this->taxName}-checklist input[type=checkbox]")
for (var index = 0; index < editCheckbox.length; index++) {
    editCheckbox[index].setAttribute('type','radio')
}

// クイック編集のチェック状態を復元
jQuery(function($){
    if(inlineEditPost && inlineEditPost.edit){
        var _Edit = inlineEditPost.edit; // 元のeditの処理を取り出す
        inlineEditPost.edit = function(id){ // edit関数を書き換える
            _Edit.apply(inlineEditPost,arguments); // 元のeditの処理を行う
            var t = this,rowData,editRow;
            if(typeof(id) === "object"){
                id = this.getId(id);
            }
            editRow = document.getElementById('edit-' + id) // 編集エリアは既にcloneされているものを取得
            rowData = document.getElementById('inline_' + id)

            $(".post_category",rowData).each(function(){ // hierarchicaltaxonomies
                var item = $(this)
                var taxName
                var termID = item.text().split(',')
                if(termID){
                    taxName = item.attr("id").replace("_" + id , "")
                    $("." + taxName + "-checklist :radio").val(termID) // カテゴリーのラジオボタンにチェック
                }
            });
            return false;
        };
    }
});
JS;
            echo '</script>';
        }
    }
}
