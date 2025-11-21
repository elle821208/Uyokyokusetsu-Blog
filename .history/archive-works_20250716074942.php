<?php
/*
 * ファイル名: archive-works.php
 * 役割: 技術ブログ（カスタム投稿タイプ works）のアーカイブページテンプレート
 * 対象URL: /works または /works?w_year=2025&w_month=07
 */

get_header();
?>

<div id="content">
  <div id="main">

    <h1>
      <?php
      if (isset($_GET['w_year']) && isset($_GET['w_month'])) {
        echo esc_html($_GET['w_year']) . '年' . esc_html($_GET['w_month']) . '月 の技術ブログ投稿一覧';
      } else {
        echo '技術ブログ投稿一覧';
      }
      ?>
    </h1>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div class="title">
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br>
        <small>投稿日: <?php the_time('Y年n月j日'); ?></small><br>

        <?php
        // 投稿タイプ表示（識別用）
        $post_type = get_post_type();
        if ($post_type === 'post') {
          echo '<span style="color: gray;">[通常投稿：techカテゴリ]</span>';
        } elseif ($post_type === 'tech') {
          echo '<span style="color: blue;">[カスタム投稿：tech]</span>';
        } elseif ($post_type === 'works') {
          echo '<span style="color: green;">[カスタム投稿：works]</span>';
        }
        ?>
      </div>
    <?php endwhile; else : ?>
      <p>この期間の技術ブログの記事はありません。</p>
    <?php endif; ?>

  </div>

  <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
