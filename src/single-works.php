<?php get_header(); ?>
<article class="contents singleWorks bottom-city">
    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            $postID = get_the_ID();
            $tag = get_the_terms($postID, 'works-tag');
            $lead = get_post_meta($postID, 'lead-txt', true);
            $pcImg = SCF::get('works-pc');
            $spImg = SCF::get('works-sp');
            $point = SCF::get('works-point');
    ?>

            <div class="wrap w1200 sp-wrap">
                <h1 class="singleWorks__h1"><?php echo get_the_title(); ?></h1>
                <div class="singleWorks__txt-area">
                    <div class="singleWorks__tag-area">
                        <?php
                        foreach ($tag as $tag) { ?>
                            <p class="singleWorks__tag"><?php echo $tag->name; ?></p>
                        <?php } ?>
                    </div>
                    <p class="singleWorks__lead">
                        <?php echo nl2br($lead); ?>
                    </p>
                </div>
                <h2 class="singleWorks__h2 aquatico txt-bright">PC<span class="singleWorks__h2-sub noto">（クリックでモーダル表示します）</span></h2>
                <div class="singleWorks__img-area pc-flex bet break">
                    <?php
                    foreach ($pcImg as $fields) {
                        $img = get_post_meta($post->ID, 'pc-img', true);
                        $imageItem = wp_get_attachment_image_src($img, 'full');
                    ?>
                        <div class="singleWorks__image-pc">
                            <img src="<?php echo $imageItem[0] ?>" class="singleWorks__img">
                        </div>
                    <?php } ?>
                </div>
                <h2 class="singleWorks__h2 aquatico txt-bright">SP<span class="singleWorks__h2-sub noto">（クリックでモーダル表示します）</span></h2>
                <div class="singleWorks__img-area flex bet">
                    <?php
                    foreach ($spImg as $fields) {
                        $img = get_post_meta($post->ID, 'sp-img', true);
                        $imageItem = wp_get_attachment_image_src($img, 'full');
                    ?>
                        <div class="singleWorks__image-sp">
                            <img src="<?php echo $imageItem[0] ?>" class="singleWorks__img">
                        </div>
                    <?php } ?>
                </div>
                <div class="singleWorks__point double-border-box">
                    <h2 class="singleWorks__h3 common__h3"><span class="common__h3 common__h3--main">POINT</span><span class="common__h3 common__h3--sub noto">デザインポイント</span></h2>
                    <?php
                    foreach ($point as $fields) {
                        $pointTxt = get_post_meta($post->ID, 'point-txt', true);
                        $pointImg = get_post_meta($post->ID, 'point-img', true);
                        $pointImgItem = wp_get_attachment_image_src($pointImg, 'full');
                    ?>
                        <div class="singleWorksPoint__sec pc-flex bet">
                            <p class="singleWorksPoint__txt"><?php echo nl2br($pointTxt); ?></p>
                            <img src="<?php echo $pointImgItem[0] ?>">
                        </div>
                    <?php } ?>
                </div>
            </div>
    <?php
        }
    } ?>
    <?php get_template_part('parts-contact'); ?>
</article>
<?php get_footer();