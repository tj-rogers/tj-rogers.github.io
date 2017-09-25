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
            ?> 

            <div class="projects-listing">

                <?php if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>

                    <div class="project-row">    
                        <div class="project-row-sect project-main-image">        
                            <?php    
                                //Get the images ids from the post_metadata
                                $images = acf_photo_gallery('project_images', $post->ID);
                                    //Check if return array has anything in it
                                    $i = 1;
                                    if( count($images) ):
                                        //Cool, we got some data so now let's loop over it
                                        foreach($images as $image):
                                            $id = $image['id']; // The attachment id of the media
                                            $title = $image['title']; //The title
                                            $caption= $image['caption']; //The caption
                                            $full_image_url= $image['full_image_url']; //Full size image url
                                            $full_image_url = acf_photo_gallery_resize_image($full_image_url, 500, 560); //Resized size to 262px width by 160px height image url
                                            $thumbnail_image_url= $image['thumbnail_image_url']; //Get the thumbnail size image url 150px by 150px
                                            $url= $image['url']; //Goto any link when clicked
                                            $target= $image['target']; //Open normal or new tab
                                            $alt = get_field('project_images_alt', $id); //Get the alt which is a extra field (See below how to add extra fields)
                                            $class = get_field('project_images_class', $id); //Get the class which is a extra field (See below how to add extra fields)
                            ?>
 
                                <a href="<?php the_permalink(); ?>" <?php echo ($target == 'true' )? 'target="_blank"': ''; ?>>
                                    <img src="<?php echo $full_image_url; ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>">
                                </a>

                            <?php endforeach; endif; ?>    

                        </div>  

                        <div class="project-row-sect project-info-wrap"> 
                            <div class="project-info">
                                <div class="project-title">        
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>  
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

                        </div><!-- /project-info-wrap -->

                        <a class="project-link" href="<?php the_permalink(); ?>">&nbsp;</a>
                    </div><!-- /view-row -->

                <?php endwhile; endif; wp_reset_postdata(); ?>
            </div><!-- /project-listing -->



        </div><!-- /contentArea -->
    </div><!-- /contentWrap -->
</div><!-- /pageWrap -->

<pre><?php print_r($category); ?></pre>

<?php get_footer(); ?>