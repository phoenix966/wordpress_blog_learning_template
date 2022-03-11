<!DOCTYPE html>
	<html class="no-js" <?php language_attributes();?>>
<head>
	<meta charset="<?php bloginfo('charset');?>">
	<title>Sparrow - Free Responsive HTML5/CSS3 Template</title>
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="shortcut icon" href="favicon.ico" >

	<?php wp_head();?>
</head>

<body <?php body_class();?>>
	<?php wp_body_open();?>

   <header>

      <div class="row">

         <div class="twelve columns">

            <div class="logo">
               <a href="<?php echo get_home_url('/');?>">
                  <?php
                     $custom_logo_id = get_theme_mod( 'custom_logo' );
                     $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                      
                     if ( has_custom_logo() ) {
                         echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
                     } else {
                         echo '<h1>' . get_bloginfo('name') . '</h1>';
                     }
                  ?>
               </a>
            </div>

            <nav id="nav-wrap">
               <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show navigation</a>
	            <a class="mobile-btn" href="#" title="Hide navigation">Hide navigation</a>
               <?php
                  wp_nav_menu(
                     array(
                        'theme_location' => 'menu-1',
                        'menu' => 'ul',
                        'container' => 'ul',
                        'container_id' => 'nav',
                        'menu_class' => 'nav',
                        'menu_id' => 'nav',
                        'echo' => true,
                     )
                  );
                  ?>

            </nav>

         </div>

      </div>

   </header>
   
   <!-- Page Title
   ================================================== -->
   <div id="page-title">

      <div class="row">

         <div class="ten columns centered text-center">
            <h1>Our Blog<span>.</span></h1>

            <p>Aenean condimentum, lacus sit amet luctus lobortis, dolores et quas molestias excepturi
            enim tellus ultrices elit, amet consequat enim elit noneas sit amet luctu. </p>
         </div>

      </div>

   </div> <!-- Page Title End-->
