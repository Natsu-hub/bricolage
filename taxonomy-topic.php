<?php
/**
 * Taxonomy Archive: topic (for column)
 * ファイル名: taxonomy-topic.php
 */
get_header();

// 現在のターム情報
$term = get_queried_object();

// ページ番号
$paged = get_query_var('paged') ? (int) get_query_var('paged') : 1;

// 投稿一覧（column に限定）
$query = new WP_Query([
  'post_type'      => 'column',
  'posts_per_page' => 9,   // 例：カード3列×3行
  'paged'          => $paged,
  'orderby'        => 'date',
  'order'          => 'DESC',
  'tax_query'      => [[
    'taxonomy' => 'topic',
    'field'    => 'term_id',
    'terms'    => $term->term_id,
  ]],
  'no_found_rows'  => false,
]);
?>
<!-- c-below-mv -->
<section class="c-below-mv">
    <div class="c-below-mv__inner l-inner--1200">
        <h1 class="c-below-mv__title">
            <img class="c-below-mv__title-deco c-deco-04" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/common/deco04.svg" alt="" width="68" height="46" loading="lazy">
            <span class="c-below-mv__title-en" lang="en">COLUMN</span>
            <span class="c-below-mv__title-ja"><?php echo esc_html($term->name); ?></span>
        </h1>
        <div class="c-below-mv__img">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/below/news_fv-img01.svg" alt="" width="195" height="146" loading="lazy">
            <span class="c-below-mv__bg-title c-deco-title js-fade-in-right" lang="en">COLUMN</span>
        </div>
    </div>
</section>

<!-- p-news -->
<section class="p-news">
    <div class="p-news__inner l-inner--1200">
        <div class="p-news__container">

            <div class="p-news__main-content">
                <?php if ( $query->have_posts() ) : ?>
                <ul class="p-top-column__cards">
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <?php
              $topic_terms = get_the_terms( get_the_ID(), 'topic' );
              $topic_name  = ( $topic_terms && ! is_wp_error($topic_terms) ) ? $topic_terms[0]->name : '';
              ?>
                    <li class="p-top-column__card c-news-card">
                        <a href="<?php the_permalink(); ?>" class="c-news-card__link">
                            <div class="c-news-card__img">
                                <?php if ( has_post_thumbnail() ) : the_post_thumbnail('large'); else : ?>
                                <picture>
                                    <source srcset="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/common/no-img.webp" type="image/webp">
                                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/common/no-img.png" alt="" width="1440" height="400" loading="lazy">
                                </picture>
                                <?php endif; ?>
                            </div>
                            <div class="c-news-card__content">
                                <div class="c-news-card__label">
                                    <time class="c-news-card__date" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                        <?php echo esc_html(get_the_date('Y.m.d')); ?>
                                    </time>
                                    <?php if ( $topic_name ) : ?>
                                    <span class="c-news-card__category"><?php echo esc_html($topic_name); ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="c-news-card__title"><?php the_title(); ?></div>
                            </div>
                        </a>
                    </li>
                    <?php endwhile; ?>
                </ul>

                <!-- pagination -->
                <?php get_template_part('template/pagination'); ?>

                <?php else : ?>
                <p>まだ記事がありません</p>
                <?php endif; wp_reset_postdata(); ?>
            </div>

            <!-- aside -->
            <?php get_template_part('template/side-bar'); ?>

        </div>
    </div>
</section>

<?php get_footer(); ?>