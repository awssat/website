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

// Alpine data components for animations
Alpine.data('magneticButton', () => ({
  x: 0,
  y: 0,
  handleMouseMove(e) {
    const rect = this.$el.getBoundingClientRect();
    const centerX = rect.left + rect.width / 2;
    const centerY = rect.top + rect.height / 2;
    this.x = (e.clientX - centerX) / 5;
    this.y = (e.clientY - centerY) / 5;
    this.$el.style.transform = `translate(${this.x}px, ${this.y}px)`;
  },
  handleMouseLeave() {
    this.x = 0;
    this.y = 0;
    this.$el.style.transform = 'translate(0, 0)';
  }
}));

Alpine.data('tiltCard', () => ({
  handleMouseMove(e) {
    const rect = this.$el.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;
    const centerX = rect.width / 2;
    const centerY = rect.height / 2;
    const rotateX = (y - centerY) / 15;
    const rotateY = (centerX - x) / 15;

    this.$el.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateZ(10px)`;
  },
  handleMouseLeave() {
    this.$el.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) translateZ(0)';
  }
}));

window.Alpine = Alpine;
Alpine.start();

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
