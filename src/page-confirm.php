<?php get_header(); ?>
<article class="contents contact bottom-city">
    <section class="contact__main wrap w1200 sp-wrap">
        <h1 class="common__h2 contact__head pulsate">
            Contact
        </h1>
        <p class="contact__lead">下記内容で送信します。</p>
        <?php echo do_shortcode('[mwform_formkey key="6"]'); ?>
    </section>
</article>
<?php get_footer();
