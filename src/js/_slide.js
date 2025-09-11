import { Splide } from "@splidejs/splide";
import { AutoScroll } from "@splidejs/splide-extension-auto-scroll";

export function slide() {
    window.addEventListener('DOMContentLoaded', () => {
        const splideElements = document.getElementsByClassName('splide');

        for (let i = 0; i < splideElements.length; i++) {
            new Splide(splideElements[i]).mount();
        }

        const mvSlideElement = document.querySelector(".js-slide-mv");
        if (mvSlideElement) {
            const slideImgMv = new Splide(mvSlideElement, {
                focus: 0,
                pagination: false,
                arrows: false,
                autoplay: true,
                type: "fade",
                rewind: true,
                pauseOnHover: false,
                pauseOnFocus: false,
                interval: 4000,
                speed: 3000,
            });
            slideImgMv.mount();
        }

        const worksSlideElement = document.querySelector(".js-slide-works");

        function handleSplide() {
            if (!worksSlideElement) return;

            let splideInstance = worksSlideElement.splide;
            if (window.innerWidth >= 768) {
                if (!splideInstance) {
                    splideInstance = new Splide(worksSlideElement, {
                        type: "loop",
                        perPage: 4,
                        perMove: 1,
                        autoplay: true,
                        interval: 4000,
                        pauseOnHover: false,
                        pauseOnFocus: false,
                        focus: 0,
                        speed: 3500,
                        breakpoints: {
                            768: {
                                destroy: true,
                            },
                        },
                    }).mount();
                    worksSlideElement.splide = splideInstance;
                }
            } else {
                if (splideInstance) {
                    splideInstance.destroy();
                    worksSlideElement.splide = null;
                }
                const listElement = worksSlideElement.querySelector(".splide__list");
                if (listElement) {
                    listElement.style.display = "flex";
                    listElement.style.flexDirection = "column";
                }
            }
        }

        handleSplide();
        window.addEventListener("resize", handleSplide);
    });
}
