<?php
/*
 * ファイル名: sidebar.php
 * 役割: サイトのサイドバー（補助情報・リンクなど）を表示するためのテンプレート。
 * 読み込まれるページ: header.phpやindex.phpなどから全ページで使用される。
 * 影響を受ける代表的なURL:
 *   - トップページ: /（index.php、front-page.php）
 *   - 通常投稿の一覧: /category/◯◯（category.php）
 *   - 通常投稿の個別ページ: /2025/07/◯◯（single.php）
 *   - 技術ブログ一覧: /works（archive-works.php）
 *   - 技術ブログ記事ページ: /works/◯◯（single-works.php）
 */
?>

<!-- ▼サイドバー全体を囲むHTMLタグ -->
<aside id="sidebar" class="custom-sidebar">

  <?php
  /*
   * ▼条件分岐: 技術ブログ（カスタム投稿タイプ「works」）でない場合にだけ実行
   * ▼影響するページURL例:
   *   - /（トップページ）
   *   - /category/◯◯（雑記カテゴリ）
   *   - /2025/07/◯◯（通常投稿）
   * ▼関係するテンプレート: index.php, front-page.php, category.php, single.php
   */
  ?>
  <?php if (!is_post_type_archive('works') && get_post_type() !== 'works' && !is_singular('works')) : ?>

    <!-- ▼雑記ブログ用カテゴリーリスト表示 -->
    <section class="sidebar-section">
      <h2 class="sidebar-title">雑記ブログカテゴリー</h2>
      <ul class="sidebar-list">
        <?php
        /*
         * ▼get_categories():
         * WordPressの全カテゴリーから「tech」と「zakki」カテゴリを除外して取得
         * ▼影響するファイル: sidebar.php
         * ▼影響するページ: 通常投稿一覧やトップページ
         */
        $zakki_categories = get_categories([
          'hide_empty' => 0, // 投稿数が0のカテゴリも表示する
          'exclude'    => [get_cat_ID('tech'), get_cat_ID('zakki')] // techカテゴリ（技術）とzakkiカテゴリを除外
        ]);

        // ▼取得した各カテゴリについて処理を繰り返す
        foreach ($zakki_categories as $cat) {
          $url = get_category_link($cat->term_id); // 該当カテゴリのURLを取得
          echo '<li><a href="' . esc_url($url) . '">' . esc_html($cat->name) . '</a></li>'; // HTML形式で出力
          /*
           * ▼出力例: <li><a href="https://example.com/category/mindset">mindset</a></li>
           * ▼影響するファイル: sidebar.php
           * ▼影響するページ: 雑記のカテゴリページ（category.php）
           */
        }
        ?>
      </ul>
    </section>

    <!-- ▼雑記ブログ用 月別アーカイブリンク表示 -->
    <section class="sidebar-section">
      <h2 class="sidebar-title">雑記ブログアーカイブ（月別）</h2>
      <ul class="sidebar-list">
        <?php
        global $wpdb; // WordPressのデータベースに直接アクセスするためのオブジェクト

        // ▼現在表示中のカテゴリオブジェクトを取得（category.php のときに有効）
        $current_category = get_queried_object();
        $category_id = ''; // 初期化：絞り込み用カテゴリIDを空で用意

        // ▼カテゴリオブジェクトがあれば、そのID（数値）を取得して保存
        if ($current_category && isset($current_category->term_id)) {
          $category_id = $current_category->term_id;
          /*
           * ▼影響するファイル: sidebar.php
           * ▼影響するページ: /category/◯◯ のようなカテゴリページ（category.php）
           */
        }

        /*
         * ▼SQLで投稿データを直接取得（通常投稿postのうち techカテゴリ以外）
         * ▼取得する情報: 年と月（重複なし）
         * ▼影響するテンプレート: sidebar.php
         * ▼影響するページ: 通常投稿ページ（トップ、一覧、個別）
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
            AND t.slug != 'tech' -- techカテゴリは技術ブログなので除外
          ORDER BY p.post_date DESC
        ");

        // ▼取得した年月一覧を元にリンクを生成して表示
        foreach ($months as $month) {
          $year = $month->year;
          $mon  = sprintf('%02d', $month->month); // 1桁→2桁へ整形（例：7→07）
          $link = get_month_link($year, $mon); // WordPress標準関数で年月アーカイブリンクを生成

          // ▼現在がカテゴリページであれば、カテゴリIDで絞り込むためURL末尾に追加
          if ($category_id) {
            $link .= '?cat=' . $category_id;
            /*
             * ▼例: https://example.com/2025/07/?cat=3
             * ▼影響するテンプレート: archive.php（年月×カテゴリの絞り込み表示）
             */
          }

          // ▼年月リンクを出力（例：「2025年07月」）
          echo '<li><a href="' . esc_url($link) . '">' . esc_html($year . '年' . $mon . '月') . '</a></li>';
        }
        ?>
      </ul>
    </section>

  <?php else : // ▼ここからは技術ブログ（works）用のサイドバーを表示 ?>

    <!-- ▼技術ブログカテゴリー（tech）の表示 -->
    <section class="sidebar-section">
      <h2 class="sidebar-title">技術ブログカテゴリー</h2>
      <ul class="sidebar-list">
        <?php
        /*
         * ▼「tech」カテゴリを取得（技術ブログ専用）
         * ▼影響するページ: /works、/works/◯◯（技術ブログ一覧・詳細ページ）
         * ▼関係するテンプレート: archive-works.php, single-works.php
         */
        $tech_category = get_categories([
          'hide_empty' => 0,
          'include'    => get_cat_ID('tech') // techカテゴリIDのみ取得
        ]);

        foreach ($tech_category as $cat) {
          $url = get_post_type_archive_link('works'); // カスタム投稿タイプ works のアーカイブページURLを取得
          echo '<li><a href="' . esc_url($url) . '">' . esc_html($cat->name) . '</a></li>';
        }
        ?>
      </ul>
    </section>

    <!-- ▼技術ブログの月別アーカイブリンク表示 -->
    <section class="sidebar-section">
      <h2 class="sidebar-title">技術ブログアーカイブ（月別）</h2>
      <ul class="sidebar-list">
        <?php
        global $wpdb; // DBアクセス用オブジェクトを再度取得

        // ▼技術ブログ（投稿タイプ: works）の年月別リストを取得
        $months = $wpdb->get_results("
          SELECT DISTINCT YEAR(post_date) AS year, MONTH(post_date) AS month
          FROM $wpdb->posts
          WHERE post_type = 'works' AND post_status = 'publish'
          ORDER BY post_date DESC
        ");

        foreach ($months as $month) {
          $year = $month->year;
          $mon  = sprintf('%02d', $month->month); // 月を2桁で整形
          $url  = get_post_type_archive_link('works') . '?w_year=' . $year . '&w_month=' . $mon;
          /*
           * ▼例: https://example.com/works?w_year=2025&w_month=07
           * ▼影響するテンプレート: archive-works.php
           */

          echo '<li><a href="' . esc_url($url) . '">' . esc_html($year . '年' . $mon . '月') . '</a></li>';
        }
        ?>
      </ul>
    </section>

  <?php endif; ?>
</aside>
