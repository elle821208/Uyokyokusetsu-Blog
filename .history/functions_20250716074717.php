<?php
//※※※↑↑↑functions.phpトップの<?phpより上にはコメントを書かないこと(エラーの原因になる)！※※※

// ------------------------------------------
// サムネイル画像（アイキャッチ）を使う設定
// ------------------------------------------
add_theme_support('post-thumbnails'); 
add_image_size('post-thumbnails', 400, 200, true); 
add_image_size('custom-thumb', 640, 360, true); 

// ------------------------------------------
// ブラウザのタブに表示されるタイトルをカスタマイズ
// ------------------------------------------
function titles() {
    $title = wp_title(' | ', true, 'right');

    if (is_home()) {
        echo '①紆余曲折 |トップ ';
    } elseif (is_category()) {
        single_cat_title();
        echo ' | サイト名';
    } else {
        echo $title . 'サイト名';
    }
}

// ------------------------------------------
// 投稿（post）タイプのアーカイブURLを「/blog」に変更
// ------------------------------------------
function post_has_archive($args, $post_type) {
    if ('post' === $post_type) {
        $args['rewrite'] = true;
        $args['has_archive'] = 'blog';
        $args['label'] = '雑記ブログ一覧';
    }
    return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);

// ------------------------------------------
// トップページの投稿件数を変更（雑記投稿）
// ------------------------------------------
function news_posts_per_page($query) {
    if (is_admin() || !$query->is_main_query()) return;
    if ($query->is_front_page()) {
        $query->set('posts_per_page', 12);
    }
}
add_action('pre_get_posts', 'news_posts_per_page');

// ------------------------------------------
// カスタム投稿タイプ「works（技術ブログ一覧）」を登録
// ------------------------------------------
function cpy_register_works() {
    $labels = [
        'singular_name' => 'tech',
        'edit_name'     => 'tech',
    ];
    $args = [
        'label'               => '技術ブログ一覧',
        'labels'              => $labels,
        'public'              => true,
        'show_in_rest'        => true,
        'has_archive'         => true,
        'hierarchical'        => true,
        'rewrite'             => ['slug' => 'works', 'with_front' => true],
        'menu_position'       => 5,
        'supports'            => ['title', 'editor', 'thumbnail'],
    ];
    register_post_type('works', $args);
}
add_action('init', 'cpy_register_works');

// ------------------------------------------
// カスタム投稿タイプ「works」の月別・投稿タイプ統合による絞り込み処理
// ------------------------------------------
function filter_works_archive_by_date($query) {
    if (!is_admin() && $query->is_main_query() && $query->is_post_type_archive('works')) {
        $year  = isset($_GET['w_year'])  ? intval($_GET['w_year'])  : null;
        $month = isset($_GET['w_month']) ? intval($_GET['w_month']) : null;

        if ($year || $month) {
            $date_query = [];
            if ($year)  $date_query['year']  = $year;
            if ($month) $date_query['month'] = $month;
            $query->set('date_query', [$date_query]);
        }

        // 「post」の中ではtechカテゴリのみ表示対象とし、他は除外
        $query->set('post_type', ['post', 'tech', 'works']);
        $query->set('category_name', 'tech');
        $query->set('posts_per_page', -1); // 全件表示（必要に応じて調整）
    }
}
add_action('pre_get_posts', 'filter_works_archive_by_date');

// ------------------------------------------
// フロントページで「zakkiカテゴリ」のみを表示
// ------------------------------------------
function filter_main_query_for_front($query) {
    if (is_admin() || !$query->is_main_query()) return;
    if (is_front_page()) {
        $query->set('category_name', 'zakki');
    }
}
add_action('pre_get_posts', 'filter_main_query_for_front');

// ------------------------------------------
// 月別アーカイブで「?cat=カテゴリ」で絞り込み表示
// ------------------------------------------
function filter_monthly_archive_by_category($query) {
    if (!is_admin() && $query->is_main_query() && is_date() && isset($_GET['cat'])) {
        $query->set('category_name', sanitize_text_field($_GET['cat']));
    }
}
add_action('pre_get_posts', 'filter_monthly_archive_by_category');

// ------------------------------------------
// カテゴリーページで ?year=YYYY&monthnum=MM の絞り込みを許可
// ------------------------------------------
function filter_archive_by_category_and_date($query) {
    if (!is_admin() && $query->is_main_query() && $query->is_category()) {
        if (isset($_GET['year']))     $query->set('year', intval($_GET['year']));
        if (isset($_GET['monthnum'])) $query->set('monthnum', intval($_GET['monthnum']));
    }
}
add_action('pre_get_posts', 'filter_archive_by_category_and_date');
