<?php
$include = './include/'; // パーツ用パス
$home = './'; // サイトルートパス
$page = array( // ページデータ
    'flag' => 'top', // ページ判別フラグ
    'slug' => '', // TOP以降のURL 末尾の/や拡張子まで含める
);
require_once $include . '_header.php';
?>
<article class="contents contents--<?php echo IS_PAGE; ?>">

</article>
<?php
require_once $include . '_footer.php';
