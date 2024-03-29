<?php
/**
 * Header file for the BDAC 2022 theme.
 */
$post_ID   = get_the_ID();
$page_link = get_permalink( $post_ID );

?>
<!DOCTYPE html>
<html lang="en">
	<head>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-W6FWPFG');</script>
    <!-- End Google Tag Manager -->
    
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">	 
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?> RSS2 Feed" href="<?php bloginfo( 'rss2_url' ); ?>" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link rel="canonical" href="<?php echo $page_link; ?>" />
		<title><?php wp_title(); ?></title>

		<?php wp_head(); ?>
	</head>
  
    <body <?php body_class(); ?>>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W6FWPFG"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    
    <!-- Header -->
      <header id="header" class="header fixed-top">
        <?php get_template_part( 'template-parts/header', 'social' ); ?>
        <nav class="navbar<?php echo ( !is_front_page() ? ' navbar-not-front ' : ' '  ); ?> navbar-expand-lg">
          <div class="container-fluid">
            <a class="navbar-brand logo-container" href="<?php echo esc_url( home_url( '/' ) ); ?>">
              <?php bdacTheme::svg( 'logo' ); ?>
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
            
            echo sprintf(
                '<a href="%1$s" target="%2$s" class="btn btn-bdac btn-bdac-donate d-none d-lg-block">%3$s</a>',
                'https://www.paypal.com/donate?token=KgqvS-KTyadrJwSlzBJbyOgiVPF8CwvDyIu7SBNdI4KjVWyRcVtReASFDckoaxhXuY0F7H2KBGon8Te_',
                '_blank',
                'Donate To BDAC'
            );
            ?>
            <!-- d-none d-md-block -->
          </div>
        </nav>
      </header>

      <main id="main<?php echo ( !is_front_page() ? '-alt' : ''  ); ?>" >
