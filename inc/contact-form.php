<?php

    // Contact Form 7で自動挿入されるPタグ、brタグを削除
    add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
    function wpcf7_autop_return_false()
    {
    return false;
    };

    // Contact Form7の送信ボタンをクリックした後の遷移先設定
	add_action( 'wp_footer', 'add_origin_thanks_page' );
	function add_origin_thanks_page() {
	$thanks = home_url('/contact-thanks/');
	echo <<<EOC
    <script>
    var thanksPage = {
        765: '{$thanks}',
    };
    document.addEventListener( 'wpcf7mailsent', function( event ) {
        location = thanksPage[event.detail.contactFormId];
    }, false );
    </script>
EOC;
	}

/**
 * Contact Form 7 でカスタム属性を追加
 * @param array $out
 * @param array $pairs
 * @param array $atts
 * @return array
 */
add_filter('shortcode_atts_wpcf7', 'custom_shortcode_atts_wpcf7_filter', 10, 3);
function custom_shortcode_atts_wpcf7_filter($out, $pairs, $atts)
{
	$my_attr = 'download_link';
	if (isset($atts[$my_attr])) {
		$out[$my_attr] = $atts[$my_attr];
	}
	return $out;
}

//コンタクトフォーム７に画像を挿入
function contact_images_url() {
	return get_template_directory_uri(); // オリジナルテーマの場合
}
wpcf7_add_form_tag( 'indicate_images_url', 'contact_images_url' );

function contact_privacy_url() {
	return home_url('/privacy_policy'); // プライバシーポリシーページのURLを取得
}
wpcf7_add_form_tag( 'indicate_privacy_url', 'contact_privacy_url' );