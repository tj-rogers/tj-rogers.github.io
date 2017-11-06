<?php get_header(); ?>

<?php 
/*
Template Name: Right Sidebar 
*/
 ?>

<div class="pageWrap">    
    <div class="contentWrap">
        <!-- ContentArea -->
        <div class="content-area has-sidebar">
            <?php the_content(); ?>               

        </div><!-- /contentArea -->

        <!-- Right Sidebar Section -->
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