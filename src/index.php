<?php get_header(); ?>
<article class="contents top bottom-city">
    <div class="top__mv">
        <img src="<?php echo T_URL; ?>img/logo.png" alt="KIMURASAE's Portpoliosite" class="top__logo">
        <p class="virna">AAAAAAAAAAA</p>
        <p class="aquatico">AAAAAAAAAAA</p>
        <div class="top__mv-city">
            <img src="<?php echo T_URL; ?>img/mv-city.png" alt="">
        </div>
    </div>
    <section class="top__about wrap w1200 sp-wrap js-box" id="js-box1">
        <div class="topAbout double-border-box">
            <h2 class="common__h2 topAbout__head pulsate">
                Abo<span class="">u</span>t
            </h2>
            <div class="pc-flex bet vcenter">
                <div class="">
                    <p>
                        ご覧いただきありがとうございます。<br>
                        元来絵を描くこと、何かを生み出すことが大好きで、高校から美術科に進学し勉強を続けてきました。<br>
                        その後桑沢デザイン研究所にてファッションデザインを専攻したのち、紆余曲折を経て、<br>
                        現在はWebデザイナー・フロントエンドエンジニアとしてキャリアを積んでいる最中です。<br>
                        詳しい経歴やスキルは下記からご覧いただけます。
                    </p>
                    <div class="topAbout__btn-area">
                        <a href="#" class="mainBtn">
                            <span class="blink-2">MORE</span><i class="icon icon-up-arrow mainBtn__icon blink"></i>
                        </a>
                    </div>
                </div>
                <div class="topAbout__image">
                    <img src="<?php echo T_URL; ?>img/portrait.png" alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="top__works js-box">
        <div class="topWorks">
            <div class="topWorks__bg01"><img src="<?php echo T_URL; ?>img/top_work_bg.png" alt=""></div>
            <div class="topWorks__bg02"><img src="<?php echo T_URL; ?>img/top_work_bg02.png" alt=""></div>
            <div class="topWorks__content">
                <div class="wrap w1200 sp-wrap">
                    <h2 class="common__h2 topWorks__head pulsate">
                        works
                    </h2>
                    <p class="topWorks__txt">
                        お仕事で制作したもの（主にWebデザイン）を掲載しています。<br>
                        下記ボタンから一覧をご覧いただけます。<br>
                        ※こちらのページは一時的にパスワードで保護することがあります
                    </p>
                    <div class="topAbout__btn-area">
                        <a href="#" class="mainBtn">
                            <span class="blink-2">MORE</span><i class="icon icon-up-arrow mainBtn__icon blink"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="top__original js-box">
        <div class="topOriginal">
            <div class="topOriginal__content wrap w1200 sp-wrap">
                <h2 class="common__h2 topOriginal__head pulsate">
                    Original works
                </h2>
                <div class="pc-flex vend">
                    <div class="topOriginal__tv">
                        <div class=" topOriginal__img"><img src="<?php echo T_URL; ?>img/top_tv.png" alt=""></div>
                    </div>
                    <div class="topOriginal__right">
                        <p class="topOriginal__txt">
                            趣味で自主制作したイラストやグラフィック、Webサイトや、<br>
                            学生時代に描いた絵画・作品などはこちらに掲載しています。<br>
                            作品の世界観を通して”きむらさえ”という人物像により深みを与えることができたら嬉しいです。
                        </p>
                        <div class="topOriginal__btn-area">
                            <a href="<?php echo H_URL; ?>" class="mainBtn">
                                <span class="blink-2">MORE</span><i class="icon icon-up-arrow mainBtn__icon blink"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php get_template_part('parts-contact'); ?>
</article>
<?php get_footer();
