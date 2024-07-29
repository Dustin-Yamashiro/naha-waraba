<?php get_header(); ?>
<div class="l-container__contents u-mt--contents-top">
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
                                            <span class="p-postCard__date c-postSubItem c-postSubItem--bold c-postSubItem--colorLight"><?php the_time( get_option( 'date_format' ) ); ?></span>
                                        </div>
                                        <h2 class="p-postCard__title"><?php the_title(); ?></h2>
                                    </div>
                                    <div class="p-postCard__descRight">
                                        <span class="p-postCard__more c-postSubItem c-postSubItem--colorLight c-icon c-icon--right-arrow-long">MORE</span>
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
        <article class="u-mt--postListAll">
            <h1 class="c-postListTitle">記事一覧</h1>
            <nav id="swiper-postMenu" class="u-mt--postMenu swiper">
                <ul class="p-menuList p-menuList--post swiper-wrapper">
                    <li class="p-menuList__item c-postMenu swiper-slide">最新投稿</li>
                    <!-- 親カテゴリーを取得 -->
                    <?php $parent_categories = get_parent_categories_info(); ?>
                    <?php foreach ( $parent_categories as $parent_category ) : ?>
                        <li class="p-menuList__item c-postMenu swiper-slide"><?= $parent_category->name; ?></li>
                    <?php endforeach; ?>
                </ul>
            </nav>
            <section id="swiper-mainPost" class="u-mt--postList-top swiper">
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
                                                    <?= get_post_child_category_info( get_the_category() )->name; ?>
                                                </span>
                                            </figure>
                                            <div class="p-postCard__desc">
                                                <h2 class="p-postCard__title"><?php the_title(); ?></h2>
                                                <span class="p-postCard__date c-postSubItem c-postSubItem--colorLight"><?php the_time( get_option( 'date_format' ) ); ?></span>
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
                        $posts_by_category = [];
                        foreach ( $parent_categories as $parent_category ) {
                            $posts_by_category[ $parent_category->term_id ] = new WP_Query(
                                array(
                                    'cat' => $parent_category->term_id,
                                    'posts_per_page' => 10
                                )
                            );
                        }
                    ?>
                    <?php foreach ( $posts_by_category as $parent_category_id => $post_by_category ) : ?>
                        <div class="swiper-slide">
                            <ul class="p-postList p-postList--main">
                                <?php if ( $post_by_category->have_posts() ) : ?>
                                    <?php while ( $post_by_category->have_posts() ) : ?>
                                        <?php $post_by_category->the_post(); ?>
                                        <li class="p-postCard p-postCard--main">
                                            <a href="<?php esc_url( the_permalink() ); ?>" class="p-postCard__contents">
                                                <figure class="p-postCard__thumbnail c-thumbnail">
                                                    <?php the_post_thumbnail( 'full', array( 'class' => 'c-img' ) ); ?>
                                                    <span class="p-postCard__badge c-badge c-badge--category">
                                                        <?= get_post_child_category_info( get_the_category() )->name; ?>
                                                    </span>
                                                </figure>
                                                <div class="p-postCard__desc">
                                                    <h2 class="p-postCard__title"><?php the_title(); ?></h2>
                                                    <span class="p-postCard__date c-postSubItem c-postSubItem--colorLight"><?php the_time( get_option( 'date_format' ) ); ?></span>
                                                </div>
                                            </a>
                                        </li>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </ul>
                            <button class="c-moreButton c-button u-mt--pagination"><a href="<?= esc_url( get_category_link( $parent_category_id ) ); ?>" class="c-icon c-icon--right-arrow-short">もっと見る</a></button>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        </article>
    </main>
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>