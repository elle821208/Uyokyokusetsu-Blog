<?php
/*
 * ファイル名: archive.php
 * 役割: 通常投稿（postタイプ）のカテゴリーページやアーカイブページを表示するテンプレートファイルです。
 * 影響するページURL:
 *   - https://あなたのサイト.com/blog/             ← カテゴリ未指定：最新の雑記投稿10件
 *   - https://あなたのサイト.com/category/mindset/  ← mindsetカテゴリの投稿一覧
 *   - https://あなたのサイト.com/category/mindset/?year=2025&monthnum=07 ← mindsetカテゴリの2025年7月投稿だけ表示
 */

get_header(); // サイト上部（共通ヘッダー）を読み込む。影響ファイル：header.php
?>

<div id='content'> <!-- サイト全体のメインコンテンツ部分 -->

  <div id='main'> <!-- 左側のメインカラム：記事一覧が表示される -->

    <!-- ▼タイトル部分の表示 -->
    <h1>
      <?php
      if (is_category()) {
        // ▼カテゴリページなら → カテゴリ名を表示（例：mindset）
        single_cat_title();
        echo ' 雑記ブログ投稿一覧';
      } elseif (isset($_GET['year']) && isset($_GET['monthnum'])) {
        // ▼年月絞り込みだけなら → 年月タイトルを表示
        echo esc_html($_GET['year']) . '年' . esc_html($_GET['monthnum']) . '月 の雑記ブログ投稿一覧';
      } else {
        // ▼カテゴリ未指定（/blogなど）なら → 一般的な見出し
        echo '最新の雑記ブログ投稿一覧';
      }
      ?>
    </h1>

    <?php
    /*
     * ▼techカテゴリを除外するためにtechカテゴリのIDを取得
     * 影響ファイル: archive.php
     */
    $tech_cat = get_category_by_slug('tech');
    $tech_cat_id = $tech_cat ? $tech_cat->term_id : 0;

    // ▼投稿取得の初期条件を定義（通常投稿・日付順）
    $args = array(
      'post_type' => 'post',   // 通常投稿（postタイプ）のみ
      'orderby'   => 'date',   // 投稿日順
      'order'     => 'DESC',   // 新しい順
    );

    /*
     * ▼カテゴリーページかどうかを判定して条件を追加
     * 影響ページ: /category/◯◯/
     */
    if (is_category()) {
      // ▼現在表示中のカテゴリオブジェクトを取得
      $current_category = get_queried_object();
      $category_id = isset($current_category->term_id) ? $current_category->term_id : null;

      // ▼techカテゴリ以外の場合のみ、そのカテゴリIDで絞り込み
      if ($category_id && $category_id != $tech_cat_id) {
        $args['tax_query'][] = array(
          'taxonomy' => 'category',
          'field'    => 'term_id',
          'terms'    => $category_id,
        );
      }

      $args['posts_per_page'] = -1; // カテゴリーページは全件表示（ページ分割しない）

    } else {
      // ▼カテゴリ未指定の /blog/ アーカイブのとき → techカテゴリは除外
      $args['category__not_in'] = array($tech_cat_id);
      $args['posts_per_page'] = 10; // 最新10件だけ表示
    }

    /*
     * ▼共通処理：URLに ?year=◯◯◯◯&monthnum=◯◯ がある場合、年月で絞り込む
     * 例: /category/mindset/?year=2025&monthnum=07
     */
    if (isset($_GET['year']) || isset($_GET['monthnum'])) {
      $year = isset($_GET['year']) ? intval($_GET['year']) : null;
      $month = isset($_GET['monthnum']) ? intval($_GET['monthnum']) : null;

      $date_query = array(); // 年月の条件を定義
      if ($year)  $date_query['year']  = $year;
      if ($month) $date_query['month'] = $month;

      $args['date_query'][] = $date_query; // 年月での絞り込みを追加
    }

    // ▼投稿取得開始
    $query = new WP_Query($args);

    if ($query->have_posts()):
      while ($query->have_posts()): $query->the_post(); ?>
        <div class="title">
          <!-- ▼記事タイトルとリンク -->
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br>

          <!-- ▼投稿日 -->
          <small>投稿日: <?php the_time('Y年n月j日'); ?></small><br>

          <!-- ▼記事のカテゴリ名 -->
          <small>カテゴリ: <?php the_category(', '); ?></small>
        </div>
      <?php endwhile;
      wp_reset_postdata();
    else: ?>
      <!-- ▼投稿がない場合の表示 -->
      <p>この記事カテゴリにはまだ投稿がありません。</p>
    <?php endif; ?>

  </div>

  <!-- ▼サイドバー読み込み（影響ファイル: sidebar.php） -->
  <?php get_sidebar(); ?>

</div>

<?php
// ▼フッター部分（footer.php）を読み込む
get_footer();
?>
