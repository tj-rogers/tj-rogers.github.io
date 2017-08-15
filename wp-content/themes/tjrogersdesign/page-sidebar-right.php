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
            <?php the_content(); ?>

                <h2>MAIN CONTENT</h2>

                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <?php endwhile; else: ?>    
                    <p><?php _e( 'Sorry, no content found' ); ?></p>
                <?php endif; ?>

        </div><!-- /contentArea -->

        <!-- Right Sidebar Section -->
        <div class="sidebar-area">
            <?php the_content(); ?>

                <h2>SIDEBAR</h2>

                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <?php endwhile; else: ?>    
                    <p><?php _e( 'Sorry, no content found' ); ?></p>
                <?php endif; ?>

        </div><!-- /sidebar-area -->

    </div><!-- /contentWrap -->
</div><!-- /pageWrap -->

<?php get_footer(); ?>