// alert("Hello！app.jsをshift+F10からのFiveserverでブラウザ上に表示した。");

//constで変数の宣言、変数への値の代入
const foo = 5 + 1;//const変数fooに値5+1を代入する。
console.log(foo);//変数fooを出力する。コンソールで6が表示される。

//letで変数の宣言、変数への値の代入
//※※letは再代入可能な変数。安全性のため基本的にconstを使う
let hoge = 1; //letで代入: 変数hogeに値1を代入する。
hoge = "22"; //※※letなしで再代入: 変数hogeに値22を再代入する。
console.log(hoge); //hogeに値が再代入され"22"が出力される。

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
let isLogin = false; //変数を宣言。変数isLoginの値はfalseを代入する。
if (isLogin === false) {
  //条件式:もしisLoginがとfalseが等しい場合(===で等しいの意味)
  alert("isLoginさんはfalseなのでログイン1してください"); //左を実行する。alertで警告文を出す。
}

//条件式の===は省略できる
// if (isLogin === true) とif (isLogin) は同じ意味
// if (isLogin === false) とif (!isLogin) は同じ意味

//論理演算子
let isLogin2 = true; //変数:isLogin2を宣言。値はtrueを代入する。
if (!isLogin2) {
  ///条件式:もしisLogin2がtrueと等しくない場合は(!で等しくないの意味)
  alert("isLogin2さんはログイン2してください"); //波括弧を実行する。左の警告文を出す
} else {
  //上記のif文が満たされない場合は
  alert("isLogin2さんはログイン2が成功中"); //波括弧を実行する。左の警告文を出す
}

//elseif条件式 member社員 admin管理 owner社長 の三つの権限を持たせる <!--1:15:00～-->
const userType = "hohohoho"; //定数を宣言する。定数userTypeの値は"member"
if (userType === "member") {
  //もし定数userTypeの値が"member"の場合
  alert("定数userTypeがただの「member」なのでアクセス3できません"); //波括弧を実行する。
} else if (userType === "admin") {
  ////もし定数userTypeの値が"admin"の場合
  alert("定数userTypeがただの「admin」なので今から10分だけアクセス3できます"); //波括弧を実行する。。
} else {
  ///member社員 admin管理でもない場合（owner社長の場合）
  console.log("ownerは自由にアクセス3成功できます");
}


//Q.「myMoneyが500以上ならisShippingでtrueを返す」<!--1:17:30～-->
const myMoney = 1000; //変数を宣言: myMoneyの値は1000を代入する
let isShipping = false; //変数を宣言: isShippingの値はfalseを代入する
if (myMoney >= 500) {
  //条件式: もしmyMoneyが500以上なら
  isShipping = true; //波括弧の処理を行う。(letなしで変数isShippingに値trueを再代入する処理を行う。)
}
console.log(isShipping); //isShippingを出力する。

//※letで変数hogehogeを宣言。値は33を代入する。
let hogehoge = "33";
hogehoge = "44";//letなしでhogehogeに値44を再代入する。
console.log(hogehoge); //"33"に値が再代入され"44"が出力される。



//関数function<!--1:19:00～-->

// if (new Date(), GetHours() > 20){
//     document.body.style.backgroundColor = "#000";
// }

// //↓関数化する
// function changeDarkMode() {
//     if (new Date(), GetHours() > 20){///上記if文と同じ内容
//         document.body.style.backgroundColor = "#000";
//     }           
// }

//関数を呼び出す
// changeDarkMode();



//コールバック関数<!--1:26:05～-->
function hoo(callback) {//引数にcallback関数をつける
    console.log("Hi,Tom!");
    callback();//callback関数をつける
}

function ioo() {
    console.log("Hi,Ken!");//callback関
}

hoo(ioo);



//戻り値<!--1:27:20～-->



//グローバル変数<!--1:29:00～-->
const bar5 = 5;
function joo() {//
    const bar6 = 6;
    console.log(bar6);//変数jooの中で呼び出す
}
console.log(bar5);//









