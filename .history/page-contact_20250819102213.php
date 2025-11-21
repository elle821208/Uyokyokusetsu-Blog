<?php
/* 
Template Name: Contact Page
固定ページ「お問い合わせ」専用テンプレート
*/
get_header(); 
?>

<main>
    <section class="post-content">
        <!-- ページタイトル -->
        <h1 class="entry-title"><?php the_title(); ?></h1>

        <!-- 固定ページ本文（お問い合わせフォームなど） -->
        <?php
        while ( have_posts() ) :
            the_post();
            the_content();
        endwhile;
        ?>
    </section>

    <!-- 共通のCTAパーツを呼び出し -->
    <?php get_template_part('template-parts/content', 'cta'); ?>
</main>

<?php get_footer(); ?>
