// =======================================
// ダークモード＆季節判定プログラム
// =======================================

// ダークモード判定関数
function getDarkModeStatus(time) {
  if (time >= 20 || time < 6) {
    return "dark";
  } else {
    return "light";
  }
}

// 季節判定関数
function getSeason(month) {
  if ([12, 1, 2].includes(month)) return "winter";
  if ([3, 4, 5].includes(month))  return "spring";
  if ([6, 7, 8].includes(month))  return "summer";
  return "autumn";
}

// 実行処理
document.addEventListener("DOMContentLoaded", function() {
  const now    = new Date();
  const mode   = getDarkModeStatus(now.getHours());
  const season = getSeason(now.getMonth() + 1);

  console.log("モード:", mode);
  console.log("季節:", season);

  if (mode === "dark") {
    document.body.style.backgroundColor = "#000";
  } else {
    document.body.style.backgroundColor = "#fff";
  }
});
