<?php get_header(); ?>

  <div class="contentTopWrap">
    <p>CONTENT TOP</p>
  </div>

<div class="pageWrap">    
    <div class="contentWrap">
        <div class="contentArea">
            <?php the_content(); ?>

                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <?php endwhile; else: ?>    
                    <p><?php _e( 'Sorry, no content found' ); ?></p>
                <?php endif; ?>

        </div><!-- /contentArea -->

    </div><!-- /contentWrap -->
</div><!-- /pageWrap -->

<?php get_footer(); ?>