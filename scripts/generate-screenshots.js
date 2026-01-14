#!/usr/bin/env node

/**
 * Portfolio Screenshot Generator
 *
 * Generates high-quality screenshots of live websites for portfolio items.
 * Caches screenshots based on URL hash to avoid unnecessary regeneration.
 */

import fs from 'fs';
import path from 'path';
import crypto from 'crypto';
import { fileURLToPath } from 'url';
import puppeteer from 'puppeteer';

// ES module equivalents of __dirname and __filename
const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

// Configuration
const CONFIG = {
    viewport: {
        width: 1200,
        height: 630,
        deviceScaleFactor: 2, // Retina quality
    },
    timeout: 30000, // 30 seconds per page
    outputDir: path.join(__dirname, '../source/assets/images/portfolio/screenshots'),
    cacheFile: path.join(__dirname, '../source/assets/images/portfolio/.screenshot-cache.json'),
    portfolioDir: path.join(__dirname, '../source/_portfolio'),
};

// Load cache
function loadCache() {
    try {
        if (fs.existsSync(CONFIG.cacheFile)) {
            return JSON.parse(fs.readFileSync(CONFIG.cacheFile, 'utf-8'));
        }
    } catch (error) {
        console.warn('⚠️  Could not load cache:', error.message);
    }
    return {};
}

// Save cache
function saveCache(cache) {
    try {
        fs.mkdirSync(path.dirname(CONFIG.cacheFile), { recursive: true });
        fs.writeFileSync(CONFIG.cacheFile, JSON.stringify(cache, null, 2));
    } catch (error) {
        console.error('❌ Could not save cache:', error.message);
    }
}

// Generate hash for URL
function hashUrl(url) {
    return crypto.createHash('md5').update(url).digest('hex');
}

// Extract portfolio URLs from markdown files
function extractPortfolioUrls() {
    const urls = [];

    if (!fs.existsSync(CONFIG.portfolioDir)) {
        console.warn('⚠️  Portfolio directory not found:', CONFIG.portfolioDir);
        return urls;
    }

    const files = fs.readdirSync(CONFIG.portfolioDir)
        .filter(f => f.endsWith('.md'));

    for (const file of files) {
        const content = fs.readFileSync(path.join(CONFIG.portfolioDir, file), 'utf-8');

        // Extract frontmatter
        const frontmatterMatch = content.match(/^---\n([\s\S]*?)\n---/);
        if (!frontmatterMatch) continue;

        const frontmatter = frontmatterMatch[1];

        // Extract demo_url or screenshot_url
        const demoUrlMatch = frontmatter.match(/demo_url:\s*["'](.+?)["']/);
        const screenshotUrlMatch = frontmatter.match(/screenshot_url:\s*["'](.+?)["']/);
        const typeMatch = frontmatter.match(/type:\s*["'](.+?)["']/);

        const url = screenshotUrlMatch?.[1] || demoUrlMatch?.[1];
        const type = typeMatch?.[1] || 'unknown';

        // Only screenshot websites and web apps
        if (url && type === 'website') {
            urls.push({
                url,
                filename: file,
                hash: hashUrl(url),
            });
        }
    }

    return urls;
}

// Capture screenshot
async function captureScreenshot(browser, url, outputPath) {
    const page = await browser.newPage();

    try {
        await page.setViewport(CONFIG.viewport);

        // Set extra headers to appear as normal browser
        await page.setUserAgent('Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36');

        console.log(`   📸 Loading ${url}...`);

        // Navigate with timeout
        await page.goto(url, {
            waitUntil: 'networkidle2',
            timeout: CONFIG.timeout,
        });

        // Wait a bit for animations/lazy loading
        await new Promise(resolve => setTimeout(resolve, 2000));

        // Take screenshot
        await page.screenshot({
            path: outputPath,
            type: 'jpeg',
            quality: 90,
            fullPage: false, // Only capture viewport
        });

        console.log(`   ✅ Screenshot saved`);
        return true;

    } catch (error) {
        console.error(`   ❌ Failed: ${error.message}`);
        return false;
    } finally {
        await page.close();
    }
}

// Main function
async function main() {
    console.log('🚀 Starting portfolio screenshot generator\n');

    // Create output directory
    fs.mkdirSync(CONFIG.outputDir, { recursive: true });

    // Load cache
    const cache = loadCache();

    // Extract URLs
    const items = extractPortfolioUrls();
    console.log(`📋 Found ${items.length} website(s) to process\n`);

    if (items.length === 0) {
        console.log('✅ No websites to screenshot');
        return;
    }

    // Launch browser
    console.log('🌐 Launching browser...\n');
    const browser = await puppeteer.launch({
        headless: 'new',
        args: [
            '--no-sandbox',
            '--disable-setuid-sandbox',
            '--disable-dev-shm-usage',
            '--disable-accelerated-2d-canvas',
            '--disable-gpu',
        ],
    });

    let generated = 0;
    let skipped = 0;
    let failed = 0;

    try {
        for (const item of items) {
            const outputPath = path.join(CONFIG.outputDir, `${item.hash}.jpg`);

            console.log(`📄 ${item.filename}`);
            console.log(`   🔗 ${item.url}`);

            // Check cache
            if (cache[item.hash] && fs.existsSync(outputPath)) {
                console.log(`   ⏭️  Cached, skipping\n`);
                skipped++;
                continue;
            }

            // Generate screenshot
            const success = await captureScreenshot(browser, item.url, outputPath);

            if (success) {
                cache[item.hash] = {
                    url: item.url,
                    generated: new Date().toISOString(),
                };
                generated++;
            } else {
                failed++;
            }

            console.log('');
        }
    } finally {
        await browser.close();
    }

    // Save cache
    saveCache(cache);

    // Summary
    console.log('📊 Summary:');
    console.log(`   ✅ Generated: ${generated}`);
    console.log(`   ⏭️  Cached: ${skipped}`);
    console.log(`   ❌ Failed: ${failed}`);
    console.log(`   📁 Output: ${CONFIG.outputDir}`);
}

// Run
main().catch(error => {
    console.error('❌ Fatal error:', error);
    process.exit(1);
});
