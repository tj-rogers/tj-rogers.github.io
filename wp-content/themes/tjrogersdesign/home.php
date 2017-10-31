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

                    <?php the_post_thumbnail(); ?>
                    
                    <a href="<?php the_permalink(); ?>" class="blog-listing-teaser-image" style="background-image: url(<?php echo get_the_post_thumbnail()['url']; ?>);"></a>
                    
                    <h2 class="blog-listing-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                    <p class="blog-listing-meta">Written on <?php the_time('F j, Y'); ?></p>
                    
                    <?php the_excerpt(); ?>
                    
                    <p class="blog-article-more">
                        <a class="btn" href="<?php the_permalink(); ?>">Read Full Article</a>
                    </p>
                    
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