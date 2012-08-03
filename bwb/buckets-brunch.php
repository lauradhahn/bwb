<?php
/* Content bucket - brunch */
?>
<div class="content-buckets row">
  <div class="span4">
    <section class="bucket">
  	  <h4>Patio Brunches</h4>
  	  <ul>
      <?php
	  // only patio brunch posts
	  $my_query = new WP_Query('category_name=patio-brunch&posts_per_page=4');
	  while ($my_query->have_posts()) : $my_query->the_post(); ?>
	    <li><?php include (TEMPLATEPATH . '/title-link.php'); ?></li>
      <?php endwhile;
      wp_reset_query(); ?>
  	  </ul>
      <span class="btn">
        <a href="index.php?cat=24">More &raquo;</a>
	  </span>
  </section>
  <!-- end bucket -->
  </div>
  
  <div class="span4">
    <section class="bucket">
  	  <h4>Bottomless Brunches</h4>
  	  <ul>
      <?php
	  // only patio brunch posts
	  $my_query = new WP_Query('category_name=bottomless-brunch&posts_per_page=4');
	  while ($my_query->have_posts()) : $my_query->the_post(); ?>
	    <li><?php include (TEMPLATEPATH . '/title-link.php'); ?></li>
      <?php endwhile;
      wp_reset_query(); ?>
  	  </ul>
      <span class="btn">
        <a href="index.php?cat=65">More &raquo;</a>
	  </span>
    </section>
    <!-- end bucket -->
  </div>
  
  <div class="span4">
    <section class="bucket">
    	<h4>Out-of-Town Brunches</h4>
    	<ul>
      <?php
    	// only patio brunch posts
    	$my_query = new WP_Query('category_name=bitches-on-vacay&posts_per_page=4');
    	while ($my_query->have_posts()) : $my_query->the_post(); ?>
    	  <li><?php include (TEMPLATEPATH . '/title-link.php'); ?></li>
      <?php endwhile;
      wp_reset_query(); ?>
    	</ul>
      <span class="btn">
        <a href="index.php?cat=3384">More &raquo;</a>
    	</span>
    </section>
    <!-- end content-bucket -->
  </div>
  
</div>