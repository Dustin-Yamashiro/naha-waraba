<aside class="l-sidebar u-mt--sidebar">
    <article class="l-sidebar__item">
        <h2 class="c-sidebarTitle">プロフィール</h2>
        <section class="p-profile u-mt--sidebarItem-S">
            <figure class="p-profile__img">
                <img src="<?php echo get_template_directory_uri(); ?>/img/profile-img.png" alt="投稿１" class="c-img">
            </figure>
            <section class="p-profile__desc c-desc">
                <h2 class="p-profile__name c-desc--bold">ティンのすけ</h2>
                <div class="p-profile__introduction">
                    <div>
                        <p><span class="c-desc--newLine">沖縄生まれ沖縄育ちの</span><span class="c-desc--newLine">英語喋れない系ハーフ</span></p>
                        <span>+</span>
                        <p><span class="c-desc--newLine">県内でITエンジニア</span><span class="c-desc--newLine">として奮闘中の新米パパ</span></p>
                    </div>
                    <div>
                        <p>沖縄独自の文化である「パーラー」の魅力を発信したいと思いサイトを開設！</p>
                        <p>各種SNSでも最新情報を発信していますので是非フォローお願いいたします！！</p>
                    </div>
                </div>
            </section>
            <section>
                <ul class="p-profile__snsIconList p-snsIconList">
                    <li class="c-icon c-icon--sns">
                        <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/x-black.png" alt="x-black-logo" class="c-img"></a>
                    </li>
                    <li class="c-icon c-icon--sns">
                        <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/instagram-color.png" alt="instagram-color-logo" class="c-img"></a>
                    </li>
                    <li class="c-icon c-icon--sns">
                        <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/facebook-color.png" alt="facebook-color-logo" class="c-img"></a>
                    </li>
                </ul>
            </section>
        </section>
    </article>
    <article class="l-sidebar__item">
        <h2 class="c-sidebarTitle">人気記事ランキング</h2>
        <ul class="p-postList p-postList--sidebar u-mt--sidebarItem-L">
            <?php
                $sidebar_posts = new WP_Query(
                    array(
                        'meta_key' => 'post_view_count',
                        'orderby' => 'meta_value_num',
                        'order' => 'DESC',
                        'posts_per_page' => 5
                    )
                );
            ?>
            <?php if ( $sidebar_posts->have_posts() ) : ?>
                <?php while ( $sidebar_posts->have_posts() ) : ?>
                    <?php $sidebar_posts->the_post(); ?>
                    <section>
                        <li class="p-postCard p-postCard--sidebar">
                            <a href="<?php the_permalink(); ?>" class="p-postCard__contents">
                                <figure class="p-postCard__thumbnail c-thumbnail">
                                    <?php the_post_thumbnail( 'full', array( 'class' => 'c-img' ) ); ?>
                                    <?php
                                        $rankNumber++;
                                        switch ( $rankNumber ) {
                                            case 1 :
                                                $badgeClass = 'firstPlace';
                                                break;
                                            case 2 :
                                                $badgeClass = 'secondPlace';
                                                break;
                                            case 3 :
                                                $badgeClass = 'thirdPlace';
                                                break;
                                            case 4 :
                                            case 5 :
                                                $badgeClass = 'otherPlace';
                                                break;
                                        }
                                    ?>
                                    <span class="p-postCard__badge c-badge <?= "c-badge--$badgeClass" ?>"><?= $rankNumber ?></span>
                                </figure>
                                <div class="p-postCard__desc c-desc">
                                    <h3><?php the_title(); ?></h3>
                                </div>
                            </a>
                        </li>
                    </section>
                <?php endwhile; ?>
                <?php wp_reset_query(); ?>
            <?php endif; ?>
        </ul>
    </article>
    <article class="l-sidebar__item">
        <h2 class="c-sidebarTitle">タグ一覧</h2>
        <section class="u-mt--sidebarItem-M">
            <ul class="p-tagList">
                <?php
                $allTags = get_tags(
                    array(
                        'hide_empty' => 0,
                        'orderby' => 'id'
                    )
                );
                ?>
                <?php foreach ( $allTags as $tag ) : ?>
                    <li class="c-tag">
                        <a href="<?= get_tag_link( $tag->term_id ); ?>" class="c-tag--contents">
                            <span class="c-tag--text"><?= $tag->name; ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>
    </article>
</aside>