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
<!--https://www.youtube.com/watch?v=y9kvRWu8rE4  
            動画 デモ付き！WordPressの使い方を根本的に理解するための仕組み解説！28:05-->


<?php get_header();/*これでヘッダーを読み込む*/ ?>
<main>
    <section id="hero">
        <img src="<?php echo get_template_directory_uri();/*これでimg画像を読み込む*/ ?>/img/shinrin_hizashi.jpg" alt=" 参考">
    </section>
    <section id="about">
    </section>
    <section id="information">
        <div class="articles"><!--メインループ。ループ文でwpの投稿を回す-->
            <?php if (have_posts()): ?><!--投稿のif判定コロン構文（投稿があるときとない時で判定する-->
                <?php while (have_posts()): the_post(); ?><!--←投稿のwhileメインループ（投稿がある間は投稿の情報を読み込む）-->
                    <article>
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
                        <p><?php echo get_the_date(); ?></p><!--日付を読み込む-->
                        <h2><?php the_title(); ?></h2><!--wpの投稿のタイトルを読み込む-->
                        <a href="<?php the_permalink(); ?>">ニュース記事詳細はこちら</a><!---->
                    </article><!--投稿のwhileループ情報-->
                <?php endwhile;
            else: ?><!--投稿のwhileループ終了--><!--投稿のif判定-->
                <p>投稿がありません</p><!--投稿がない時は「投稿がありません」が表示される-->
            <?php endif; ?><!--投稿のif判定終了-->
            <div class="list_link"><a href="<?php bloginfo('url'); ?>/news">🔗news</a></div><!---->
        </div><!--メインループarticleタグの閉じタグ。ループ文でarticleタグ（wpの投稿）を回す-->


        <!--↓↓↓※※※サブクエリ(works実績一覧)-->
        <!--↓↓↓functions.phpでサブクエリ(works実績一覧)を追加している-->
        <!-- <h3>※※※メインループwhile (have_posts()): the_post(); とは別のループ、
                <br>サブループwhile ($the_query->have_posts()) : $the_query->the_post();を使う。</h3>
            <h3>※※※サブループに入れる条件はindex.phpの配列$argsに入れている。</h3> 
            -->
        <div class="sub-articles">
            <?php
            $args = array(
                'post_type' => 'works', /* 取得したい投稿タイプ */
                'posts_per_page' => 5, /* 表示したい投稿の数 (すべての取得したい場合は「-1」) */
                'paged' => $paged
            );
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()): ?>
                <ul class="works-articles">
                    <?php while ($the_query->have_posts()) : $the_query->the_post(); /* 投稿のサブループ開始 */ ?>
                        <!--↓↓↓wpのworks（実績）のサムネイル画像、日付、パーマリンク。index.phpの the_permalink を使って読み込む。-->
                        <li class="works-article">
                            <a href="<?php the_permalink(); ?>">
                                <div class="outline">
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
                                    <p class="date"><?php echo get_the_date('Y.m.d'); ?></p>
                                    <h2 class="title"><?php the_title(); ?></h2>
                                    <a href="<?php the_permalink(); ?>">実績詳細はこちら</a><!---->
                                </div>
                            </a>
                            <!-- <h3>↑↑↑wpのworks（実績）のサムネイル画像、日付、パーマリンク。index.phpの the_permalink を使って読み込む。</h3> -->
                        </li>
                    <?php endwhile;  ?>
                </ul>
                <?php wp_reset_postdata(); /* クエリ(サブループ)のリセット */ ?>
            <?php else: /* もし、投稿がない場合 */ ?>
            <?php endif; /* 投稿の条件分岐を終了 */ ?>
            <div class="list_link"><a href="<?php bloginfo('url'); ?>/works">🔗works</a></div><!---->
        </div>

    </section>

</main>
<?php get_footer();/*これでフッターを読み込む*/ ?>