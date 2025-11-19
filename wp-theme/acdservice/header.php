<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="header">
  <div class="container nav">
    <a class="logo" href="<?php echo esc_url(home_url('/')); ?>" aria-label="A.C. DIGITAL SERVICE Home">
      <span>📷</span>
      <span>A.C. DIGITAL SERVICE</span>
      <span class="badge">Bari, IT</span>
    </a>
    <nav aria-label="Primary">
      <?php wp_nav_menu(['theme_location'=>'primary','container'=>false,'menu_class'=>'menu']); ?>
    </nav>
    <button class="btn" data-menu aria-label="Toggle navigation">Menu</button>
  </div>
</header>
<div class="hero">
  <div class="spline-embed" style="position:absolute;inset:0;">
    <iframe src="https://prod.spline.design/xzUirwcZB9SOxUWt/scene.splinecode" title="3D Hero" frameborder="0" style="width:100%;height:100%;display:block;"></iframe>
  </div>
  <div class="overlay"></div>
  <div class="content">
    <div>
      <h1>Precision Camera & Lens Service</h1>
      <p>Diagnostics, repairs, calibration, cleaning and preventive maintenance. Trusted workshop in Bari for photographers and studios.</p>
      <a class="btn" href="#services">Our Services</a>
    </div>
  </div>
</div>
<main class="container">
