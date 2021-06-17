<?php
/**
 * Header file for the MyGym 2020 theme.
 */

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
    <!-- Header -->
    <nav id="nav" class="navbar <?php echo ( !is_front_page() ? 'navbar-not-front' : ''  ); ?> fixed-top navbar-expand-lg">
      <div class="header-social d-none d-md-block ">
        <div class="container">
        <div class="header-opening">
          <p class="header-opening-hours bdac-colour-white m-0">
            <span class="header-opening-hours-current">
              <?php 
                $today = date('Y M jS');
                $args = array(  
                    'post_type'         => 'opening_hours',
                    'post_status'       => 'publish',
                    'posts_per_page'    => 1,
                    'meta_key'          => 'season_to',
                    'orderby'           => 'meta_value',
                    'order'             => 'ASC',
                    'meta_query'        => array(
                        array(
                            'key'       => 'season_to',
                            'compare'   => '>=',
                            'value'     => $today
                        )
                    )
                );

                $seasons = new WP_Query( $args ); 
                    
                while ( $seasons->have_posts() ) : $seasons->the_post(); 

                    $checkDay       = date('w');
                    $checkHour      = date('ga');
                    $seasonTitle    = get_the_title();
                    $seasonStart    = get_field( 'season_from' );
                    $seasonEnd      = get_field( 'season_to' );
                    $dateEnd        = get_field( 'season_to' );
                    $dayOpen        = get_field( 'season_opening' );
                    $dayClose       = get_field( 'season_closing' );
                    $dayEntry       = get_field( 'season_entry' );
                    $weekStart      = get_field( 'season_start' );
                    $weekEnd        = get_field( 'season_end' );

                    echo ( 
                      $checkHour < $dayOpen || $checkHour >= $dayClose ? 
                      '<strong>Collection Closed</strong>, open ' . ( 
                        $checkDay == 7 ? 
                        $weekStart . ' - ' . $weekEnd : ( 
                          $checkHour > $dayClose ? 
                          'Today' : 
                          'Tomorrow'
                        ) ) . ' ' . $dayOpen . ' - ' . $dayClose : 
                      '<strong>Collection Open</strong> ' . $dayOpen . ' - ' . $dayClose 
                    );
                endwhile;

                wp_reset_postdata(); 
              ?>
            </span>
            <span class="header-opening-hours-weather"></span>
          </p>
        </div>
          <div class="header-social-links d-none d-md-block ml-auto">
            <a href="https://facebook.com/Fastjetcockpits" target="_blank"><i class="fab fa-facebook"></i></a>
            <a href="https://twitter.com/bdacatoldsarum" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="https://instagram.com/bdacatoldsarum" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="https://www.youtube.com/channel/UCI9Ana6f0kgVEGPPXzoULBg" target="_blank"><i class="fab fa-youtube"></i></a>
            <a href="https://tripadvisor.co.uk/Attraction_Review-g186414-d3310055-Reviews-Boscombe_Down_Aviation_Collection-Salisbury_Wiltshire_England.html?m=19905" target="_blank"><i class="fab fa-tripadvisor"></i></a>
          </div>
        </div>
      </div>
      <div class="container">
        <a class="navbar-brand logo-container" href="<?php echo esc_url( home_url( '/' ) ); ?>">
          <?php bdacLogo(90); ?>
        </a>
        <button class="navbar-toggler navbar-light ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <?php
              wp_nav_menu(
                array(
                  'theme_location'  => 'headerMenu',
                  'menu_id'         => 'primary-menu',
                  'menu_class'      => 'navbar-nav',
                  'before'          => '<div class="menu-primary-menu-container">',
                  'after'           => '</div>',
                  'walker'          => new wp_bootstrap_navwalker()
                )
              );
          ?>
        </div>
      </div>
      <div class="donate-area d-none d-lg-block">
        <div class="header-donation">
          <a href="#" target="_blank" class="btn btn-bdac-donation">
              Donate To BDAC
          </a>
        </div>
      </div>
    </nav>
    
    <main id="main<?php echo ( !is_front_page() ? '-alt' : ''  ); ?>" >