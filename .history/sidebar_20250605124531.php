<aside id="sidebar" class="custom-sidebar">
  


  <section class="sidebar-section">
    <h2 class="sidebar-title">アーカイブ</h2>
    <ul class="sidebar-list">
      <?php wp_get_archives(['type' => 'monthly']); ?>
    </ul>
  </section>

  <section class="sidebar-section">
    <h2 class="sidebar-title">カテゴリー</h2>
    <ul class="sidebar-list">
      <?php wp_list_categories(['title_li' => '']); ?>
    </ul>
  </section>
</aside>
