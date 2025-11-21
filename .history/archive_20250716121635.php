<?php
/*
 * ファイル名: archive.php
 * 役割: 通常投稿（postタイプ）のカテゴリーページやアーカイブページを表示するテンプレートファイル
 */
get_header();
?>

<div id="content">
  <div id="main">
    <h1>
      <?php
      if (is_category()) {
        single_cat_title();
        echo ' 雑記ブログ投稿一覧';
      } elseif (get_query_var('year') && get_query_var('monthnum')) {
        echo esc_html(get_query_var('year')) . '年' . esc_html(get_query_var('monthnum')) . '月 の雑記ブログ投稿一覧';
      } else {
        echo '最新の雑記ブログ投稿一覧';
      }
      ?>
    </h1>

    <?php if (have_posts()): while (have_posts()): the_post(); ?>
      <div class="title">
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br>
        <small>投稿日: <?php the_time('Y年n月j日'); ?></small><br>
        <small>カテゴリ: <?php the_category(', '); ?></small>
      </div>
    <?php endwhile; else: ?>
      <p>この記事カテゴリにはまだ投稿がありません。</p>
    <?php endif; ?>
  </div>

  <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
