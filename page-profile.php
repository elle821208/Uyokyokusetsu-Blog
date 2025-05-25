<?php get_header();/*これでヘッダーを読み込む*/?>
 <main> 
    <h1><?php the_title();?></h1><!--wpの固定ページのタイトルを読み込む-->
    <?php the_content(); ?><!--wpの固定ページの中身を読み込む-->
    <h2>メニューページタイトルです。←page-profile.php(カスタム用の固定ページ)で読み込んだ</h2>
    <P>コンテンツはエディタで作りますよ。←page-profile.php(カスタム用の固定ページ)で読み込んだ</P>
 </main>
<?php get_footer();/*これでを読み込む*/?>
