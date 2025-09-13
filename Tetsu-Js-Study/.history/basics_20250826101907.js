// ① basics.js
// 👉 JavaScriptの基本文法や構文をまとめるファイル

// 含める機能：

// 変数（let, const）

// データ型（文字列、数値、真偽値など）

// 論理演算子（&&, ||, !）

// 条件式

// if文

// デバッグ（console.log など）






//constで変数の宣言、変数への値の代入
const foo = 18000 + 10000; //const変数fooに値5+1を代入する。
console.log("constで変数fooを定義して呼び出す→" + foo); //変数fooを出力する。コンソールで28000が表示される。

//letで変数の宣言、変数への値の代入
//※※letは再代入可能な変数。安全性のため基本的にconstを使う
let hoge = 1; //letで代入: 変数hogeに値1を代入する。
hoge = "22222"; //※※letなしで再代入: 変数hogeに値22を再代入する。
console.log("letで変数hoge=1を宣言。その後に変数hogeに22222を再代入して呼び出す→" + hoge); //hogeに値が再代入され"22222"が出力される。

//変数result 計算結果は3
const result = 1 + 2;
console.log("constで定義した上記の変数result = 1+2 を呼び出す→" + result);

//""で囲うと文字列stringとして認識
console.log("Hello" + "World");
console.log("1" + "1"); //11になる

//値をわざと空にする時にするときにnullを使う
let errorMessage = null;
console.log("上記でletで変数errorMessageにnullという値を入れている→" + errorMessage);




//値を設定していないときはundefindが出力される
let errorMessage2;
console.log("ここは上記で値を設定していないのでundefindが出る→" + errorMessage2);






// 宇宙一わかりやすいJS
// https://youtu.be/ZE484EEuQ8k?si=qE-_dh3BZNDctbmq
// ::00〜



//データ型
console.log(typeof "ラスカル"); //""で囲って文字列string
console.log(typeof 10);
console.log(typeof true); //boolean論理値
console.log(typeof "null"); //""で囲って文字列string






// 宇宙一わかりやすいJS
// https://youtu.be/ZE484EEuQ8k?si=qE-_dh3BZNDctbmq
// 1:15:00〜

/// ===================================
// 🖥 ログイン状態チェックプログラム（false 判定）
// ===================================

// ユーザーがログインしているかどうかを表す変数
let isLoggedIn = false; 
// true = ログイン済み、false = 未ログイン

// if(条件式) { ... } は「もし条件がOKなら…する」
// === は「左と右がまったく同じか」を調べる
if (isLoggedIn === false) { // isLoggedIn が false のとき実行
  console.log(" ログインしてください ");
  console.log(" ← 変数 isLoggedIn の値が false なので、この if 文が実行されました。");
}

// 【補足】
// if (isLoggedIn === false) は「もし isLoggedIn が false なら…」という意味
// === は省略できる場合もある
// 例）if (isLoggedIn === true) → if (isLoggedIn)
//     if (isLoggedIn === false) → if (!isLoggedIn)
// true = 「はい / OK」、false = 「いいえ / NG」
//
// 【!（NOT演算子）について】
// 「!」は「反対・逆」を意味します。
// 例）!true → false
//     !false → true
// つまり、if (!isLoggedIn) は「もしログインしていないなら…」という意味になります。




// ===================================
// 🖥 ログイン状態チェックプログラム（true 判定)
// ===================================
console.log(" ↓↓ 今回は最初に変数 isUserLoggedIn の値を true で設定しておく。");
let isUserLoggedIn = true; 
// 変数 isUserLoggedIn にログイン状態を代入する
// true = ログイン済み、false = 未ログイン

// if(条件式) { ... } は「もし条件がOKなら…する」
// !（びっくりマーク）は「反対」にするスイッチ
// つまり !isUserLoggedIn は「isUserLoggedIn が false の場合と同じ意味」
if (!isUserLoggedIn) { // !がついているのでisUserLoggedIn が false のとき実行
  console.log(" 🚪ログインできていません ");
    console.log(" ← 今回は最初に設定した変数 isUserLoggedIn の値が true のため、この if 文は実行されません。");

} else { // それ以外（true）のとき実行
  console.log("✅ ログイン済みです！ようこそ 🎉");
  console.log(" ← 今回最初に設定した変数 isUserLoggedIn の値が true なので else 文が実行されました。");
  console.log(`if 条件式の "!isUserLoggedIn" は "isUserLoggedIn が false" と同じ意味です。今回は false ではないため、else に入りました。`);
}


// 【動作シミュレーション表】

// | isUserLoggedIn の値 | !isUserLoggedIn（条件） | 実行されるブロック | コンソール表示                         |
// |---------------------|-------------------------|--------------------|----------------------------------------|
// | true                | false                   | else               | ✅ ログイン済みです！ようこそ 🎉       |
// | false               | true                    | if                 | 🚪 ログインできていません ❌           |

// 【ポイント】
// ・true は「はい / OK」、false は「いいえ / NG」
// ・!true → false、!false → true
// ・if は「もし〜なら」、else は「それ以外なら」





//  ===================================
//    🖥 論理演算子（&& と ||）の例
//    ===================================

//    !   → 「反対」
//    &&  → 「かつ」（両方ともOKなら true）
//    ||  → 「または」（どちらか1つでもOKなら true）


// ---------- &&（かつ）の例 ----------
let hasTicket = true;   // チケットを持っているか
let isAdult = false;    // 大人かどうか
console.log("🎯 ↑↑↑ 今回の初期設定 → hasTicket = true チケットを持っている、 isAdult = false 子供");

// 「チケットを持っていて、なおかつ大人なら入場できる」
if (hasTicket && isAdult) {
  console.log("🎫 チケットもあって大人なので入場できます！ ✅");
  console.log(" ← もし初期設定では hasTicket と isAdult が両方 true なので、このメッセージが表示されます。");
} else {
  console.log("🚪 チケットがないか、子供なので入場できません… ❌");
  console.log(" ← 今回の初期設定では hasTicket = true 、 isAdult = false なので、この else 文が実行されます。");
  console.log(" ← もし両方が true でない場合は、上の『入場できます』メッセージは表示されません。");
}


// ---------- ||（または）の例 ----------
let ateMeal = false;   // ご飯を食べたか
let ateSnack = true;   // お菓子を食べたか
console.log("🎯 ↑↑↑ 今回の初期設定 → ateMeal = false ご飯を食べていない 、 ateSnack = true お菓子を食べた");

// 「ご飯を食べた または お菓子を食べた ならお腹は満足」
if (ateMeal || ateSnack) {
  console.log("🍽 ご飯かお菓子を食べたのでお腹は大丈夫！ 😋 ✅");
  console.log(" ← 今回の初期設定では ateMeal = false, ateSnack = true なので、この if 文が実行されます。");
  console.log(" ← もし両方とも false なら、このメッセージは表示されません。");
} else {
  console.log("🍴 何も食べてないのでお腹が空いた… 🥺 ❌");
  console.log(" ← 今回の初期設定では片方が true のため、この else 文は実行されません（表示されません）。");
}


// 【動作シミュレーション表】

// (1) &&（かつ）
// | hasTicket | isAdult | 判定結果 | 実行ブロック |
// |-----------|---------|----------|--------------|
// | true      | true    | true     | if           |
// | true      | false   | false    | else         |
// | false     | true    | false    | else         |
// | false     | false   | false    | else         |

// (2) ||（または）
// | ateMeal | ateSnack | 判定結果 | 実行ブロック |
// |---------|----------|----------|--------------|
// | true    | true     | true     | if           |
// | true    | false    | true     | if           |
// | false   | true     | true     | if           |
// | false   | false    | false    | else         |

// 【ポイント】
// ・&&（かつ） → 両方とも true なら true
// ・||（または） → どちらか1つでも true なら true
// ・!（反対） → true → false、false → true






// ===================================
// 🖥 ユーザー権限チェックプログラム（if / else if / else の違いがわかる版）
// ===================================

// ユーザーの権限を表す定数
// "member" = 社員, "admin" = 管理者, "owner" = 社長
const userType = "hohohoho"; 
// ↑今回は "hohohoho" なので、どの権限にも該当しないケースになります

// --------------------------------------------------
// if, else if, else の動きの流れ
// --------------------------------------------------
// 1. if(条件) → まず最初にこの条件をチェック
//    条件が true なら {} の中だけ実行して終了（下は見ない）
// 2. else if(条件) → if が false だった場合に次の条件をチェック
//    これも true なら {} の中だけ実行して終了
// 3. else → 上の条件がすべて false の場合、必ずここが実行される
//    条件は書かない（必ず実行される最後の保険の処理）
// --------------------------------------------------

console.log("=== 条件分岐スタート ===");

if (userType === "member") { 
  console.log("👷 社員：アクセスできません ❌");
  console.log(` ← userType が "member" の場合だけ実行（今回は "${userType}" なので実行されない）`);

} else if (userType === "admin") { 
  console.log("🛠 管理者：10分だけアクセス可能 ⏳");
  console.log(` ← userType が "admin" の場合だけ実行（今回は "${userType}" なので実行されない）`);

} else { 
  console.log("👑 社長または該当なし：自由にアクセス可能 🎉");
  console.log(` ↑ 上のどれにも当てはまらなかったのでここが実行（今回は "${userType}"）`);
}

console.log("=== 条件分岐おわり ===");

/*
【動作シミュレーション表】

| userType の値 | 流れ                                         | 実行されるブロック | 出力内容                              |
|---------------|---------------------------------------------|--------------------|---------------------------------------|
| "member"      | if が true → そこで終了                     | if                 | 👷 社員：アクセスできません ❌         |
| "admin"       | if が false → else if が true → そこで終了   | else if            | 🛠 管理者：10分だけアクセス可能 ⏳     |
| "owner"       | if false → else if false → else 実行         | else               | 👑 社長または該当なし：自由にアクセス可能 🎉 |
| その他        | if false → else if false → else 実行         | else               | 👑 社長または該当なし：自由にアクセス可能 🎉 |

【ポイント】
- if は「最初にチェックする条件」
- else if は「if がダメだったときに次に試す条件」
- else は「どれもダメだったら実行する最後の処理」
- 条件に当てはまった時点で下のブロックはもう見ない（スキップする）
*/






// 宇宙一わかりやすいJS
// https://youtu.be/ZE484EEuQ8k?si=qE-_dh3BZNDctbmq
// 1:17:00〜


// ===================================
// 🖥 if文で条件判定＆変数の値を変える例
// ===================================

// 変数isShippingを宣言し、最初は「発送しない」状態(false)を値にしておく
let isShipping = false; 

// 所持金を表す定数myMoney（今回は1000円）
const myMoney = 1000; 

// --------------------------------------------------
// if文の意味：もし条件がtrueなら { } の中を実行する
// 条件は「所持金（定数myMoney）が500以上かどうか」
// --------------------------------------------------
if (myMoney >= 500) {
  // 所持金（定数myMoney）が500円以上なら発送する(trueに変える)
  isShipping = true; // 変数isShippingの値を false から true に書き換える
}

// 最終的な発送状態をコンソールに表示する
console.log(
  "▶ 所持金（定数myMoney）が500以上なら発送する条件で判定しました。"
  + "\n 初めの値は isShipping = false（発送しない）でしたが、"
  + `\n myMoney = ${myMoney} なので条件がtrueとなり、isShippingの値を true に変更しました。`
  + `\n 最終結果：変数isShippingの値 = ${isShipping}`
);

/*
【ポイントまとめ】
・letで宣言した変数は後から値を変えられる（再代入できる）
・constで宣言した定数は値を変えられない
・if(条件) { … } は、「もし条件がtrueなら中の処理を実行する」
・比較演算子 >= は「〜以上」の意味
*/









// 宇宙一わかりやすいJS
// https://youtu.be/ZE484EEuQ8k?si=qE-_dh3BZNDctbmq
// <!--1:29:00～-->
// =======================================
// 🌏 グローバル変数とローカル変数の違いの例
// =======================================


let globalValue = 1; // グローバル変数

function displayValue() {
  const localValue = 2; // ローカル変数（関数内限定）
  console.log("関数内のlocalValue: " + localValue);
}

displayValue();

console.log("関数外のglobalValue: " + globalValue);



// 🌏 (1) グローバル変数を定義（プログラム全体で使える変数）
// 「グローバル変数」はプログラムのどこからでもアクセスできる、学校全体のルールのようなもの。
let number = 1; // 🌏 (1-1) 【グローバル変数】 number に「1」を入れる
// この変数は関数の「外」にあり、プログラムのどこからでも使えます

// 🏠 (2) 関数 showNumber を作る（ローカルスコープ）
// 「関数」はやりたいことをまとめたレシピや手順書です。
// 関数の中は「ローカルスコープ」と呼ばれ、関数の外とは別の世界です。
function showNumber() {
  // 🏠 【関数の中（ローカルスコープ）】
  // 関数の中だけで使える特別な変数「ローカル変数」を作れます。

  const number = 2; // 🏠 (2-2) 【ローカル変数】 number に「2」を入れる
  // 🌏 グローバル変数と同じ名前ですが、関数の中だけの別物です！

  // 🏠 関数の中でローカル変数 number の値を表示
  console.log("🏠 【関数の中】ローカル変数 number の値 → " + number);
  // ⚠️ ここは関数の中だけの表示なので、関数を「呼び出して」初めて動きます！
}

// 🏠 (2-4) 関数 showNumber の定義はここまで（まだ動いていません）

// 👇 (3) 【関数は外から動かす（呼び出す）】
// 関数を作っただけでは動かないので、ここで実行します
showNumber(); 
// 👇 (3-1) 関数の中の処理が動き、ローカル変数 number の値 2 が表示されます

// 🌏 (4) 【関数の外（グローバルスコープ）】でグローバル変数の値を表示
console.log("🌏 【関数の外】グローバル変数 number の値 → " + number);
// 🌏 関数の外ではグローバル変数 number（=1）が使われます
// 🏠 関数内のローカル変数は関数の外からは見えません（使えません）






