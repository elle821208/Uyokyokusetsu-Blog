<?php
/*
 * ファイル名: footer.php
 * 役割: ページの一番下（フッター）の部分を表示するためのファイルです。
 * 影響するページ: WordPressの全ページ（index.php や固定ページ など）に共通して表示されます。
 * このファイルは、テーマの中にある「get_footer();」という命令で呼び出されます。
 */
?>

<!-- 🦶 フッター（ページの一番下）部分がここから始まります -->
<footer class="site-footer">
  <div class="footer-inner">

    <!-- 🔗 下のほうに表示するメニュー（リンク）です -->
    <nav class="footer-nav">
      <ul>
        <!-- 🔙 ホームページのトップに戻るリンク -->
        <li><a href="<?php echo home_url(); ?>">ホーム</a></li>
        <!-- 🟠 雑記ブログページへのリンク -->
        <li><a href="<?php echo home_url('/news'); ?>">雑記ブログ</a></li>
        <!-- 🔵 技術ブログページへのリンク -->
        <li><a href="<?php echo home_url('/works'); ?>">技術ブログ</a></li>
        <!-- 👤 プロフィールページへのリンク（必要ならあとで作成） -->
        <li><a href="<?php echo home_url('/about'); ?>">プロフィール</a></li>
      </ul>
    </nav>

    <!-- 📝 コピーライト（著作権の表示） -->
    <div class="copyright">
      <!-- 「2025 紆余曲折ブログ All rights reserved.」と表示されます -->
      <small>&copy; <?php echo date("Y"); ?> 紆余曲折ブログ All rights reserved.</small>
    </div>

  </div>
</footer>

<!-- 💡この命令はとても大事！
     WordPressのテーマやプラグインが正しく動くために必要なコードです。
     この「wp_footer();」は、必ず</body>の前に書いておきましょう。 -->
<?php wp_footer(); ?>

