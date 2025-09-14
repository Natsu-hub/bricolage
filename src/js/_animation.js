import { gsap } from "gsap";
import { ScrollToPlugin } from "gsap/ScrollToPlugin";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollToPlugin, ScrollTrigger);

export function animation() {
  window.addEventListener('DOMContentLoaded', () => {
    gsap.config({ nullTargetWarn: false });

    // フェードインアニメーション
    const fadeInElements = document.querySelectorAll(".js-fade-in");
    fadeInElements.forEach((element) => {
      gsap.fromTo(
        element,
        {
          autoAlpha: 0,
          y: 20,
        },
        {
          autoAlpha: 1,
          y: 0,
          duration: 1.2,
          ease: "power4.out",
          scrollTrigger: {
            trigger: element,
            start: "top 80%",
            toggleActions: 'play none none reverse',
            // markers: true,
          },
        }
      );
    });

        // フェードインアニメーションセクション
        const fadeInSectionElements = document.querySelectorAll(".js-fade-in-section");
        fadeInSectionElements.forEach((element) => {
          gsap.fromTo(
            element,
            {
              autoAlpha: 0,
              y: 20,
            },
            {
              autoAlpha: 1,
              y: 0,
              duration: 1.2,
              ease: "power4.out",
              scrollTrigger: {
                trigger: element,
                start: "top 70%",
                toggleActions: 'play none none reverse',
                // markers: true,
              },
            }
          );
        });

    // フェードインアニメーション02
    const fadeIn02Elements = document.querySelectorAll(".js-fadeIn");
    fadeIn02Elements.forEach((element) => {
      gsap.fromTo(
        element,
        {
          autoAlpha: 0,
        },
        {
          autoAlpha: 1,
          duration: 1,
          scrollTrigger: {
            trigger: element,
            start: "top 100%",
            toggleActions: 'play none none reverse',
          },
        }
      );
    });

    const fadeInLeftElements = document.querySelectorAll(".js-fade-in-left");
    fadeInLeftElements.forEach((element) => {
      gsap.fromTo(
        element,
        {
          opacity: 0,
          x: -30,
        },
        {
          delay:.7,
          opacity: 1,
          x: 0,
          duration: 1,
          ease: "power1.out",
          scrollTrigger: {
            trigger: element, // トリガーとなる要素を指定
            start: "top 80%", // スクロール開始位置を指定
            toggleActions: 'play none none reverse',
            //markers: true,
          },
        }
      );
    });
  
    const fadeInRightElements = document.querySelectorAll(".js-fade-in-right");
    fadeInRightElements.forEach((element) => {
      gsap.fromTo(
        element,
        {
          opacity: 0,
          x: 30,
        },
        {
          opacity: 1,
          x: 0,
          duration: 1,
          ease: "power1.out",
          scrollTrigger: {
            trigger: element, // トリガーとなる要素を指定
            start: "top 70%", // スクロール開始位置を指定
            toggleActions: 'play none none reverse',
            // markers: true,
          },
        }
      );
    });

    // iconアニメーション（ホバーエフェクト）
    document.querySelectorAll('.js-hover-icon').forEach(link => {
      const img = link.querySelector('img');
      const originalSrc = img.src;
      const hoverSrc = img.getAttribute('data-hover');

      // Preload hover image
      const hoverImage = new Image();
      hoverImage.src = hoverSrc;

      link.addEventListener('mouseover', () => {
        img.src = hoverSrc;
      });

      link.addEventListener('mouseout', () => {
        img.src = originalSrc;
      });
    });

  });
}
