<?php
/*
 * ファイル名: archive.php
 * 役割: 雑記ブログの記事を一覧表示するページ
 * 
 * このファイルは、下記のような「記事のまとめページ」を表示するときに自動で使われます：
 * - カテゴリーページ（例: /category/mindset/）
 * - 年や月ごとのページ（例: /2025/07/）
 * - 雑記ブログの全体一覧ページ（例: /blog/）
 *
 * ▼ポイント
 * WordPressは「どの種類のページを見ているか」によって、
 * 自動でこのテンプレートを使ってページを組み立ててくれます。
 */

// サイトの上部（ヘッダー部分：メニューやロゴなど）を読み込む
get_header();
?>

<!-- サイトのメインコンテンツを包む領域 -->
<main>
  <!-- 横幅をプロフィールページと同じにするためのラッパー -->
  <section class="post-content">

    <!-- ▼ページのタイトル（h1見出し） -->
    <h1 class="entry-title">
      <?php
      /*
       * ▼ここでは「表示しているページの種類」に応じて
       * 見出しの文字を切り替えています。
       *
       * if文 = 「もし ○○ だったら △△ する」という条件分岐。
       * 例）もしカテゴリーページだったら → カテゴリ名を表示
       */

      // もし「カテゴリーページ」だったら（例: /category/mindset/）
      if (is_category()) {
        // そのカテゴリ名を表示（例：mindset）
        single_cat_title();

        // さらに「雑記ブログ投稿一覧」という文字を追加
        echo ' 雑記ブログ投稿一覧';

      // もし「年月アーカイブページ」だったら（例: /2025/07/）
      } elseif (get_query_var('year') && get_query_var('monthnum')) {
        // URLから「年」と「月」を取得
        $year  = get_query_var('year');     // 例：2025
        $month = get_query_var('monthnum'); // 例：07

        // 「2025年7月 の雑記ブログ投稿一覧」と表示
        echo esc_html($year) . '年' . esc_html($month) . '月 の雑記ブログ投稿一覧';

      // 上記以外（通常のアーカイブページやブログ一覧ページ）
      } else {
        // 「最新の雑記ブログ投稿一覧」と表示
        echo '最新の雑記ブログ投稿一覧';
      }
      ?>
    </h1>

    <?php
    /*
     * ▼ここから「記事一覧のループ表示部分」
     *
     * have_posts() = 投稿が存在するかどうかをチェックする関数。
     * - ある場合 → true
     * - ない場合 → false
     *
     * while (have_posts()): the_post();
     * → 投稿がある間、1件ずつ取り出して処理するループ。
     */
    if (have_posts()):
      while (have_posts()): the_post();
    ?>
      <!-- ▼1つの記事のまとまり -->
      <article class="archive-item">
        <!-- 記事タイトル（クリックすると記事ページへ遷移） -->
        <h2 class="archive-title">
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>

        <!-- 記事のメタ情報（公開日とカテゴリ） -->
        <p class="archive-meta">
          投稿日: <?php the_time('Y年n月j日'); ?> |
          カテゴリ: <?php the_category(', '); ?>
        </p>
      </article>

    <?php
      endwhile;
    // 投稿が1件もない場合の処理
    else:
    ?>
      <p>この記事カテゴリにはまだ投稿がありません。</p>
    <?php endif; ?>
  </section>

  <!-- サイドバーを読み込む（sidebar.php の内容が表示される） -->
  <?php get_sidebar(); ?>

  <!-- 共通のCTAパーツを読み込む（呼び出し: template-parts/content-cta.php） -->
  <?php get_template_part('template-parts/content', 'cta'); ?>
</main>

<!-- サイトの最下部（footer.php の内容を読み込む） -->
<?php get_footer(); ?>
