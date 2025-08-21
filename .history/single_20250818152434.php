<?php get_header(); ?>

<main>
    <section class="post-content">
        <!-- 投稿日 -->
        <p class="post-date"><?php echo get_the_date(); ?></p>

        <!-- 投稿タイトル -->
        <h1 class="entry-title"><?php the_title(); ?></h1>

        <!-- 投稿本文 -->
        <?php the_content(); ?>
    </section>

    <section>
        （※wpのニュース投稿一覧の下部）全ページ表示したい広告を入れる場所CTA(vscodeのsingle.php)
    </section>
</main>

<?php get_footer(); ?>
