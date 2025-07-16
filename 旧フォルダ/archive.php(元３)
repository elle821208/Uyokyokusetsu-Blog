<?php
/*
 * ファイル名: archive.php
 * 役割: 通常投稿（postタイプ）のカテゴリーページやアーカイブページを表示するテンプレートファイルです。
 */

get_header(); // サイト上部の共通ヘッダーを読み込む
?>

<div id='content'>
  <div id='main'>

    <h1>
      <?php
      if (is_category()) {
        single_cat_title();
        echo ' 雑記ブログ投稿一覧';
      } elseif (isset($_GET['year']) && isset($_GET['monthnum'])) {
        echo esc_html($_GET['year']) . '年' . esc_html($_GET['monthnum']) . '月 の雑記ブログ投稿一覧';
      } else {
        echo '最新の雑記ブログ投稿一覧';
      }
      ?>
    </h1>

    <?php
    // ▼techカテゴリを除外するための準備
    $tech_cat = get_category_by_slug('tech');
    $tech_cat_id = $tech_cat ? $tech_cat->term_id : 0;

    // ▼WP_Query用の初期引数
    $args = array(
      'post_type'      => 'post',
      'orderby'        => 'date',
      'order'          => 'DESC',
      'posts_per_page' => 10, // 後で上書きされる可能性あり
    );

    // ▼カテゴリと年月に応じて条件を追加
    $tax_query = array();  // カテゴリの条件
    $date_query = array(); // 年月の条件

    if (is_category()) {
      $current_category = get_queried_object();
      $category_id = isset($current_category->term_id) ? $current_category->term_id : 0;

      // techカテゴリ以外ならそのカテゴリを追加
      if ($category_id && $category_id != $tech_cat_id) {
        $tax_query[] = array(
          'taxonomy' => 'category',
          'field'    => 'term_id',
          'terms'    => $category_id,
        );
      }

      $args['posts_per_page'] = -1; // カテゴリーページは全件表示

    } else {
      // カテゴリ未指定の /blog/ ページ → techカテゴリは除外
      $args['category__not_in'] = array($tech_cat_id);
    }

    // ▼GETパラメータで年月が指定されている場合
    if (isset($_GET['year']) || isset($_GET['monthnum'])) {
      $year  = isset($_GET['year']) ? intval($_GET['year']) : null;
      $month = isset($_GET['monthnum']) ? intval($_GET['monthnum']) : null;

      if ($year)  $date_query['year']  = $year;
      if ($month) $date_query['month'] = $month;
    }

    // ▼必要に応じて tax_query を追加
    if (!empty($tax_query)) {
      $args['tax_query'] = array(
        'relation' => 'AND',
        ...$tax_query
      );
    }

    // ▼必要に応じて date_query を追加
    if (!empty($date_query)) {
      $args['date_query'] = array($date_query);
    }

    // ▼投稿を取得
    $query = new WP_Query($args);

    if ($query->have_posts()):
      while ($query->have_posts()): $query->the_post(); ?>
        <div class="title">
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br>
          <small>投稿日: <?php the_time('Y年n月j日'); ?></small><br>
          <small>カテゴリ: <?php the_category(', '); ?></small>
        </div>
      <?php endwhile;
      wp_reset_postdata();
    else: ?>
      <p>この記事カテゴリにはまだ投稿がありません。</p>
    <?php endif; ?>

  </div>

  <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
