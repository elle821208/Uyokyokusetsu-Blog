<!--cssが読み込まれないときは検証ツールを開いてリロードボタン長押し。「キャッシュの消去とハード再読み込み」をする-->

<!--WordPressテーマ自作！一番カンタンなWordPressクラシックテーマの作り方をカンタン解説-->
<!--https://www.youtube.com/watch?v=LS8KubY9m2c&t=1508s-->

<!--WordPressクラシックテーマ作成！実践編。HTMLサイトWordPress化の手順大公開！保存版-->
<!--https://www.youtube.com/watch?v=Tv8FaSWi-tY&t=1672s-->

<!---アキユキ デモ付き！WordPressの使い方を根本的に理解するための仕組み解説！--->
<!--https://www.youtube.com/watch?v=y9kvRWu8rE4-->

<!---->
<!---->


<!--https://keimarublog.com/post-count-template/ ← 投稿の表示件数についての参考サイト--->
<!--https://komaricote.com/wordpress/pre_get_posts/  ←  pre_get_postsについての参考サイト--->


<!--Wpweb 投稿を投稿ページ以外で繰り返し表示させる方法。WP_Queryでサブループ。-->
<!--https://wordpress-web.and-ha.com/subloop-with-wp_query/-->

<!--https://wordpress-web.and-ha.com/subloop-with-wp_query/ 
            サブクエリの参考サイト-->


<?php get_header();/*これでヘッダーを読み込む*/ ?>
<main>
    <section id="hero">
        <img src="<?php echo get_template_directory_uri();/*これでimg画像を読み込む*/ ?>/img/shinrin_hizashi.jpg" alt=" 参考">
    </section>
    <section id="about">
    </section>


    <section id="information">
        <div class="articles_container"><!--メインループ（雑記ブログ用）-->
            <h2>雑記ブログ</h2>
            <div class="grid-articles"><!-- ← グリッドデザイン(雑記ブログ) -->
                <!--メインループ。ループ文でwpの投稿を回す-->
                <?php if (have_posts()): ?><!--投稿のif判定コロン構文（投稿があるときとない時で判定する-->
                    <?php while (have_posts()): the_post(); ?><!--←投稿のwhileメインループ（投稿がある間は投稿の情報を読み込む）-->

                        <article class="card"><!-- ← カード全体にデザイン適用 -->
                            <!--記事表示部分-->
                            <?php if (has_post_thumbnail()): ?><!--サムネイル画像のif判定コロン構文（サムネイル画像があるときは下記を表示する）-->
                                <figure>
                                    <?php the_post_thumbnail('post-thumbnails'); ?><!--functons.phpのadd_theme_support('post-thumbnails')←※sがいる※を効かせて、これでwpのサムネイル画像を読み込む-->
                                </figure>
                            <?php else : ?><!--※※※wpサムネイル画像のif判定（サムネイル画像がない場合は下記を表示する-->
                                <figure>
                                    <p class="nothing"><!--wpサムネイル画像がないときの画像-->
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/shitugen_tozando.jpg" alt=""><!--これでimg画像を読み込む-->
                                    </p>
                                </figure>
                            <?php endif; ?><!--wpサムネイル画像のif判定終了（サムネイル画像）-->
                            <!--※※コロン構文 if文の終わりなのでend ifとセミコロン；で閉じる-->
                            <p class="post-date"><?php echo get_the_date(); ?></p>
                            <!--日付を読み込む-->
                            <h3 class="card-title"><?php the_title(); ?></h3>
                            <!--wpの投稿のタイトルを読み込む-->
                            <a class="read-more" href="<?php the_permalink(); ?>">記事詳細はこちら</a>
                            <!---->
                        </article><!--投稿のwhileループ情報-->

                    <?php endwhile;
                else: ?><!--投稿のwhileループ終了--><!--投稿のif判定-->
                    <p>投稿がありません</p><!--投稿がない時は「投稿がありません」が表示される-->
                <?php endif; ?><!--投稿のif判定終了-->
                <?php wp_reset_postdata(); ?>
            </div><!-- .grid-articlesグリッド終了(雑記ブログ)  -->
            <div class="list_link"><a href="<?php bloginfo('url'); ?>/news">🔗news</a></div><!---->
        </div><!--articles_container閉じタグ --><!--メインループ（雑記ブログ用）-->


        <!--サブクエリその１＆その２(技術ブログ用)-->
        <!--↓↓↓functions.phpでサブクエリを追加している-->
        <div class="articles_container"><!--サブループその１＆その２（技術ブログ用）-->
            <!--$pagedが現在のページ番号を取得し、未定義なら「1ページ目」として扱う 処理-->
            <!--(get_query_var('paged'))で現在のページ番号を取得する-->
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            ?>
            <h2>技術ブログ</h2>
            <!--サブループその１（メインループ「技術ブログ（techカテゴリー）」の投稿を5件だけ取得し、繰り返し表示するためのサブループ） -->
            <div class="grid-articles"><!--← グリッドデザイン（サブループその１） -->
                <!--↓↓↓ WordPressの中から、“tech”というカテゴリの投稿を5つだけ取り出して、$tech_posts に入れる」-->
                <?php
                $tech_posts = new WP_Query(array(
                    //$tech_posts という変数を作って、そこに値（結果）を入れる」
                    //WP_Query は WordPress がもともと用意してくれている「投稿を検索するための便利な道具（クラス）」
                    //new WP_Query(...) は、「その道具を新しく使う」という意味。
                    //arrayでこの中で「どんな投稿を探したいか」を指定する
                    'category_name' => 'tech', // ← tech」カテゴリの投稿を
                    'posts_per_page' => 5// 最大5件まで表示して
                ));
                if ($tech_posts->have_posts()) :// have_posts() で投稿がまだ残っているかチェックする。もし投稿が存在する場合（取得できたら）に以下を実行
                    while ($tech_posts->have_posts()) : // while は「〜の間ずっと」という意味のくり返し文。取得した投稿がある間、1件ずつ処理を繰り返す
                        $tech_posts->the_post();// 投稿を取り出して表示できるように。これをしないと、the_title() や the_content() は使えない

                ?>
                        <article class="card"><!-- ← カード（サブループその１）全体にデザイン適用 -->
                            <?php if (has_post_thumbnail()): ?>
                                <figure>
                                    <?php the_post_thumbnail('post-thumbnails'); ?>
                                </figure>
                            <?php else: ?>
                                <p>投稿がありません</p>
                                <figure class="nothing"><!-- サムネイル画像がない場合の代替画像 -->
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/shitugen_tozando.jpg" alt="">
                                </figure>
                            <?php endif; ?>
                            <p class="post-date"><?php echo get_the_date(); ?></p>
                            <h3 class="card-title"><?php the_title(); ?></h3>
                            <a class="read-more" href="<?php the_permalink(); ?>">記事詳細はこちら</a>
                        </article><!-- ← カード（サブループその１）全体にデザイン適用 -->
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div><!-- .grid-articlesグリッド（サブループその１）終了 -->



            <!--カスタム投稿タイプ works（「functions.php」で登録した新規の投稿一覧） を「index.php」でサブループを使って表示するためのコード-->
            <!-- サブループに入れる条件は配列$argsに入れている。 -->
            <?php
            $args = array(
                'post_type' => 'works', /* 取得したい投稿タイプ */
                'posts_per_page' => 5, /* 表示したい投稿の数 (すべての取得したい場合は「-1」) */
                'paged' => $paged
            );
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()): ?>

                <!--↓↓↓ サブループその２（新規の登録一覧。カスタム投稿タイプをfunctions.phpで作って、index.phpで回す。）-->
                <div class="grid-articles"><!--サブループその２-->
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); /* 投稿のサブループ開始 */ ?>
                        <!--↓↓↓wpの技術ブログのサムネイル画像、日付、パーマリンク。index.phpの the_permalink を使って読み込む。-->
                        <div class="works-article"><!--カスタム投稿タイプ works（実績紹介など）を1件ずつ囲むラッパー要素」-->
                            <div class="outline"><!--1件の実績の中で、実際の中身（サムネイル・日付・タイトル・リンク）をまとめるための内側のラッパー-->
                                <!--サムネイル画像の判定-->
                                <?php if (has_post_thumbnail()): ?><!--サムネイル画像のif判定コロン構文（サムネイル画像があるときは下記を表示する）-->
                                    <figure>
                                        <?php the_post_thumbnail('post-thumbnails'); ?><!--functons.phpのadd_theme_support('post-thumbnails')←※sがいる※を効かせて、これでwpのサムネイル画像を読み込む-->
                                    </figure>
                                <?php else : ?><!--※※※wpサムネイル画像のif判定（サムネイル画像がない場合は下記を表示する-->
                                    <figure>
                                        <p class="nothing"><!--wpサムネイル画像がないときの画像-->
                                            <img src="<?php echo get_template_directory_uri(); ?>/img/tsukitotoukyoutawa.png" alt=""><!--これでimg画像を読み込む-->
                                        </p>
                                    </figure>
                                <?php endif; ?><!--wpサムネイル画像のif判定終了（サムネイル画像）-->
                                <!--※※コロン構文 if文の終わりなのでend ifとセミコロン；で閉じる-->
                                <!--サムネイル画像の判定-->
                                <p><?php echo get_the_date('Y.m.d'); ?></p>
                                <h3 class="card-title"><?php the_title(); ?></h3>

                                <a href="<?php the_permalink(); ?>">実績詳細はこちら</a><!---->
                            </div><!--outlineの閉じタグ-->
                        </div><!--works-articleの閉じタグ-->
                    <?php endwhile;  ?>
                </div><!-- .grid-articlesグリッド（サブループその２）終了 -->
                <?php wp_reset_postdata(); /* クエリ(サブループ)のリセット */ ?>
            <?php else: /* もし、投稿がない場合 */ ?>
            <?php endif; /* 投稿の条件分岐を終了 */ ?>

            <div class="list_link"><a href="<?php bloginfo('url'); ?>/works">🔗works</a></div><!---->
        </div><!--articles_container閉じタグ-->
    </section>

</main>
<?php get_footer();/*これでフッターを読み込む*/ ?>