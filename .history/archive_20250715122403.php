<?php
/*
 * ファイル名: archive.php
 * 役割: 通常投稿（postタイプ）のカテゴリーページやアーカイブページを表示するテンプレートファイルです。
 * 影響するページURL:
 *   - https://あなたのサイト.com/category/mindset/
 *   - https://あなたのサイト.com/category/mindset/?year=2025&monthnum=07
 */

get_header(); // サイトの上部（共通ヘッダー）を表示する。影響ファイル：header.php
?>

<div id='content'> <!-- サイト全体のメインコンテンツ部分 -->

  <div id='main'> <!-- 左側のメインカラム：記事一覧が表示される -->

    <!-- ▼現在表示しているカテゴリ名を画面に表示（例: mindset） -->
    <!-- 関数：single_cat_title() → 今見ているカテゴリの名前を出す -->
    <!-- 影響ページ: /category/◯◯/, /category/◯◯/?year=2025&monthnum=07 -->
    <!-- 影響ファイル: archive.php（このファイル自身） -->
    <h1><?php single_cat_title(); ?> 雑記ブログ投稿一覧</h1>

    <?php
    /*
     * ▼【現在表示中のカテゴリ情報】を取得する関数 → get_queried_object()
     * 例: /category/mindset/ にいる場合 → mindsetというカテゴリのオブジェクトが取得できる
     * 変数: $current_category → 現在表示しているカテゴリ
     * 変数: $category_id → そのカテゴリのID（数字）
     * 影響ページ: カテゴリーページ
     * 影響ファイル: archive.php
     */
    $current_category = get_queried_object();
    $category_id = isset($current_category->term_id) ? $current_category->term_id : null;

    /*
     * ▼【月別アーカイブ対応】のためにURLに含まれるパラメータ（year, monthnum）を取得
     * 例: /category/mindset/?year=2025&monthnum=07 のとき
     * → $year = 2025, $monthnum = 07 が代入される
     * 影響ページ: アーカイブの月別リンクから遷移したカテゴリーページ
     * 影響ファイル: archive.php
     */
    $year      = isset($_GET['year']) ? intval($_GET['year']) : null;
    $monthnum  = isset($_GET['monthnum']) ? intval($_GET['monthnum']) : null;

    /*
     * ▼techカテゴリを除外するために、スラッグ名（英語名）からカテゴリ情報を取得
     * 関数：get_category_by_slug('tech')
     * → techカテゴリのオブジェクトが取得できる
     * 変数: $tech_cat
     * 影響ページ: 全てのカテゴリーページ（techカテゴリの記事を除外）
     * 影響ファイル: archive.php
     */
    $tech_cat = get_category_by_slug('tech');

    /*
     * ▼【投稿の絞り込み条件（クエリ）】を設定
     * ここでは tax_query を使って「特定カテゴリに属している」かつ「techカテゴリに属していない」
     * という複合条件を設定しています。
     *
     * また、年月の指定がある場合は date_query を使って期間で絞り込みます。
     * WP_Query に渡すための引数配列 $args を作成。
     * 影響ページ: /category/◯◯/, /category/◯◯/?year=YYYY&monthnum=MM
     * 影響ファイル: archive.php
     */
    $args = array(
      'post_type'      => 'post',     // 通常の投稿タイプのみ対象（カスタム投稿は含まない）
      'posts_per_page' => -1,         // -1でページ分割せず全件取得
      'orderby'        => 'date',     // 日付順で並べる
      'order'          => 'DESC',     // 新しい記事が上に来るようにする
      'tax_query'      => array(      // タクソノミー（カテゴリ）での絞り込み
        'relation' => 'AND',          // 下記2条件を両方満たす投稿だけ表示
        array(
          'taxonomy' => 'category',   // 対象：カテゴリ
          'field'    => 'term_id',    // 指定方法：カテゴリIDで指定
          'terms'    => $category_id, // 現在のカテゴリに属する投稿
        ),
        array(
          'taxonomy' => 'category',
          'field'    => 'term_id',
          'terms'    => array($tech_cat->term_id), // techカテゴリを除外
          'operator' => 'NOT IN'                   // 「含まない」条件
        )
      ),
      'date_query' => array() // 年月絞り込み条件は後で追加
    );

    /*
     * ▼年・月での絞り込みがある場合は、date_query に追加
     * 例：2025年7月の記事だけ表示する
     * 影響ページ: /category/◯◯/?year=2025&monthnum=07
     * 影響ファイル: archive.php
     */
    if ($year || $monthnum) {
      $date_query = array(); // 年月の条件を配列として用意

      if ($year) {
        $date_query['year'] = $year;
      }

      if ($monthnum) {
        $date_query['month'] = $monthnum;
      }

      $args['date_query'][] = $date_query; // 絞り込み条件に追加
    }

    /*
     * ▼WP_Query を使って実際に投稿を取得する
     * WP_Query は条件に一致する投稿を取得するためのクラス
     * 影響ページ: カテゴリーページ・月別アーカイブページ
     * 影響ファイル: archive.php
     */
    $query = new WP_Query($args);

    // ▼投稿が存在するかチェック（1件以上あればループを実行）
    if ($query->have_posts()):
      // ▼1件ずつループして記事情報を表示
      while ($query->have_posts()): $query->the_post(); ?>
        <div class="title">
          <!-- ▼記事タイトルにリンクをつけて表示（クリックで記事ページに移動） -->
          <!-- 関数: the_permalink() → 記事URL / the_title() → 記事タイトル -->
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br>

          <!-- ▼記事の投稿日を表示（例：2025年7月15日） -->
          <small>投稿日: <?php the_time('Y年n月j日'); ?></small><br>

          <!-- ▼記事が属するカテゴリ名をカンマ区切りで表示 -->
          <small>カテゴリ: <?php the_category(', '); ?></small>
        </div>
      <?php endwhile;

      // ▼記事情報をリセット（サブループを使った後は必須。データが元に戻る）
      wp_reset_postdata();

    else: ?>
      <!-- ▼記事が1件も見つからなかった場合の表示メッセージ -->
      <p>この記事カテゴリにはまだ投稿がありません。</p>
    <?php endif; ?>

  </div>

  <!-- ▼右側のサイドバー（カテゴリ一覧・月別アーカイブなど）を読み込む -->
  <!-- 関数: get_sidebar() → sidebar.php を読み込む -->
  <!-- 影響ファイル: sidebar.php -->
  <!-- 影響ページ: 全てのカテゴリーページ -->
  <?php get_sidebar(); ?>

</div>

<?php
// ▼フッター部分（footer.php）を読み込む
// 関数: get_footer()
// 影響ファイル: footer.php
get_footer();
?>
