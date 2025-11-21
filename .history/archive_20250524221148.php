<!---アキユキ デモ付き！WordPressの使い方を根本的に理解するための仕組み解説！32:13--->
<!--https://www.youtube.com/watch?v=y9kvRWu8rE4-->


<?php get_header();/*これでヘッダーを読み込む*/?>
  <div id='content'>
     <div id='main'>
     <h1>雑記ブログ一覧</h1>
        <?php
          // ▼ここで「zakki」というスラッグのカテゴリの記事だけを取得する
    $args = array(
      'category_name' => 'zakki', // ←カテゴリースラッグが 'zakki' であることを確認
      'posts_per_page' => 10      // 表示件数（必要に応じて変更）
    );
    $zakki_query = new WP_Query($args); // ←独自クエリを作成

        ?>


        <?php if(have_posts()): while(have_posts()) : the_post(); ?>
           <div class="title"><a href="<?php the_permalink()?>"><?php the_title();?></a></div>

        <?php endwhile; ?>
        <?php else : ?>
        <?php endif; ?>
     </div>
     <!-- ↓↓↓  archive.phpのget_sidebarでsidebar.php(今回はファイルを作成していないのでデフォルト値)を読み込んだ -->
     <?php get_sidebar();?>
  </div>

<?php get_footer();/*これでフッターを読み込む*/ ?>