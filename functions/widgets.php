<?php

function bst_widgets_init() {

  /*
  Sidebar (one widget area)
   */
  register_sidebar( array(
    'name'            => __( 'Sidebar', 'bst' ),
    'id'              => 'sidebar-widget-area',
    'description'     => __( 'The sidebar widget area', 'bst' ),
    'before_widget'   => '<section class="%1$s %2$s">',
    'after_widget'    => '</section>',
    'before_title'    => '<h4>',
    'after_title'     => '</h4>',
  ) );

  /*
  Footer (three widget areas)
   */
  register_sidebar( array(
    'name'            => __( 'Footer', 'bst' ),
    'id'              => 'footer-widget-area',
    'description'     => __( 'The footer widget area', 'bst' ),
    'before_widget'   => '<div class="%1$s %2$s col-sm-4">',
    'after_widget'    => '</div>',
    'before_title'    => '<h4>',
    'after_title'     => '</h4>',
  ) );

}
add_action( 'widgets_init', 'bst_widgets_init' );

// Recent post overwrite
/**
 * Extend Recent Posts Widget
 *
 * Adds different formatting to the default WordPress Recent Posts Widget
 */

 Class My_Recent_Posts_Widget extends WP_Widget_Recent_Posts {

  function widget($args, $instance) {

    extract( $args );

    $title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts') : $instance['title'], $instance, $this->id_base);

    if( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
      $number = 10;

    global $post;

    $r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish','post__not_in' => array( $post->ID ), 'ignore_sticky_posts' => true ) ) );
    if( $r->have_posts() ) :

      echo $before_widget;
      if(ICL_LANGUAGE_CODE=='es'): ?>
      <header>
        <h5>
        Entradas recientes
      </h5>
      </header>
      <?php else: ?>
        <header>
          <h5>
          Recent posts
        </h5>
        </header>

      <?php endif;?>
      <div class="posts-sidebar">
        <?php while( $r->have_posts() ) : $r->the_post();

          $def = '#d84e65';
          $color = get_field('color_item');
          $hover;

          if ($color) {
            $hover = get_field('color_item');
          } else {
            $hover = $def;
          }

          ?>


          <article class="posts-sidebar--item">
            <div class="posts-sidebar--overlay">
              <span class="overlap-bg" style="background-color: <?php echo $hover; ?>"></span>

            </div>
            <figure class="posts-sidebar--thumb" style="background-image:url('<?php the_post_thumbnail_url('medium'); ?>')">
              <a href="<?php the_permalink(); ?>"></a>
              <div class="posts-sidebar--caption">
                <p>
                  <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                  </a>
                </p>

              </div>
            </figure>

            <?php if(ICL_LANGUAGE_CODE=='es'): ?>
              <h4>
                Publicado el <?php the_time('j F, Y'); ?>
              </h4>
            <?php else: ?>
              <h4>
                Posted on <?php the_time('j F, Y'); ?>
              </h4>
            <?php endif;?>

            <hr>
          </article>

        <?php endwhile; ?>
        <div class="ver-mas">
          <?php if(ICL_LANGUAGE_CODE=='es'): ?>
            <h6><a href="<?php bloginfo('url')?>/noticias">ver más</a></h6>
          <?php else: ?>
            <h6><a href="<?php bloginfo('url')?>/noticias">See more</a></h6> 
          <?php endif; ?>
        </div>

      </div>

      <?php
      echo $after_widget;

    wp_reset_postdata();

    endif;
  }
}
function my_recent_widget_registration() {
  unregister_widget('WP_Widget_Recent_Posts');
  register_widget('My_Recent_Posts_Widget');
}
add_action('widgets_init', 'my_recent_widget_registration');
