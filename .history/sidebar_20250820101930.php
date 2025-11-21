<?php
/*
 * ファイル名: sidebar.php
 * 役割: サイトの横に出てくる「サイドバー」を表示するテンプレート
 * どのページに影響するの？ → 全ページに表示される可能性があります。
 * 例: トップページ（/）、記事ページ（/2025/07/◯◯）、カテゴリー一覧（/category/◯◯）、技術ブログ（/works）など
 *
 * ★ここまでのポイント★
 * - sidebar.php は「サイドバーの見た目」と「表示内容」を決めるテンプレート
 * - PHP で条件分岐を使い、雑記ブログと技術ブログで表示内容を切り替えています
 */
?>

<?php
/*
 * ▼sidebar全体の <aside> タグにクラスを追加
 * 1. .custom-sidebar → 既存のサイドバー用スタイル
 * 2. .content-wrapper → 本文幅に合わせるため、最大幅1000px・左右余白16pxに統一
 *
 * ★追加ポイント★
 * - 横幅・フォントサイズ・行間は CSS 側で .content-wrapper を使用して統一
 * - archive ページ本文幅に合わせたデザインになります
 */
?>
<aside id="sidebar" class="custom-sidebar content-wrapper">

  <?php
  /*
   * ▼ここは「どのサイドバーを表示するか」を決める条件分岐
   * - if 文の意味: 「もし〜だったらこの中の処理をやってね！」という命令
   * - この場合: 「もし技術ブログ（works）ページでなければ雑記ブログ用サイドバーを表示」
   */
  ?>
  <?php if (!is_post_type_archive('works') && get_post_type() !== 'works' && !is_singular('works')) : ?>

    <!-- ▼雑記ブログカテゴリー表示 -->
    <section class="sidebar-section">
      <h2 class="sidebar-title">雑記ブログカテゴリー</h2>
      <ul class="sidebar-list">
        <?php
        /*
         * get_categories() 関数でカテゴリー一覧を取得
         * hide_empty = 0 → 記事がなくても表示
         * exclude → tech と zakki は表示しない
         */
        $zakki_categories = get_categories([
          'hide_empty' => 0,
          'exclude'    => [get_cat_ID('tech'), get_cat_ID('zakki')]
        ]);

        // 取得したカテゴリーを順番にループしてリンク付きで表示
        foreach ($zakki_categories as $cat) {
          $url = get_category_link($cat->term_id); // カテゴリーURLを取得
          // echo で画面に出力。esc_url() は安全なURLに変換、esc_html() は文字を安全に表示
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
        global $wpdb; // データベースにアクセスするための変数

        // 現在のカテゴリー情報を取得
        $current_category = get_queried_object();
        $category_id = '';

        if ($current_category && isset($current_category->term_id)) {
          $category_id = $current_category->term_id;
        }

        /*
         * SQL で投稿の年月を取得
         * DISTINCT → 重複を除く
         * INNER JOIN → 関連するテーブルをつなげる
         * t.slug != 'tech' → 技術ブログは除外
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
            AND t.slug != 'tech'
          ORDER BY p.post_date DESC
        ");

        // 取得した年月をループしてリンク表示
        foreach ($months as $month) {
          $year = $month->year;
          $mon  = sprintf('%02d', $month->month); // 月を2桁に整形（例: 7 → 07）

          if ($category_id) {
            // カテゴリー別アーカイブリンク作成
            $link = get_category_link($category_id) . '?year=' . $year . '&monthnum=' . $mon;
          } else {
            // 月別アーカイブリンク作成
            $link = get_month_link($year, $mon);
          }

          // echo でリンクを表示
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
          $url = get_post_type_archive_link('works'); // /works アーカイブURL取得
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

        // 技術ブログ（works）の年月を重複なしで取得
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

          // /works に ?w_year=XXXX&w_month=XX をつけてリンク作成
          $url  = get_post_type_archive_link('works') . '?w_year=' . $year . '&w_month=' . $mon;
          echo '<li><a href="' . esc_url($url) . '">' . esc_html($year . '年' . $mon . '月') . '</a></li>';
        }
        ?>
      </ul>
    </section>

  <?php endif; ?>
</aside>
