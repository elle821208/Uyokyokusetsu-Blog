<?php
/*
 * ファイル名: archive-works.php
 * 役割: カスタム投稿タイプ「works」（技術ブログ）のアーカイブページテンプレート
 * 対象URL: /works または /works?w_year=2025&w_month=07 など
 * 影響するページ: カスタム投稿タイプ works のアーカイブ一覧（技術ブログ一覧）
 * 使用テンプレート: archive-works.php（このファイル）
 */

get_header(); // サイトの一番上（ヘッダー）を表示する。header.php という別のファイルを読み込んで表示している。
?>

<div id="content">
  <div id="main">

    <!-- ▼ページのタイトル部分 -->
    <h1>
      <?php
      /*
       * ▼「w_year（年）」と「w_month（月）」という情報がURLについているときだけ、
       * 　　「〇〇年〇〇月 の技術ブログ投稿一覧」と表示する。
       * ▼URLにそれらがない場合は、ただの「技術ブログ投稿一覧」と表示する。
       *
       * ▼ここで使っている if 文（「もし〜ならば」という意味）について：
       * 　　たとえば「もし雨が降っていたら傘を持っていく」と同じ考え方です。
       * 　　ここでは「もしURLに w_year と w_month があるなら、年月付きタイトルにしよう」ということです。
       */

      // 「もしURLに w_year も w_month も入っているなら」
      if (isset($_GET['w_year']) && isset($_GET['w_month'])) {
        // 「〇〇年〇〇月 の技術ブログ投稿一覧」と表示する
        echo esc_html($_GET['w_year']) . '年' . esc_html($_GET['w_month']) . '月 の技術ブログ投稿一覧';
      } else {
        // URLに w_year か w_month が入ってなかったら、こちらを表示
        echo '技術ブログ投稿一覧';
      }
      ?>
    </h1>

    <!-- ▼技術ブログの投稿が1件以上あるかチェックして、あれば表示する -->
    <?php
    /*
     * ▼ have_posts() は「投稿がまだあるかな？」と確認する関数です。
     * ▼ the_post() は1件ずつ投稿を取り出して、中身を表示する準備をします。
     * ▼ while は「あるかぎり、くりかえす」という意味です。
     * ▼ この2つをセットで使うと「全部の記事を順番に表示する」しくみになります。
     */
    if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div class="title">
        <!-- ▼記事タイトルとその記事のリンクを表示する -->
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br>

        <!-- ▼記事が公開された日付を表示（2025年7月16日 のような形式） -->
        <small>投稿日: <?php the_time('Y年n月j日'); ?></small><br>

        <?php
        /*
         * ▼この記事がどの「種類（タイプ）」なのかを調べて表示します。
         * ▼投稿には種類があります。たとえば：
         *     ・ふつうの記事（post）
         *     ・カスタム投稿：tech
         *     ・カスタム投稿：works
         *
         * ▼ get_post_type() はその種類を調べる関数です。
         * ▼ それに応じて、[〇〇投稿] という表示ラベルを色つきで出しています。
         */

        $post_type = get_post_type(); // 今の投稿の種類を調べる

        // もし post（通常の投稿）だったら
        if ($post_type === 'post') {
          echo '<span style="color: gray;">[通常投稿：techカテゴリ]</span>';
        }
        // もし tech（カスタム投稿タイプ）だったら
        elseif ($post_type === 'tech') {
          echo '<span style="color: blue;">[カスタム投稿：tech]</span>';
        }
        // もし works（このページのカスタム投稿タイプ）だったら
        elseif ($post_type === 'works') {
          echo '<span style="color: green;">[カスタム投稿：works]</span>';
        }
        ?>
      </div>
    <?php endwhile; else : ?>
      <!-- ▼投稿が1件もなかったときの表示 -->
      <p>この期間の技術ブログの記事はありません。</p>
    <?php endif; ?>

  </div>

  <!-- ▼横の部分（サイドバー）を表示。sidebar.php を読み込んでいます。 -->
  <?php get_sidebar(); ?>
</div>

<!-- ▼一番下の部分（フッター）を表示。footer.php を読み込んでいます。 -->
<?php get_footer(); ?>
