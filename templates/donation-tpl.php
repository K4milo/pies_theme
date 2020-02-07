<?php
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
            </i>Donación
            <br/>
            <strong>Única
            </strong>
          </a>
        </li>
        <li>
          <a data-toggle="tab" href="#menu1">
            Donación
            <br/>
            <strong>Mensual
            </strong>
          </a>
        </li>
        <li>
          <a data-toggle="tab" href="#menu2">
            Donación
            <br/>
            <strong>corporativa
            </strong>
          </a>
        </li>
        <li>
          <a data-toggle="tab" href="#menu3">
            Donación
            <br/>
            <strong>conmemorativa
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
          <div class="pay-btns">
            <header>
              <?php if(ICL_LANGUAGE_CODE=='es'): ?>
                <h3>Elige cómo donar</h3>
              <?php else:?>
                <h3>SELECT HOW TO LEAVE YOUR FOOTPRINT</h3>
              <?php endif; ?>
            </header>
            <div class="item">
              <figure class="logo logo-cons">
                <?php if(ICL_LANGUAGE_CODE=='es'): ?>
                <a href="#modalCon" data-toggle="modal" data-target="#modalCon" >
                  <img src="<?php bloginfo('template_url');?>/img/misc/dc-es.png" alt="<?php the_title();?>">
                </a>
              <?php else: ?>
                <a href="#modalCon-en" data-toggle="modal" data-target="#modalCon-en" >
                  <img src="<?php bloginfo('template_url');?>/img/misc/dc-en.png" alt="<?php the_title();?>">
                </a>
               <?php endif;?>
              </figure>
            </div>
            <div class="item logo-1">
              <figure class="logo logo-1">

                <?php if(ICL_LANGUAGE_CODE=='es'): ?>
                  <a href="https://donaciones.fundacionpiesdescalzos.com/" target="_blank">
                      <img src="<?php bloginfo('template_url')?>/img/misc/cc-es.png" alt="Donaciones">
                  </a>
                <?php else:?>
                  <a href="https://donaciones.fundacionpiesdescalzos.com/?plan=unico&lang=EN" target="_blank">
                      <img src="<?php bloginfo('template_url')?>/img/misc/cc-en.png" alt="Donaciones">
                  </a>
                <?php endif; ?>

              </figure>
            </div>
            <div class="item logo-2">
              <figure class="logo logo-2">
               <!-- <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                  <input name="cmd" type="hidden" value="_s-xclick">
                  <input name="hosted_button_id" type="hidden" value="CCX6EF3MFC7W8">
                  <input alt="PayPal - The safer, easier way to pay online!" class="img-btn" name="submit" src="<?php bloginfo('template_url')?>/img/logos/paypal.png" type="image"><img src="<?php bloginfo('template_url')?>/img/logos/paypal.png" alt="" width="1" height="1" border="0">
                </form>-->



          <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_donations" />
<input type="hidden" name="business" value="tesoreria@fpd.ong" />
<input type="hidden" name="item_name" value="ayudar niños" />
<input type="hidden" name="currency_code" value="USD" />
<input type="image" src="<?php bloginfo('template_url')?>/img/misc/pp-en.png" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
<img alt="" border="0" src="https://www.paypal.com/en_CO/i/scr/pixel.gif" width="1" height="1" />
</form>




              </figure>
            </div>

          </div>
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
          <?php
          //loop impact items
          while (have_rows('campanas')):the_row();
          ?>
          <div class="campaña">
            <header>
              <h3>  <?php the_sub_field('titulo_campana');?></h3>
            </header>
            <div class="content row">
              <div class="col-md-6">
               <img src="<?php the_sub_field('imagen_campana');?>" alt="">
              </div>

              <div class="col-md-6 info">
                  <?php the_sub_field('info_campana');?>
              </div>
            </div>
            <div class="row progress progress-striped active">
              <div class="progress-bar" role="progressbar"
                   aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"
                   style="width: <?php the_sub_field('porcentaje_donacion'); ?><?php echo "%"; ?>">
                   <p></p>
              </div>
            </div>
            <div class="meta">
              <p>$<?php the_sub_field('valor_meta'); ?> UDS</p>
            </div>
          </div>
          <?php
          endwhile;
          ?>
        </div>
        <div id="menu1" class="tab-pane fade">
          <div class="pay-btns">
            <header>
              <?php if(ICL_LANGUAGE_CODE=='es'): ?>
                <h3>Elige cómo donar</h3>
              <?php else:?>
                <h3>SELECT HOW TO LEAVE YOUR FOOTPRINT</h3>
              <?php endif; ?>
            </header>

            <div class="item logo">
              <figure class="logo logo-1">

                <?php if(ICL_LANGUAGE_CODE=='es'): ?>
                  <a href="https://donaciones.fundacionpiesdescalzos.com/" target="_blank">
                      <img src="<?php bloginfo('template_url')?>/img/misc/cc-es.png" alt="Donaciones">
                  </a>
                <?php else:?>
                  <a href="https://donaciones.fundacionpiesdescalzos.com/?plan=unico&lang=EN" target="_blank">
                      <img src="<?php bloginfo('template_url')?>/img/misc/cc-en.png" alt="Donaciones">
                  </a>
                <?php endif; ?>

              </figure>
            </div>
            <div class="item logo-2">
              <figure class="logo logo-2">
               <!-- <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                  <input name="cmd" type="hidden" value="_s-xclick">
                  <input name="hosted_button_id" type="hidden" value="CCX6EF3MFC7W8">
                  <input alt="PayPal - The safer, easier way to pay online!" class="img-btn" name="submit" src="<?php bloginfo('template_url')?>/img/logos/paypal.png" type="image"><img src="<?php bloginfo('template_url')?>/img/logos/paypal.png" alt="" width="1" height="1" border="0">
                </form>-->



          <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
        <input type="hidden" name="cmd" value="_donations" />
        <input type="hidden" name="business" value="tesoreria@fpd.ong" />
        <input type="hidden" name="item_name" value="ayudar niños" />
        <input type="hidden" name="currency_code" value="USD" />
        <input type="image" src="<?php bloginfo('template_url')?>/img/misc/pp-en.png" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
        <img alt="" border="0" src="https://www.paypal.com/en_CO/i/scr/pixel.gif" width="1" height="1" />
        </form>




              </figure>
            </div>

          </div>
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
          <?php
          //loop impact items
          while (have_rows('campanas')):the_row();
          ?>
          <div class="campaña">
            <header>
              <h3>  <?php the_sub_field('titulo_campana');?></h3>
            </header>
            <div class="content row">
              <div class="col-md-6">
               <img src="<?php the_sub_field('imagen_campana');?>" alt="">
              </div>

              <div class="col-md-6 info">
                  <?php the_sub_field('info_campana');?>
              </div>
            </div>
            <div class="row progress progress-striped active">
              <div class="progress-bar" role="progressbar"
                   aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"
                   style="width: <?php the_sub_field('porcentaje_donacion'); ?><?php echo "%"; ?>">
                   <p></p>
              </div>
            </div>
            <div class="meta">
              <p>$<?php the_sub_field('valor_meta'); ?> UDS</p>
            </div>
          </div>
          <?php
          endwhile;
          ?>

        </div>
        <div id="menu2" class="tab-pane fade">
          <div class="first text-body">
            <?php the_field('texto_introductorio_3');?>
          </div>
          <!--/texto intro-->
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
          <?php
          //loop impact items
          while (have_rows('campanas')):the_row();
          ?>
          <div class="campaña">
            <header>
              <h3>  <?php the_sub_field('titulo_campana');?></h3>
            </header>
            <div class="content row">
              <div class="col-md-6">
               <img src="<?php the_sub_field('imagen_campana');?>" alt="">
              </div>

              <div class="col-md-6 info">
                  <?php the_sub_field('info_campana');?>
              </div>
            </div>
            <div class="row progress progress-striped active">
              <div class="progress-bar" role="progressbar"
                   aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"
                   style="width: <?php the_sub_field('porcentaje_donacion'); ?><?php echo "%"; ?>">
                   <p></p>
              </div>
            </div>
            <div class="meta">
              <p>$<?php the_sub_field('valor_meta'); ?> UDS</p>
            </div>
          </div>
          <?php
          endwhile;
          ?>
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


<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
	<input type="hidden" name="cmd" value="_s-xclick">
	<input type="hidden" name="hosted_button_id" value="PWB6UN48DFYJL">
	<select name="os0" style="width: 90%; display: block; margin-bottom: 20px;">
		<option value="10.00">10.00 : $10.00 USD - mensual</option>
		<option value="35.00">35.00 : $35.00 USD - mensual</option>
		<option value="50.00">50.00 : $50.00 USD - mensual</option>
		<option value="100.00">100.00 : $100.00 USD - mensual</option>
	</select>
	<input type="hidden" name="currency_code" value="USD">
	<input type="image" src="<?php bloginfo('template_url')?>/img/misc/button-donate.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
	<img src="<?php bloginfo('template_url')?>/img/misc/button-donate.png" alt="" width="1" height="1" border="0">
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
