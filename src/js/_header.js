// header.js
import { gsap } from "gsap";

export function header() {
  document.addEventListener("DOMContentLoaded", () => {
    gsap.config({ nullTargetWarn: false });

    const hamburger     = document.querySelector(".js-hamburger");
    const drawer        = document.querySelector(".js-drawer");
    const drawerOverlay = document.querySelector(".js-drawer-overlay");

    /* ---------------------------
     * Drawer (hamburger)
     * --------------------------- */
    const openDrawer = () => {
      if (!drawer) return;
      drawer.classList.add("is-open");
      document.body.classList.add("body-no-scroll");
      hamburger?.classList.add("is-open");
    };

    const closeDrawer = () => {
      if (!drawer) return;
      drawer.classList.remove("is-open");
      document.body.classList.remove("body-no-scroll");
      hamburger?.classList.remove("is-open");
    };

    if (hamburger && drawer) {
      hamburger.addEventListener("click", () => {
        drawer.classList.contains("is-open") ? closeDrawer() : openDrawer();
      });
    }
    drawerOverlay && drawerOverlay.addEventListener("click", closeDrawer);

    // ヘッダーナビ（通常のグローバルナビ）を押したら閉じるだけ
    document.querySelectorAll(".p-header__nav-item a").forEach((link) => {
      link.addEventListener("click", closeDrawer);
    });

    // 768px以上にリサイズしたらドロワー/メガは閉じておく
    window.addEventListener("resize", () => {
      if (window.matchMedia("(min-width: 768px)").matches) {
        closeDrawer();
      }
      closeAllSubmenus();
    });

    /* ---------------------------
     * Drawer link: フェードアウトして遷移
     * --------------------------- */
    const drawerLinks = drawer
      ? drawer.querySelectorAll("a[href]")
      : [];

    drawerLinks.forEach((a) => {
      a.addEventListener("click", (e) => {
        const href = a.getAttribute("href") || "";

        // ctrl/⌘クリック・中クリック・外部・_blank・#・tel/mail・download は素通し
        if (
          (typeof e.button === "number" && e.button !== 0) ||
          e.metaKey || e.ctrlKey || e.shiftKey || e.altKey ||
          a.target === "_blank" ||
          /^mailto:|^tel:/i.test(href) ||
          a.hasAttribute("download") ||
          href.startsWith("#") ||
          (a.origin && a.origin !== location.origin)
        ) {
          closeDrawer(); // その場合は閉じるだけ
          return;
        }

        // 内部遷移：フェードアウトしてから飛ぶ
        e.preventDefault();
        document.body.classList.add("is-leaving");

        const go = () => { window.location.href = a.href; };
        const onEnd = () => {
          document.body.removeEventListener("transitionend", onEnd);
          go();
        };
        document.body.addEventListener("transitionend", onEnd, { once: true });
        setTimeout(go, 280); // 保険
      });
    });

    // BFCacheからの復帰でフェード状態が残らないように
    window.addEventListener("pageshow", (e) => {
      if (e.persisted) document.body.classList.remove("is-leaving");
    });

    /* ---------------------------
     * Mega menu（PC: hover / SP: tap）
     * ターゲットは .p-header__item--mega-menu のみ
     * --------------------------- */
    const menuItems = Array.from(
      document.querySelectorAll(".p-header__item--mega-menu")
    );

    function closeAllSubmenus() {
      menuItems.forEach((item) => {
        const wrap    = item.querySelector(".p-p-header__sublist-wrap");
        const trigger = item.querySelector(":scope > a, :scope > span, :scope > button");
        if (!wrap) return;
        gsap.killTweensOf(wrap);
        gsap.set(wrap, {
          clearProps: "all",
          display: "none",
          opacity: 0,
          y: 4,
          pointerEvents: "none",
        });
        trigger?.setAttribute("aria-expanded", "false");
        item.classList.remove("is-open");
      });
    }

    menuItems.forEach((item) => {
      const wrap    = item.querySelector(".p-p-header__sublist-wrap");
      const trigger = item.querySelector(":scope > a, :scope > span, :scope > button");
      if (!wrap || !trigger) return;

      // A11y
      trigger.setAttribute("role", trigger.tagName === "A" ? "link" : "button");
      if (!trigger.hasAttribute("tabindex")) trigger.setAttribute("tabindex", "0");
      trigger.setAttribute("aria-expanded", "false");

      let open = false;

      const show = () => {
        if (open) return;
        open = true;
        item.classList.add("is-open");
        gsap.killTweensOf(wrap);
        wrap.style.display = "block";
        gsap.fromTo(
          wrap,
          { opacity: 0, y: 4, pointerEvents: "none" },
          {
            opacity: 1,
            y: 0,
            duration: 0.18,
            ease: "power2.out",
            onStart: () => { wrap.style.pointerEvents = "auto"; },
          }
        );
        trigger.setAttribute("aria-expanded", "true");
      };

      const hide = () => {
        if (!open) return;
        open = false;
        item.classList.remove("is-open");
        gsap.killTweensOf(wrap);
        gsap.to(wrap, {
          opacity: 0,
          y: 4,
          duration: 0.18,
          ease: "power2.out",
          onComplete: () => {
            wrap.style.display = "none";
            wrap.style.pointerEvents = "none";
          },
        });
        trigger.setAttribute("aria-expanded", "false");
      };

      const canHover = window.matchMedia("(hover: hover)").matches &&
                       window.matchMedia("(pointer: fine)").matches;

      // PC: hoverで開閉
      if (canHover) {
        item.addEventListener("mouseenter", show);
        item.addEventListener("mouseleave", hide);
      }

      // SP/タブレット: タップトグル
      const onTapToggle = (e) => {
        if (!canHover) {
          e.preventDefault();
          open ? hide() : show();
        }
      };
      trigger.addEventListener("click", onTapToggle);
      trigger.addEventListener("keydown", (e) => {
        if (e.key === "Enter" || e.key === " ") { e.preventDefault(); onTapToggle(e); }
        if (e.key === "Escape") { hide(); trigger.blur(); }
      });

      // SP/タブ: 外側タップで閉じる
      document.addEventListener("click", (e) => {
        if (canHover) return; // PCはCSS/hoverで制御
        if (!item.contains(e.target)) hide();
      });
    });

    // 初期は全部閉じておく
    closeAllSubmenus();
  });
}
