<?php
/*
Template Name: Lifestyle
*/
?>

<?php get_header(); ?>

			<div class="row">
			   <article class="span8">
			   
			   <header> 
			     <h1><?php echo get_the_title(); ?></h1>
			   </header>
				
				 <?php
				 // pagination
				 $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
				// get published posts from category 	
				$args=array(
				  'post_type' => 'post',
				  'post_status' => 'publish',
				  'category_name' => 'lifestyle',
				  'paged' => $paged,
				  'posts_per_page'=> 10
				);
				
				$my_query = null;
				$my_query = new WP_Query($args);
				
				$my_query->query_vars[ 'paged' ] > 1 ? $current = $my_query->query_vars[ 'paged' ] : $current = 1;
				
				// pagination array
				$pagination = array(
            'base' => @add_query_arg( 'paged', '%#%' ),
            //'format' => '',
            'showall' => false,
            'end_size' => 4,
            'mid_size' => 4,
            'total' => $my_query->max_num_pages,
            'current' => $current,
            'type' => 'plain'
        );
        
        // build the paging links
        if ($wp_rewrite->using_permalinks() )
            $pagination[ 'base' ] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );

        // more paging links
        if ( !empty( $my_query->query_vars[ 's' ] ) )
            $pagination[ 'add_args' ] = array( 's' => get_query_var( 's' ) );
				
				// the loop
				if( $my_query->have_posts() ) {
				
				while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
				  
				  <section class="post">
				    <h2>
					  <?php include (TEMPLATEPATH . '/title-link.php'); ?>    
				    </h2>
				    <?php include (TEMPLATEPATH . '/byline.php'); ?>
				    <?php 
				      /* get the excerpt */
				      the_advanced_excerpt('length=50&use_words=1&no_custom=1&ellipsis=%26hellip;&exclude_tags=img,p,strong'); 
				    ?>
				      <div class="post-image">
				        <img src="<?php /* get the first post image */ echo catch_that_image(); ?>" />
				      </div>
				      <span class="readmore btn">
				        <a href="<?php the_permalink();?>">Read more &raquo;</a>
				      </span>
				  </section>
				  <!-- end .post -->
				  
				<?php endwhile; // end of the loop. ?>
				
				<!-- pagination links -->
				  <?php 
  				  //print the paging links to the page
  				  echo '<div class="pagination">' . paginate_links($pagination) . '</div>';
  				?>
  		  <!-- end .pagination -->
				
				<?php }
				wp_reset_query();
				?>
				
				</article>
				<!-- end .span8 -->
				<?php get_sidebar(); ?>
		</div>
		<!-- end row -->
		
		<?php include (TEMPLATEPATH . '/buckets-lifestyle.php'); ?>

<?php get_footer(); ?>