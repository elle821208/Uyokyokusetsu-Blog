



<!--WordPressクラシックテーマ作成！実践編。
HTMLサイトWordPress化の手順大公開！保存版
37:11～-->
<!--https://www.youtube.com/watch?v=Tv8FaSWi-tY&t=1672s-->



<!--↓固定ページ（page.phpで読み込む）-->
<h3>↓↓↓ 固定ページ用のヘッダー（page.phpのget_headerで読み込む）</h3>
<h3 style="color: #3498db;">↓↓↓header.phpのbloginfoでwpサイトタイトル（wpの一般設定より）を読み込む。</h3>

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