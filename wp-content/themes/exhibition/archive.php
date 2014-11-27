<?php get_header(2); ?>
        
</section>



<?php the_post(); ?>

<!-- Post Page Wrapper -->
<div class="section page-single container">

<div id="post-<?php the_ID(); ?>" class="section row row-one nopadding">



<div class="section row row-one nomargin">


<!-- Title -->
<h1 class="title-blog section row row-one nomargin"><?php _e( 'Archives', 'html5blank' ); ?></h1>


<!-- article -->
<div class="no-margin col nine tablet-full mobile-full pr40">


                        <?php while (have_posts()) : the_post(); ?> 

                        
                                <article class="section row row-one nomargin nopadding post-space">


                                        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                                                <!-- Picture -->

                                                <div class="col five tablet-five mobile-full nomargin">
                                                <a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>" rel="<?php the_ID(); ?>">
                                                <div class="post-thumb"><?php the_post_thumbnail('blog-thumbnail'); ?></div>
                                                </a>
                                                </div>


                                                <!-- Entry Meta -->
                                                <div class="col seven tablet-seven mobile-full nomargin post-holder">
                                                <div class="row entry-meta nomargin">

                                                        <!-- Meta Data -->
                                                        <div class="col twelve tablet-full mobile-full nomargin nopadding">


                                                                <!-- Title -->
                                                                <span class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title_attribute(); ?></a></span>
                                                                
                                                                <!-- Entry -->
                                                                <div class="entry-time"><span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>-<span>Written by <?php the_author(); ?></span></div>

                                                        </div>
                                                </div>

                        

                                                <!-- Content -->

                                                <div class="entry-content">
                                                <?php the_excerpt() ;?>

                                                </div>
                                        </div>

                                        </div>

        
                        
                                                

                                </article> 
                                        

                                <?php endwhile; ?>

</div>
<div class="col three tablet-eleven mobile-full no-margin">
<!-- Sidebar -->
<?php get_sidebar(); ?>

</div>
</div>






</div>
</div>
<!-- Post Page Wrapper Ends -->


<?php get_footer(); ?>