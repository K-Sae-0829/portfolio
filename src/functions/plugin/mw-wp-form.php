<?php
$mwFormID = 000;

/*
 ######   ######   ######
##       ##       ##
##        ######   ######
##             ##       ##
 ######   ######   ######
CSSだけでなくJSも消せるが、JS内に必須の処理があるため消すと動作しなくなる
*/
// add_action('mwform_enqueue_scripts_mw-wp-form-' . $mwFormID, function () {
//     wp_dequeue_style('mw-wp-form'); // 標準のCSSを削除
// });


/*
 ##     ##    ###    ##       #### ########
 ##     ##  ##   ##  ##        ##  ##     ##
 ##     ## ##     ## ##        ##  ##     ##
  ##   ##  ######### ##        ##  ##     ##
    ###    ##     ## ######## #### ########
*/
/*━━━━━━━━━━━━━━━
バリデーション変更
━━━━━━━━━━━━━━━*/

// add_filter('mwform_validation_mw-wp-form-' . $mwFormID,'validationChange',10,3);
// function validationChange($Validation, $data, $Data)
// {
//     /*
//     noEmpty テキストボックス系　入力必須
//         $Validation->set_rule('user', 'noEmpty');
//     required チェックボックス　入力必須（ラジオボタンを必須にする手段はない？）
//         $Validation->set_rule('check', 'required');
//     mail メールアドレス
//         $Validation->set_rule('mail', 'mail', array('message' => '※メールアドレスの形式ではありません'));
//     alphaNumeric 英数字
//     hiragana ひらがな
//     katakana カタカナ
//     kana ひらがなカタカナ
//     zip 郵便番号
//     date 日付
//     url URL
//     between 指定範囲の数値
//         $Validation->set_rule('age', 'between', array( 'min' => 18, 'max' => 60 ));
//     minLength 指定以上の文字数　maxは無い
//         $textLen = 100;
//         $Validation->set_rule('text', 'minLength', array(
//             'min' => $textLen,
//             'message' => '※' . $textLen . '文字以上記入してください'
//         ));
//     in 指定した値ではない
//         $Validation->set_rule('select', 'in', array(
//             'options' => array( 'A', 'B', 'C' ),
//             'message' => '値が不正です。'
//         ));
//     */
//     if ($Data->get('hoge') === '') { //指定の項目を選んでいた場合
//     }
//     return $Validation;
// }


/*
 ##     ##    ###    #### ##
 ###   ###   ## ##    ##  ##
 ## ### ## ##     ##  ##  ##
 ##     ## #########  ##  ##
 ##     ## ##     ## #### ########
*/
/*━━━━━━━━━━━━━━━
メール変更
━━━━━━━━━━━━━━━*/
/*
         ##     ##  ######  ######## ########
         ##     ## ##       ##       ##     ##
 ####### ##     ##  ######  ######   ########
         ##     ##       ## ##       ##   ##
          #######   ######  ######## ##     ##
*/
// add_filter('mwform_auto_mail_raw_mw-wp-form-' . $mwFormID,'userMail',10,3);
// function userMail($Mail_raw, $values, $Data)
// {
//     $mailHeader = <<<'CONTACT'
// {user}様

// この度はお問い合せいただき、
// 誠にありがとうございます。

// 下記内容にてお問い合せを受け付けました。
// 内容に相違がありましたら、お手数ですが返信メールにてご連絡お願いいたします。
// CONTACT;
//     $mailFooter = <<<'CONTACT'
// CONTACT;

//     if ($Data->get('hoge') === '') { //指定の項目を選んでいた場合
//         // $Mail_raw->from    = ''; //送信元メールアドレスを変更
//         // $Mail_raw->sender  = ''; //送信者名を変更
//         // $Mail_raw->subject = ''; //件名を変更
//         // $Mail_raw->reply_to = ''; // 返信先メールアドレスを変更
//         // $Mail_raw->body = '';
//         // $Mail_raw->body .= $mailHeader;
//         // $Mail_raw->body .= <<<CONTACT

// // CONTACT;
// //         $Mail_raw->body .= $mailFooter;
//     }
//     return $Mail_raw;
// }

/*
            ###    ########  ##     ## #### ##    ##
          ##   ##  ##     ## #### ####  ##  ####  ##
 ####### ##     ## ##     ## ## ### ##  ##  ## ## ##
         ######### ##     ## ##     ##  ##  ##  ####
         ##     ## ########  ##     ## #### ##    ##
*/
// add_filter('mwform_admin_mail_raw_mw-wp-form-' . $mwFormID, 'adminMail', 10, 3);
// function adminMail($Mail_raw, $values, $Data)
// {
//     $mailHeader = <<<'CONTACT'
// お問い合せフォームにて、下記お問い合わせがありました。
// CONTACT;
//     $mailFooter = <<<'CONTACT'
// CONTACT;

//     if ($Data->get('hoge') === '') { //指定の項目を選んでいた場合
//         $Mail_raw->from    = ''; //送信元メールアドレスを変更
//         $Mail_raw->sender  = ''; //送信者名を変更
//         $Mail_raw->subject = ''; //件名を変更
//         $Mail_raw->reply_to = ''; // 返信先メールアドレスを変更
//         // 本文を変更
//         $Mail_raw->body = '';
//         $Mail_raw->body .= $mailHeader;
//         $Mail_raw->body .= <<<CONTACT
// CONTACT;
//         $Mail_raw->body .= $mailFooter;
//     }
//     return $Mail_raw;
// }



/*
  ######  ######## ##       ########  ######  ########
 ##       ##       ##       ##       ##          ##
  ######  ######   ##       ######   ##          ##
       ## ##       ##       ##       ##          ##
  ######  ######## ######## ########  ######     ##
*/
/*━━━━━━━━━━━━━━━
セレクトボックスに投稿を反映する
━━━━━━━━━━━━━━━*/

// add_filter('mwform_choices_mw-wp-form-' . $mwFormID, 'addSelect', 5, 2);
// function addSelect($children, $atts)
// {
//     if ($atts['name'] == 'hoge') {
//         $query = array(	//クエリー初期設定
//             'post_type' => 'post', //投稿タイプ
//             'post_status' => 'publish', //公開済みの記事
//             'posts_per_page' => -1, //出力数　-1で全件
//             'order' => 'ASC', //昇順ソート
//         );
//         $query = new WP_Query($query);
//         $values = array();
//         if ($query -> have_posts()) {
//             $values[''] = '';
//             while ($query -> have_posts()) {
//                 $query -> the_post();
//                 $values[] = get_the_title();
//             }
//         }
//         wp_reset_postdata();
//         $values = array_unique($values); //重複を削除
//         foreach ($values as $val) {
//             $children[$val] = $val;
//         }
//     }
//     return $children;
// }


/*
 ##     ## ########  ##
 ##     ## ##     ## ##
 ##     ## ########  ##
 ##     ## ##    ##  ##
  #######  ##     ## ########
*/
/*━━━━━━━━━━━━━━━
URL引数を反映する
━━━━━━━━━━━━━━━*/
// add_filter( 'mwform_value_mw-wp-form-' . $mwFormID, 'valueDefault', 10, 2 );
// function valueDefault($value, $name)
// {
//     // $_GET['hoge']があったら、name属性がhogeの項目の初期値に設定
//     // 対象にvalueがセット済みだと動かない（value=""も不可　記述自体しないこと）
//     $targetName = 'hoge';
//     if ($name === $targetName && !empty($_GET[$targetName]) && !is_array($_GET[$targetName])) {
//         return $_GET[$targetName];
//     }
//     return $value;
// }



//  ##   ##    ###    ##      ##                ##  #####
//  ##   ##   ## ##   ##      ##                ##  ##  ##
//  ##   ##  ##   ##  ##      ##  ########      ##  #####
//   ## ##   #######  ##      ##            ##  ##  ##
//    ###    ##   ##  ######  ##             ####   ##
/*
入力内容に日本語を含めることを強制するバリデーション設定を管理画面に追加
※未入力は許容する
*/
if (class_exists('MW_WP_Form_Abstract_Validation_Rule')) {
    class MW_WP_Form_Validation_Rule_Japanese extends MW_WP_Form_Abstract_Validation_Rule
    {
        protected $name = 'japanese';

        public function rule($key, array $options = array())
        {
            $value = $this->Data->get($key);
            if (empty($value)) {
                // 未入力
                return;
            }
            if (preg_match('/[一-龠]+|[ぁ-ん]+|[ァ-ヴー]/u', $value)) {
                // 日本語を含む
                return;
            }
            $defaults = array(
                'message' => '日本語で入力してください。'
            );
            $options = array_merge($defaults, $options);
            return $options['message'];
        }

        public function admin($key, $value)
        {
?>
            <label><input type="checkbox" <?php checked($value[$this->getName()], 1); ?> name="<?php echo MWF_Config::NAME; ?>[validation][<?php echo $key; ?>][<?php echo esc_attr($this->getName()); ?>]" value="1" />日本語を含む</label>
<?php
        }
    }

    function mwform_validation_rule_japanese($validation_rules)
    {
        $instance = new MW_WP_Form_Validation_Rule_Japanese();
        $validation_rules[$instance->getName()] = $instance;
        return $validation_rules;
    }

    add_filter('mwform_validation_rules', 'mwform_validation_rule_japanese');
}
