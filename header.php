<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta name="format-detection" content="telephone=no" />

    <!-- icon -->
    <link rel="apple-touch-icon" type="image/png" href="/apple-touch-icon-180x180.png">
    <link rel="apple-touch-icon" type="image/png" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="/icon-192x192.png">
    <link rel="shortcut icon" href="<?php echo esc_url(get_template_directory_uri()); ?>/favicon.ico">
    <style>
    /* first paint 用（最小限） */
    .p-header__inner {
        padding-left: 20px;
        padding-right: 20px
    }

    @media (min-width:768px) {
        .p-header__inner {
            padding-left: 40px;
            padding-right: 40px
        }
    }
    </style>
    <?php wp_head(); ?>
</head>

<body id="body" class="js-fadeIn" <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div class="l-footer-fixed">
        <!-- <body> -->
        <header class="p-header l-header js-header">
            <div class="p-header__inner">
                <?php if ( is_front_page() ) : ?>
                <div class="p-header__logo p-header__logo--top">
                    <a href="#body"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/common/logo_black.svg" alt="ブリコラージュ合同会社のロゴ" width="182" height="80" loading="lazy">
                    </a>
                </div>
                <?php else : ?>
                <div class="p-header__logo">
                    <a href="<?php echo HOME_URL; ?>"> <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/common/logo_black.svg" alt="ブリコラージュ合同会社のロゴ" width="182" height="80" loading="lazy">
                    </a>
                </div>
                <?php endif; ?>
                <div class="p-header__nav-lists">
                    <nav class="p-header__nav">
                        <?php if ( is_front_page() ) : ?>
                        <ul class="p-header__nav-items p-header__nav-items--top">
                            <?php else : ?>
                            <ul class="p-header__nav-items">
                                <?php endif; ?>
                                <!-- <ul class="p-header__nav-items"> -->
                                <li class="p-header__nav-item">
                                    <a class="p-header__nav-link <?php if (is_front_page()): ?>current<?php endif; ?>" href="<?php echo HOME_URL; ?>"><span class="p-header__nav-deco">トップ</span></a>
                                </li>
                                <li class="p-header__nav-item p-header__item--mega-menu">
                                    <a class="p-header__nav-link <?php if (is_page("service")): ?>current<?php endif; ?>" href="<?php echo SERVICE_URL; ?>"><span class="p-header__nav-deco">事業案内</span></a>
                                    <div class="p-p-header__sublist-wrap">
                                        <ul class="p-header__sublist">
                                            <li><a href="<?php echo MARKETING_URL; ?>">マーケティング領域</a></li>
                                            <li><a href="<?php echo SALES_URL; ?>">セールス領域</a></li>
                                            <li><a href="<?php echo IT_URL; ?>">IT・DXコンサルティング/導入支援</a></li>
                                            <li><a href="<?php echo SECURITY_URL; ?>">セキュリティコンサルティング</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="p-header__nav-item">
                                    <a class="p-header__nav-link <?php if (is_post_type_archive("news") || is_singular("news")): ?>current<?php endif; ?>" href="<?php echo NEWS_URL; ?>"><span class="p-header__nav-deco">ニュース</span></a>
                                </li>
                                <li class="p-header__nav-item">
                                    <a class="p-header__nav-link <?php if (is_post_type_archive("column") || is_singular("column")): ?>current<?php endif; ?>" href="<?php echo COLUMN_URL; ?>"><span class="p-header__nav-deco">コラム</span></a>
                                </li>
                                <li class="p-header__nav-item">
                                    <a class="p-header__nav-link <?php if (is_page("company")): ?>current<?php endif; ?>" href="<?php echo ABOUT_URL; ?>"><span class="p-header__nav-deco">会社紹介</span></a>
                                </li>
                            </ul>
                    </nav>
                    <div class="p-header__nav-contact<?php echo is_front_page() ? ' p-header__nav-contact--top' : ''; ?>">
                        <a class="p-header__nav-contact-item c-btn-contact" href="<?php echo CONTACT_URL; ?>">
                            <span>お問い合わせ</span>
                        </a>
                    </div>
                    <button class="p-header__hamburger js-hamburger u-mobile">
                        <p class="p-header__hamburger-text">menu</p>
                        <span></span>
                        <span></span>
                    </button>
                </div>
                <div class="p-header__drawer js-drawer">
                    <div class="p-header__drawer-bg js-drawer-overlay">
                    </div>
                    <div class="p-header__drawer-nav">
                        <ul class="p-header__drawer-items">
                            <li class="p-header__drawer-item">
                                <a class="p-header__drawer-link <?php if ( is_front_page() ) : ?>current<?php endif; ?>" href="<?php echo HOME_URL; ?>">トップ</a>
                            </li>
                            <li class="p-header__drawer-item">
                                <a class="p-header__drawer-link <?php if ( is_page('service') ) : ?>current<?php endif; ?>" href="<?php echo SERVICE_URL; ?>">事業案内</a>
                                <ul class="p-header__sub-items">
                                    <li class="p-header__sub-item">
                                        <a class="p-header__sub-item-link <?php if ( is_page('marketing') ) : ?>current<?php endif; ?>" href="<?php echo SERVICE_URL; ?>/marketing">マーケティング領域</a>
                                    </li>
                                    <li class="p-header__sub-item">
                                        <a class="p-header__sub-item-link <?php if ( is_page('sales') ) : ?>current<?php endif; ?>" href="<?php echo SERVICE_URL; ?>/sales">セールス領域</a>
                                    </li>
                                    <li class="p-header__sub-item">
                                        <a class="p-header__sub-item-link <?php if ( is_page('it') ) : ?>current<?php endif; ?>" href="<?php echo SERVICE_URL; ?>/it">IT・DXコンサルティング/導入支援</a>
                                    </li>
                                    <li class="p-header__sub-item">
                                        <a class="p-header__sub-item-link <?php if ( is_page('security') ) : ?>current<?php endif; ?>" href="<?php echo SERVICE_URL; ?>/security">セキュリティコンサルティング</a>
                                    </li>

                                </ul>
                            </li>
                            <li class="p-header__drawer-item">
                                <a class="p-header__drawer-link <?php if ( is_post_type_archive('news') || is_singular('news') ) : ?>current<?php endif; ?>" href="<?php echo NEWS_URL; ?>">ニュース</a>
                            </li>
                            <li class="p-header__drawer-item">
                                <a class="p-header__drawer-link <?php if ( is_post_type_archive('column') || is_singular('column') ) : ?>current<?php endif; ?>" href="<?php echo COLUMN_URL; ?>">コラム</a>
                            </li>
                            <li class="p-header__drawer-item">
                                <a class="p-header__drawer-link <?php if ( is_page('about') ) : ?>current<?php endif; ?>" href="<?php echo ABOUT_URL; ?>">会社紹介</a>
                            </li>
                        </ul>
                        <div class="p-header__drawer-contact">
                            <div class="p-header__drawer-contact-head">contact
                            </div>
                            <p class="p-header__drawer-contact-text">まずはお気軽にお問い合わせください。
                            </p>
                            <a class="p-header__drawer-link-contact c-btn-contact" href="<?php echo CONTACT_URL; ?>">お問い合わせ</a>
                        </div>
                        <div class="p-header__drawer-privacy">
                            <a class="p-header__drawer-privacy-link" href="<?php echo PRIVACY_URL; ?>">プライバシーポリシー</a>
                        </div>
                        <div class="p-header__drawer-company">ブリコラージュ合同会社
                        </div>
                        <address class="p-header__drawer-address">東京都渋谷区神宮前6丁目23番4号 桑野ビル2階
                        </address>
                        <a href="https://maps.app.goo.gl/foLWA6hsirY4pkZJ7" class="p-header__drawer-map" target="_blank" rel="noopener noreferrer">GoogleMap</a>
                        <div class="p-header__drawer-img">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/common/sp-menu_img01.svg" alt="社内で働く人のイラスト" width="195" height="127" loading="lazy">
                        </div>
                    </div>
                </div>
            </div>
        </header>