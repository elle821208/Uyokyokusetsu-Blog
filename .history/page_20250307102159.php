
<!--↓固定ページ（page.phpで読み込む）-->
<h1>↓↓↓ 固定ページのヘッダー（page.phpで読み込む）</h1>

<?php get_header();/*これでヘッダーを読み込む*/?>
    
<main>
<h2>↓wpの固定ページのタイトルと文章（page.phpのthe_titleとthe_contentで読み込む）  </h2>
    <h1><?php the_title();?></h1><!--wpの固定ページのタイトルを読み込む-->
    <?php the_content(); ?><!--固定ページの中身を全部-->
</main>
<div class="add">
    （↓↓↓page.php(vscode)で作った文章 ※すべての固定ページにおいてpager.phpが優先して読み込まれる。）
    <br>ここに広告を入れる予定です。
    <br>ここに広告を入れる予定です。
    <br>ここに広告を入れる予定です。
    <br>ここに広告を入れる予定です。
    <br>ここに広告を入れる予定です。
    <br>ここに広告を入れる予定です。

</div>
<h2>↓page.phpでフッターを読み込む(※固定ページではpage.phpの内容が優先して読み込まれる。)    </h2>
<?php get_footer();/*これでフッターを読み込む*/ ?>