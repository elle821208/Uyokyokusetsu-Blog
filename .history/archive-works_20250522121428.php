<!---アキユキ デモ付き！WordPressの使い方を根本的に理解するための仕組み解説！32:13--->
<!--https://www.youtube.com/watch?v=y9kvRWu8rE4-->


<?php get_header();/*これでヘッダーを読み込む*/?>
  <div id='content'>
     <div id='main'>    
        <h1>技術ブログ一覧</h1>
        <?php if(have_posts()): while(have_posts()) : the_post(); ?>
           <div class="title"><a href="<?php the_permalink()?>"><?php the_title();?></a></div>

        <?php endwhile; ?>
        <?php else : ?>
        <?php endif; ?>
     </div>
     ↓↓↓  archive-works.phpのget_sidebarでsidebar.php(今回はファイルを作成していないのでデフォルト値)を読み込んだ</h3>
     <?php get_sidebar();?>
  </div>

<?php get_footer();/*これでフッターを読み込む*/ ?>

