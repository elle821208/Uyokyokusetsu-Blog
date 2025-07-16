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
   * ▼条件: 技術ブログ（works）ではないときに、雑記ブログ用のサイドバーを表示
   * ▼影響ページ: index.php, category.php, single.php など通常投稿ページ
   * ▼影響ファイル: sidebar.php
   */
  ?>
  <?php if (!is_post_type_archive('works') && get_post_type() !== 'works' && !is_singular('works')) : ?>

    <!-- ▼雑記ブログ用：カテゴリー表示 -->
    <section class="sidebar-section">
      <h2 class="sidebar-title">雑記ブログカテゴリー</h2>
      <ul class="sidebar-list">
        <?php
        $zakki_categories = get_categories([
          'hide_empty' => 0,
          'exclude'    => [get_cat_ID('tech'), get_cat_ID('zakki')] // techとzakkiを除外
        ]);

        foreach ($zakki_categories as $cat) {
          $url = get_category_link($cat->term_id); // カテゴリページのURL取得
          echo '<li><a href="' . esc_url($url) . '">' . esc_html($cat->name) . '</a></li>';
        }
        ?>
      </ul>
    </section>

    <!-- ▼雑記ブログ用：月別アーカイブ -->
    <section class="sidebar-section">
      <h2 class="sidebar-title">雑記ブログアーカイブ（月別）</h2>
      <ul class="sidebar-list">
        <?php
        global $wpdb; // WordPressのデータベースにアクセスするための特別なオブジェクト

        /*
         * ▼現在表示しているカテゴリの情報を取得（例: /category/mindset）
         * get_queried_object() は、現在のカテゴリのオブジェクト（情報のかたまり）を返す関数
         * term_id はそのオブジェクトの中から「カテゴリID（数字）」を取り出すためのキー
         * 「->」はオブジェクトから情報を取り出すための記号です。
         * 例: $category->term_id は「そのカテゴリのIDを取り出す」という意味です。
         * 影響ファイル: sidebar.php
         * 影響ページ: カテゴリページ（/category/◯◯）
         */
        $current_category = get_queried_object();
        $category_id = '';
        if ($current_category && isset($current_category->term_id)) {
          $category_id = $current_category->term_id;
        }

        /*
         * ▼雑記ブログ（月別アーカイブ）用に投稿年月をSQLで取得（techカテゴリ除外）
         * 影響ファイル: sidebar.php
         * 影響ページ: 雑記ブログの各カテゴリページ・トップページなど
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
            AND t.slug != 'tech' -- techカテゴリ（技術ブログ）を除外
          ORDER BY p.post_date DESC
        ");

        foreach ($months as $month) {
          $year = $month->year; // 投稿の年（例: 2025）
          $mon  = sprintf('%02d', $month->month); // 投稿の月を2桁に整形（例: 7 → 07）

          if ($category_id) {
            // カテゴリページにいる場合：カテゴリ+年月で絞り込めるURLを生成
            $link = get_category_link($category_id) . '?year=' . $year . '&monthnum=' . $mon;
          } else {
            // トップページやカテゴリ外ページ：通常の月別アーカイブリンク
            $link = get_month_link($year, $mon);
          }

          echo '<li><a href="' . esc_url($link) . '">' . esc_html($year . '年' . $mon . '月') . '</a></li>';
        }
        ?>
      </ul>
    </section>

  <?php else : ?>

    <!-- ▼技術ブログ（works）のときに表示するサイドバー -->
    <section class="sidebar-section">
      <h2 class="sidebar-title">技術ブログカテゴリー</h2>
      <ul class="sidebar-list">
        <?php
        $tech_category = get_categories([
          'hide_empty' => 0,
          'include'    => get_cat_ID('tech')
        ]);

        foreach ($tech_category as $cat) {
          $url = get_post_type_archive_link('works'); // 技術ブログ一覧ページ（/works）
          echo '<li><a href="' . esc_url($url) . '">' . esc_html($cat->name) . '</a></li>';
        }
        ?>
      </ul>
    </section>

    <section class="sidebar-section">
      <h2 class="sidebar-title">技術ブログアーカイブ（月別）</h2>
      <ul class="sidebar-list">
        <?php
        global $wpdb;
        $months = $wpdb->get_results("
          SELECT DISTINCT YEAR(post_date) AS year, MONTH(post_date) AS month
          FROM $wpdb->posts
          WHERE post_type = 'works' AND post_status = 'publish'
          ORDER BY post_date DESC
        ");

        foreach ($months as $month) {
          $year = $month->year;
          $mon  = sprintf('%02d', $month->month);
          $url  = get_post_type_archive_link('works') . '?w_year=' . $year . '&w_month=' . $mon;
          echo '<li><a href="' . esc_url($url) . '">' . esc_html($year . '年' . $mon . '月') . '</a></li>';
        }
        ?>
      </ul>
    </section>

  <?php endif; ?>
</aside>
