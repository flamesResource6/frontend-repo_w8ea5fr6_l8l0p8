<?php
/*
 * Theme bootstrap for A.C. DIGITAL SERVICE
 * - Enqueue minimal CSS/JS
 * - Enable HTML5, title-tag, post-thumbnails
 * - Lazy-load images, WebP/AVIF support (native by browser)
 * - JSON-LD schema (LocalBusiness + Service)
 * - Sitemap/robots output for static deployments
 * - Cache headers friendly for Aruba Dynamic Cache
 */

if (!defined('ACD_VER')) {
  define('ACD_VER', '1.0.0');
}

add_action('after_setup_theme', function(){
  add_theme_support('title-tag');
  add_theme_support('html5', ['search-form','comment-form','comment-list','gallery','caption','style','script']);
  add_theme_support('post-thumbnails');
});

add_action('wp_enqueue_scripts', function(){
  wp_enqueue_style('acd-style', get_stylesheet_uri(), [], ACD_VER);
  // Minimal JS to enable menu toggle and intersection observer for fade-ins
  $js = "document.addEventListener('DOMContentLoaded',()=>{const b=document.querySelector('[data-menu]');if(b){b.addEventListener('click',()=>{document.body.classList.toggle('nav-open')})}const o=new IntersectionObserver(e=>{e.forEach(x=>{if(x.isIntersecting){x.target.classList.add('in')}})},{threshold:.1});document.querySelectorAll('.reveal').forEach(el=>o.observe(el));});";
  wp_register_script('acd-inline', '', [], ACD_VER, true);
  wp_enqueue_script('acd-inline');
  wp_add_inline_script('acd-inline', $js, 'after');
});

// Ensure images are lazy-loaded and add descriptive alt if missing
add_filter('wp_get_attachment_image_attributes', function($attr, $attachment){
  $attr['loading'] = 'lazy';
  if (empty($attr['alt'])) {
    $mime = get_post_mime_type($attachment);
    if (strpos((string)$mime,'image') === 0) {
      $attr['alt'] = 'Workshop repair in progress - cameras and lenses service at A.C. DIGITAL SERVICE';
    }
  }
  return $attr;
}, 10, 2);

// Output JSON-LD schema in head
add_action('wp_head', function(){
  $schema = [
    '@context' => 'https://schema.org',
    '@type' => 'LocalBusiness',
    'name' => 'A.C. DIGITAL SERVICE',
    'email' => 'info@acdigitalservice.it',
    'address' => [
      '@type' => 'PostalAddress',
      'streetAddress' => 'Via Giuseppe Capruzzi, 280',
      'postalCode' => '70124',
      'addressLocality' => 'Bari',
      'addressCountry' => 'IT'
    ],
    'url' => home_url('/'),
    'image' => [
      get_theme_file_uri('assets/hero-cover.jpg')
    ],
    'servesCuisine' => null,
    'makesOffer' => null,
    'description' => 'Diagnostics, repairs, calibration, cleaning, and preventive maintenance for cameras and lenses.'
  ];
  $services = [
    '@context' => 'https://schema.org',
    '@type' => 'Service',
    'serviceType' => 'Camera and Lens Service',
    'provider' => [ 'name' => 'A.C. DIGITAL SERVICE' ]
  ];
  echo '<script type="application/ld+json">'.wp_json_encode($schema).'</script>';
  echo '<script type="application/ld+json">'.wp_json_encode($services).'</script>';
});

// Basic robots and sitemap links
add_action('wp_head', function(){
  echo '<link rel="sitemap" type="application/xml" title="Sitemap" href="'.esc_url(home_url('/sitemap.xml')).'">';
  echo '<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">';
}, 1);

// Performance headers hint for Aruba cache (edge, public, must-revalidate)
add_action('send_headers', function(){
  if (!is_user_logged_in()) {
    header('Cache-Control: public, max-age=600, s-maxage=600');
  }
});

// Safe media limits within Aruba shared hosting profiles
// Example typical profile: upload_max_filesize/post_max_size 32M-64M, memory_limit 128M-256M
// Apply lower defaults via .user.ini guidance (see theme readme) and validate on upload
add_filter('wp_handle_upload_prefilter', function($file){
  $max = 16 * 1024 * 1024; // 16 MB soft cap for uploads
  if (!empty($file['size']) && (int)$file['size'] > $max) {
    $file['error'] = 'File too large. Please upload images under 16MB. Use WebP/AVIF optimized for web.';
  }
  return $file;
});

// Disable concatenation conflicts, keep minification safe (leave to Aruba Dynamic Cache/minify plugins)
add_filter('script_loader_tag', function($tag){ return str_replace('type="text/javascript"', '', $tag); });

// Register menus
add_action('after_setup_theme', function(){
  register_nav_menus([
    'primary' => __('Primary Menu','acdservice')
  ]);
});

// Custom image sizes optimized for Core Web Vitals
add_action('after_setup_theme', function(){
  add_image_size('hero-xl', 1920, 1080, true);
  add_image_size('gallery-lg', 1280, 960, true);
  add_image_size('gallery-sm', 640, 480, true);
});

// Short helper to output a responsive srcset for WebP/AVIF (WordPress generates automatically if supported)

