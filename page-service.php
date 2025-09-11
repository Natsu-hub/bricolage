<?php 
/**
* Template Name: 事業案内
*/
get_header(); 
$page_slug = $post->post_name;
?>

<main class="l-main">
    <!-- c-below-mv -->
    <section class="c-below-mv">
        <div class="c-below-mv__inner l-inner--1200">
            <h1 class="c-below-mv__title">
                <img class="c-below-mv__title-deco c-deco-04" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/common/deco04.svg" alt="" width="68" height="46">
                <span class="c-below-mv__title-en" lang="en">service</span>
                <span class="c-below-mv__title-ja">事業内容</span>
            </h1>
            <div class="c-below-mv__img">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/below/service_fv-img01.svg" alt="" width="195" height="146" loading="lazy">
                <span class="c-below-mv__bg-title c-deco-title js-fade-in-right" lang="en">service</span>
            </div>
        </div>
    </section>

    <!-- p-service -->
    <section class="p-service">
        <div class="p-service__bg c-bg">
            <div class="p-service__inner l-inner">
                <img class="p-service__deco c-deco-03" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/common/deco03.svg" alt="" width="56" height="60" loading="lazy">
                <ol class="p-service__items">
                    <li class="p-service__item">
                        <span class="p-service__item-title-number u-desktop">01</span>
                        <div class="p-service__item-box">
                            <h2 class="p-service__item-title">
                                <span class="p-service__item-title-number u-mobile">01</span>
                                <span class="p-service__item-title-en" lang="en">Marketing</span>
                                <span class="p-service__item-title-ja">マーケティング領域</span>
                            </h2>
                            <p class="p-service__item-content">戦略設計から実行支援、運用改善まで。貴社に伴走しながら成果に直結するマーケティングを実現します。</p>
                            <div class="p-service__item-btn">
                                <a class="p-service__item-link c-btn c-btn--small" href="<?php echo MARKETING_URL; ?>">もっとみる</a>
                            </div>
                        </div>
                        <img class="p-service__item-img" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/common/service_img01.svg" alt="マーケティング領域のイメージイラスト" width="380" height="285" loading="lazy">
                    </li>
                    <li class="p-service__item">
                        <span class="p-service__item-title-number u-desktop">02</span>
                        <div class="p-service__item-box">
                            <h2 class="p-service__item-title">
                                <span class="p-service__item-title-number u-mobile">02</span>
                                <span class="p-service__item-title-en" lang="en">Sales</span>
                                <span class="p-service__item-title-ja">セールス領域</span>
                            </h2>
                            <p class="p-service__item-content">営業プロセスの構築から実務支援、ツール導入まで。現場に寄り添い、成果につながる営業体制を共に作ります。</p>
                            <div class="p-service__item-btn">
                                <a class="p-service__item-link c-btn c-btn--small" href="<?php echo SALES_URL; ?>">もっとみる</a>
                            </div>
                        </div>
                        <img class="p-service__item-img" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/common/service_img02.svg" alt="セールス領域のイメージイラスト" width="380" height="285" loading="lazy">
                    </li>

                    <li class="p-service__item">
                        <span class="p-service__item-title-number u-desktop">03</span>
                        <div class="p-service__item-box">
                            <h2 class="p-service__item-title">
                                <span class="p-service__item-title-number u-mobile">03</span>
                                <span class="p-service__item-title-en" lang="en">IT Deploy</span>
                                <span class="p-service__item-title-ja">IT・DXコンサルティング/導入支援</span>
                            </h2>
                            <p class="p-service__item-content">業務課題の可視化からITツールの選定・導入・保守支援まで。現場の声を反映しながら、実行可能なDXを一緒に進めます。</p>
                            <div class="p-service__item-btn">
                                <a class="p-service__item-link c-btn c-btn--small" href="<?php echo IT_URL; ?>">もっとみる</a>
                            </div>
                        </div>
                        <img class="p-service__item-img" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/common/service_img03.svg" alt="IT・DXコンサルティング/導入支援のイメージイラスト" width="380" height="285" loading="lazy">
                    </li>
                    <li class="p-service__item">
                        <span class="p-service__item-title-number u-desktop">04</span>
                        <div class="p-service__item-box">
                            <h2 class="p-service__item-title">
                                <span class="p-service__item-title-number u-mobile">04</span>
                                <span class="p-service__item-title-en" lang="en">Security</span>
                                <span class="p-service__item-title-ja">セキュリティコンサルティング</span>
                            </h2>
                            <p class="p-service__item-content">ISMSやPマークなど各種規程取得。現状分析〜企業規模やフェーズに応じたセキュリティ体制構築を継続的に支援します。</p>
                            <div class="p-service__item-btn">
                                <a class="p-service__item-link c-btn c-btn--small" href="<?php echo SECURITY_URL; ?>">もっとみる</a>
                            </div>
                        </div>
                        <img class="p-service__item-img" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/common/service_img04.svg" alt="セキュリティコンサルティングのイメージイラスト" width="380" height="285" loading="lazy">
                    </li>
                </ol>
            </div>
        </div>
    </section>

</main>
<?php get_footer(); ?>