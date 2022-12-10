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
  
    <body <?php body_class(); ?>>
    
    <!-- Header -->
      <header id="header" class="header fixed-top">
        <?php get_template_part( 'inc/template-parts/header-social' ); ?>
        <nav class="navbar<?php echo ( !is_front_page() ? ' navbar-not-front ' : ' '  ); ?> navbar-expand-lg">
          <div class="container-fluid">
            <a class="navbar-brand logo-container" href="<?php echo esc_url( home_url( '/' ) ); ?>">
              <?php echo bdacLogo(90); ?>
            </a>
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#bdacMainMenu" aria-controls="bdacMainMenu" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <?php 
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
            ?>
            <a href="#" target="_blank" class="btn btn-bdac btn-bdac-donate">Donate To BDAC</a>
            <!-- d-none d-md-block -->
          </div>
        </nav>
      </header>

      <main id="main<?php echo ( !is_front_page() ? '-alt' : ''  ); ?>" >
