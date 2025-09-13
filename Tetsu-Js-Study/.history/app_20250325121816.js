alert("Hello！app.jsをshift+F10からのFiveserverでブラウザ上に表示した。");

//constで変数を宣言する
//左が変数 右が値
//変数fooを出力する
const foo = 5 + 1;
console.log(foo);

//letは再代入(書き換え)可能な変数※安全性のため基本的にconstを使う
let hoge = 1;
hoge = "2hoge";
console.log(hoge);//hogeに値が再代入され"2hoge"が出力される。

//変数result 計算結果は3
const result = 1 + 2;
console.log(result);

//""で囲うと文字列stringとして認識
console.log("Hello" + "World");
console.log("1" + "1"); //11になる

//値をわざと空にする時にするときにnullを使う
let errorMessage = null;
console.log(errorMessage);

//値を設定していないときはundefindが出力される
let errorMessage2;
console.log(errorMessage2);

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

//変数配列firstPokemonsを定義する
const firstPokemons = ["ニャオハ", "ホゲータ", "クワッス"];
console.log(firstPokemons[1]);

// for文  for(初期値;条件式;増減式;) {処理}  1:04:00～
const questions = [
  //下記の文章は三行。よって配列の数は0～2。
  "現在の日本の総理大臣の名前は", //←カンマを忘れずに！
  "令和7年は西暦で言うと何年？",
  "最も人口が多い国はどこ?",
];

for (let index = 0; index < questions.length; index++) {
  console.log(questions[index]);
}
//let index = 0;
//初期値：index数字の初期値は0。index数字は再代入可能にする。ループする度に変化するように設定する。
//index < questions.length;
//条件式：index数字が配列の長さよりも小さい条件なら（この場合は0～2）ループする。
//index++
//増減式（インクレメント）：ループする度に増減式で初期値のindex数字が増えていく。
//最後に波括弧内の処理が実行される。
//配列questionsのindex番目の値をconsoleで出力する。条件が満たされる間は繰り返す。

//条件式if文
//ユーザーがログインしているかどうかの判定のための変数isLogin
let isLogin = false; //変数を宣言。変数isLoginの値はfalse。
if (isLogin === false) {
  //条件式:もしisLoginがとfalseが等しい場合(===で等しいの意味)
  alert("ログイン1してください"); //左の警告文を出す
}

//条件式の===は省略できる
// if (isLogin === true) とif (isLogin) は同じ意味
// if (isLogin === false) とif (!isLogin) は同じ意味

//論理演算子
let isLogin2 = true; //変数:isLogin2を宣言。値はtrue。
if (!isLogin2) {///条件式:もしisLogin2がtrueと等しくない場合は(!で等しくないの意味)
    alert("ログイン2してください");//左の警告文を出す
} else {//上記のif文が満たされない場合は
  alert("ログイン2成功中"); //左の警告文を出す
}

//elseif条件式<!--1:15:00～-->
const userType = "member";//定数を宣言する。
if (userType === "member") {
    alert("userTypeが「member」でないためアクセス3できません");
} else if (userType === "admin") {
    alert("今から10分だけアクセス3できます");
} else {
    console.log("アクセス3成功");
}

//Q.「myMoneyが500以上ならisShippingでtrueを返す」<!--1:17:30～-->
const myMoney = 1000;//変数myMoneyの値は1000
let isShipping = false;//変数isShippingの値はfalse
if (myMoney > 500) {//myMoneyが500以上なら
    let isShipping = false;//現在の変数isShippingの値であるfalseを 
    let isShipping = true;//変数 let isShipping の値を再代入する処理。
}
console.log(isShipping);


//※letは再代入(書き換え)可能な変数※安全性のため基本的にconstを使う
let hogehoge = "3hoge";
hogehoge = "4hoge";
console.log(hogehoge);//"3hoge"に値が再代入され"4hoge"が出力される。