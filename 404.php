<?php get_header(); ?>
<main class="l-main">

    <!-- p-404 -->
    <div class="p-404">
        <div class="p-404__inner l-inner">
            <h1 class="p-404__title">
                <img class="p-404__title-deco c-deco-04" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/common/deco04.svg" alt="" width="68" height="46">
                <span class="p-404__title-en" lang="en">404</span>
                <span class="p-404__title-ja">お探しのページは見つかりませんでした。</span>
            </h1>
            <p class="p-404__text">ページが削除されたか、移動された可能性があります。<br>
                URLをご確認いただくか、トップページから再度お試しください。</p>
            <div class="p-404__back">
                <a class="p-404__back-link c-btn" href="<?php echo HOME_URL; ?>">サイトTOPへ戻る
                </a>
            </div>
        </div>
    </div>

</main>
<?php get_footer(); ?>