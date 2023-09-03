<!DOCTYPE html>
<html lang="ja" itemscope itemtype="https://schema.org/WebPage">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <?php
    global $aioseop_options; //All In One SEO Packのホーム設定取得
    if (!empty($post->ID) && !get_post_meta($post->ID, '_aioseop_description', true) && !empty($aioseop_options)) { //ページディスクリプションがない場合はホームディスクリプション出力
    ?>
        <meta name="description" itemprop="description" content="<?php echo $aioseop_options['aiosp_home_description']; ?>">
    <?php
    }

    if (!empty($post->ID) && !get_post_meta($post->ID, '_aioseop_keywords', true) && !empty($aioseop_options)) { //ページキーワードがない場合はホームキーワード出力
    ?>
        <meta name="keywords" itemprop="keywords" content="<?php echo $aioseop_options['aiosp_home_keywords']; ?>">
    <?php
    }
    ?>

    <?php
    if (is_archive() && function_exists('aioseo')) {
        // アーカイブの場合はOGPタグを自力で生成 画像はAll in One SEO Pack のデフォルト画像を要設定
        $ogpImage = aioseo()->options->social->facebook->general->defaultImagePosts;
    ?>
        <meta property="og:site_name" content="<?php echo SITE_NAME; ?>" />
        <meta property="og:title" content="<?php wp_title('|', true, 'right');
                                            echo SITE_NAME; ?>" />
        <meta name="twitter:title" content="<?php wp_title('|', true, 'right');
                                            echo SITE_NAME; ?>" />
        <meta name="twitter:domain" content="<?php echo $_SERVER['HTTP_HOST']; ?>" />
        <meta property="og:url" content="<?php echo (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" />
        <meta property="og:image" content="<?php echo $ogpImage; ?>" />
        <meta name="twitter:image" content="<?php echo $ogpImage; ?>" />
        <meta itemprop="image" content="<?php echo $ogpImage; ?>" />
        <meta property="og:type" content="article" />
        <meta name="twitter:card" content="summary_large_image" />
    <?php } ?>
    <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        <?php wp_title('|', true, 'right'); ?>
    </title>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo T_URL; ?>css/common.css?v<?php echo filemtime(T_PATH . 'css/common.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.15/jquery.bxslider.min.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:400,500,700&display=swap" rel="stylesheet" media="print" onload="this.media='all'">
    <link href="<?php echo T_URL; ?>font/Virna-Regular.ttf" rel="stylesheet" media="print" onload="this.media='all'">
    <link href="<?php echo T_URL; ?>font/Aquatico-Regular.otf" rel="stylesheet" media="print" onload="this.media='all'">
    <?php wp_head(); ?>
    <meta name="theme-color" content="#000000">
</head>

<body <?php body_class(); ?> class="">
    <div class="common-bg">
        <div id="luxy">
            <div id="overlay" class="md-overlay"></div>
            <header id="header" class="header" itemscope="" itemtype="https://schema.org/WPHeader">
                <div class="header__frame">
                    <div class="header__base flex bet str">
                        <?php if (is_home() || is_front_page()) { ?>
                            <div class="header__left flex vcenter">
                                <a class="header__mailform" href="<?php echo H_URL; ?>">
                                    <i class="icon icon-mail txt-bright"></i>
                                </a>
                            </div>
                        <?php } else { ?>
                            <div class="header__left flex vcenter">
                                <a class="headerLogo" href="<?php echo H_URL; ?>">
                                    <?php echo IS_HOME ? '<h1 class="headerLogo__in flex vcenter">' : '<span class="headerLogo__in flex vcenter">'; ?>
                                    <img class="headerLogo__img" src="<?php echo T_URL; ?>img/logo.png" alt="KIMURASAE's Portpoliosite" />
                                    <span class="headerLogo__text aquatico">KIMURA SAE<br>PORTFOLIO SITE</span>
                                    <?php echo IS_HOME ?  '</h1>' : '</span>'; ?>
                                </a>
                            </div>
                        <?php }; ?>
                        <div class="header__right flex">
                            <!--<div class="pc headerPulldown">
                        <span class="md-uline headerPulldown__head flex vcenter hcenter">
                            プルダウン1
                        </span>
                        <div class="headerPulldown__body">
                            <div class="wrap w1200">
                                <div class="headerPulldown__list flex">
                                    <a href="" class="headerPulldown__link flex">
                                        テキスト1
                                    </a>
                                    <a href="" class="headerPulldown__link flex">
                                        テキスト2
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pc headerPulldown">
                        <span class="md-uline headerPulldown__head flex vcenter hcenter">
                            プルダウン2
                        </span>
                        <div class="headerPulldown__body">
                            <div class="wrap w1200">
                                <div class="headerPulldown__list flex">
                                    <a href="" class="headerPulldown__link flex">
                                        テキスト3
                                    </a>
                                    <a href="" class="headerPulldown__link flex">
                                        テキスト4
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo H_URL; ?>entry/" class="pc headerNav__btn md-btn black stay">
                        エントリー
                    </a>-->
                            <button type="button" id="gNav-open" class="gNavBtn">
                                <div class="gNavBtn__box">
                                    <span class="gNavBtn__bar bright"></span>
                                    <span class="gNavBtn__bar bright"></span>
                                    <span class="gNavBtn__bar bright"></span>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </header>

            <?php
            /*
 ######           ##    ##    ###    ##     ##
##                ####  ##  ##   ##  ##     ##
##   #### ####### ## ## ## ##     ## ##     ##
##    ##          ##  #### #########  ##   ##
 ######           ##    ## ##     ##    ###
*/
            ?>
            <nav id="gNav" class="gNav" itemscope="" itemtype="https://schema.org/SiteNavigationElement">
                <div class="gNav__close">
                    <button type="button" id="gNav-open" class="gNavBtn">
                        <div class="gNavBtn__box">
                            <span class="gNavBtn__bar bright"></span>
                            <span class="gNavBtn__bar bright"></span>
                            <span class="gNavBtn__bar bright"></span>
                        </div>
                    </button>
                </div>
                <div class="gNav__menu md-acc">
                    <div class="gNav__box">
                        <input id="gNav1" class="acc-check" type="checkbox" value="" />
                        <label for="gNav1" class="acc-btn gNav__item flex vcenter aquatico">
                            <a href="<?php echo H_URL; ?>about/">ABOUT</a>
                            <i class="gNav__icon gNav__icon icon-down"></i>
                        </label>
                        <div class="acc-body">
                            <div class="acc-in">
                                <a href="<?php echo H_URL; ?>about/#career" class="acc-hide gNav__item gNav__item--sub flex vcenter">
                                    経歴
                                </a>
                                <a href="<?php echo H_URL; ?>about/#skills" class="acc-hide gNav__item gNav__item--sub flex vcenter">
                                    スキルマップ
                                </a>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo H_URL; ?>works/" class="gNav__item flex vcenter aquatico">
                        WORKS
                    </a>
                    <a href="<?php echo H_URL; ?>" class="gNav__item flex vcenter aquatico">
                        original WORKS
                    </a>
                    <a href="<?php echo H_URL; ?>" class="gNav__item flex vcenter aquatico">
                        CONCEPT
                    </a>
                </div>
                <!--<div class="gNav__contact">
                <a href="<?php echo H_URL; ?>contact/" class="gNav__btn gNav__btn--mail md-btn black">
                    お問い合わせ
                </a>
            </div>-->
            </nav>

            <div class="headerPad"></div>