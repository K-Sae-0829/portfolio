<?php get_header(); ?>
<article class="contents contact bottom-city">
    <section class="contact__main wrap w1200 sp-wrap js-in anime bottom-in">
        <h1 class="common__h2 contact__head pulsate">
            Contact
        </h1>
        <p class="contact__lead">お問い合わせはこちらから受け付けています。</p>
        <?php //echo do_shortcode('[mwform_formkey key="6"]');
        ?>
        <?php echo do_shortcode('[contact-form-7 id="b3b9e1e" title="コンタクトフォーム 1"]'); ?>
    </section>
</article>
<?php get_footer();
