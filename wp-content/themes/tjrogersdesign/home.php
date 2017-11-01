<?php get_header(); ?>

  <div class="contentTopWrap">
    <p>CONTENT TOP</p>
  </div>

<div class="pageWrap">    
    <div class="contentWrap">
        <!-- ContentArea -->
        <div class="content-area">
            <h1><?php echo get_the_title( get_option('page_for_posts', true) ); ?></h1>

            <div class="post-listing">
            
                <?php if ( have_posts() ) : while (have_posts() ) : the_post(); ?>
            
                <div class="post-item">

                    <?php edit_post_link( '<i class="fa fa-pencil"></i>', '<p>', '</p>', '', 'btn btn-sm blog-listing-edit' ); ?>

                    <p class="post-listing-thumb"><?php the_post_thumbnail('blogFeatImgCrop'); ?></p>
                    
                    <div class="post-item-content">
                        <h2 class="blog-listing-title"><?php the_title(); ?></h2>

                        <p class="blog-listing-meta">Written on <?php the_time('F j, Y'); ?></p>
                        
                        <div class="post-item-article-text">
                            <?php the_excerpt(); ?>
                        </div>
                        
                        <p class="blog-article-more">Read Full Article</p>
                        <a class="post-item-link" href="<?php the_permalink(); ?>">&nbsp;</a>
                    </div>
                    
                </div>
                
                <?php endwhile; endif; ?>
                
            </div>

        </div><!-- /contentArea -->

        <!-- Right Sidebar Section -->
        <div class="sidebar-area">
            <p>SIDEBAR</p>
            <?php dynamic_sidebar( 'sidebar' ); ?>
        </div><!-- /sidebar-area -->

    </div><!-- /contentWrap -->
</div><!-- /pageWrap -->

<?php get_footer(); ?>