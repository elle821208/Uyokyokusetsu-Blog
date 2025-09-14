

// =======================================
// 🌙 背景色＆季節判定プログラム
// =======================================
// 🟢 このコードの目的
// - 現在時刻から「ダークモード or ライトモード」を判定　← 「ダークモード 、 ライトモード」という文字はjsonエラーが出る！
// - 現在の月から「季節」を判定
// を学びながら「引数と戻り値」の流れを理解する
// =======================================


// ======= セクション開始：学習目的と流れ =======
console.log("🚩【学習目的】引数と戻り値を理解する(背景色＆季節判定プログラム)");
console.log("📝 処理の流れ: 1️⃣変数呼び出し → 2️⃣値の取得 → 3️⃣関数呼び出し → 4️⃣if判定 → 5️⃣戻り値 → 6️⃣結果出力\n");


// =======================================
// 💡 補足説明
// - new Date() は「現在の日時」を生成するオブジェクト
//   例: Thu Aug 28 2025 21:00:00 GMT+0900 (Japan Standard Time)
//
// - オブジェクトとメソッドの違い
//   * オブジェクト: データそのもの（例: new Date()）
//   * メソッド: オブジェクトに付属する関数
//     （例: .getHours(), .getMonth() → 特定の情報を取り出す処理）
//
// - 引数と戻り値のイメージ
//   下記の STEP2: 季節判定 において
//   const season = getSeason(currentMonth)
//
//   【値の流れ】
//   1️⃣ 呼び出し側の変数 currentMonth に 8 が入っている
//   2️⃣ getSeason(currentMonth) を呼び出すと、currentMonth の値（8）が
//       関数 getSeason の引数 month にコピーされる（month = 8）
//   3️⃣ 関数 getSeason 内で if 判定が行われ、処理結果 "夏" が return される
//   4️⃣ return された "夏" が呼び出し元に戻り、変数 season に代入される
//       （最終的に season = "夏" となる）
// =======================================


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
//     例: 2025年8月28日21時なら → 21
// 3️⃣ getDarkModeStatus(...) を呼び出し、time に値を渡す
const mode = getDarkModeStatus(new Date().getHours()); 

// 6️⃣ 戻り値 "dark" または "light" が mode に代入される

// 7️⃣ mode を利用して背景色を変更
if (mode === "dark") {
    document.body.style.backgroundColor = "#000";
} else {
    document.body.style.backgroundColor = "#fff";
}

// 8️⃣ 結果を出力
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
// 2️⃣ new Date() で現在の月を取得し、.getMonth() で0始まりの月を取得（0=1月, 7=8月）
//     +1 して整形 → 実際の月番号になる
const currentMonth = new Date().getMonth() + 1;
    
// 3️⃣ getSeason(currentMonth) を呼び出し、変数 currentMonth の値を
//    関数 getSeason の引数 month に渡す（＝代入される）
const season = getSeason(currentMonth);


// 6️⃣ 戻り値 "春" / "夏" / "秋" / "冬" が season に代入される

// 7️⃣ season を利用して結果を出力
console.log(`現在の月は ${currentMonth} 月です`);
// 例: 8月なら → "現在の月は 8 月です"

console.log(`🌟 なので、季節は ${season} です！`);
// 例: 8月なら "夏"、12月なら "冬"


// =======================================
// まとめ（記述順と実行順）
// =======================================
// 記述順: function → 変数 → if文
// 実行順: 
// 1️⃣ 変数呼び出し → 2️⃣ 値の取得 → 3️⃣ 関数呼び出し → 
// 4️⃣ 関数定義の処理開始 → 5️⃣ if判定 → 
// 6️⃣ 戻り値を変数に代入 → 7️⃣ 変数を利用して処理 → 8️⃣ 結果を出力

