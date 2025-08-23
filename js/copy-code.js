document.addEventListener("DOMContentLoaded", function () {
  // 記事中の <pre><code> をすべて探す
  document.querySelectorAll("pre code").forEach((codeBlock) => {
    // ラッパーdivを作成
    const wrapper = document.createElement("div");
    wrapper.classList.add("code-wrapper");

    // pre をラップ
    const pre = codeBlock.parentNode;
    pre.parentNode.insertBefore(wrapper, pre);
    wrapper.appendChild(pre);

    // コピー用ボタンを作成
    const button = document.createElement("button");
    button.className = "copy-btn";
    button.type = "button";
    button.innerText = "コピー";

    // コピー処理
    button.addEventListener("click", () => {
      navigator.clipboard.writeText(codeBlock.innerText).then(() => {
        button.innerText = "コピーしました！";
        setTimeout(() => (button.innerText = "コピー"), 2000);
      });
    });

    // ラッパーに追加
    wrapper.insertBefore(button, pre);
  });
});
