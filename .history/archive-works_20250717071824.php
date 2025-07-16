<?php
/*
 * ファイル名: archive-works.php
 * 役割: カスタム投稿タイプ「works」（技術ブログ）のアーカイブページテンプレート
 * 対象URL: /works または /works?w_year=2025&w_month=07 など
 * 影響するページ: カスタム投稿タイプ works のアーカイブ一覧（技術ブログ一覧）
 * 使用テンプレート: archive-works.php（このファイル）
 */

get_header(); // サイトのヘッダー部分を読み込む（header.phpを実行）
?>

<div id="content">
  <div id="main">

    <!-- ▼ページのタイトル部分 -->
    <h1>
      <?php
      /*
       * ▼URLのパラメータに w_year と w_month がある場合は年月付きタイトルを表示
       *   例：/works?w_year=2025&w_month=07 のようにアクセスされたとき
       * ▼影響ページ: /works
       * ▼影響ファイル: archive-works.php（このファイル内）
       */
      if (isset($_GET['w_year']) && isset($_GET['w_month'])) {
        echo esc_html($_GET['w_year']) . '年' . esc_html($_GET['w_month']) . '月 の技術ブログ投稿一覧';
      } else {
        echo '技術ブログ投稿一覧';
      }
      ?>
    </h1>

    <!-- ▼技術ブログの投稿があれば表示（メインループ） -->
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div class="title">
        <!-- ▼記事タイトルとリンク -->
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br>

        <!-- ▼投稿日（年月日形式で表示） -->
        <small>投稿日: <?php the_time('Y年n月j日'); ?></small><br>

        <?php
        /*
         * ▼投稿タイプの表示（内容識別用のラベル）
         * ▼使用関数: get_post_type() → 投稿の種類を取得（post, tech, worksなど）
         * ▼影響ファイル: archive-works.php
         * ▼影響ページ: /works
         */
        $post_type = get_post_type();
        if ($post_type === 'post') {
          echo '<span style="color: gray;">[通常投稿：techカテゴリ]</span>';
        } elseif ($post_type === 'tech') {
          echo '<span style="color: blue;">[カスタム投稿：tech]</span>';
        } elseif ($post_type === 'works') {
          echo '<span style="color: green;">[カスタム投稿：works]</span>';
        }
        ?>
        
      </div>
    <?php endwhile; else : ?>
      <!-- ▼投稿が見つからない場合の表示 -->
      <p>この期間の技術ブログの記事はありません。</p>
    <?php endif; ?>

  </div>

  <!-- ▼サイドバーを読み込む（sidebar.php が使用される） -->
  <?php get_sidebar(); ?>
</div>

<!-- ▼フッターを読み込む（footer.php を実行） -->
<?php get_footer(); ?>
