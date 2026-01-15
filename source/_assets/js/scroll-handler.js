// Ultra-performant scroll handler - No Alpine, No RAF, No timers, No forEach
// Direct DOM manipulation with passive listeners

let lastScrollY = 0;
let ticking = false;

// Cache DOM elements
let header = null;
let scrollButton = null;
let scrollUpArrow = null;
let scrollDownArrow = null;
let progressBar = null;
let progressBarContainer = null;

// Initialize scroll handler
function initScrollHandler() {
  // Cache all DOM elements once
  header = document.querySelector('header[data-scroll-header]');
  scrollButton = document.getElementById('scroll-button');
  scrollUpArrow = document.getElementById('scroll-up-arrow');
  scrollDownArrow = document.getElementById('scroll-down-arrow');
  progressBar = document.getElementById('scroll-progress-bar');
  progressBarContainer = document.getElementById('scroll-progress-container');

  // Set initial states
  // updateScrollState();

  // // Single passive scroll listener
  // window.addEventListener('scroll', onScroll, { passive: true });
}

function onScroll() {
  if (ticking) return;
  ticking = true;

  // Use native browser scheduling (not RAF - just next tick)
  Promise.resolve().then(() => {
    updateScrollState();
    ticking = false;
  });
}

function updateScrollState() {
  const scrollY = window.pageYOffset;
  const docHeight = document.documentElement.scrollHeight;
  const winHeight = window.innerHeight;
  const maxScroll = docHeight - winHeight;
  const scrollPercent = maxScroll > 0 ? (scrollY / maxScroll) * 100 : 0;

  // 1. Update header (scrolled state)
  if (header) {
    if (scrollY > 20) {
      if (!header.classList.contains('scrolled')) {
        header.classList.add('scrolled');
      }
    } else {
      if (header.classList.contains('scrolled')) {
        header.classList.remove('scrolled');
      }
    }
  }

  // 2. Update scroll button visibility & direction
  if (scrollButton && scrollUpArrow && scrollDownArrow) {
    const isAtTop = scrollY < 100;
    const isAtBottom = scrollPercent > 95;

    // Show/hide button
    if (isAtTop || isAtBottom || (scrollY > 100 && scrollPercent < 95)) {
      if (scrollButton.style.display === 'none') {
        scrollButton.style.display = 'block';
      }
    } else {
      if (scrollButton.style.display !== 'none') {
        scrollButton.style.display = 'none';
      }
    }

    // Direction
    if (isAtTop || (!isAtBottom && scrollY > lastScrollY)) {
      // Scrolling down or at top = show down arrow
      if (scrollDownArrow.style.display !== 'block') {
        scrollDownArrow.style.display = 'block';
        scrollUpArrow.style.display = 'none';
      }
    } else {
      // Scrolling up or at bottom = show up arrow
      if (scrollUpArrow.style.display !== 'block') {
        scrollUpArrow.style.display = 'block';
        scrollDownArrow.style.display = 'none';
      }
    }
  }

  // 3. Update progress bar
  if (progressBar && progressBarContainer) {
    if (scrollPercent > 5) {
      if (progressBarContainer.style.display === 'none') {
        progressBarContainer.style.display = 'block';
      }
      progressBar.style.width = scrollPercent + '%';
    } else {
      if (progressBarContainer.style.display !== 'none') {
        progressBarContainer.style.display = 'none';
      }
    }
  }

  lastScrollY = scrollY;
}

// Initialize on DOM ready
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initScrollHandler);
} else {
  initScrollHandler();
}

// Export for button click handlers
window.scrollToTop = () => {
  window.scrollTo({ top: 0, behavior: 'smooth' });
};

window.scrollToBottom = () => {
  window.scrollTo({ top: document.documentElement.scrollHeight, behavior: 'smooth' });
};
