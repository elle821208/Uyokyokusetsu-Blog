// =======================================
// 🌙 背景色＆季節判定プログラム（統合版）
// =======================================
// 🟢 このコードの目的
// - 現在時刻から「dark / light」を判定
// - 現在の月から「季節」を判定
// - 引数と戻り値の流れを理解する
// =======================================
//
// 💡 WordPress + Simple Custom CSS and JS での読み込みの流れ
// -------------------------------------------------------
// 1. WordPress 管理画面 → Simple Custom CSS and JS → 「JSコードを追加」
// 2. このコードを貼り付けて保存
// 3. 保存すると <script> タグとして自動的に投稿ページや固定ページに出力される
// 4. ページが読み込まれると、下の DOMContentLoaded イベントが発火して処理開始
// 5. 結果として、投稿ページの <div class="darkmode-box"> や <p id="season-display">
//    が書き換えられる
//
// 📝 注意
// - 「darkmode-box」があることで、WordPressのカスタムHTMLに背景色切替が表示される
// - 「season-display」があることで、判定した季節が文章として表示される
// -------------------------------------------------------


// ======= セクション開始：学習目的と流れ =======
console.log("🚩【学習目的】引数と戻り値を理解する(背景色＆季節判定プログラム)");
console.log("📝 処理の流れ: 1️⃣変数呼び出し → 2️⃣値の取得 → 3️⃣関数呼び出し → 4️⃣if判定 → 5️⃣戻り値 → 6️⃣結果出力\n");


// =======================================
// 🚩 DOMContentLoaded
// =======================================
// - HTMLの構造が読み込まれたら実行されるイベント
// - 投稿ページにある <div> や <p> が確実に取得できる
// =======================================
document.addEventListener("DOMContentLoaded", function() {

  // =======================================
  // 🚩STEP1: ダークモード判定
  // =======================================
  // 4️⃣ 関数を定義（timeを引数に取り、条件で"dark"/"light"を返す）
  function getDarkModeStatus(time) {
      // 5️⃣ if判定（time が 20 より大きいかどうか）
      if (time > 20) {
          return "dark"; // ← 戻り値（関数の外に出す値）
      } else {
          return "light"; // ← 戻り値（関数の外に出す値）
      }
  }

  // 1️⃣ 変数を呼び出す（mode を準備）
  // 2️⃣ new Date() で現在の時刻を取得し、.getHours() で「時」を取り出す
  const mode = getDarkModeStatus(new Date().getHours()); 
  // 6️⃣ 戻り値 "dark" または "light" が mode に代入される

  // 七WordPress投稿ページにある .darkmode-box を取得
  const darkmodeBox = document.querySelector(".darkmode-box");
  if(darkmodeBox){
      // 投稿内のボックスの背景色と文字色を切り替え
      darkmodeBox.style.backgroundColor = mode === "dark" ? "#000" : "#fff";
      darkmodeBox.style.color = mode === "dark" ? "#fff" : "#000";
  }

  // 8️⃣ 結果を出力（確認用）
  console.log(`現在のモード: ${mode}`);
  // 例: 21時なら "dark"、10時なら "light"


  // =======================================
  // 🚩STEP2: 季節判定
  // =======================================
  // 4️⃣ 関数を定義（monthを引数に取り、条件で季節を返す）
  function getSeason(month) {
      // 5️⃣ if判定（月の範囲ごとに季節を返す）
      if (month >= 3 && month <= 5) {
          return "春";
      } else if (month >= 6 && month <= 8) {
          return "夏";
      } else if (month >= 9 && month <= 11) {
          return "秋";
      } else {
          return "冬";
      }
  }

  // 1️⃣ 変数を呼び出す（currentMonth, season を準備）
  const currentMonth = new Date().getMonth() + 1;
  // 2️⃣ getSeason(currentMonth) を呼び出し
  const season = getSeason(currentMonth);

  // WordPress投稿ページにある #season-display を取得
  const seasonDisplay = document.getElementById("season-display");
  if(seasonDisplay){
      seasonDisplay.textContent = `現在の月は ${currentMonth} 月なので、季節は ${season} です！`;
  }

  // 7️⃣ season を利用して結果を出力（確認用）
  console.log(`現在の月は ${currentMonth} 月です`);
  console.log(`🌟 なので、季節は ${season} です！`);
});


// =======================================
// まとめ（記述順と実行順）
// =======================================
// 記述順: function → 変数 → if文
// 実行順: 
// 1️⃣ 変数呼び出し → 2️⃣ 値の取得 → 3️⃣ 関数呼び出し → 
// 4️⃣ 関数定義の処理開始 → 5️⃣ if判定 → 
// 6️⃣ 戻り値を変数に代入 → 7️⃣ 変数を利用して処理 → 8️⃣ 結果を出力
