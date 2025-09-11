import { gsap } from "gsap";
import { ScrollToPlugin } from "gsap/ScrollToPlugin";
import { ScrollTrigger } from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollToPlugin, ScrollTrigger);

export function common() {
    window.addEventListener('DOMContentLoaded', () => {
        gsap.config({ nullTargetWarn: false });

        // フッター TOPスクロールボタン
        let scrollTimeout;

        window.addEventListener("scroll", () => {
            if (!scrollTimeout) {
                scrollTimeout = requestAnimationFrame(() => {
                    const scrollTopButton = document.getElementById("js-scrollTop");
                    const isScrollingDown = window.scrollY > 400;

                    if ((isScrollingDown && gsap.getProperty(scrollTopButton, "opacity") === 0) ||
                        (!isScrollingDown && gsap.getProperty(scrollTopButton, "opacity") === 1)) {
                        gsap.to(scrollTopButton, {
                            duration: .5,
                            autoAlpha: isScrollingDown ? 1 : 0,
                            ease: isScrollingDown ? "power3.out" : "power3.in",
                        });
                    }

                    scrollTimeout = null;
                });
            }
        });

        document.getElementById("js-scrollTop").addEventListener("click", () => {
            gsap.to(window, {
                duration: 1,
                scrollTo: {
                    y: 0,
                    autoKill: false,
                },
            });
        });

        // 電話PC時は無効
        const ua = navigator.userAgent.toLowerCase();
        const isMobile = /iphone/.test(ua) || /android(.+)?mobile/.test(ua);

        if (!isMobile) {
            document.querySelectorAll('a[href^="tel:"]').forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                });
                link.classList.add('disabled-link');
                  // cursor: default を追加
        link.style.cursor = 'default';
            });
        }
    });
}
