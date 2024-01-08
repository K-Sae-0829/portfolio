<?php get_header(); ?>
<article class="contents original bottom-city">
    <section class="original__main wrap w1200 sp-wrap js-in anime bottom-in">
        <h1 class="common__h2 original__head pulsate js-in anime flip-x">
            Original Works
        </h1>
        <p class="original__lead">自主制作したものを掲載しています。<br class="sp">クリックするとインスタグラムにジャンプします。</p>
        <?php //echo do_shortcode('[mwform_formkey key="6"]');
        ?>
        <div class="original__sns js-in anime bottom-in">
            <?php echo do_shortcode('[instagram-feed feed=1]'); ?>
        </div>
        <div class="original__btn-area js-in anime bottom-in">
            <a href="https://www.instagram.com/kimu.sae/?igsh=aGdvdm9rNXJoaDN1&utm_source=qr" target="_blank" class="mainBtn singleWorks__backbtn">
                <span class="blink-2">INSTAGRAM</span><i class="icon icon-newtab mainBtn__icon blink"></i>
            </a>
        </div>
    </section>
    <?php get_template_part('parts-contact'); ?>
</article>
<?php get_footer();
