<?php 
get_header(); 
?>

<main class="l-main">
    <!-- c-below-mv -->
    <section class="c-below-mv">
        <div class="c-below-mv__inner l-inner--1200">
            <h1 class="c-below-mv__title">
                <img class="c-below-mv__title-deco c-deco-04" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/common/deco04.svg" alt="" width="68" height="46">
                <span class="c-below-mv__title-en" lang="en">news</span>
                <span class="c-below-mv__title-ja">ニュース</span>
            </h1>
            <div class="c-below-mv__img">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/below/news_fv-img01.svg" alt="" width="195" height="146" loading="lazy">
                <span class="c-below-mv__bg-title c-deco-title js-fade-in-right" lang="en">news</span>
            </div>
        </div>
    </section>

    <!-- p-news -->
    <section class="p-news">
        <div class="p-news__inner l-inner--1200">
            <div class="p-news__container">

                <div class="p-news__main-content">
                    <ul class="p-news__lists">
                        <?php
          $paged = get_query_var('paged') ? get_query_var('paged') : 1;

          $news_query = new WP_Query([
            'post_type'           => 'news',
            'posts_per_page'      => 10,
            'paged'               => $paged,
            'orderby'             => 'date',
            'order'               => 'DESC',
            'no_found_rows'       => false, // ページネーションで総数が必要
            'ignore_sticky_posts' => true,
          ]);

          if ( $news_query->have_posts() ) :
            while ( $news_query->have_posts() ) : $news_query->the_post();

              // ▼ genre（ニュースの分類）を取得：先頭のみ表示（複数ある場合は必要に応じてループに変更）
              $genre_terms = get_the_terms( get_the_ID(), 'genre' );
              $genre_name  = ( $genre_terms && ! is_wp_error( $genre_terms ) ) ? $genre_terms[0]->name : '';
          ?>
                        <li class="p-top-news__list c-news-list">
                            <a class="p-top-news__list-link c-news-list__link" href="<?php the_permalink(); ?>">
                                <div class="p-top-news__label c-news-list__label">
                                    <time class="p-top-news__date c-news-list__date" datetime="<?php echo esc_attr( get_the_date('c') ); ?>">
                                        <?php echo esc_html( get_the_date('Y.m.d') ); ?>
                                    </time>
                                    <?php if ( $genre_name ) : ?>
                                    <span class="p-top-news__list-category c-news-list__category">
                                        <?php echo esc_html( $genre_name ); ?>
                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="p-top-news__list-title c-news-list__title"><?php the_title(); ?></div>
                            </a>
                        </li>
                        <?php
            endwhile;
          else :
          ?>
                        <p>まだ記事がありません</p>
                        <?php endif; wp_reset_postdata(); ?>
                    </ul>

                    <!-- pagination -->
                    <?php get_template_part('template/pagination'); ?>
                </div>

                <!-- aside -->
                <?php get_template_part('template/side-bar'); ?>


            </div>
        </div>
    </section>


</main>
<?php get_footer(); ?>