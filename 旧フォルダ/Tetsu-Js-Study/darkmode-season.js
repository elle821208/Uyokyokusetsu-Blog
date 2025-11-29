// =======================================
// 🌙 背景色＆季節判定プログラム（統合版）
// =======================================
// 🟢 このコードの目的
// - 現在時刻からモード判定（dark / light）
// - 現在の月から季節判定（春 / 夏 / 秋 / 冬）
// - 「引数と戻り値」の流れを学習しつつ実際に画面へ反映
// =======================================

document.addEventListener("DOMContentLoaded", function() {

  // ======= セクション開始：学習目的と流れ =======
  console.log("🚩【学習目的】引数と戻り値を理解する(背景色＆季節判定プログラム)");
  console.log("📝 処理の流れ: 1️⃣変数呼び出し → 2️⃣値の取得 → 3️⃣関数呼び出し → 4️⃣if判定 → 5️⃣戻り値 → 6️⃣結果出力\n");

  // =======================================
  // 🚩STEP1: ダークモード判定
  // =======================================

  // 関数を定義（timeを引数に取り、条件で"dark"/"light"を返す）
  function getDarkModeStatus(time) {
      if (time > 20) {
          return "dark"; 
      } else {
          return "light";
      }
  }

  // 現在時刻から mode を判定
  const mode = getDarkModeStatus(new Date().getHours()); 

  // body背景色を変更
  if (mode === "dark") {
      document.body.style.backgroundColor = "#000";
  } else {
      document.body.style.backgroundColor = "#fff";
  } 

  // .darkmode-box があれば背景色を適用
  const darkmodeBox = document.querySelector(".darkmode-box");
  if(darkmodeBox){
      darkmodeBox.style.backgroundColor = mode === "dark" ? "#000" : "#fff";
      darkmodeBox.style.color = mode === "dark" ? "#fff" : "#000";
  }

  // 結果を出力
  console.log(`現在のモード: ${mode}`);


  // =======================================
  // 🚩STEP2: 季節判定
  // =======================================

  function getSeason(month) {
      if (month >= 3 && month <= 5) return "春";
      if (month >= 6 && month <= 8) return "夏";
      if (month >= 9 && month <= 11) return "秋";
      return "冬";
  }

  const currentMonth = new Date().getMonth() + 1;
  const season = getSeason(currentMonth);

  // 結果を出力
  console.log(`現在の月は ${currentMonth} 月です`);
  console.log(`🌟 なので、季節は ${season} です！`);

  // ページに表示
  const seasonDisplay = document.getElementById("season-display");
  if(seasonDisplay){
      seasonDisplay.textContent = `現在の月は ${currentMonth} 月なので、季節は ${season} です！`;
  }

  // =======================================
  // まとめ
  // =======================================
  // 記述順: function → 変数 → if文
  // 実行順: 
  // 1️⃣ 変数呼び出し → 2️⃣ 値の取得 → 3️⃣ 関数呼び出し → 
  // 4️⃣ 関数内処理 → 5️⃣ if判定 → 
  // 6️⃣ 戻り値を変数に代入 → 7️⃣ 変数利用 → 8️⃣ 結果出力
});
