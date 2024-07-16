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
                    <?php $top_categories = get_top_categories_info(); ?>
                    <?php foreach ( $top_categories as $top_category ) : ?>
                        <?php
                            switch ( $top_category->name ) {
                                case 'おでかけ':
                                    $img_file_name = 'outing.png';
                                    $img_alt = 'おでかけイメージ画像';
                                    $menu_text = 'おでかけ';
                                    break;
                                case '食事':
                                    $img_file_name = 'meal.png';
                                    $img_alt = '食事イメージ画像';
                                    $menu_text = '食事';
                                    break;
                                case '生活':
                                    $img_file_name = 'life.png';
                                    $img_alt = '生活イメージ画像';
                                    $menu_text = '生活';
                                    break;
                            }
                        ?>
                        <li class="p-menuList__item p-menuList__item--withSubMenu c-siteMenu">
                            <a href="<?= get_category_link( $top_category->term_id ); ?>" class="c-siteMenu__contents c-siteMenu__contents--withImg">
                                <span class="c-siteMenu__img">
                                    <img src="<?= get_template_directory_uri(); ?>/img/header-menu-img/<?= $img_file_name; ?>" alt="<?= $img_alt; ?>" class="c-img">
                                </span>
                                <?= $menu_text; ?>
                            </a>
                            <ul class="p-menuList p-menuList--headerSub">
                                <?php
                                    $parent_categories = get_categories(
                                        array(
                                            'hide_empty' => '0',
                                            'parent' => $top_category->term_id,
                                            'orderby' => 'id'
                                        )
                                    );
                                ?>
                                <?php foreach ( $parent_categories as $parent_category ) : ?>
                                    <li class="p-menuList__item c-siteMenu">
                                        <span class="c-siteMenu__contents">
                                            <a href="<?= get_category_link( $parent_category->term_id ); ?>"><?= $parent_category->name; ?></a>
                                        </span>
                                        <ul class="p-menuList p-menuList--headerSub">
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
                    <? endforeach; ?>
                    <li class="p-menuList__item c-siteMenu">
                        <a href="#" class="c-siteMenu__contents c-siteMenu__contents--withImg">
                            <span class="c-siteMenu__img">
                                <img src="<?= get_template_directory_uri(); ?>/img/header-menu-img/ranking.png" alt="ランキング画像" class="c-img">
                            </span>
                            ランキング
                        </a>
                    </li>
                    <li class="p-menuList__item c-siteMenu">
                        <a href="#" class="c-siteMenu__contents c-siteMenu__contents--withImg">
                            <span class="c-siteMenu__img">
                                <img src="<?= get_template_directory_uri(); ?>/img/header-menu-img/site-detail.png" alt="サイト詳細画像" class="c-img">
                            </span>
                            サイト紹介
                        </a>
                    </li>
                </ul>
            </nav>
            <button id="slideMenuButton" class="p-header__icon c-icon c-icon--burger"></button>
            <nav id="slideMenu" class="p-slideMenu">
                <div class="p-slideMenu__contents">
                    <ul class="p-menuList p-menuList--slide">
                        <li class="p-menuList__item c-siteMenu">
                            <a href="<?= home_url(); ?>" class="c-siteMenu__contents c-siteMenu__contents--left">ホーム</a>
                        </li>
                        <li class="p-menuList__item c-siteMenu">
                            <a href="#" class="c-siteMenu__contents c-siteMenu__contents--left">おでかけ</a>
                            <input type="checkbox" class="c-icon c-icon--dropDown">
                        </li>
                        <li class="p-menuList__item c-siteMenu">
                            <a href="#" class="c-siteMenu__contents c-siteMenu__contents--left c-siteMenu__contents--dropDown">食事</a>
                            <input type="checkbox" class="c-icon c-icon--dropDown">
                        </li>
                        <li class="p-menuList__item c-siteMenu">
                            <a href="#" class="c-siteMenu__contents c-siteMenu__contents--left c-siteMenu__contents--dropDown">生活</a>
                            <input type="checkbox" class="c-icon c-icon--dropDown">
                        </li>
                        <li class="p-menuList__item c-siteMenu">
                            <a href="#" class="c-siteMenu__contents c-siteMenu__contents--left c-siteMenu__contents--dropDown">人気記事ランキング</a>
                        </li>
                        <li class="p-menuList__item c-siteMenu">
                            <a href="#" class="c-siteMenu__contents c-siteMenu__contents--left c-siteMenu__contents--dropDown">サイト紹介</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div id="blackFullScreen" class="c-blackFullScreen"></div>
        </div>

        <?php wp_head(); ?>
    </header>