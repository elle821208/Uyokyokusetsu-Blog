
<?php get_header(); ?>
<main>
    <section>
        <p><?php echo get_the_date();?></p><!--wpの投稿の日付を読み込む。index.phpにも設定する。-->
        <h2><?php the_title(); /*wpの投稿のタイトル文を読み込む。index.phpにも設定する。*/?></h2>
    </section>
    <section class="post-content">
    <?php the_content(); ?>
    </section>

    <section>
        （※※※wpのニュース投稿一覧の下部）全ページ表示したい広告を入れる場所CTA(vscodeのsingle.php)
    </section>
</main>
<?php get_footer(); ?>