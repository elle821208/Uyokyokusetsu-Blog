    <?php
/*
 * ファイル名: archive-works.php
 * 役割: 技術ブログ（カスタム投稿タイプ works）の一覧ページを表示するためのテンプレート
 * 【影響するページ】
 *   - https://あなたのドメイン/works
 *   - https://あなたのドメイン/works?w_year=2025&w_month=07 ← ← このようなURLで月別絞り込みもできるようになります
 */

get_header(); // 【影響ファイル】ヘッダー（共通部分）を読み込む
?>

<div id="content"> <!-- 全体コンテンツを囲む -->
  <div id="main"> <!-- メインの投稿記事一覧表示 -->

    <!-- ▼現在表示中のタイトル（デフォルト） -->
    <h1>
      <?php
      // ▼URLに w_year と w_month があれば、その年月をタイトルに表示（例：2025年07月の技術ブログ投稿一覧）
      if (isset($_GET['w_year']) && isset($_GET['w_month'])) {
        echo esc_html($_GET['w_year']) . '年' . esc_html($_GET['w_month']) . '月 の技術ブログ投稿一覧';
      } else {
        echo '技術ブログ投稿一覧';
      }
      ?>
    </h1>

    <?php
    // ▼ここからが「技術ブログを集めて表示する」処理です。
    // ▼「通常投稿（post）」の中から tech カテゴリだけを取得します（通常投稿にも技術記事がある場合用）
    $normal_posts_args = array(
      'post_type'      => 'post',
      'posts_per_page' => -1,
      'orderby'        => 'date',
      'order'          => 'DESC',
      'category_name'  => 'tech' // techカテゴリだけを取得
    );

    // ▼カスタム投稿タイプ「tech」も取得（技術ブログの1つ）
    $custom_tech_args = array(
      'post_type'      => 'tech',
      'posts_per_page' => -1,
      'orderby'        => 'date',
      'order'          => 'DESC'
    );

    // ▼カスタム投稿タイプ「works」も取得（技術ブログのメイン）
    $custom_works_args = array(
      'post_type'      => 'works',
      'posts_per_page' => -1,
      'orderby'        => 'date',
      'order'          => 'DESC'
    );

    // ▼ここでURLに w_year と w_month がある場合、年月で絞り込みます！
    if (isset($_GET['w_year']) && isset($_GET['w_month'])) {
      $year  = intval($_GET['w_year']);
      $month = intval($_GET['w_month']);

      // ▼3つの投稿タイプそれぞれに年月指定の条件を追加
      $date_query = array(
        array(
          'year'  => $year,
          'month' => $month,
        )
      );

      $normal_posts_args['date_query'] = $date_query;
      $custom_tech_args['date_query']  = $date_query;
      $custom_works_args['date_query'] = $date_query;
    }

    // ▼投稿をそれぞれ取得
    $normal_posts  = new WP_Query($normal_posts_args);
    $custom_tech   = new WP_Query($custom_tech_args);
    $custom_works  = new WP_Query($custom_works_args);

    // ▼3つの投稿を1つの配列にまとめて、あとで並べるために使います
    $all_posts = array_merge(
      $normal_posts->have_posts() ? $normal_posts->posts : [],
      $custom_tech->have_posts() ? $custom_tech->posts : [],
      $custom_works->have_posts() ? $custom_works->posts : []
    );

    // ▼まとめた投稿を「新しい順」に並べ替えます（投稿日が新しい順）
    usort($all_posts, function ($a, $b) {
      return strtotime($b->post_date) - strtotime($a->post_date);
    });

    // ▼記事が1つでもあれば、一覧表示します
    if (!empty($all_posts)) :
      foreach ($all_posts as $post) :
        setup_postdata($post); // WordPressに「今表示する記事はこれだよ」と伝える
    ?>
        <div class="title">
          <!-- ▼記事タイトルにリンクをつけて表示 -->
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br>

          <!-- ▼投稿日を表示 -->
          <small>投稿日: <?php the_time('Y年n月j日'); ?></small><br>

          <!-- ▼どの投稿タイプか見分けられるように表示 -->
          <?php
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
    <?php
      endforeach;
      wp_reset_postdata(); // 投稿データを元に戻す（大事）
    else :
      // ▼記事がない場合はメッセージを表示します
      echo '<p>この期間の技術ブログの記事はありません。</p>';
    endif;
    ?>

  </div>

  <?php
  // ▼右側のサイドバーを読み込みます
  // ▼【影響ファイル】sidebar.php（サイドバーを表示するファイル）
  get_sidebar();
  ?>
</div>

<?php
// ▼下のフッター部分を読み込みます（共通）
get_footer();
?>
