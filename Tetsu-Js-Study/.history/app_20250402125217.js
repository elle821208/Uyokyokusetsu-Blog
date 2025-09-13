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


//qittaより
//functionで関数を定義し、（）で引数を設定する。
function introduce(name, job) {//functionで関数introduceを定義し、 引数(関数に与える情報)name、job
    console.log(`私は${name}です。`)//コンソール出力。関数introduceの実行内容。
    console.log(`${job}です。`)//同上
}

introduce('ta1fukumoto', 'エンジニア');//上記で設定した関数introduceを実行、今回はコンソール出力する。あらかじめ引数の値も設定しておく。
//関数introduceを実行すると設定した引数の値('ta1fukumoto', 'エンジニア')が関数introduceのname、jobに値が渡される。
//下記が表示される。
//私はta1fukumotoです。
//エンジニアです。


//関数式（無名関数）※関数とは異なる。
const introduce2 = function(name, job) {//右辺の"関数function()"を左辺"const定数"に代入している
    console.log(`私は${name}です。`)
    console.log(`${job}です。`)
}

//関数式を呼び出す際は定数名と引数
introduce2('tetsuya', 'コーダー');
//私はtetsuyaです。
//コーダーです。


//アロー関数※戻り値はなし
//右辺の関数を"function()"から"()=>"に置き換えてコードをシンプルにする。
const introduce3 = (name, job) => {//(2)関数式introduce3(引数)。呼び出し元の引数の値が入る。
    console.log(`私は${name}です。`);//(3)コンソール出力。関数の実行内容。引数の値を入れて出力される。
    console.log(`${job}です。`);//同上
}

//(1)呼び出し元。(4)関数式introduce3を呼び出す。
introduce3('aya', 'アドバイザー');
//私はayaです。
//アドバイザーです。


//qittaより
//戻り値その１（呼び出し元で受け取る処理結果）
//関数(アロー関数と関数式)
const area = (height, width) => {//(2)アロー関数式area（引数）。呼び出し元の引数の値が代入される。
    return height * width;//(3)関数areaの実行内容=戻り値。
};

console.log(area(12, 5));//(1)呼び出し元。引数12,5を設定しておく。
//(4)関数areaをコンソール出力する際に戻り値が代入される。
//60

//関数を別の定数に代入して出力
const result2 = area(12, 5);//関数areaが定数resultに代入される。
console.log(result2);//定数resultを出力する。関数areaの引数、戻り値
//60



//戻り値その２（サムライエンジニアより）

function hello(name) {//(2)関数hello。引数(name)に呼び出し元の値'サムライエンジニア太郎'が代入される。

    return 'こんにちは、' + name + 'さん';//(3)関数の実行内容=戻り値。引数の値を代入して計算する。

}

console.log(hello('サムライエンジニア太郎'));//(1)呼び出し元。引数の値に'サムライエンジニア太郎'を設定しておく。
//④呼び出す際に、戻り値が代入され出力される。
// 'こんにちは、' + 'サムライエンジニア太郎' + 'さん'
//がコンソール出力される。


//JavaScript入門]if – else文を使ってみよう(条件分岐)
//https://codelikes.com/beginner-use-if-javascript/
window.onload = function () {
    
    let randomNumber = Math.floor(Math.random() * 3);

    if (randomNumber === 0) {
      alert("吉です。");
    } else if (randomNumber === 1) {
      alert("小吉です。");
    } else if (randomNumber === 2) {
      alert("中吉です。");
    } 
  }



//Little-Strange-Softwareリトルストレンジソフトウェアより 
// javascript初心者 Math.random 乱数 ランダム おみくじ
//https://little-strange.hatenablog.com/entry/2021/05/21/235505


//１～６のいずれかの整数をランダムに返す
// Math.floor関数)(引数)
//「引数（ひきすう）」として与えた数値以下の、最大の整数を返します。
// 例えば Math.floor(2.3) なら 2 、Math.floor(5) なら 5 、 Math.floor(0.7) なら 0 という値になります。
// なお、引数が負の数だった場合…例えば Math.floor(-7.5) なら -8 、 Math.floor(-3) なら -3 という値が返ってくる事になります。

const moo = (1+Math.floor(Math.random()*6));//Math.floorにとって()内の"Math.random()*6"が引数になる。
console.log(moo);
//いくつかのカッコが組み合わさっていますが、その一番内側から見ていきます。
// Math.random()*6
// ６種類の結果が欲しいので、
// Math.random()に6を掛けています。
// Math.random()は「0～0.999999…」の範囲でしたが、それに6をかけた物は、
//「0～5.999999…」の範囲内の、
// いずれかの数値、という事になります。（
// この時点では小数のある数値なので膨大なパターンの結果になりえます）
//そしてそれを、 Math.floor(Math.random()*6)…と、
// Math.floor関数の引数として与える事で、
// 「0か1か2か3か4か5」のどれか、という数値になります。
//結果として欲しいのは「1～6」なので、
// 1+Math.floor(Math.random()*6)と、単純に１を足すだけで、
// 「1か2か3か4か5か6」のどれかをランダムで返す「サイコロ」になります^^


//30％の確率で「当たり」を設定する。
// ※※30%で数字1を出す。(1は当たり）、70%で数字0を出す。（0はハズレ）
const noo =(Math.floor(Math.random()+0.3));
console.log(noo);

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




//お試しアラート
alert("shift+F10でFiveserverを使い表示した。エラーが出る場合はgoogle拡張機能を疑う！");

//constで変数の宣言、変数への値の代入
const foo = 18000 + 10000;//const変数fooに値5+1を代入する。
console.log(foo);//変数fooを出力する。コンソールで6が表示される。

//letで変数の宣言、変数への値の代入
//※※letは再代入可能な変数。安全性のため基本的にconstを使う
let hoge = 1; //letで代入: 変数hogeに値1を代入する。
hoge = "22222"; //※※letなしで再代入: 変数hogeに値22を再代入する。
console.log(hoge); //hogeに値が再代入され"22222"が出力される。

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
  console.log("isLoginさんはfalseなのでログイン1してください"); //左を実行する。alertで警告文を出す。
}

//条件式の===は省略できる
// if (isLogin === true) とif (isLogin) は同じ意味
// if (isLogin === false) とif (!isLogin) は同じ意味

//論理演算子
let isLogin2 = true; //変数:isLogin2を宣言。値はtrueを代入する。
if (!isLogin2) {
  ///条件式:もしisLogin2がtrueと等しくない場合は(!で等しくないの意味)
  console.log("isLogin2さんはログイン2してください"); //波括弧を実行する。左の警告文を出す
} else {
  //上記のif文が満たされない場合は
  console.log("isLogin2さんはログイン2が成功中"); //波括弧を実行する。左の警告文を出す
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

//if文
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
function hoo(callback) {//引数（関数に与える情報）にcallback関数をつける
    console.log("Hi,Tom!");
    callback();//callback関数をつける
}

function ioo() {
    console.log("Hi,Ken!");//callback関数
}

hoo(ioo);

//グローバル変数<!--1:29:00～-->
const bard = 5;//関数koo外。グローバル変数。変数bardを定義する。値は6。

//↓関数kooの中。スコープ内。
function koo() {
    const bard = 666;//関数koo内。ローカル変数。
    console.log(bard); // 666が表示される予定。
}
//↑関数kooの中。スコープ内。
koo();//上記ローカル変数を表示させるために関数を実行。

console.log(bard);//関数koo外。グローバル変数を呼び出す。5が表示される。



//戻り値<!--1:27:20～--><!--1:31:21～-->
//Q.実行したら戻り値2000を返す関数"sonicBoom"を作成しなさい。
const sonicBoom = () => {//アロー関数式。()内に引数、{}内に処理を設定する。
    return 2000;//関数sonicBoomの実行内容=戻り値。
}
console.log(sonicBoom(2000));//呼び出し元。()内の引数の値は20。関数sonicBoomを呼び出す。

//引数と戻り値
//Q.引数"lastDamage"を持ち<!--1:32:20～-->
//実行したら"lastDamage"に1.5をかけた値を
//戻り値として返す関数"metalBurst"を作成しなさい。
const metalBurst = (lastDamage) => {//(2)アロー関数式metalBurst。引数lastDamageに呼び出し元の値が入る。
    return lastDamage*1.5;//(3)関数の実行内容。戻り値は"引数の値*1.5"。
}
console.log(metalBurst(50));//（1）呼び出し元。(4)関数metalBurstを呼び出す。引数lastDamageの値は仮で"50"としてみた。


//
//Q.引数"theirHp"を持ち、実行したら
// <!--1:34:00～-->
//"theirHp"の値をそのまま戻り値として
//返す関数"hornDrill"を作成しなさい。
//ただし成功確率は30%とし、
//失敗した場合は0を返すようにしなさい。
//Hint
//*if文を使います
//Math.random()を使います


const hornDrill = (theirHp) => {//関数hornDrill ()内に引数theirHp を設定する。{}内に処理。
    if (Math.random() <= 0.3) {//乱数を生成する。もしランダムな「0～0.999999…」の数字がが0.3以下の時は、(30%のときは)
        return theirHp;//引数theirHpの値を返す
    } else {//上記と違う場合は
        return 0;//0を返す
    }
}

console.log(hornDrill(100) + "←関数hornDrillの実行結果ですよ");//呼び出し元。
// ()は関数hornDrillの引数theirHpの値。仮で100とする。




// <!--1:37:00～-->
//オブジェクト（データをまとめて管理する箱のようなもの）
//プロパティ（情報）
//メソッド（オブジェクトが持つ関数のこと）

const snsUser = {//constで「オブジェクト名」を定義する。波括弧内に情報を入れておく。
    id: 1,//プロパティ名: 値
    userName: "Taro",
    gender: "male",
    like: function () {//メソッド名like:関数。{}内に処理を書く。※注意。今回likeは小文字。
        console.log("Like!");
    },
    post: function () {},
    followers: ["Yamada", "Suzuki", "Tanaka"],
    following: ["Yamada", "Suzuki"],
    premium: true,
    darkMode: false,
    posts: null,
    settings: {//プロパティsettingsの中にオブジェクトを作る
        premium: true,
        darkMode:false,
    },
    actions: {
        like:()=>{},
        post:()=>{},
    }
}

console.log(snsUser.id + "←オブジェクトsnsUserのidの値ですよ");//オブジェクト名.プロパティ名で値を取り出す。
console.log(snsUser.like() + "←オブジェクトsnsUserのメソッドlikeを出力");//オブジェクト名.プロパティ名で値を取り出す。
console.log(snsUser.followers[0] + "←配列followersの0番目を出力");//配列followersの0番目を出力
console.log(snsUser.settings.darkMode + "プロパティsettingsの中のプロパティdarkModeの値を出力");

// <!--1:41:48～-->
//thisでこのオブジェクトsnsUser2を参照する。
const snsUser2 = {
    id: 1,
    userName: "Tomoko",
    post: function (contents) {//(2)メソッドpost。()内に引数contentsの値が入る。{}内は処理内容、今回はreturnで返す。
        return contents + "を投稿しました by…" + this.userName;//(3)戻り値。
        // ①"プログラミングなう。" + ②"を投稿しました by…" + ③"Tomoko"
    }
};

console.log(snsUser2.post("プログラミングなう。"));//(1)呼び出し元。snsUser2のメソッドpostを呼び出す。
// ()内の"プログラミングなう。"はメソッドpostの引数contentsに入る値。



// <!--1:42:50～-->
//Q.ピカチュウのオブジェクトを作りなさい。含めるべきプロパティは下記。
// name(文字列 -> "ピカチュウ")
// level(数字 -> 18)
// types(文字列の配列 -> でんき )
// skills(文字列の配列 -> 10万ボルト、でんこうせっか、たいあたり)

const pikachu = {
    name: "ピカチュウ",
    level: "",
    
};






























