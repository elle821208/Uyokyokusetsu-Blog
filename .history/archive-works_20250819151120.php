<?php
/*
 * ファイル名: archive-works.php
 * 役割: カスタム投稿タイプ「works」（技術ブログ）のアーカイブページテンプレート
 * 
 * ▼このテンプレートが適用されるページ
 * - /works           → 技術ブログの一覧ページ
 * - /works?w_year=2025&w_month=07 など → 特定の年月で絞り込んだ一覧ページ
 *
 * ▼影響範囲
 * 「works」というカスタム投稿タイプの一覧ページを表示するときに自動で使われます。
 */

get_header(); // サイト上部（ヘッダー部分。ロゴ・メニューなど）を読み込む
?>

<!-- ▼サイトのメイン部分を包む -->
<main>
  <!-- ▼プロフィールページと同じ横幅で記事を表示する領域 -->
  <section class="post-content">

    <!-- ▼ページタイトル（h1見出し） -->
    <h1 class="entry-title">
      <?php
      /*
       * ▼ページタイトルの出し分け
       *
       * もしURLに「w_year（年）」と「w_month（月）」が指定されている場合は
       *    → 「2025年7月 の技術ブログ投稿一覧」のように表示する。
       *
       * もし指定されていない場合は
       *    → 「技術ブログ投稿一覧」と表示する。
       *
       * if 文のイメージ：  
       *   「もし w_year と w_month があるなら → 年月付きタイトルを出す」  
       *   「それ以外なら → 通常タイトルを出す」
       */
      if (isset($_GET['w_year']) && isset($_GET['w_month'])) {
        // 年月付きのタイトルを出す
        echo esc_html($_GET['w_year']) . '年' . esc_html($_GET['w_month']) . '月 の技術ブログ投稿一覧';
      } else {
        // 通常の一覧タイトルを出す
        echo '技術ブログ投稿一覧';
      }
      ?>
    </h1>

    <?php
    /*
     * ▼投稿の一覧を表示する処理
     *
     * have_posts() : 「まだ投稿がある？」を確認する関数
     * the_post()   : 投稿データを1件取り出して表示の準備をする関数
     * while        : 条件が true のあいだ繰り返す文
     *
     * → 「投稿があるかぎり1件ずつ取り出して表示する」という流れになります。
     */
    if (have_posts()):
      while (have_posts()): the_post();
    ?>
      <!-- ▼1件分の記事表示ブロック -->
      <article class="archive-item">
        <!-- 記事タイトル（クリックで記事ページへ） -->
        <h2 class="archive-title">
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>

        <!-- 記事の公開日 -->
        <p class="archive-meta">
          投稿日: <?php the_time('Y年n月j日'); ?>
        </p>

        <?php
        /*
         * ▼投稿タイプごとのラベルを表示する処理
         * WordPress には「投稿タイプ」という区分があり、
         *   - post   → 通常の投稿
         *   - tech   → カスタム投稿タイプ（技術関連）
         *   - works  → カスタム投稿タイプ（このページ対象）
         * というように分類できます。
         *
         * get_post_type() で現在の記事がどのタイプかを取得し、
         * それに応じて色付きのラベルを出しています。
         */
        $post_type = get_post_type(); // 現在の記事の投稿タイプを取得

        if ($post_type === 'post') {
          echo '<span style="color: gray;">[通常投稿：techカテゴリ]</span>';
        } elseif ($post_type === 'tech') {
          echo '<span style="color: blue;">[カスタム投稿：tech]</span>';
        } elseif ($post_type === 'works') {
          echo '<span style="color: green;">[カスタム投稿：works]</span>';
        }
        ?>
      </article>

    <?php
      endwhile;
    else:
    ?>
      <!-- ▼投稿が1件もない場合のメッセージ -->
      <p>この期間の技術ブログの記事はありません。</p>
    <?php endif; ?>
  </section>

  <!-- ▼横に表示されるサイドバー。sidebar.php を読み込む -->
  <?php get_sidebar(); ?>

  <!-- ▼共通のCTA（お問い合わせや誘導リンクなど）を読み込む -->
  <?php get_template_part('template-parts/content', 'cta'); ?>
</main>

<!-- ▼一番下のフッター部分。footer.php を読み込む -->
<?php get_footer(); ?>
