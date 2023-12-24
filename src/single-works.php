<?php get_header(); ?>
<article class="contents singleWorks bottom-city">
    <div id="modalOverlay" class="md-overlay"></div>
    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            $postID = get_the_ID();
            $tag = get_the_terms($postID, 'works-tag');
            $cat = get_the_terms($postID, 'works-cat');
            $data = get_the_terms($postID, 'works-data');
            $lead = get_post_meta($postID, 'lead-txt', true);
            $pcImg = SCF::get('works-pc');
            $spImg = SCF::get('works-sp');
            $point = SCF::get('works-point');
    ?>
            <?php
            $count = 0;
            foreach ($pcImg as $fields) {
                $img = get_post_meta($post->ID, 'pc-img', true);
                $imageItem = wp_get_attachment_image_src($img, 'full');
                //$count = $count++;
            ?>
                <div class="singleWorks__modal js-modal js-modal--<?php echo $count; ?>">
                    <button type="button" class="singleWorks__bg js-modal-close"></button>
                    <button type="button" class="js-modal-close singleWorks__close flex vcenter hcenter">
                        <i class="singleWorks__closeIcon is-false icon-close"></i>
                    </button>
                    <div class="singleWorks__modalIn">
                        <img src="<?php echo $imageItem[0] ?>" class="singleWorksModal__img">
                    </div>
                    <div class="singleWorks__nonScroll"></div>
                </div>
            <?php
                $count++;
            }
            ?>
            <?php
            $count = 0;
            foreach ($spImg as $fields) {
                $img = get_post_meta($post->ID, 'sp-img', true);
                $imageItem = wp_get_attachment_image_src($img, 'full');
                //$count = $count++;
            ?>
                <div class="singleWorks__modal js-modal js-modal--sp-<?php echo $count; ?>">
                    <button type="button" class="singleWorks__bg js-modal-close"></button>
                    <button type="button" class="js-modal-close singleWorks__close flex vcenter hcenter">
                        <i class="singleWorks__closeIcon is-false icon-close"></i>
                    </button>
                    <div class="singleWorks__modalIn">
                        <img src="<?php echo $imageItem[0] ?>" class="singleWorksModal__img">
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
                    if ($cat->name == 'WEB') { //制作物がWEB系の時
                ?>
                        <ul class="singleWorks__tab-area flex hcenter">
                            <li><a href="#tab-pc" class="singleWorks__li no-move"><i class="icon icon-imac"></i></a></li>
                            <li><a href="#tab-sp" class="singleWorks__li no-move"><i class="icon icon-smartphone"></i></a></li>

                        </ul>
                        <div class="singleWorks__main-area is-active" id="tab-pc">
                            <div class="swiper js-workImgSlide" id="js-workImgSlide">
                                <div class="singleWorks__img-area singleWorks__web">
                                    <div class="swiper-wrapper js-singleWorks__wrap js-singleWorks__wrap--pc">
                                        <?php
                                        $count = 0;
                                        foreach ($pcImg as $fields) {
                                            $img = get_post_meta($post->ID, 'pc-img', true);
                                            $imageItem = wp_get_attachment_image_src($img, 'full');
                                            //$count = 1;
                                            //$count = $count++;
                                        ?>
                                            <div class="swiper-slide">
                                                <div class="singleWorks__pc">
                                                    <button type="button" class="singleWorks__pc-inner js-modal js-modal-open" data-modal="<?php echo $count; ?>">
                                                        <img src="<?php echo $imageItem[0] ?>" class="singleWorks__img">
                                                    </button>
                                                </div>
                                            </div>

                                        <?php $count++;
                                        } ?>
                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>
                        </div>
                        <div class="singleWorks__main-area" id="tab-sp">
                            <div class="swiper js-workImgSlide" id="js-workImgSlide">
                                <div class="singleWorks__img-area">
                                    <div class="swiper-wrapper js-singleWorks__wrap js-singleWorks__wrap--sp">
                                        <?php
                                        foreach ($spImg as $fields) {
                                            $img = get_post_meta($post->ID, 'sp-img', true);
                                            $imageItem = wp_get_attachment_image_src($img, 'full');
                                        ?>
                                            <div class="swiper-slide">
                                                <div class="singleWorks__sp">
                                                    <button type="button" class="singleWorks__sp-inner js-modal js-modal-open" data-modal="sp-<?php echo $count; ?>">
                                                        <img src="<?php echo $imageItem[0] ?>" class="singleWorks__img">
                                                    </button>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else { //制作物がWEB系以外の時
                    ?>
                        <div class="">
                            <p>サイトもの以外の内容</p>
                            <h2 class="singleWorks__h2 aquatico txt-bright">PC<span class="singleWorks__h2-sub noto">（クリックでモーダル表示します）</span></h2>
                            <div class="singleWorks__img-area pc-flex bet break">
                                <?php
                                $count = 0;
                                foreach ($pcImg as $fields) {
                                    $img = get_post_meta($post->ID, 'pc-img', true);
                                    $imageItem = wp_get_attachment_image_src($img, 'full');
                                    $count = 1;
                                    $count = $count++;
                                ?>
                                    <button type="button" class="singleWorks__image-pc js-modal js-modal-open" data-modal="<?php echo $count; ?>">
                                        <img src="<?php echo $imageItem[0] ?>" class="singleWorks__img">
                                    </button>

                                <?php $count++;
                                } ?>
                            </div>
                            <h2 class="singleWorks__h2 aquatico txt-bright">SP<span class="singleWorks__h2-sub noto">（クリックでモーダル表示します）</span></h2>
                            <div class="singleWorks__img-area flex bet">
                                <?php
                                foreach ($spImg as $fields) {
                                    $img = get_post_meta($post->ID, 'sp-img', true);
                                    $imageItem = wp_get_attachment_image_src($img, 'full');
                                    $count = 1;
                                    $count = $count++;
                                ?>
                                    <div class="singleWorks__image-sp">
                                        <img src="<?php echo $imageItem[0] ?>" class="singleWorks__img">
                                    </div>
                                <?php $count++;
                                } ?>
                            </div>
                        </div>
                <?php }
                } ?>

                <div class="singleWorks__data double-border-box">
                    <table class="singleWorksData__table pc-flex bet">
                        <?php
                        foreach ($data as $fields) {
                            $datatt = get_post_meta($post->ID, 'data-tt', true);
                            $datadd = get_post_meta($post->ID, 'data-td', true);
                        ?>
                            <tr class="singleWorksData__tr">
                                <th class="singleWorksData__th"><?php echo nl2br($datatt); ?></th>
                                <td class="singleWorksData__td"><?php echo nl2br($datadd); ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>

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
