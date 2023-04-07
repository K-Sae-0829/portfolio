<?php get_header(); ?>

<article class="works contact bottom-city">
    <section class="works__main wrap w1200 sp-wrap">
        <h1 class="common__h2 works__head pulsate">
            Works
        </h1>
        <p class="works__lead">お仕事で制作したもの（主にWebサイト）を掲載しています。</p>
        <div class="works__search">
            <p class="search__ttl">絞り込み<i class="icon icon-down search__down"></i></p>
        </div>
        <div class="container">

            <div class="works__list row pc-flex break bet">
                <?php
                /*$taxonomy = '';
$term = '';
if (is_tax()) {
    $taxonomy = get_query_var('taxonomy');
    $term = get_query_var('term');
}*/
                $wp_query = array(  //クエリー初期設定
                    'post_type' => 'works',          //投稿タイプ
                    'post_status' => 'publish',        //公開済みの記事
                    'posts_per_page' => -1,            //出力数 -1で全件
                );
                /*if (!empty($arrDepartment)) {
    $wp_query['tax_query'][] = $arrDepartment;
}
if (!empty($arrYear)) {
    $wp_query['tax_query'][] = $arrYear;
}*/
                $wp_query = new WP_Query($wp_query);

                if (have_posts()) {
                    while (have_posts()) {
                        the_post();
                        $postID = get_the_ID();
                        $terms = get_the_terms($postID, 'works-cat');
                        $tag = get_the_terms($postID, 'works-tag');
                ?>
                        <a href="<?php the_permalink(); ?>" class="worksItem col-lg-4">
                            <div class="worksItem__thumb">
                                <?php foreach ($terms as $terms) { ?>
                                    <p class="worksItem__cat"><?php echo $terms->name; ?></p>
                                <?php } ?>
                                <div class="worksItem__img">
                                    <img src="<?php echo the_post_thumbnail_url(); ?>" alt="">
                                </div>
                                <div class="worksItem__txt-area">
                                    <div class="worksItem__tag-area">
                                        <?php foreach ($tag as $tag) { ?>
                                            <p class="worksItem__tag"><?php echo $tag->name; ?></p>
                                        <?php } ?>
                                    </div>
                                    <p class="worksItem__ttl"><?php echo get_the_title(); ?></p>
                                </div>
                            </div>
                        </a>
                    <?php } ?>
                <?php } ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
</article>
<?php get_footer();
