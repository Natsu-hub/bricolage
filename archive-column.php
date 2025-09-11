<?php
/**
 * Archive: column（コラム一覧）
 * ファイル名: archive-column.php
 */
get_header();

// 見出し用
$label_en = 'COLUMN';
$label_ja = 'コラム';

// ページ情報
$paged = max(1, (int) get_query_var('paged'));

// ここではメインクエリを使用（new WP_Query は作らない）
?>
<!-- c-below-mv -->
<section class="c-below-mv">
    <div class="c-below-mv__inner l-inner--1200">
        <h1 class="c-below-mv__title">
            <img class="c-below-mv__title-deco c-deco-04" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/common/deco04.svg" alt="" width="68" height="46" loading="lazy">
            <span class="c-below-mv__title-en" lang="en"><?php echo esc_html($label_en); ?></span>
            <span class="c-below-mv__title-ja"><?php echo esc_html($label_ja); ?></span>
        </h1>
        <div class="c-below-mv__img">
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/below/news_fv-img01.svg" alt="" width="195" height="146" loading="lazy">
            <span class="c-below-mv__bg-title c-deco-title js-fade-in-right" lang="en"><?php echo esc_html($label_en); ?></span>
        </div>
    </div>
</section>

<!-- p-news（レイアウトはnewsと同じ箱を再利用。中身はカード型） -->
<section class="p-news">
    <div class="p-news__inner l-inner--1200">
        <div class="p-news__container">

            <div class="p-news__main-content">
                <?php if ( have_posts() ) : ?>
                <!-- ▼ COLUMN：カード型（トップと同じ c-news-card を使用） -->
                <ul class="p-news__cards">
                    <?php while ( have_posts() ) : the_post(); ?>
                    <?php
              // topic の先頭ターム名
              $topic_terms = get_the_terms( get_the_ID(), 'topic' );
              $topic_name  = ( $topic_terms && ! is_wp_error($topic_terms) ) ? $topic_terms[0]->name : '';
              ?>
                    <li class="p-news__card c-news-card">
                        <a href="<?php the_permalink(); ?>" class="c-news-card__link">
                            <div class="c-news-card__img">
                                <?php if ( has_post_thumbnail() ) : the_post_thumbnail('large'); else : ?>
                                <picture>
                                    <source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/common/no-img.webp" type="image/webp">
                                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/common/no-img.png" alt="" width="1440" height="400" loading="lazy">
                                </picture>
                                <?php endif; ?>
                            </div>
                            <div class="c-news-card__content">
                                <div class="c-news-card__label">
                                    <time class="c-news-card__date" datetime="<?php echo esc_attr( get_the_date('c') ); ?>">
                                        <?php echo esc_html( get_the_date('Y.m.d') ); ?>
                                    </time>
                                    <?php if ( $topic_name ) : ?>
                                    <span class="c-news-card__category"><?php echo esc_html( $topic_name ); ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="c-news-card__title"><?php the_title(); ?></div>
                            </div>
                        </a>
                    </li>
                    <?php endwhile; ?>
                    <?php else : ?>
                    <p>まだ記事がありません</p>
                    <?php endif; ?>
                </ul>

                <!-- pagination -->
                <?php get_template_part('template/pagination'); ?>
            </div>

            <!-- aside -->
            <?php get_template_part('template/side-bar'); ?>

        </div>
    </div>
</section>

<?php get_footer(); ?>