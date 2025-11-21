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















//お試しアラート
alert("お試しアラートapp.js30行あたりに記載→。shift+F10でFiveserverを使い表示した。エラーが出る場合はgoogle拡張機能を疑う！");





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




//変数goo 変数arrayを定義する
//[]で配列を定義して出力する
const goo = "bar";
const array = [1, "Hello", goo];

console.log(array[0]); //変数array[0]で配列の1番目 1を出力する
console.log(array[2]); //変数array[2]で配列の3番目 変数gooの中身barを出力する




//定数配列firstPokemonsを定義する
const firstPokemons = ["ニャオハ", "ホゲータ", "クワッス"];
console.log(firstPokemons[1]); //配列の2番目のホゲータ

//pushで配列を追加する。lengthで配列の数を取得する。
const firstPokemons22 = ["ニャオハ", "ホゲータ", "クワッス"];
firstPokemons22.push("ラリラータ");
console.log(firstPokemons22); //配列にラリラータが追加される。
console.log(firstPokemons22.length); //上記の配列の数を取得する。
//concatで配列をくっつける
console.log(firstPokemons.concat(firstPokemons22) + "←concatで上記の二つの配列をくっつけた");




//サムライエンジニア 繰り返し処理 for文
//https://www.sejuku.net/blog/20777
var lists = ["佐藤", "伊藤", "鈴木", "木村", "田中", "高橋"]; //配列lists
for (var i = 0; i < lists.length; i++) {
  //（左）初期値:i変数の最初の配列の数は0、（中央）条件式:iが配列listsの配列の数より小さい時に下記のconsole.logの呼び出しを行う、（右）増減式i++で配列の数iが1ずつ増ええていく
  console.log("上記の配列listsの中身を条件式に当てはまる間は呼び出す→" + lists[i]); //配列listsの変数iの数(繰り返した数だけ)を呼び出す。
}

//繰り返し処理for文  for(初期値;条件式;増減式インクレメント;) {処理}  1:04:00～
//配列をただのconsole.logでなくfor文の中のconsole.logで取り出す。




const questions = [
  //下記の文章は三行。よって配列の数は0～2。
  "配列questionsの中身↓", //←カンマを忘れずに！
  "(1)現在の日本の総理大臣の名前は", //←カンマを忘れずに！
  "(2)令和7年は西暦で言うと何年？",
  "(3)最も人口が多い国はどこ?",
];

//上記の配列をただのconsole.logでなくfor文の中のconsole.logで取り出す。
for (let index = 0; index < questions.length; index++) {
  //初期値:変数indexの最初の配列の数は0、条件式iが配列indexの配列の数より小さい時、増減式i++で配列の数iが1ずつ増ええていく
  console.log("上記の配列questionsを条件式に当てはまる間に呼び出す→"+ questions[index]); //配列questionsの変数indexの数(繰り返した数)だけ呼び出す。
}
//let index = 0;で↓
//初期値：index数字の初期値は0。index数字は再代入可能にする。ループする度に変化するように設定する。
//index < questions.length;で↓
//条件式：index数字が配列の長さよりも小さい条件なら（この場合は0～2）ループする。
//index++で↓
//増減式（インクレメント）：ループする度に増減式で初期値のindex数字が増えていく。
//最後に波括弧内の処理が実行される。
//配列questionsのindex番目の値をconsoleで出力する。条件が満たされる間は繰り返す。






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
//&&　かつ
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






//qittaより
//functionで関数を定義し、（）で引数を設定する。
function introduce(name, job) {
  //functionで関数introduceを定義し、 引数(関数に与える情報)name、job
  console.log(`ここが呼び出し元。上記の関数functon introduceに下記の値が入りここで呼び出される。→ 私は${name}です。`); //コンソール出力。関数introduceの実行内容。
  console.log(`${job}です。`); //同上
}

introduce("哲也。※引数1で上記のnameにわたる", "プログラマー。※ここは引数2で上記のjobに渡る"); //上記で設定した関数introduceを実行、今回はコンソール出力する。あらかじめ引数の値も設定しておく。
//関数introduceを実行すると設定した引数の値('ta1fukumoto', 'エンジニア')が関数introduceのname、jobに値が渡される。
//下記が表示される。
//私はta1fukumotoです。
//エンジニアです。

//関数式（無名関数）※関数とは異なる。
const introduce2 = function (name, job) {
  //右辺の"関数function()"を左辺"const定数"に代入している
  console.log(`私は${name}です。`);
  console.log(`${job}です。`);
};

//関数式を呼び出す際は定数名と引数
introduce2("tetsuya", "コーダー");
//私はtetsuyaです。
//コーダーです。

//アロー関数※戻り値はなし
//右辺の関数を"function()"から"()=>"に置き換えてコードをシンプルにする。
const introduce3 = (name, job) => {
  //(2)関数式introduce3(引数)。呼び出し元の引数の値が入る。
  console.log(`私は${name}です。`); //(3)コンソール出力。関数の実行内容。引数の値を入れて出力される。
  console.log(`${job}です。`); //同上
};

//(1)呼び出し元。(4)関数式introduce3を呼び出す。
introduce3("aya", "アドバイザー");
//私はayaです。
//アドバイザーです。

//qittaより
//戻り値その１（呼び出し元で受け取る処理結果）
//関数(アロー関数と関数式)
const area = (height, width) => {
  //(2)アロー関数式area（引数）。呼び出し元の引数の値が代入される。
  return height * width; //(3)関数areaの実行内容=戻り値return。値は60。（12×5の計算結果）
};

console.log("ここのconsoleが呼び出し元。右の関数area(12,5)を上記の関数area(height, width)とreturn height * widthで計算させてreturnでここに戻す" + area(12, 5)); //(1)呼び出し元。引数12,5を設定しておく。
//(4)呼び出し元で関数areaをコンソール出力する際に戻り値returnの値60が代入される。
//60

//関数を別の定数に代入して出力
const result2 = area(120,50); //上記の関数areaの(height, width)で計算させて、定数result2に代入される。
console.log("ここのconsoleがresult2の呼び出し元。関数area(120,50)の値を上記の関数area(height, width)とreturn height * widthで計算させてreturnでresult2がここに戻る" + result2); //定数result２を出力する。関数areaの引数、戻り値
//6000

    //戻り値その２（サムライエンジニアより）

    function hello(name) {
    //(2)関数hello。引数(name)に呼び出し元の値'サムライエンジニア太郎'が代入される。

    return "こんにちは、" + name + "さん"; //(3)関数の実行内容=戻り値。引数の値を代入して計算する。
    }

    console.log("ここのconsoleがhelloの呼び出し元。上記helloののnameに値が渡ってreturnでhelloがここに戻ってくる" + hello("サムライエンジニア太郎")); //(1)呼び出し元。引数の値に'サムライエンジニア太郎'を設定しておく。
    //④呼び出す際に、戻り値が代入され出力される。
    // 'こんにちは、' + 'サムライエンジニア太郎' + 'さん'
    //がコンソール出力される。





// 宇宙一わかりやすいJS
// https://youtu.be/ZE484EEuQ8k?si=qE-_dh3BZNDctbmq
// 1:19:00〜
//関数function<!--1:19:00～-->

// 現在の時刻が20時より大きい（21時〜23時）なら背景を黒にする
if (new Date().getHours() > 20) {
    document.body.style.backgroundColor = "#000";
}

// ↓上記のif文を関数化する
function changeDarkMode() {
    // 上記のif文と同じ内容
    if (new Date().getHours() > 20) {
        document.body.style.backgroundColor = "#000";
    }
}

// 関数を呼び出す
changeDarkMode();






// 宇宙一わかりやすいJS
// https://youtu.be/ZE484EEuQ8k?si=qE-_dh3BZNDctbmq
//コールバック関数<!--1:26:20～-->
// ▼ メイン関数（司会ロボットの役目）
function greetWithCallback(callbackAction) {
  // (2) ← 【ここに到着】ユーザーが (1) で一番下の greetWithCallback(追加関数) を呼んだので、
  //        メイン関数 greetWithCallback が動き始めたよ。
  //        ここで「callbackAction = sayGuestName」や「sayGuestAge」などになる。
  //        （callbackAction という名前の席に、好きな追加関数を座らせるイメージ）

  console.log("Hi,Tom!");
  // (3) ← メイン処理。まず自分のあいさつ「Hi,Tom!」を表示する。

  callbackAction();
  // (4) ← そのあと、メイン関数の引数 callbackAction() を実行。
  //        でも callbackAction の正体は sayGuestName などの追加関数！
  //        ここでバトンタッチして追加処理が始まるよ。↓

  // ★【コールバック関数のメリット】★
  // - このメイン関数 greetWithCallback は「何をするか」を固定せずに、
  //   実行する関数（callbackAction）をあとから外から自由に渡せるよ。
  // - たとえば sayGuestName → sayGuestAge に変えると、内容も変わる！
  // - 「メイン処理（Hi,Tom!）」と「追加処理（名前や年齢紹介）」を分けて書けるから、
  //   再利用しやすく、読みやすく、カスタマイズもしやすい！
  // - ★つまり：**「コールバック関数 = ユーザーが呼び出し元の引数を変えて動作を変えられる仕組み」！★
}

// ▼ 追加関数①：ゲストの名前を紹介
function sayGuestName() {
  // (5) ← メイン関数からバトンを受け取ってスタート！
  console.log("Hi,Ken!");
  // (6) ← 「Hi,Ken!」と表示して終了
}

// ▼ 追加関数②：ゲストの年齢を紹介
function sayGuestAge() {
  console.log("I'm 25 years old!");
}

// ▼ 追加関数③：ゲストの趣味を紹介
function sayGuestHobby() {
  console.log("I like martial arts!");
}

// ▼ 呼び出し元（ユーザーが自由に関数を指定できる！）

console.log("=== 名前を紹介する ===");
greetWithCallback(sayGuestName);
// (1) ← 最初にユーザーが greetWithCallback(sayGuestName) を実行。
//        → メイン → "Hi,Tom!" → sayGuestName() → "Hi,Ken!"

console.log("\n=== 年齢を紹介する ===");
greetWithCallback(sayGuestAge);
//        → メイン → "Hi,Tom!" → sayGuestAge() → "I'm 25 years old!"

console.log("\n=== 趣味を紹介する ===");
greetWithCallback(sayGuestHobby);
//        → メイン → "Hi,Tom!" → sayGuestHobby() → "I like martial arts!"


// ▼ 実行の流れまとめ図（sayGuestNameの例）▼
// (1) ユーザーが greetWithCallback(sayGuestName) を実行
//           ↓
// (2) メイン関数 greetWithCallback がスタート（callbackAction = sayGuestName）
//           ↓
// (3) "Hi,Tom!" を表示
//           ↓
// (4) callbackAction() を実行（実体は sayGuestName()）
//           ↓
// (5) sayGuestName 関数がスタート
//           ↓
// (6) "Hi,Ken!" を表示
//           ↓
//       完了！









//グローバル変数<!--1:29:00～-->
const bard = 5; //関数koo外。グローバル変数。変数bardを定義する。値は6。

//↓関数kooの中。スコープ内。
function koo() {
  const bard = 666; //関数koo内。ローカル変数。
  console.log(bard); // 666が表示される予定。
}
//↑関数kooの中。スコープ内。
koo(); //上記ローカル変数を表示させるために関数を実行。

console.log(bard); //関数koo外。グローバル変数を呼び出す。5が表示される。




//戻り値その１<!--1:27:20～-->
//Q.実行したら戻り値2000を返す関数"sonicBoom"を作成しなさい。
const sonicBoom = () => {
  //アロー関数式。()内に引数、{}内に処理を設定する。
  return 2000; //関数sonicBoomの実行内容=戻り値。
};
console.log(sonicBoom(2000)); //呼び出し元。()内の引数の値は20。関数sonicBoomを呼び出す。

//戻り値その２（戻り値と引数）
//Q.引数"lastDamage"を持ち<!--1:32:20～-->
//実行したら"lastDamage"に1.5をかけた値を
//戻り値として返す関数"metalBurst"を作成しなさい。
const metalBurst = (lastDamage) => {
  //(2)アロー関数式metalBurst。引数lastDamageに呼び出し元の値が入る。
  return lastDamage * 1.5; //(3)関数の実行内容。戻り値は"引数の値*1.5"。
};
console.log(metalBurst(50)); //（1）呼び出し元。(4)関数metalBurstを呼び出す。引数lastDamageの値は仮で"50"としてみた。






//Little-Strange-Softwareリトルストレンジソフトウェアより
// javascript初心者 Math.random 乱数 ランダム おみくじ
//https://little-strange.hatenablog.com/entry/2021/05/21/235505

//１～６のいずれかの整数をランダムに返す
// Math.floor関数)(引数)
//「引数（ひきすう）」として与えた数値以下の、最大の整数を返します。
// 例えば Math.floor(2.3) なら 2 、Math.floor(5) なら 5 、 Math.floor(0.7) なら 0 という値になります。
// なお、引数が負の数だった場合…例えば Math.floor(-7.5) なら -8 、 Math.floor(-3) なら -3 という値が返ってくる事になります。

const moo = 1 + Math.floor(Math.random() * 6); //整数Math.floorにとって()内の乱数"Math.random()*6"が引数になる。
console.log("ランダムおみくじMath.floorとMath.randomで1から6の乱数を生成→" + moo);
//いくつかのカッコが組み合わさっていますが、その一番内側から見ていきます。
// 乱数Math.random()*6
// ６種類の結果が欲しいので、
// 乱数Math.random()に6を掛けています。
// 乱数Math.random()は「0～0.999999…」（1未満）の範囲でしたが、それに6をかけた物は、
//「0～5.999999…」（6未満）の範囲内の、
// いずれかの数値、という事になります。（
// この時点では小数のある数値なので膨大なパターンの結果になりえます）
//そしてそれを、 整数Math.floor(Math.random()*6)…と、
// Math.floor関数の引数として与える事で、
// 「0か1か2か3か4か5」のどれか、という数値になります。
//結果として欲しいのは「1～6」なので、
// 1+Math.floor(Math.random()*6)と、単純に１を足すだけで、
// 「1か2か3か4か5か6」のどれかをランダムで返す「サイコロ」になります^^

//30％の確率で「当たり」を設定する。
// ※※30%で数字1を出す。(1は当たり）、70%で数字0を出す。（0はハズレ）
const noo = Math.floor(Math.random() + 0.3);
console.log("" + noo);

// 設定したい確率を、小数として Math.random() に足します。
// 今回の例は30%なので、0.3を足しています。
// また内側のカッコの内容から見ていきます。
// Math.random()+0.3
// Math.random()は「0～0.999999…」の範囲でしたが、それに0.3を足した物は、
// 「0.30～1.299999999…」(←0.3を足した)の範囲から、
// ランダムで数値が返ってくる事になります。
// 0.3を足しているので、全ての数字「0.30～1.299999999…」の内、「1以上」の部分は30％あり、
// 「1未満」の部分は残り70%ある、と範囲の大きさが分かれる事になります。
// そしてそれをまた、
// Math.floor(Math.random()+0.3)
// Math.floorの引数にする事で整数が返ってくる。
// 「1以上=30%」は1(1は当たり）、「1未満=70%」は0（0はハズレ）と分かれる事になりますが、その場合の「1以上」になる確率は前述の通り「足した小数に準ずる」事になります。

// ※※ソシャゲのガチャで超レアを引くように…例えば「1万分の1の確率」なんて鬼のような設定にするなら、
// Math.floor(Math.random()+0.0001)
// とすると「1万回に1回の割合で1になり、それ以外は0」という確率を設定できます^^




//戻り値その３（引数と乱数Math.random）
//Q.引数"theirHp"を持ち、実行したら
// <!--1:34:00～-->
//"theirHp"の値をそのまま戻り値として
//返す関数"hornDrill"を作成しなさい。
//ただし成功確率は30%とし、
//失敗した場合は0を返すようにしなさい。
//Hint
//*if文を使います
//Math.random()を使います

const hornDrill = (theirHp) => {
  //関数hornDrill ()内に引数theirHp を設定する。{}内に処理。
  if (Math.random() <= 0.3) {
    //乱数を生成する。もしランダムな「0～0.999999…」の数字がが0.3以下の時は、(30%のときは)
    return theirHp; //引数theirHpの値を返す
  } else {
    //上記と違う場合は
    return 0; //0を返す
  }
};

console.log(hornDrill(100) + "←関数hornDrillの実行結果ですよ"); //呼び出し元。
// ()は関数hornDrillの引数theirHpの値。仮で100とする。


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

// <!--1:37:00～-->
//オブジェクト（データをまとめて管理する箱のようなもの）
//プロパティ（情報）
//メソッド（オブジェクトが持つ関数のこと）

const snsUser = {
  //constで「オブジェクト名」を定義する。波括弧内に情報を入れておく。
  id: 1, //プロパティ名: 値
  userName: "Taro",
  gender: "male",
  like: function () {
    //メソッド名like:関数。{}内に処理を書く。※注意。今回likeは小文字。
    return "まいどおおきに！"; //console.logではundefindになる。
  },
  post: function () {},
  followers: ["Yamada", "Suzuki", "Tanaka"],
  following: ["Yamada", "Suzuki"],
  premium: true,
  darkMode: false,
  posts: null,
  settings: {
    //プロパティsettingsの中にオブジェクトを作る
    premium: true,
    darkMode: false,
  },
  actions: {
    like: () => {},
    post: () => {},
  },
};

//オブジェクトsnsUserの各プロパティを実行し情報を呼び出す。
console.log(snsUser.id + "←オブジェクトsnsUserのidの値ですよ"); //オブジェクト名.プロパティ名で値を取り出す。
console.log(snsUser.like()); //オブジェクト名.プロパティ名で値を取り出す。
console.log(snsUser.followers[0] + "←配列followersの0番目を出力"); //配列followersの0番目を出力
console.log(snsUser.settings.darkMode + "プロパティsettingsの中のプロパティdarkModeの値を出力");

// <!--1:41:48～-->
//thisでこのオブジェクトsnsUser2を参照する。
const snsUser2 = {
  //オブジェクトsnsUser2
  id: 1, //プロパティ名id:値は1
  userName: "Tomoko",
  post: function (contents) {
    //(2)メソッドpost。()内に引数contentsの値が入る。{}内は処理内容、今回はreturnで返す。
    return contents + "を投稿しました by…" + this.userName; //(3)戻り値。
    // ①"プログラミングなう。" + ②"を投稿しました by…" + ③"Tomoko"
  },
};

//(1)呼び出し元。オブジェクトsnsUser2のメソッドpostを実行し呼び出す。
//(4)呼び出す際に、メソッドの処理の値returnが返ってくる。
console.log(snsUser2.post("プログラミングなう。"));
// ()内の"プログラミングなう。"はメソッドpostの引数contentsに入る値。

// <!--1:42:50～-->
//オブジェクト、プロパティ情報、メソッド（[]配列）
//Q.ピカチュウのオブジェクトを作りなさい。含めるべきプロパティは下記。
// name(文字列 -> "ピカチュウ")
// level(数字 -> 18)
// types(文字列の配列 -> でんき )
// skills(文字列の配列 -> 10万ボルト、でんこうせっか、たいあたり)

const pikachu = {
  name: "ピカチュウ",
  level: 18,
  types: ["でんき"],
  skills: ["10万ボルト", "でんこうせっか", "たいあたり"],
};
console.log(pikachu.name + "←オブジェクトpikachu2のname");
console.log(pikachu.level + "←オブジェクトpikachu2のlevel");
console.log(pikachu.skills[0] + "←オブジェクトpikachu2の配列skillsの0番目");

// <!--1:45:07～-->
//オブジェクト、プロパティ情報、メソッド（[]配列、++インクレメント繰り返し、if文、pushプロパティ追加）
//Q.ピカチュウのオブジェクトに下記の仕様を満たすメソッド"levelUp"を追加しなさい。
//ー実行するとlevelが1増える。
//levelが20以上でskillsに"スパーク"が追加される。
//Hints:下記のコードを使います
// ※this.level++ インクレメント
// this.skills.push("スパーク");

const pikachu2 = {
  name: "ピカチュウ",
  level: 18,
  types: ["でんき"],
  skills: ["10万ボルト", "でんこうせっか", "たいあたり"], //配列skills。後で4番目の"スパーク"を追加する。powerUpメソッドのif文で判定する。

  levelUp: function () {
    this.level++; //pikachu2.level++。インクレメント++でプロパティlevelの値が1ずつ増加する。
    //※※※インクレメント（++）は、オブジェクトのプロパティを変更する操作
    //一度変更されたプロパティは、次の閲覧でも前の結果を引き継ぐ
    //だから、実行するたびに1 → 2 → 3 → 4 …増えていくのです
    if (this.level >= 20) {
      //もしthis.level(pikachu2オブジェクトのプロパティlevel)の値が20以上の場合
      this.skills.push("スパーク"); //プロパティskills配列の値にpushを追加する。
    }
  },
};

console.log("1st Pikachu2:", pikachu2.level, pikachu2.skills); //1stでレベル18。levelと配列skillsを表示する。
pikachu2.levelUp(); //オブジェクトpikachu2のメソッドlevelUpを実行する。
console.log("2nd Pikachu2:", pikachu2.level, pikachu2.skills); //2ndでレベル19。levelと配列skillsを表示する。
pikachu2.levelUp(); //オブジェクトpikachu2のメソッドlevelUpを実行する。
console.log("3rd Pikachu2:", pikachu2.level, pikachu2.skills); //3rdでレベル20。levelと配列skillsを表示する。
console.log(pikachu2.level, pikachu2.skills); //現在のレベル。

//インクレメント++はオブジェクトpikachu2の中で記憶され初期値levelを増やしていく。
//メソッドincrementを呼び出す度にthis.value見て、それを1だけ増やします。
//メソッドlevelUpを実行すると
//levelが1ずつ増えて、levelが20でskillsにスパークを追加する。

// <!--1:48:30～-->
//標準組み込み関数
console.log(parseInt("2") + "←parseIntを使うと数字の2"); //数字の2
console.log("2" + "←文字の2"); //文字の2

console.log(console);
console.log(Math);

// <!--1:51:15～-->
//Q."サンダー"、"ホウオウ"、"スイクン"、"ラティアス"、"パルキア"を持つ配列myPokemonsを作成しなさい。
const myPokemons = ["サンダー", "ホウオウ", "スイクン", "ラティアス", "パルキア"];
//Q.myPokemonsに新しい値"ミュウツー"を追加しなさい。
myPokemons.push("ミュウツー");
console.log(myPokemons);
//Q.myPokemonsが持つ値が今いくつあるか出力しなさい。
console.log(myPokemons.length);

//Q.oldVersionsとnewVersionsを一つの配列にまとめなさい。
const oldVersions = ["赤", "緑", "青"];
const newVersions = ["ルビー", "サファイア", "エメラルド"];

console.log(oldVersions.concat(newVersions) + "←concatで配列oldとnewをくっつけた");

// <!--1:54:00～-->
//ブラウザAPI

// <!--1:56:40～-->
//documentプロパティ window オブジェクト
/// ↓↓↓ index.htmlのid="pokemon555"を取得して文字を追加する操作をする。
document.querySelector("#pokemon555").innerText = "ポケモンゲットだぜ！（←jsのquerySelector）";

///<!--2:00:00～-->
///timer
const timer = setTimeout(function () {
  //定数timerにsetTimeout関数（時間指定）を入れておく。
  alert("setTimeoutで遅れてアラート!");
}, 1000); //1秒遅れてアラート

clearTimeout(timer); //上記の定数timer（時間指定）を解除する。

///<!--2:02:19～-->
//querySelector
//「querySelectorAll」は、JavaScriptで複数の要素を選択し操作するための強力なメソッドです。複雑な指定や複数の要素を選択する必要がある場合は「querySelectorAll」を使用するとよいでしょう。
console.log((document.querySelector("#foofoo").innerHTML = "<div>1つのidをquerySelectorでひとつの変数として取得した。htmlにおいてidは1ページに一つしか存在できない。</div>")); //idは#をつける。一つの変数としてカウントされる。htmlにおいてidは1ページに一つしか存在できない。
console.log((document.querySelectorAll(".barbar")[0].innerHTML = "<div>4つの.barbarクラスをquerySelectorAllで配列としてまとめた。これは[0]番目。</div>"));
console.log(
  (document.querySelectorAll(".barbar")[1].innerHTML = "<div>.barbarクラスの配列の中身を[番号]で指定し、innerHTMLで編集する。これは[1]番目。※※querySelectorAll（idもクラスも取得可）で取得した。</div>")
);
//単純なクラス名での選択の場合は`getElementByClassName`が便利
console.log(document.getElementById("foofoo")); //id。一つの変数としてカウントされる。
console.log((document.getElementsByClassName("barbar")[2].innerHTML = "<div>同様に配列を編集した。これは[2]番目。※※これはgetElementsByClassName（クラスのみ有効）で取得した。</div>")); //classを全て取得する。配列になる。

///<!--2:04:30～-->
const $zoozoo = document.querySelectorAll(".barbar"); //変数に4つのクラス（querySelectorAll（.barbarの4つのクラス））を格納しておく。
$zoozoo[3].innerHTML = "<div>あらかじめ変数$zoozooにquerySelectorAll（.barbarの4つのクラス）を格納している。変数$zoozooをinnerHTMLで編集する。これは[4]番目。</div > ";

///<!--2:08:03～-->
////空っぽのHTMLクラス(.timeline)にappendChildで情報を持った変数($post)を入れ込む。
//↓↓↓ DOM用（HTMLのクラス用）の情報（タグの種類、クラス、クラス名、文章"おなか減ったなう"）を入れる
const $post = document.createElement("article"); //createElementでDOM用のHTMLタグを生成する。（今回は引数どおりのarticleタグを生成する。）
$post.setAttribute("class", "post"); //上記の変数$post"articleタグ"にDOM用の"クラス"（第一引数）を付与し、DOM用の"post"（第二引数）というクラス名をつける。
$post.innerText = "お腹減ったなう。"; //上記の変数$postに文章"おなか減ったなう"を付け足す。
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

