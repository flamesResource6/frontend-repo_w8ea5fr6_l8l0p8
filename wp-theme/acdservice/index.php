<?php get_header(); ?>
<section id="services" class="section reveal">
  <div class="grid cols-3">
    <div class="card">
      <h3>Diagnostics</h3>
      <p>Comprehensive checks for cameras and lenses to pinpoint faults before repair.</p>
    </div>
    <div class="card">
      <h3>Repairs</h3>
      <p>Mechanical and electronic fixes for shutters, AF modules, apertures and boards.</p>
    </div>
    <div class="card">
      <h3>Calibration</h3>
      <p>AF micro-adjustments, focus alignment and optical calibration for sharp results.</p>
    </div>
    <div class="card">
      <h3>Cleaning</h3>
      <p>Professional sensor, viewfinder and lens internal cleaning to restore clarity.</p>
    </div>
    <div class="card">
      <h3>Preventive Maintenance</h3>
      <p>Periodic servicing to extend gear life and reduce unexpected downtime.</p>
    </div>
    <div class="card">
      <h3>Support</h3>
      <p>Guidance on care, firmware and accessories tailored to your equipment.</p>
    </div>
  </div>
</section>

<section class="section reveal" id="gallery">
  <h2>In‑Progress Repairs</h2>
  <p class="small">All images are optimized and lazy‑loaded. Formats: AVIF/WebP with fallbacks.</p>
  <div class="grid cols-3">
    <?php for ($i=1;$i<=9;$i++): ?>
      <figure class="card">
        <picture>
          <source type="image/avif" srcset="<?php echo esc_url(get_theme_file_uri('assets/gallery'.$i.'.avif')); ?>">
          <source type="image/webp" srcset="<?php echo esc_url(get_theme_file_uri('assets/gallery'.$i.'.webp')); ?>">
          <img loading="lazy" width="640" height="480" src="<?php echo esc_url(get_theme_file_uri('assets/gallery'.$i.'.jpg')); ?>" alt="Camera workshop — <?php echo ($i%3===1?'disassembled camera body':($i%3===2?'lens under repair':'sensor cleaning in progress')); ?> at A.C. DIGITAL SERVICE, Bari">
        </picture>
        <figcaption class="small"><?php echo ($i%3===1?'Disassembled camera',''); ?><?php echo ($i%3===1?'Disassembled camera body':($i%3===2?'Lens under repair':'Sensor cleaning')); ?></figcaption>
      </figure>
    <?php endfor; ?>
  </div>
</section>

<section class="section reveal" id="contact">
  <div class="grid cols-2">
    <div class="card">
      <h3>Contact</h3>
      <p>Email: <a href="mailto:info@acdigitalservice.it">info@acdigitalservice.it</a></p>
      <p>Address: Via Giuseppe Capruzzi, 280 – 70124 – Bari, Italy</p>
    </div>
    <div class="card">
      <h3>Hours</h3>
      <p>Mon–Fri: 9:00–18:00</p>
      <p>Sat: 10:00–13:00</p>
    </div>
  </div>
</section>
<?php get_footer(); ?>