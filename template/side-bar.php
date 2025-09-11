<aside class="p-news__aside">
    <!-- カテゴリー -->
    <div class="p-news__aside-box">
        <div class="p-news__aside-title">カテゴリー</div>
        <ul class="p-news__aside-lists">
            <?php
        // 表示中の種類を判定：topicタクソノミー→column、genreタクソノミー→news、
        // それ以外はアーカイブや日付の状況から推定（既定は news）
        if ( is_tax('topic') ) {
          $pt = 'column';
        } elseif ( is_tax('genre') ) {
          $pt = 'news';
        } elseif ( is_post_type_archive('column') || ( is_date() && get_query_var('post_type') === 'column' ) ) {
          $pt = 'column';
        } else {
          $pt = 'news';
        }

        $tax = ($pt === 'news') ? 'genre' : 'topic';

        $terms = get_terms([
          'taxonomy'   => $tax,
          'hide_empty' => true,
        ]);

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
        global $wpdb;

        // 表示中の post_type ($pt) の公開記事から年月一覧を作成
        $months = $wpdb->get_results( $wpdb->prepare("
          SELECT DISTINCT YEAR(post_date) AS y, MONTH(post_date) AS m
          FROM {$wpdb->posts}
          WHERE post_type = %s AND post_status = 'publish'
          ORDER BY post_date DESC
        ", $pt) );

        if ( $months ) :
          foreach ( $months as $mm ) :
            // いまの運用に合わせて “?post_type=xxx” を付けた月別URLを生成（date.php が拾う）
            $url  = add_query_arg(
                      'post_type',
                      $pt,
                      get_month_link( (int) $mm->y, (int) $mm->m )
                    );
            $text = sprintf('%04d年%02d月', $mm->y, $mm->m);
      ?>
            <li class="p-news__aside-list">
                <a href="<?php echo esc_url($url); ?>"><?php echo esc_html($text); ?></a>
            </li>
            <?php endforeach; else : ?>
            <li class="p-news__aside-list">アーカイブはありません</li>
            <?php endif; ?>
        </ul>
    </div>
</aside>