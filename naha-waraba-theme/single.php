<?php get_header(); ?>
<div class="l-container__contents u-mt--contents-post">
    <main class="l-main">
        <article>
            <?php if( have_posts() ): ?>
                <?php the_post(); ?>
                <header class="p-postHeader">
                    <div class="p-postHeader__subItem">
                        <span class="p-postHeader__date c-postSubItem--colorLight"><?php the_date(); ?></span>
                        <?php $child_category_info = get_post_child_category_info( get_the_category() ); ?>
                        <a href="<?= esc_url( get_category_link( $child_category_info->term_id ) ); ?>" class="p-postHeader__badge c-badge c-badge--category"><?=  $child_category_info->name; ?></a>
                    </div>
                    <h1 class="p-postHeader__title"><?php the_title(); ?></h1>
                    <figure class="p-postHeader__img">
                        <?php the_post_thumbnail( 'full', array( 'class' => 'c-img' ) ); ?>
                    </figure>
                </header>
                <?php the_content(); ?>
            <?php endif; ?>
        </article>
    </main>
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>