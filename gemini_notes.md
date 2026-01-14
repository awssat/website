# Arabic Text Suggestions

## General Improvements
1.  **Avoid Literal Translations:** Replace literal terms like "Battle Tested" (مُختبر عمليًا) with idiomatic equivalents like "مجرب وموثوق" or "أثبت كفاءته".
2.  **Use Native Technical Terminology:** Use "Models" (transliterated) or "سجلات" instead of the ambiguous "نماذج". Use "مساهمات" instead of the overly formal "طلبات سحب" for PRs.
3.  **Natural Sentence Flow:** Use active voice and first-person plural ("نحن" - We) more confidently. Avoid overusing English-style "X is Y" structures.
4.  **Authentic Tone:** Maintain a "Developer-to-Developer" or "Studio-to-Client" tone. Keep key technical terms (API, Cache, Full-stack) in English or common Arabized tech slang.

## Specific File Improvements

### 1. `source/_layouts/partial/home_content.blade.php`
*   **Subheadline Suggestion:** "تطوير Laravel بمستوى عالمي." (World-class Laravel development) or "خبرة عميقة في Laravel." (Deep experience in Laravel).
*   **Card 1 (Contributor) Suggestion:** "ساهمنا بـ 6 تحديثات جوهرية في قلب إطار عمل Laravel..." (We contributed 6 core updates to the Laravel framework core...).
*   **Card 3 (Battle Tested) Suggestion:** "أداء مثبت تحت الضغط" (Performance proven under pressure) or "بنية تحتية صلبة" (Solid infrastructure).
*   **Card 3 Content Suggestion:** "برمجيات صممت لتتحمل ملايين الطلبات بكفاءة عالية." (Software designed to handle millions of requests with high efficiency).

### 2. Portfolio Items (e.g., `laravel-visits.ar.md`)
*   **Terminology Suggestion:** Replace "تتبع زيارات النماذج" with "تتبع زيارات الـ Models" or "تتبع زيارات السجلات".
*   **Terminology Suggestion:** Replace "تكامل Eloquent" with "توافق تام مع Eloquent".
*   **Description Suggestion:** "حزمة Laravel Visits تمنحك إحصائيات دقيقة وسريعة..." (The Laravel Visits package gives you accurate and fast statistics...).

### 3. `helpers/TranslationHelper.php`
*   **Home Description Suggestion:** "فريق شغوف يبدع في تصميم وبناء تطبيقات ويب عصرية." (Passionate team creative in designing and building modern web apps).
*   **Portfolio Filters Suggestion:** "مساهمات Laravel" (Laravel Contributions) or "تحديثات النظام" (System updates).
*   **Community Love Suggestion:** "صنعناه بكل ❤️ لمجتمع Laravel." (We made it with all love for the Laravel community).

# Social Media & Links

*   **X/Twitter Handle:** Ensure all links point to `awssat_dev` instead of `awssat`.
*   **Correct URL:** `https://x.com/awssat_dev`

# New Section Proposal: Security & Auditing

## Location
Add this as a new **full-width card (md:col-span-3)** at the bottom of the Bento Grid in `source/_layouts/partial/home_content.blade.php`.

## Content Strategy
Focus on "Rescue", "Protection", and **"AI Verification"**. Address the modern risk of "Vibe-Coding" (using AI to code without deep understanding).

## Implementation Details
*   **English Headline:** Code Audits & AI Verification
*   **English Body:** Complex bugs? Unsure about your AI-generated code? We specialize in deep-dive auditing. We validate "vibe-coded" features, trace hidden logic errors, patch vulnerabilities, and ensure your rapid prototypes are actually production-secure.
*   **Arabic Headline:** فحص الكود ومراجعة الذكاء الاصطناعي
*   **Arabic Body:** هل تعتمد على الذكاء الاصطناعي في البرمجة (Vibe-Coding) وتخشى من الثغرات الخفية؟ نحن متخصصون في الفحص العميق للكود. نقوم بمراجعة ما كتبه الـ AI، إصلاح الأخطاء المنطقية، وسد الثغرات الأمنية لضمان أن مشروعك ليس مجرد "فكرة جميلة" بل نظام آمن وجاهز للإطلاق.
*   **Design Suggestion:** Use a "Shield" icon merged with a "Robot/Sparkle" icon. Use a dark theme card with a subtle "Matrix green" or "Scanner" animation.

# New Section Proposal: Expanded Capabilities (Mobile, Data, AI)

## Location
Expand the Bento Grid (add a new row) or create a dedicated "Services" section.

## Content Modules

### 1. Mobile & Systems Engineering
*   **English:** Beyond Web. We craft high-performance mobile apps and systems using Flutter, Swift, Rust, and Python.
*   **Arabic:** **تطوير تطبيقات الجوال والأنظمة.** لا نكتفي بالويب؛ نبني تطبيقات جوال (Mobile Apps) متقنة باستخدام Flutter و Swift. كما نمتلك خبرة عميقة في لغات Rust و Python و Java لبناء أدوات وأنظمة خلفية عالية الأداء.

### 2. Backend Architecture & Database Optimization
*   **English:** Scale & Resilience. We architect complex APIs and optimize database schemas to handle massive data pressure without breaking.
*   **Arabic:** **هندسة البيانات والـ APIs.** نحن خبراء في تصميم معاريات البرمجيات (Software Architecture) المعقدة. نقوم ببناء وتحسين قواعد البيانات (Databases) لتتحمل ضغط العمل الهائل، ونصمم واجهات برمجية (APIs) صلبة تضمن تدفق البيانات بسلاسة واستقرار.

### 3. Data Intelligence & AI Solutions
*   **English:** Unlock Your Data. We programmatically analyze your business data to achieve strategic goals. We integrate AI into your existing apps to maximize success for your team and customers.
*   **Arabic:** **تحليل البيانات والذكاء الاصطناعي.** بياناتك هي ثروتك. نساعدك في تحليل بياناتك الضخمة برمجياً لتحقيق أهداف عملك الاستراتيجية. كما نقوم بدمج حلول الذكاء الاصطناعي (AI) في صلب نظامك وتطبيقاتك لرفع إنتاجية فريقك وتحسين تجربة عميلك.

### 4. Government Compliance & Digital Transformation
*   **English:** Compliance & Standards. We specialize in upgrading and building platforms that strictly adhere to the Digital Government Authority (DGA) standards and local regulations.
*   **Arabic:** **الامتثال الحكومي والتحول الرقمي.** نضمن توافق أنظمتكم بالكامل مع **المعايير الأساسية للتحول الرقمي** وتشريعات **هيئة الحكومة الرقمية**. نمتلك الخبرة لبناء وتطوير وإدارة البوابات والتطبيقات الحكومية وشبه الحكومية، مع الالتزام التام بضوابط الأمن السيبراني ولوائح استضافة البيانات المحلية.

# Performance Suggestions

1.  **Debounce/Throttle Scroll/Mouse Events:** Debounce the `scroll` and `mousemove` events in `app.js` to prevent main thread blocking and frame drops.
2.  **Optimize Fonts:** Convert `SourceSansPro-SemiBold.ttf` (~268KB) to WOFF2 format and preload it to reduce render-blocking time.
3.  **Automate Image Optimization:** Add an image optimization plugin to the Vite pipeline to automatically compress assets like `cover.png` and portfolio screenshots.
4.  **CSS Hardware Acceleration:** Use `will-change` correctly for animated elements (like cards and buttons) to improve rendering performance.

# Language & Localization Suggestions

1.  **Auto-Redirect (Root Only):** Add a lightweight JS snippet on the homepage (`/`) to detect `navigator.language`. If it starts with `ar` and no preference is saved in `localStorage`, redirect to `/ar`.
2.  **Persist Choice:** Save manually toggled language preferences to `localStorage` and use this value to override auto-detection on future visits.
3.  **Missing Page Fallback:** Verify translated version existence before linking, or fallback to the localized homepage instead of a 404.

# Dark Mode Suggestions

1.  **Respect System Preference:** Initialize `darkMode` using the OS theme if no `localStorage` value is found.
    *   *Implementation Suggestion:* `x-data="{ darkMode: $persist(window.matchMedia('(prefers-color-scheme: dark)').matches) }"`
2.  **Sync Meta Theme Color:** Bind the `<meta name="theme-color">` content to the `darkMode` state to match the browser UI with the site's mode.
3.  **Smooth Transitions:** Add CSS transitions for `background-color` and `color` on main containers to prevent jarring visual changes when toggling.

# Contact Page Suggestions

1.  **Functional Form:** Add a working contact form (e.g., Formspree or Netlify Forms) to `source/_layouts/partial/contact_content.blade.php` for direct messaging.
2.  **Interactive Map:** Add a stylized map showing a general location (e.g., Riyadh, Saudi Arabia) to establish presence and trust.
3.  **FAQ Section:** Include a "Frequently Asked Questions" section to address common inquiries regarding timelines and project types.

# Blog Layout Suggestions

1.  **Table of Contents:** Auto-generate a "Table of Contents" for long articles based on heading tags.
2.  **Reading Time:** Add an estimated reading time indicator (e.g., "5 min read") near the post date.
3.  **Copy-to-Clipboard:** Implement a "Copy" button for all code blocks to improve utility for technical readers.
4.  **Related Posts Logic:** Implement actual tag-matching logic to recommend relevant posts instead of using placeholders.

# UI/UX Investigation

## Missing Elements (Agency Standards)
1.  **Testimonials/Social Proof:** The current site relies heavily on GitHub stats. While impressive to devs, business clients need to see **client testimonials** or logos of companies you've worked with (outside of open source).
    *   *Suggestion:* Add a "Trusted By" marquee or a "Client Stories" carousel.
2.  **Process/Workflow Section:** How do you work? Agile? Sprint-based? Clients want to know what it's like to hire you.
    *   *Suggestion:* Add a "How We Work" section (e.g., Discovery -> Design -> Build -> Scale).
3.  **Team/About Us:** The site feels a bit impersonal ("Awssat Devs"). Showing faces or at least a team philosophy section humanizes the agency.
    *   *Suggestion:* A "Meet the Team" grid or a "Our Philosophy" section.

## Accessibility & Polish
1.  **Skip Links:** Missing a "Skip to Content" link for keyboard users.
2.  **Focus States:** Ensure the custom focus rings on buttons and links are high-contrast and clearly visible in both light and dark modes.
3.  **Motion Reduction:** The site uses a lot of motion (`animate-on-scroll`, `tiltCard`). Respect `prefers-reduced-motion` media queries to disable these for sensitive users.

