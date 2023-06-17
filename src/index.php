<?php get_header(); ?>
<article class="contents top bottom-city bottom-in">
    <div class="top__mv">
        <div id="luxy">
            <div class="top__infomation">
                <?php
                $query = array(  // クエリー初期設定
                    'post_type' => 'update', // 投稿タイプ
                    'post_status' => 'publish', // 公開済みの記事
                    'posts_per_page' => 1, // 出力数　-1で全件
                    'order' => 'ASC', // ソート　ASC/DESC
                );
                $query = new WP_Query($query);

                if ($query->have_posts()) {
                ?>
                    <div class="swiper js-mvNewsSlide" id="js-mvNewsSlide">
                        <div class="swiper-wrapper js-mvNewsSlide__wrap">
                            <?php while ($query->have_posts()) {
                                $query->the_post(); ?>
                                <p class="aquatico txt-bright blink-2 swiper-slide"><?php echo get_the_date('y.m.d'); ?> | <?php echo get_the_title(); ?></p>
                            <?php } ?>
                        </div>
                    </div>
                <?php }
                wp_reset_postdata();
                ?>
            </div>
            <div class="js-in anime flip-x">
                <div class="luxy-el" data-speed-y="4">
                    <img src="<?php echo T_URL; ?>img/logo.png" alt="KIMURASAE's Portpoliosite" class="top__logo">
                </div>
            </div>
            <div class="top__mv-city js-in anime bottom-in wave3" data-horizontal="1" data-speed-x="-5">
                <img src="<?php echo T_URL; ?>img/mv-city.png" alt="">
            </div>
            <div class="top__mv-city top__mv-city--bg luxy-el" data-horizontal="1" data-speed-x="-5">
                <img src="<?php echo T_URL; ?>img/mv-city-bg.png" alt="">
            </div>
        </div>
    </div>
    <section class="top__about wrap w1200 sp-wrap js-box js-in anime bottom-in" id="js-box1">
        <div id="luxy">
            <div class="luxy-el" data-speed-y="6" data-offset="-50">
                <div class="topAbout double-border-box">
                    <h2 class="common__h2 topAbout__head righteous">
                        Abo<span class="">u</span>t
                        <img src="<?php echo T_URL; ?>img/about.png" alt="About" class="about">
                    </h2>
                    <div class="pc-flex bet vcenter">
                        <div class="">
                            <p>
                                ご覧いただきありがとうございます。<br>
                                元来絵を描くこと、何かを生み出すことが大好きで、高校から美術科に進学し専門的な勉強を続けてきました。<br>
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
            </div>
        </div>
    </section>
    <section class="top__works js-box">
        <div class="topWorks">
            <div class="topWorks__slider flex">
                <div class="swiper js-topWorkSlide" id="js-topWorkSlide">
                    <div class="swiper-wrapper js-topWorkSlide__wrap">
                        <div class="swiper-slide js-topWorkSlide__img"><img src="<?php echo T_URL; ?>img/top_work_mv01.png" alt=""></div>
                        <div class="swiper-slide js-topWorkSlide__img"><img src="<?php echo T_URL; ?>img/top_work_mv02.png" alt=""></div>
                        <div class="swiper-slide js-topWorkSlide__img"><img src="<?php echo T_URL; ?>img/top_work_mv03.png" alt=""></div>
                        <div class="swiper-slide js-topWorkSlide__img"><img src="<?php echo T_URL; ?>img/top_work_mv01.png" alt=""></div>
                        <div class="swiper-slide js-topWorkSlide__img"><img src="<?php echo T_URL; ?>img/top_work_mv02.png" alt=""></div>
                        <div class="swiper-slide js-topWorkSlide__img"><img src="<?php echo T_URL; ?>img/top_work_mv03.png" alt=""></div>
                        <div class="swiper-slide js-topWorkSlide__img"><img src="<?php echo T_URL; ?>img/top_work_mv01.png" alt=""></div>
                    </div>
                </div>
                <div class="swiper js-topWorkSlide js-topWorkSlide--return" id="js-topWorkSlide">
                    <div class="swiper-wrapper js-topWorkSlide__wrap">
                        <div class="swiper-slide js-topWorkSlide__img"><img src="<?php echo T_URL; ?>img/top_work_mv01.png" alt=""></div>
                        <div class="swiper-slide js-topWorkSlide__img"><img src="<?php echo T_URL; ?>img/top_work_mv02.png" alt=""></div>
                        <div class="swiper-slide js-topWorkSlide__img"><img src="<?php echo T_URL; ?>img/top_work_mv03.png" alt=""></div>
                        <div class="swiper-slide js-topWorkSlide__img"><img src="<?php echo T_URL; ?>img/top_work_mv01.png" alt=""></div>
                        <div class="swiper-slide js-topWorkSlide__img"><img src="<?php echo T_URL; ?>img/top_work_mv02.png" alt=""></div>
                        <div class="swiper-slide js-topWorkSlide__img"><img src="<?php echo T_URL; ?>img/top_work_mv03.png" alt=""></div>
                        <div class="swiper-slide js-topWorkSlide__img"><img src="<?php echo T_URL; ?>img/top_work_mv01.png" alt=""></div>
                    </div>
                </div>
                <div class="swiper js-topWorkSlide" id="js-topWorkSlide">
                    <div class="swiper-wrapper js-topWorkSlide__wrap">
                        <div class="swiper-slide js-topWorkSlide__img"><img src="<?php echo T_URL; ?>img/top_work_mv01.png" alt=""></div>
                        <div class="swiper-slide js-topWorkSlide__img"><img src="<?php echo T_URL; ?>img/top_work_mv02.png" alt=""></div>
                        <div class="swiper-slide js-topWorkSlide__img"><img src="<?php echo T_URL; ?>img/top_work_mv03.png" alt=""></div>
                        <div class="swiper-slide js-topWorkSlide__img"><img src="<?php echo T_URL; ?>img/top_work_mv01.png" alt=""></div>
                        <div class="swiper-slide js-topWorkSlide__img"><img src="<?php echo T_URL; ?>img/top_work_mv02.png" alt=""></div>
                        <div class="swiper-slide js-topWorkSlide__img"><img src="<?php echo T_URL; ?>img/top_work_mv03.png" alt=""></div>
                        <div class="swiper-slide js-topWorkSlide__img"><img src="<?php echo T_URL; ?>img/top_work_mv01.png" alt=""></div>
                    </div>
                </div>
                <div class="swiper js-topWorkSlide js-topWorkSlide--return" id="js-topWorkSlide">
                    <div class="swiper-wrapper js-topWorkSlide__wrap">
                        <div class="swiper-slide js-topWorkSlide__img"><img src="<?php echo T_URL; ?>img/top_work_mv01.png" alt=""></div>
                        <div class="swiper-slide js-topWorkSlide__img"><img src="<?php echo T_URL; ?>img/top_work_mv02.png" alt=""></div>
                        <div class="swiper-slide js-topWorkSlide__img"><img src="<?php echo T_URL; ?>img/top_work_mv03.png" alt=""></div>
                        <div class="swiper-slide js-topWorkSlide__img"><img src="<?php echo T_URL; ?>img/top_work_mv01.png" alt=""></div>
                        <div class="swiper-slide js-topWorkSlide__img"><img src="<?php echo T_URL; ?>img/top_work_mv02.png" alt=""></div>
                        <div class="swiper-slide js-topWorkSlide__img"><img src="<?php echo T_URL; ?>img/top_work_mv03.png" alt=""></div>
                        <div class="swiper-slide js-topWorkSlide__img"><img src="<?php echo T_URL; ?>img/top_work_mv01.png" alt=""></div>
                    </div>
                </div>
            </div>
            <div class="topWorks__bg">
                <img src="<?php echo T_URL; ?>img/top_work_bg.png" alt="">
            </div>
            <div class="topWorks__content">
                <div class="wrap w1200 sp-wrap">
                    <h2 class="common__h2 topWorks__head pulsate js-in anime bottom-in">
                        works
                    </h2>
                    <p class="topWorks__txt js-in anime bottom-in">
                        お仕事で制作したもの（主にWebデザイン）を掲載しています。<br>
                        下記ボタンから一覧をご覧いただけます。<br>
                        ※こちらのページは一時的にパスワードで保護することがあります
                    </p>
                    <div class="topAbout__btn-area js-in anime bottom-in">
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
                <h2 class="common__h2 topOriginal__head pulsate js-in anime bottom-in">
                    Original works
                </h2>
                <div class="pc-flex vend">
                    <div class="topOriginal__tv js-in anime bottom-in">
                        <div class="swiper js-topOriginalSlide" id="js-topOriginalSlide">
                            <div class="swiper-wrapper js-topOriginalSlide__wrap">
                                <div class="swiper-slide topOriginal__img"><img src="<?php echo T_URL; ?>img/top_tv.png" alt=""></div>
                                <div class="swiper-slide topOriginal__img"><img src="<?php echo T_URL; ?>img/top_tv_02.png" alt=""></div>
                                <div class="swiper-slide topOriginal__img"><img src="<?php echo T_URL; ?>img/top_tv.png" alt=""></div>
                                <div class="swiper-slide topOriginal__img"><img src="<?php echo T_URL; ?>img/top_tv_02.png" alt=""></div>
                            </div>
                        </div>
                    </div>
                    <div class="topOriginal__right">
                        <p class="topOriginal__txt js-in anime bottom-in">
                            趣味で自主制作したイラストやグラフィック、Webサイトや、<br>
                            学生時代に描いた絵画・作品などはこちらに掲載しています。<br>
                            作品の世界観を通して”きむらさえ”という人物像により深みを与えることができたら嬉しいです。
                        </p>
                        <div class="topOriginal__btn-area js-in anime bottom-in">
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
