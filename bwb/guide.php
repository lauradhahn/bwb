<?php
/*
Template Name: Guide
*/
?>

<?php get_header(); ?>

			<div class="row">
			   <article class="span8">
			   
			   <header> 
			     <h1><?php echo get_the_title(); ?></h1>
			   </header>
			   
			     <?php 
			     // get filter widget
			     if (function_exists('dynamic_sidebar') && dynamic_sidebar('brunch-filter')) : else : ?>  
			       <p><strong>Brunch filter widget</strong></p>  
			       <p>
				     Brunch filter
			       </p>  
			     <?php endif; ?>

				<?php
				// get published posts from category
				$args=array(
				  'post_type' => 'post',
				  'post_status' => 'publish',
				  'category_name' => 'brunch'
				);
				$my_query = null;
				$my_query = new WP_Query($args);
				
				if( $my_query->have_posts() ) {  ?>
				
				 	<table class="table brunch-posts">
				  		<tr>
				  			<th>Post title</th>
				  			<th>Neighborhood</th>
				  			<th>Price range</th>
				  			<th>Rating</th>
				  		</tr>
				  <?php
				  while ($my_query->have_posts()) : $my_query->the_post(); ?>
				    <tr>
				    	<!-- title -->
				    	<td>
				    	  <?php include (TEMPLATEPATH . '/title-link.php'); ?>
				    	</td>
				    	<!-- neighborhood ID=3226-->
				    	<td class="brunch-data"><?php 
				    		foreach((get_the_category()) as $category)
							{
    							if ($category->category_parent == "19")
    							{
       								echo '<a href="' . get_category_link($category->cat_ID) . '">' . $category->cat_name . '</a>';
    							}
							}
				    	 ?></td>
				    	 <!-- price ID=3227 -->
				    	 <td class="brunch-data"><?php 
				    		foreach((get_the_category()) as $category)
							{
    							if ($category->category_parent == "27")
    							{
       								echo '<a href="' . get_category_link($category->cat_ID) . '">' . $category->cat_name . '</a>';
    							}
							}
				    	 ?></td>
				    	 <!-- rating ID=3228 -->
				    	 <td class="brunch-data"><?php 
				    		foreach((get_the_category()) as $category)
							{
    							if ($category->category_parent == "28")
    							{
       								echo '<a href="' . get_category_link($category->cat_ID) . '">' . $category->cat_name . '</a>';
    							}
							}
				    	 ?></td>
				    </tr>
				  <?php endwhile; // end of the loop. ?>
				  </table>
				  <?php }
				wp_reset_query();
				?>
				</article>
				<!-- end .span8 -->
				<?php get_sidebar(); ?>
		</div>
		<!-- end row -->
		
		<?php include (TEMPLATEPATH . '/buckets-brunch.php'); ?>

<?php get_footer(); ?>