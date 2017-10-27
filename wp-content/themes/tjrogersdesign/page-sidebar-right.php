<?php get_header(); ?>

<?php 
/*
Template Name: Right Sidebar 
*/
 ?>

  <div class="contentTopWrap">
    <p>CONTENT TOP</p>
  </div>

<div class="pageWrap">    
    <div class="contentWrap">
        <!-- ContentArea -->
        <div class="content-area">
            <?php the_title( '<h1>', '</h1>' ); ?>

            <?php the_content(); ?>               

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <?php endwhile; else: ?>    
                <p><?php _e( 'Sorry, no content found' ); ?></p>
            <?php endif; ?>

        </div><!-- /contentArea -->

        <!-- Right Sidebar Section -->
        <div class="sidebar-area">
            <?php dynamic_sidebar( 'sidebar' ); ?>
        </div><!-- /sidebar-area -->

    </div><!-- /contentWrap -->
</div><!-- /pageWrap -->

<?php get_footer(); ?>