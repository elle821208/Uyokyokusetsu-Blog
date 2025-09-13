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
console.log(typeof "ピカチュウ"); //""で囲って文字列string
console.log(typeof 10);
console.log(typeof true); //boolean論理値
console.log(typeof "null"); //""で囲って文字列string




//JavaScript入門]if – else文を使ってみよう(条件分岐)
//https://codelikes.com/beginner-use-if-javascript/
window.onload = function () {
  let randomNumber = Math.floor(Math.random() * 3);

  if (randomNumber === 0) {
    console.log("吉です。");
  } else if (randomNumber === 1) {
    console.log("小吉です。");
  } else if (randomNumber === 2) {
    console.log("中吉です。");
  }
};



// 宇宙一わかりやすいJS
// https://youtu.be/ZE484EEuQ8k?si=qE-_dh3BZNDctbmq
// 1:15:00〜

//条件式:if()の()に書いたことが当てはまれば{}内の処理を実行する。
//ユーザーがログインしているかどうかの判定のための変数isLogin
let isLogin1 = false; //変数を宣言。変数isLoginの値はfalseを代入する。
//上記で定義した変数isLoginの値（今回は"false"）を下記のif文で判定する。
if (isLogin1 === false) {
  //条件式:if()の()に書いたことが当てはまれば{}内の処理を実行する。
  // 今回はもしisLoginがfalseが等しい場合は処理を実行する(===で等しいの意味)
  console.log("出力される。→isLoginさんはfalseなのでログイン1してください。あらかじめ上記のletで関数isLoginに値を代入する(今回はfalse)。その後、条件式if()の()の中に書いたこと(今回はisLogin1 === false)が当てはまれば{}の中の処理を実行する。今回の処理はここのconsole.logで値を呼び出す。"); //左を実行する。alertで警告文を出す。
}

// ※↑↑↑条件式 if(===)の ===は省略できる

// if (isLogin === true)の 
// ===を省略すると
// if (isLogin) 

// if (isLogin === false)の 
// ===を省略すると
// if (!isLogin) 



//論理演算子
//!で等しくないの意味
//&&かつ
//|| または

let isLogin3 = true; //変数:isLogin2を宣言。値はtrueを代入する。
//true(トゥルー)は「本当」「はい」「OK」という意味。
//false(フォルス)は「うそ」「いいえ」「NG」という意味。
//ゲームで「ログインできた → true」「まだできてない → false」と考えるとわかりやすい。

//あらかじめ上記のletで定義した定数isLogin2と定数の値（今回は"true"）を下記のif文で判定する。
//if(条件) { … } は、「もし（条件）が当たったら {…} をやる」という意味の魔法の文。

if (!isLogin3) {
  // ! (びっくりマーク)は「反対にする」という意味のスイッチ。
  // 今 isLogin3 は true だから、!isLogin3 は「反対の false になる」。
  // (isLogin3===false と同じ意味)。
  // 条件式:もし isLogin3 が true と等しくない場合は
  console.log("通常の条件式の意味になる。!isLogin3(isLogin3===falseと同じ意味)に当てはまらない。よって出力されない →。あらかじめ上記のletで関数isLogin3に値を代入する(今回はisLogin3 = true)。その後、条件式if()の()の中に書いたことが当てはまれば{}の中の処理を実行する。今回の処理はここのconsole.logで値を呼び出す。→isLogin2さんはログイン2してください"); //波括弧を実行する。左の警告文を出す
} else {
  // 上記のif文が満たされない場合（= 反対のとき）はこっちのブロックに来る。
  // 今回は isLogin3 = true なので、!isLogin3 は false になるから else の中が実行される。
  console.log("elseにより条件式の反対の意味になる。!isLogin3(isLogin3===falseと同じ意味)が当てはまる。よって出力される →。isLogin2さんはログイン2が成功中"); //波括弧を実行する。左の警告文を出す
}

/*
【まとめ】
・true は「はい / OK」、false は「いいえ / ダメ」。
・! は「逆にするスイッチ」。
  例：!true → false、!false → true。
・if(条件) { … } は、「もし条件がOKなら … をやる」。
・else { … } は、「条件がダメなら … をやる」。
*/


// --- ここから &&（かつ）と ||（または）の例 --- //

let hasTicket = true;   //チケットを持っているか（trueなら持っている）
let isAdult = false;    //大人かどうか（false = 子供）

// && は「かつ（両方ともOKならtrue）」という意味。
//「チケットを持っていて、なおかつ大人なら入場できる」
if (hasTicket && isAdult) {
  console.log("チケットもあって大人なので入場できます！");
} else {
  console.log("チケットがないか、子供なので入場できません…");
}

// || は「または（どちらか1つでもOKならtrue）」という意味。
//「ご飯を食べた または お菓子を食べた ならお腹は満足」
let ateMeal = false;   //ご飯を食べたか
let ateSnack = true;   //お菓子を食べたか

if (ateMeal || ateSnack) {
  console.log("ご飯かお菓子を食べたのでお腹は大丈夫！");
} else {
  console.log("何も食べてないのでお腹が空いた…");
}

/*
【&& と || のイメージ】
・&&（かつ）:「両方ともYESでないとOKにならない」
   例：テストで「国語も数学も合格ならご褒美」 → 両方〇が必要
・||（または）:「どちらか1つでもYESならOK」
   例：「カレー または ラーメンがあれば夕飯OK」 → どっちかあればいい
*/




//elseif条件式 member社員 admin管理 owner社長 の三つの権限を持たせる <!--1:15:00～-->
const userType = "hohohoho"; //あらかじめconstで 定数を宣言する。今回の定数userTypeの値は"hohohoho"
//上記で定義した定数userTypeと定数の値（今回は"hohohoho"）を下記のif文で判定する。
if (userType === "member") {
  //もし定数userTypeの値が"member"の場合
  alert("出力されない。上記のuserTypeの値がmemberなら出力される(今回はhohohoho) → アクセス3できません"); //波括弧を実行する。
} else if (userType === "admin") {
  ////もし定数userTypeの値が"admin"の場合
  alert("出力されない。上記のuserTypeの値がadminなら出力される(今回はhohohoho) → 10分だけアクセス3できます"); //波括弧を実行する。。
} else {
  ///member社員 admin管理でもない場合（owner社長の場合）
  console.log("出力される。上記のuserTypeの値がhohohohoなので条件1、条件2にも当てはまらない。よって→ ownerは自由にアクセス3成功できます");
}




// 宇宙一わかりやすいJS
// https://youtu.be/ZE484EEuQ8k?si=qE-_dh3BZNDctbmq
// 1:17:00〜


//if文（定数と変数を宣言。数字の大小で判定。変数の値を再代入する。）
//Q.「myMoneyが500以上なら最初に定義されていたisShippingの値falseをtrueに書き換えて返す」
let isShipping = false; //その1。変数を宣言: isShippingの値はfalseを代入しておく。※後で再代入するためにletにする。
const myMoney = 1000; //その2。定数を宣言: myMoneyの値は1000を代入する
//上記で定義した定数myMoneyと定数の値（今回は"1000"）を下記のif文で判定する。
if (myMoney >= 500) {
  //条件式: もし定数myMoneyが500以上なら
  //{}内の処理を行う。
  //変数名isShippingの値を再代入する。頭にletをつけないことで変数isShippingに値trueを再代入する処理を行う。
  isShipping = true;
}
console.log("あらかじめletで変数isShippingの値はfalseを設定しておく。条件式if()の条件より、上記のconstで定義したmyMoneyの値が500以上なら、{}内の処理を実行しisShippingを書き換えてtrueを返す→" + isShipping); //isShippingを出力する。







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


