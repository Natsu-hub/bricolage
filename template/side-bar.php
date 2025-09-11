<aside class="p-news__aside">
    <!-- カテゴリー -->
    <div class="p-news__aside-box">
        <div class="p-news__aside-title">テストカテゴリー</div>
        <ul class="p-news__aside-lists">
            <?php
      // まず現在がタクソノミーかどうかを確認
      $pt  = get_query_var('post_type'); // アーカイブ等では入っている場合も
      $tax = '';

      if ( is_tax() ) {
        $qo = get_queried_object();
        if ( $qo && ! is_wp_error($qo) && ! empty($qo->taxonomy) ) {
          $tax = $qo->taxonomy;
        }
      }

      // タクソノミー優先で post_type / taxonomy を決定
      if ( $tax === 'topic' ) {
        $pt  = 'column';
      } elseif ( $tax === 'genre' ) {
        $pt  = 'news';
      } else {
        // 上記以外（通常のアーカイブなど）は既存ロジック
        $pt = in_array($pt, ['news','column'], true) ? $pt : ( is_post_type_archive('column') ? 'column' : 'news' );
      }

      // 使うタクソノミーを post_type から逆算
      $tax = ($pt === 'news') ? 'genre' : 'topic';

      $terms = get_terms(['taxonomy' => $tax, 'hide_empty' => true]);
      if ( ! is_wp_error($terms) && $terms ) :
        foreach ( $terms as $term ) :
          $link = get_term_link($term, $tax);
      ?>
            <li class="p-news__aside-list">
                <a href="<?php echo esc_url($link); ?>"><?php echo esc_html($term->name); ?></a>
            </li>
            <?php endforeach; else : ?>
            <li class="p-news__aside-list">カテゴリーはありません</li>
            <?php endif; ?>
        </ul>
    </div>

    <!-- アーカイブ（月別） -->
    <div class="p-news__aside-box">
        <div class="p-news__aside-title">アーカイブ</div>
        <ul class="p-news__aside-lists">
            <?php
    $pt = (is_tax('topic') || is_post_type_archive('column')) ? 'column' : 'news';
    wp_get_archives([
      'type'      => 'monthly',
      'post_type' => $pt,
      'format'    => 'custom', // ← これ重要！
      'before'    => '<li class="p-news__aside-list">', 
      'after'     => '</li>',
    ]);
    ?>
        </ul>
    </div>



</aside>