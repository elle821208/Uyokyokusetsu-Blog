<!-- 今回のmanu.php(カスタム固定ページ)はvs-codeの「page-menu.php(page-スタッグ名)」で読み込んでいる。 -->
<?php get_header();/*これでヘッダーを読み込む*/?>
<!--page-menu.phpでカスタマイズ-->
<h3>↓↓↓今回下記はpage-menu.php(カスタム用の固定ページ)で読み込んでいる。</h3>
 <main> 
    <h1><?php the_title();?></h1><!--wpの固定ページのタイトルを読み込む-->
    <?php the_content(); ?><!--wpの固定ページの中身を読み込む-->
    <h2>メニューページタイトルです。←page-menu.php(カスタム用の固定ページ)で読み込んだ</h2>
    <P>コンテンツはエディタで作りますよ。←page-menu.php(カスタム用の固定ページ)で読み込んだ</P>
 </main>
<?php get_footer();/*これでを読み込む*/?>
