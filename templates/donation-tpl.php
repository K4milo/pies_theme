 selected<?php
/*
Template Name: Donation
*/
get_template_part('includes/header');
while (have_posts()):the_post();
?>
<div class="container-fluid donation-page">
  <header class="page-head">
    <?php the_content();?>
  </header>
  <div class="row">
    <div class="container">
      <ul class="nav nav-tabs">
        <?php if(ICL_LANGUAGE_CODE=='es'): ?>
        <li class="active">
          <a data-toggle="tab" href="#home">
            <i>
            </i>Dejar
            <br/>
            <strong>Una Huella
            </strong>
          </a>
        </li>
        <li>
          <a data-toggle="tab" href="#menu1">
            Dejar mi Huella
            <br/>
            <strong>Mensualmente
            </strong>
          </a>
        </li>
        <li>
          <a data-toggle="tab" href="#menu2">
            Compartir
            <br/>
            <strong>mi Huella
            </strong>
          </a>
        </li>
        <li>
          <a data-toggle="tab" href="#menu3">
            Regalar
            <br/>
            <strong>Una Huella
            </strong>
          </a>
        </li>

        <?php else:?>

        <li class="active">
          <a data-toggle="tab" href="#home">
            <i>
            </i>LEAVE A
            <br/>
            <strong>FOOTPRINT
            </strong>
          </a>
        </li>
        <li>
          <a data-toggle="tab" href="#menu1">
            LEAVE MY MONTHLY
            <br/>
            <strong>FOOTPRINT
            </strong>
          </a>
        </li>
        <li>
          <a data-toggle="tab" href="#menu2">
            Share
            <br/>
            <strong>my footprint
            </strong>
          </a>
        </li>
        <li>
          <a data-toggle="tab" href="#menu3">
            Give a
            <br/>
            <strong>footprint
            </strong>
          </a>
        </li>
        <?php endif;?>

      </ul>
      <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
          <div class="first text-body">
            <?php the_field('texto_introductorio_1');?>
          </div>
          <!--/texto intro-->
          <div class="impact-items">
            <?php
            //loop impact items
            while (have_rows('items_de_impacto_1')):the_row();
            ?>
            <div class="col-md-6 item">
              <figure class="tmb hidden-xs">
                <img src="<?php the_sub_field('icono');?>" alt="<?php the_title();?>">
              </figure>
              <div class="text-body">
                <h3>
                  <?php the_sub_field('encabezado');?>
                </h3>
                <figure class="tmb visible-xs">
                  <img src="<?php the_sub_field('icono');?>" alt="<?php the_title();?>">
                </figure>
                <?php the_sub_field('texto');?>
              </div>
            </div>
            <?php
            endwhile;
            ?>
          </div>
          <div class="pay-btns">
            <header>
              <?php if(ICL_LANGUAGE_CODE=='es'): ?>
                <h3>Elige cómo dejar tu huella</h3>
              <?php else:?>
                <h3>SELECT HOW TO LEAVE YOUR FOOTPRINT</h3>
              <?php endif; ?>
            </header>
            <div class="item logo-1">
              <figure class="logo logo-1">

                <?php if(ICL_LANGUAGE_CODE=='es'): ?>
                  <a href="https://donaciones.fundacionpiesdescalzos.com/" target="_blank">
                      <img src="<?php bloginfo('template_url')?>/img/misc/credit-es.png" alt="Donaciones">
                  </a>
                <?php else:?>
                  <a href="https://donaciones.fundacionpiesdescalzos.com/?plan=unico&lang=EN" target="_blank">
                      <img src="<?php bloginfo('template_url')?>/img/misc/credit-en.png" alt="Donaciones">
                  </a>
                <?php endif; ?>

              </figure>
            </div>
            <div class="item logo-2">
              <figure class="logo logo-2">
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                  <input name="cmd" type="hidden" value="_s-xclick">
                  <input name="hosted_button_id" type="hidden" value="CCX6EF3MFC7W8">
                  <input alt="PayPal - The safer, easier way to pay online!" class="img-btn" name="submit" src="<?php bloginfo('template_url')?>/img/logos/paypal.png" type="image"><img src="<?php bloginfo('template_url')?>/img/logos/paypal.png" alt="" width="1" height="1" border="0">
                </form>
              </figure>
            </div>
            <div class="item">
              <figure class="logo logo-cons">
                <?php if(ICL_LANGUAGE_CODE=='es'): ?>
                <a href="#modalCon" data-toggle="modal" data-target="#modalCon" >
                  <img src="<?php bloginfo('template_url');?>/img/icons/the-red-mail.png" alt="<?php the_title();?>">
                </a>
              <?php else: ?>
                <a href="#modalCon-en" data-toggle="modal" data-target="#modalCon-en" >
                  <img src="<?php bloginfo('template_url');?>/img/icons/the-red-mail-en.png" alt="<?php the_title();?>">
                </a>
               <?php endif;?>
              </figure>
            </div>
          </div>
        </div>
        <div id="menu1" class="tab-pane fade">
          <div class="first text-body">
            <?php the_field('texto_introductorio_2');?>
          </div>
          <!--/texto intro-->
          <div class="impact-items">
            <?php
            //loop impact items
            while (have_rows('items_de_impacto_2')):the_row();
            ?>
            <div class="col-md-6 item">
              <figure class="tmb hidden-xs">
                <img src="<?php the_sub_field('icono');?>" alt="<?php the_title();?>">
              </figure>
              <div class="text-body">
                <h3>
                  <?php the_sub_field('encabezado');?>
                </h3>
                <figure class="tmb visible-xs">
                  <img src="<?php the_sub_field('icono');?>" alt="<?php the_title();?>">
                </figure>
                <?php the_sub_field('texto');?>
              </div>
            </div>
            <?php
          endwhile;
          ?>
          </div>
          <!--/eof items impact-->
          <div class="pay-btns">
            <header>
              <?php if(ICL_LANGUAGE_CODE=='es'): ?>
                <h3>Elige cómo dejar tu huella</h3>
              <?php else:?>
                <h3>SELECT HOW TO LEAVE YOUR FOOTPRINT</h3>
              <?php endif; ?>
            </header>
            <div class="item logo-1">
              <figure class="logo logo-1 inline-items">
                <?php if(ICL_LANGUAGE_CODE=='es'): ?>
                  <ul>
                    <li>
                      <a href="https://donaciones.fundacionpiesdescalzos.com/?plan=unico&lang=ES" target="_blank">
                        <img src="<?php bloginfo('template_url')?>/img/misc/payu-small.png" alt="Donaciones">
                      </a>
                    </li>
                    <li>
                      <a href="https://donaronline.org/fundacion-piesdescalzos-colombia/plan-huellas" target="_blank">
                        <img src="<?php bloginfo('template_url')?>/img/misc/donar-online.png" alt="Donaciones">
                      </a>
                    </li>
                  </ul>
                <?php else:?>
                  <a href="https://donaciones.fundacionpiesdescalzos.com/?plan=recurrente&lang=EN" target="_blank">
                      <img src="<?php bloginfo('template_url')?>/img/logos/payu.png" alt="Donaciones">
                  </a>
                <?php endif; ?>
              </figure>
            </div>
            <div class="item form_gateway logo-2">
              <figure class="logo">
                <?php if(ICL_LANGUAGE_CODE=='es'): ?>
                <a href="#modaPayes" data-toggle="modal" data-target="#modaPayes" >
                  <img src="<?php bloginfo('template_url');?>/img/logos/paypal.png" alt="<?php the_title();?>">
                </a>
                <?php else: ?>
                  <a href="#modaPayen" data-toggle="modal" data-target="#modaPayen" >
                    <img src="<?php bloginfo('template_url');?>/img/logos/paypal.png" alt="<?php the_title();?>">
                  </a>
                <?php endif;?>  
              </figure>
            </div>
            <div class="item">
              <figure class="logo logo-cons">
                <?php if(ICL_LANGUAGE_CODE=='es'): ?>
                <a href="#modalCon" data-toggle="modal" data-target="#modalCon" >
                  <img src="<?php bloginfo('template_url');?>/img/icons/the-red-mail.png" alt="<?php the_title();?>">
                </a>
              <?php else: ?>
                <a href="#modalCon-en" data-toggle="modal" data-target="#modalCon-en" >
                  <img src="<?php bloginfo('template_url');?>/img/icons/the-red-mail-en.png" alt="<?php the_title();?>">
                </a>
               <?php endif;?>
              </figure>
            </div>
          </div>
        </div>
        <div id="menu2" class="tab-pane fade">
          <div class="first text-body">
            <?php the_field('texto_introductorio_3');?>
          </div>
          <!--/texto intro-->
          <div class="voluntier-items">
            <?php
            //loop impact items
            while (have_rows('items_voluntariado')):the_row();
            ?>
            <div class="item">
              <header>
                <h3>
                  <?php the_sub_field('titulo');?>
                </h3>
              </header>
              <figure class="tmb">
                <img src="<?php the_sub_field('icono');?>" alt="<?php the_title();?>">
                <div class="text-body">
                  <?php the_sub_field('texto');?>
                </div>
              </figure>
            </div>
            <?php
            endwhile;
            ?>
          </div>
          <!--/eof impact-items-->
          <div class="aditional">
            <?php the_field('contenido_adicional');?>
          </div>
          <!--/eof aditional-->
          <div class="ubication-lst">
            <header>
              <?php if(ICL_LANGUAGE_CODE=='es'): ?>
              <h3>Dónde puedes apoyar
                <br/>como voluntario
              </h3>
            <?php else: ?>
              <h3>WHERE YOU CAN HELP
                <br/>AS A VOLUNTEER
              </h3>
            <?php endif;?>
            </header>
            <ul>
              <?php
            //loop ubications
            while (have_rows('ubicaciones')):the_row();
            ?>
              <li style="background-image: url(<?php the_sub_field('imagen_fondo');?>)">
                <div class="text-body">
                  <?php the_sub_field('texto_detalle');?>
                </div>
              </li>
              <?php
            endwhile;
            ?>
            </ul>
          </div>
          <!--/eof ubication-->
          <div class="tab-form">
            <header>
              <?php if(ICL_LANGUAGE_CODE=='es'): ?>
              <h3>Formulario
                <br/>de inscripción
              </h3>
              <?php else:?>
              <h3>Enrollment
                <br/>form
              </h3>
              <?php endif;?>
            </header>
            <?php
            $the_form = get_field('shortcode_formulario');
            if ($the_form) {
            echo do_shortcode($the_form);
            }
            ?>
          </div>
          <!--/eof form-->
          <div class="faqs">
            <header>
              <?php if(ICL_LANGUAGE_CODE=='es'): ?>
              <h3>Preguntas Frecuentes</h3>
              <?php else:?>
                <h3>FREQUENTLY ASKED QUESTIONS</h3>
              <?php endif;?>
            </header>
            <div class="panel-group">
              <div class="panel panel-default">
                <?php
            $counter = 0;
            while (have_rows('preguntas_frecuentes')):the_row();
            ?>
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" href="#collapse<?php echo $counter;?>">
                      <?php the_sub_field('encabezado');?>
                    </a>
                  </h4>
                </div>
                <div id="collapse<?php echo $counter;?>" class="panel-collapse collapse">
                  <?php the_sub_field('respuesta');?>
                </div>
                <?php $counter++;
            endwhile;
            ?>
              </div>
            </div>
            <!--/panel group-->
          </div>
          <!--EOF FAQS-->
          <div class="impact-items">
            <?php
            //loop impact items
            while (have_rows('items_de_impacto_3')):the_row();
            ?>
            <div class="col-md-6 item">
              <figure class="tmb hidden-xs">
                <img src="<?php the_sub_field('icono');?>" alt="<?php the_title();?>">
              </figure>
              <div class="text-body">
                <h3>
                  <?php the_sub_field('encabezado');?>
                </h3>
                <figure class="tmb visible-xs">
	                <img src="<?php the_sub_field('icono');?>" alt="<?php the_title();?>">
	             </figure>
                <?php the_sub_field('texto');?>
              </div>
            </div>
            <?php
            endwhile;
            ?>
          </div>
          <!--/eof items impact-->
        </div>
        <!--/eof tab 3-->
        <div id="menu3" class="tab-pane fade">
          <div class="first text-body">
            <?php the_field('texto_introductorio_4');?>
          </div>
          <!--/texto intro-->
          <div class="impact-items">
            <?php
            //loop impact items
            while (have_rows('items_de_impacto_4')):the_row();
            ?>
            <div class="col-md-6 item">
              <figure class="tmb hidden-xs">
                <img src="<?php the_sub_field('icono');?>" alt="<?php the_title();?>">
              </figure>
              <div class="text-body">
                <h3>
                  <?php the_sub_field('encabezado');?>
                </h3>
                <figure class="tmb visible-xs">
                  <img src="<?php the_sub_field('icono');?>" alt="<?php the_title();?>">
                </figure>
                <?php the_sub_field('texto');?>
              </div>
            </div>
            <?php
            endwhile;
            ?>
          </div>
          <!--/eof impact items-->
          <div class="card-items">
            <div class="col-md-2 col-md-offset-3 item icon">
              <img src="<?php the_field('icono_tarjetas');?>">
            </div>
            <?php
            //loop impact items
            while (have_rows('informacion_tarjetas')):the_row();
            ?>
            <div class="col-md-2 item info">
              <?php the_sub_field('item_informativo');?>
            </div>
            <?php
            endwhile;
            ?>
          </div>
          <!--/eof card items-->
          <div class="bonus-items">
            <div class="col-md-2 col-md-offset-3  item icon bounceIn" data-wow-duration="0.5s" data-wow-delay="1s">
              <img src="<?php the_field('icono_bonos');?>">
            </div>
            <?php
            //loop impact items
            while (have_rows('informacion_bonos')):the_row();
            ?>
            <div class="col-md-2 item info">
              <?php the_sub_field('item_informativo');?>
            </div>
            <?php
            endwhile;
            ?>
          </div>
          <!--/eof card items-->
          <div class="bonus-timeline">
            <ul>
              <?php
            //loop impact items
            while (have_rows('adquisicion_bonos')):the_row();
            ?>
              <li>
                <img src="<?php the_sub_field('icono');?>" class="bounceIn" data-wow-duration="0.5s" data-wow-delay="1s">
                <div class="text-body">
                  <?php the_sub_field('texto');?>
                </div>
              </li>
              <?php
            endwhile;
            ?>
            </ul>
          </div>
          <!--/eof card items-->
          <div class="pay-btns">
            <header>
              <?php if(ICL_LANGUAGE_CODE=='es'): ?>
                <h3>Elige cómo dejar tu huella</h3>
              <?php else:?>
                <h3>SELECT HOW TO LEAVE YOUR FOOTPRINT</h3>
              <?php endif; ?>
            </header>
            <div class="item logo-1">
              <figure class="logo logo-1">
                <?php if(ICL_LANGUAGE_CODE=='es'): ?>
                  <a href="https://donaciones.fundacionpiesdescalzos.com/?plan=unico&lang=ES" target="_blank">
                      <img src="<?php bloginfo('template_url')?>/img/logos/payu.png" alt="Donaciones">
                  </a>
                <?php else:?>
                  <a href="https://donaciones.fundacionpiesdescalzos.com/?plan=unico&lang=EN" target="_blank">
                      <img src="<?php bloginfo('template_url')?>/img/logos/payu.png" alt="Donaciones">
                  </a>
                <?php endif; ?>
              </figure>
            </div>
            <div class="item logo-2">
              <figure class="logo logo-2">
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                  <input name="cmd" type="hidden" value="_s-xclick">
                  <input name="hosted_button_id" type="hidden" value="CCX6EF3MFC7W8">
                  <input alt="PayPal - The safer, easier way to pay online!" class="img-btn" name="submit" src="<?php bloginfo('template_url')?>/img/logos/paypal.png" type="image"><img src="<?php bloginfo('template_url')?>/img/logos/paypal.png" alt="" width="1" height="1" border="0">
                </form>
              </figure>
            </div>
            <div class="item">
              <figure class="logo logo-cons">
                <?php if(ICL_LANGUAGE_CODE=='es'): ?>
                <a href="#modalCon" data-toggle="modal" data-target="#modalCon" >
                  <img src="<?php bloginfo('template_url');?>/img/icons/the-red-mail.png" alt="<?php the_title();?>">
                </a>
              <?php else: ?>
                <a href="#modalCon-en" data-toggle="modal" data-target="#modalCon-en" >
                  <img src="<?php bloginfo('template_url');?>/img/icons/the-red-mail-en.png" alt="<?php the_title();?>">
                </a>
               <?php endif;?>
              </figure>
            </div>
          </div>
        </div>
        <!--/eof tab 4-->
      </div>
      <!--/tab content-->
    </div>
    <!--centered-->
  </div>
  <!-- /.row -->
</div>
<!-- /.container -->

<!--modal paypal-->

<!-- Modal -->
<div id="modaPayes" class="modal pay-pal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <img src="<?php bloginfo('template_url');?>/img/icons/letter-small.png" alt="<?php the_title();?>">
        <h4 class="modal-title">Donación Paypal
        </h4>
      </div>
      <div class="modal-body">
        
        <form class="dummy-drop">
          <label>Elija el monto a donar</label>
          <select name="opt-dumy">
            <option value="10.00" selected>$10 US</option>
            <option value="30.00">$30 US</option>
            <option value="50.00">$50 US</option>
            <option value="100.00">$100 US</option>
          </select>
        </form>
        <form id="gatewayForm" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
        <input type="hidden" name="cmd" value="_xclick-subscriptions">
        <input type="hidden" name="business" value="webmaster@fpd.ong">
        <input type="hidden" name="lc" value="AL">
        <input type="hidden" name="item_name" value="Pago mensual">
        <input type="hidden" name="item_number" value="PMFPD001">
        <input type="hidden" name="no_note" value="1">
        <input type="hidden" name="src" value="1">
        <input type="hidden" class="value_gateway" name="a3" value="10.00">
        <input type="hidden" name="p3" value="1">
        <input type="hidden" name="t3" value="M">
        <input type="hidden" name="currency_code" value="USD">
        <input type="hidden" name="bn" value="PP-SubscriptionsBF:paypal.png:NonHostedGuest">
        <input alt="PayPal - The safer, easier way to pay online!" class="img-btn" name="submit" src="<?php bloginfo('template_url')?>/img/misc/button-donate.png" type="image"><img src="<?php bloginfo('template_url')?>/img/misc/button-donate.png" alt="" width="1" height="1" border="0">
        </form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar X
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="modaPayen" class="modal pay-pal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <img src="<?php bloginfo('template_url');?>/img/icons/letter-small.png" alt="<?php the_title();?>">
        <h4 class="modal-title">Paypal Donation
        </h4>
      </div>
      <div class="modal-body">
        <form class="dummy-drop">
          <label>Choose the amount to donate</label>
          <select name="opt-dumy">
            <option value="10.00" selected>$10 US</option>
            <option value="30.00">$30 US</option>
            <option value="50.00">$50 US</option>
            <option value="100.00">$100 US</option>
          </select>
        </form>
        <form id="gatewayForm" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
        <input type="hidden" name="cmd" value="_xclick-subscriptions">
        <input type="hidden" name="business" value="webmaster@fpd.ong">
        <input type="hidden" name="lc" value="AL">
        <input type="hidden" name="item_name" value="Pago mensual">
        <input type="hidden" name="item_number" value="PMFPD001">
        <input type="hidden" name="no_note" value="1">
        <input type="hidden" name="src" value="1">
        <input type="hidden" class="value_gateway" name="a3" value="10.00">
        <input type="hidden" name="p3" value="1">
        <input type="hidden" name="t3" value="M">
        <input type="hidden" name="currency_code" value="USD">
        <input type="hidden" name="bn" value="PP-SubscriptionsBF:paypal.png:NonHostedGuest">
        <input alt="PayPal - The safer, easier way to pay online!" class="img-btn" name="submit" src="<?php bloginfo('template_url')?>/img/misc/button-donate-en.png" type="image"><img src="<?php bloginfo('template_url')?>/img/misc/button-donate-en.png" alt="" width="1" height="1" border="0">
        </form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar X
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="modalCon" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <img src="<?php bloginfo('template_url');?>/img/icons/letter-small.png" alt="<?php the_title();?>">
        <h4 class="modal-title">Consignación
        </h4>
      </div>
      <div class="modal-body">
        <p>
          Consignación
          Para donaciones en efectivo
        </p>
        <p> 
          <b>
            Puedes consignar en Bancolombia
            Cuenta de Ahorros
            <br/>No. 209 658065-20 
            Fundación Pies Descalzos
          </b>
        </p>
        <p>
          *No olvides enviar el comprobante de consignación y pagos internacionales contactar el correo:
          <a href="mailto: tesoreria@fpd.ong"> tesoreria@fpd.ong</a>
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar X
        </button>
      </div>
    </div>
  </div>
</div>

<div id="modalCon-en" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <img src="<?php bloginfo('template_url');?>/img/icons/letter-small.png" alt="<?php the_title();?>">
        <h4 class="modal-title">Deposit
        </h4>
      </div>
      <div class="modal-body">
        <p>
           For cash donations:
        </p>
        <p>
          <b>
            You can register at Bancolombia Savings Account
            <br/>No. 209 658065-20
            Fundación Pies Descalzos
          </b>
        </p>
        <p>
          *Do not forget to send the deposit or international pay receipt to this email:
          <a href="mailto: tesoreria@fpd.ong"> tesoreria@fpd.ong</a>
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close X
        </button>
      </div>
    </div>
  </div>
</div>

<?php
endwhile;
get_template_part('includes/footer');?>
