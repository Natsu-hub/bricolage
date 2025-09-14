// mv.js
import { gsap } from "gsap";

export function mv() {
   // ▼トップページの判定は .p-top-mv があるかどうかで
   const isTop = !!document.querySelector(".p-top-mv");
   if (!isTop) return;
 

  // 初期状態
  gsap.set(['.p-top-mv__title'], { autoAlpha: 0 });
  gsap.set(['.p-top-mv__en-text', '.p-top-mv__sub-text'], { autoAlpha: 0, y: 0 });
  gsap.set('.p-top-mv__img', { autoAlpha: 0, x: 10 });
  gsap.set('.p-top-mv__illustration', { autoAlpha: 0, x: 10 });

  // ヘッダーはトップだけアニメ対象に（非トップでは触らない）
  gsap.set('.p-header__nav-items--top',    { autoAlpha: 0, y: -20, x: 0 });
  gsap.set('.p-header__nav-contact--top',  { autoAlpha: 0, y: -20, x: 0 });
  // gsap.set('.p-header__hamburger',         { autoAlpha: 0, y: -20, x: 0 });

  const tl = gsap.timeline({ defaults: { ease: 'power2.out' } });

  tl.to('.p-top-mv__title', { autoAlpha: 1 })
  .to('.p-top-mv__en-text',  { autoAlpha: 1, duration: 0.8, y: 0 }, '+=0.8')
  .to('.p-top-mv__sub-text', { autoAlpha: 1, duration: 0.8, y: 0 }, '<')

  // 画像は en-text/sub-text の「開始」から 0.2s 後にスタート
  .to('.p-top-mv__img', { autoAlpha: 1, x: 0, duration: 0.7 }, '<+=0.4')

  // ヘッダーも画像にピッタリ同期
  .to('.p-header__nav-items--top',   { autoAlpha: 1, y: 0, duration: 0.7 }, '<')
  .to('.p-header__nav-contact--top', { autoAlpha: 1, y: 0, duration: 0.7 }, '<')

  // イラストは画像より 0.1s 遅らせ（好みで調整）
  .to('.p-top-mv__illustration', { autoAlpha: 1, x: 0, duration: 0.7 }, '<+=0.1');

}

document.addEventListener('DOMContentLoaded', mv);
