// ④ objectsAndBuiltIns.js
// 👉 オブジェクトと標準組み込みの機能

// 含める機能：

// オブジェクト

// 確率（Math.random）

// 標準組み込みオブジェクト（Math, Date, String, Array など）



// 宇宙一わかりやすいJS
// https://youtu.be/ZE484EEuQ8k?si=qE-_dh3BZNDctbmq
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
    return "まいどおおきに！"; //「もしreturn文がない場合、関数をconsole.log()で呼ぶとundefinedが表示される」
  },
  post: function () {
    // ↓ returnがないので戻り値がundefinedになる
    "投稿しました！"; // この文字列は書かれているが、returnで返していない
  },
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
console.log(snsUser.id + "←snsUser.id で上記の設定した情報（constで定義したオブジェクトsnsUser {}内のプロパティid: プロパティの値1）を呼び出す。"); //オブジェクト名.プロパティ名で値を取り出す。
console.log(snsUser.like() + "←snsUser.like() で上記のプロパティlike関数のreturnの値「まいどおおきに」だけを取り出す。"); //オブジェクト名.プロパティ名で値を取り出す。
console.log(snsUser.post() + " ←snsUser.post() で上記のプロパティpost関数の値を呼び出す。 post関数にreturnがないので、undefinedになる");
console.log(snsUser.followers[0] + "←snsUser.followers[0] で上記のプロパティfollowers配列の]0]番目yamadaを出力"); //配列followersの0番目を出力
console.log(snsUser.settings.darkMode + "snsUser.settings.darkMode で 上記のプロパティsettingsの中にさらに作ったプロパティdarkModeの値falseを出力");





// 宇宙一わかりやすいJS
// https://youtu.be/ZE484EEuQ8k?si=qE-_dh3BZNDctbmq
// <!--1:41:48～-->
// =======================================
// 🧱 Thisを使う。オブジェクト snsUser2 を定義する
// =======================================

const snsUser2 = {
  // (1-1) オブジェクト snsUser2 を作成。
  //       SNS ユーザー情報をまとめたデータのかたまり。

  id: 1,
  // (1-2) プロパティ id を定義。値は 1。
  //       これはユーザー識別用の番号のようなもの。

  userName: "Tomoko",
  // (1-3) プロパティ userName を定義。値は "Tomoko"。
  //       このユーザーの名前として使われる。

  post: function (contents) {
    // (1-4) 関数メソッド post を定義。これは「投稿する動作」を表す関数。
    //       引数 contents は投稿内容（文字列）を受け取る。

    return contents + "を投稿しました by…" + this.userName;
    // (1-5) 戻り値を定義。
    //       「投稿内容」＋「固定メッセージ」＋「ユーザー名（this.userName）」を連結して返す。
    //       `this.userName` により、「このオブジェクト自身の userName」を参照している。

    // 🧠【this の意味と役割】
    // - この関数は「snsUser2.post(...)」という形で呼び出されているため、
    //   この this は「snsUser2 オブジェクトそのもの」を指している。
    // - よって this.userName は snsUser2.userName と同じ意味になる。
    //   → この場合、"Tomoko" という値が参照される。

    // ✅【this を使うメリット】
    // - userName を直接書かずに this を使うことで、同じ関数を他のオブジェクトに使いまわせる（再利用性◎）。
    // - オブジェクト内のプロパティを柔軟に参照できるため、設計がシンプルで保守性が高い。
    // - userName を後から変更しても、常に最新の値が使われる。

    // ❌【this を使わなかった場合】
    // たとえば次のように書いた場合：
    //   return contents + "を投稿しました by…" + "Tomoko";
    // - ユーザー名が固定になり、他のユーザーオブジェクトに使いまわせない。
    // - ユーザー名を変更しても return の内容に反映されない。
    // → 保守性・柔軟性が低くなる。
  },
};

// =======================================
// 📢 関数を呼び出して戻り値を表示する
// =======================================

console.log(
  "呼び出し元。snsUser2.post(引数: プログラミングなう。) を実行。" +
  "オブジェクト snsUser2 の post 関数メソッド内の return により、" +
  "引数 contents（＝プログラミングなう。） + 'を投稿しました by…' + this.userName（＝Tomoko）" +
  " が連結された文字列を返す → " +
  snsUser2.post("プログラミングなう。")
);
// (2-1) snsUser2 オブジェクトの post メソッドを呼び出す。
// (2-2) 引数として "プログラミングなう。" を渡して実行。
//       この値は、メソッド内の contents に渡される。
// (2-3) 実行すると、return により以下の文字列が生成される：
//        → "プログラミングなう。を投稿しました by…Tomoko"
// (2-4) その文字列が関数の外に返され、console.log によって表示される。


// =======================================
// 🔄 this を使わなかった場合（固定値で記述）
// =======================================

const snsUser3 = {
  userName: "Hana",
  post: function (contents) {
    return contents + "を投稿しました by…" + "Hana";
    // ⚠️ ユーザー名が固定されているため、
    //     他のユーザーにこのメソッドを再利用することができない。
  },
};

console.log(snsUser3.post("今日は晴れ☀"));
// 出力例: "今日は晴れ☀を投稿しました by…Hana"


// =======================================
// ⚠️ アロー関数で書いた場合（this が使えない例）
// =======================================

const snsUser4 = {
  userName: "Ken",
  post: (contents) => {
    return contents + "を投稿しました by…" + this.userName;
    // ⚠️ アロー関数は this を「定義された場所の外側」から引き継ぐ。
    //     この場合、this は snsUser4 ではなく、グローバル（もしくは undefined）を指す。
    //     つまり userName が正しく取得できない（undefined になる可能性あり）。
  },
};

console.log(snsUser4.post("お昼ご飯なう🍜"));
// 出力例: "お昼ご飯なう🍜を投稿しました by…undefined"
// ❗ このように、アロー関数ではオブジェクトの this は期待通りに動作しない。

// ✅【結論】
// - オブジェクトメソッドで this を使う場合は、アロー関数ではなく function を使う。
// - アロー関数は this をバインドしないため、this が必要な場面には不向き。






// 宇宙一わかりやすいJS
// https://youtu.be/ZE484EEuQ8k?si=qE-_dh3BZNDctbmq
// <!--1:42:50～-->

//オブジェクト、プロパティ情報、メソッド（[]配列）
//Q.キャラクター「デンコウ」のオブジェクトを作りなさい。含めるべきプロパティは下記。
// name(文字列 -> "デンコウ")
// level(数字 -> 18)
// types(文字列の配列 -> でんき )
// skills(文字列の配列 -> ライトスパーク、フラッシュダッシュ、ショックパンチ)

const denkou = {
  name: "デンコウ",
  level: 18,
  types: ["でんき"],
  skills: ["ライトスパーク", "フラッシュダッシュ", "ショックパンチ"],
};

console.log(denkou.name + " ← オブジェクトdenkouのname デンコウ");
console.log(denkou.level + " ← オブジェクトdenkouのlevel 18");
console.log(denkou.skills[0] + " ← オブジェクトdenkouの配列skillsの0番目 ライトスパーク");






// 宇宙一わかりやすいJS
// https://youtu.be/ZE484EEuQ8k?si=qE-_dh3BZNDctbmq
// <!--1:45:07～-->



//オブジェクト、プロパティ情報、メソッド（[]配列、++インクレメント繰り返し、if文、pushプロパティ追加）
//Q.のオブジェクトに下記のスパークバディ仕様を満たすメソッド"levelUp"を追加しなさい。
//ー実行するとlevelが1増える。
//levelが20以上でskillsに"ライトニングスパーク"が追加される。
//Hints:下記のコードを使います
// ※this.level++ インクレメント
// this.skills.push("ライトニングスパーク");


//  ↓↓コードのみ
const sparkBuddyAlt = {
  name: "スパークバディ",
  level: 18,
  types: ["でんき"],
  skills: ["エレクトロボルト", "スピードダッシュ", "パワータックル"],
  levelUp: function () {
    this.level++;
    if (this.level >= 20) {
      this.skills.push("ライトニングスパーク");
    }
  },
};

console.log(sparkBuddyAlt.level, sparkBuddyAlt.skills);

sparkBuddyAlt.levelUp();
console.log(sparkBuddyAlt.level, sparkBuddyAlt.skills);

sparkBuddyAlt.levelUp();
console.log(sparkBuddyAlt.level, sparkBuddyAlt.skills);

// ↑↑↑コードのみ




// ↓↓↓コメント付き
const sparkBuddy = {
  // (1-1) オブジェクト sparkBuddy を作成。
  //       これはオリジナルキャラクター「スパークバディ」の情報をまとめたもの。

  name: "スパークバディ",
  // (1-2) プロパティ name。文字列 "スパークバディ" を格納。
  //       キャラクターの名前を示す。

  level: 18,
  // (1-3) プロパティ level。現在のレベルを数値で表す。
  //       初期値は 18。

  types: ["でんき"],
  // (1-4) プロパティ types。配列形式でタイプ（属性）を記録。
  //       ここでは 1 つだけでんきタイプ。

  skills: ["エレクトロボルト", "スピードダッシュ", "パワータックル"],
  // (1-5) プロパティ skills。覚えている技を配列で管理。
  //       初期状態では 3 つの技を持っている。
  //       このあとレベルが上がると、条件付きで新しい技が追加される。

  levelUp: function () {
    // (1-6) メソッド levelUp を定義。
    //       スパークバディのレベルを上げるための関数。

    this.level++;
    // (1-7) インクリメント演算子（++）を使って、
    //       現在のレベルを 1 増加させる。
    //       this.level は、このオブジェクト（sparkBuddy）の level を指す。

    // 🧠【インクリメント演算子（++）とは？】
    // - 変数の値を 1 増やすための記号。
    //   たとえば `x++` は「x に 1 を加える」と同じ意味。
    // - `this.level++` と書くことで、元の値を保持しながら、
    //   内部的に level の値を「+1」して更新している。
    // - レベルアップするたびに、元の状態を上書きして記録するので、
    //   次にこのメソッドが呼ばれたときには、前回のレベルが基準になる。
    //   → 状態を保持して継続的に変化できるのが特徴！

    if (this.level >= 20) {
      // (1-8) 条件分岐：レベルが 20 以上になったら…

      this.skills.push("ライトニングスパーク");
      // (1-9) 新しい技「ライトニングスパーク」を skills 配列の末尾に追加する。
      //       push() は、配列の最後に要素を追加するためのメソッド。
    }

    // ✅【this の役割】
    // - this.level → このオブジェクト（sparkBuddy）の level を参照。
    // - this.skills → このオブジェクトの skills 配列を参照。
    // - つまり「どのインスタンス（個体）の情報を操作しているか」を示す仕組み。
    // - 他のキャラクターオブジェクトにこのメソッドをコピーしても機能する（再利用性◎）。
  },
};

// =======================================
// 🧪 メソッドを実行して状態変化を確認
// =======================================

console.log(
  "📢 呼び出し元 console。" +
  "最初の状態として、オブジェクト sparkBuddy の初期レベルは 18。" +
  "スキル（skills）には 3 つの技が登録されている状態です。→",
  sparkBuddy.level,
  sparkBuddy.skills
);
// (2-1) 初期状態を表示。
//       → レベル: 18、スキル: ["エレクトロボルト", "スピードダッシュ", "パワータックル"]

sparkBuddy.levelUp();
// (2-2) メソッド levelUp() を 1 回実行。
//       → this.level++ によりレベルが 19 に上昇。
//       → ただし、まだレベル 20 に達していないため「ライトニングスパーク」は追加されない。

console.log(
  "📢 呼び出し元 console。" +
  "↑ 上の行で sparkBuddy.levelUp() を 1 回実行しました。" +
  "現在のレベルは 19。if 文の条件（レベル20以上）にはまだ届いていないため、" +
  "スキル『ライトニングスパーク』はまだ追加されていません。→",
  sparkBuddy.level,
  sparkBuddy.skills
);
// (2-3) レベル 19 の状態を表示。
//       → スキル配列には変化なし（3つのまま）。

sparkBuddy.levelUp();
// (2-4) メソッド levelUp をもう一度実行。
//       → レベルが 20 になり、条件を満たすので "ライトニングスパーク" を追加。

console.log(
  "📢 呼び出し元 console。" +
  "↑ 上の行でオブジェクト sparkBuddy のメソッド levelUp() をもう一度実行しました。" +
  "this.level++ によってレベルが 20 に上がり、" +
  "if 文の条件（level >= 20）を満たしたため、" +
  "新しいスキル『ライトニングスパーク』が skills に追加されました。→",
  sparkBuddy.level,
  sparkBuddy.skills
);
// (2-5) レベル 20、スキルが 4 つになっている状態を表示。

console.log(sparkBuddy.level, sparkBuddy.skills);
// (2-6) 現在の状態（レベルと技）を最終確認。

// 🧠【まとめ】
// - ++ は値を 1 ずつ増やす操作（状態が更新されていく）。
// - メソッド内で this を使うことで、特定のオブジェクトの状態を内部から操作できる。
// - 条件によって配列の内容を追加できる if + push の組み合わせも重要。
// - オブジェクトの中で変化する値（状態）は、このようにメソッドで制御できる。






