<?php 
/**
* Template Name: 会社紹介
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
                <span class="c-below-mv__title-en" lang="en">about</span>
                <span class="c-below-mv__title-ja">会社紹介</span>
            </h1>
            <div class="c-below-mv__img c-below-mv__img--about">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/below/about_fv-img01.svg" alt="" width="280" height="194" loading="lazy">
                <span class="c-below-mv__bg-title c-deco-title js-fade-in-right" lang="en">about</span>
            </div>
        </div>
        </div>
    </section>

    <!-- p-business -->
    <section class="p-business">
        <div class="p-business__inner l-inner">
            <h2 class="p-business__title c-title c-title--center">
                <span class="c-title-en" lang="en">business</span>
                <span class="c-title-ja">事業案内</span>
            </h2>
            <ul class="p-business__items">
                <li class="p-business__item">
                    <dl class="p-business__list">
                        <div class="p-business__list-row">
                            <dt class="p-business__list-title">会社名</dt>
                            <dd class="p-business__list-description">ブリコラージュ合同会社</dd>
                        </div>
                        <div class="p-business__list-row">
                            <dt class="p-business__list-title">代表者名</dt>
                            <dd class="p-business__list-description">丸山僚太</dd>
                        </div>
                        <div class="p-business__list-row">
                            <dt class="p-business__list-title">設立</dt>
                            <dd class="p-business__list-description">2022年2月</dd>
                        </div>
                        <div class="p-business__list-row">
                            <dt class="p-business__list-title">所在地</dt>
                            <dd class="p-business__list-description">東京都渋谷区神宮前6丁目23番4号 桑野ビル2階</dd>
                        </div>
                        <div class="p-business__list-row">
                            <dt class="p-business__list-title">事業内容</dt>
                            <dd class="p-business__list-description">マーケティング/営業にかかわるコンサルティング、及び実行支援<br>IT製品導入コンサルティング/導入支援<br>セキュリティコンサルティング/セキュリティ関連製品導入支援</dd>
                        </div>
                        <div class="p-business__list-row">
                            <dt class="p-business__list-title">主要取引銀行</dt>
                            <dd class="p-business__list-description">三井住友銀行、GMOあおぞらネット銀行</dd>
                        </div>
                    </dl>
                </li>
            </ul>
        </div>
    </section>

    <!-- p-access -->
    <section class="p-access">
        <div class="p-access__inner l-inner">
            <h2 class="p-access__title c-title c-title--center">
                <span class="c-title-en" lang="en">access</span>
                <span class="c-title-ja">アクセス</span>
            </h2>
            <!-- Google Mapの共有タグを埋め込む -->
            <div class="p-access__map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3241.6693509361767!2d139.73782217567594!3d35.66051727259394!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188bdecb913b5d%3A0xf582651d930e5526!2z6bq75biD5Y-w44OS44Or44K6IOajrkpQ44K_44Ov44O8!5e0!3m2!1sja!2sjp!4v1700948110431!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <address class="p-access__text">〒150-0001<br>東京都渋谷区神宮前6丁目23番4号 桑野ビル2階
            </address>
            <div class="p-access__link">
                <a class="p-access__map-link" href="http://" target="_blank" rel="noopener noreferrer">GoogleMap</a>
            </div>
        </div>
    </section>


</main>
<?php get_footer(); ?>