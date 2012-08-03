<?php
/*
Template Name: Search
*/
?>

<?php get_header(); ?>

		<div class="row">
			  <article class="span8">

			     <?php if (have_posts()) : ?>
			       <h2><?php printf( __( 'Search Results for: %s'), '<span>' . get_search_query() . '</span>' ); ?></h2>
			       
			       <table class="table">
		             <tr>
			           <th>Post title</th>
			           <th>Date</th>
			         </tr>
			       	<tr>
			       	  <td><?php include (TEMPLATEPATH . '/title-link.php'); ?></td>
			       	  <td><?php the_time('n/j/Y') ?></td>
			       	</tr>
			       </table>
			    <?php else : ?>
			      <h2>Nothing Found</h2>
			      <div class="entry-content">
						<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentyten' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
                <?php endif; ?>

			  </article>
			  <!-- end .span8 -->
		  <?php get_sidebar(); ?>
		</div>
		<!-- end row -->
		
<?php get_footer(); ?>
