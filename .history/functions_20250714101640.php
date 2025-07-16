<?php
//※※※↑↑↑functions.phpトップの<?phpより上にはコメントを書かないこと(エラーの原因になる)！※※※

// ------------------------------------------
// サムネイル画像（アイキャッチ）を使う設定
// ------------------------------------------
add_theme_support('post-thumbnails'); 
// → ダッシュボードの投稿・固定ページ編集画面に「アイキャッチ画像」欄が表示される
// → 表示対象ファイル：index.php、archive.php、single.php などでサムネイルが使える

add_image_size('post-thumbnails', 400, 200, true); 
// → 自動生成される画像サイズ（記事一覧などで使う可能性あり）

add_image_size('custom-thumb', 640, 360, true); 
// → 独自サイズ。使いたいテンプレートで呼び出せる（例：一覧ページ、カスタムテンプレートなど）

// ------------------------------------------
// ブラウザのタブに表示されるタイトルをカスタマイズ
// ------------------------------------------
// ------------------------------------------
// 【機能名】ブラウザのタブに表示されるタイトルを設定する関数
// ------------------------------------------
// 【対象ファイル】functions.php
// 【影響するページ】header.php（<title>タグ）にこの関数が使われている場合、すべてのページに影響する
//                   例：トップページ、カテゴリー一覧ページ、投稿ページなど

function titles() {
    // 現在のページタイトルを取得する（WordPressが自動生成）
    $title = wp_title(' | ', true, 'right');

    if (is_home()) {
        // ▼トップページの場合 → 「①紆余曲折 | トップ」と表示される
        echo '①紆余曲折 |トップ ';
    } elseif (is_category()) {
        // ▼カテゴリー一覧ページ（例：/category/mindset）なら
        //    表示中のカテゴリー名をタイトルとして表示（例：「mindset | サイト名」）
        single_cat_title(); // カテゴリー名だけを出力
        echo ' | サイト名';
    } else {
        // ▼それ以外のページ（個別記事、固定ページなど）なら
        //    WordPressが自動生成したタイトルに「サイト名」を加える
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
        // → 「投稿（post）」のアーカイブページが /blog でアクセスできるようになる
        // → 関連テンプレート：archive.php または archive-news.php（あれば）

        $args['label'] = '雑記ブログ一覧'; 
        // → ダッシュボードの「投稿」ラベルが「雑記ブログ一覧」に変わる
    }
    return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);

// ------------------------------------------
// トップページの投稿件数を変更（           雑記投稿）
//–------------------------------------------
function news_posts_per_page($query) {
    if (is_admin() || !$query->is_main_query()) return;

    if ($query->is_front_page()) {
        $query->set('posts_per_page', 12); 
        // → トップページ（front-page.php または index.php）での投稿表示件数が12件に制限される
    }
}
add_action('pre_get_posts', 'news_posts_per_page');

// ------------------------------------------
// カスタム投稿タイプ「works（ダッシュボードの技術ブログ一覧）」を登録
// ------------------------------------------
function cpy_register_works() {
    $labels = [
        'singular_name' => 'tech',
        'edit_name'     => 'tech',
    ];

    $args = [
        'label'               => '技術ブログ一覧', 
        // → ダッシュボードのメニューに「技術ブログ一覧」として表示される

        'labels'              => $labels,
        'public'              => true,
        'show_in_rest'        => true, 
        // → ブロックエディタ対応。REST API で操作も可能

        'has_archive'         => true, 
        // → アーカイブページ（/works）で一覧表示される
        // → 使用テンプレート：archive-works.php（存在すれば優先）

        'hierarchical'        => true, 
        // → 固定ページのように親子関係をダッシュボードで設定できる

        'rewrite'             => ['slug' => 'works', 'with_front' => true], 
        // → アーカイブURLが /works に固定される

        'menu_position'       => 5, 
        // → ダッシュボード左メニューの上部（投稿の下）に表示される

        'supports'            => ['title', 'editor', 'thumbnail'], 
        // → ダッシュボード編集画面でタイトル、本文、アイキャッチ画像を入力可能
    ];
    register_post_type('works', $args); 
    // → カスタム投稿タイプ「works」がテーマと管理画面に登録される
}
add_action('init', 'cpy_register_works');

// ------------------------------------------
// カスタム投稿タイプ「works」のアーカイブ（archive-works.php）表示件数を設定（12件）
//–------------------------------------------
function custom_works_posts_per_page($query) {
    if (is_admin() || !$query->is_main_query()) return;

    if ($query->is_post_type_archive('works')) {
        $query->set('posts_per_page', 12); 
        // → /works にアクセスした際の一覧表示件数が12件に制限される
        // → 使用ファイル：archive-works.php（存在すれば）、なければ archive.php
    }
}
add_action('pre_get_posts', 'custom_works_posts_per_page');

// ------------------------------------------
// フロントページで「雑記（category: zakki）」のみを表示（メインループ制御）
// ------------------------------------------
function filter_main_query_for_front($query) {
    if (is_admin() || !$query->is_main_query()) return;

    if (is_front_page()) {
        $query->set('category_name', 'zakki'); 
        // → トップページ（front-page.php または index.php）で「zakki」カテゴリ投稿のみ表示
        // → その他カテゴリの投稿はトップには表示されない
    }
}
add_action('pre_get_posts', 'filter_main_query_for_front');


// ------------------------------------------
// 【機能名】月別アーカイブをカテゴリで絞り込む（例：/2025/07/?cat=zakki）
// ------------------------------------------
// ▼ 月アーカイブページにアクセスし、「?cat=〇〇」がURLについていたら、
//    そのカテゴリの投稿だけを表示するようにする処理です。

// 【対象ファイル】functions.php
// 【影響ページ】年月アーカイブ（例：/2025/07/?cat=zakki）での表示内容

function filter_monthly_archive_by_category($query) {
    // 管理画面ではなく、メインクエリ（表示用メインの問い合わせ）であることを確認
    if (!is_admin() && $query->is_main_query() && is_date() && isset($_GET['cat'])) {
        // URLに含まれるカテゴリ名（例：zakki）で投稿を絞り込み
        $query->set('category_name', sanitize_text_field($_GET['cat']));
    }
}
add_action('pre_get_posts', 'filter_monthly_archive_by_category');


