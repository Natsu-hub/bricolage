export function scroll() {
    const headerHeight = document.querySelector('header').offsetHeight + 20;  // 固定ヘッダーの高さ（＋余白の追加）
    let lazyLoaded = false;  // Lazy load の処理が一度だけ行われるようにフラグを追加

    function scrollToPos(position) {
        const startPos = window.scrollY;
        const distance = Math.min(position - startPos, document.documentElement.scrollHeight - window.innerHeight - startPos);
        const duration = 800;  // スクロールにかかる時間（ミリ秒）

        let startTime;
        function easeOutExpo(t, b, c, d) {
            return c * (-Math.pow(2, -10 * t / d) + 1) * 1024 / 1023 + b;
        }

        function animation(currentTime) {
            if (!startTime) {
                startTime = currentTime;
            }
            const timeElapsed = currentTime - startTime;
            const scrollPos = easeOutExpo(timeElapsed, startPos, distance, duration);
            window.scrollTo(0, scrollPos);
            if (timeElapsed < duration) {
                requestAnimationFrame(animation);
            } else {
                window.scrollTo(0, position);
            }
        }

        requestAnimationFrame(animation);
    }

    function removeLazyLoad() {
        if (lazyLoaded) return;  // 既に遅延読み込みが解除されている場合は処理をスキップ

        const targets = document.querySelectorAll('[data-src]');
        targets.forEach(target => {
            target.setAttribute('src', target.getAttribute('data-src'));
            target.addEventListener('load', () => {
                target.removeAttribute('data-src');
            });
        });

        lazyLoaded = true;  // フラグを更新して再度実行されないようにする
    }

    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('a[href*="#"]').forEach(link => {
            link.addEventListener('click', (e) => {
                const hash = e.currentTarget.hash;
                const target = hash ? document.getElementById(hash.slice(1)) : null;
                
                if (target || hash === '#top') {
                    e.preventDefault();
                    removeLazyLoad();
                    const position = target 
                        ? target.getBoundingClientRect().top + window.scrollY - headerHeight 
                        : 1;
                    scrollToPos(position);
                    if (hash) history.pushState(null, null, hash);
                }
            });
        });
    });

    window.addEventListener("load", () => {
        const hash = window.location.hash;
        if (hash) {
            const target = document.getElementById(hash.slice(1));
            if (target) {
                removeLazyLoad();
                setTimeout(() => {  // 少し遅延を設けることで不具合を解消
                    const position = target.getBoundingClientRect().top + window.scrollY - headerHeight;
                    scrollToPos(position);
                }, 100);
            }
        }
    });
}
