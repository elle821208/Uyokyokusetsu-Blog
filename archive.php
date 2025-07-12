<?php
/*
 * ファイル名: archive.php または category.php（どちらか）
 * 役割: カテゴリーアーカイブページ（カテゴリ別一覧ページ）を表示するテンプレート
 * 影響するページ例:
 *    - https://〇〇.com/category/zakki/
 *    - https://〇〇.com/category/zakki/mindset/
 *    - https://〇〇.com/category/mindset/
 * など、カテゴリーページにアクセスしたときに、このファイルが使われます。
 */

get_header(); // サイトの上部にある共通ヘッダー部分（header.php）を読み込みます
?>

<div id='content'> <!-- メインコンテンツ全体を囲む div -->
  <div id='main'> <!-- 左側のメインカラム（記事一覧） -->

    <!-- ▼現在表示中のカテゴリ名を画面に表示する部分 -->
    <!-- 例：今 mindest カテゴリのページを見ているなら「mindset 雑記ブログ投稿一覧」と表示されます -->
    <h1><?php single_cat_title(); ?> 雑記ブログ投稿一覧</h1>

    <?php
    // ▼「zakkiカテゴリー」に属する投稿を表示したいが、「techカテゴリー」は除外したい
    // ▼WordPressの関数でスラッグ（カテゴリの英語名）からIDを取得する
    $zakki_cat = get_category_by_slug('zakki'); // zakkiというスラッグ名のカテゴリ情報を取得
    $tech_cat  = get_category_by_slug('tech');  // techというスラッグ名のカテゴリ情報を取得

    // ▼記事の取得条件を配列で指定します（これを WP_Query に渡して記事を検索します）
    $args = array(
      'post_type'      => 'post', // 通常の投稿タイプだけを対象にする（カスタム投稿は含まない）
      'posts_per_page' => -1,     // すべての該当記事を取得（ページ分けしない）
      'orderby'        => 'date', // 日付の新しい順に並べる
      'order'          => 'DESC', // 降順（新しい→古い）
      'category__in'   => array($zakki_cat->term_id),     // zakkiカテゴリーに属する記事だけを対象にする
      'category__not_in' => array($tech_cat->term_id)     // techカテゴリーに属している記事は除外する
    );

    // ▼上で指定した条件をもとに記事を取得する（新しいクエリオブジェクトを作成）
    $zakki_query = new WP_Query($args);

    // ▼記事が存在するかをチェック
    if ($zakki_query->have_posts()):
      // ▼1件ずつ記事をループで取り出して表示
      while ($zakki_query->have_posts()): $zakki_query->the_post(); ?>
        <div class="title">
          <!-- ▼記事タイトルをリンク付きで表示 -->
          <!-- 記事をクリックすると、個別ページ（single.phpなど）へ移動できます -->
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br>

          <!-- ▼記事の投稿日を表示 -->
          <!-- 表示形式は「2025年7月9日」など -->
          <small>投稿日: <?php the_time('Y年n月j日'); ?></small><br>

          <!-- ▼記事が属しているカテゴリをすべて表示 -->
          <!-- 複数カテゴリがある場合は「,（カンマ）」で区切って表示されます -->
          <small>カテゴリ: <?php the_category(', '); ?></small>
        </div>
      <?php endwhile;

      // ▼記事データをリセットして元に戻す（重要。サブループを使ったときは必須）
      wp_reset_postdata();

    else: ?>
      <!-- ▼該当カテゴリに投稿がまだない場合に表示されるメッセージ -->
      <p>この記事カテゴリにはまだ投稿がありません。</p>
    <?php endif; ?>

  </div>

  <!-- ▼右側のサイドバー部分を読み込む（カテゴリ一覧やアーカイブなどが表示される） -->
  <!-- 【影響ファイル】sidebar.php -->
  <!-- 【影響ページ】このアーカイブページのサイドにも表示される -->
  <?php get_sidebar(); ?>
</div>

<?php
// ▼サイトの下部にある共通フッター部分（footer.php）を読み込みます
// 【影響ファイル】footer.php
get_footer();
?>
