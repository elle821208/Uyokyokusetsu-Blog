<?php
/*
 * ファイル名: archive.php
 * 役割: 通常投稿（postタイプ）のカテゴリーページやアーカイブページを表示するテンプレートファイルです。
 * 影響するページURL:
 *   - https://あなたのサイト.com/category/mindset/
 *   - https://あなたのサイト.com/category/mindset/?year=2025&monthnum=07
 */

get_header(); // サイトの上部（共通ヘッダー）を表示する。影響ファイル：header.php
?>

<div id='content'> <!-- サイト全体のメインコンテンツ部分 -->

  <div id='main'> <!-- 左側のメインカラム：記事一覧が表示される -->

    <!-- ▼現在表示しているカテゴリ名を画面に表示（例: mindset） -->
    <h1>
      <?php
      // ▼年月指定があれば、年月付きタイトルを表示
      if (isset($_GET['year']) && isset($_GET['monthnum'])) {
        echo esc_html($_GET['year']) . '年' . esc_html($_GET['monthnum']) . '月 の雑記ブログ投稿一覧';
      } else {
        single_cat_title(); // カテゴリ名だけを表示
        echo ' 雑記ブログ投稿一覧';
      }
      ?>
    </h1>

    <?php
    /*
     * ▼【現在表示中のカテゴリ情報】を取得する関数
     * 例: /category/mindset/ にいる場合 → mindsetというカテゴリの情報が取れる
     */
    $current_category = get_queried_object();
    $category_id = isset($current_category->term_id) ? $current_category->term_id : null;

    /*
     * ▼【URLの年月指定】があるかどうか確認
     * - 例: /category/mindset/?year=2025&monthnum=07 のような場合
     */
    $year     = isset($_GET['year']) ? intval($_GET['year']) : null;
    $monthnum = isset($_GET['monthnum']) ? intval($_GET['monthnum']) : null;

    /*
     * ▼techカテゴリを除外するために、techのIDを取得
     */
    $tech_cat = get_category_by_slug('tech');

    /*
     * ▼投稿の取得条件（WP_Queryで使う）
     * - 通常投稿（post）
     * - 表示中のカテゴリ（$category_id）に属している
     * - techカテゴリを除外
     * - 年月が指定されていれば、絞り込みに使う
     */
    $args = array(
      'post_type'      => 'post',          // 通常の投稿
      'posts_per_page' => -1,              // すべて取得
      'orderby'        => 'date',
      'order'          => 'DESC',
      'category__in'   => array($category_id),               // 表示中のカテゴリ
      'category__not_in' => array($tech_cat->term_id),       // techカテゴリを除外
    );

    // ▼年月で絞り込みがあるときだけ追加
    if ($year)     $args['year']     = $year;
    if ($monthnum) $args['monthnum'] = $monthnum;

    // ▼投稿を取得
    $query = new WP_Query($args);

    if ($query->have_posts()):
      while ($query->have_posts()): $query->the_post(); ?>
        <div class="title">
          <!-- ▼記事タイトル -->
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br>

          <!-- ▼投稿日 -->
          <small>投稿日: <?php the_time('Y年n月j日'); ?></small><br>

          <!-- ▼カテゴリ名一覧 -->
          <small>カテゴリ: <?php the_category(', '); ?></small>
        </div>
      <?php endwhile;
      wp_reset_postdata();
    else: ?>
      <!-- ▼投稿がないときの表示 -->
      <p>この記事カテゴリにはまだ投稿がありません。</p>
    <?php endif; ?>

  </div>

  <!-- ▼サイドバーを読み込み（sidebar.phpに影響） -->
  <?php get_sidebar(); ?>

</div>

<?php
// ▼フッター（共通部分）を読み込み。影響ファイル: footer.php
get_footer();
?>
