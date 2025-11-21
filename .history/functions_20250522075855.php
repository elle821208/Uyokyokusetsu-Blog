
<?php
//※※※↑↑↑functions.phpトップの<?phpより上にはコメントを書かないこと(エラーの原因になる)_！
//index.phpでサムネイル（アイキャッチ）を読み込むときの設定。
add_theme_support('post-thumbnails');/*index.phpのループ文のthumbnail用とこれでwpのサムネイル画像を読み込む*/
add_image_size('post-thumbnails',400,200,true);/*サムネイル画像のサイズを指定する。post-thumbnailsはsがいる*/


//ブラウザのタブに WPサイトタブタイトル（wpの一般設定より）をheader.phpでを読み込む時の設定
function titles()
{
$title = wp_title(' | ',true,'right');
if  (is_home()) {
//トップページ(Homeページ)のときは
//紆余トップ(functions.phpで設定) |曲折を表示
echo'①紆余曲折 |トップ ';
}else{
//トップページ(Homeページ)以外は下記を表示
//$title(wp固定ページタイトル)にサイト名を足したものを使う
    echo $title.'サイト名';
}
};



///※※ダッシュボードに「ニュース」のアーカイブurl作成
///https://www.youtube.com/watch?v=y9kvRWu8rE4  
///  ↑↑↑動画 デモ付き！WordPressの使い方を根本的に理解するための仕組み解説！28:42-->
function post_has_archive($args,$post_type){///← post_has_archiveがフック
    if('post'==$post_type){
        $args['rewrite']=true;
        $args['has_archive']='news';///← アーカイブページの設定。スラッグは'news'   
        $args['label']='雑記ブログ一覧';
    }
    return $args;
}
add_filter('register_post_type_args','post_has_archive',10,2);




//投稿のメインクエリ「ニュース」のトップページでの表示件数の変更
//wpの設定→表示設定の「1ページに表示する最大投稿数」を設定する
//https://keimarublog.com/post-count-template/ ← 投稿の表示件数についての参考サイト
//https://komaricote.com/wordpress/pre_get_posts/  ←  pre_get_postsについての参考サイト


function news_posts_per_page($query)//第二引数news_posts_per_pageの内容を登録する。ニュースの投稿の表示件数、変数$Query（現在のクエリ、メインループ）
{
    //if文
    if (is_admin() || !$query->is_main_query()) {//もし管理画面を表示しているとき、もしくは変数$Query（現在のクエリ、メインループ）がメインクエリでなければデフォルトの状態のまま返すという処理
        return;
    }
    if ($query->is_front_page()) {//もしトップページ（is_front_page）の場合
        $query->set('posts_per_page', '12');//「表示件数を最大○○件にする」
        //$query->set() で「クエリを→セットする」という意味、('posts_per_page', 3);で「表示件数を最大3件にする」という意味
    }
}
add_action('pre_get_posts', 'news_posts_per_page');//フックpre_get_postsでデフォルトのwordpressのメインループ（変数$Query）の投稿件数10件を変更させた。
//「投稿を取得する前」のタイミングで「ニュースの投稿の表示件数」を上記のif文の通りに分岐させ実行させる。
//アクションフックadd_action() を使って第一引数のタイミングで第二引数を実行させる。
//この例では第一引数の pre_get_posts で「投稿を取得する前」をタイミングに指定し、第二引数の news_posts_per_page で「ニュースの投稿の表示件数」となります。
//pre_get_posts はWordPressがアクセスしたURLをもとに、メインクエリで投稿を取得する前に処理を行いたいときに使うアクションフックというものです。



/* ----------wpのダッシュボードに「works(実績一覧)」 カスタム投稿タイプ、サブループを追加 ---------- */
//https://wordpress-web.and-ha.com/summary-add-custom-post-type/ ← カスタム投稿タイプの参考サイト
function cpy_register_works() {
    $labels = [
      'singular_name' => 'works',//投稿タイプの表示名
      'edit_name' => 'works',
      ];
      

    $args = [
      'label' => '技術ブログ一覧', // 管理画面上の表示（日本語でもOK）
      'labels' =>$labels,
      'description' =>"",
      'public' => true, // 管理画面に表示するかどうかの指定
      'show_in_rest' => true, // Gutenbergの有効化
      'rest_base' =>"",
      'rest_controller_class' =>"WP_REST_Posts_Controller",
      'has_archive' => true, // 投稿した記事の一覧ページを作成する
      'delete_with_user' =>false,
      'excluded_from_search' =>false,
      'map_meta_cap' =>true,
      'hierarchical' => true, // 階層構造を持つかどうか
      'rewrite' =>["slug" =>"works","with_front"=>true],// 
      'query_var'=>true,
      'menu_position' => 5, // 管理画面メニューの表示位置（投稿の下に追加）
      'supports' => ['title',  'editor', 'thumbnail'],
    ];
    register_post_type('works',$args); //カスタム投稿タイプ名（半角英数字の小文字）
}
add_action( 'init', 'cpy_register_works' );



//chatgtpより2025_05_19
 add_theme_support('post-thumbnails'); // サムネイル有効化

// 独自サイズの登録（必要なら）
add_image_size('custom-thumb', 640, 360, true); // 幅640×高さ360、トリミングあり



//2025-










