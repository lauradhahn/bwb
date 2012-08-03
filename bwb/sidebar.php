<aside class="sidebar span4">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar-Main') ) { ?>
<?php } ?>   

  <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar-ads')) : else : ?>  
			       <p><strong>Ads here</strong></p>  
			       <p>This area is widget ready! Add one in the admin panel.</p>  
  <?php endif; ?>

  <div class="this-week">
  <?php query_posts('category_name=this-week&showposts=1'); ?>
        <?php while (have_posts()) : the_post(); ?>
          <div class="this-week-post" style="background-image:url(<?php echo catch_that_image(); ?>);">
            <header>
              <h4>
                <?php include (TEMPLATEPATH . '/title-link.php'); ?>
              </h4>
            </header>
          </div>
        <?php endwhile; ?>
  </div>
        				 
</aside>