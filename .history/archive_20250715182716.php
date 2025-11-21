<?php
/*
 * ファイル名: archive.php
 * 役割: 通常投稿（postタイプ）のカテゴリーページやアーカイブページを表示するテンプレートファイルです。
 * 影響するページURL例:
 *   - https://あなたのサイト.com/category/mindset/
 *   - https://あなたのサイト.com/category/mindset/?year=2025&monthnum=07
 */

get_header(); // サイトの上部（共通ヘッダー）を表示する。影響ファイル: header.php
?>

<div id='content'> <!-- サイト全体のメインコンテンツ部分 -->

  <div id='main'> <!-- 左側のメインカラム：記事一覧が表示される -->

    <!-- ▼現在表示しているカテゴリ名を見出しとして画面に表示 -->
    <!-- 関数: single_cat_title() → 現在のカテゴリの名前を表示 -->
    <!-- 影響ファイル: archive.php（このファイル） -->
    <!-- 影響ページ: /category/◯◯/, /category/◯◯/?year=XXXX&monthnum=MM -->
    <h1><?php single_cat_title(); ?> 雑記ブログ投稿一覧</h1>

    <?php
    /*
     * ▼現在のカテゴリオブジェクトを取得
     * 関数: get_queried_object()
     * 例: /category/mindset/ にいる場合 → mindsetカテゴリの情報が取得される
     * 変数: $current_category → 現在表示中のカテゴリオブジェクト
     * 変数: $category_id → カテゴリのID（数値）
     * 影響ファイル: archive.php
     * 影響ページ: カテゴリーページ全般
     */
    $current_category = get_queried_object();
    $category_id = isset($current_category->term_id) ? $current_category->term_id : null;

    /*
     * ▼月別アーカイブの絞り込み対応
     * URLに year=2025&monthnum=07 などのパラメータがあると、それを取得
     * 関数: $_GET → URLの?以降の値を取得するPHPの関数
     * 変数: $year → 年（例: 2025）
     * 変数: $monthnum → 月（例: 07）
     * 影響ファイル: archive.php
     * 影響ページ: /category/◯◯/?year=YYYY&monthnum=MM
     */
    $year     = isset($_GET['year']) ? intval($_GET['year']) : null;
    $monthnum = isset($_GET['monthnum']) ? intval($_GET['monthnum']) : null;

    /*
     * ▼techカテゴリ（技術ブログ）を除外する準備
     * 関数: get_category_by_slug('tech') → techというスラッグ名のカテゴリを取得
     * 変数: $tech_cat → techカテゴリの情報
     * 影響ファイル: archive.php
     * 影響ページ: techカテゴリ以外すべて
     */
    $tech_cat = get_category_by_slug('tech');

    /*
     * ▼投稿の取得条件（WP_Queryのための引数）を設定
     * 変数: $args → WP_Queryに渡すための検索条件
     * 内容:
     *   - 投稿タイプ: 'post'（通常の投稿）
     *   - 現在のカテゴリに属する投稿のみ取得
     *   - techカテゴリは除外
     *   - 絞り込み: 年・月があれば追加
     * 影響ファイル: archive.php
     * 影響ページ: /category/◯◯/, /category/◯◯/?year=XXXX&monthnum=MM
     */
    $args = array(
      'post_type'        => 'post',
      'posts_per_page'   => -1, // -1 にするとすべての記事を取得（ページ分割しない）
      'orderby'          => 'date', // 日付順に並べる（新しい順）
      'order'            => 'DESC',
      'category__in'     => array($category_id), // 現在のカテゴリだけを対象にする（修正済み）
      'category__not_in' => array($tech_cat->term_id), // techカテゴリの記事を除外
    );

    // ▼URLに年や月の指定があれば、検索条件に追加する
    if ($year)     $args['year']     = $year;
    if ($monthnum) $args['monthnum'] = $monthnum;

    /*
     * ▼投稿データを取得するためのメインクエリの実行
     * クラス: WP_Query → 投稿を検索するためのWordPressの専用クラス
     * 変数: $query → 絞り込んだ投稿の一覧データが入る
     * 影響ファイル: archive.php
     * 影響ページ: カテゴリーページ・月別アーカイブ
     */
    $query = new WP_Query($args);

    /*
     * ▼投稿が見つかった場合の処理
     * 関数: have_posts(), the_post() → 取得した投稿をループで1件ずつ処理
     */
    if ($query->have_posts()):
      while ($query->have_posts()): $query->the_post(); ?>
        <div class="title">
          <!-- ▼記事タイトルを表示し、クリックで記事ページに移動 -->
          <!-- 関数: the_permalink() → 投稿URL, the_title() → タイトル -->
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br>

          <!-- ▼投稿日を表示（例: 2025年7月15日） -->
          <small>投稿日: <?php the_time('Y年n月j日'); ?></small><br>

          <!-- ▼所属カテゴリを表示（カンマで区切り） -->
          <small>カテゴリ: <?php the_category(', '); ?></small>
        </div>
      <?php endwhile;

      // ▼WP_Queryを使ったあとは必ず投稿情報をリセットする（サブループ後の定型処理）
      wp_reset_postdata();

    else: ?>
      <!-- ▼該当する投稿が見つからなかった場合のメッセージ -->
      <p>この記事カテゴリにはまだ投稿がありません。</p>
    <?php endif; ?>

  </div>

  <!-- ▼右側のサイドバー（カテゴリーや月別アーカイブ）が表示される部分 -->
  <!-- 関数: get_sidebar() → sidebar.php を読み込む -->
  <!-- 影響ファイル: sidebar.php -->
  <!-- 影響ページ: 全てのカテゴリページ -->
  <?php get_sidebar(); ?>

</div>

<?php
// ▼フッター部分（footer.php）を読み込む
// 関数: get_footer()
// 影響ファイル: footer.php
get_footer();
?>
