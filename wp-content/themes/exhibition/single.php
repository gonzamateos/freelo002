<?php get_header(2); ?>


</section>

<?php the_post(); ?>

<!-- Post Page Wrapper -->
<div class="section page-single container">

<div id="post-<?php the_ID(); ?>" class="section row row-one nopadding">



<div class="section row row-one nomargin">


<!-- Title -->
<h1 class="title-blog section row row-one nomargin"><?php the_title_attribute(); ?></h1>


<!-- article -->
<div class="no-margin col nine tablet-full mobile-full pr40 post-content-holder">
                        
                                <article class="section row row-one nomargin nopadding">


                                        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                                                <!-- Entry Meta -->
                                                <div class="row entry-meta nomargin">

                                                                                                          
                                                                <!-- Entry -->
                                                                <div class="entry-time"><span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>-<span>Written by <?php the_author(); ?></span></div>

                                                </div>

                        

                                                <!-- Content -->

                                                <div class="entry-content">
                                                <?php the_content() ;?>

                                                </div>

                                        </div>

        
                        
                                                

                                </article>
                                        


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