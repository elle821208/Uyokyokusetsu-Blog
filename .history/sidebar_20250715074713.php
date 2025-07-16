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

        /*
         * ▼現在表示中のカテゴリ情報を取得（例: /category/mindset にアクセスしているとき）
         * ▼get_queried_object() は現在のページの情報をオブジェクト形式で返す
         */
        $current_category = get_queried_object();
        $category_id = ''; // 初期化：カテゴリIDがまだ無い状態

        if ($current_category && isset($current_category->term_id)) {
          // ▼現在のカテゴリIDを取得（例：mindsetのID＝3など）
          $category_id = $current_category->term_id;
          /*
           * ▼この変数（$category_id）はURL生成で使用される
           * ▼影響ページ：カテゴリページで月別リンクを生成する際の絞り込みに使用
           */
        }

        /*
         * ▼投稿タイプ "post"（通常の投稿）から tech カテゴリ以外の投稿の年月を取得するSQL
         * ▼DISTINCT で重複を除外し、最新から順に並べ替え
         * ▼影響ファイル：sidebar.php
         * ▼影響ページ：雑記ブログの各ページ（index.php, category.php, single.phpなど）
         */
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
          $year = $month->year;                       // 例：2025
          $mon  = sprintf('%02d', $month->month);     // 例：07

          /*
           * ▼リンク生成：
           *   - カテゴリページの場合：そのカテゴリに絞り込んだ月別リンク（例: /category/mindset/?m=202507）
           *   - カテゴリページでない場合：通常の年月アーカイブ（例: /2025/07/）
           */
          if ($category_id) {
            $link = get_category_link($category_id) . '?m=' . $year . $mon;
          } else {
            $link = get_month_link($year, $mon);
          }

          echo '<li><a href="' . esc_url($link) . '">' . esc_html($year . '年' . $mon . '月') . '</a></li>';
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
        global $wpdb;

        // ▼技術ブログ（投稿タイプ works）の中で、公開済みの年月を取得
        $months = $wpdb->get_results("
          SELECT DISTINCT YEAR(post_date) AS year, MONTH(post_date) AS month
          FROM $wpdb->posts
          WHERE post_type = 'works' AND post_status = 'publish'
          ORDER BY post_date DESC
        ");

        foreach ($months as $month) {
          $year = $month->year;
          $mon  = sprintf('%02d', $month->month);

          // ▼年月ごとにアーカイブリンクを生成（例: /works?w_year=2025&w_month=07）
          $url  = get_post_type_archive_link('works') . '?w_year=' . $year . '&w_month=' . $mon;

          echo '<li><a href="' . esc_url($url) . '">' . esc_html($year . '年' . $mon . '月') . '</a></li>';
        }
        ?>
      </ul>
    </section>

  <?php endif; ?>
</aside>
