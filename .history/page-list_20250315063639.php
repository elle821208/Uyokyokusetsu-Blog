<h3>↓↓↓manu.phpはvs-codeのpage-menu.phpでカスタマイズできる</h3>
<?php get_header();/*これでヘッダーを読み込む*/?>
<!---->
 <main> 
    <h1><?php the_title();?></h1><!--wpの固定ページのタイトルを読み込む-->
    <?php the_content(); ?><!--wpの固定ページの中身を読み込む-->
    <h3>↓↓↓manu.phpはvs-codeのpage-menu.phpでカスタマイズできる</h3>
    <h2>メニューページタイトルです。</h2>
    <P>コンテンツはエディタで作りますよ。</P>
 </main>
 
<?php get_footer();/*これでを読み込む*/?>
