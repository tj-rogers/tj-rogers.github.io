<?php get_header(); ?>

<div class="pageWrap">    
    <div class="contentWrap">
        <div class="content-area">
            <?php the_title( '<h1>', '</h1>' ); ?>
            
            <?php the_content(); ?>

        </div><!-- /contentArea -->

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