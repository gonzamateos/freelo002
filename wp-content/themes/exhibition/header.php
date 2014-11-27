<!DOCTYPE html>
<!--[if lt IE 7]> <html lang="en" class="no-js ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html lang="en" class="no-js ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html lang="en" class="no-js ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class='no-js' <?php language_attributes(); ?>>
<!--<![endif]-->
<!-- NHP Option Global -->
<?php global $NHP_Options; ?>
  <head>
    	<meta charset="<?php bloginfo('charset'); ?>">
   		 <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
		
		<!-- dns prefetch -->
		<link href="//www.google-analytics.com" rel="dns-prefetch">
		
		<!-- meta -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta content='width=device-width, initial-scale=1.0' name='viewport' />
		<meta name="description" content="<?php bloginfo('description'); ?>">
	 <!-- icons -->
		<link href="<?php $NHP_Options->show('favicon'); ?>" rel="shortcut icon">
	 <!-- css + javascript -->
		<?php wp_head(); ?>
   </head>
<body <?php body_class(); ?>>


<!-- Navigation -->
<div class="navigation-container">
    <div class="container-full">
    <section class="section row nomargin">

    <div class="col four tablet-six mobile-full">
    </div>

    <div class="nav_wrapper nomargin col eight tablet-six mobile-full">

     
      <div class="cart_list close" id="cart">
        <nav id="menu" class="menu" role="navigation">

          <?php wp_nav_menu( array( 
          'theme_location'  => 'header-nav',
          'container'       => false, 
          'container_class' => 'menu-{menu slug}-container', 
          'menu_class'      => 'menu',
          ) ); ?>

        </nav>
      </div>

      <div id="clickme" class="no-active">
      </div>
    
    </div>
    

    </section>
    </div>
</div>

<!-- End Navigation -->