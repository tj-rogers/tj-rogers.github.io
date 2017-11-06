<?php get_header(); ?>

<?php 
/*
Template Name: Home Page 
*/
 ?>

<div class="pageWrap">    
    <div class="contentWrap">
        <!-- ContentArea -->
        <div class="content-area">

            <!-- HP PROJECT LISTING -->
            <?php
                $args = array(
                    'post_type' => 'project',
                    'posts_per_page'=>3

                );
                $query = new WP_Query($args);
            ?>

            <div class="project-listing project-listing-hp">

                <?php if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>

                    <div class="project-row">
                        <?php edit_post_link('<i class="fa fa-pencil-square-o" aria-hidden="true"></i>'); ?>      
                        <p class="project-top-border">&nbsp;</p>
                        <div class="project-row-sect project-main-image">
                            <?php the_post_thumbnail('projImgCrop'); ?>
                        </div>
                        <div class="project-row-sect project-info-wrap">
                            <div class="project-info">
                                <div class="project-title">
                                    <?php the_title(); ?>
                                </div>
                                <div class="project-category">
                                    <?php
                                        $terms = get_the_terms( $post->ID , 'project_categories' );
                                        $i = 1;
                                        foreach ( $terms as $term ) {
                                        echo $term->name;
                                        echo ($i < count($terms))? ", " : "";
                                        $i++;
                                    } ?>
                                </div>
                            </div>
                            <p class="project-view">View Project Details <i class="fa fa-caret-right" aria-hidden="true">&nbsp;</i></p>
                        </div><!-- /project-info-wrap -->
                        <a class="project-link" href="<?php the_permalink(); ?>">&nbsp;</a>
                    </div><!-- /view-row -->
                <?php endwhile; endif; wp_reset_postdata(); ?>
                <p><a class="btn more-projects-link" href="/work">See more projects <i class="fa fa-arrow-circle-o-right"></i></a></p>
            </div><!-- /project-listing -->
        </div><!-- /contentArea -->
    </div><!-- /contentWrap -->
</div><!-- /pageWrap -->

<div class="content-bottom-wrap">
    <div class="content-bottom">
        <?php dynamic_sidebar( 'content-bottom' ); ?>

        <!-- HP BLOG LISTING -->
        <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page'=>4

            );
            $query = new WP_Query($args);
        ?>

        <div class="post-listing">
            <?php if ( $query->have_posts() ) : while ($query->have_posts() ) : $query->the_post(); ?>
        
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
            <p><a class="btn more-articles-link" href="/blog">See more artciles <i class="fa fa-arrow-circle-o-right"></i></a></p>
        </div>

        <!-- HP BLOG LISTING -->
        <?php
            $args = array(
                'post_type' => 'client'
                // 'posts_per_page'=>4

            );
            $query = new WP_Query($args);
        ?>

        <div class="client-listing">
            <h2>Brands I've worked with</h2>
            <?php if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>
        
            <div class="client">
                <?php edit_post_link( '<i class="fa fa-pencil-square-o"></i>', '<p>', '</p>', '', 'btn btn-sm blog-listing-edit' ); ?>
                <a class="client-link" href="<?php the_field('client_website'); ?>"><?php the_post_thumbnail('blogFeatImgCrop'); ?></a>                
            </div>
            <?php endwhile; endif; ?>
            <p><a class="btn more-clients-link" href="/clients">See all my clients <i class="fa fa-arrow-circle-o-right"></i></a></p>
        </div>

    </div>
</div>

<div class="prefooter">  
    <?php dynamic_sidebar( 'prefooter' ); ?>
</div>

<?php get_footer(); ?>