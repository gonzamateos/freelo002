<!-- NHP Option Global -->
<?php global $NHP_Options; ?>

<?php 

/*
Template Name: 3D Gallery
*/

?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html lang="en" class="no-js ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html lang="en" class="no-js ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html lang="en" class="no-js ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class='no-js' <?php language_attributes(); ?>>
<!--<![endif]-->
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

		<div class="container-tour">	
			
			<!-- Menu -->


			<div class="left-menu">
			<div id="nav" class="close">
			<!-- Logo -->
			<div class="logo section 3d"><a href="<?php echo home_url(); ?>">
			   <img src="<?php $NHP_Options->show('logo'); ?>" />
			</a></div>
			<!-- End Logo -->

			<!-- Navigation -->
        		<nav id="menu" role="navigation">
        			      <?php wp_nav_menu( array( 
				          'theme_location'  => 'gallery-nav',
				          'container'       => false, 
				          'container_class' => 'menu-{menu slug}-container', 
				          'menu_class'      => 'menu',
				          ) ); ?>
				</nav>
      		</div>
			<div id="click" class="no-active"></div>
			</div>
      		<!-- Menu -->
		
			
			<div id="gr-gallery" class="gr-gallery">
				<div class="gr-main">


					<!-- 3d Gallery Loop-->

					<?php 
						$the_query = new WP_Query(array( 'post_type'=> '3d_gallery', 'posts_per_page' => -1 ));
						// The Loop
						while ( $the_query->have_posts() ) : $the_query->the_post();
						?>
						<?php
						$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) )
						?>

						<figure>
							<div>
								<img src="<?php echo $url; ?>" alt="<?php the_title(); ?>" />
							</div>
							<figcaption>
								<h2><span><?php the_title(); ?></span></h2>
								<div><p><?php the_content(); ?></p></div>
							</figcaption>
						</figure>
				
				<?php endwhile; ?>
					
					
				</div>
			</div>
		</div><!-- /container -->

		<!-- analytics -->
		<script>
			$(function() {
				Gallery.init();
			});
		</script>


		<script>
		var _gaq=[['_setAccount',' <?php $NHP_Options->show('ga'); ?>'],['_trackPageview']];
		(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
		g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
		s.parentNode.insertBefore(g,s)})(document,'script');
		</script>
		
	<?php wp_footer(); ?>
	</body>
</html>