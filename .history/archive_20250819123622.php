<?php
/*
 * ファイル名: archive.php
 * 役割: 雑記ブログの記事を一覧表示するページのテンプレート
 */

get_header();
?>

<main>
    <!-- プロフィールページと同じ横幅になるように post-content を使用 -->
    <section class="post-content">
        <!-- ページタイトル（条件に応じて変わる） -->
        <h1 class="entry-title">
            <?php
            if (is_category()) {
                single_cat_title();
                echo ' 雑記ブログ投稿一覧';
            } elseif (get_query_var('year') && get_query_var('monthnum')) {
                $year  = get_query_var('year');
                $month = get_query_var('monthnum');
                echo esc_html($year) . '年' . esc_html($month) . '月 の雑記ブログ投稿一覧';
            } else {
                echo '最新の雑記ブログ投稿一覧';
            }
            ?>
        </h1>

        <!-- 投稿ループ（記事があるかどうか調べて表示） -->
        <?php if (have_posts()): ?>
            <?php while (have_posts()): the_post(); ?>
                <article class="archive-item">
                    <h2 class="archive-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    <p class="archive-meta">
                        投稿日: <?php the_time('Y年n月j日'); ?> |
                        カテゴリ: <?php the_category(', '); ?>
                    </p>
                </article>
            <?php endwhile; ?>
        <?php else: ?>
            <p>この記事カテゴリにはまだ投稿がありません。</p>
        <?php endif; ?>
    </section>

    <!-- 共通のCTAをここに呼び込む -->
    <?php get_template_part('template-parts/content', 'cta'); ?>
</main>

<?php get_footer(); ?>
