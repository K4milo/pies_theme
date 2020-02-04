<footer class="container-fluid site-footer">
    <?php //dynamic_sidebar('footer-widget-area'); ?>
  <div class="row">
    <div class="container">
      <div class="follow">
        <?php if(ICL_LANGUAGE_CODE=='es'): ?>
        <span>Síguenos</span>
        <?php else:?>
        <span>Follow Us</span>
        <?php endif;?>
        <ul>
          <li><a href="https://www.facebook.com/fpiesdescalzos/?ref=ts" class="social-icn fb" target="_blank">Facebook</a></li>
          <li><a href="https://twitter.com/fpiesdescalzos" class="social-icn tw" target="_blank">Twitter</a></li>
          <li><a href="https://www.youtube.com/user/fundpiesdescalzos" class="social-icn yt" target="_blank">Youtube</a></li>
          <li><a href="https://www.instagram.com/fpiesdescalzos/" class="social-icn in" target="_blank">Instagram</a></li>
          <li><a href="https://www.linkedin.com/company/10414649/" class="social-icn lin" target="_blank">LinkedIn</a></li>
          <li><a href="https://piesdescalzoslive.wordpress.com" class="social-icn let" target="_blank">LinkedIn</a></li>
        </ul>
      </div>
      <div class="yellow-footer">
        <div class="footer-col col1 col-md-3">
            <div class="location-item">
              <?php if(ICL_LANGUAGE_CODE=='es'): ?>
              <p>Calle 85 No.18-32 Of. 401 Bogotá - Colombia</p>
              <?php else:?>
              <p>Street 85 No.18-32 Of. 401 Bogotá - Colombia</p>
              <?php endif;?>
              <span class="pointer"></span>
            </div>
            <div class="location-item">
              <a href="mailto:webmaster@fpd.ong">webmaster@fpd.ong</a>
              <span class="sm-mail"></span>
            </div>
            <div class="location-item">
              <p>(571) 6358770</p>
              <span class="sm-phone"></span>
            </div>
        </div>
        <div class="col-md-2 col2 footer-col bd-left">
            <?php if(ICL_LANGUAGE_CODE=='es'): ?>
              <a href="/contacto/">¿Tienes dudas?</a>
            <?php else: ?>
              <a href="/en/contact-us/">Questions?</a>
            <?php endif;?>
        </div>
        <div class="col-md-2 col3 footer-col">
            <?php if(ICL_LANGUAGE_CODE=='es'): ?>
            <a href="/donaciones/" class="huella">Conoce nuestra huella</a>
            <?php else: ?>
            <a href="/en/donation/" class="huella">Know our footprint</a>
            <?php endif;?>
            <a href="mailto:webmaster@fpd.ong"><img src="<?php bloginfo( 'template_url' )?>/img/icons/mail.png"></a>
        </div>
        <div class="col-md-5 col4 footer-col">
            <?php if(ICL_LANGUAGE_CODE=='es'): ?>
              <?php echo do_shortcode('[contact-form-7 id="565" title="Newsletter ES"]'); ?>
            <?php else:?>
              <?php echo do_shortcode('[contact-form-7 id="751" title="Newsletter EN"]'); ?>
            <?php endif;?>
        </div>
      </div>
    </div>
  </div>
  <div class="row copyright">
    &copy; <?php echo date('Y'); ?> <a href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
