<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= get_page_title(); ?></title>
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
            <button id="siteSearchButton" class="p-header__search c-icon c-icon--search"></button>
            <?php get_search_form(); ?>
            <a href="<?= esc_url( home_url() ); ?>" class="p-header__logo">
                <img src="<?= get_template_directory_uri(); ?>/img/site-logo.png" alt="なはわらばぁ ロゴ" class="c-img">
            </a>
            <nav class="p-header__menu">
                <ul class="p-menuList p-menuList--header">
                    <?php $top_categories = get_top_categories_info(); ?>
                    <?php foreach ( $top_categories as $top_category ) : ?>
                    <?php
                        switch ( $top_category->name ) {
                            case 'おでかけ':
                                $img_file_name = 'outing.png';
                                $img_alt = 'おでかけイメージ画像';
                                break;
                            case '食事':
                                $img_file_name = 'meal.png';
                                $img_alt = '食事イメージ画像';
                                break;
                            case '生活':
                                $img_file_name = 'life.png';
                                $img_alt = '生活イメージ画像';
                                break;
                        }
                    ?>
                    <li class="p-menuList__item p-menuList__item--withSubMenu">
                        <a href="<?= esc_url( get_category_link( $top_category->term_id ) ); ?>" class="c-siteMenu c-siteMenu--withImg">
                            <img src="<?= get_template_directory_uri(); ?>/img/header-menu-img/<?= $img_file_name; ?>" alt="<?= $img_alt; ?>">
                            <?= $top_category->name ?>
                        </a>
                        <ul class="p-menuList p-menuList--headerSub">
                            <?php $sub_categories = get_sub_categories_info( $top_category->term_id ); ?>
                            <?php foreach ( $sub_categories as $sub_category ) : ?>
                                <li class="p-menuList__item">
                                    <a class="c-siteMenu" href="<?= esc_url( get_category_link( $sub_category->term_id ) ); ?>">
                                        <?= $sub_category->name; ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <?php endforeach; ?>
                    <li class="p-menuList__item">
                        <a href="<?= esc_url( home_url('/') ); ?>" class="c-siteMenu c-siteMenu--withImg">
                            <img src="<?= get_template_directory_uri(); ?>/img/header-menu-img/ranking.png" alt="ランキング画像">
                            ランキング
                        </a>
                    </li>
                    <li class="p-menuList__item">
                        <a href="<?= esc_url( home_url('/') ); ?>" class="c-siteMenu c-siteMenu--withImg">
                            <img src="<?= get_template_directory_uri(); ?>/img/header-menu-img/site-detail.png" alt="サイト詳細画像">
                            サイト紹介
                        </a>
                    </li>
                </ul>
            </nav>
            <button id="burgerButton" class="p-header__burger">
                <span></span>
            </button>
            <nav id="slideMenu" class="p-slideMenu">
                <div class="p-slideMenu__contents">
                    <ul class="p-menuList p-menuList--slide">
                        <li class="p-menuList__item">
                            <a href="<?= esc_url( home_url() ); ?>" class="c-siteMenu c-siteMenu--alignLeft">ホーム</a>
                        </li>
                        <?php foreach ( $top_categories as $top_category ) : ?>
                        <li class="p-menuList__item p-menuList__item--withDownMenu">
                            <a href="<?= esc_url( get_category_link( $top_category->term_id ) ); ?>" class="c-siteMenu c-siteMenu--withDownMenu">
                                <?= $top_category->name; ?>
                                <input type="checkbox">
                            </a>
                            <ul class="p-menuList p-menuList--slideSub">
                                <?php $sub_categories = get_sub_categories_info( $top_category->term_id ); ?>
                                <?php foreach ( $sub_categories as $sub_category ) : ?>
                                <li class="p-menuList__item">
                                    <a href="<?= esc_url( get_category_link( $sub_category->term_id ) ); ?>" class="c-siteMenu c-siteMenu--alignLeft">
                                        <?= $sub_category->name; ?>
                                    </a>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                        <?php endforeach; ?>
                        <li class="p-menuList__item">
                            <a href="<?= esc_url( home_url() ); ?>" class="c-siteMenu c-siteMenu--alignLeft">人気記事ランキング</a>
                        </li>
                        <li class="p-menuList__item">
                            <a href="<?= esc_url( home_url() ); ?>" class="c-siteMenu c-siteMenu--alignLeft">当サイトについて</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div id="blackFullScreen" class="c-blackFullScreen"></div>
        </div>

        <?php wp_head(); ?>
    </header>