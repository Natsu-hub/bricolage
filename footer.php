<!-- p-footer -->
<?php 
$page_slug = basename(get_permalink());

// 対象ページかどうか判定
$special_pages = array('contact');

// 該当するページなら p-footer--full-bg を追加
$footer_class = in_array($page_slug, $special_pages) ? 'p-footer l-footer p-footer--full-bg' : 'p-footer l-footer';
?>

<footer class="<?php echo $footer_class; ?>">

    <!-- 共通お問い合わせ -->
    <?php 
$page_slug = basename(get_permalink());
if (!in_array($page_slug, array('contact'))) {
    get_template_part('template/common-contact');
}
?>
    <div class="p-footer__container">
        <div class="p-footer__inner l-inner--1200">
            <div class="p-footer__box">
                <div class="p-footer__items">
                    <div class="p-footer__info">
                        <?php if ( is_front_page() ) : ?>
                        <div class="p-footer__company">
                            <a href="#body">
                                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/common/logo_white.svg" alt="ブリコラージュ合同会社のロゴ" width="260" height="57" loading="lazy">
                            </a>
                        </div>
                        <?php else : ?>
                        <div class="p-footer__company">
                            <a href="<?php echo HOME_URL; ?>">
                                <img class="p-footer__company-logo" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/common/logo_white.svg" alt="ブリコラージュ合同会社のロゴ" width="260" height="57" loading="lazy">
                            </a>
                        </div>
                        <?php endif; ?>
                        <div class="p-footer__company-detail">
                            <div class="p-footer__company-name">ブリコラージュ合同会社</div>
                            <address class="p-footer__company-address">
                                <p>東京都渋谷区神宮前6丁目23番4号&nbsp;桑野ビル2階</p>
                                <a href="https://maps.app.goo.gl/foLWA6hsirY4pkZJ7" class="p-footer__company-map" target="_blank" rel="noopener noreferrer">GoogleMap</a>
                            </address>
                        </div>
                    </div>
                    <ul class="p-footer__nav">
                        <li class="p-footer__nav-item">
                            <a class="p-footer__nav-link" href="<?php echo HOME_URL; ?>">トップ</a>
                        </li>
                        <li class="p-footer__nav-item">
                            <a class="p-footer__nav-link" href="<?php echo SERVICE_URL; ?>">事業案内</a>
                        </li>
                        <li class="p-footer__nav-item">
                            <a class="p-footer__nav-link" href="<?php echo NEWS_URL; ?>">ニュース</a>
                        </li>
                        <li class="p-footer__nav-item">
                            <a class="p-footer__nav-link" href="<?php echo COLUMN_URL; ?>">コラム</a>
                        </li>
                        <li class="p-footer__nav-item">
                            <a class="p-footer__nav-link" href="<?php echo ABOUT_URL; ?>">会社紹介</a>
                        </li>
                        <li class="p-footer__nav-item">
                            <a class="p-footer__nav-link" href="<?php echo CONTACT_URL; ?>">お問い合わせ</a>
                        </li>
                    </ul>
                    <div class="p-footer__nav-privacy u-mobile">
                        <a class="p-footer__nav-privacy-link" href="<?php echo PRIVACY_URL; ?>">プライバシーポリシー</a>
                    </div>
                </div>
                <div class="p-footer__img">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/common/footer_img01.svg" alt="" width="330" height="242" loading="lazy">
                </div>
                <small class="p-footer__copy-right">&copy;&nbsp;bricolage All rights reserved.</small>
            </div>
            <div class="p-footer__nav-privacy u-desktop">
                <a class="p-footer__nav-privacy-link" href="<?php echo PRIVACY_URL; ?>">プライバシーポリシー</a>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer()?>
</div>
</body>

</html>