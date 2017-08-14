<?php get_header(); ?>

<?php if($page['contenttop']){ ?>
  <div class="contentTopWrap">
    <?php print render($page['contenttop']); ?>
  </div>
<?php } ?>

<div class="pageWrap">    
  <div class="contentWrap">
      
      <?php if ($title && !$is_front): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
  
      <div class="contentArea <?php if($page['sidebar_first']){ echo 'hasSidebar'; } ?>">
        <?php print render($page['content']); ?>
      </div><!-- /contentArea -->
      
      <?php if($page['sidebar_first']){ ?>
        <div class="sidebarArea">
          <?php echo render($page['sidebar_first']); ?>
        </div>
      <?php } ?>

      <p class="clearfloat">&nbsp;</p>
  </div><!-- /contentWrap -->
</div><!-- /pageWrap -->

<?php get_footer(); ?>