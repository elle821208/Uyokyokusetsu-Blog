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
function introduce(name, job) {
  //functionで関数introduceを定義し、 引数(関数に与える情報)name、job
  console.log(`私は${name}です。`); //コンソール出力。関数introduceの実行内容。
  console.log(`${job}です。`); //同上
}

introduce("ta1fukumoto", "エンジニア"); //上記で設定した関数introduceを実行、今回はコンソール出力する。あらかじめ引数の値も設定しておく。
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
  return height * width; //(3)関数areaの実行内容=戻り値。
};

console.log(area(12, 5)); //(1)呼び出し元。引数12,5を設定しておく。
//(4)関数areaをコンソール出力する際に戻り値が代入される。
//60

//関数を別の定数に代入して出力
const result2 = area(12, 5); //関数areaが定数resultに代入される。
console.log(result2); //定数resultを出力する。関数areaの引数、戻り値
//60

//戻り値その２（サムライエンジニアより）

function hello(name) {
  //(2)関数hello。引数(name)に呼び出し元の値'サムライエンジニア太郎'が代入される。

  return "こんにちは、" + name + "さん"; //(3)関数の実行内容=戻り値。引数の値を代入して計算する。
}

console.log(hello("サムライエンジニア太郎")); //(1)呼び出し元。引数の値に'サムライエンジニア太郎'を設定しておく。
//④呼び出す際に、戻り値が代入され出力される。
// 'こんにちは、' + 'サムライエンジニア太郎' + 'さん'
//がコンソール出力される。

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

//Little-Strange-Softwareリトルストレンジソフトウェアより
// javascript初心者 Math.random 乱数 ランダム おみくじ
//https://little-strange.hatenablog.com/entry/2021/05/21/235505

//１～６のいずれかの整数をランダムに返す
// Math.floor関数)(引数)
//「引数（ひきすう）」として与えた数値以下の、最大の整数を返します。
// 例えば Math.floor(2.3) なら 2 、Math.floor(5) なら 5 、 Math.floor(0.7) なら 0 という値になります。
// なお、引数が負の数だった場合…例えば Math.floor(-7.5) なら -8 、 Math.floor(-3) なら -3 という値が返ってくる事になります。

const moo = 1 + Math.floor(Math.random() * 6); //Math.floorにとって()内の"Math.random()*6"が引数になる。
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
const noo = Math.floor(Math.random() + 0.3);
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
const foo = 18000 + 10000; //const変数fooに値5+1を代入する。
console.log(foo); //変数fooを出力する。コンソールで6が表示される。

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
  //初期値:i変数の最初の配列の数は0、条件式iが配列listsの配列の数より小さい時、増減式i++で配列の数iが1ずつ増ええていく
  console.log(lists[i]); //配列listsの変数iの数(繰り返した数だけ)を呼び出す。
}

//繰り返し処理for文  for(初期値;条件式;増減式インクレメント;) {処理}  1:04:00～
//配列をただのconsole.logでなくfor文の中のconsole.logで取り出す。

const questions = [
  //下記の文章は三行。よって配列の数は0～2。
  "現在の日本の総理大臣の名前は", //←カンマを忘れずに！
  "令和7年は西暦で言うと何年？",
  "最も人口が多い国はどこ?",
];

//上記の配列をただのconsole.logでなくfor文の中のconsole.logで取り出す。
for (let index = 0; index < questions.length; index++) {
  //初期値:変数indexの最初の配列の数は0、条件式iが配列indexの配列の数より小さい時、増減式i++で配列の数iが1ずつ増ええていく
  console.log(questions[index]); //配列questionsの変数indexの数(繰り返した数)だけ呼び出す。
}
//let index = 0;で↓
//初期値：index数字の初期値は0。index数字は再代入可能にする。ループする度に変化するように設定する。
//index < questions.length;で↓
//条件式：index数字が配列の長さよりも小さい条件なら（この場合は0～2）ループする。
//index++で↓
//増減式（インクレメント）：ループする度に増減式で初期値のindex数字が増えていく。
//最後に波括弧内の処理が実行される。
//配列questionsのindex番目の値をconsoleで出力する。条件が満たされる間は繰り返す。

//条件式if文
//ユーザーがログインしているかどうかの判定のための変数isLogin
let isLogin = false; //変数を宣言。変数isLoginの値はfalseを代入する。
//上記で定義した変数isLoginの値（今回は"false"）を下記のif文で判定する。
if (isLogin === false) {
  //条件式:もしisLoginがfalseが等しい場合(===で等しいの意味)
  console.log("isLoginさんはfalseなのでログイン1してください"); //左を実行する。alertで警告文を出す。
}

//条件式の===は省略できる
// if (isLogin === true) とif (isLogin) は同じ意味
// if (isLogin === false) とif (!isLogin) は同じ意味

//if文（）
//論理演算子
let isLogin2 = true; //変数:isLogin2を宣言。値はtrueを代入する。
//上記で定義した定数isLogin2と定数の値（今回は"true"）を下記のif文で判定する。
if (!isLogin2) {
  //(!で等しくないの意味)
  //条件式:もしisLogin2がtrueと等しくない場合は
  console.log("isLogin2さんはログイン2してください"); //波括弧を実行する。左の警告文を出す
} else {
  //上記のif文が満たされない場合は
  console.log("isLogin2さんはログイン2が成功中"); //波括弧を実行する。左の警告文を出す
}

//elseif条件式 member社員 admin管理 owner社長 の三つの権限を持たせる <!--1:15:00～-->
const userType = "hohohoho"; //定数を宣言する。定数userTypeの値は"member"
//上記で定義した定数userTypeと定数の値（今回は"hohohoho"）を下記のif文で判定する。
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

//if文（定数と変数を宣言。数字の大小で判定。変数の値を再代入する。）
//Q.「myMoneyが500以上ならisShippingでtrueを返す」<!--1:17:30～-->
const myMoney = 1000; //その１。定数を宣言: myMoneyの値は1000を代入する
let isShipping = false; //その２。変数を宣言: isShippingの値はfalseを代入しておく。※後で再代入するためにletにする。
//上記で定義した定数myMoneyと定数の値（今回は"1000"）を下記のif文で判定する。
if (myMoney >= 500) {
  //条件式: もし定数myMoneyが500以上なら
  //{}内の処理を行う。
  //変数名isShippingの値を再代入する。頭にletをつけないことで変数isShippingに値trueを再代入する処理を行う。
  isShipping = true;
}
console.log(isShipping); //isShippingを出力する。

//※letで変数hogehogeを宣言。値は33を代入する。
let hogehoge = "33";
hogehoge = "44"; //letなしでhogehogeに値44を再代入する。
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
function hoo(callback) {
  //引数（関数に与える情報）にcallback関数をつける
  console.log("Hi,Tom!");
  callback(); //callback関数をつける
}

function ioo() {
  console.log("Hi,Ken!"); //callback関数
}

hoo(ioo);

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
const timer = setTimeout(function(){//定数timerにsetTimeout関数（時間指定）を入れておく。
    alert("setTimeoutで遅れてアラート!");
    }, 1000);//1秒遅れてアラート
    

    clearTimeout(timer);//上記の定数timer（時間指定）を解除する。
    

///<!--2:02:19～-->
//querySelector
console.log(document.querySelector("#foofoo"));//idは#をつける
console.log(document.querySelectorAll(".barbar"));//classは.をつける

console.log();document.getElementById("foofoo")//id
console.log();document.getElementsByClassName("bar")//class

