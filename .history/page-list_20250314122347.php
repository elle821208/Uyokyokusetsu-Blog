<?php get_header();/*これでヘッダーを読み込む*/?>
<!---->
<main>
    <h1><?php the_title();?></h1><!--wpの固定ページのタイトルを読み込む-->
    <h3>※※※page.php(vscodeで作成した固定ページのひな形)のthe_titleとthe_contentでwpのタイトルと中身を読み込んでいる。</h3>
    <?php the_content(); ?><!--wpの固定ページの中身を読み込む-->
    <h3>↓↓↓vs-codeのpage-menu.phpより</h3>
    <h2>メニューページタイトルです。</h2>
    <P>コンテンツはエディタで作りますよ。</P>
 </main>
 
<?php get_footer();/*これでを読み込む*/?>