<?php get_header(); ?>

<?php
/*
Template Name: Projects Page
*/
 ?>

<div class="pageWrap">
    <div class="contentWrap">
        <!-- ContentArea -->
        <div class="content-area">

            <?php
                $args = array(
                    'post_type' => 'project'
                );
                $query = new WP_Query($args);
            ?>

            <div class="projects-listing">

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
            </div><!-- /project-listing -->



        </div><!-- /contentArea -->
    </div><!-- /contentWrap -->
</div><!-- /pageWrap -->

<pre><?php print_r($category); ?></pre>

<?php get_footer(); ?>
