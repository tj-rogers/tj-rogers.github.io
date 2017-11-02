<?php get_header(); ?>

<div class="pageWrap">    
    <div class="contentWrap">
        <!-- ContentArea -->
        <div class="content-area has-sidebar">

            <div class="post-listing">
            
                <?php if ( have_posts() ) : while (have_posts() ) : the_post(); ?>
            
                <div class="post-item">

                    <?php edit_post_link( '<i class="fa fa-pencil-square-o"></i>', '<p>', '</p>', '', 'btn btn-sm blog-listing-edit' ); ?>

                    <p class="post-listing-thumb"><?php // the_post_thumbnail('blogFeatImgCrop'); ?></p>
                    
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

        <div class="sidebar-area">
            <?php dynamic_sidebar( 'right-sidebar' ); ?>
        </div><!-- /sidebar-area -->

    </div><!-- /contentWrap -->
</div><!-- /pageWrap -->

<div class="content-bottom-wrap">
    <div class="content-bottom">
        <?php dynamic_sidebar( 'content-bottom' ); ?>
    </div>
</div>

<div class="prefooter">  
    <?php dynamic_sidebar( 'prefooter' ); ?>
</div>

<?php get_footer(); ?>