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

    <!-- CTAや注意書きの共通パーツを呼び出し -->
    <?php get_template_part('template-parts/content', 'cta'); ?>

</main>

<?php get_footer(); ?>
