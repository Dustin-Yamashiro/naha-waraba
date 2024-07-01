<?php get_header(); ?>
<div class="l-contents u-mt--contents">
    <main class="l-main">
        <article>
            <ul>
                <?php
                    $slider_posts = new WP_Query(
                        array(
                            'posts_per_page' => 1,
                            'orderby' => 'rand'
                        )
                    );
                ?>
                <?php if ( $slider_posts->have_posts() ) : ?>
                    <?php while ( $slider_posts->have_posts() ) : ?>
                        <?php $slider_posts->the_post(); ?>
                        <li class="p-postCard p-postCard--slider">
                            <a href="<?php the_permalink(); ?>" class="p-postCard__contents">
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
                                        <span class="p-postCard__more c-desc--colorLight">MORE</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    <?php endwhile; ?>
                    <?php wp_reset_query(); ?>
                <?php endif; ?>
            </ul>
        </article>
        <article class="u-mt--postList">
            <h1 class="l-main--title">記事一覧</h1>
            <nav class="u-mt--postMenu">
                <ul class="p-menuList p-menuList--post">
                    <li class="p-menuList__item c-postMenu">最新投稿</li>
                    <li class="p-menuList__item c-postMenu">本島北部</li>
                    <li class="p-menuList__item c-postMenu">本島中部</li>
                    <li class="p-menuList__item c-postMenu">本島南部</li>
                </ul>
            </nav>
            <section class="u-mt--postList">
                <ul class="p-postList p-postList--main">
                    <?php if ( have_posts() ) : ?>
                        <?php while ( have_posts() ) : ?>
                            <?php the_post(); ?>
                            <section>
                                <li class="p-postCard p-postCard--main">
                                    <a href="<?php the_permalink(); ?>" class="p-postCard__contents">
                                        <figure class="p-postCard__thumbnail c-thumbnail">
                                            <?php the_post_thumbnail( 'full', array( 'class' => 'c-img' ) ); ?>
                                            <span class="p-postCard__badge c-badge c-badge--area"><?= get_post_municipality_name( get_the_category() ); ?></span>
                                        </figure>
                                        <div class="p-postCard__desc c-desc">
                                            <h2><?php the_title(); ?></h2>
                                            <span class="p-postCard__date c-desc--colorLight"><?php the_time( get_option( 'date_format' ) ); ?></span>
                                        </div>
                                    </a>
                                </li>
                            </section>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </ul>
            </section>
            <section class="p-pagination u-mt--pagination">
                <?php previous_posts_link( '前へ' ); ?>
                <span class="p-pagination__text">
                    <?php $page_number = get_query_var( 'paged' ); ?>
                    <?= empty( $page_number ) ? '1' : $page_number; ?> / <?= $wp_query->max_num_pages; ?>
                </span>
                <?php next_posts_link( '次へ' ); ?>
            </section>
        </article>
    </main>
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>