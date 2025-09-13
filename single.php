<?php 
get_header(); 
?>

<main class="l-main">

    <?php
  // 事前に表示用データを用意（シングルなので have_posts() は1回想定）
  $label_text = '';  // ラベルに出す文字（ターム名 or フォールバック）
  $date_iso   = get_the_date('Y-m-d');
  $date_disp  = get_the_date();     // テーマのロケールに合わせた表示
  $title_disp = get_the_title();

  $pt  = get_post_type();
  $tax = ($pt === 'column') ? 'topic' : ( ($pt === 'news') ? 'genre' : '' );
  if ($tax) {
    $terms = get_the_terms(get_the_ID(), $tax);
    if ($terms && !is_wp_error($terms)) {
      $label_text = $terms[0]->name; // 先頭ターム
    }
  }
  if ($label_text === '') {
    // タームが無いときのフォールバック（お好みで変更）
    $label_text = ($pt === 'column') ? 'コラム' : 'ニュース';
  }
  ?>

    <!-- p-news-mv -->
    <section class="p-news-mv">
        <div class="p-news-mv__inner l-inner">
            <h1 class="p-news-mv__title">
                <img class="p-news-mv__title-deco c-deco-03" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/common/deco03.svg" alt="" width="56" height="60" loading="lazy">
                <span class="p-news-mv__label c-label"><?php echo esc_html($label_text); ?></span>
                <time class="p-news-mv__date" datetime="<?php echo esc_attr($date_iso); ?>"><?php echo esc_html($date_disp); ?></time>
                <span class="p-news-mv__title-ja"><?php echo esc_html($title_disp); ?></span>
            </h1>
        </div>
    </section>



    <!-- p-news -->
    <section class="p-news">
        <div class="p-news__inner p-news__inner--single l-inner">
            <div class="p-news__container p-news__container--single">
                <div class="p-news__main-content p-news__main-content--single">
                    <?php if (have_posts()): while (have_posts()): the_post(); ?>

                    <article class="p-news__single-content c-entry-content">

                        <?php if (has_post_thumbnail()): ?>
                        <div class="p-news__single-thumb">
                            <?php the_post_thumbnail('large', array(
                    'alt' => get_the_title(),
                    'loading' => 'lazy'
                )); ?>
                        </div>
                        <?php endif; ?>

                        <?php the_content(); ?>
                    </article>

                    <?php endwhile; endif; ?>
                    <div class="p-news__btn">
                        <?php if ( wp_get_referer() ) : ?>
                        <a class="c-btn" href="<?php echo esc_url( wp_get_referer() ); ?>">戻る</a>
                        <?php else : ?>
                        <a class="c-btn" href="<?php echo HOME_URL; ?>">トップページに戻る</a>
                        <?php endif; ?>
                    </div>
                </div>


                <!-- aside -->
                <?php get_template_part('template/side-bar'); ?>
            </div>
        </div>
    </section>

</main>
<?php get_footer(); ?>