<?php get_template_part('includes/header'); ?>

<div class="container-fluid">
  <div class="row">
    <header class="page-head">
    	<a href="http://londonojp.com/pies-descalzos/noticias/">
	    	<span class="back-icon"><i class="fa fa-chevron-left" aria-hidden="true"></i></span>
		</a>
    	<h2>Resultados de Búsqueda</h2>
    </header>
    <div class="row news-list no-gutter">
      
      <?php get_template_part('includes/loops/content', 'search'); ?>
      
    </div>
  </div><!-- /.row -->
</div><!-- /.container -->

<?php get_template_part('includes/footer'); ?>
