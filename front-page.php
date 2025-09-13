<?php
get_header(); ?>

<main class="l-main">
    <!-- p-top-mv -->
    <section class="p-top-mv">
        <div class="p-top-mv__img u-desktop">
            <picture>
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/common/fv_img01.svg" alt="ビジネスが成長する様子" width="910" height="788">
            </picture>
        </div>
        <div class="p-top-mv__title-box">
            <p class="p-top-mv__en-text" lang="en">One Stop. Full Support.
            </p>
            <h1 class="p-top-mv__title" aria-label="ビジネスの成長に伴走する ワンストップ パートナー">
                <span class="p-top-mv__title-top js-text-effect js-splitText" aria-hidden="true">
                    ビジネスの成長に伴走する
                </span>
                <span class="p-top-mv__title-bottom js-text-effect js-splitText" aria-hidden="true">
                    ワンストップ<br class="u-sm">パートナー
                </span>
            </h1>
            <p class="p-top-mv__sub-text">マーケティング〜営業、セキュリティまで、<br>
                包括的に支援します。
            </p>
        </div>
        <div class="p-top-mv__img u-mobile">
            <picture>
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/common/fv_img01-sp.svg" alt="ビジネスが成長する様子" width="355" height="284">
            </picture>
        </div>
        <div class="p-top-mv__illustration">
            <picture>
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/common/fv_img02.svg" alt="男性のイラスト" width="98" height="106">
            </picture>
        </div>
    </section>

    <!-- p-top-about -->
    <section class="p-top-about">
        <div class="p-top-about__inner l-inner">
            <div class="p-top-about__content-box">
                <h2 class="p-top-about__title"><span>戦略から実行</span>まで、<br>
                    企業成長を<span>ともに進める</span><br>
                    パートナーです
                </h2>
                <div class="p-top-about__content">
                    <p class="p-top-about__message">ブリコラージュ合同会社は、営業・マーケティングからIT・セキュリティまで、幅広いビジネス支援を行うワンストップパートナーです。</p>
                    <p class="p-top-about__message"> クライアントに寄り添い、実行力あるサポートで事業成長を後押しします。</p>
                </div>
                <div class="p-top-about__btn">
                    <a href="<?php echo ABOUT_URL; ?>" class="c-btn">会社紹介をみる</a>
                </div>
            </div>
            <div class="p-top-about__img-box">
                <span class="p-top-about__deco-title c-deco-title js-fade-in-right" lang="en">about&nbsp;us</span>
                <div class="p-top-about__img-top js-fade-in">
                    <picture>
                        <source srcset="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/common/about_img01.webp" type="image/webp">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/common/about_img01.jpg" alt="会社の外観のイメージ写真" width="314" height="314" loading="lazy">
                    </picture>
                    <img class="p-top-about__img-illust" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/common/about_img03.svg" alt="男性のイラスト" width="86" height="124" loading="lazy">
                    <img class="p-top-about__deco01 c-deco-01" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/common/deco01.svg" alt="" width="57" height="63" loading="lazy">
                </div>
                <div class="p-top-about__img-bottom js-fade-in">
                    <picture>
                        <source srcset="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/common/about_img02.webp" type="image/webp">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/common/about_img02.jpg" alt="ミーティングのイメージ写真" width="314" height="314" loading="lazy">
                    </picture>
                    <img class="p-top-about__deco02 c-deco-02" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/common/deco02.svg" alt="" width="44" height="40" loading="lazy">
                </div>
            </div>
        </div>
    </section>
    <!-- p-top-service -->
    <section class="p-top-service">
        <div class="p-top-service__bg c-bg">
            <div class="p-top-service__inner l-inner">
                <img class="p-top-service__deco c-deco-03" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/common/deco03.svg" alt="" width="56" height="60" loading="lazy">
                <div class="p-top-service__title-box">
                    <span class="p-top-service__deco-title c-deco-title js-fade-in-right" lang="en">service</span>
                    <h2 class="p-top-service__title c-title">
                        <span class="c-title-en" lang="en">service</span>
                        <span class="c-title-ja">事業内容</span>
                    </h2>
                    <p class="p-top-service__title-message">組織のフェーズや商材に合わせた幅広い事業分野での<br class="u-desktop">
                        サポートを提供しています。</p>
                </div>
                <ol class="p-top-service__items js-fade-in">
                    <li class="p-top-service__item">
                        <div class="p-top-service__item-box">
                            <h3 class="p-top-service__item-title">
                                <span class="p-top-service__item-title-number">01</span>
                                <span class="p-top-service__item-title-ja">マーケティング領域</span>
                                <span class="p-top-service__item-title-en" lang="en">Marketing</span>
                            </h3>
                            <img class="p-top-service__item-img" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/common/service_img01.svg" alt="マーケティング領域のイメージイラスト" width="200" height="150" loading="lazy">
                        </div>
                        <p class="p-top-service__item-content">戦略設計から実行支援、運用改善まで。貴社に伴走しながら成果に直結するマーケティングを実現します。</p>
                    </li>
                    <li class="p-top-service__item">
                        <div class="p-top-service__item-box">
                            <h3 class="p-top-service__item-title">
                                <span class="p-top-service__item-title-number">02</span>
                                <span class="p-top-service__item-title-ja">セールス領域</span>
                                <span class="p-top-service__item-title-en" lang="en">Sales</span>
                            </h3>
                            <img class="p-top-service__item-img" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/common/service_img02.svg" alt="セールス領域のイメージイラスト" width="200" height="150" loading="lazy">
                        </div>
                        <p class="p-top-service__item-content">営業プロセスの構築から実務支援、ツール導入まで。現場に寄り添い、成果につながる営業体制を共に作ります。</p>
                    </li>
                    <li class="p-top-service__item">
                        <div class="p-top-service__item-box">
                            <h3 class="p-top-service__item-title">
                                <span class="p-top-service__item-title-number">03</span>
                                <span class="p-top-service__item-title-ja">IT・DXコンサルティング/導入支援</span>
                                <span class="p-top-service__item-title-en" lang="en">IT Deploy</span>
                            </h3>
                            <img class="p-top-service__item-img" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/common/service_img03.svg" alt="IT・DXコンサルティング/導入支援のイメージイラスト" width="200" height="150" loading="lazy">
                        </div>
                        <p class="p-top-service__item-content">業務課題の可視化からITツールの選定・導入・保守支援まで。現場の声を反映しながら、実行可能なDXを一緒に進めます。</p>
                    </li>
                    <li class="p-top-service__item">
                        <div class="p-top-service__item-box">
                            <h3 class="p-top-service__item-title">
                                <span class="p-top-service__item-title-number">04</span>
                                <span class="p-top-service__item-title-ja">セキュリティコンサルティング</span>
                                <span class="p-top-service__item-title-en" lang="en">Security</span>
                            </h3>
                            <img class="p-top-service__item-img" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/common/service_img04.svg" alt="セキュリティコンサルティングのイメージイラスト" width="200" height="150" loading="lazy">
                        </div>
                        <p class="p-top-service__item-content">ISMSやPマークなど各種規程取得。現状分析〜企業規模やフェーズに応じたセキュリティ体制構築を継続的に支援します。</p>
                    </li>
                </ol>
                <div class="p-top-service__btn">
                    <a href="<?php echo SERVICE_URL; ?>" class="c-btn">事業案内をみる</a>
                </div>
            </div>
        </div>
    </section>

    <!-- p-top-news -->
    <section class="p-top-news js-fade-in-section">
        <div class="p-top-news__inner l-inner">
            <div class="p-top-news__item">
                <h2 class="p-top-news__title c-title">
                    <span class="c-title-en" lang="en">news</span>
                    <span class="c-title-ja">ニュース</span>
                </h2>
                <div class="p-top-news__btn">
                    <a href="<?php echo NEWS_URL; ?>" class="c-btn">ニュース一覧をみる</a>
                </div>
            </div>
            <div class="p-top-news__box">

                <!-- ▼ info（お知らせ）3件：リスト型 -->
                <ul class="p-top-news__lists">
                    <?php
        $args_info = [
          'post_type'      => 'news',
          'posts_per_page' => 3,
          'orderby'        => 'date',
          'order'          => 'DESC',
          'no_found_rows'       => true,
          'ignore_sticky_posts' => true,
        ];
        $info_query = new WP_Query($args_info);

        if ($info_query->have_posts()):
          while ($info_query->have_posts()): $info_query->the_post();
            $term_name = br_get_genre_term_name( get_the_ID() );
        ?>
                    <li class="p-top-news__list c-news-list">
                        <a class="p-top-news__list-link c-news-list__link" href="<?php the_permalink(); ?>">
                            <div class="p-top-news__label c-news-list__label">
                                <time class="p-top-news__date c-news-list__date" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                    <?php echo esc_html(get_the_date('Y.m.d')); ?>
                                </time>
                                <?php if ( $term_name ) : ?>
                                <span class="p-top-news__list-category c-news-list__category">
                                    <?php echo esc_html($term_name); ?>
                                </span>
                                <?php endif; ?>
                            </div>
                            <div class="p-top-news__list-title c-news-list__title"><?php the_title(); ?></div>
                        </a>
                    </li>
                    <?php endwhile; else: ?>
                    <li class="p-top-news__list p-top-news__list--empty">まだ記事がありません</li>
                    <?php endif; wp_reset_postdata(); ?>
                </ul>
            </div>
        </div>
    </section>

    <!-- p-top-column -->
    <section class="p-top-column js-fade-in">
        <img class="p-top-column__deco" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/common/news_img01.svg" alt="" width="256" height="165" loading="lazy">
        <div class="p-top-column__inner l-inner">

            <div class="p-top-column__item">
                <h2 class="p-top-column__title c-title">
                    <span class="c-title-en" lang="en">COLUMN</span>
                    <span class="c-title-ja">コラム</span>
                </h2>
                <div class="p-top-column__btn">
                    <a href="<?php echo defined('COLUMN_URL') ? esc_url( COLUMN_URL ) : esc_url( get_post_type_archive_link('column') ); ?>" class="c-btn">コラム一覧をみる</a>
                </div>
            </div>

            <div class="p-top-column__box">
                <!-- ▼ コラム（column 最新3件）：カード型 -->
                <ul class="p-top-column__cards">
                    <?php
        $column_query = new WP_Query([
          'post_type'           => 'column',
          'posts_per_page'      => 4,
          'orderby'             => 'date',
          'order'               => 'DESC',
          'no_found_rows'       => true,
          'ignore_sticky_posts' => true,
        ]);

        if ( $column_query->have_posts() ) :
          while ( $column_query->have_posts() ) : $column_query->the_post();

            // topic の先頭ターム名（なければ空）
            $topic_terms = get_the_terms( get_the_ID(), 'topic' );
            $topic_name  = ( $topic_terms && ! is_wp_error( $topic_terms ) ) ? $topic_terms[0]->name : '';
        ?>
                    <li class="p-top-column__card c-column-card">
                        <a href="<?php the_permalink(); ?>" class="c-column-card__link">
                            <div class="c-column-card__img">
                                <?php if ( has_post_thumbnail() ) : the_post_thumbnail('large'); ?>
                                <?php else : ?>
                                <picture>
                                    <source srcset="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/common/no-img.webp" type="image/webp">
                                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/common/no-img.png" alt="" width="1440" height="400" loading="lazy">
                                </picture>
                                <?php endif; ?>
                            </div>
                            <div class="c-column-card__content">
                                <div class="c-column-card__label">
                                    <time class="c-column-card__date" datetime="<?php echo esc_attr( get_the_date('c') ); ?>">
                                        <?php echo esc_html( get_the_date('Y.m.d') ); ?>
                                    </time>
                                    <?php if ( $topic_name ) : ?>
                                    <span class="c-column-card__category"><?php echo esc_html( $topic_name ); ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="c-column-card__title"><?php the_title(); ?></div>
                            </div>
                        </a>
                    </li>
                    <?php endwhile; else : ?>
                    <li class="p-top-column__card p-top-news__card--empty">まだ記事がありません</li>
                    <?php endif; wp_reset_postdata(); ?>
                </ul>
            </div>
        </div>
    </section>

</main>
<?php get_footer(); ?>