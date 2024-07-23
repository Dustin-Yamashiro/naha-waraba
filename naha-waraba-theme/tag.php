<?php get_header(); ?>
<div class="l-contents u-mt--contents-taxonomy">
    <main class="l-main">
        <article class="u-mt--postListAll">
            <h1 class="c-postListTitle c-postListTitle--center c-postListTitle--withTag"><?php single_tag_title() ?></h1>
            <section class="u-mt--postList-taxonomy">
                <ul class="p-postList p-postList--main">
                    <?php if ( have_posts() ) : ?>
                        <?php while ( have_posts() ) : ?>
                            <?php the_post(); ?>
                            <li class="p-postCard p-postCard--main">
                                <a href="<?php esc_url( the_permalink() ); ?>" class="p-postCard__contents">
                                    <figure class="p-postCard__thumbnail c-thumbnail">
                                        <?php the_post_thumbnail( 'full', array( 'class' => 'c-img' ) ); ?>
                                        <span class="p-postCard__badge c-badge c-badge--category">
                                            <?php $top_categories = get_top_categories_info(); ?>
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
            </section>
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
        </article>
    </main>
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>