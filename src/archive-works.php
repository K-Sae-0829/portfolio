<?php get_header();
$wp_query = array(  //クエリー初期設定
    'post_type' => 'works',          //投稿タイプ
    'post_status' => 'publish',        //公開済みの記事
    'posts_per_page' => -1,            //出力数 -1で全件
);
$wp_query = new WP_Query($wp_query);

$postID = get_the_ID();
$terms = get_the_terms($postID, 'works-cat');
$tag = get_the_terms($postID, 'works-tag');
$cat_query = get_categories(array(
    'type'       => 'works',  //投稿タイプ
    'taxonomy'   => 'works-cat',  //対象タクソノミー
    'hide_empty' => 0, // 投稿のないカテゴリーを隠す
    'parent'     => 0,  //指定IDの子タームだけサーチ　0で親だけサーチ
    'orderby'    => '',  //
    'order'      => 'ASC',
));
$tag_query = get_categories(array(
    'type'       => 'works',  //投稿タイプ
    'taxonomy'   => 'works-tag',  //対象タクソノミー
    'hide_empty' => 0, // 投稿のないカテゴリーを隠す
    'parent'     => 0,  //指定IDの子タームだけサーチ　0で親だけサーチ
    'orderby'    => '',  //
    'order'      => 'ASC',
));
?>

<article class="works contact bottom-city">
    <section class="works__main wrap w1200 sp-wrap">
        <h1 class="common__h2 works__head pulsate js-in anime flip-x">
            Works
        </h1>
        <p class="works__lead">お仕事で制作したものを掲載しています。</p>
        <div class="works__search">
            <p class="search__ttl js-accordionBtn">絞り込み<i class="icon icon-down search__down"></i></p>
            <div id="select" class="worksSelectBlock js-accordionContent">
                <div class="worksSelectBlock__searchResult">
                    <span class="el_searchResult_nume js_numerator"></span>件 / 全<span class="el_searchResult_deno js_denominator"></span>件中
                </div>
                <div class="worksSelectBlock__wrapper">
                    <div class="">
                        <div class="worksSelectBlock__ttl">カテゴリー</div>
                        <div class="js_conditions" data-type="category">
                            <?php
                            foreach ($cat_query as $terms) {
                                $termsName = $terms->name; ?>
                                <span class="worksSelectBlock__check"><input id="category-<?php echo $termsName; ?>" type="checkbox" name="type" value="<?php echo $termsName; ?>">
                                    <label for="category-<?php echo $termsName; ?>">
                                        <span class="el_checkbox"></span>
                                        <?php echo $termsName; ?>
                                    </label>
                                </span>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="">
                        <div class="worksSelectBlock__ttl">ジャンル</div>
                        <div class="worksSelectBlock__content js_conditions" data-type="tag">
                            <?php //var_dump($tag_query);
                            foreach ($tag_query as $terms) {
                                $termsName = $terms->name; ?>
                                <span class="worksSelectBlock__check"><input id="tag-<?php echo $termsName; ?>" type="checkbox" name="tag" value="<?php echo $termsName; ?>">
                                    <label for="tag-<?php echo $termsName; ?>">
                                        <span class="el_checkbox"></span>
                                        <?php echo $termsName; ?>
                                    </label>
                                </span>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="worksSelectBlock__release js_release mainBtn">
                        <span class="">すべての選択を解除<i class="icon icon-close"></i></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="container" id="container">

            <div class="works__list row pc-flex break bet">
                <?php
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();
                        $postID = get_the_ID();
                        $terms = get_the_terms($postID, 'works-cat');
                        $tag = get_the_terms($postID, 'works-tag');
                ?>
                        <div class="worksItem js_target js-in anime bottom-in" data-category="<?php foreach ($terms as $termsdata) {
                                                                                                    echo $termsdata->name;
                                                                                                } ?>" data-tag="<?php foreach ($tag as $tagdata) {
                                                                                                                    echo $tagdata->name . ',';
                                                                                                                } ?>">
                            <a href="<?php the_permalink(); ?>" class="">

                                <div class="worksItem__thumb">
                                    <?php foreach ($terms as $terms) { ?>
                                        <p class="worksItem__cat"><?php echo $terms->name; ?></p>
                                    <?php } ?>
                                    <div class="worksItem__img">
                                        <div class="md-lay zoom">
                                            <div class="lay-bg">
                                                <?php if (has_post_thumbnail()) { ?>
                                                    <img src="<?php echo the_post_thumbnail_url(); ?>" alt="">
                                                <?php } else { ?>
                                                    <img src="<?php echo T_URL; ?>img/thumb_noimg.png" alt="">
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="worksItem__txt-area">
                                    <div class="worksItem__tag-area">
                                        <?php foreach ($tag as $tag) { ?>
                                            <p class="worksItem__tag"><?php echo $tag->name; ?></p>
                                        <?php } ?>
                                    </div>
                                    <p class="worksItem__ttl"><?php echo get_the_title(); ?></p>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                <?php } ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
</article>
<?php get_footer();
