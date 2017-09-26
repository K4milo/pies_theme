<footer class="container-fluid site-footer" style="display:none;">
    <?php //dynamic_sidebar('footer-widget-area'); ?>
  <div class="row">
    <div class="container">
      <div class="follow">
        <span>Síguenos</span>
      </div>
      <div class="yellow-footer">

      </div>
      &copy; <?php echo date('Y'); ?> <a href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
