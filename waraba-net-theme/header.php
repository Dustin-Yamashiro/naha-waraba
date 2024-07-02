<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name') ?></title>
    <meta name="description" content="<?php bloginfo('description') ?>">
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
</head>

<body>
    <header class="l-header u-mt--header">
        <div class="l-header__contents p-header">
            <button class="p-header__icon c-icon c-icon--search"><i class="fa-solid fa-magnifying-glass fa-xl" style="color: #333333;"></i></button>
            <a href="<?= home_url(); ?>" class="p-header__logo">
                <img src="<?= get_template_directory_uri(); ?>/img/site-logo.png" alt="わらばーNET ロゴ" class="c-img">
            </a>
            <nav class="p-header__menu">
                <ul class="p-menuList p-menuList--header">
                    <li class="p-menuList__item p-menuList__item--withSubMenu c-siteMenu">
                        <span class="c-siteMenu__contents c-siteMenu__contents--withImg">
                            <span class="c-siteMenu__img">
                                <img src="<?= get_template_directory_uri(); ?>/img/header-menu-img/area.png" alt="エリア画像" class="c-img">
                            </span>
                            エリア検索
                        </span>
                        <ul class="p-menuList p-menuList--subMenu">
                            <?php
                                $top_category_id = get_categories( array( 'search' => 'area' ) )[0]->term_id;
                                $parent_categories = get_categories(
                                    array(
                                        'hide_empty' => '0',
                                        'parent' => $top_category_id,
                                        'orderby' => 'id'
                                    )
                                );
                            ?>
                            <?php foreach ( $parent_categories as $parent_category ) : ?>
                                <li class="p-menuList__item c-siteMenu">
                                    <span class="c-siteMenu__contents">
                                        <a href="<?= get_category_link( $parent_category->term_id ); ?>"><?= $parent_category->name; ?></a>
                                    </span>
                                    <ul class="p-menuList p-menuList--subMenu">
                                        <?php
                                            $child_categories = get_categories(
                                                array(
                                                    'hide_empty' => '0',
                                                    'parent' => $parent_category->term_id,
                                                    'orderby' => 'id'
                                                )
                                            );
                                        ?>
                                        <?php foreach ( $child_categories as $child_category ) : ?>
                                            <li class="p-menuList__item c-siteMenu">
                                                <span class="c-siteMenu__contents">
                                                    <a href="<?= get_category_link( $child_category->term_id ); ?>"><?= $child_category->name; ?></a>
                                                </span>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li class="p-menuList__item p-menuList__item--withSubMenu c-siteMenu">
                        <span class="c-siteMenu__contents c-siteMenu__contents--withImg">
                            <span class="c-siteMenu__img">
                                <img src="<?= get_template_directory_uri(); ?>/img/header-menu-img/genre.png" alt="ジャンル画像" class="c-img">
                            </span>
                            ジャンル検索
                        </span>
                        <ul class="p-menuList p-menuList--subMenu">
                            <?php
                                $top_category_id = get_categories( array( 'search' => 'genre' ) )[0]->term_id;
                                $parent_categories = get_categories(
                                    array(
                                        'hide_empty' => '0',
                                        'parent' => $top_category_id,
                                        'orderby' => 'id'
                                    )
                                );
                            ?>
                            <?php foreach ( $parent_categories as $parent_category ) : ?>
                                <li class="p-menuList__item c-siteMenu">
                                    <span class="c-siteMenu__contents">
                                        <a href="<?= get_category_link( $parent_category->term_id ); ?>"><?= $parent_category->name; ?></a>
                                    </span>
                                    <ul class="p-menuList p-menuList--subMenu">
                                        <?php
                                            $child_categories = get_categories(
                                                array(
                                                    'hide_empty' => '0',
                                                    'parent' => $parent_category->term_id,
                                                    'orderby' => 'id'
                                                )
                                            );
                                        ?>
                                        <?php foreach ( $child_categories as $child_category ) : ?>
                                            <li class="p-menuList__item c-siteMenu">
                                                <span class="c-siteMenu__contents">
                                                    <a href="<?= get_category_link( $child_category->term_id ); ?>"><?= $child_category->name; ?></a>
                                                </span>
                                                <ul class="p-menuList p-menuList--subMenu">
                                                    <?php
                                                        $grandChild_categories = get_categories(
                                                            array(
                                                                'hide_empty' => '0',
                                                                'parent' => $child_category->term_id,
                                                                'orderby' => 'id'
                                                            )
                                                        );
                                                    ?>
                                                    <?php foreach ( $grandChild_categories as $grandChild_category ) : ?>
                                                        <li class="p-menuList__item c-siteMenu">
                                                        <span class="c-siteMenu__contents">
                                                            <a href="<?= get_category_link( $grandChild_category->term_id ); ?>"><?= $grandChild_category->name; ?></a>
                                                        </span>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    </li>
                    <li class="p-menuList__item c-siteMenu">
                        <a href="#" class="c-siteMenu__contents c-siteMenu__contents--withImg">
                            <span class="c-siteMenu__img">
                                <img src="<?= get_template_directory_uri(); ?>/img/header-menu-img/ranking.png" alt="ランキング画像" class="c-img">
                            </span>
                            人気ランキング
                        </a>
                    </li>
                    <li class="p-menuList__item c-siteMenu">
                        <a href="#" class="c-siteMenu__contents c-siteMenu__contents--withImg">
                            <span class="c-siteMenu__img">
                                <img src="<?= get_template_directory_uri(); ?>/img/header-menu-img/site-detail.png" alt="サイト詳細画像" class="c-img">
                            </span>
                            わらばーNETとは
                        </a>
                    </li>
                </ul>
            </nav>
            <button class="p-header__icon c-icon c-icon--burger"><i class="fa-solid fa-bars fa-xl" style="color: #333333;"></i></button>
        </div>

        <?php wp_head(); ?>
    </header>