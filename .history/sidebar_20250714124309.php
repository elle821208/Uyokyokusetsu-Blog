<?php
/*
 * ファイル名: sidebar.php
 * 役割: サイドバー部分のHTMLやPHPコードを記述するファイルです。
 * 影響するページ: WordPressの全ページ（このファイルは、header.php や index.php などから読み込まれます）
 */
?>

<aside id="sidebar" class="custom-sidebar">

  <?php
  // ▼【条件】表示しているページが通常の投稿（雑記ブログなど）の場合
  // ▼【影響ページ】トップページ（front-page.php、index.php）、カテゴリー一覧（category.php）、投稿ページ（single.php）など
  // ▼【影響ファイル】sidebar.php（このファイルそのもの）
  ?>
  <?php if (!is_post_type_archive('works') && get_post_type() !== 'works' && !is_singular('works')) : ?>
    <section class="sidebar-section">
      <h2 class="sidebar-title">雑記ブログカテゴリー</h2>
      <ul class="sidebar-list">
        <?php
        // ▼techカテゴリを除いた全カテゴリ（雑記ブログ用）を表示
        $zakki_categories = get_categories([
          'hide_empty' => 0,
          'exclude'    => [get_cat_ID('tech'), get_cat_ID('zakki')] // techカテゴリとzakkiカテゴリを除外
        ]);

        foreach ($zakki_categories as $cat) {
          // ▼クリックすると該当カテゴリの投稿一覧ページ（archive.php）が表示される
          $url = get_category_link($cat->term_id);
          echo '<li><a href="' . esc_url($url) . '">' . esc_html($cat->name) . '</a></li>';
        }
        ?>
      </ul>
    </section>





    
    <!-- ▼雑記ブログカテゴリーの年月別リンク表示 -->
<section class="sidebar-section">
  <h2 class="sidebar-title">雑記ブログアーカイブ（月別）</h2>
  <ul class="sidebar-list">

    <?php
    // ▼WordPressのデータベース操作用オブジェクトを使えるようにする
    global $wpdb;

    // ▼今見ているページが、特定のカテゴリページ（例：mindset）かどうかを確認し、
    // 　もしそうなら、そのカテゴリの「スラッグ（URLの一部）」を取得する
    $current_category = get_queried_object(); // 表示中のカテゴリ情報を取得
    $category_slug = ''; // 初期値は空（トップページなどカテゴリが不明な場合）

    if ($current_category && isset($current_category->slug)) {
      $category_slug = $current_category->slug; // 例：mindset や health など
    }

    // ▼「techカテゴリ」以外の投稿が属する年月をすべて取得
    // 　→ 同じ月が重複しないように、DISTINCT（重複排除）を使っている
    $months = $wpdb->get_results("
      SELECT DISTINCT YEAR(p.post_date) AS year, MONTH(p.post_date) AS month
      FROM $wpdb->posts p
      INNER JOIN $wpdb->term_relationships tr ON p.ID = tr.object_id
      INNER JOIN $wpdb->term_taxonomy tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
      INNER JOIN $wpdb->terms t ON tt.term_id = t.term_id
      WHERE p.post_type = 'post' -- 通常の投稿タイプ（雑記ブログ）
        AND p.post_status = 'publish' -- 公開済みの記事だけを対象
        AND tt.taxonomy = 'category' -- 投稿のカテゴリ情報を使う
        AND t.slug != 'tech' -- techカテゴリを除外（技術ブログなので除く）
      ORDER BY p.post_date DESC -- 新しい日付順で並べる
    ");

    // ▼取得した年月ごとに、リンクを出力するループ
    foreach ($months as $month) {
      $year = $month->year; // 例：2025
      $mon  = sprintf('%02d', $month->month); // 例：01〜12（2桁に変換）

      // ▼WordPressが自動で生成する年月アーカイブページのリンクを取得（例：https://example.com/2025/07）
      $link = get_month_link($year, $mon);

      // ▼現在表示しているカテゴリスラッグがあれば、URLに ?cat=〇〇 を追加する
      // 　→ これで「カテゴリ×月」で絞り込まれた表示になる
      if ($category_slug) {
        $link .= '?cat=' . $category_slug; // 例：https://example.com/2025/07?cat=mindset
      }

      // ▼HTMLのリンクとして出力（例：2025年07月）
      echo '<li><a href="' . esc_url($link) . '">' . esc_html($year . '年' . $mon . '月') . '</a></li>';
    }
    ?>

  </ul>
</section>







  <?php else : ?>

    <?php
    // ▼【条件】表示しているページが技術ブログ（カスタム投稿タイプ works）の場合
    // ▼【影響ページ】技術ブログの一覧ページ（archive-works.php）や個別記事ページ（single-works.php）
    // ▼【影響ファイル】sidebar.php（このファイルそのもの）
    ?>
    <!-- ▼技術ブログ用カテゴリー表示 -->
    <section class="sidebar-section">
      <h2 class="sidebar-title">技術ブログカテゴリー</h2>
      <ul class="sidebar-list">
        <?php
        // ▼カテゴリ「tech」のみを取得して表示
        $tech_category = get_categories([
          'hide_empty' => 0,
          'include'    => get_cat_ID('tech') // techカテゴリのみを取得
        ]);

        foreach ($tech_category as $cat) {
          // ▼クリックしたら「技術ブログ一覧ページ（archive-works.php）」に移動
          $url = get_post_type_archive_link('works') ;
          echo '<li><a href="' . esc_url($url) . '">' . esc_html($cat->name) . '</a></li>';
        }
        ?>
      </ul>
    </section>

    <!-- ▼技術ブログカテゴリーの年月別リンク表示 -->
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
