<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name') ?></title>
    <meta name="description" content="<?php bloginfo('description') ?>">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header class="l-header">
        <div class="l-header__contents p-header">
            <button class="p-header__icon c-icon c-icon--search"><i class="fa-solid fa-magnifying-glass fa-xl" style="color: #333333;"></i></button>
            <a href="<?= home_url(); ?>" class="p-header__logo"><img src="<?php echo get_template_directory_uri(); ?>/img/site-logo.png" alt="パラログ ロゴ" class="c-img"></a>
            <nav class="p-header__menu">
                <ul class="p-menuList p-menuList--header">
                    <li class="p-menuList__item c-siteMenu c-siteMenu--hoverUnderLine"><a href="#">パーラーとは？</a></li>
                    <li class="p-menuList__item p-menuList__subMenu c-siteMenu c-siteMenu--hoverUnderLine">
                        エリア別検索
                        <ul class="p-menuList p-menuList--subMenu">
                            <?php
                                $area_category_id = get_categories( array( 'search' => 'area' ) )[0]->term_id;
                                $parent_categories = get_categories(
                                    array(
                                        'hide_empty' => '0',
                                        'parent' => $area_category_id,
                                        'orderby' => 'id'
                                    )
                                );
                            ?>
                            <?php foreach ( $parent_categories as $parent_category ) : ?>
                                <li class="p-menuList__item p-menuList__secondSubMenu c-siteMenu c-siteMenu--hoverBkColGray">
                                    <a href="<?php echo get_category_link( $parent_category->term_id ); ?>"><?php echo $parent_category->name; ?></a>
                                    <ul class="p-menuList p-menuList--subMenu">
                                        <?php
                                            $child_categories = get_categories(
                                                array(
                                                    'hide_empty' => '0',
                                                    'child_of' => $parent_category->term_id,
                                                    'orderby' => 'id'
                                                )
                                            );
                                        ?>
                                        <?php foreach ($child_categories as $child_category) : ?>
                                            <li class="p-menuList__item c-siteMenu c-siteMenu--hoverBkColGray">
                                                <a href="<?php echo get_category_link( $child_category->term_id ); ?>"><?php echo $child_category->name; ?></a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li class="p-menuList__item c-siteMenu c-siteMenu--hoverUnderLine"><a href="#">人気記事ランキング</a></li>
                    <li class="p-menuList__item c-siteMenu c-siteMenu--hoverUnderLine"><a href="#">パーラー名鑑</a></li>
                    <li class="p-menuList__item">
                        <button class="c-icon c-icon--search">
                            <i class="fa-solid fa-magnifying-glass fa-xl" style="color: #333333;"></i>
                        </button>
                    </li>
                </ul>
            </nav>
            <button class="p-header__icon c-icon c-icon--burger"><i class="fa-solid fa-bars fa-xl" style="color: #333333;"></i></button>
        </div>

        <?php wp_head(); ?>
    </header>