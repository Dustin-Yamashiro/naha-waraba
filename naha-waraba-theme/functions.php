<?php
/* 自作関数 */

// 投稿の親カテゴリー情報を取得
function get_post_parent_category_info( $post_categories )
{
    foreach ( $post_categories as $post_category ) {
        if ( empty( $post_category->parent ) ) {
            return $post_category;
        }
    }

    return [];
}

// 投稿の子カテゴリー情報を取得
function get_post_child_category_info( $post_categories )
{
    foreach ( $post_categories as $post_category ) {
        if ( !empty( $post_category->parent ) ) {
            return $post_category; 
        }
    }

    return [];
}

// 親カテゴリー一覧情報を取得
function get_parent_categories_info()
{
    return get_categories(
        array(
            'parent' => 0,
            'exclude' => 1,
            'hide_empty' => false,
            'orderby' => 'id'
        )
    );
}

// 子カテゴリー一覧情報を取得
function get_child_categories_info( $parent_category_id )
{
    return get_categories(
        array(
            'hide_empty' => '0',
            'parent' => $parent_category_id,
            'orderby' => 'id'
        )
    );
}

// ページヘッダータイトルを取得
function get_page_title()
{
    if ( is_front_page() ) {
        return get_bloginfo( 'name' );

    } else if ( is_category() ) {
        return single_cat_title() . ' | ' . get_bloginfo( 'name' );

    } else if ( is_tag() ) {
        return single_tag_title() . ' | ' . get_bloginfo( 'name' );
        
    } else {
        return get_the_title() . ' | ' . get_bloginfo( 'name' );
    }
}

// パンくずテンプレートを取得
function get_breadcrumb_template()
{
    $breadcrumb_template = 
        '<nav class="u-mt--breadcrumb">
            <ol class="p-breadcrumb">
                <li class="p-breadcrumb__item c-icon c-icon--home"><a href="' . esc_url( home_url() ) . '">ホーム</a></li>';

    if ( is_single() ) {
        // 親カテゴリーの追加
        $parent_category_info = get_post_parent_category_info( get_the_category() );
        $breadcrumb_template .= 
            '<li class="p-breadcrumb__item c-icon c-icon--right-triangle">
                <a href="' . esc_url( get_category_link( $parent_category_info->term_id ) ) . '">' . $parent_category_info->name  . '</a>
            </li>';

        // 子カテゴリーの追加
        $child_category_info = get_post_child_category_info( get_the_category() );
        $breadcrumb_template .= 
            '<li class="p-breadcrumb__item c-icon c-icon--right-triangle">
                <a href="' . esc_url( get_category_link( $child_category_info->term_id ) ) . '">' . $child_category_info->name  . '</a>
            </li>';

    } else if ( is_page() ) {
        $breadcrumb_template .= 
        '<li class="p-breadcrumb__item c-icon c-icon--right-triangle">
            <a href="' . esc_url( get_page_link( get_the_ID() ) ) . '">' . get_the_title()  . '</a>
        </li>';

    } else if ( is_category() ) {
        $category_info = get_queried_object();
        if ( empty( $category_info->parent ) ) {
            $breadcrumb_template .= 
                '<li class="p-breadcrumb__item c-icon c-icon--right-triangle">
                    <a href="' . esc_url( get_category_link( $category_info->term_id ) ) . '">' . $category_info->name  . '</a>
                </li>';
        } else {
            // 親カテゴリーの追加
            $parent_category_info = get_category( $category_info->parent );
            $breadcrumb_template .= 
                '<li class="p-breadcrumb__item c-icon c-icon--right-triangle">
                    <a href="' . esc_url( get_category_link( $parent_category_info->term_id ) ) . '">' . $parent_category_info->name  . '</a>
                </li>';

            // 子カテゴリーの追加
            $breadcrumb_template .= 
                '<li class="p-breadcrumb__item c-icon c-icon--right-triangle">
                    <a href="' . esc_url( get_category_link( $category_info->term_id ) ) . '">' . $category_info->name  . '</a>
                </li>';
        }

    } else if ( is_tag() ) {
        $tag_info = get_queried_object();
        $breadcrumb_template .= 
            '<li class="p-breadcrumb__item c-icon c-icon--right-triangle">
                <a href="' . esc_url( get_tag_link( $tag_info->term_id ) ) . '">' . $tag_info->name  . '</a>
            </li>';

    } else if ( is_search() ) {
        $breadcrumb_template .= '<li class="p-breadcrumb__item c-icon c-icon--right-triangle">サイト内検索</li>';
}

    $breadcrumb_template .= '</ol></nav>';
    return $breadcrumb_template;
}


/* フック関数 */

// サムネイル
add_theme_support( 'post-thumbnails' );

// 管理画面メニューを追加するメソッド
function add_my_admin_menu() {
	add_menu_page( 'ブロックパターン', 'ブロックパターン', 'manage_options', 'edit.php?post_type=wp_block', '', 'dashicons-block-default', 6 );
}
add_action( 'admin_menu', 'add_my_admin_menu' );


// 記事の閲覧数をカウントするメソッド
function set_post_view_count()
{
    if ( is_user_logged_in() || !is_single() ) {
        return;
    }

    $post_id = get_the_ID();
    $meta_key = 'post_view_count';
    $count = get_post_meta( $post_id, $meta_key, true );
    if ( empty( $count ) ) {
        delete_post_meta( $post_id, $meta_key );
        add_post_meta( $post_id, $meta_key, 1 );
        return;
    }

    $count += 1;
    update_post_meta( $post_id, $meta_key, $count );
}
add_action( 'wp_head', 'set_post_view_count' );


// 投稿一覧にカスタムフィールドのカラムを追加
function add_custom_to_manage_column( $columns )
{
	$columns['post_view_count'] = "閲覧数";
	$columns['thumbnail'] = "サムネイル";
    return $columns;
}
add_filter( 'manage_posts_columns', 'add_custom_to_manage_column' );


// 投稿一覧にカスタムフィールドの値を追加
function add_custom_val_to_manage_column( $column_name, $post_id )
{
    if ( 'post_view_count' === $column_name ) {
        $count = get_post_meta( $post_id, 'post_view_count', true );
        echo !empty( $count ) ? $count : '0';
    }

    if ( 'thumbnail' === $column_name ) {
        $thumbnail = get_the_post_thumbnail( $post_id, array( 150, 160 ) );
        echo !empty( $thumbnail ) ? $thumbnail : '無し';
    }
}
add_action( 'manage_posts_custom_column', 'add_custom_val_to_manage_column', 10, 2 );


// カスタムフィールドのカラムソート時の値をセット
function set_custom_colmun_sort_value( $vars )
{
    if ( isset( $vars['orderby'] ) && 'post_view_count' === $vars['orderby'] ) {
        $vars = array_merge( $vars, array(
            'meta_key' => 'post_view_count',
            'orderby' => 'meta_value_num'
        ) );
    }
    return $vars;
}
add_filter( 'request', 'set_custom_colmun_sort_value' );


// カスタムフィールドのカラムにソート機能を追加
function add_costom_column_sort( $sortable_column )
{
    $sortable_column['post_view_count'] = 'post_view_count';
    return $sortable_column;
}
add_filter( 'manage_edit-post_sortable_columns', 'add_costom_column_sort' );


// ページネーションボタンに自前のクラスを付与
function add_prev_button_class()
{
    return 'class="p-pagination__button p-pagination__button--previous c-button c-button--accentColor c-icon c-icon--previous"';
}
add_filter( 'previous_posts_link_attributes', 'add_prev_button_class' );

function add_next_button_class()
{
    return 'class="p-pagination__button p-pagination__button--next c-button c-button--baseColor c-icon c-icon--next"';
}
add_filter( 'next_posts_link_attributes', 'add_next_button_class' );