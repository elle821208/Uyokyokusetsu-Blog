<?php
//※※※↑↑↑functions.phpトップの<?phpより上にはコメントを書かないこと(エラーの原因になる)！※※※

// ------------------------------------------
// サムネイル画像（アイキャッチ）を使う設定
// ------------------------------------------
// 投稿や固定ページでアイキャッチ画像（サムネイル）を使えるようにします。
add_theme_support('post-thumbnails'); 
add_image_size('post-thumbnails', 400, 200, true); // 幅400×高さ200（トリミングあり）
add_image_size('custom-thumb', 640, 360, true);    // 幅640×高さ360（トリミングあり）

// ------------------------------------------
// タブのタイトルに表示する文字列をカスタマイズ
// ------------------------------------------
// 例）「mindset | サイト名」などに表示されます。
// 対象ページ: トップページ、カテゴリページ、記事ページなど
// 影響ファイル: header.php などタイトルを出力しているファイル
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
// 通常投稿（post）のアーカイブURLを /blog に変更
// ------------------------------------------
// URL例: https://〇〇.com/blog でアーカイブ表示されます
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
// トップページ（front-page.php）の投稿表示数を12件に設定
function news_posts_per_page($query) {
    if (is_admin() || !$query->is_main_query()) return;
    if ($query->is_front_page()) {
        $query->set('posts_per_page', 12);
    }
}
add_action('pre_get_posts', 'news_posts_per_page');

// ------------------------------------------
// カスタム投稿タイプ「works」（技術ブログ一覧）を登録
// ------------------------------------------
// 管理画面の「投稿」→「works」として表示され、/works にアクセス可能
function cpy_register_works() {
    $labels = [
        'singular_name' => 'tech',   // 管理画面などで表示される名前
        'edit_name'     => 'tech',
    ];
    $args = [
        'label'               => '技術ブログ一覧',
        'labels'              => $labels,
        'public'              => true,               // 公開ページとして表示される
        'show_in_rest'        => true,               // ブロックエディタ有効
        'has_archive'         => true,               // アーカイブ機能を有効（/works で一覧表示）
        'hierarchical'        => true,
        'rewrite'             => ['slug' => 'works', 'with_front' => true],
        'menu_position'       => 5,                  // 管理画面の並び順
        'supports'            => ['title', 'editor', 'thumbnail'], // 投稿で使える機能
    ];
    register_post_type('works', $args);
}
add_action('init', 'cpy_register_works');

// ------------------------------------------
// 技術ブログ（works）投稿タイプのアーカイブページで
// ?w_year=2025&w_month=07 のような年月絞り込みを可能にする
// ------------------------------------------
// 対象ページ: /works などの works 投稿タイプアーカイブ
// 対象ファイル: archive-works.php（テンプレートファイル）
// 絞り込み条件がないとき → 全 works 表示
// 絞り込みがあるとき → 年月一致する works のみ表示
function filter_works_archive_by_date($query) {
    if (!is_admin() && $query->is_main_query() && $query->is_post_type_archive('works')) {
        // クエリパラメータから「年」と「月」を取得（URL例: /works?w_year=2025&w_month=07）
        $year  = isset($_GET['w_year'])  ? intval($_GET['w_year'])  : null;
        $month = isset($_GET['w_month']) ? intval($_GET['w_month']) : null;

        // 年または月が指定されている場合にのみ、date_query で絞り込む
        if ($year || $month) {
            $date_query = [];
            if ($year)  $date_query['year']  = $year;
            if ($month) $date_query['month'] = $month;
            $query->set('date_query', [$date_query]); // 年月で絞り込み
        }

        // 投稿タイプは「works」のみに限定
        $query->set('post_type', 'works');

        // 表示件数は制限なし（全件表示）
        // 必要に応じて 12 件などに変更可能
        $query->set('posts_per_page', -1);
    }
}
add_action('pre_get_posts', 'filter_works_archive_by_date');

// ------------------------------------------
// トップページでは「zakki」カテゴリのみ表示するように制限
// 対象ページ: front-page.php（トップ）
// 対象投稿タイプ: post（通常投稿）
function filter_main_query_for_front($query) {
    if (is_admin() || !$query->is_main_query()) return;
    if (is_front_page()) {
        $query->set('category_name', 'zakki'); // zakkiカテゴリのみ
    }
}
add_action('pre_get_posts', 'filter_main_query_for_front');

// ------------------------------------------
// 月別アーカイブページで ?cat=◯◯ のカテゴリ絞り込みを許可
// 例: /2025/07/?cat=mindset のような形式
function filter_monthly_archive_by_category($query) {
    if (!is_admin() && $query->is_main_query() && is_date() && isset($_GET['cat'])) {
        $query->set('category_name', sanitize_text_field($_GET['cat']));
    }
}
add_action('pre_get_posts', 'filter_monthly_archive_by_category');

// ------------------------------------------
// カテゴリーページで ?year=2025&monthnum=07 による年月絞り込みを許可
// 対象ページ: /category/mindset など
function filter_archive_by_category_and_date($query) {
    if (!is_admin() && $query->is_main_query() && $query->is_category()) {
        if (isset($_GET['year']))     $query->set('year', intval($_GET['year']));
        if (isset($_GET['monthnum'])) $query->set('monthnum', intval($_GET['monthnum']));
    }
}
add_action('pre_get_posts', 'filter_archive_by_category_and_date');




// =============================================
// Prism.js を読み込むための設定（functions.php）
// =============================================

function add_prismjs_to_theme() {
  // Prism.js の CSS（見た目のスタイル）を読み込む
  wp_enqueue_style(
    'prismjs-css', // スタイルの名前（自由に変更可）
    'https://cdn.jsdelivr.net/npm/prismjs@1.29.0/themes/prism.min.css' // CDNのURL（外部の倉庫）
  );

  // Prism.js の JavaScript（コードを色付けする仕組み）を読み込む
  wp_enqueue_script(
    'prismjs-js', // スクリプトの名前（自由に変更可）
    'https://cdn.jsdelivr.net/npm/prismjs@1.29.0/prism.min.js', // CDNのURL
    array(),  // 依存するスクリプト（なし）
    null,     // バージョン番号（自動）
    true      // 読み込み位置：trueはHTMLの一番下（速くなる）
  );
}

// WordPress に「この関数を使ってね！」と登録する
add_action('wp_enqueue_scripts', 'add_prismjs_to_theme');






// ==============================
// コードコピー機能のJS/CSSを読み込み
// ==============================
function uyokyokusetsu_enqueue_copy_code_assets() {
    // JSを読み込み（テーマの/js/copy-code.js）
    wp_enqueue_script(
        'copy-code',
        get_template_directory_uri() . '/js/copy-code.js',
        array(),
        null,
        true // フッターで読み込む
    );

    // CSSを読み込み（テーマの/css/copy-code.css）
    wp_enqueue_style(
        'copy-code-style',
        get_template_directory_uri() . '/css/copy-code.css'
    );
}
add_action('wp_enqueue_scripts', 'uyokyokusetsu_enqueue_copy_code_assets');






// ==============================
// 学習用 JavaScript ファイル群
// ==============================
function my_enqueue_scripts() {
    wp_enqueue_script('tetsu-basics',
        get_template_directory_uri() . '/Tetsu-Js-Study/basics.js',
        array(), '1.0', true);

    wp_enqueue_script('tetsu-functions',
        get_template_directory_uri() . '/Tetsu-Js-Study/functions.js',
        array(), '1.0', true);

    wp_enqueue_script('tetsu-arrays-loops',
        get_template_directory_uri() . '/Tetsu-Js-Study/arraysAndLoops.js',
        array(), '1.0', true);

    wp_enqueue_script('tetsu-objects-builtins', 
        get_template_directory_uri() . '/Tetsu-Js-Study/objectsAndBuiltIns.js',
        array(), '1.0', true);

    wp_enqueue_script('tetsu-dom-browser',
        get_template_directory_uri() . '/Tetsu-Js-Study/domAndBrowser.js',
        array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'my_enqueue_scripts');




// ==============================
// ダッシュボードに警告表示
// ==============================  
add_action('admin_notices', function() {
    echo '<div style="padding:10px; background:#ff4444; color:#fff; font-size:18px; font-weight:bold; text-align:center;">
    🔴 これは【本番環境】です！ 操作に注意してください
    </div>';
});




// ==============================
// ダークモード＆季節判定 JS を全ページで読み込み
// ==============================       
function enqueue_darkmode_season_script() {
    wp_enqueue_script(
        'darkmode-season',
        get_template_directory_uri() . '/Tetsu-Js-Study/darkmode-season.js', // ← フォルダ構成に合わせたパス
        array(), // 依存スクリプトなし
        null,    // バージョン番号（キャッシュ防止したいときは time() にすると便利）
        true     // フッターで読み込む（高速化）
    );
}
add_action('wp_enqueue_scripts', 'enqueue_darkmode_season_script');













