<?php
/*
 ########  ####  ######           ######   #######  ##    ## ######## ######## ##    ## ########
 ##     ##  ##  ##               ##       ##     ## ####  ##    ##    ##       ####  ##    ##
 ##     ##  ##   ######  ####### ##       ##     ## ## ## ##    ##    ######   ## ## ##    ##
 ##     ##  ##        ##         ##       ##     ## ##  ####    ##    ##       ##  ####    ##
 ########  ####  ######           ######   #######  ##    ##    ##    ######## ##    ##    ##
*/
// 本文をキーワード検索対象から外す
function search_for_title($search)
{
    return preg_replace("/ OR \\([^\\(\\.]+.post_content LIKE '%.+%'\\)/u", '', $search);
}
// add_filter('posts_search','search_for_title');//キーワード検索対象をタイトルだけにする
// remove_filter('posts_search','search_for_title');//キーワード検索対象を通常に戻す

// 検索対象の投稿タイプを限定する
function search_for_post($query)
{
    if ($query->is_search) {
        $query->set('post_type', array('post', 'page'));
    }
    return $query;
}
//add_filter('pre_get_posts','search_for_post');


/*
 ####  ######          ########  #######  ########
  ##  ##                  ##    ##     ## ##     ##
  ##   ######  #######    ##    ##     ## ########
  ##        ##            ##    ##     ## ##
 ####  ######             ##     #######  ##
*/
// TOPページを広く判定
// PagedにFALSEを入れた場合、TOPの2ページ以降はTOPとしない
function is_top($paged = true)
{
    if ((is_home() || is_front_page()) && ($paged || !is_paged())) {
        return true;
    }
    return false;
}

/*
 ####  ######          ########   #######   #######  ########
  ##  ##               ##     ## ##     ## ##     ##    ##
  ##   ######  ####### ########  ##     ## ##     ##    ##
  ##        ##         ##   ##   ##     ## ##     ##    ##
 ####  ######          ##     ##  #######   #######     ##
*/
// ルートページ判定
// 指定スラッグのルートページ、もしくはその子孫ならTRUE
function is_root($slug)
{
    global $post;
    if (empty($post)) { // 投稿データなし
        return false;
    }

    if ($post->post_name === $slug) { // 現ページが該当スラッグ
        return true;
    }
    if (empty($post->post_parent) || $post->post_parent === 0) { // 親なし
        return false;
    }
    while ($post->post_parent !== 0) {
        $post = get_post($post->post_parent); // 親ページを取得
    }
    foreach ((array) $slug as $val) {
        if ($post->post_name === $val) {
            return true;
        }
    }
    return false;
}

/*
 ####  ######          ########     ###    ########  ######## ##    ## ########
  ##  ##               ##     ##  ##   ##  ##     ## ##       ####  ##    ##
  ##   ######  ####### ########  ##     ## ########  ######   ## ## ##    ##
  ##        ##         ##        ######### ##   ##   ##       ##  ####    ##
 ####  ######          ##        ##     ## ##     ## ######## ##    ##    ##
*/
// 親ページ判定
// 指定スラッグのページか、先祖のどこかに指定スラッグがあればTRUE
function is_parent($slug)
{
    global $post;
    if (empty($post)) { // 投稿データなし
        return false;
    }
    if ($post->post_name === $slug) { // 現ページが該当スラッグ
        return true;
    }
    if (empty($post->post_parent) || $post->post_parent === 0) { // 親なし
        return false;
    }
    while ($post->post_parent !== 0) {
        $post = get_post($post->post_parent); // 親ページを取得
        foreach ((array) $slug as $val) {
            if ($post->post_name === $val) {
                return true;
            }
        }
    }
    return false;
}


/*
 ########  ########          ##      ## ########     ###    ########
 ##     ## ##     ##         ##  ##  ## ##     ##  ##   ##  ##     ##
 ########  ########          ##  ##  ## ########  ##     ## ########
 ##     ## ##   ##           ##  ##  ## ##   ##   ######### ##
 ########  ##     ## #######  ###  ###  ##     ## ##     ## ##
*/
/*━━━━━━━━━━━━━━━
テキストを行単位でラップして返す
対象文字列,ラップタグ名,ラップタグクラス
━━━━━━━━━━━━━━━*/
function br_wrap($lines, $tagname = 'li', $class = '')
{
    $lines = explode("\n", $lines);            //文字列を改行ベースで配列に分割
    $lines = array_map('trim', $lines);        //前後の空白文字を除去
    $lines = array_filter($lines, 'strlen');   //文字数0の行を除去
    $text = '';
    foreach ((array) $lines as $line) {
        $text .= '<' . $tagname . ' class="' . $class . '">' . $line . '</' . $tagname . '>';
    }
    return $text;
}

/*
  ######   ######## ########          ######  ##     ## ########  ######  ##    ##
 ##        ##          ##            ##       ##     ## ##       ##       ##  ##
 ##   #### ######      ##    ####### ##       ######### ######   ##       #####
 ##    ##  ##          ##            ##       ##     ## ##       ##       ##  ##
  ######   ########    ##             ######  ##     ## ########  ######  ##    ##
*/
// チェックボックス出力
function get_the_checkbox($name, $value, $wrap = null)
{
    if (!empty($wrap)) {
        return '<label><input name="' . $name . '[]" value="' . $value . '" type="checkbox"><' . $wrap . '>' . $value . '</' . $wrap . '></label>';
    } else {
        return '<label><input name="' . $name . '[]" value="' . $value . '" type="checkbox">' . $value . '</label>';
    }
}


/*
 ##    ##  #######  ##     ## ######## ##     ## ########  ########
   ####   ##     ## ##     ##    ##    ##     ## ##     ## ##
    ##    ##     ## ##     ##    ##    ##     ## ########  ######
    ##    ##     ## ##     ##    ##    ##     ## ##     ## ##
    ##     #######   #######     ##     #######  ########  ########
*/
// YouTubeの各種URLから動画ID抽出
/*
$youtubeID = get_the_youtubeID($url);
サムネイル取得
https://i.ytimg.com/vi/<?php echo $youtubeID;?>/0.jpg
埋め込みコード
<div class="youtube-wrap">
    <iframe width="1280" height="720" src="https://www.youtube.com/embed/<?php echo $youtubeID; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
</div>

IDが11桁であることを前提とした処理があるが、現体制でIDが12桁に上がる日は来ないので問題なし
*/
function get_the_youtubeID($url)
{
    if (strstr($url, 'iframe')) { // 埋め込みタグ
        preg_match('/src=\"(.[^\"]*)\"/', $url, $match);
        $explode = explode('/', $match[1]); // 取り出したsrc属性の内容を/で切り分けて配列に入れる
        return $explode[count($explode) - 1]; // 配列の最後を返す
    }
    if (preg_match('/http[s]*:\/\/www.youtube.com\//u', $url)) { // 通常URL
        $parse = parse_url($url);
        $keyList = array('v', 'video_id');
        parse_str($parse['query'], $query);
        foreach ($keyList as $key) { // GETパラメータvかvideo_idの中身を取る
            if (!empty($query[$key])) {
                return $query[$key];
            }
        }
        // GETパラメータがなかった場合はiframeのURL
        return substr($url, -11, 11); // 末尾11文字を返す
    }
    if (preg_match('/http[s]*:\/\/www.youtube-nocookie.com\//u', $url)) { // nocookie
        $parse = parse_url($url); // URLを構造ごとで分解
        return basename($parse['path']); // パスの最後のディレクトリを返す
    }
    if (preg_match('/http[s]*:\/\/youtu.be\//u', $url)) { // 短縮URL
        return substr($url, -11, 11); // 末尾11文字を返す
    }
    return false;
}

/*
####### ##      ####### ##   ##     ######   #####   ######  ####### ######
##      ##      ##       ## ##      ##   ## ##   ## ##       ##      ##   ##
#####   ##      #####     ###       ######  ####### ##   ### #####   ######
##      ##      ##       ## ##      ##      ##   ## ##    ## ##      ##   ##
##      ####### ####### ##   ##     ##      ##   ##  ######  ####### ##   ##
*/

// Flex Pager Var 2021-03-08
function flex_pager($args = '')
{
    global $wp_query;
    $text = '';
    $default = array(
        'query' => $wp_query, // ページ数算出に使用するクエリ 整数で直接ページ数指定も可能
        'now' => null, // 現在のページ　未指定でget_query_varから取得
        'range' => 3, // カレントからのページボタン数　指定数*2+1が総数
        'current_format' => '<span class="current">%d</span>', // カレントボタンのレイアウト
        'prev_next' => true, // 戻る/進むボタン
        'edge_pn' => false, // ページ末端側の戻る/進むボタンを表示するか
        'prev_label' => '&lt;', // 戻るボタンテキスト
        'next_label' => '&gt;', // 進むボタンテキスト
        'first_last' => true, // 最初/最後ボタン
        'edge_fl' => false, // ページ末端側の最初/最後ボタンを表示するか
        'first_last_no' => true, // 最初/最後ナンバー
        'first_label' => '&laquo;', // 最初ボタンテキスト
        'last_label' => '&raquo;', // 最後ボタンテキスト
        'op_left' => '', // 左側オプション　%d（現ページ）%d（総ページ）
        'op_right' => '', // 右側オプション　%d（現ページ）%d（総ページ）
        'navi_class' => 'page_navi', // ナビのクラス スペース区切りで複数指定
        'navi_id' => '', // ナビのID
        'child_class' => '', // 子要素のクラス
        'navi_type' => 'div', // ナビのタイプ
        'child_wrap' => '', // 子要素を括る要素
        'cw_class' => '', // child_wrapのクラス
        'cw_cu_class' => '', // child_wrapのカレントボタンクラス
        'off_class' => 'off', // edgeオプションで表示している要素のクラス wrap有効時はそちらに付加
        'echo' => true, // 出力するか、値で返すか
        'get_name' => '', // GETパラメータ名
        'get_val' => '', // GETパラメータ
        'attr' => '', // Aタグに任意の属性を追加
    );
    $args = wp_parse_args($args, $default); // パラメータとデフォルト値をマージ

    // 現在のページを求める
    if (is_int($args['now'])) { // 整数指定があればそのまま代入
        $now = $args['now'];
    } else {
        $now = get_query_var('paged'); // 現在のページ
        if ($now < 1) {
            $now = 1;
        }
    }

    // 総ページ数を求める
    if (is_int($args['query'])) { // 整数ならそのまま代入
        $max = $args['query'];
    } else { // クエリーならページ数を格納
        $max = $args['query']->max_num_pages; // 総ページ数
        if (!$max) {
            $max = 1;
        }
    }

    if (1 >= $max) { // 総ページが1ページなら終了
        return false;
    }

    $getVal = ''; // GETパラメータ
    if ($args['get_name']) { // GETパラメータの構築
        $getCount = 0;
        foreach ((array) $args['get_name'] as $getName) {
            if ($getName === 'ajax') { // Ajax用のパラメータは除外
                continue;
            }
            if (++$getCount === 1) {
                $getVal .= '?';
            } else {
                $getVal .= '&';
            }
            $getVal .= $getName . '=' . $args['get_val'][$getCount];
        }
    }


    $childWrapStart = '';
    $childWrapCurrent = '';
    $childWrapStartOff = '';
    $childWrapEnd = '';
    if ($args['child_wrap'] !== '') { // 子要素を括る要素を決定
        $childWrapStart = '<' . $args['child_wrap'] . ' class="' . $args['cw_class'] . '">';
        $childWrapCurrent = '<' . $args['child_wrap'] . ' class="' . $args['cw_class'] . ' ' . $args['cw_cu_class'] . '">';
        $childWrapStartOff = '<' . $args['child_wrap'] . ' class="' . $args['cw_class'] . ' ' . $args['off_class'] . '">';
        $childWrapEnd = '</' . $args['child_wrap'] . '>';
    }

    // 要素を括って返す関数
    function childWrap($type = 'start', $innerText)
    {
        global $childWrapStart;
        global $childWrapEnd;
        global $childWrapCurrent;
        global $childWrapStartOff;
        if ($type === 'start') {
            return $childWrapStart . $innerText . $childWrapEnd;
        }
        if ($type === 'off') {
            return $childWrapStartOff . $innerText . $childWrapEnd;
        }
        // current
        return $childWrapCurrent . $innerText . $childWrapEnd;
    }


    $text .= '<' . $args['navi_type'] . ' id="' . $args['navi_id'] . '" class="' . $args['navi_class'] . '">'; // ページャータグ

    if ($args['op_left']) {
        $text .= childWrap('start', sprintf($args['op_left'], $now, $max)); // 左オプション
    }
    if ($args['first_last']) { // 最初
        if ($now === 1 && $args['edge_fl']) { // 必要ないが、それでも表示する設定
            if ($childWrapStartOff) {
                $text .= childWrap('off', '<span class="move max first ' . $args['child_class'] . '">' . $args['first_label'] . '</span>');
            } else {
                $text .= childWrap('off', '<span class="move max first ' . $args['off_class'] . ' ' . $args['child_class'] . '">' . $args['first_label'] . '</span>');
            }
        } elseif ($now >= 2) { // 戻り先がある
            $text .= childWrap('start', '<a class="move max first ' . $args['child_class'] . '" href="' . get_pagenum_link(1) . $getVal . '" ' . $args['attr'] . ' >' . $args['first_label'] . '</a>');
        }
    }

    if ($args['prev_next']) { // 戻る
        if ($now === 1 && $args['edge_pn']) { // 戻り先がないが、それでも表示する設定
            if ($childWrapStartOff) {
                $text .= childWrap('off', '<span class="move min prev ' . $args['child_class'] . '">' . $args['prev_label'] . '</span>');
            } else {
                $text .= childWrap('off', '<span class="move min prev ' . $args['off_class'] . ' ' . $args['child_class'] . '">' . $args['prev_label'] . '</span>');
            }
        } elseif ($now >= 2) { // 戻り先がある
            $text .= childWrap('start', '<a class="move min prev ' . $args['child_class'] . '" href="' . get_pagenum_link($now - 1) . $getVal . '" ' . $args['attr'] . ' >' . $args['prev_label'] . '</a>');
        }
    }

    $prevVolume = $now - 1; // 戻れる数
    $nextVolume = $max - $now; // 進める数
    $prevRange = $args['range']; // 進む数
    $nextRange = $args['range']; // 進む数
    if ($prevVolume < $args['range']) {
        $nextRange += $args['range'] - $prevVolume;
    }
    if ($nextVolume < $args['range']) {
        $prevRange += $args['range'] - $nextVolume;
    }
    if ($args['first_last_no'] && ($now - $prevRange) > 1) { // 1ページ目のリンクを表示
        $text .= childWrap('start', '<a href="' . get_pagenum_link(1) . $getVal . '" class="page ' . $args['child_class'] . '" ' . $args['attr'] . ' >1</a>');
        if (($now - $prevRange) > 2) { // 3点リーダー
            $text .= childWrap('start', '<span class="reader ' . $args['child_class'] . '">...</span>');
        }
    }
    for ($i = $now - $prevRange; $i < $now; ++$i) { // 戻るページ番号を出力
        if ($i >= 1) {
            $text .= childWrap('start', '<a href="' . get_pagenum_link($i) . $getVal . '" class="page ' . $args['child_class'] . '" ' . $args['attr'] . ' >' . $i . '</a>');
        }
    }
    $text .= childWrap('current', sprintf($args['current_format'], $now)); // カレントページ
    for ($i = $now + 1; $i <= $now + $nextRange; ++$i) { // 進むページ番号を出力
        if ($i <= $max) {
            $text .= childWrap('start', '<a href="' . get_pagenum_link($i) . $getVal . '" class="page ' . $args['child_class'] . '" ' . $args['attr'] . ' >' . $i . '</a>');
        }
    }

    if ($args['first_last_no'] && ($now + $nextRange) < $max) { // 最終ページのリンクを表示
        if (($now + $nextRange) < ($max - 1)) { // 3点リーダー
            $text .= childWrap('start', '<span class="reader ' . $args['child_class'] . '">...</span>');
        }
        $text .= childWrap('start', '<a href="' . get_pagenum_link($max) . $getVal . '" class="page ' . $args['child_class'] . '" ' . $args['attr'] . ' >' . $max . '</a>');
    }

    if ($args['prev_next']) { // 進む
        if ($now === $max && $args['edge_pn']) { // 進み先がないが、それでも表示する設定
            if ($childWrapStartOff) {
                $text .= childWrap('off', '<span class="move min next ' . $args['child_class'] . '">' . $args['next_label'] . '</span>');
            } else {
                $text .= childWrap('off', '<span class="move min next ' . $args['off_class'] . ' ' . $args['child_class'] . '">' . $args['next_label'] . '</span>');
            }
        } elseif ($now <= $max - 1) { // 進み先がある
            $text .= childWrap('start', '<a class="move min next ' . $args['child_class'] . '" href="' . get_pagenum_link($now + 1) . $getVal . '" ' . $args['attr'] . ' >' . $args['next_label'] . '</a>');
        }
    }

    if ($args['first_last']) { // 最後
        if ($now === $max && $args['edge_fl']) { // 必要ないが、それでも表示する設定
            if ($childWrapStartOff) {
                $text .= childWrap('off', '<span class="move max last ' . $args['child_class'] . '">' . $args['last_label'] . '</span>');
            } else {
                $text .= childWrap('off', '<span class="move max last ' . $args['off_class'] . ' ' . $args['child_class'] . '">' . $args['last_label'] . '</span>');
            }
        } elseif ($now <= $max - 1) { // 進み先がある
            $text .= childWrap('start', '<a class="move max last ' . $args['child_class'] . '" href="' . get_pagenum_link($max) . $getVal . '" ' . $args['attr'] . ' >' . $args['last_label'] . '</a>');
        }
    }

    if ($args['op_right']) {
        $text .= childWrap('start', sprintf($args['op_right'], $now, $max));
    }
    $text .= '</' . $args['navi_type'] . '>';

    // URLをルート相対パスに変換
    $siteRootUrl = '';
    if (empty($_SERVER['HTTPS'])) { // SSLの有無で分岐
        $siteRootUrl = 'http://' . $_SERVER['HTTP_HOST'];
    } else {
        $siteRootUrl = 'https://' . $_SERVER['HTTP_HOST'];
    }
    $text = str_replace($siteRootUrl, '', $text);

    $text = str_replace('?ajax=1&', '?', $text);
    $text = str_replace('&ajax=1', '', $text);
    $text = str_replace('?ajax=1', '', $text);

    if ($args['echo']) {
        echo $text;
    }
    return $text;
}


/*
##     ##    ###    ##    ## ######## ########     ###     ######   ########
###   ###   ## ##   ##   ##  ##       ##     ##   ## ##   ##    ##  ##
#### ####  ##   ##  ##  ##   ##       ##     ##  ##   ##  ##        ##
## ### ## ##     ## #####    ######   ########  ##     ## ##   #### ######
##     ## ######### ##  ##   ##       ##        ######### ##    ##  ##
##     ## ##     ## ##   ##  ##       ##        ##     ## ##    ##  ##
##     ## ##     ## ##    ## ######## ##        ##     ##  ######   ########
*/
/**
 * 固定ページ生成関数
 * $slug {string} ページのパス 「hoge/fuga/foo」でhoge,fuga,fooを階層通りに生成　既存のページは生成しない
 */
// makePage('contact/confirm');
function makePage($slug)
{
    $pageList = explode('/', $slug); // 階層ごとに配列化
    $parent = 0; // 親ID
    $totalPath = '/'; // 進んだ階層の記録
    foreach ((array)$pageList as $value) {
        if (empty($value)) { // 空ならスキップ
            continue;
        }
        $totalPath .= $value . '/'; // パスを記録
        $pageData = get_page_by_path($totalPath);
        if ($pageData !== null) { // 該当のページがあったらスキップ
            $parent = $pageData->ID; // 親IDを更新
            continue;
        }
        $addPost = array(
            'post_type'      => 'page', // 投稿タイプ
            'post_title'     => $value, // タイトル 必須
            'post_content'   => '', // 本文 必須
            'post_name'      => $value, // スラッグ
            'post_parent'    => $parent, // 親投稿のID
            'post_status'    => 'publish', // draft,publish,pending,future,private
            'post_date'      => date('Y-m-d H:i:s'), // 投稿日時
            'post_date_gmt'  => gmdate('Y-m-d H:i:s'), // 投稿日時（GMT）
            // 'post_category'  => array(1,2,3), // カテゴリー IDを指定
            // 'tags_input'     => 'hoge,fuga', // 投稿タグ 名前を指定
            // 'tax_input'      => array('hogeTax' => '1,2,3'), // タクソノミー 階層ありはID,なしは名前を指定
        );
        $parent = wp_insert_post($addPost); // 新規投稿して親IDを更新
    }
}


/*
##        #######   ######
##       ##     ## ##
##       ##     ## ##   ####
##       ##     ## ##    ##
########  #######   ######
*/

/**
 * ログ生成関数
 * $logText {String|Number|Array|Object} 記録データ
 */

$G_function_outputLog_isLogClean = false;
function outputLog($logText = '')
{
    // ログファイルパス
    $logFilePath = ABSPATH . 'wp-logs';
    $logFileName = '-output.log';
    // ログ保存日数
    $saveDays = 15;

    if (!file_exists($logFilePath)) { // ログ保存ディレクトリが無かったら作成
        if (!mkdir($logFilePath, 0777)) { // 作成できなければ中止
            return;
        }
    }


    // 配列,オブジェクトを処理
    $logTextType = gettype($logText);
    if ($logTextType === 'array') {
        $logText = print_r($logText, true);
    } elseif ($logTextType === 'object') {
        $logText = var_export($logText, true);
    }

    // 処理用の時間情報を取得
    date_default_timezone_set('Asia/Tokyo');
    // 今日の日付
    $logToday = date('Y-m-d');
    // 実行時の詳細な時間
    $logTime = $logToday . ' ' . date('H:i:s') . '.' . sprintf('%03d', substr(explode('.', (microtime(true) . ''))[1], 0, 3));


    // 呼び出し元の情報
    $logCall = debug_backtrace()[0];
    $logCallFile = $logCall['file'];
    $logCallLine = $logCall['line'];

    // ログ出力
    error_log(
        '[' . $logTime  . '][' . $logCallFile .
            ':' . $logCallLine . '][' . $logTextType . '] ' . $logText . "\n",
        3,
        $logFilePath . '/' . $logToday . $logFileName
    );

    // ログメンテナンス処理
    global $G_function_outputLog_isLogClean; // 1度だけ実行するためのフラグ
    if ($G_function_outputLog_isLogClean) {
        return;
    }

    // アクセス禁止用の.htaccessを生成する
    $logHtaccess = $logFilePath . '/.htaccess';
    if (!file_exists($logHtaccess)) {
        $htText = <<<HTACCESS
Order Allow,Deny
Deny from all
# outputLog('出力テキスト'); で生成されたログファイルが設置される
HTACCESS;
        file_put_contents($logHtaccess, $htText);
        error_log(
            '[' . $logTime  . '][LogMaintenance] Create .htaccess' . "\n",
            3,
            $logFilePath . '/' . $logToday . $logFileName
        );
    }

    // 保存日数を超過したログファイルを削除する
    foreach (scandir($logFilePath) as $file) {
        if (strpos($file, $logFileName) !== false) {
            $delPointDate = date('Ymd', strtotime('-' . $saveDays . ' day'));
            $backupLogDate = date('Ymd', filemtime($logFilePath . '/' . $file));
            if ($backupLogDate - $delPointDate < 0) {
                unlink($logFilePath . '/' . $file);
                // ログ出力
                error_log(
                    '[' . $logTime  . '][LogMaintenance] ' .
                        $logFilePath . '/' . $file . 'is deleted' . "\n",
                    3,
                    $logFilePath . '/' . $logToday . $logFileName
                );
            }
        }
    }
    $G_function_outputLog_isLogClean = true;
}

//  #####   ####   ####    ###    #####   #####
//  ##     ##     ##      ## ##   ##  ##  ##
//  #####   ###   ##     ##   ##  #####   #####
//  ##        ##  ##     #######  ##      ##
//  #####  ####    ####  ##   ##  ##      #####
// 出力用のエスケープを行う
function e($text)
{
    return  htmlspecialchars($text, ENT_QUOTES, 'UTF-8'); // HTML特殊文字をHTMLエンティティにエスケープ
}
