<?php get_header(); ?>

<?php 
/*
Template Name: Projects Page 
*/
 ?>

  <div class="contentTopWrap">
    <p>CONTENT TOP</p>
  </div>

<div class="pageWrap">    
    <div class="contentWrap">
        <!-- ContentArea -->
        <div class="content-area">

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>
            <?php endwhile; endif; ?>   

            <?php 
                $args = array(
                    'post_type' => 'project'
                );
                $query = new WP_Query($args);
                $image = get_field('project_images');
            ?> 

            <div class="projectsListing">

                <?php if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>

                    <div class="row">   
                        <div class="project-category">
                            <span><?php the_field('project_category'); ?></span> 
                        </div>  
                        <div class="views-field views-field-field-project-main-image">        
                            <div class="field-content">
                                <a href="<?php the_permalink(); ?>"><span><?php the_field('project_images'); ?></span></a>
                            </div>  
                        </div>  
                        <div class="views-field views-field-title">        
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>  
                        </div>  
                    </div><!-- /view-row -->
                <?php endwhile; endif; wp_reset_postdata(); ?>
            </div><!-- /project-listing -->

        </div><!-- /contentArea -->
    </div><!-- /contentWrap -->
</div><!-- /pageWrap -->

<small><?php //print_r($query); ?></small>

<?php get_footer(); ?>