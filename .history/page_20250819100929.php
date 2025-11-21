<?php get_header(); ?>

<main>
    <section class="post-content">
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <?php
        while ( have_posts() ) :
            the_post();
            the_content();
        endwhile;
        ?>
    </section>

    <!-- 共通のCTAを呼び出し（必要な場合） -->
    <?php get_template_part('template-parts/content', 'cta'); ?>
</main>

<?php get_footer(); ?>
