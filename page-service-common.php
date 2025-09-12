<?php
/**
 * Template Name: サービス共通 (JSON)
 */
get_header();

// スラッグを取得（子ページ: marketing / sales / it / security）
$slug = get_post_field('post_name', get_post());

// データファイルのパス
$dir  = get_theme_file_path('data-services');
$file = trailingslashit($dir) . $slug . '.json';

// ヘルパー
$img = function ($path) {
  // 例: 'common/deco04.svg' or 'below/service_fv-img02.svg'
  return esc_url( get_theme_file_uri( 'assets/images/' . ltrim($path, '/')) );
};

// 許可タグ（見出しに <span> や <br> を使いたいケース向け）
$allowed = [
  'br'   => [],
  'span' => ['class'=>[], 'lang'=>[]],
  'strong'=>[], 'em'=>[], 'small'=>[], 'u'=>[], 'b'=>[], 'i'=>[],
];

// JSON 読み込み
$data = [];
if (file_exists($file)) {
  $raw = file_get_contents($file);
  $data = json_decode($raw, true);
  if (!is_array($data)) $data = [];
}

// セクション用の取り出し（無くても落ちないようデフォルトを用意）
$below    = $data['below_mv'] ?? [];
$issues   = $data['issues']    ?? [];
$solution = $data['solution']  ?? null;
$features = $data['features']  ?? [];
$services = $data['services']  ?? [];

// ===== ここからマークアップ =====
?>
<main class="l-main">

    <!-- c-below-mv -->
    <section class="c-below-mv">
        <div class="c-below-mv__inner l-inner--1200">
            <h1 class="c-below-mv__title">
                <img class="c-below-mv__title-deco c-deco-04" src="<?php echo $img( $below['deco'] ?? 'common/deco04.svg'); ?>" alt="" width="68" height="46">
                <span class="c-below-mv__title-en" lang="en">
                    <?php echo esc_html($below['en'] ?? 'service'); ?>
                </span>
                <span class="c-below-mv__title-ja">
                    <?php echo esc_html($below['ja'] ?? get_the_title()); ?>
                </span>
            </h1>
            <div class="c-below-mv__img">
                <img src="<?php echo $img( $below['img'] ?? 'below/service_fv-img02.svg'); ?>" alt="<?php echo esc_attr($below['img_alt'] ?? ''); ?>" width="195" height="146" loading="lazy">
                <span class="c-below-mv__bg-title c-deco-title js-fade-in-right" lang="en">
                    <?php echo esc_html($below['bg_title'] ?? ($below['en'] ?? 'service')); ?>
                </span>
            </div>
        </div>
    </section>

    <!-- p-issue -->
    <?php if (!empty($issues)): ?>
    <section class="p-issue">
        <div class="p-issue__bg">
            <div class="p-issue__inner l-inner">
                <h2 class="p-top-service__title c-title c-title--center">
                    <span class="c-title-en" lang="en">issue</span>
                    <span class="c-title-ja">よくある課題</span>
                </h2>

                <ul class="p-issue__items">
                    <?php foreach ($issues as $item): ?>
                    <li class="p-issue__item">
                        <?php if (!empty($item['icon'])): ?>
                        <img class="p-issue__item-img" src="<?php echo $img($item['icon']); ?>" alt="<?php echo esc_attr($item['icon_alt'] ?? ''); ?>" width="37" height="37" loading="lazy">
                        <?php endif; ?>
                        <div class="p-issue__item-box">
                            <h3 class="p-issue__item-title">
                                <?php echo wp_kses( $item['title'] ?? '', $allowed ); ?>
                            </h3>
                            <?php if (!empty($item['content'])): ?>
                            <p class="p-issue__item-content">
                                <?php echo esc_html($item['content']); ?>
                            </p>
                            <?php endif; ?>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- p-solution -->
    <?php if (!empty($solution)): ?>
    <section class="p-solution">
        <div class="p-solution__inner l-inner">
            <div class="p-solution__bg">
                <h2 class="p-solution__title c-title c-title--center">
                    <span class="c-title-en c-title-en--white" lang="en">solution</span>
                    <span class="p-solution__title-ja">
                        <?php echo wp_kses( $solution['title_ja'] ?? '', $allowed ); ?>
                    </span>
                </h2>
                <?php if (!empty($solution['content'])): ?>
                <p class="p-solution__content">
                    <?php echo wp_kses( $solution['content'], $allowed ); ?>
                </p>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- p-feature -->
    <?php if (!empty($features)): ?>
    <section class="p-feature">
        <div class="p-feature__bg c-bg">
            <div class="p-feature__inner l-inner">
                <img class="p-feature__deco c-deco-01" src="<?php echo $img('common/deco01.svg'); ?>" alt="" width="47" height="63" loading="lazy">
                <h2 class="p-top-feature__title c-title c-title--center">
                    <span class="c-title-en" lang="en">feature</span>
                    <span class="c-title-ja">特徴</span>
                </h2>

                <ol class="p-feature__items">
                    <?php foreach ($features as $i => $f): ?>
                    <li class="p-feature__item">
                        <span class="p-feature__item-title-number u-desktop">
                            <?php echo sprintf('%02d', $i+1); ?>
                        </span>
                        <div class="p-feature__item-box">
                            <h3 class="p-feature__item-title">
                                <span class="p-feature__item-title-number u-mobile">
                                    <?php echo sprintf('%02d', $i+1); ?>
                                </span>
                                <span class="p-feature__item-title-ja">
                                    <?php echo wp_kses( $f['title'] ?? '', $allowed ); ?>
                                </span>
                            </h3>
                            <?php if (!empty($f['content'])): ?>
                            <p class="p-feature__item-content">
                                <?php echo esc_html($f['content']); ?>
                            </p>
                            <?php endif; ?>
                        </div>
                        <?php if (!empty($f['image'])): ?>
                        <img class="p-feature__item-img" src="<?php echo $img($f['image']); ?>" alt="<?php echo esc_attr($f['image_alt'] ?? ''); ?>" width="380" height="285" loading="lazy">
                        <?php endif; ?>
                    </li>
                    <?php endforeach; ?>
                </ol>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- p-service-detail -->
    <?php if (!empty($services)): ?>
    <section class="p-service-detail">
        <div class="p-service-detail__inner l-inner">
            <img class="p-service-detail__deco c-deco-01" src="<?php echo $img('common/deco03.svg'); ?>" alt="" width="56" height="60" loading="lazy">
            <h2 class="p-top-service-detail__title c-title c-title--center">
                <span class="c-title-en" lang="en">service</span>
                <span class="c-title-ja">サービス</span>
            </h2>

            <ul class="p-service-detail__items">
                <?php foreach ($services as $s): ?>
                <li class="p-service-detail__item">
                    <?php if (!empty($s['image'])): ?>
                    <img class="p-service-detail__item-img" src="<?php echo $img($s['image']); ?>" alt="<?php echo esc_attr($s['image_alt'] ?? ''); ?>" width="164" height="123" loading="lazy">
                    <?php endif; ?>

                    <h3 class="p-service-detail__item-title">
                        <?php echo wp_kses( $s['title'] ?? '', $allowed ); ?>
                    </h3>

                    <?php if (!empty($s['list']) && is_array($s['list'])): ?>
                    <ul class="p-service-detail__item-box">
                        <?php foreach ($s['list'] as $li): ?>
                        <li class="p-service-detail__list">
                            <?php echo esc_html($li); ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>
    <?php endif; ?>

</main>
<?php get_footer(); ?>