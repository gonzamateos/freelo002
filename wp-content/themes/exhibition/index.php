<?php get_header(); ?>


<!-- NHP Option Global -->
<?php global $NHP_Options; ?>
	
<!-- Main Banner -->
<div class="slider_container">

        <!-- Main Banner Slider -->


         <!-- Slideshow 1 -->
          <ul class="rslides" id="slider1">

          		<!-- Slideshow Loop -->
				<?php 
				$the_query = new WP_Query('post_type="slider"');
				// The Loop
				while ( $the_query->have_posts() ) : $the_query->the_post();
				?>
				<?php
				$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) )
				?>
				<li style="background:url('<?php echo $url; ?>') center center no-repeat; 
				          -webkit-background-size: cover;
				          -moz-background-size: cover;
				        -o-background-size: cover;
				  background-size: cover;" title="<?php the_title(); ?>"></li>   
				<?php endwhile; ?>

		</ul>
   
        <!-- End Main Banner Slider -->

        <!-- Main Banner Info -->
        <div class="container-full">
            <header class="section row nomargin">
              <div class="banner-info col four tablet-six mobile-full">
                
                <!-- Logo -->
                <div class="logo section"><a href="<?php echo home_url(); ?>">  
                    <img src="<?php $NHP_Options->show('logo'); ?>" />
                </a></div>
                <!-- End Logo -->

                 <?php $NHP_Options->show('main_info'); ?>

                <!-- Sub Navigation -->
                <div class="sub_nav">
                  <ul class="squares">
                    <li class="overview-icon"><a class="scroll" href="#overview"></a></li>
                    <li class="gallery-icon"><a class="scroll" href="#gallery"></a></li>
                    <li class="venue-icon"><a class="scroll" href="#venue"></a></li>
                    <li class="threed-icon"><a class="scroll" href="#tour"></a></li>
                  </ul>
                </div>
                <!-- End Sub Navigation -->
              
              </div>  
            </header>
        </div>
        <!-- End Main Banner Info -->
 
</div>
<!-- End Main Banner -->



    
<!-- Main Banner Controls -->
<div class="section banner-controls">
  <div class="container-full">
      <div id="cbp-bicontrols" class="cbp-bicontrols section row nomargin">
      </div>
  </div>
</div>

<!-- End Main Banner Controls -->


<!-- Overview Section -->
<section id="overview" class="overview">
  <div class="container-full">
        
        <!-- Section Title -->
        <div class="section row nomargin">
              <div class="desktop-full tablet-full mobile-full">
                <h1 class="section-title"><?php $NHP_Options->show('o_title'); ?></h1>
              </div>
        </div>
        <!-- End title -->


        <!-- Content -->
        <div class="section row nomargin">

          <?php $NHP_Options->show('overview'); ?>
        
        </div>
        <!-- End Content -->


        <div class="fluid-padding"></div>



        <!-- Thumbnails -->

        <div class="thumbnail-section section row">
          <!-- Thumb 1 -->
          <div class="col two tablet-two mobile-three nomargin">
          <img class="thumbs thumb1" src="<?php $NHP_Options->show('image1'); ?>" alt="image01"/>
          </div>
           <!-- Thumb 2 -->
          <div class="col two tablet-two mobile-three nomargin">
          <img class="thumbs thumb2" src="<?php $NHP_Options->show('image2'); ?>" alt="image01"/>
          </div>
           <!-- Thumb 3 -->
          <div class="col two tablet-two mobile-three nomargin">
          <img class="thumbs thumb3" src="<?php $NHP_Options->show('image3'); ?>" alt="image01"/>
          </div>
           <!-- Thumb 4 -->
          <div class="col two tablet-two mobile-three nomargin">
          <img class="thumbs thumb4" src="<?php $NHP_Options->show('image4'); ?>" alt="image01"/>
          </div>
           <!-- Thumb 5 -->
          <div class="col two tablet-two nomobile nomargin">
          <img class="thumbs thumb5" src="<?php $NHP_Options->show('image5'); ?>" alt="image01"/>
          </div>
           <!-- Thumb 6 -->
          <div class="col two tablet-two nomobile nomargin">
          <img class="thumbs thumb6" src="<?php $NHP_Options->show('image6'); ?>" alt="image01"/>
          </div>


        </div>


        <!-- End Thumbnails -->

  </div>
</section>
<!-- End Overview Section -->


<!-- Gallery Section -->
<section id="gallery" class="gallery-section">
  <div class="container-full">
     
        <!-- Section Title -->
        <div class="section row nomargin">
              <div class="desktop-full tablet-full mobile-full">
                <h1 class="section-title white"><?php $NHP_Options->show('g_title'); ?></h1>
              </div>
        </div>
        <!-- End title -->
  
    <div class = 'fluidHeight'>                            
     <div class = 'sliderContainer'>        
        <div class = 'iosSlider'>    
          <div class = 'slider'>


          	<?php 
				$the_query = new WP_Query(array( 'post_type'=> 'main_gallery', 'posts_per_page' => -1 ));
				// The Loop
				while ( $the_query->have_posts() ) : $the_query->the_post();
				?>
				<?php
				$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) )
				?>


				 <div class = 'item active'>  
              			<a class="img_wrapper">  
                			<img src="<?php echo $url; ?>" alt="<?php the_title(); ?>">
			                <div class="caption">
			                  <h5><?php the_title(); ?></h5>
			                  <h6><?php the_content(); ?></h6>
			                </div>
             			</a>
           		</div>
			

				<?php endwhile; ?>
          
          </div>  
        </div>
      </div>
    </div>
</div>
<div class='controls-gallery touch next'></div>
<div class='controls-gallery touch prev'></div>
</section>
<!-- End Gallery Section -->






 





<!-- Venue Section -->
<section id="venue" class="venue-section">
  <div class="container-full">


      <!-- Venue Info -->
     <div class="section row nomargin">

          <!-- Ghost Columns -->
          <div class="col ghost-col four tablet-six mobile-full"></div>
          <div class="col ghost-col four tablet-six mobile-full"></div>

          <div class="venue-info col four tablet-six mobile-full nomargin"> 
          <!-- Title -->
          <h1 class="section-title white"><?php $NHP_Options->show('v_title'); ?></h1>
          <!-- Pin -->
          <div class="pin_venue"></div>
          <!-- Details -->
          <div class="details_info">
              <div class="address">
                <?php $NHP_Options->show('venue'); ?>
              </div>
              <div class="distance">
                <h6 id="you_are"></h6>
                <h3 id="distance"></h3>
                <h6>need directions?</h6>
              </div>
               <div class="custom-select">
               <select id="mode" onchange="calcRoute();">
                  <option value="DRIVING">Driving</option>
                  <option value="WALKING">Walking</option>
                  <option value="BICYCLING">Bicycling</option>
                  <option value="TRANSIT">Transit</option>
               </select>
              </div>
          </div>
          <!-- End Details -->

          
          </div>
      </div>
      <!--End Venue Info --> 

    </div>
    <!-- End Container -->

   <!-- Map / Your coordinates here -->
    <div id="map" data-lat="<?php $NHP_Options->show('latitude'); ?>" data-long="<?php $NHP_Options->show('longitud'); ?>"></div>
    <!-- End Map -->


  </section>
<!-- End Venue Section -->








<!-- Sponsors Section -->
<section class="sponsors-section">
<div class="container-full">

       <!-- Section Title -->
        <div class="section row nomargin">
        <div class="desktop-full tablet-full mobile-full">
                <h1 class="section-title"><?php $NHP_Options->show('s_title'); ?></h1>
              </div>
        </div>
        <!-- End title -->


  <div class='fluidHeight_sponsors'>                            
     <div class='sliderContainer'>        
        <div class ='iosSlider_sponsors'>    
          <div class='sponsor'>
         
            
          		<!-- Sponsors Loop -->
				<?php 
				$the_query = new WP_Query('post_type="sponsors"');
				// The Loop
				while ( $the_query->have_posts() ) : $the_query->the_post();
				?>
				<?php
				$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) )
				?>

				<div class = 'item'>       
                	<a class="img_wrapper">  
                		<img src="<?php echo $url; ?>" alt="<?php the_title(); ?>">
                	</a>
            	</div>
				
				<?php endwhile; ?>
          
            
            </div> <!-- End sponsor -->
          
          </div> <!-- End ioSlider_sponsor -->  
        </div> <!-- End sliderContainer -->
      </div> <!-- End Fluidwith -->
  

</div>
<!-- End Container --> 

<div class='controls-sponsors next'></div>
<div class='controls-sponsors prev'></div>

</section>
<!-- End Sponsors Section -->




<!-- 3d Gallery Section -->
<section id="tour" style="background:url('<?php $NHP_Options->show('3d_image'); ?>') center center no-repeat; 
                                                         -webkit-background-size: cover;
                                                            -moz-background-size: cover;
                                                              -o-background-size: cover;
                                                               background-size: cover;" class="threed-section">
  <div class="container-full">

    <h5><?php $NHP_Options->show('3d_text'); ?></h5>
    <a class="btn" href="<?php $NHP_Options->show('3d_link'); ?>"><?php $NHP_Options->show('3d_button_text'); ?></a>

  </div>
</section>
<!-- End 3d Gallery Section -->

<?php get_footer(); ?>