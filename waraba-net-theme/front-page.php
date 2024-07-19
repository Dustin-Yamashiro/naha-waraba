<?php get_header(); ?>
<div class="l-contents u-mt--contents">
    <main class="l-main">
        <article id="swiper-slider" class="swiper">
            <ul class="swiper-wrapper">
                <?php
                    $slider_posts = new WP_Query(
                        array(
                            'posts_per_page' => 5,
                            'orderby' => 'rand'
                        )
                    );
                ?>
                <?php if ( $slider_posts->have_posts() ) : ?>
                    <?php while ( $slider_posts->have_posts() ) : ?>
                        <?php $slider_posts->the_post(); ?>
                        <li class="p-postCard p-postCard--slider swiper-slide">
                            <a href="<?php esc_url( the_permalink() ); ?>" class="p-postCard__contents">
                                <figure class="p-postCard__thumbnail c-thumbnail">
                                    <?php the_post_thumbnail( 'full', array( 'class' => 'c-img' ) ); ?>
                                </figure>
                                <div class="p-postCard__desc">
                                    <div class="p-postCard__descLeft">
                                        <div class="p-postCard__subItem">
                                            <span class="p-postCard__date c-desc c-desc--bold c-desc--colorLight"><?php the_time( get_option( 'date_format' ) ); ?></span>
                                        </div>
                                        <h2 class="p-postCard__title c-desc c-desc--bold"><?php the_title(); ?></h2>
                                    </div>
                                    <div class="p-postCard__descRight">
                                        <span class="p-postCard__more c-desc--colorLight c-icon c-icon--right-arrow-long">MORE</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    <?php endwhile; ?>
                    <?php wp_reset_query(); ?>
                <?php endif; ?>
            </ul>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
        </article>
        <article class="u-mt--postList">
            <h1 class="c-postListTitle">記事一覧</h1>
            <nav id="swiper-postMenu" class="u-mt--postMenu swiper">
                <ul class="p-menuList p-menuList--post swiper-wrapper">
                    <li class="p-menuList__item c-postMenu swiper-slide">最新投稿</li>
                    <!-- トップカテゴリーを取得 -->
                    <?php $top_categories = get_top_categories_info(); ?>
                    <?php foreach ( $top_categories as $top_category ) : ?>
                        <li class="p-menuList__item c-postMenu swiper-slide"><?= $top_category->name; ?></li>
                    <?php endforeach; ?>
                </ul>
            </nav>
            <section id="swiper-mainPost" class="u-mt--postList swiper">
                <div class="swiper-wrapper">
                    <!-- 最新投稿一覧を表示 -->
                    <?php 
                        $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
                        $latest_posts = new WP_Query(
                            array(
                                'post_type' => 'post',
                                'paged' => $paged
                            )
                        );
                    ?>
                    <div class="swiper-slide">
                        <ul class="p-postList p-postList--main">
                            <?php if ( $latest_posts->have_posts() ) : ?>
                                <?php while ( $latest_posts->have_posts() ) : ?>
                                    <?php $latest_posts->the_post(); ?>
                                    <li class="p-postCard p-postCard--main">
                                        <a href="<?php esc_url( the_permalink() ); ?>" class="p-postCard__contents">
                                            <figure class="p-postCard__thumbnail c-thumbnail">
                                                <?php the_post_thumbnail( 'full', array( 'class' => 'c-img' ) ); ?>
                                                <span class="p-postCard__badge c-badge c-badge--category">
                                                    <?= get_post_child_category_name( $top_categories, get_the_category() ); ?>
                                                </span>
                                            </figure>
                                            <div class="p-postCard__desc c-desc">
                                                <h2><?php the_title(); ?></h2>
                                                <span class="p-postCard__date c-desc--colorLight"><?php the_time( get_option( 'date_format' ) ); ?></span>
                                            </div>
                                        </a>
                                    </li>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </ul>
                        <section class="u-mt--pagination">
                            <div class="p-pagination">
                                <?php previous_posts_link( '' ); ?>
                                <span class="p-pagination__text">
                                    <?php $page_number = get_query_var( 'paged' ); ?>
                                    <?= empty( $page_number ) ? '1' : $page_number; ?> / <?= $wp_query->max_num_pages; ?>
                                </span>
                                <?php next_posts_link( '' ); ?>
                            </div>
                        </section>
                    </div>
                    <!-- カテゴリー別投稿一覧を表示 -->
                    <?php 
                        $postsBycategory = [];
                        foreach ( $top_categories as $top_category ) {
                            $postsBycategory[ $top_category->term_id ] = new WP_Query(
                                array(
                                    'cat' => $top_category->term_id,
                                    'posts_per_page' => 10
                                )
                            );
                        }
                    ?>
                    <?php foreach ( $postsBycategory as $topCategoryId => $postBycategory ) : ?>
                        <div class="swiper-slide">
                            <ul class="p-postList p-postList--main">
                                <?php if ( $postBycategory->have_posts() ) : ?>
                                    <?php while ( $postBycategory->have_posts() ) : ?>
                                        <?php $postBycategory->the_post(); ?>
                                        <li class="p-postCard p-postCard--main">
                                            <a href="<?php esc_url( the_permalink() ); ?>" class="p-postCard__contents">
                                                <figure class="p-postCard__thumbnail c-thumbnail">
                                                    <?php the_post_thumbnail( 'full', array( 'class' => 'c-img' ) ); ?>
                                                    <span class="p-postCard__badge c-badge c-badge--category">
                                                        <?= get_post_child_category_name( $top_categories, get_the_category() ); ?>
                                                    </span>
                                                </figure>
                                                <div class="p-postCard__desc c-desc">
                                                    <h2><?php the_title(); ?></h2>
                                                    <span class="p-postCard__date c-desc--colorLight"><?php the_time( get_option( 'date_format' ) ); ?></span>
                                                </div>
                                            </a>
                                        </li>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </ul>
                            <button class="c-moreButton c-button u-mt--pagination"><a href="<?= esc_url( get_category_link( $topCategoryId ) ); ?>" class="c-icon c-icon--right-arrow-short">もっと見る</a></button>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        </article>
    </main>
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>