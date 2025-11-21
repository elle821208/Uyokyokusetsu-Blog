<?php
// ここでは WordPress でよく使う「ヘッダー」を表示します。
// ヘッダーとは、ページの一番上に表示される共通の部分（ロゴ・メニューなど）のことです。
get_header();
?>

<main>
    <!-- 🌳「ヒーローセクション」とは、ページの一番上に大きく表示される画像のことです -->
    <section id="hero">
        <!-- 画像を表示するためのコードです。
        「get_template_directory_uri()」は、今使っているテーマフォルダの場所を自動で探してくれます。 -->
        <img src="<?php echo get_template_directory_uri(); ?>/img/shinrin_hizashi.jpg" alt="参考">
    </section>

    <!-- 👤 自己紹介などに使える「about（アバウト）セクション」です。
    今は空ですが、あとで自己紹介やプロフィールなどを入れることができます。 -->
    <section id="about">
    </section>

    <!-- ℹ️ ブログの情報をまとめて表示するセクションです。
    「雑記ブログ」と「技術ブログ」の2つのカテゴリに分けて表示しています。 -->
    <section id="information">

        <!-- 🟠 雑記ブログ（カテゴリー名が「zakki」の記事を表示） -->
        <div class="articles_container">
            <h2>雑記ブログ</h2>
            <div class="grid-articles">
                <?php
                // 「zakki」というカテゴリ名がついた記事だけを取得します。
                // ここで「新しい記事5件だけ」を選んで表示しています。
                $zakki_query = new WP_Query(array(
                    'category_name' => 'zakki',
                    'posts_per_page' => 5
                ));

                // 記事が1件でもあれば表示スタート
                if ($zakki_query->have_posts()):
                    // 1つずつ記事を取り出して表示するためのループ（くり返し）
                    while ($zakki_query->have_posts()): $zakki_query->the_post();
                ?>
                        <article class="card">
                            <?php if (has_post_thumbnail()): // アイキャッチ画像（記事の顔となる画像）があるか？ ?>
                                <figure><?php the_post_thumbnail('post-thumbnails'); ?></figure>
                            <?php else : // 画像がないときは代わりの画像を表示 ?>
                                <figure>
                                    <p class="nothing">
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/no-thumbnail-uyokyokusetsu.png" alt="">
                                    </p>
                                </figure>
                            <?php endif; ?>
                            <p class="post-date"><?php echo get_the_date(); // 投稿日を表示 ?></p>
                            <h3 class="card-title"><?php the_title(); // 記事のタイトルを表示 ?></h3>
                            <!-- 「記事詳細はこちら」のボタンを押すと、その記事のページに移動します -->
                            <a class="read-more" href="<?php the_permalink(); ?>">記事詳細はこちら</a>
                        </article>
                <?php
                    endwhile; // くり返し終わり
                    wp_reset_postdata(); // 他の処理に影響が出ないよう、記事データを初期状態に戻します
                else:
                ?>
                    <!-- 記事が1件もなかった場合に表示される文字 -->
                    <p>投稿がありません</p>
                <?php endif; ?>
            </div>

            <!-- 「news」ページへのリンク。「もっと読む」みたいな役割です -->
            <div class="list_link"><a href="<?php bloginfo('url'); ?>/news">🔗news</a></div>
        </div>

        <!-- 🔵 技術ブログ：3種類の記事をまとめて表示 -->
        <div class="articles_container">
            <h2>技術ブログ</h2>
            <div class="grid-articles">
                <?php
                // 今何ページ目かを取得（たとえば2ページ目、3ページ目…と続けられるように）
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                // ▼【1】「tech」というカテゴリ名がついた、普通の投稿を最大5件取得します
                $tech_posts = new WP_Query(array(
                    'category_name' => 'tech',
                    'posts_per_page' => 5
                ));

                if ($tech_posts->have_posts()) :
                    while ($tech_posts->have_posts()) : $tech_posts->the_post();
                ?>
                        <article class="card">
                            <?php if (has_post_thumbnail()): ?>
                                <figure><?php the_post_thumbnail('post-thumbnails'); ?></figure>
                            <?php else: ?>
                                <figure class="nothing">
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/no-thumbnail-uyokyokusetsu.png" alt="">
                                </figure>
                            <?php endif; ?>
                            <p class="post-date"><?php echo get_the_date(); ?></p>
                            <h3 class="card-title"><?php the_title(); ?></h3>
                            <a class="read-more" href="<?php the_permalink(); ?>">記事詳細はこちら</a>
                        </article>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;

                // ▼【2】カスタム投稿タイプ「tech」から記事を最大5件取得
                // カスタム投稿タイプとは、「通常のブログ記事とは別の種類の投稿」のこと。
                // 商品紹介、作品ギャラリーなど、使い分けたいときに使います。
                $args = array(
                    'post_type' => 'tech',
                    'posts_per_page' => 5,
                    'paged' => $paged
                );
                $the_query = new WP_Query($args);
                if ($the_query->have_posts()):
                    while ($the_query->have_posts()) : $the_query->the_post();
                ?>
                        <article class="card">
                            <?php if (has_post_thumbnail()): ?>
                                <figure><?php the_post_thumbnail('post-thumbnails'); ?></figure>
                            <?php else: ?>
                                <figure class="nothing">
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/no-thumbnail-uyokyokusetsu.png" alt="">
                                </figure>
                            <?php endif; ?>
                            <p class="post-date"><?php echo get_the_date(); ?></p>
                            <h3 class="card-title"><?php the_title(); ?></h3>
                            <a class="read-more" href="<?php the_permalink(); ?>">記事詳細はこちら</a>
                        </article>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;

                // ▼【3】カスタム投稿タイプ「works」から記事を最大5件取得
                $args_works = array(
                    'post_type' => 'works',
                    'posts_per_page' => 5,
                    'paged' => $paged
                );
                $works_query = new WP_Query($args_works);
                if ($works_query->have_posts()) :
                    while ($works_query->have_posts()) : $works_query->the_post();
                ?>
                        <article class="card">
                            <?php if (has_post_thumbnail()) : ?>
                                <figure><?php the_post_thumbnail('post-thumbnails'); ?></figure>
                            <?php else : ?>
                                <figure class="nothing">
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/no-thumbnail-uyokyokusetsu.png" alt="">
                                </figure>
                            <?php endif; ?>
                            <p class="post-date"><?php echo get_the_date(); ?></p>
                            <h3 class="card-title"><?php the_title(); ?></h3>
                            <a class="read-more" href="<?php the_permalink(); ?>">詳細を見る</a>
                        </article>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else:
                    echo '<p>投稿がありません</p>';
                endif;
                ?>
            </div>

            <!-- 技術ブログの中でも「works」だけをまとめたページへのリンク -->
            <div class="list_link"><a href="<?php bloginfo('url'); ?>/works">🔗works-----</a></div>
        </div>

    </section>
</main>

<?php
// WordPressの共通のフッター部分（footer.php）を読み込みます。
// フッターは、ページの一番下にあるコピーライトやリンクなどです。
get_footer();
?>
