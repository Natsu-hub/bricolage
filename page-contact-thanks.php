<?php 
/**
* Template Name: お問い合わせ（完了）
*/
get_header(); 
$page_slug = $post->post_name;
?>

<main class="l-main">
    <!-- thanks -->
    <div class="p-thanks">
        <div class="p-thanks__inner l-inner">
            <h1 class="p-thanks__title">
                <img class="p-thanks__title-deco c-deco-04" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/common/deco04.svg" alt="" width="68" height="46">
                <span class="p-thanks__title-en" lang="en">Thank You</span>
                <span class="p-thanks__title-ja">お問い合わせが完了しました。</span>
            </h1>
            <p class="p-thanks__text">３営業日以上経過し、かつ迷惑メールフォルダを確認しても弊社からの連絡がない場合は、<br class="u-desktop">
                お手数をお掛けいたしますがお電話からお問い合わせいただきますようお願い申し上げます。</p>
            <div class="p-thanks__back">
                <a class="p-thanks__back-link c-btn" href="<?php echo HOME_URL; ?>">サイトTOPへ戻る
                </a>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>