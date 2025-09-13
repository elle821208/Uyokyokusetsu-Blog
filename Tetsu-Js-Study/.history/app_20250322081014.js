// alert("Hello World!");

//constで変数を宣言する
//左が変数 右が値
//変数fooを出力する
const foo = 5 + 1;
console.log(foo);

//letは書き換え可能な変数※安全性のため基本的にconstを使う
let hoge = 1;
hoge = 2;
console.log(hoge);

//変数計算結果は3
const result = 1 + 2;
console.log(result); 

//""で囲うと文字列stringとして認識
console.log("Hello" + "World");
console.log("1" + "1");//11になる

//値をわざと空にする時にするときにnullを使う
let errorMessage = null
console.log(errorMessage);

//値を設定していないときはundefindが出力される
let errorMessage2 
console.log(errorMessage2);


//データ型
console.log(typeof "ピカチュウ");//string
console.log(typeof 10);
console.log(typeof true);
console.log(typeof"null");




