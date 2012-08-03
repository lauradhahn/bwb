<?php
/* Content bucket - fashion */
?>
<div class="content-buckets row">
  <div class="span4">
    <section class="bucket">
  	  <h4>Shoes &amp; Accessories</h4>
  	  <ul>
      <?php
	  // only patio brunch posts
	  $my_query = new WP_Query('category_name=shoes-accessories&posts_per_page=4');
	  while ($my_query->have_posts()) : $my_query->the_post(); ?>
	    <li><?php include (TEMPLATEPATH . '/title-link.php'); ?></li>
      <?php endwhile;
      wp_reset_query(); ?>
  	  </ul>
      <span class="btn">
        <a href="index.php?cat=32">More &raquo;</a>
	  </span>
  </section>
  <!-- end bucket -->
  </div>
  
  <div class="span4">
    <section class="bucket">
  	  <h4>Office Outfits</h4>
  	  <ul>
      <?php
	  // only patio brunch posts
	  $my_query = new WP_Query('category_name=work-wear&posts_per_page=4');
	  while ($my_query->have_posts()) : $my_query->the_post(); ?>
	    <li><?php include (TEMPLATEPATH . '/title-link.php'); ?></li>
      <?php endwhile;
      wp_reset_query(); ?>
  	  </ul>
      <span class="btn">
        <a href="index.php?cat=48">More &raquo;</a>
	  </span>
    </section>
    <!-- end bucket -->
  </div>
  
  <div class="span4">
    <section class="bucket">
    	<h4>Fancy Frocks &amp; Party Pieces</h4>
    	<ul>
      <?php
    	// only patio brunch posts
    	$my_query = new WP_Query('category_name=party-clothes-dresses&posts_per_page=4');
    	while ($my_query->have_posts()) : $my_query->the_post(); ?>
    	  <li><?php include (TEMPLATEPATH . '/title-link.php'); ?></li>
      <?php endwhile;
      wp_reset_query(); ?>
    	</ul>
      <span class="btn">
        <a href="index.php?cat=23">More &raquo;</a>
    	</span>
    </section>
    <!-- end content-bucket -->
  </div>
  
</div>