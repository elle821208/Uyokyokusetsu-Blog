//qiita JavaScriptの超基本】関数や戻り値、スコープについて簡単に解説
//https://qiita.com/ta1fukumoto/items/981a0b766af17ed1a170

//サムライエンジニア JavaScript入門】returnの使い方と戻り値・falseのまとめ！
//https://www.sejuku.net/blog/28728

//JavaScript入門]if – else文を使ってみよう(条件分岐)
//https://codelikes.com/beginner-use-if-javascript/

//Little-Strange-Softwareリトルストレンジソフトウェア
// javascript初心者
//Math.random 乱数
//https://little-strange.hatenablog.com/entry/2021/05/21/235505





// プログラミング初心者でjavascript学習中です。下記の内容のjavascriptファイルを機能ごとに分割したいです。適切なファイル名を教えてください。

// 変数
// 引数
// 配列
// データ型
// 論理演算子
// 関数
// アロー関数
// 確率Math.random
// 戻り値
// 条件式
// if文
// for文
// ループ文
// オブジェクト
// コールバック関数
// 標準組み込みオブジェクト
// ブラウザapi
// イベント
// dom操作
// デバッグ




// ① basics.js
// 👉 JavaScriptの基本文法や構文をまとめるファイル

// 含める機能：

// 変数（let, const）

// データ型（文字列、数値、真偽値など）

// 論理演算子（&&, ||, !）

// 条件式

// if文

// デバッグ（console.log など）

// ② functions.js
// 👉 関数まわりを集中管理

// 含める機能：

// 関数

// 引数

// 戻り値

// アロー関数

// コールバック関数

// ③ arraysAndLoops.js
// 👉 繰り返しと配列操作

// 含める機能：

// 配列

// for文

// ループ文（while, do...whileなど）

// ④ objectsAndBuiltIns.js
// 👉 オブジェクトと標準組み込みの機能

// 含める機能：

// オブジェクト

// 確率（Math.random）

// 標準組み込みオブジェクト（Math, Date, String, Array など）

// ⑤ domAndBrowser.js
// 👉 ブラウザとDOM関連処理

// 含める機能：

// イベント（click, change など）

// DOM操作（document.getElementById など）

// ブラウザAPI（alert, prompt, fetchなど）





// プロンプト集
// 上の画像のコードを生成してください。
// プログラミング未経験の小学生でもわかるように以下を守って丁寧にコメントをつけてください。
// １）作業の順番がわかるように番号をつけてください
// ２）引数、関数、変数の関係性がわかるようにしてください

// 上記をwordpressの自作テーマのテックブログ記事のブロックエディターにそのまま貼り付けたいです。
// Prism.js導入用のコードを作って生成してください。

// 上記の内容と下記の内容を統合してください。
// わかりやすいように見出しをつけてください。
// コピペしてブログ記事に上げたいです。


// 上記のコードを理解するだけでなく、
// プログラミング未経験者の小学生でも自分で最初からコード書けるようになりたいです。
// 上記の内容はそのままでさらにコメントを追記してください。


// 下記の内容はそのままでコメントを
// さらに丁寧にしてプログラミング未経験者の小学生でもわかるように教えてください。
// とくにif文について小学生にもわかるように教えてください。



// 上記の内容はそのままでさらに
// 丁寧にプログラミング未経験者の小学生でもわかるようにコメントをつけてください。
// また関数や変数がどこのページとファイルに影響しているのかを記載してください。


// 下記の内容をアドラー心理学や原始仏教と照らし合わせて、
// 上記のブログ文章と統合して修正してください。













// 宇宙一わかりやすいJS
// https://youtu.be/ZE484EEuQ8k?si=qE-_dh3BZNDctbmq
// <!--1::00～-->


///戻り値その４(戻り値と関数 returnとundefind)
///undefindがあらわる理由
///※※※関数の処理にreturn戻り値がないと、呼び出し元に値が入らない。
function hello3() {
  //関数hello3
  console.log("hello3はこんにちはがでますか？"); // ← ※※関数の処理内容にreturn戻り値がない。ただ処理内容"hello3はこんにちはが～"が出力されるだけ。
}
let result3 = hello3(); // ← 変数result3。上記の関数hello3に戻り値がない。関数hello3の値は入らない。
console.log(result3); // ← 呼び出し元。値が入らないので、これは undefined と出る。
console.log("↑関数hello3。関数の処理にreturn戻り値がない場合はundefindが表示される");

///returnであらわる理由
///※※※関数にreturn戻り値があると、呼び出し元に値が入る。
function hello4() {
  //関数hello4
  return "returnを使うとhello4はこんにちはがでます！"; // ← ※※下記の呼び出し元用に、関数の処理内容にreturn戻り値がある。
}
let result4 = hello4(); // ← 変数result4。これに上記のreturnで返された関数hello4の値が入る
console.log(result4); // ← 呼び出し元。これは "returnを使うとhello" が表示されます。
console.log("↑関数hello4。関数の処理にreturn戻り値がある場合は値が出力される。");








// 宇宙一わかりやすいJS
// https://youtu.be/ZE484EEuQ8k?si=qE-_dh3BZNDctbmq
// <!--1:48:30～-->
//標準組み込み関数
// 🧪 parseInt を使ってみる（文字を数字に変える）

console.log(parseInt("2") + " ←これは数字の2になります（文字じゃなくて計算できる本物の数字）");
// 🔍 parseInt("2") は「文字の '2'」を 本物の数（数字 2）に変える魔法です。
//    これは JavaScript にもともと入っている『標準組み込みオブジェクト』の関数。
//    計算や数の変換をしたいときに使います。

console.log("2" + " ←これは文字の2です（数字じゃないよ）");
// 📝 この「2」はただの文字です。計算はできません。
//    数のように見えるけど「言葉」なので、"2" + "3" → "23" のようにつながるだけ。

// ===============================
// 🧠 標準組み込みオブジェクトの確認
// ===============================

console.log(console);
// 💬 console は JavaScript に組み込まれている「画面に表示するための道具セット」。
//    log（記録する）という関数を使って、開発者が画面に情報を出すときに使います。
// 🧠 console も 『標準組み込みオブジェクト』のひとつです。

console.log(Math);
// 📐 Math は「数学の便利な道具箱」です。
//    たとえば、四捨五入（Math.round）や、ランダムな数（Math.random）などができます。
// 🧠 Math も 『標準組み込みオブジェクト』です。
//    これも最初から JavaScript に入っていて、どこでも使えます。

// ===============================
// 🧠 console.log って何？
/*
console.log() は「中身を画面に見せる」ための特別な道具です。
もし console.log を使わずに Math や parseInt を使っても、
そのままでは結果が画面に見えません！
*/
Math.round(7.8);       // ← 実行されているけど、画面には出ない（何も見えない）
parseInt("100");       // ← 数字に変換されても、見えない！

// 👇 なので、ちゃんと console.log() で「見せる」必要があります：
console.log(Math.round(7.8));  // → 8 と表示される（7.8 を四捨五入した結果）
console.log(parseInt("100"));  // → 100 と表示される（"100" を数字に変換）

// ===============================
// 🧠 まとめ（わかりやすい表）
// ===============================

/*

| 項目                         | 例                  | 説明（やさしく）                                                                 |
|------------------------------|---------------------|-----------------------------------------------------------------------------------|
| ✅ オブジェクト               | { name: "たろう" }  | いろんな情報をまとめた「入れ物」みたいなもの。自分で作ることができる。             |
| ✅ 標準組み込みオブジェクト   | Math, console        | JavaScript に最初から入っている便利な道具箱。どこでもすぐ使える。                   |
| ✅ console.log（関数）        | console.log(...)    | 「画面に見せる」ための道具。console の中の log という名前の関数。                  |

*/

// 🎉 おしまい 🎉












// 宇宙一わかりやすいJS
// https://youtu.be/ZE484EEuQ8k?si=qE-_dh3BZNDctbmq
// <!--1:51:15～-->
//Q."ライオネル", "フェニクス", "ミズノカミ", "ソライア", "クロノス"を持つ配列myCreaturesを作成しなさい。


// ==========================================
// オリジナルキャラ名の配列（空想生物チーム）を作る
// ==========================================
// これは、自分のチームにいる「空想生物」の名前を並べた配列です。
const myCreatures = ["ライオネル", "フェニクス", "ミズノカミ", "ソライア", "クロノス"];
console.log("↑上の行の配列myCreaturesを表示 →" + myCreatures); 


// ==========================================
// Q. myCreatures に新しい仲間「ルーシオン」を追加しなさい。
// ==========================================
// push() を使うと、配列の一番うしろに新しい仲間を追加できます。
myCreatures.push("ルーシオン");

// 配列の中身を画面に表示する（console.log で確認）
console.log("↑上の行でmyCreatures.push(ルーシオン)で配列にルーシオンを追加した →" + myCreatures); // ["ライオネル", "フェニクス", "ミズノカミ", "ソライア", "クロノス", "ルーシオン"]

// ==========================================
// Q. myCreatures に今いくつの仲間がいるか出力しなさい。
// ==========================================
// 配列の「.length」を使うと、要素の数（仲間の人数）を知ることができます。
console.log("配列myCreaturesの現在の数 →"  + myCreatures.length); // 6（＝6体の空想生物がいる）

// ==========================================
// Q. oldGenerations と newGenerations を 1つの配列にまとめなさい。
// ==========================================
// それぞれ、ゲームの旧シリーズ名と新シリーズ名（オリジナル名）です。
const oldGenerations = ["フレイム", "リーフ", "アクア"];
const newGenerations = ["ライト", "シャドウ", "クリスタル"];

// concat() を使うと、2つの配列をくっつけることができます。
const allGenerations = oldGenerations.concat(newGenerations);

// まとめた結果を表示
console.log("↑上の行でconcatで 配列oldGenerations と 配列newGenerations をくっつけた →" + allGenerations);







// 宇宙一わかりやすいJS
// https://youtu.be/ZE484EEuQ8k?si=qE-_dh3BZNDctbmq
// =========================================
// 🌐【ブラウザAPIってなに？】🧠
// -----------------------------------------
// ⏰ 1:54:00～（参考タイムスタンプ）
// =========================================
//
// 📌 ブラウザの開発者ツール（DevTools）の「Console」画面で、
//     ↓このように入力してみましょう↓
//
//          👉 window
//
// 🖥️ すると、下記のような「標準組み込みオブジェクト」が表示されます：
//
//     📁 DOM（Document Object Model）
//     📁 BOM（Browser Object Model）
//     📁 alert(), setTimeout(), console.log() など...
//
// 🎯 つまり：
//     JavaScriptは「windowオブジェクト」にぶら下がって
//     動いている「機能の集まり」を使っている、ということ！
//
// 🧩 例：
//     console.log は実は... → window.console.log と同じ！
//
// 🔍 チェックポイント：
//     windowっていうのは、ブラウザ全体のことを表しているよ！

// -----------------------------------------
// 🖼️ イメージ図（アスキー風）
// -----------------------------------------
//          ┌─────────────────────────────┐
//          │         window（ブラウザ）         │
//          │  ┌─────┐ ┌────────┐ ┌──────┐ │
//          │  │ alert │ │ console  │ │ innerWidth │...│
//          │  └─────┘ └────────┘ └──────┘ │
//          └─────────────────────────────┘
//
// =========================================
// 📏【画面サイズの取得】🪟
// -----------------------------------------
// window.innerWidth / innerHeight とは？
// → ブラウザ画面の「表示領域の横幅・高さ」を取得できる便利なプロパティ！
//    ※ window. は省略してもOK
// =========================================

console.log("画面の横幅を表示する。※windowは省略できる。 →" + window.innerWidth);
// 🧭 出力例: 1280（← ブラウザの表示領域の横幅）

console.log("画面の高さを表示する。※windowは省略できる。 →" + window.innerHeight);
// 🧭 出力例: 720（← ブラウザの表示領域の高さ）

//
// 🗒️ 補足メモ：
// innerWidth/innerHeightはレスポンシブ対応などでもよく使われます。
// 画面サイズに応じてデザインを変える処理（メディアクエリ的なもの）にも活用されます。

// -----------------------------------------
// 🧠【さらに詳しく】innerHeightとは？
// -----------------------------------------
// 📌 innerHeight は、ブラウザウィンドウの中で、実際に「表示できる高さ」のこと。
//     - 画面の高さ ≠ ディスプレイの物理的な高さ！
//     - タブ・アドレスバー・ブックマークバーなどは含まれません。
//     - ユーザーが「見えている範囲」の高さだけを返します。
//
// 🧪 具体例：たとえばPCで次のような画面構成だったとします
//
// ┌─────────────────────────────┐
// │ タブ / URLバー（ここは除外）      ←❌ innerHeightに含まれない │
// ├─────────────────────────────┤
// │  ユーザーに見えているページ部分      ←✅ innerHeightで取得可能 │
// │  この範囲が 720px だったとします      ← 例）window.innerHeight = 720 │
// └─────────────────────────────┘
//
// 🧩 こんなときに使う：
// - 「スクロールが必要かどうか」を判定するとき
// - ヘッダーやフッターを画面いっぱいに広げるとき
// - 画面サイズに合わせたポップアップやアニメーションを表示するとき
//
// 🔁 高さを動的に取得する例：
//
// window.addEventListener("resize", () => {
//     console.log("リサイズ後の高さ：" + window.innerHeight + "px");
// });
//
// ✅ リサイズイベントと一緒に使うことで、
//    ユーザーの画面変更にリアルタイムで対応できる！




// -----------------------------------------
// 📄【補足】documentと入力するとどうなる？
// -----------------------------------------
// ▶️ Console画面で「document」と入力すると、
//     HTML全体の構造（DOMツリー）が取得できます。
//     これは「今表示されているページの設計図」のようなもの！
//
//     例）Googleのトップページで「document」と入力すると：
//        → <html>〜</html>までのタグ構造がそのまま出てくる
//
// 🧠 document は「window.document」の略記。
//     windowの中にある「ページ情報の入口」と覚えると◎
//
// 🧪 これを使って例えば以下のようなことができます：
//     console.log(document.title);   // ページのタイトルを取得
//     console.log(document.body);    // bodyタグ以下の要素を取得
// ┌────────────────────┐
// │       window       │  ← ブラウザ全体のAPI
// │  ┌────────────┐  │
// │  │  document   │  │  ← 表示中のページ（DOMツリー）
// │  │  ┌───────┐ │  │
// │  │  │ <html> │ │  │
// │  │  │  ...   │ │  │
// │  │  └───────┘ │  │
// │  └────────────┘  │
// └────────────────────┘











// 宇宙一わかりやすいJS
// https://youtu.be/ZE484EEuQ8k?si=qE-_dh3BZNDctbmq
// <!--1:56:40～-->


// =========================================
// 📝【document.querySelectorってなに？】🎯
// -----------------------------------------
// ▶️ ブラウザ画面（HTML）の中から、特定の要素を探して操作できるメソッド
//     - window.document.querySelector(...)
//     - よく使うCSSセレクタ（#id や .class）で指定できるのが便利！
//
//     ※ document は window.document の略称（省略OK）
// =========================================

// ▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼
// 🎯【目的】：HTMLの id="shingeki" にテキストを追加する
//     index.html 側に以下のようなタグがある前提：
//     <div id="shingeki"></div>
// ▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼▼

document.querySelector("#shingeki").innerText = 
    "一匹残らず駆逐してやる！"
    + "（← jsの document.querySelector('#shingeki').innerText を使って、"
    + "htmlの id=\"shingeki\" の場所にテキストを追加しています）";

// 🧠 解説：
// - document.querySelector("#shingeki")
//     → HTML内の「idがshingekiの要素」を取得
//
// - .innerText = "文字列"
//     → その要素の中のテキストを、指定した文字列に書き換える
//
// 🧪 結果：
// <div id="shingeki">一匹残らず駆逐してやる！...</div> となる！

// 🧩 よくある使い方：
// ・ボタンをクリックしたときにメッセージを表示
// ・エラーメッセージの表示切り替え
// ・ページの一部を動的に書き換えるなど





// 宇宙一わかりやすいJS
// https://youtu.be/ZE484EEuQ8k?si=qE-_dh3BZNDctbmq
///<!--2:00:00～-->

// =========================================
// ⏰【setTimeout / clearTimeout ってなに？】⌛️
// -----------------------------------------
// ▶️ 一定時間が経過した後に、ある処理を実行する関数。
//     JavaScriptの「非同期処理」の基本です。
// =========================================

// -----------------------------------------
// 🧭【目的】：1秒後にアラートを出す予約をするが、すぐにキャンセルする
// -----------------------------------------

const timer = setTimeout(function () {
  // 🧠 setTimeout(関数, ミリ秒) の形で使うよ！
  // ここでは 1000ミリ秒（＝1秒）後に下記の処理を実行：

  alert("setTimeoutで遅れてアラート!");
}, 1000); // ⏳ 1秒（1000ミリ秒）後にアラートが出る予定！

// -----------------------------------------
// 🚫 しかし…すぐに clearTimeout を呼んで予約をキャンセル！
// -----------------------------------------

clearTimeout(timer);
// ✅ これで上記の「timerに予約された処理」は実行されません！
//
// 🎯 イメージ：
// const timer = setTimeout(...) はタイマーの予約
// clearTimeout(timer) は「その予約を取り消す」命令






// 宇宙一わかりやすいJS
// https://youtu.be/ZE484EEuQ8k?si=qE-_dh3BZNDctbmq
///<!--2:02:19～-->


// =========================================
// 🔍【querySelector / querySelectorAll】🧩
// -----------------------------------------
// ▶️ HTMLの要素を「CSSセレクタ」で取得して、操作できる便利なメソッド
//     - querySelector     → 最初の1つだけ取得（id/class/タグOK）
//     - querySelectorAll  → 該当するすべてを取得（配列のようなNodeList）
// =========================================


// ✅ id="foofoo" の要素に、1つだけテキストを挿入
console.log(
  (document.querySelector("#foofoo").innerHTML =
        "← jsのdocument.querySelector(#foofoo).innerHTMLを使う。"
        + "HTMLの1つのidをquerySelectorでひとつの変数として取得した。"
        + "idはhtmlにおいて1ページに一つしか存在できない。"
        + "そしてBg-goldを呼び出した。")
);
// 🧠 ポイント：
// - querySelector("#foofoo") → id="foofoo" を取得（※ # が必要）
// - innerHTML = "..."        → 要素の中のHTMLを置き換える
// - id属性は1ページ内に1つだけ！


// ✅ .barbarクラスの要素をすべて取得し、[0]番目の中身を変更
console.log(
  (document.querySelectorAll(".barbar")[0].innerHTML =
        "← jsのdocument.querySelectorALL(barbar)[0].innerHTMLを使う。"
        + "HTMLの4つのbarbarクラスをquerySelectorAllで配列としてまとめた。"
        + "そして[0]番目のBg-Aquaを呼び出した。")
);
// 🧠 ポイント：
// - querySelectorAll(".barbar") → .barbar すべて取得（NodeList）
// - [0] → 最初の要素を選択
// - innerHTML で中身を書き換え


// ✅ .barbar の [1]番目の要素を操作（同じNodeListの続き）
console.log(
    (document.querySelectorAll(".barbar")[1].innerHTML =
        "← jsのdocument.querySelectorALL(barbar)[1].innerHTMLを使う。"
        + "barbarクラスの配列の中身を[1]番目のBg-Burlywoodを指定し、innerHTMLで編集する。"
        + "※※querySelectorAll（idもクラスも取得可）で取得した。")
);


// =========================================
// 🧰【getElementById / getElementsByClassName】🧰
// -----------------------------------------
// ▶️ より古くからある取得方法（HTMLCollectionが返る）
//     - getElementById            → id名を指定（1つだけ）
//     - getElementsByClassName   → クラス名を指定（複数、配列風）
// =========================================


// ✅ getElementById で id="foofoo" の要素を「直接取得」して、ログに表示
console.log(document.getElementById("foofoo"));

// 🧠 解説：
// - document.getElementById("foofoo") は、HTML内で id="foofoo" の要素を1つだけ取得するメソッド。
// - id属性は HTML文書内で「一意」である必要があるため、基本的に「1対1の関係」で要素操作ができる。
// - 同様の取得方法として querySelector("#foofoo") もあるが、
//   getElementById の方が「id取得に特化していて、少しだけ高速」とされている。

// 🖥️ なぜコンソールに <div id="foofoo" ...> がそのまま表示されるの？
// - この console.log(...) の結果として表示されるのは、HTML要素そのもの（DOMオブジェクト）。
// - そのため、ブラウザのコンソール画面上には次のように表示されます：
//
//     <div id="foofoo" style="background-color: gold"></div>
//
// - これは「文字列」ではなく、JSが取得した「DOMノード（要素本体）」を
//   ブラウザの開発者ツールが HTML形式でわかりやすく表示しているためです。

// ✅ このような表示は、DOM構造や属性の確認にとても便利です。

// -----------------------------------------
// 💡 補足：中身のテキストやHTMLを確認したい場合
// -----------------------------------------

// ✅ innerHTMLを使って、要素の「中のHTML内容」を取得
console.log(document.getElementById("foofoo").innerHTML);
// → 何も入っていなければ ""（空文字列）
// → 要素内にHTMLタグやテキストが入っていれば、それが出力されます

// 🔍 innerTextを使えば、「見た目上のテキスト」だけ取得することも可能
// console.log(document.getElementById("foofoo").innerText);



// ✅ getElementsByClassName で .barbar の[2]番目を編集
console.log(
  (document.getElementsByClassName("barbar")[2].innerHTML =
    "← jsのdocument.getElementsByClassName(barbar)[2].innerHTMLを使う。"
        + "barbarクラスの配列の中身を[2]番目のBg-coralを指定し、innerHTMLで編集する。"
        + "※※querySelectorAll（idもクラスも取得可）で取得した。")
);
// 🧠 getElementsByClassName → HTMLCollection（配列風オブジェクト）
//    ※ querySelectorAll と違い、配列ではないけど似たように扱える




// 宇宙一わかりやすいJS
// https://youtu.be/ZE484EEuQ8k?si=qE-_dh3BZNDctbmq
///<!--2:04:30～-->


// ✅ 変数 $zoozoo に .barbar クラスを持つ要素すべて（4つ）を配列風（NodeList）で格納しておく
const $zoozoo = document.querySelectorAll(".barbar");

// 🧠 解説：
// - querySelectorAll(".barbar") → .barbar クラスがついている全要素を取得（配列のようなNodeList）
// - 取得結果は「配列のように」番号でアクセスできる（例：[0], [1], ...）
// - ここでは、それらの要素を事前に $zoozoo という変数にまとめて格納している
//   → こうしておくと、あとで何度も同じ要素にアクセスしやすくなる！
// - 変数名に $ を付けているのは「DOM要素を保持していること」が一目で分かる命名スタイル（慣習）

// ✅ $zoozoo の [3]番目の要素（darkolivegreen背景）を innerHTML で編集
$zoozoo[3].innerHTML =
  "← jsで、あらかじめ変数 $zoozoo に"
  + "querySelectorAll（.barbar の4つのクラス）を格納している。"
  + "その変数 $zoozoo の [3] 番目を innerHTML で編集して、"
  + "内容を書き換えた。Bg-darkolivegreen（4番目の要素）。";

// 🧠 ポイント：
// - $zoozoo[3] は NodeList の4番目の要素（インデックスは0から始まる）
// - innerHTML を使うことで、その要素の中身を自由に変更できる（テキストだけでなくHTMLタグもOK）
// - 事前にまとめた変数から要素にアクセスすることで、コードが整理されて読みやすくなる！


// ===============================================
// 🧩【補足：DOM取得メソッドの比較】🛠️
// -----------------------------------------------
// ✅ それぞれの要素取得方法の違いと特徴：

// ▶️ document.querySelector / querySelectorAll
// - CSSセレクタ形式で柔軟に指定できる（id, class, タグ、属性などOK）
// - querySelector       → 最初の1つだけ取得
// - querySelectorAll    → 条件に合うすべてを NodeList で取得（配列風）
// ✔️ メリット：柔軟でシンプルな構文。CSSと同じ感覚で書ける
// ❌ デメリット：querySelectorAll は配列ではなく NodeList（完全な配列ではない）

// ▶️ document.getElementById("id名")
// - idを指定して「1つの要素」を高速に取得
// ✔️ メリット：高速で分かりやすい。idの取得に特化
// ❌ デメリット：id指定しかできない。柔軟性に欠ける

// ▶️ document.getElementsByClassName("クラス名")
// - クラス名に一致するすべての要素を HTMLCollection として取得（配列風）
// ✔️ メリット：クラス要素の一括取得に使える（古いブラウザでも安定）
// ❌ デメリット：querySelectorAll より機能が少ない（CSS属性セレクタ等が使えない）


// ===============================================
// 💡【補足：変数に格納しておく理由】
// -----------------------------------------------
// - 同じ要素やリストに複数回アクセスする場合、毎回DOMを検索するとパフォーマンスが低下する。
// - 一度取得した要素（やリスト）を変数に格納しておけば、何度でも再利用でき、読みやすく効率的なコードになる。
// - 開発時のデバッグやメンテナンスも簡単になる（変数名で意味が分かるため）。
// → 特に NodeList や HTMLCollection のような「複数要素を扱う場合」は、まとめて変数にしておくのがベストプラクティス！








// 宇宙一わかりやすいJS
// https://youtu.be/ZE484EEuQ8k?si=qE-_dh3BZNDctbmq
///<!--2:08:03～-->


////空っぽのHTMLクラス(.timeline)にappendChildで情報を持った変数($post)を入れ込む。
//↓↓↓ DOM用（HTMLのクラス用）の情報（タグの種類、クラス、クラス名、文章"おなか減ったなう"）を入れる
const $post = document.createElement("article"); //createElementでDOM用のHTMLタグを生成する。（今回は引数どおりのarticleタグを生成する。）
$post.setAttribute("class", "post"); //上記の変数$post"articleタグ"にDOM用の"クラス"（第一引数）を付与し、DOM用の"post"（第二引数）というクラス名をつける。
$post.innerText = "お腹減ったなう。(←空っぽのhtmlの.timelineクラスにappendChildで情報を持った変数$postを入れ込む。)"; //上記の変数$postに文章"おなか減ったなう"を付け足す。
//↓↓↓ HTMLからtimelineクラス（この段階ではまだ情報は空っぽ）を取得し、上記の$postの情報を入れる。
const $timeline = document.querySelectorAll(".timeline")[0]; //querySelectorAllでHTMLに記述した.timeline(引数)クラス（※ドット忘れずに）の[]番目を取得する。
$timeline.appendChild($post); //空っぽの変数$timelineにappendChildでクラスの情報$post(引数)を入れる。




///<!--2:10:00～-->
///イベント
// window（webページ全体に対して）、document（個々のHTML要素に対して）

// ↓↓↓リロードしたタイミング（load）で、警告を出す関数（alert）を実行するイベント。
window.addEventListener("load", function () {
  ///addEventListener第一引数（イベントのタイプ）、第二引数（イベント時に実行する関数）
  alert("読み込み完了");
});

/// あるidに対してボタンを押すと"クリックされた！"がコンソール出力されるイベントを設定する。
document.querySelector("#button").addEventListener("click", function () {
  ///querySelectorでHTMLのid="button"を取得する。
  console.log("クリックされた！"); ///addEventListenerでイベントを設定する。
});

// <!--2:13:45～-->
// Q.ボタンを押したら画面に"ピカチュウ"が表示されるプログラムを書いてください。
// 空っぽのHTMLのid(output)にJSのDOM操作innerTextで"ピカチュウ！"を入れ込む
// JSのクリックイベント用のボタンタグとクラスを作る(id=button22)
document.querySelector("#button22").addEventListener("click", function () {
    document.querySelector("#output").innerText = "ピカチュウ";
});


// <!--2:15:45～-->
// Q.ボタンを押したら20%の確率で「ピカチュウをゲットした！」、
// 80%の確立で「ざんねん！もう少しでつかまえられたのに！」と
// ダイアログで表示するプログラムを書きなさい

//ランダムな数字を生成して確率ゲームを作る。
//ボタンをクリックすると確率ゲームを発生させるイベントを作る。
document.querySelector("#button33").addEventListener("click", function () {//HTMLで作っておいたボタンのid=button33を取得する。
    if(Math.random() <= 0.2){//20%以下かどうか。Math.random()は1以下の数字「0～0.999999…」をランダムに生成する。
        alert("「ピカチュウをゲットした！」") ;//当てはまる場合（20%）return
    }else {//当てはまらない場合（80%）
        alert("「ざんねん！もう少しでつかまえられたのに！」");
    }
});


// <!--2:21:10～-->
//デバッグ
//
const getInitialname = (name) => {//引数nameに姓名（半角区切り）を渡すとイニシャルが返ってくる関数
    const nameArray = name.split(" ");//※ ←(" ")の間は半角で区切る！変数nameArray。splitメソッドで引数の値"Yamada Hiroki"を分割する。
    console.log("nameArray:" , nameArray);
    const initialLast = nameArray[0].slice(0,1);//変数initialLast。上記の値を配列の[0]番目としてsliceメソッドで抽出する。引数（姓）
    console.log("initialLast:", initialLast);
    const initialFirst = nameArray[1].slice(0,1);//引数（名）
    console.log("initialFirst:", initialFirst);
    return initialLast + "." + initialFirst;
}

const result55 = getInitialname("Yamada Hiroki");//今回引数nameの値は"Yamada Hiroki"。返ってくる期待の値はイニシャルの"Y.H"
console.log(result55);

