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

