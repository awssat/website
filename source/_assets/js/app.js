window.axios = require("axios");
const hljs = require("highlight.js/lib/core");
import Alpine from "alpinejs";
import intersect from '@alpinejs/intersect';

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

// Alpine v3 initialization with plugins
Alpine.plugin(intersect);

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

hljs.registerLanguage("php", require("highlight.js/lib/languages/php"));
hljs.registerLanguage("javascript", require("highlight.js/lib/languages/javascript"));
hljs.registerLanguage("bash", require("highlight.js/lib/languages/bash"));
hljs.registerLanguage("diff", require("highlight.js/lib/languages/bash"));

document.addEventListener("DOMContentLoaded", (event) => {
    darkMode(darkMode());

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

window.darkMode = (toggle) => {
    if (typeof toggle === "undefined") {
        if (localStorage.getItem("dark-theme") !== null) {
            return true;
        }
        return window.matchMedia && window.matchMedia("(prefers-color-scheme: dark)").matches;
    }
    if (toggle) {
        localStorage.setItem("dark-theme", true);
    } else {
        localStorage.removeItem("dark-theme");
    }
    darkModeToggle(toggle);
    return toggle;
};

var darkModeToggle = (toggle) => {
    if (toggle) {
        document.body.classList.add("dark-mode");
    } else {
        document.body.classList.remove("dark-mode");
    }
};

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
  const observerOptions = {
    threshold: 0.15,
    rootMargin: '0px 0px -100px 0px'
  };

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('is-visible');
      }
    });
  }, observerOptions);

  // Observe all elements with .animate-on-scroll class
  document.querySelectorAll('.animate-on-scroll').forEach(el => {
    observer.observe(el);
  });
});
