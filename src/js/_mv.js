// mv.js
import { gsap } from "gsap";

export function mv() {
  // 初期状態（サッと上がる用に少しだけ下げて透明）
  gsap.set(
    ['.p-top-mv__en-text', '.p-top-mv__title', '.p-top-mv__sub-text'],
    { autoAlpha: 0, y: '20' }
  );
  gsap.set('.p-top-mv__img',          { autoAlpha: 0, x: 20 });
  gsap.set('.p-top-mv__illustration',  { autoAlpha: 0, y: 20 });

  const tl = gsap.timeline({ defaults: { ease: 'power2.out' } });

  tl.to('.p-top-mv__en-text',       { autoAlpha: 1, y: 0, duration: 0.35 })
    .to('.p-top-mv__title',     { autoAlpha: 1, y: 0, duration: 0.5 }, '-=0.05')
    .to('.p-top-mv__sub-text',      { autoAlpha: 1, y: 0, duration: 0.35 }, '-=0.05')
    .to('.p-top-mv__img',           { autoAlpha: 1, x: 0, duration: 0.55 }, '-=0.10')
    .to('.p-top-mv__illustration',   { autoAlpha: 1, y: 0, duration: 0.45 }, '-=0.35');

  // さらに全体を速くしたいときは倍率を上げる
  // tl.timeScale(1.2);
}

document.addEventListener('DOMContentLoaded', mv);
