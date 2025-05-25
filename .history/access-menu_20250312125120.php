<h1>ニュース投稿single.phpへのリンク(archive.phpのメインループより)</h1><?php get_header();/*これでヘッダーを読み込む*/?>
<!---->
 <main>
    <h3>↓日付はwpの投稿より。のaccess-menu.php echo get_the_date を使って読み込む。</h3>
    <p><?php echo get_the_date();?></p><!--日付を読み込む-->
    <h2>あくせす（←access-menu.phpで作った）</h2>
    <P>あくせすあくせすあくせす（←access-menu.phpで作った）</P>
 </main>
<?php get_footer();/*これでを読み込む*/?>

