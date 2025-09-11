export function header() {
    document.addEventListener('DOMContentLoaded', () => {
      gsap.config({ nullTargetWarn: false });
  
      const hamburger = document.querySelector('.js-hamburger');
      const drawer = document.querySelector('.js-drawer');
      const drawerOverlay = document.querySelector('.js-drawer-overlay');
      const header = document.querySelector('.js-header');
  
      const openDrawer = () => {
        drawer.classList.add('is-open');
        document.body.classList.add('body-no-scroll');
        hamburger.classList.add('is-open');
      };
  
      const closeDrawer = () => {
        drawer.classList.remove('is-open');
        document.body.classList.remove('body-no-scroll');
        hamburger.classList.remove('is-open');
      };
  
      hamburger.addEventListener('click', () => {
        if (drawer.classList.contains('is-open')) {
          closeDrawer();
        } else {
          openDrawer();
        }
      });
  
      document.querySelectorAll('.p-header__nav-item a, .js-drawer a[href]').forEach(link => {
        link.addEventListener('click', () => {
          closeDrawer();
        });
      });
  
      drawerOverlay.addEventListener('click', () => {
        closeDrawer();
      });
  
      window.addEventListener('resize', () => {
        if (window.matchMedia('(min-width: 768px)').matches) {
          closeDrawer();
        }
        // リサイズ時はメガメニューも閉じる
        closeAllMegas();
      });
  
      /* ---------------------------
       * Mega menu (SP/Tablet: tap toggle)
       * --------------------------- */
      const megaItems = Array.from(document.querySelectorAll('.p-header__nav-item--hasMega'));
  
      function closeAllMegas() {
        megaItems.forEach(item => {
          item.classList.remove('is-open');
          const t = item.querySelector('.p-header__nav-link');
          if (t) t.setAttribute('aria-expanded', 'false');
        });
      }
  
      megaItems.forEach(item => {
        const trigger = item.querySelector('.p-header__nav-link'); // <span class="p-header__nav-link"> を想定（aではない）
        const panel = item.querySelector('.p-header__subItems');
        if (!trigger || !panel) return;
  
        // アクセシビリティ属性
        trigger.setAttribute('role', 'button');
        trigger.setAttribute('tabindex', '0');
        trigger.setAttribute('aria-expanded', 'false');
  
        const open = (v) => {
          item.classList.toggle('is-open', v);
          trigger.setAttribute('aria-expanded', String(v));
        };
  
        const toggleOnTap = (e) => {
          // hoverがない環境（タッチ前提）だけJSで開閉
          if (window.matchMedia('(hover: none)').matches) {
            e.preventDefault();
            open(!item.classList.contains('is-open'));
          }
        };
  
        // タップ/クリック/Enter/Spaceで開閉（SP/Tablet想定）
        trigger.addEventListener('click', toggleOnTap);
        trigger.addEventListener('keydown', (e) => {
          if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); toggleOnTap(e); }
          if (e.key === 'Escape') { open(false); trigger.blur(); }
        });
      });
  
      // 外側をクリックしたら閉じる（SP/Tablet時）
      document.addEventListener('click', (e) => {
        if (!window.matchMedia('(hover: none)').matches) return; // PCはCSSで処理
        const inside = megaItems.some(item => item.contains(e.target));
        if (!inside) closeAllMegas();
      });
  
      // ドロワーを開くときは念のため閉じる
      hamburger?.addEventListener('click', () => { closeAllMegas(); });

       /* ====== メガメニュー ====== */
    const menuItems = Array.from(document.querySelectorAll('.p-header__item--mega-menu'));

    function closeAllSubmenus() {
      menuItems.forEach(item => {
        const wrap = item.querySelector('.p-p-header__sublist-wrap');
        const trigger = item.querySelector(':scope > a, :scope > span, :scope > button');
        if (!wrap) return;
        gsap.killTweensOf(wrap);
        gsap.set(wrap, { clearProps: 'all', display: 'none', opacity: 0, y: 4, pointerEvents: 'none' });
        trigger?.setAttribute('aria-expanded', 'false');
      });
    }

    menuItems.forEach(item => {
      const wrap = item.querySelector('.p-p-header__sublist-wrap');
      const trigger = item.querySelector(':scope > a, :scope > span, :scope > button');
      if (!wrap || !trigger) return;

      // A11y
      trigger.setAttribute('role', trigger.tagName === 'A' ? 'link' : 'button');
      trigger.setAttribute('tabindex', trigger.getAttribute('tabindex') ?? '0');
      trigger.setAttribute('aria-expanded', 'false');

      let open = false;

      const show = () => {
        if (open) return;
        open = true;
        gsap.killTweensOf(wrap);
        wrap.style.display = 'block';
        gsap.fromTo(wrap,
          { opacity: 0, y: 4, pointerEvents: 'none' },
          { opacity: 1, y: 0, duration: 0.18, ease: 'power2.out',
            onStart: () => { wrap.style.pointerEvents = 'auto'; },
          }
        );
        trigger.setAttribute('aria-expanded', 'true');
      };

      const hide = () => {
        if (!open) return;
        open = false;
        gsap.killTweensOf(wrap);
        gsap.to(wrap, {
          opacity: 0, y: 4, duration: 0.18, ease: 'power2.out',
          onComplete: () => {
            wrap.style.display = 'none';
            wrap.style.pointerEvents = 'none';
          }
        });
        trigger.setAttribute('aria-expanded', 'false');
      };

      // PC: hoverで開閉（.p-p-header__sublist-wrapのpadding-topで橋渡し済み）
      item.addEventListener('mouseenter', () => {
        if (!window.matchMedia('(hover: none)').matches) show();
      });
      item.addEventListener('mouseleave', () => {
        if (!window.matchMedia('(hover: none)').matches) hide();
      });

      // SP/タブレット: タップでトグル（hoverなし環境）
      const onTapToggle = (e) => {
        if (window.matchMedia('(hover: none)').matches) {
          e.preventDefault();
          open ? hide() : show();
        }
      };
      trigger.addEventListener('click', onTapToggle);
      trigger.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); onTapToggle(e); }
        if (e.key === 'Escape') { hide(); trigger.blur(); }
      });

      // 外側クリックで閉じる（SP/タブ）
      document.addEventListener('click', (e) => {
        if (!window.matchMedia('(hover: none)').matches) return;
        if (!item.contains(e.target)) hide();
      });
    });

    // 初期は全部閉じておく
    closeAllSubmenus();
    
    });
  }
  