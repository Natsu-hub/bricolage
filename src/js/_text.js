import { gsap } from "gsap";
import { ScrollToPlugin } from "gsap/ScrollToPlugin";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollToPlugin, ScrollTrigger);

export function text() {
  window.addEventListener('DOMContentLoaded', () => {
    gsap.config({ nullTargetWarn: false });

    const splitTargets = document.querySelectorAll('.js-splitText');

    splitTargets.forEach((target) => {
      let html = target.innerHTML;
    
      // <br> だけを区切りにする（空白 \s を外す）
      const SPLIT_RE = /(<br[^>]*>)/gi;
      const BR_RE = /^<br[^>]*>$/i;
    
      const parts = html.split(SPLIT_RE);
      let out = "";
      let atLineStart = true;
    
      parts.forEach((part) => {
        if (!part) return;
    
        if (BR_RE.test(part)) {
          out += part;
          atLineStart = true;                 // 改行直後＝行頭フラグ
        } else {
          // インデントや改行を1つのスペースに正規化、前後の空白は除去
          const text = part.replace(/\s+/g, ' ').trim();
    
          for (const ch of Array.from(text)) {
            if (ch === ' ') {
              // 行頭のスペースは無視（インデント対策）
              if (!atLineStart) {
                out += `<span class="char char--space" aria-hidden="true"> </span>`;
              }
            } else {
              out += `<span class="char" aria-hidden="true">${ch}</span>`;
              atLineStart = false;
            }
          }
        }
      });
    
      target.setAttribute('aria-label', target.textContent.trim());
      target.innerHTML = out;
    });
    

    const textEffects = document.querySelectorAll('.js-text-effect');
    textEffects.forEach((target) => {
      const spans = target.querySelectorAll('.char');

      gsap.fromTo(
        spans,
        { autoAlpha: 0, y: '0.4em' },
        {
          autoAlpha: 1,
          y: 0,
          duration: 0.8,
          ease: 'power2.out',
          stagger: { each: 0.04 },
          scrollTrigger: {
            trigger: target,
            start: 'top 85%',
            once: true,            // 1回だけ再生したいなら
            // markers: true,
          },
        }
      );
    });
  });
}
