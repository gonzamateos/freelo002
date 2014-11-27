<?php get_header(2); ?>
	
	<!-- section -->
	<section class="container-full" role="main">

	<div class="section row nomargin">
	<div class="col twelve tablet-full mobile-full">

	
	
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>


	<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ) ?>
	 
	 <!-- title & BG thumb -->
	 <div class="wp-thumbnail" style="background:url('<?php echo $url; ?>') center center no-repeat; 
				          	-webkit-background-size: cover;
				            -moz-background-size: cover;
				            -o-background-size: cover;
				  			background-size: cover;" title="<?php the_title(); ?>">

		<h1><?php the_title(); ?></h1>
	</div> 

	
		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
			<?php the_content(); ?>
			
			
		</article>
		<!-- /article -->
		
	<?php endwhile; ?>
	
	<?php endif; ?>


	</div>
	</div>
	</section>
	<!-- /section -->
	

<?php get_footer(); ?>