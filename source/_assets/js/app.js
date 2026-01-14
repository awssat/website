import axios from "axios";
import hljs from "highlight.js/lib/core";
import php from "highlight.js/lib/languages/php";
import javascript from "highlight.js/lib/languages/javascript";
import bash from "highlight.js/lib/languages/bash";
import Alpine from "alpinejs";
import intersect from '@alpinejs/intersect';
import persist from '@alpinejs/persist';

window.axios = axios;
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

// Alpine v3 initialization with plugins
Alpine.plugin(intersect);
Alpine.plugin(persist);

// Performance: Throttle helper using requestAnimationFrame
const throttleRAF = (callback) => {
  let ticking = false;
  return function(...args) {
    if (!ticking) {
      window.requestAnimationFrame(() => {
        callback.apply(this, args);
        ticking = false;
      });
      ticking = true;
    }
  };
};

// Check for prefers-reduced-motion
const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

// Alpine data components for animations
Alpine.data('magneticButton', () => ({
  x: 0,
  y: 0,
  init() {
    // Disable animation if user prefers reduced motion
    if (prefersReducedMotion) return;

    this.throttledMove = throttleRAF((e) => {
      const rect = this.$el.getBoundingClientRect();
      const centerX = rect.left + rect.width / 2;
      const centerY = rect.top + rect.height / 2;
      this.x = (e.clientX - centerX) / 5;
      this.y = (e.clientY - centerY) / 5;
      this.$el.style.transform = `translate(${this.x}px, ${this.y}px)`;
    });
  },
  handleMouseMove(e) {
    if (prefersReducedMotion || !this.throttledMove) return;
    this.throttledMove(e);
  },
  handleMouseLeave() {
    if (prefersReducedMotion) return;
    this.x = 0;
    this.y = 0;
    this.$el.style.transform = 'translate(0, 0)';
  }
}));

Alpine.data('tiltCard', () => ({
  init() {
    // Disable animation if user prefers reduced motion
    if (prefersReducedMotion) return;

    this.throttledMove = throttleRAF((e) => {
      const rect = this.$el.getBoundingClientRect();
      const x = e.clientX - rect.left;
      const y = e.clientY - rect.top;
      const centerX = rect.width / 2;
      const centerY = rect.height / 2;
      const rotateX = (y - centerY) / 15;
      const rotateY = (centerX - x) / 15;

      this.$el.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateZ(10px)`;
    });
  },
  handleMouseMove(e) {
    if (prefersReducedMotion || !this.throttledMove) return;
    this.throttledMove(e);
  },
  handleMouseLeave() {
    if (prefersReducedMotion) return;
    this.$el.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) translateZ(0)';
  }
}));

window.Alpine = Alpine;

// Sync theme-color meta tag with dark mode state
Alpine.effect(() => {
  const darkMode = Alpine.store('darkMode') || document.documentElement.classList.contains('dark');
  const themeColor = darkMode ? '#1f2937' : '#8b5cf6';
  const metaThemeColor = document.querySelector('meta[name="theme-color"]:not([media])');
  if (metaThemeColor) {
    metaThemeColor.setAttribute('content', themeColor);
  } else {
    // Create meta tag if it doesn't exist
    const meta = document.createElement('meta');
    meta.name = 'theme-color';
    meta.content = themeColor;
    document.head.appendChild(meta);
  }
});

// Listen for dark mode changes via MutationObserver
const observer = new MutationObserver((mutations) => {
  mutations.forEach((mutation) => {
    if (mutation.attributeName === 'class') {
      const isDark = document.documentElement.classList.contains('dark');
      const themeColor = isDark ? '#1f2937' : '#8b5cf6';
      const metaThemeColor = document.querySelector('meta[name="theme-color"]:not([media])');
      if (metaThemeColor) {
        metaThemeColor.setAttribute('content', themeColor);
      }
    }
  });
});

observer.observe(document.documentElement, {
  attributes: true,
  attributeFilter: ['class']
});

Alpine.start();

// Language auto-redirect and persistence
document.addEventListener('DOMContentLoaded', () => {
  const currentPath = window.location.pathname;
  const isRootPage = currentPath === '/' || currentPath === '';
  const isArPage = currentPath.startsWith('/ar');

  // Check if user has manually set a language preference
  const savedLanguage = localStorage.getItem('language-preference');

  // Only auto-redirect on root page if no preference is saved
  if (isRootPage && !savedLanguage) {
    const browserLang = navigator.language || navigator.userLanguage;

    // If browser language is Arabic, redirect to /ar
    if (browserLang.startsWith('ar')) {
      window.location.href = '/ar';
      return;
    }
  }

  // Save current language based on page
  if (!savedLanguage) {
    const currentLang = isArPage ? 'ar' : 'en';
    localStorage.setItem('language-preference', currentLang);
  }

  // Listen for language switcher clicks to save preference
  document.addEventListener('click', (e) => {
    const langLink = e.target.closest('a[hreflang]');
    if (langLink) {
      const targetLang = langLink.getAttribute('hreflang');
      localStorage.setItem('language-preference', targetLang);
    }
  });
});

// Fix mobile menu state persistence on navigation (especially on mobile browsers with bfcache)
window.addEventListener('pageshow', (event) => {
  // Reset mobile menu state when page is restored from bfcache or loaded
  if (Alpine && Alpine.store) {
    // Force close mobile menu on page show
    const header = document.querySelector('header[x-data]');
    if (header && Alpine.$data && Alpine.$data(header)) {
      Alpine.$data(header).mobileMenuOpen = false;
    }
  }

  // Force close menu on any page navigation
  document.querySelectorAll('[x-data]').forEach(el => {
    if (el._x_dataStack && el._x_dataStack[0] && el._x_dataStack[0].mobileMenuOpen !== undefined) {
      el._x_dataStack[0].mobileMenuOpen = false;
    }
  });
});

// Reset mobile menu state on page hide (before navigation)
window.addEventListener('pagehide', () => {
  // Force close menu before page unloads
  const menuButtons = document.querySelectorAll('[x-data]');
  menuButtons.forEach(el => {
    if (el.__x && el.__x.$data.mobileMenuOpen !== undefined) {
      el.__x.$data.mobileMenuOpen = false;
    }
  });
});

hljs.registerLanguage("php", php);
hljs.registerLanguage("javascript", javascript);
hljs.registerLanguage("bash", bash);
hljs.registerLanguage("diff", bash);

document.addEventListener("DOMContentLoaded", (event) => {
    document.querySelectorAll("pre code").forEach((block) => {
        hljs.highlightElement(block);

        if (block.classList.contains("language-diff")) {
            block.innerHTML = block.innerHTML
                .split("\n")
                .map((line) => {
                    if (line[0] === "+") {
                        return '<span class="diff-addition"> ' + line.substring(1) + "</span>";
                    } else if (line[0] === "-") {
                        return '<span class="diff-subtraction"> ' + line.substring(1) + "</span>";
                    }
                    return line;
                })
                .join("\n");
        }

        // Add copy-to-clipboard button
        const pre = block.parentElement;
        if (pre && pre.tagName === 'PRE') {
            const copyButton = document.createElement('button');
            copyButton.className = 'absolute top-2 right-2 px-3 py-1.5 text-xs font-medium text-gray-300 bg-gray-700 hover:bg-gray-600 rounded-md transition-all duration-200 flex items-center gap-1.5 opacity-0 group-hover:opacity-100 focus:opacity-100 z-20';
            copyButton.innerHTML = `
                <svg class="w-4 h-4 copy-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                </svg>
                <span class="copy-text">Copy</span>
                <svg class="w-4 h-4 check-icon hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            `;

            copyButton.addEventListener('click', async () => {
                try {
                    await navigator.clipboard.writeText(block.textContent);
                    const copyIcon = copyButton.querySelector('.copy-icon');
                    const checkIcon = copyButton.querySelector('.check-icon');
                    const copyText = copyButton.querySelector('.copy-text');

                    copyIcon.classList.add('hidden');
                    checkIcon.classList.remove('hidden');
                    copyText.textContent = 'Copied!';
                    copyButton.classList.add('bg-green-600', 'hover:bg-green-500');

                    setTimeout(() => {
                        copyIcon.classList.remove('hidden');
                        checkIcon.classList.add('hidden');
                        copyText.textContent = 'Copy';
                        copyButton.classList.remove('bg-green-600', 'hover:bg-green-500');
                    }, 2000);
                } catch (err) {
                    console.error('Failed to copy:', err);
                }
            });

            pre.style.position = 'relative';
            pre.classList.add('group');
            pre.appendChild(copyButton);
        }

        //add line numbers
        var lh = parseInt(window.getComputedStyle(block, null).getPropertyValue("line-height")) || 39.1;
        var ln = Math.floor(block.offsetHeight / lh);
        if (ln < 5) {
            return;
        }
        var node = document.createElement("ul");
        node.classList.add("absolute", "top-0", "left-0", "h-full", "w-10", "z-10", "px-1", "border-r", "text-gray-500", "text-sm", "overflow-hidden");
        node.style.lineHeight = lh + "px";
        node.style.borderColor = "#3e4154";
        node.style.backgroundColor = "#282a36";
        node.style.color = "#484b61";
        for (let index = 0; index < ln; index++) {
            var li = document.createElement("li");
            li.innerText = index + 1;
            li.classList.add("flex", "items-center", "justify-center", "h-9", "w-full");
            node.appendChild(li);
        }
        block.parentElement.appendChild(node);
        block.parentElement.classList.add("relative");
        block.classList.add("hljs");
    });
});

// Parallax scroll effect
let ticking = false;
window.addEventListener('scroll', () => {
  if (!ticking) {
    window.requestAnimationFrame(() => {
      document.documentElement.style.setProperty('--scroll', window.pageYOffset);
      ticking = false;
    });
    ticking = true;
  }
});

// Add IDs to headings for TOC functionality and active section highlighting
document.addEventListener('DOMContentLoaded', () => {
  // Find all h2, h3, h4 headings in blog posts
  const articleBody = document.getElementById('article-body');
  if (!articleBody) return;

  const headings = articleBody.querySelectorAll('h2, h3, h4');
  headings.forEach((heading) => {
    // Only add ID if it doesn't already have one
    if (!heading.id) {
      // Generate slug from text content
      const text = heading.textContent.trim();
      const slug = text
        .toLowerCase()
        .replace(/[^a-z0-9\s-]/g, '')
        .replace(/\s+/g, '-')
        .replace(/-+/g, '-')
        .replace(/^-|-$/g, '');
      heading.id = slug;
    }
  });

  // Active section highlighting in TOC
  const tocLinks = document.querySelectorAll('nav a[href^="#"]');
  if (tocLinks.length === 0) return;

  const observerOptions = {
    rootMargin: '-20% 0px -35% 0px',
    threshold: [0, 0.25, 0.5, 0.75, 1]
  };

  const activeSection = new Map();

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      activeSection.set(entry.target, entry.isIntersecting);
    });

    // Find the first visible heading
    let activeId = null;
    for (const [target, isIntersecting] of activeSection.entries()) {
      if (isIntersecting) {
        activeId = target.id;
        break;
      }
    }

    // Update active state in TOC
    tocLinks.forEach(link => {
      const href = link.getAttribute('href').substring(1);
      if (href === activeId) {
        link.classList.add('!text-primary-600', 'dark:!text-primary-400', 'font-semibold');
      } else {
        link.classList.remove('!text-primary-600', 'dark:!text-primary-400', 'font-semibold');
      }
    });
  }, observerOptions);

  headings.forEach(heading => observer.observe(heading));

  // Smooth scroll for TOC links
  tocLinks.forEach(link => {
    link.addEventListener('click', (e) => {
      e.preventDefault();
      const targetId = link.getAttribute('href').substring(1);
      const targetElement = document.getElementById(targetId);
      if (targetElement) {
        const offset = 80; // Account for fixed header
        const elementPosition = targetElement.getBoundingClientRect().top;
        const offsetPosition = elementPosition + window.pageYOffset - offset;

        window.scrollTo({
          top: offsetPosition,
          behavior: 'smooth'
        });
      }
    });
  });
});

// Intersection Observer for scroll animations
document.addEventListener('DOMContentLoaded', () => {
  // Mobile-friendly observer settings
  const isMobile = window.innerWidth < 768;
  const observerOptions = {
    threshold: isMobile ? 0.05 : 0.15, // Lower threshold for mobile
    rootMargin: isMobile ? '0px 0px -50px 0px' : '0px 0px -100px 0px' // Less margin on mobile
  };

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('is-visible');
        // Unobserve after animation triggers (performance optimization)
        observer.unobserve(entry.target);
      }
    });
  }, observerOptions);

  // Observe all elements with .animate-on-scroll class
  document.querySelectorAll('.animate-on-scroll').forEach(el => {
    observer.observe(el);

    // Check if element is already visible enough on page load
    const rect = el.getBoundingClientRect();
    const viewportHeight = window.innerHeight || document.documentElement.clientHeight;
    const elementHeight = rect.height;

    // Mobile-friendly bottom margin
    const bottomMargin = isMobile ? 50 : 100;

    // Calculate how much of the element is visible
    const visibleTop = Math.max(0, rect.top);
    const visibleBottom = Math.min(rect.bottom, viewportHeight - bottomMargin);
    const visibleHeight = Math.max(0, visibleBottom - visibleTop);
    const visibleRatio = elementHeight > 0 ? visibleHeight / elementHeight : 0;

    // Show if enough of element is visible (lower threshold for mobile)
    const requiredRatio = isMobile ? 0.05 : 0.15;
    if (visibleRatio >= requiredRatio) {
      el.classList.add('is-visible');
      observer.unobserve(el);
    }
  });
});
