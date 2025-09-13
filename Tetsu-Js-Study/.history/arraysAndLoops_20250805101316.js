// ③ arraysAndLoops.js
// 👉 繰り返しと配列操作

// 含める機能：

// 配列

// for文

// ループ文（while, do...whileなど）


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