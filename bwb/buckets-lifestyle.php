<?php
/* Content bucket - lifestyle */
?>
<div class="content-buckets row">
  <div class="span4">
    <section class="bucket">
  	  <h4>Bitches in the Kitchen</h4>
  	  <ul>
      <?php
	  // only bitches-in-the-kitchen posts
	  $my_query = new WP_Query('category_name=bitches-in-the-kitchen&posts_per_page=4');
	  while ($my_query->have_posts()) : $my_query->the_post(); ?>
	    <li><?php include (TEMPLATEPATH . '/title-link.php'); ?></li>
      <?php endwhile;
      wp_reset_query(); ?>
  	  </ul>
      <span class="btn">
        <a href="index.php?cat=63">More &raquo;</a>
	  </span>
  </section>
  <!-- end bucket -->
  </div>
  
  <div class="span4">
    <section class="bucket">
  	  <h4>District Divas</h4>
  	  <ul>
      <?php
	  // only district-divas posts
	  $my_query = new WP_Query('category_name=district-divas&posts_per_page=4');
	  while ($my_query->have_posts()) : $my_query->the_post(); ?>
	    <li><?php include (TEMPLATEPATH . '/title-link.php'); ?></li>
      <?php endwhile;
      wp_reset_query(); ?>
  	  </ul>
      <span class="btn">
        <a href="index.php?cat=80">More &raquo;</a>
	  </span>
    </section>
    <!-- end bucket -->
  </div>
  
  <div class="span4">
    <section class="bucket">
    	<h4>Cupcake Queens</h4>
    	<ul>
      <?php
    	// only cupcake-queens posts
    	$my_query = new WP_Query('category_name=cupcake-queens&posts_per_page=4');
    	while ($my_query->have_posts()) : $my_query->the_post(); ?>
    	  <li><?php include (TEMPLATEPATH . '/title-link.php'); ?></li>
      <?php endwhile;
      wp_reset_query(); ?>
    	</ul>
      <span class="btn">
        <a href="index.php?cat=78">More &raquo;</a>
    	</span>
    </section>
    <!-- end content-bucket -->
  </div>
  
</div>