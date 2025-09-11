<?php 
/**
* Template Name: お問い合わせ
*/
get_header(); 
$page_slug = $post->post_name;
?>

<main class="l-main">
    <!-- p-contact-mv -->
    <section class="p-contact-mv">
        <div class="p-contact-mv__inner l-inner--1200">
            <div class="p-contact-mv__title">
                <img class="p-contact-mv__title-deco c-deco-04" src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/common/deco04.svg" alt="" width="68" height="46">
                <span class="p-contact-mv__title-en p-contact-mv__title-en--contact" lang="en">contact</span>
                <span class="p-contact-mv__title-ja p-contact-mv__title-ja--contact">お問い合わせ</span>
            </div>
            <div class="p-contact-mv__img">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/below/contact_fv-img01.svg" alt="" width="195" height="146" loading="lazy">
                <span class="p-contact-mv__bg-title c-deco-title js-fade-in-right" lang="en">contact</span>
            </div>
        </div>
        <h1 class="p-contact-mv__title p-contact-mv__title--center u-desktop">
            <span class="p-contact-mv__title-en" lang="en">contact</span>
            <span class="p-contact-mv__title-ja">お問い合わせ</span>
        </h1>
    </section>

    <!-- p-contact -->
    <section class="p-contact">
        <div class="p-contact__inner l-inner">
            <p class="p-contact__text">まずはお気軽にご相談ください。<br>貴社に合ったご提案をさせていただきます。</p>
            <div class="p-contact__form">

                <div id="hs-contact" class="c-hsform"></div>
                <script src="//js-na2.hsforms.net/forms/embed/v2.js" charset="utf-8"></script>
                <script>
                hbspt.forms.create({
                    portalId: "44170836",
                    formId: "f3c87071-4055-43a0-b038-dff7f6deee88",
                    region: "na2",
                    target: "#hs-contact",
                    locale: "ja",
                    onFormReady: function($form) {
                        // iframe内のdocumentを取得
                        var doc = $form[0].ownerDocument;

                        // 1) Google Fonts を iframe 内に読み込み
                        var link = doc.createElement('link');
                        link.rel = 'stylesheet';
                        link.href = 'https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&display=swap';
                        doc.head.appendChild(link);

                        // 2) スタイルを iframe 内に注入（完全ローカルでも効く）
                        var css = `
                        :root{
        --font-family:'Noto Sans',sans-serif;
        --font-size:16px;
        --font-weight:700;
        --line-height:1.8;         /* 180% */
        --font-color:#333333;
        --btn-bg:##418EE8;
        --btn-color:#ffffff;
        --bd:#E2E8F0;
      }
      
                        /* HubSpotフォーム全体のベーススタイル */
/* 入力欄の文字も同じスタイルに */
.hs-form .hs-input,
.hs-form label,
.hs-form textarea,
.hs-form select {
  font-family: 'Noto Sans JP', sans-serif !important;
  font-size: 16px !important;
  font-weight: 700 !important;
  line-height: 180% !important;
  color: #333333 !important;
}

      .hs-form fieldset{max-width:none;}
      .hs-form .hs-form-field{margin-bottom:18px;}
      .hs-form label{display:block;margin:0 0 6px;font-size:16px;font-weight:700;color:#333;}
      .hs-form .hs-form-required{display:inline-block;margin-left:6px;font-size:11px;font-weight:700;color:#fff;background:#ef4444;padding:2px 6px;border-radius:6px;line-height:1;}
      .hs-form .hs-input,.hs-form textarea{width:100%;font-size:14px;border:1px solid #BED7F4;border-radius:8px;padding:12px 14px;background:#fff;box-shadow:0 1px 0 rgba(15,23,42,.02);}
      .hs-form textarea{min-height:140px;resize:vertical;}
      .hs-form .hs-input:focus,.hs-form textarea:focus{outline:none;border-color:#418EE8;box-shadow:0 0 0 3px #DBEAFE;}
      ::placeholder{color:#888;}
      .hs-form .inputs-list{list-style:none;padding:0;margin:0;}
      .hs-form input[type="checkbox"]{appearance:none;width:18px !important;height:18px;border:1.5px solid #418EE8;border-radius:4px;background:#fff;vertical-align:-3px;margin-right:8px;}
      .hs-form input[type="checkbox"]:checked{width:18px !important;height:18px;border:1.5px solid #418EE8;border-radius:4px;background:#418EE8;vertical-align:-3px;margin-right:8px;}
      .hs-form input[type="checkbox"]:checked::after{content:"";position:relative;left:-5px;top:-12px;width:8px;height:17px;border:4px solid #fff;border-top:0;border-left:0;transform:rotate(45deg);display:inline-block;}
      .hs-error-msgs,.hs-error-msg{color:#b91c1c !important; font-size:12px;margin-top:6px;}
      .hs-error-msgs label{ color: #b91c1c !important;}
      .hs-submit .actions{text-align:center;
        max-width:fit-content;
        margin-inline: auto;
    margin-top:40px;}
      /* 送信ボタン（丸カプセル＋右端の小円） */
  .hs-submit .actions{text-align:center;}
  .hs-button {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
  padding: 28px 28px;
  width:335px;
  height:80px;
  border-radius: 9999px;
  background: #418ee8 !important; /* ←青を強制 */
  color: #fff !important; /* ←文字色も強制 */
  font-weight: 700;
  font-size: 20px !important;
  font-family: 'Noto Sans JP', sans-serif !important;
  border: none;
  cursor: pointer;
transition: all 0.3s ease-out 0s;
}

  .hs-button::after{
    content:"";
    width:22px;
    height:22px;
    border-radius:9999px;
    background:rgba(255,255,255,.25);
  }
  .hs-button:hover{background: #37A9E6 !important;}
  .hs-button:active{transform:translateY(1px);}
      @media (min-width:768px){
        fieldset.form-columns-2 .hs-form-field{width:calc(50% - 12px);float:left;}
        fieldset.form-columns-2 .hs-form-field:nth-child(odd){margin-right:24px;}
      }
      /* HubSpotフォームの必須マークを「必須」に変更 */
.hs-form-required {
    visibility: hidden; /* もとの＊を隠す */
    position: relative;
}
.hs-form-required::after {
    content: "必須"; /* 代わりに「必須」を表示 */
    visibility: visible;
    position: absolute;
    top: 50%;
  left: 0;
  transform: translateY(-50%);
    color: #fff; /* 色を必要に応じて変更 */
    font-size: 11px !important; /* サイズ調整 */
    padding-left: 8px;
    padding-top: 1px;
    background-color: #CD3E3E;
    width:31px;
    height:13px;
    border-radius: 3px;
}

.hs_recaptcha{margin-top:20px;}


    `;
                        var style = doc.createElement('style');
                        style.type = 'text/css';
                        style.appendChild(doc.createTextNode(css));
                        doc.head.appendChild(style);

                        // ボタン文言など
                        $form.find('input[type="submit"].hs-button').val('送信する');

                    }
                });
                </script>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>