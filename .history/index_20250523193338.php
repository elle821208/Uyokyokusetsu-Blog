<?php get_header();/*これでヘッダーを読み込む*/ ?>
<main>
    <section id="hero">
        <img src="<?php echo get_template_directory_uri(); ?> /img/shinrin_hizashi.jpg" alt=" 参考">
    </section>
    <section id="about">
    </section>あ

<!--メインループ（雑記ブログ用）-->
    <section id="information">
        <div class="articles_container">
            <div class="articles"><!--メインループ。ループ文でwpの投稿を回す-->

                <?php if (have_posts()): ?>
                    <?php while (have_posts()): the_post(); ?>
                        <?php
                        // ★変更あり：投稿のカテゴリが "tech" ではないときのみ表示
                        if (in_category('tech')) continue;
                        ?>
                        <article>
                            <?php if (has_post_thumbnail()): ?>
                                <figure>
                                    <?php the_post_thumbnail('post-thumbnails'); ?>
                                </figure>
                            <?php else : ?>
                                <figure>
                                    <p class="nothing">
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/shitugen_tozando.jpg" alt="">
                                    </p>
                                </figure>
                            <?php endif; ?>
                            <p><?php echo get_the_date(); ?></p>
                            <h2><?php the_title(); ?></h2>
                            <a href="<?php the_permalink(); ?>">記事詳細はこちら</a>
                        </article>
                    <?php endwhile;
                else: ?>
                    <p>投稿がありません</p>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </div><!--メインループ終了-->
            <div class="list_link"><a href="<?php bloginfo('url'); ?>/news">🔗news</a></div>
        </div>

        <!--↓↓↓※※※サブクエリ(techカテゴリー専用に変更)-->

        <div class="sub-articles_container">
            <div class="sub-articles">
                <?php
                // ★変更あり：techカテゴリーの投稿を取得するためのクエリに変更
                $args = array(
                    'post_type' => 'post', // 投稿タイプは通常の投稿
                    'category_name' => 'tech', // techカテゴリーのみ
                    'posts_per_page' => 5,
                    'paged' => get_query_var('paged') ? get_query_var('paged') : 1 // ★修正：$pagedの代わりに正しい取得方法
                );
                $the_query = new WP_Query($args);
                if ($the_query->have_posts()): ?>
                    <div class="works-articles">
                        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                            <div class="works-article">
                                <div class="outline">
                                    <?php if (has_post_thumbnail()): ?>
                                        <figure>
                                            <?php the_post_thumbnail('post-thumbnails'); ?>
                                        </figure>
                                    <?php else : ?>
                                        <figure>
                                            <p class="nothing">
                                                <img src="<?php echo get_template_directory_uri(); ?>/img/tsukitotoukyoutawa.png" alt="">
                                            </p>
                                        </figure>
                                    <?php endif; ?>
                                    <p><?php echo get_the_date('Y.m.d'); ?></p>
                                    <h2><?php the_title(); ?></h2>
                                    <a href="<?php the_permalink(); ?>">実績詳細はこちら</a>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <?php wp_reset_postdata(); ?>
                <?php else: ?>
                    <p>Techカテゴリーの投稿はありません</p>
                <?php endif; ?>
            </div>
            <div class="list_link"><a href="<?php bloginfo('url'); ?>/category/tech">🔗tech</a></div>
        </div>

    </section>
</main>
<?php get_footer(); ?>
