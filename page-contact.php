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
                <script src="https://js-na2.hsforms.net/forms/embed/v2.js" charset="utf-8"></script>
                <script>
                (function() {
                    // ページ側にjQueryが無くても動くよう即時関数＋素のJSで記述
                    function injectStylesInto(iframeDoc) {
                        if (!iframeDoc) return;

                        // Google Fonts を iframe 内へ（Noto Sans JP に統一）
                        var link = iframeDoc.createElement('link');
                        link.rel = 'stylesheet';
                        link.href = 'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap';
                        iframeDoc.head.appendChild(link);

                        // 冗長を整理したCSS（!importantは最小限）
                        var css = `
:root{
  --font-family:'Noto Sans JP',sans-serif;
  --font-size:16px;
  --font-weight:700;
  --line-height:1.8;
  --font-color:#333333;
  --btn-bg:#418EE8;
  --btn-color:#ffffff;
  --bd:#E2E8F0;
}

/* ベース */
.hs-form .hs-input,
.hs-form label,
.hs-form textarea,
.hs-form select{
  font-family:var(--font-family) !important;
  font-size:16px !important;
  font-weight:700 !important;
  line-height:1.8 !important;
  color:var(--font-color) !important;
}
.hs-form fieldset{max-width:none;}
.hs-form .hs-form-field{margin-bottom:18px;}
.hs-form label{display:block;margin:0 0 6px;font-size:16px;font-weight:700;color:#333;}
.hs-form .hs-input,.hs-form textarea{
  width:100%;
  font-size:14px;
  border:1px solid #BED7F4;
  border-radius:8px;
  padding:12px 14px;
  background:#fff;
  box-shadow:0 1px 0 rgba(15,23,42,.02);
}
.hs-form textarea{min-height:140px;resize:vertical;}
.hs-form .hs-input:focus,.hs-form textarea:focus{
  outline:none;border-color:#418EE8;box-shadow:0 0 0 3px #DBEAFE;
}
::placeholder{color:#888;}

/* チェックボックス */
.hs-form .inputs-list{list-style:none;padding:0;margin:0;}
.hs-form input[type="checkbox"]{
  appearance:none;width:18px;height:18px;border:1.5px solid #418EE8;border-radius:4px;background:#fff;vertical-align:-3px;margin-right:8px;
}
.hs-form input[type="checkbox"]:checked{background:#418EE8;width:18px !important;}
.hs-form input[type="checkbox"]:checked::after{
  content:"";position:relative;left:-5px;top:-12px;width:8px;height:17px;border:4px solid #fff;border-top:0;border-left:0;transform:rotate(45deg);display:inline-block;
}

/* エラー */
.hs-error-msgs,.hs-error-msg{color:#b91c1c !important;font-size:12px;margin-top:6px;}
.hs-error-msgs label{color:#b91c1c !important;}

/* 送信ボタン（重複を統合） */
.hs-submit .actions{
  text-align:center;
  max-width:fit-content;
  margin:40px auto 0;
}
.hs-button{
  display:inline-flex;align-items:center;justify-content:center;gap:10px;
  padding:28px 28px;width:335px;height:80px;
  border-radius:9999px;background:var(--btn-bg) !important;color:var(--btn-color) !important;
  font-weight:700;font-size:20px !important;font-family:var(--font-family) !important;
  border:none;cursor:pointer;transition:all .3s ease-out;
}
.hs-button::after{
  content:"";width:22px;height:22px;border-radius:9999px;background:rgba(255,255,255,.25);
}
.hs-button:hover{background:#37A9E6 !important;}
.hs-button:active{transform:translateY(1px);}

/* 2カラム（必要時） */
@media (min-width:768px){
  fieldset.form-columns-2 .hs-form-field{width:calc(50% - 12px);float:left;}
  fieldset.form-columns-2 .hs-form-field:nth-child(odd){margin-right:24px;}
}

/* 「＊」→「必須」 */
.hs-form-required{visibility:hidden;position:relative;}
.hs-form-required::after{
  content:"必須";visibility:visible;position:absolute;top:50%;left:0;transform:translateY(-50%);
  color:#fff;font-size:11px !important;font-weight: 400;padding:4px 6px;background-color:#CD3E3E;border-radius:3px;line-height:1;width:26px;height:12px;writing-mode: horizontal-tb;margin-left:8px;
}

/* reCAPTCHA */
.hs_recaptcha{margin-top:20px;}
    `;
                        var style = iframeDoc.createElement('style');
                        style.type = 'text/css';
                        style.appendChild(iframeDoc.createTextNode(css));
                        iframeDoc.head.appendChild(style);

                        // ボタン文言の上書き（存在すれば）
                        var btn = iframeDoc.querySelector('input[type="submit"].hs-button');
                        if (btn) btn.value = '送信する';
                    }

                    function tryInject() {
                        // HubSpotが生成するiframeを取得してDOCに注入
                        var iframe = document.querySelector('iframe.hs-form-iframe');
                        if (iframe && iframe.contentWindow && iframe.contentWindow.document) {
                            injectStylesInto(iframe.contentWindow.document);
                        }
                    }

                    // HubSpot フォーム生成
                    function createHSForm() {
                        if (!window.hbspt || !window.hbspt.forms) return;
                        window.hbspt.forms.create({
                            region: "na2",
                            portalId: "44170836",
                            formId: "f3c87071-4055-43a0-b038-dff7f6deee88",
                            target: "#hs-contact",
                            locale: "ja",
                            // HubSpot既定CSSを切りたい場合は解放（!importantが減らせます）
                            // cssRequired: "",
                            onFormReady: function($form) {
                                // jQueryが渡っても渡らなくても動くよう分岐
                                var doc = null;
                                if ($form && $form[0] && $form[0].ownerDocument) {
                                    doc = $form[0].ownerDocument; // HubSpotのjQuery引数パターン
                                } else {
                                    var iframe = document.querySelector('iframe.hs-form-iframe'); // 直参照パターン
                                    if (iframe && iframe.contentWindow) doc = iframe.contentWindow.document;
                                }
                                injectStylesInto(doc);

                                // 念のため、非同期でロードが続くケースに備えて監視（1回だけ）
                                var iframe = document.querySelector('iframe.hs-form-iframe');
                                if (iframe) {
                                    var mo = new MutationObserver(function(muts, obs) {
                                        tryInject();
                                        obs.disconnect();
                                    });
                                    mo.observe(iframe, {
                                        attributes: true,
                                        childList: true,
                                        subtree: true
                                    });
                                    // 追加の保険：タイマ
                                    setTimeout(tryInject, 500);
                                    setTimeout(tryInject, 1500);
                                }
                            }
                            // 送信後にThanksへ（HubSpot側でサンクスメッセージにするなら削除）
                            // ,onFormSubmitted: function() {
                            //     window.location.href = "<?php echo esc_url( home_url('/contact/contact-thanks/') ); ?>";
                            // }
                        });
                    }

                    // フォームスクリプトロード後に生成
                    if (document.readyState === 'complete') {
                        createHSForm();
                    } else {
                        window.addEventListener('load', createHSForm);
                    }
                })();
                </script>

            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>