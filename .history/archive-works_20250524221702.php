<!---アキユキ デモ付き！WordPressの使い方を根本的に理解するための仕組み解説！32:13--->
<!--https://www.youtube.com/watch?v=y9kvRWu8rE4-->


<<?php get_header(); /* これでヘッダーを読み込む */ ?>
<div id="content">
  <div id="main">
    <h1>技術ブログ一覧</h1>

    <?php
    // ▼「zakki」カテゴリ以外の記事を取得（技術カテゴリは複数でもOK）
    $args = array(
      'category__not_in' => array(get_cat_ID('zakki')), // ←「zakki」カテゴリを除外する
      'posts_per_page' => 10
    );
    $tech_query = new WP_Query($args);
    ?>

    <?php if ($tech_query->have_posts()): ?>
      <?php while ($tech_query->have_posts()): $tech_query->the_post(); ?>
        <div class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
      <?php endwhile; ?>
    <?php else: ?>
      <p>技術ブログの記事はまだありません。</p>
    <?php endif; ?>

    <?php wp_reset_postdata(); // ←元のクエリに戻す（必須） ?>
  </div>

  <?php get_sidebar(); ?>
</div>
<?php get_footer(); /* これでフッターを読み込む */ ?>


