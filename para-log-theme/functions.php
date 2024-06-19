<?php
/* フック関数 */

// サムネイル
add_theme_support( 'post-thumbnails' );

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