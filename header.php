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

            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <!--
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link disabled">Disabled</a>
                </li>
              </ul>
            </div>
            -->';

              wp_nav_menu(
                array(
                  // 'theme_location'  => 'headerMenu',
                  'menu_id'         => 'primary-menu',
                  'menu_class'      => 'navbar-nav ms-auto mb-2 mb-lg-0',
                  'before'          => '<div class="collapse navbar-collapse" id="navbarTogglerDemo03">',
                  'after'           => '</div>',
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

  
    <!-- <nav id="nav" class="navbar <?php // echo ( !is_front_page() ? 'navbar-not-front' : ''  ); ?> fixed-top navbar-expand-lg">
        
          <div class="container">
            <a class="navbar-brand logo-container" href="<?php // echo esc_url( home_url( '/' ) ); ?>">
              <?php // bdacLogo(90); ?>
            </a>
            <button class="navbar-toggler navbar-light ms-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
              <?php //
                  // wp_nav_menu(
                  //   array(
                  //     'theme_location'  => 'headerMenu',
                  //     'menu_id'         => 'primary-menu',
                  //     'menu_class'      => 'navbar-nav',
                  //     'before'          => '<div class="menu-primary-menu-container">',
                  //     'after'           => '</div>',
                  //     'walker'          => new wp_bootstrap_navwalker()
                  //   )
                  // );
              ?>
            </div>
          </div>
          <div class="donate-area d-none d-lg-flex">
            <div class="header-donation">
              <a href="#" target="_blank" class="btn btn-bdac-donation">
                  Donate To BDAC
              </a>
            </div>
          </div>
      </nav> -->