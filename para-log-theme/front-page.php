<?php get_header(); ?>
<article class="l-slider u-mt--slider">
    <ul class="p-postList p-postList--slider">
        <?php
            $slider_posts = new WP_Query(
                array(
                    'posts_per_page' => 4,
                    'orderby' => 'rand'
                )
            );
        ?>
        <?php if ( $slider_posts->have_posts() ) : ?>
            <?php while ( $slider_posts->have_posts() ) : ?>
                <?php $slider_posts->the_post(); ?>
                <li class="p-postCard p-postCard--slider">
                    <article>
                        <a href="<?php the_permalink(); ?>" class="p-postCard__contents">
                            <figure class="p-postCard__thumbnail c-thumbnail">
                                <?php the_post_thumbnail( 'full', array( 'class' => 'c-img' ) ); ?>
                            </figure>
                            <section class="p-postCard__desc c-desc">
                                <h2><?php the_title(); ?></h2>
                            </section>
                        </a>
                    </article>
                </li>
            <?php endwhile; ?>
            <?php wp_reset_query(); ?>
        <?php endif; ?>
    </ul>
</article>
<div class="u-mt--contents">
    <div class="l-contents">
        <main class="l-main">
            <h1 class="l-main--title">記事一覧</h1>
            <nav class="u-mt--postMenu">
                <ul class="p-menuList p-menuList--post">
                    <li class="p-menuList__item c-postMenu">最新投稿</li>
                    <li class="p-menuList__item c-postMenu">本島北部</li>
                    <li class="p-menuList__item c-postMenu">本島中部</li>
                    <li class="p-menuList__item c-postMenu">本島南部</li>
                </ul>
            </nav>
            <article class="u-mt--postList">
                <ul class="p-postList p-postList--main">
                    <?php if ( have_posts() ) : ?>
                        <?php while ( have_posts() ) : ?>
                            <?php the_post(); ?>
                            <li class="p-postCard p-postCard--main">
                                <article>
                                    <a href="<?php the_permalink(); ?>" class="p-postCard__contents">
                                        <figure class="p-postCard__thumbnail c-thumbnail">
                                            <?php the_post_thumbnail( 'full', array( 'class' => 'c-img' ) ); ?>
                                            <span class="p-postCard__badge c-badge c-badge--area"><?= get_post_municipality_name( get_the_category() ); ?></span>
                                        </figure>
                                        <section class="p-postCard__desc c-desc">
                                            <h2><?php the_title(); ?></h2>
                                            <span class="p-postCard__date c-desc--colorLight"><?php the_time( get_option( 'date_format' ) ); ?></span>
                                        </section>
                                    </a>
                                </article>
                            </li>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </ul>
            </article>
            <section class="p-pagination u-mt--pagination">
                <?php previous_posts_link( '前へ' ); ?>
                <span class="p-pagination__text">
                    <?php $page_number = get_query_var( 'paged' ); ?>
                    <?= empty( $page_number ) ? '1' : $page_number; ?> / <?= $wp_query->max_num_pages; ?>
                </span>
                <?php next_posts_link( '次へ' ); ?>
            </section>
        </main>
        <?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>