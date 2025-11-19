A.C. DIGITAL SERVICE — WordPress Theme

Purpose
- Lightweight, no page builders, Core Web Vitals friendly
- Compatible with PHP 8.1–8.3 (set the latest stable in Aruba CP)
- Aruba Dynamic Cache friendly, HTTPS-ready, minification safe

Install (FTP/SFTP)
1) Create a staging subdomain (e.g., staging.acdigitalservice.it) in Aruba CP and enable same PHP version as production.
2) Upload the theme folder `acdservice` to `/wp-content/themes/` on both staging and production.
3) Activate the theme in Appearance → Themes (first on staging).
4) In Aruba CP → Security, ensure DV SSL is active for both domains.
5) In Aruba CP → Performance, enable Dynamic Cache.
6) Optional: install a safe minify plugin (e.g., Autoptimize). Keep JS aggregation off to avoid conflicts; keep CSS aggregation on. Defer/async non-critical where possible.

Media & Limits
- Keep upload files under 16 MB. Theme enforces a soft cap.
- Convert images to AVIF/WebP before upload (use Squoosh). Target widths: 640/1280/1920 px.
- Use descriptive ALT text:
  * Disassembled camera body — ribbon cables and shutter assembly
  * Lens under repair — helicoid and aperture unit
  * Sensor cleaning in progress — wet and dry swabs

Recommended .user.ini (root)
; Aligned with Aruba shared hosting profiles
upload_max_filesize=32M
post_max_size=32M
memory_limit=256M
max_input_vars=3000
max_execution_time=60

robots.txt (place at web root)
User-agent: *
Disallow: /wp-admin/
Allow: /wp-admin/admin-ajax.php
Sitemap: https://example.com/sitemap.xml

Sitemap
- Use WordPress core sitemap: /wp-sitemap.xml (or install Rank Math/Yoast). Add rewrite to expose as /sitemap.xml if desired.

Staging readiness
- Avoid absolute URLs in theme. Use home_url() and theme file functions.
- Database search/replace not required if WP_HOME/WP_SITEURL are set per environment.

Security & HTTPS
- Force HTTPS in WP settings and .htaccess; add HSTS after validation.
- CSP meta upgrade-insecure-requests added by theme as a safety net.

Schema
- LocalBusiness and Service JSON-LD are printed. Edit in functions.php if details change.

Spline Hero
- Hero uses Spline cover via iframe. Keep overlays pointer-events: none if adding layers above.
