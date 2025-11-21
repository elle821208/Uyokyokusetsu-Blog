<?php
/* 
Template Name: Profile Page
固定ページ「プロフィール」専用テンプレート
*/

get_header(); 
?>

<main>
    <section class="post-content">
        <!-- 固定ページタイトル -->
        <h1 class="entry-title"><?php the_title(); ?></h1>

        <!-- 固定ページ本文 -->
        <?php
        while ( have_posts() ) :
            the_post();
            the_content();
        endwhile;
        ?>
    </section>

    <!-- 共通の注意書きや広告（CTAパーツ）を呼び出し -->
    <?php get_template_part('template-parts/content', 'cta'); ?>
</main>

<?php get_footer(); ?>
