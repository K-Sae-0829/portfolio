<?php get_header(); ?>
<article class="contents error404 bottom-city">
    <section class="error404__main wrap w1200 sp-wrap js-in anime bottom-in">
        <h1 class="common__h2 error404__head pulsate js-in anime flip-x">
            404 Error
        </h1>
        <p class="error404__lead">申し訳ありません。<br class="sp">お探しのページが見つかりませんでした。<br>移動されたか削除された可能性があります。<br>トップページまたはメニューからご覧になりたいコンテンツをお探しください。</p>
        <?php //echo do_shortcode('[mwform_formkey key="6"]');
        ?>
        <div class="error404__btn-area js-in anime bottom-in">
                    <a href="<?php echo H_URL; ?>" class="mainBtn mainBtn--back singleWorks__backbtn">
                        <i class="icon icon-up-arrow mainBtn__icon blink"></i><span class="blink-2">BACK TO TOP</span>
                    </a>
        </div>
    </section>
    <?php get_template_part('parts-contact'); ?>
</article>
<?php get_footer();
