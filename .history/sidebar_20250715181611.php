<?php
/*
 * ファイル名: sidebar.php
 * 役割: サイトのサイドバーを表示するテンプレートファイル。
 * 影響するページ: 全ページ（header.phpやindex.phpなどから読み込まれる）
 * 例: トップページ（/）, 通常投稿（/2025/07/◯◯）, カテゴリページ（/category/◯◯）, 技術ブログ（/works など）
 */
?>

<aside id="sidebar" class="custom-sidebar">

  <?php
  /*
   * ▼この条件分岐の意味：
   * 「現在のページが技術ブログ（カスタム投稿タイプ works）ではない」場合に、以下のHTMLブロックを表示します。
   * つまり、通常の雑記ブログ用のサイドバーです。
   *
   * ▼影響ページ:
   *   - トップページ（index.php または front-page.php）
   *   - 通常投稿のカテゴリページ（category.php）
   *   - 通常投稿の個別記事ページ（single.php）
   * ▼影響ファイル:
   *   - sidebar.php（このファイルそのもの）
   */
  ?>
  <?php if (!is_post_type_archive('works') && get_post_type() !== 'works' && !is_singular('works')) : ?>

    <!-- ▼雑記ブログ用：カテゴリー表示エリア -->
    <section class="sidebar-section">
      <h2 class="sidebar-title">雑記ブログカテゴリー</h2>
      <ul class="sidebar-list">
        <?php
        /*
         * ▼get_categories()関数：WordPressのカテゴリー一覧を取得する関数
         * ▼設定:
         *   - hide_empty = 0 → 投稿がないカテゴリも表示
         *   - exclude → techカテゴリとzakkiカテゴリを非表示にする
         * ▼この部分の影響ファイル:
         *   - sidebar.php
         * ▼影響ページ:
         *   - トップページ
         *   - 通常投稿のカテゴリ一覧ページ
         */
        $zakki_categories = get_categories([
          'hide_empty' => 0,
          'exclude'    => [get_cat_ID('tech'), get_cat_ID('zakki')] // tech・zakkiを除外
        ]);

        foreach ($zakki_categories as $cat) {
          // ▼get_category_link(): 指定カテゴリのURLを取得（例: /category/mindset）
          $url = get_category_link($cat->term_id);

          // ▼HTMLとしてカテゴリリンクをリスト表示
          echo '<li><a href="' . esc_url($url) . '">' . esc_html($cat->name) . '</a></li>';
        }
        ?>
      </ul>
    </section>

        <!-- ▼雑記ブログ用：月別アーカイブ表示エリア -->
    <section class="sidebar-section">
      <h2 class="sidebar-title">雑記ブログアーカイブ（月別）</h2>
      <ul class="sidebar-list">
        <?php
        global $wpdb; // WordPressのデータベースにアクセスするための変数

        // ▼現在表示中のカテゴリ情報を取得（例: /category/mindset にアクセスしているとき）
        $current_category = get_queried_object();
        $category_id = '';

        if ($current_category && isset($current_category->term_id)) {
          $category_id = $current_category->term_id;
        }

        // ▼techカテゴリ以外の通常投稿から年月を取得
        $months = $wpdb->get_results("
          SELECT DISTINCT YEAR(p.post_date) AS year, MONTH(p.post_date) AS month
          FROM $wpdb->posts p
          INNER JOIN $wpdb->term_relationships tr ON p.ID = tr.object_id
          INNER JOIN $wpdb->term_taxonomy tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
          INNER JOIN $wpdb->terms t ON tt.term_id = t.term_id
          WHERE p.post_type = 'post'
            AND p.post_status = 'publish'
            AND tt.taxonomy = 'category'
            AND t.slug != 'tech' -- techカテゴリを除外（技術ブログなので）
          ORDER BY p.post_date DESC
        ");

        // ▼年月ごとにリンクを出力
        foreach ($months as $month) {
          $year = $month->year;
          $mon  = sprintf('%02d', $month->month);

          if ($category_id) {
            $link = get_category_link($category_id) . '?year=' . $year . '&monthnum=' . $mon;
          } else {
            $link = get_month_link($year, $mon);            
          }

          // ▼◎◎年〇〇月の雑記ブログ というリンク表示に変更
          echo '<li><a href="' . esc_url($link) . '">' . esc_html($year . '年' . $mon . '月の雑記ブログ') . '</a></li>';
        }
        ?>
      </ul>
    </section>
        

  <?php else : ?>

    <!-- ▼ここからは「技術ブログ（works）」のときに表示されるサイドバー -->
    <!-- ▼影響ページ： /works や /works/投稿名 -->
    <!-- ▼影響テンプレート：archive-works.php、single-works.php -->

    <!-- ▼技術ブログのカテゴリ表示（tech） -->
    <section class="sidebar-section">
      <h2 class="sidebar-title">技術ブログカテゴリー</h2>
      <ul class="sidebar-list">
        <?php
        // ▼「tech」カテゴリのみを取得
        $tech_category = get_categories([
          'hide_empty' => 0,
          'include'    => get_cat_ID('tech') // techカテゴリのIDのみ指定
        ]);

        foreach ($tech_category as $cat) {
          // ▼技術ブログ（works）の一覧ページリンクを取得
          $url = get_post_type_archive_link('works'); // 例: /works
          echo '<li><a href="' . esc_url($url) . '">' . esc_html($cat->name) . '</a></li>';
        }
        ?>
      </ul>
    </section>

    <!-- ▼技術ブログの月別アーカイブ -->
    <section class="sidebar-section">
      <h2 class="sidebar-title">技術ブログアーカイブ（月別）</h2>
      <ul class="sidebar-list">
       <?php
// ▼【役割】このブロックは、技術ブログ（カスタム投稿タイプ "works"）の
// 公開済み記事の「年月別アーカイブリンク一覧」を作るためのコードです。

// ▼【関数】global $wpdb;
// WordPressのデータベースに直接アクセスするために必要な特別なオブジェクトを使います。
// この $wpdb は WordPress の中の SQL 実行などを行うためのものです。
global $wpdb;

// ▼【SQLを実行】$wpdb->get_results()
// 技術ブログ（投稿タイプ: works）から、投稿された「年」と「月」の一覧を取得します。
// 重複しないように DISTINCT を使い、最新の年月が上に来るように ORDER BY で並べています。
$months = $wpdb->get_results("
  SELECT DISTINCT
    YEAR(post_date) AS year,   -- 投稿された年を取得（例：2025）
    MONTH(post_date) AS month  -- 投稿された月を取得（例：7）
  FROM
    $wpdb->posts               -- 投稿データが格納されているテーブルを対象にする
  WHERE
    post_type = 'works'        -- 投稿タイプが「works」（＝技術ブログ）であること
    AND post_status = 'publish'-- 公開済みの記事だけを対象にする
  ORDER BY
    post_date DESC             -- 新しい年月から順番に並べる
");

// ▼【foreach文】$months に入っている各「年月」データに対して、1件ずつ処理します
foreach ($months as $month) {
  // ▼$month->year：SQLで取得した年（例：2025）
  $year = $month->year;

  // ▼$month->month：SQLで取得した月（例：7）を2桁に整形（例：07）
  // sprintf('%02d', 7) → 07 というように、必ず2桁で表示させます
  $mon  = sprintf('%02d', $month->month);

  // ▼get_post_type_archive_link()：投稿タイプ（ここでは "works"）の一覧ページのURLを取得
  // 例：/works
  // ▼その後ろに「?w_year=2025&w_month=07」というクエリパラメータをつけて、月ごとに絞り込めるようにします
  // 例：/works?w_year=2025&w_month=07
  $url  = get_post_type_archive_link('works') . '?w_year=' . $year . '&w_month=' . $mon;

  // ▼HTMLとして、年月ごとのリンク（例：2025年07月）をリストとして出力します
  // esc_url() → URLを安全な形に整形してくれるWordPressの関数
  // esc_html() → 文字列を安全に表示してくれる関数（HTMLタグとして解釈されないようにする）
  echo '<li><a href="' . esc_url($url) . '">' . esc_html($year . '年' . $mon . '月') . '</a></li>';
}
?>
      </ul>
    </section>

  <?php endif; ?>
</aside>
