<?php /* Template Name: About */ 
get_template_part( 'includes/header'); 
	while (have_posts()):the_post() ?>

<div class="container-fluid">
    <div class="row main-cont">
        <header class="main-header">
            <h3><?php the_title();?></h3>
        </header>
        <div class="text-main">
            <?php the_content();?>
        </div>
        <!--eof main-->
    </div>
    <!-- /.row -->
    <div class="row content-tabs">
        <div class="container">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a data-toggle="tab" href="#menu1">Nuestro Equipo</a>
                </li>
                <li>
                    <a data-toggle="tab" href="#menu2">Junta Directiva</a>
                </li>
                <li>
                    <a data-toggle="tab" href="#menu3">Nuestra Fundadora</a>
                </li>
            </ul>

            <div class="tab-content">
                <div id="menu1" class="tab-pane fade in active">
                    <ul class="items-photos">
                        <?php //loop impact items 
                        while (have_rows( 'items_equipo')):the_row(); ?>
                        <li>
                            <article class="item-carr">
                                <figure class="thumbs">
                                    <img src="<?php the_sub_field('imagen_avatar');?>" class="color" alt="<?php the_title();?>" />
                                    <img src="<?php the_sub_field('imagen_avatar_bn');?>" class="bn" alt="<?php the_title();?>" />
                                </figure>
                                <div class="body-text">
                                    <?php the_sub_field( 'informacion_personal');?>
                                </div>
                            </article>
                        </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
                <!--end of tab-->
                <div id="menu2" class="tab-pane fade">
                    <ul class="items-photos">
                        <?php //loop impact items 
                        while (have_rows( 'items_junta')):the_row(); ?>
                        <li>
                            <article class="item-carr">
                                <figure class="thumbs">
                                    <img src="<?php the_sub_field('imagen_avatar');?>" class="color" alt="<?php the_title();?>" />
                                    <img src="<?php the_sub_field('imagen_avatar_bn');?>" class="bn" alt="<?php the_title();?>" />
                                </figure>
                                <div class="body-text">
                                    <?php the_sub_field( 'informacion_personal');?>
                                </div>
                            </article>
                        </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
                <!--end of tab-->
                <div id="menu3" class="tab-pane fade">
                    <div class="container">
	                    <div class="founder">
	                        <figure class="thumb-founder">
	                            <img src="<?php the_field('foto_fundadora');?>" alt="<?php the_title();?>" />
	                        </figure>
	                        <div class="text-founder">
	                            <?php the_field( 'texto_fundadora');?>
	                        </div>
	                    </div>
                	</div>
                    <ul class="items-ano">
                        <?php //loop impact items 
                        while (have_rows( 'items_ano')):the_row(); ?>
                        <li>
                            <span class="ano-small">
								<?php the_sub_field('fecha');?>
	  						</span>
                            <div class="body-date">
                                <h3><?php the_sub_field('fecha');?></h3>
                                <p><?php the_sub_field( 'texto_fecha');?></p>
                            </div>
                        </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
                <!--end of tab-->
            </div>
            <!--tabs contents-->
        </div>
    </div>
    <!--eof tabs-->
    <div class="row content-aditional">
        <div class="container">
            <?php the_field( 'contenido_adicional');?>
        </div>
    </div>
</div>
<!-- /.container -->

<?php endwhile; get_template_part( 'includes/footer');?>