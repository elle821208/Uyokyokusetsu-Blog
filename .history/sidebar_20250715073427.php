<?php
/*
 * ファイル名: sidebar.php
 * 役割: サイトのサイドバー（画面右側などに表示される補助的なコンテンツ部分）を表示するためのファイルです。
 * 影響するページ: WordPressサイト内のすべてのページ（header.php や index.php などからこのファイルが読み込まれます）
 */
?>

<!-- サイドバーの全体を囲むタグ。CSSでスタイリングするためにIDとクラスが付いています -->
<aside id="sidebar" class="custom-sidebar">

  <?php
  // ▼【条件説明】
  // 「通常の投稿（雑記ブログ）」を表示しているときにだけ、以下の処理を実行します。
  // 「通常投稿」とは、WordPressの基本的な投稿（カスタム投稿タイプではない）を指します。

  // ▼【影響するページ】
  // トップページ（front-page.php または index.php）
  // カテゴリーページ（category.php）
  // 通常の投稿ページ（single.php）など

  // ▼【この if 文の目的】
  // tech や works という「技術ブログ」ではないときに、雑記用のサイドバーを表示するための条件分岐です。
  ?>
  <?php if (!is_post_type_archive('works') && get_post_type() !== 'works' && !is_singular('works')) : ?>

    <!-- ▼雑記ブログカテゴリーを表示するセクション -->
    <section class="sidebar-section">
      <h2 class="sidebar-title">雑記ブログカテゴリー</h2>
      <ul class="sidebar-list">
        <?php
        // ▼「techカテゴリ」と「zakkiカテゴリ」は技術系・親カテゴリのため、除外します
        $zakki_categories = get_categories([
          'hide_empty' => 0, // 投稿数が0のカテゴリも含めて取得
          'exclude'    => [get_cat_ID('tech'), get_cat_ID('zakki')] // 除外するカテゴリID
        ]);

        // ▼カテゴリ一覧を表示（リンク形式）
        foreach ($zakki_categories as $cat) {
          // 各カテゴリのリンクURLを取得
          $url = get_category_link($cat->term_id);
          // リンクをリスト形式で出力（HTML）
          echo '<li><a href="' . esc_url($url) . '">' . esc_html($cat->name) . '</a></li>';
        }
        ?>
      </ul>
    </section>

    <!-- ▼雑記ブログの月別アーカイブリンク表示セクション -->
    <section class="sidebar-section">
      <h2 class="sidebar-title">雑記ブログアーカイブ（月別）</h2>
      <ul class="sidebar-list">
        <?php
        global $wpdb; // WordPressのデータベースにアクセスするための変数

        // ▼現在表示中のカテゴリ情報を取得（例：mindsetカテゴリ）
        $current_category = get_queried_object();
        $category_id = ''; // 初期状態ではカテゴリIDは空にしておく

        // ▼現在のページがカテゴリページなら、そのIDを取得
        if ($current_category && isset($current_category->term_id)) {
          $category_id = $current_category->term_id;
        }

        // ▼techカテゴリを除いた通常投稿（post）から、年月を重複なく取得
        $months = $wpdb->get_results("
          SELECT DISTINCT YEAR(p.post_date) AS year, MONTH(p.post_date) AS month
          FROM $wpdb->posts p
          INNER JOIN $wpdb->term_relationships tr ON p.ID = tr.object_id
          INNER JOIN $wpdb->term_taxonomy tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
          INNER JOIN $wpdb->terms t ON tt.term_id = t.term_id
          WHERE p.post_type = 'post'                  -- 通常投稿のみ
            AND p.post_status = 'publish'             -- 公開済みのみ
            AND tt.taxonomy = 'category'              -- 投稿の分類がカテゴリであること
            AND t.slug != 'tech'                      -- techカテゴリは除外（技術ブログ用）
          ORDER BY p.post_date DESC                   -- 日付が新しい順に並べる
        ");

        // ▼取得した年月ごとにリンクを生成
        foreach ($months as $month) {
          $year = $month->year; // 例：2025
          $mon  = sprintf('%02d', $month->month); // 例：07（2桁表記）
          $link = get_month_link($year, $mon); // その月のアーカイブページURL

          // ▼カテゴリページ上であれば、そのカテゴリIDをURLに追加（絞り込みのため）
          if ($category_id) {
            $link .= '?cat=' . $category_id;
          }

          // ▼月リンクを出力（例：2025年07月）
          echo '<li><a href="' . esc_url($link) . '">' . esc_html($year . '年' . $mon . '月') . '</a></li>';
        }
        ?>
      </ul>
    </section>

  <?php else : ?>

    <!-- ▼技術ブログを表示しているときだけ、以下の内容を表示 -->

    <!-- ▼技術ブログ用のカテゴリー（「tech」）表示セクション -->
    <section class="sidebar-section">
      <h2 class="sidebar-title">技術ブログカテゴリー</h2>
      <ul class="sidebar-list">
        <?php
        // ▼techカテゴリだけを取得（表示するのは一つ）
        $tech_category = get_categories([
          'hide_empty' => 0,
          'include'    => get_cat_ID('tech')
        ]);

        foreach ($tech_category as $cat) {
          // 技術ブログのアーカイブページ（archive-works.php）へのリンクを出力
          $url = get_post_type_archive_link('works');
          echo '<li><a href="' . esc_url($url) . '">' . esc_html($cat->name) . '</a></li>';
        }
        ?>
      </ul>
    </section>

    <!-- ▼技術ブログの月別アーカイブ表示 -->
    <section class="sidebar-section">
      <h2 class="sidebar-title">技術ブログアーカイブ（月別）</h2>
      <ul class="sidebar-list">
        <?php
        global $wpdb; // DBアクセス準備

        // ▼カスタム投稿タイプ「works」の年月別一覧を取得
        $months = $wpdb->get_results("
          SELECT DISTINCT YEAR(post_date) AS year, MONTH(post_date) AS month
          FROM $wpdb->posts
          WHERE post_type = 'works' AND post_status = 'publish'
          ORDER BY post_date DESC
        ");

        // ▼年月ごとにリンクを作成して表示
        foreach ($months as $month) {
          $year = $month->year;
          $mon  = sprintf('%02d', $month->month); // 2桁の月
          $url  = get_post_type_archive_link('works') . '?w_year=' . $year . '&w_month=' . $mon;

          echo '<li><a href="' . esc_url($url) . '">' . esc_html($year . '年' . $mon . '月') . '</a></li>';
        }
        ?>
      </ul>
    </section>

  <?php endif; ?>
</aside>
