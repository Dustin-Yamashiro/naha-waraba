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
                    <li class="p-menuList__item p-menuList__subMenu c-siteMenu c-siteMenu--hoverUnderLine"><a href="#">エリア別検索</a>
                        <ul class="p-menuList p-menuList--subMenu">
                            <li class="p-menuList__item p-menuList__secondSubMenu c-siteMenu c-siteMenu--hoverBkColGray"><a href="#">本島北部</a>
                                <ul class="p-menuList p-menuList--subMenu">
                                    <li class="p-menuList__item c-siteMenu c-siteMenu--hoverBkColGray"><a href="#">名護市</a></li>
                                    <li class="p-menuList__item c-siteMenu c-siteMenu--hoverBkColGray"><a href="#">本部町</a></li>
                                    <li class="p-menuList__item c-siteMenu c-siteMenu--hoverBkColGray"><a href="#">金武町</a></li>
                                    <li class="p-menuList__item c-siteMenu c-siteMenu--hoverBkColGray"><a href="#">恩納村</a></li>
                                    <li class="p-menuList__item c-siteMenu c-siteMenu--hoverBkColGray"><a href="#">宜野座村</a></li>
                                    <li class="p-menuList__item c-siteMenu c-siteMenu--hoverBkColGray"><a href="#">今帰仁村</a></li>
                                    <li class="p-menuList__item c-siteMenu c-siteMenu--hoverBkColGray"><a href="#">大宜味村</a></li>
                                    <li class="p-menuList__item c-siteMenu c-siteMenu--hoverBkColGray"><a href="#">東村</a></li>
                                    <li class="p-menuList__item c-siteMenu c-siteMenu--hoverBkColGray"><a href="#">国頭村</a></li>
                                </ul>
                            </li>
                            <li class="p-menuList__item p-menuList__secondSubMenu c-siteMenu c-siteMenu--hoverBkColGray"><a href="#">本島中部</a>
                                <ul class="p-menuList p-menuList--subMenu">
                                    <li class="p-menuList__item c-siteMenu c-siteMenu--hoverBkColGray"><a href="#">宜野湾市</a></li>
                                    <li class="p-menuList__item c-siteMenu c-siteMenu--hoverBkColGray"><a href="#">沖縄市</a></li>
                                    <li class="p-menuList__item c-siteMenu c-siteMenu--hoverBkColGray"><a href="#">うるま市</a></li>
                                    <li class="p-menuList__item c-siteMenu c-siteMenu--hoverBkColGray"><a href="#">北谷町</a></li>
                                    <li class="p-menuList__item c-siteMenu c-siteMenu--hoverBkColGray"><a href="#">嘉手納町</a></li>
                                    <li class="p-menuList__item c-siteMenu c-siteMenu--hoverBkColGray"><a href="#">読谷村</a></li>
                                    <li class="p-menuList__item c-siteMenu c-siteMenu--hoverBkColGray"><a href="#">中城村</a></li>
                                    <li class="p-menuList__item c-siteMenu c-siteMenu--hoverBkColGray"><a href="#">北中城村</a></li>
                                </ul>
                            </li>
                            <li class="p-menuList__item p-menuList__secondSubMenu c-siteMenu c-siteMenu--hoverBkColGray"><a href="#">本島南部</a>
                                <ul class="p-menuList p-menuList--subMenu">
                                    <li class="p-menuList__item c-siteMenu c-siteMenu--hoverBkColGray"><a href="#">那覇市</a></li>
                                    <li class="p-menuList__item c-siteMenu c-siteMenu--hoverBkColGray"><a href="#">浦添市</a></li>
                                    <li class="p-menuList__item c-siteMenu c-siteMenu--hoverBkColGray"><a href="#">豊見城市</a></li>
                                    <li class="p-menuList__item c-siteMenu c-siteMenu--hoverBkColGray"><a href="#">糸満市</a></li>
                                    <li class="p-menuList__item c-siteMenu c-siteMenu--hoverBkColGray"><a href="#">南城市</a></li>
                                    <li class="p-menuList__item c-siteMenu c-siteMenu--hoverBkColGray"><a href="#">南風原町</a></li>
                                    <li class="p-menuList__item c-siteMenu c-siteMenu--hoverBkColGray"><a href="#">与那原町</a></li>
                                    <li class="p-menuList__item c-siteMenu c-siteMenu--hoverBkColGray"><a href="#">西原町</a></li>
                                    <li class="p-menuList__item c-siteMenu c-siteMenu--hoverBkColGray"><a href="#">八重瀬町</a></li>
                                </ul>
                            </li>
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