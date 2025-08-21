<?php
/*
 * ファイル名: sidebar.php
 * 役割: サイトの横に出てくる「サイドバー」を表示するためのテンプレートファイルです。
 * どのページに影響するの？ → 全ページに表示される可能性があります。
 * 例: トップページ（/）、ふつうのブログ記事（/2025/07/◯◯）、カテゴリー一覧ページ（/category/◯◯）、技術ブログ（/works）など
 */
?>

<aside id="sidebar" class="custom-sidebar">

  <?php
  /*
   * ▼ここは「表示条件」を決めるところです。
   * 「このページは技術ブログじゃない？」と聞いています。
   * 
   * ★超やさしい if 文の説明★
   * if（イフ）は「もし〜だったらやってね！」という意味の命令文です。
   * たとえば「もし雨だったら傘を持って行く」と同じように考えます。
   *
   * ここではこう聞いています：
   * 「もしこのページが技術ブログじゃなかったら（＝雑記ブログだったら）、雑記ブログ用のサイドバーを表示してね」
   */
  ?>
  <?php if (!is_post_type_archive('works') && get_post_type() !== 'works' && !is_singular('works')) : ?>

    <!-- ▼雑記ブログのときに表示するサイドバー（カテゴリー一覧） -->
    <section class="sidebar-section">
      <h2 class="sidebar-title">雑記ブログカテゴリー</h2>
      <ul class="sidebar-list">
        <?php
        /*
         * ▼get_categories(): WordPressの「カテゴリー一覧」を取ってくる関数です。
         * ▼設定内容：
         *   - hide_empty = 0 → 記事がないカテゴリーも表示します
         *   - exclude → tech（技術）と zakki（全体用）というカテゴリーは表示しません
         */
        $zakki_categories = get_categories([
          'hide_empty' => 0,
          'exclude'    => [get_cat_ID('tech'), get_cat_ID('zakki')]
        ]);

        // ▼それぞれのカテゴリーを順番に取り出して、リンク付きで表示
        foreach ($zakki_categories as $cat) {
          $url = get_category_link($cat->term_id); // そのカテゴリーのURLを取得
          echo '<li><a href="' . esc_url($url) . '">' . esc_html($cat->name) . '</a></li>';
        }
        ?>
      </ul>
    </section>

    <!-- ▼雑記ブログのときに表示するサイドバー（月別アーカイブ一覧） -->
    <section class="sidebar-section">
      <h2 class="sidebar-title">雑記ブログアーカイブ（月別）</h2>
      <ul class="sidebar-list">
        <?php
        global $wpdb; // WordPressのデータベースにアクセスするための特別な変数

        // ▼今、どのカテゴリーのページを見ているのかを取得します（例：mindsetなど）
        $current_category = get_queried_object();
        $category_id = '';

        // ▼ちゃんとカテゴリー情報があれば、そのIDを取得して使います
        if ($current_category && isset($current_category->term_id)) {
          $category_id = $current_category->term_id;
        }

        // ▼tech以外のふつうの記事から、年月だけを一覧で取ってきます（SQLという命令文を使っています）
        $months = $wpdb->get_results("
          SELECT DISTINCT YEAR(p.post_date) AS year, MONTH(p.post_date) AS month
          FROM $wpdb->posts p
          INNER JOIN $wpdb->term_relationships tr ON p.ID = tr.object_id
          INNER JOIN $wpdb->term_taxonomy tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
          INNER JOIN $wpdb->terms t ON tt.term_id = t.term_id
          WHERE p.post_type = 'post'
            AND p.post_status = 'publish'
            AND tt.taxonomy = 'category'
            AND t.slug != 'tech' -- 技術ブログは除きます
          ORDER BY p.post_date DESC
        ");

        // ▼年月ごとのリンクを作って表示する部分
        foreach ($months as $month) {
          $year = $month->year;
          $mon  = sprintf('%02d', $month->month); // 月は2桁にする（例：7→07）

          if ($category_id) {
            // ▼カテゴリー別でアーカイブを表示するためのリンクを作成
            $link = get_category_link($category_id) . '?year=' . $year . '&monthnum=' . $mon;
          } else {
            // ▼月別アーカイブだけのリンクを作成（例：/2025/07）
            $link = get_month_link($year, $mon);            
          }

          // ▼画面に年月別のリンクを表示
          echo '<li><a href="' . esc_url($link) . '">' . esc_html($year . '年' . $mon . '月の雑記ブログ') . '</a></li>';
        }
        ?>
      </ul>     
    </section>

  <?php else : ?>

    <!-- ▼ここからは「技術ブログ（works）」のときに表示するサイドバー -->
    <!-- 例：/works や /works/記事タイトル など -->

    <!-- ▼技術ブログ用のカテゴリー（tech）の表示 -->
    <section class="sidebar-section">
      <h2 class="sidebar-title">技術ブログカテゴリー</h2>
      <ul class="sidebar-list">
        <?php
        // techカテゴリだけを取得して表示
        $tech_category = get_categories([
          'hide_empty' => 0,
          'include'    => get_cat_ID('tech')
        ]);

        foreach ($tech_category as $cat) {
          $url = get_post_type_archive_link('works'); // /works のURLを取得
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
        global $wpdb; // WordPressのデータベースへアクセスするための変数

        // ▼技術ブログ（works）の年と月を重複なしで取得
        $months = $wpdb->get_results("
          SELECT DISTINCT
            YEAR(post_date) AS year,
            MONTH(post_date) AS month
          FROM $wpdb->posts
          WHERE post_type = 'works'
            AND post_status = 'publish'
          ORDER BY post_date DESC
        ");

        // ▼取得した年月ごとにループしてリンクを表示
        foreach ($months as $month) {
          $year = $month->year;
          $mon  = sprintf('%02d', $month->month);

          // ▼/works に ?w_year=XXXX&w_month=XX をつけてリンクにする
          $url  = get_post_type_archive_link('works') . '?w_year=' . $year . '&w_month=' . $mon;

          echo '<li><a href="' . esc_url($url) . '">' . esc_html($year . '年' . $mon . '月') . '</a></li>';
        }
        ?>
      </ul>
    </section>

  <?php endif; ?>
</aside>
