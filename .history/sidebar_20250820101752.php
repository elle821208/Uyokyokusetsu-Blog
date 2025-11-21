<?php
/*
 * ファイル名: sidebar.php
 * 役割: サイトの横に出てくる「サイドバー」を表示するためのテンプレートファイルです。
 * どのページに影響するの？ → 全ページに表示される可能性があります。
 * 例: トップページ（/）、ふつうのブログ記事（/2025/07/◯◯）、カテゴリー一覧ページ（/category/◯◯）、技術ブログ（/works）など
 */
?>

<?php
/*
 * ▼ここでは sidebar 全体の <aside> タグに
 *    既存のカスタムスタイル .custom-sidebar と、
 *    本文幅と横幅を揃える .content-wrapper を同時に付与しています。
 *
 * ▼追加コメント：
 * - <aside> に content-wrapper を追加
 * - archive ページ本文幅に合わせて最大幅1000px・左右余白16pxで表示可能
 * - 横幅・フォントサイズ・行間は CSS 側で .content-wrapper を使用して統一
 */
?>
<aside id="sidebar" class="custom-sidebar content-wrapper">

  <?php
  /*
   * ▼ここは「表示条件」を決める部分です。
   * 「このページは技術ブログ（works）ではないか？」をチェックしています。
   *
   * if 文の考え方：
   *  「もし〜だったら処理してね！」という意味です。
   *  ここでは、雑記ブログページの場合に雑記ブログ用のサイドバーを表示します。
   */
  ?>
  <?php if (!is_post_type_archive('works') && get_post_type() !== 'works' && !is_singular('works')) : ?>

    <!-- ▼雑記ブログ用カテゴリー一覧 -->
    <section class="sidebar-section">
      <h2 class="sidebar-title">雑記ブログカテゴリー</h2>
      <ul class="sidebar-list">
        <?php
        /*
         * get_categories(): WordPressのカテゴリー一覧を取得する関数
         * hide_empty = 0 → 記事がないカテゴリーも表示
         * exclude → tech と zakki は除外
         */
        $zakki_categories = get_categories([
          'hide_empty' => 0,
          'exclude'    => [get_cat_ID('tech'), get_cat_ID('zakki')]
        ]);

        // 取得したカテゴリーを順にループしてリンクを表示
        foreach ($zakki_categories as $cat) {
          $url = get_category_link($cat->term_id); // カテゴリーURL取得
          echo '<li><a href="' . esc_url($url) . '">' . esc_html($cat->name) . '</a></li>';
        }
        ?>
      </ul>
    </section>

    <!-- ▼雑記ブログ月別アーカイブ -->
    <section class="sidebar-section">
      <h2 class="sidebar-title">雑記ブログアーカイブ（月別）</h2>
      <ul class="sidebar-list">
        <?php
        global $wpdb; // WordPress データベースアクセス用のグローバル変数

        // 現在表示しているカテゴリー情報を取得
        $current_category = get_queried_object();
        $category_id = '';

        if ($current_category && isset($current_category->term_id)) {
          $category_id = $current_category->term_id;
        }

        // SQLで年月を重複なしで取得（techカテゴリは除外）
        $months = $wpdb->get_results("
          SELECT DISTINCT YEAR(p.post_date) AS year, MONTH(p.post_date) AS month
          FROM $wpdb->posts p
          INNER JOIN $wpdb->term_relationships tr ON p.ID = tr.object_id
          INNER JOIN $wpdb->term_taxonomy tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
          INNER JOIN $wpdb->terms t ON tt.term_id = t.term_id
          WHERE p.post_type = 'post'
            AND p.post_status = 'publish'
            AND tt.taxonomy = 'category'
            AND t.slug != 'tech'
          ORDER BY p.post_date DESC
        ");

        // 取得した年月をループしてリンク表示
        foreach ($months as $month) {
          $year = $month->year;
          $mon  = sprintf('%02d', $month->month); // 月を2桁に整形

          if ($category_id) {
            // カテゴリー別アーカイブリンク
            $link = get_category_link($category_id) . '?year=' . $year . '&monthnum=' . $mon;
          } else {
            // 月別アーカイブリンク
            $link = get_month_link($year, $mon);
          }

          echo '<li><a href="' . esc_url($link) . '">' . esc_html($year . '年' . $mon . '月の雑記ブログ') . '</a></li>';
        }
        ?>
      </ul>     
    </section>

  <?php else : ?>

    <!-- ▼技術ブログ（works）用サイドバー -->

    <!-- ▼技術ブログカテゴリー（tech）の表示 -->
    <section class="sidebar-section">
      <h2 class="sidebar-title">技術ブログカテゴリー</h2>
      <ul class="sidebar-list">
        <?php
        $tech_category = get_categories([
          'hide_empty' => 0,
          'include'    => get_cat_ID('tech')
        ]);

        foreach ($tech_category as $cat) {
          $url = get_post_type_archive_link('works'); // /works アーカイブページURL取得
          echo '<li><a href="' . esc_url($url) . '">' . esc_html($cat->name) . '</a></li>';
        }
        ?>
      </ul>
    </section>

    <!-- ▼技術ブログ月別アーカイブ -->
    <section class="sidebar-section">
      <h2 class="sidebar-title">技術ブログアーカイブ（月別）</h2>
      <ul class="sidebar-list">
        <?php
        global $wpdb;

        $months = $wpdb->get_results("
          SELECT DISTINCT YEAR(post_date) AS year, MONTH(post_date) AS month
          FROM $wpdb->posts
          WHERE post_type = 'works'
            AND post_status = 'publish'
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
