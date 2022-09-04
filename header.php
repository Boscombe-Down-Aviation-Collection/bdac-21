<?php
/**
 * Header file for the BDAC 2022 theme.
 */

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	  <?php 
      wp_head();
    ?>
  </head>

  <?php 
  
  echo '
  
    <body ';
      body_class();
    echo '>
    
    <!-- Header -->
      <header id="header" class="header fixed-top">
        <div class="header-social d-none d-md-flex flex-row ">
            <div class="container d-flex justify-content-between align-items-center">
              <div class="header-social-opening">
                <p class="header-social-opening-hours bdac-colour-white m-0">
                  <span class="header-social-opening-hours-current">';

                      bdac_is_open();

                echo '
                  </span>
                  <span class="header-social-opening-hours-weather">
                  </span>
                </p>
              </div>

              <div class="header-social-links d-none d-md-block text-right">
                <a href="https://facebook.com/Fastjetcockpits" target="_blank">
                  <i class="fab fa-facebook"></i>
                </a>
                <a href="https://twitter.com/bdacatoldsarum" target="_blank">
                  <i class="fab fa-twitter"></i>
                </a>
                <a href="https://instagram.com/bdacatoldsarum" target="_blank">
                  <i class="fab fa-instagram"></i>
                </a>
                <a href="https://www.youtube.com/channel/UCI9Ana6f0kgVEGPPXzoULBg" target="_blank">
                  <i class="fab fa-youtube"></i>
                </a>
                <a href="https://tripadvisor.co.uk/Attraction_Review-g186414-d3310055-Reviews-Boscombe_Down_Aviation_Collection-Salisbury_Wiltshire_England.html?m=19905" target="_blank">
                  <i class="fab fa-tripadvisor"></i>
                </a>
              </div>
            </div>
        </div>

        <nav class="navbar' . ( 
                                !is_front_page() ? 
                                ' navbar-not-front' : 
                                ''  
                              ) . ' navbar-expand-lg">
          <div class="container-fluid">
            
            <a class="navbar-brand logo-container" href="' . esc_url( home_url( '/' ) ) . '">';

              bdacLogo(90);

          echo '
            </a>

            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#bdacMainMenu" aria-controls="bdacMainMenu" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>';

              wp_nav_menu(
                array(
                  'theme_location'  => 'primary_menu',
                  'container_id'    => 'bdacMainMenu',
                  'container_class' => 'collapse navbar-collapse',
                  'menu_id'         => '',
                  'menu_class'      => 'navbar-nav ms-auto mb-2 mb-lg-0',
                  'walker'          => new wp_bootstrap_navwalker()
                )
              );
            
          echo '
            <a href="#" target="_blank" class="btn btn-bdac d-none d-md-block">
                  Donate To BDAC
              </a>
            
          </div>
        </nav>
      </header>

      <main id="main' . ( !is_front_page() ? '-alt' : ''  ) . '" >
    
  ';
?>
