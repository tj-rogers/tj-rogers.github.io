<?php get_header(); ?>

  <div class="contentTopWrap">
    <p>CONTENT TOP</p>
  </div>

<div class="pageWrap">    
    <div class="contentWrap">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        
        
        <!-- ContentArea -->
        <div class="content-area">
            <div class="project-main-image">        
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
                                //$full_image_url = acf_photo_gallery_resize_image($full_image_url, 262, 160); //Resized size to 262px width by 160px height image url
                                $thumbnail_image_url= $image['thumbnail_image_url']; //Get the thumbnail size image url 150px by 150px
                                $url= $image['url']; //Goto any link when clicked
                                $target= $image['target']; //Open normal or new tab
                                $alt = get_field('project_images_alt', $id); //Get the alt which is a extra field (See below how to add extra fields)
                                $class = get_field('project_images_class', $id); //Get the class which is a extra field (See below how to add extra fields)
                ?>

                    <a rel="lightbox" href="<?php echo $full_image_url; ?>">
                        <img src="<?php echo $full_image_url; ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>">
                    </a>

                <?php endforeach; endif; ?>    

            </div>         

        </div><!-- /contentArea -->

        <!-- Right Sidebar Section -->
        <div class="sidebar-area">

            <h1><?php the_title(); ?></h1>

            <div class="project-info">
                <h2>Project Info</h2>
                <p class="projLabel">Project Timeline</p>
                <p class="projStat"><?php the_field('project_timeline'); ?></p>
                <p class="projLabel">Project Categories</p>
                <p class="projStat">
                    <?php  
                        $terms = get_the_terms( $post->ID , 'project_categories' );
                        $i = 1;
                        foreach ( $terms as $term ) {
                        echo $term->name;
                        echo ($i < count($terms))? ", " : "";
                        $i++; 
                    } ?>
                </p>
            </div>

            <div class="project-desc">
                <h2>Project Overview</h2>
                <?php the_field('project_description'); ?>
            </div>

            <p><a class="seeMore backToPort" href="/work"><i class="fa fa-arrow-circle-o-left"> </i> Back to my Portfolio</a></p>

        </div><!-- /sidebar-area -->

        <?php endwhile; endif; ?>        
    </div><!-- /contentWrap -->
</div><!-- /pageWrap -->

<pre><?php // var_dump($post); ?></pre>

<?php get_footer(); ?>