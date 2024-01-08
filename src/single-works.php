<?php get_header(); ?>
<article class="contents singleWorks bottom-city">
    <div id="modalOverlay" class="md-overlay"></div>
    <?php

    $postID = get_the_ID();
    $tag = get_the_terms($postID, 'works-tag');
    $cat = get_the_terms($postID, 'works-cat');
    $lead = get_post_meta($postID, 'lead-txt', true);
    $pcImg = SCF::get('works-pc');
    $spImg = SCF::get('works-sp');
    $data = SCF::get('works-data');
    $point = SCF::get('works-point');

    if (have_posts()) {
        while (have_posts()) {
            the_post();
    ?>
            <?php
            $count = 0;
            foreach ($pcImg as $key => $keys) {
                $img = get_post_meta($post->ID, 'pc-img', false);
                $imageItem = wp_get_attachment_image_url($img[$key], 'full');
            ?>
                <div class="singleWorks__modal js-modal js-modal--<?php echo $count; ?>">
                    <button type="button" class="singleWorks__bg js-modal-close"></button>
                    <button type="button" class="js-modal-close singleWorks__close flex vcenter hcenter">
                        <i class="singleWorks__closeIcon is-false icon-close"></i>
                    </button>
                    <div class="singleWorks__modalIn<?php foreach ($cat as $cat2) {
                                                        if ($cat2->name !== 'WEBサイト') {
                                                            echo ' singleWorks__modalIn--otherweb';
                                                        }
                                                    } ?>">
                        <img src="<?php echo $imageItem ?>" class="singleWorksModal__img">
                    </div>
                    <div class="singleWorks__nonScroll"></div>
                </div>
            <?php
                $count++;
            }
            ?>

            <?php
            $count = 0;
            foreach ($spImg as $key => $keys) {
                $img = get_post_meta($post->ID, 'sp-img', false);
                $imageItem = wp_get_attachment_image_url($img[$key], 'full');
            ?>
                <div class="singleWorks__modal js-modal js-modal--sp<?php echo $count; ?>">
                    <button type="button" class="singleWorks__bg js-modal-close"></button>
                    <button type="button" class="js-modal-close singleWorks__close flex vcenter hcenter">
                        <i class="singleWorks__closeIcon is-false icon-close"></i>
                    </button>
                    <div class="singleWorks__modalIn singleWorks__modalIn--sp">
                        <img src="<?php echo $imageItem ?>" class="singleWorksModal__img">
                    </div>
                    <div class="singleWorks__nonScroll"></div>
                </div>
            <?php
                $count++;
            }
            ?>
            <div class="wrap w1200 sp-wrap">
                <h1 class="singleWorks__h1 js-in anime"><?php echo get_the_title(); ?></h1>
                <div class="singleWorks__txt-area js-in anime">
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

                <?php foreach ($cat as $cat) {
                    if ($cat->name == 'WEBサイト') { //制作物がWEB系の時
                ?>
                        <ul class="singleWorks__tab-area flex hcenter">
                            <li><a href="#tab-pc" class="singleWorks__li no-move"><i class="icon icon-imac"></i></a></li>
                            <li><a href="#tab-sp" class="singleWorks__li no-move"><i class="icon icon-smartphone"></i></a></li>

                        </ul>
                        <?php
                        if (!empty($pcImg)) {
                        ?>

                            <div class="singleWorks__main-area is-active" id="tab-pc">
                                <div class="singleWorks__img-area singleWorks__web">
                                    <div class="swiper swiper-container js-workImgSlide js-singleWorks__wrap js-singleWorks__wrap--pc" id="js-workImgSlide">
                                        <div class="swiper-wrapper">
                                            <?php
                                            $count = 0;
                                            //var_dump($pcImg);
                                            foreach ($pcImg as $key => $keys) {
                                                $img = get_post_meta($post->ID, 'pc-img', false);
                                                $imageItem = wp_get_attachment_image_url($img[$key], 'full');
                                                //$count = 1;
                                                //$count = $count++;
                                            ?>
                                                <div class="swiper-slide">
                                                    <div class="singleWorks__pc">
                                                        <button type="button" class="singleWorks__pc-inner js-modal js-modal-open" data-modal="<?php echo $count; ?>">
                                                            <img src="<?php echo $imageItem ?>" class="singleWorks__img">
                                                        </button>
                                                    </div>
                                                </div>

                                            <?php $count++;
                                            } ?>
                                        </div>
                                        <div class="singleWorks__dot">
                                            <div class="singleWorks__pagination swiper-pagination"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        <?php
                        } ?>
                        <div class="singleWorks__main-area" id="tab-sp">
                            <div class="singleWorks__img-area">
                                <div class="swiper js-workImgSlide-sp swiper-container js-singleWorks__sp-slide" id="js-workImgSlide-sp">
                                    <div class="swiper-wrapper js-singleWorks__wrap js-singleWorks__wrap--sp">
                                        <?php
                                        $count = 0;
                                        foreach ($spImg as $fields) {
                                            $img = get_post_meta($post->ID, 'sp-img', false);
                                            $imageItem = wp_get_attachment_image_url($img[$key], 'full');
                                        ?>
                                            <div class="swiper-slide">
                                                <div class="singleWorks__sp">
                                                    <button type="button" class="singleWorks__sp-inner js-modal js-modal-open" data-modal="sp<?php echo $count; ?>">
                                                        <img src="<?php echo $imageItem ?>" class="singleWorks__img">
                                                    </button>
                                                </div>
                                            </div>
                                        <?php $count++;
                                        } ?>
                                    </div>
                                    <div class="singleWorks__dot">
                                        <div class="singleWorks__pagination swiper-pagination-sp"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else { //制作物がWEB系以外の時
                    ?>
                        <div class="singleWorks__otherweb">
                            <!--<h2 class="singleWorks__h2 aquatico txt-bright">PC<span class="singleWorks__h2-sub noto">（クリックでモーダル表示します）</span></h2>-->
                            <?php
                            if (!empty($pcImg)) {
                            ?>
                                <div class="singleWorks__img-area singleWorks__img-area--otherweb flex bet">
                                    <?php
                                    $img = get_post_meta($post->ID, 'pc-img', false);
                                    $count = 0;
                                    foreach ($pcImg as $key => $keys) {
                                        //$imageItem = wp_get_attachment_image_src($img, 'full');
                                        $imageItem = wp_get_attachment_image_url($img[$key], 'full');
                                        $count = 1;
                                        $count = $count++;
                                    ?>
                                        <button type="button" class="singleWorks__image singleWorks__image--otherweb js-modal js-modal-open" data-modal="<?php echo $count; ?>">
                                            <img src="<?php echo $imageItem ?>" class="singleWorks__img">
                                        </button>

                                    <?php $count++;
                                    } ?>
                                </div>
                            <?php }
                            ?>
                        </div>
                <?php }
                } ?>
                <?php
                if (!empty($data)) {
                ?>
                    <div class="singleWorks__data double-border-box">
                        <table class="singleWorksData__table pc-flex bet">

                            <?php
                            $datatt = get_post_meta($post->ID, 'data-tt', false);
                            $datadd = get_post_meta($post->ID, 'data-td', false);
                            $count = 0;
                            foreach ($data as $key => $keys) {
                            ?>
                                <tr class="singleWorksData__tr">
                                    <th class="singleWorksData__th">
                                        <?php echo nl2br($datatt[$key]);
                                        ?>
                                    </th>
                                    <td class="singleWorksData__td">
                                        <?php
                                        if (strpos($datadd[$key], 'https') === false) {
                                        ?>
                                        <?php echo nl2br($datadd[$key]);
                                        } else {
                                        ?>
                                            <a href="<?php echo nl2br($datadd[$key]);  ?>" target="_blank"><?php echo nl2br($datadd[$key]); ?></a><?php
                                                                                                                                                }
                                                                                                                                                    ?>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>

                    </div>
                <?php
                }
                ?>

                <?php
                if (!empty($point)) {
                ?>
                    <div class="singleWorks__point double-border-box">
                        <h2 class="singleWorks__h3 common__h3"><span class="common__h3 common__h3--main">POINT</span><span class="common__h3 common__h3--sub noto">デザインポイント</span></h2>
                        <?php
                        $pointTxt = get_post_meta($post->ID, 'point-txt', false);
                        $pointImg = get_post_meta($post->ID, 'point-img', false);
                        foreach ($point as $key => $keys) {
                            $pointImgItem = wp_get_attachment_image_url($pointImg[$key], 'full');
                        ?>
                            <div class="singleWorksPoint__sec pc-flex bet">
                                <p class="singleWorksPoint__txt"><?php echo nl2br($pointTxt[$key]); ?></p>
                                <?php if (!empty($pointImgItem)) { ?>
                                    <div class="singleWorksPoint__img">
                                        <img src="<?php echo $pointImgItem ?>">
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>

                <?php } ?>
                <div class="singleWorks__btn-area js-in anime bottom-in">
                    <a href="<?php echo H_URL; ?>works/#select" class="mainBtn mainBtn--back singleWorks__backbtn">
                        <i class="icon icon-up-arrow mainBtn__icon blink"></i><span class="blink-2">BACK TO LIST</span>
                    </a>
                </div>
            </div>
    <?php
        }
        wp_reset_postdata();
    } ?>
    <?php get_template_part('parts-contact'); ?>
    </div>

</article>
<?php get_footer();
