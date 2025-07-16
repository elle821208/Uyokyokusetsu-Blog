<!--cssが読み込まれないときは検証ツールを開いてリロードボタン長押し。「キャッシュの消去とハード再読み込み」をする-->    
<!DOCTYPE html>


<html lang="<?php bloginfo('language'); ?>"><!--WPの一般設定の言語を持ってくる-->

<head>
    <meta charset="<?php bloginfo('charset'); ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php titles(); ?></title><!--サイトタブタイトル用にfunctions.phpで設定したの紆余曲折 | サイトのキャッチコピー（サイトタブ表示、functions.phpより）--->
    <meta name="description" content="<?php bloginfo('description');/*これでwpの   を読み込む*/ ?>">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/reset.css"><!--cssが読み込まれないときは検証ツールを開いてリロードボタン長押し。「キャッシュの消去とハード再読み込み」をする-->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/common.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/front-page.css">
    <?php wp_head(); ?><!--headが終わる前に入れる-->
</head>

<body <?php body_class(); ?>><!--bodyにページごとに違うクラスを全部つけてくれる -->
    <!--↓↓↓ブログサイトのヘッダーリスト-->
    <header>
        <p class="site-title">紆余曲折ブログ</p>
        <nav>
            <ul><!--↓↓↓パーマリンクはwp固定ページのクイック編集で設定する-->
                <li><a href="<?php echo home_url(); ?>">ホーム</a></li>
                <li><a href="<?php echo home_url('/profile'); ?>">プロフィール</a></li>
                <li><a href="<?php echo home_url('/contact'); ?>">お問い合わせ</a></li>
                <li><a href="<?php echo home_url('/'); ?>">雑記ブログ一覧</a></li>
                <li><a href="<?php echo home_url('/works'); ?>">技術ブログ一覧</a></li>
            </ul>
        </nav>
    </header>
    <!--↑↑↑ブログサイトのヘッダーリスト-->



