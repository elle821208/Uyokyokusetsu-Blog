<h3>↓↓↓今回のmanu.php(カスタム固定ページ)はvs-codeの「page-menu.php(page-スタッグ名)」で読み込んでいる。</h3>
<?php get_header();/*これでヘッダーを読み込む*/?>
<!---->
<h3>↓↓↓今回下記はpage-menu.php(カスタム用の固定ページ)で読み込んでいる。</h3>
 <main> 
    <h1><?php the_title();?></h1><!--wpの固定ページのタイトルを読み込む-->
    <?php the_content(); ?><!--wpの固定ページの中身を読み込む-->
    <h3>↓↓↓list.phpはvs-codeのpage-list.phpでカスタマイズできる</h3>
    <h2>メニューページタイトルです。</h2>
    <P>コンテンツはエディタで作りますよ。</P>
 </main>
 
<?php get_footer();/*これでを読み込む*/?>
