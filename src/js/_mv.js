// mv.js
import { gsap } from "gsap";

export function mv() {
  // 初期状態
  gsap.set(['.p-top-mv__title'], { autoAlpha: 0 });
  gsap.set(['.p-top-mv__en-text', '.p-top-mv__sub-text'], { autoAlpha: 0,y: 0 });
  gsap.set('.p-top-mv__img', { autoAlpha: 0, x: 15 });
  gsap.set('.p-top-mv__illustration', { autoAlpha: 0 });
  gsap.set('.p-header__nav-items--top', { autoAlpha: 0, y: -20, X:0 }); 
  gsap.set('.p-header__nav-contact--top', { autoAlpha: 0, y: -20, X:0 }); 

  const tl = gsap.timeline({ defaults: { ease: 'power2.out' } });

  // 1) 最初にタイトル
  tl.to('.p-top-mv__title', { autoAlpha: 1, duration: 0.8 })

    // 2) 次に en-text と sub-text を同時に
    .to('.p-top-mv__en-text',  { autoAlpha: 1, duration: 0.8, y:0 }, '+=0.3')
    .to('.p-top-mv__sub-text', { autoAlpha: 1, duration: 0.8, y:0 }, '<')

    // 3) 画像と同時にヘッダーも出す（同一ラベルで同期）
    .addLabel('mediaIn', '+=0.05')
    .to('.p-top-mv__img', { autoAlpha: 1, x: 0, duration: 0.8 }, 'mediaIn')
    .to('.p-header__nav-items--top', { autoAlpha: 1, y: 0, duration: 0.8 }, 'mediaIn')
    .to('.p-header__nav-contact--top', { autoAlpha: 1, y: 0, duration: 0.8 }, 'mediaIn')

    // 4) イラストは画像と同時（必要なら 'mediaIn+=0.1' などで少し遅らせ可）
    .to('.p-top-mv__illustration',{ autoAlpha: 1, duration: 0.8 }, 'mediaIn');

  // tl.timeScale(1.2); // 全体速度調整したいとき
}

document.addEventListener('DOMContentLoaded', mv);
