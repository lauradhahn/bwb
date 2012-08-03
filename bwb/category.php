<?php
/*
Template Name: Category
*/
?>

<?php get_header(); ?>

			<div class="row">
			  <article class="span8">

			     <?php if (have_posts()) : ?>
			       <h2>Posts by Category</h2>
			       
			       <table class="table">
		             <tr>
			           <th>Post title</th>
			           <th>Date</th>
			         </tr>
			       
			       	<?php while (have_posts()) : the_post(); ?>
			       	<tr>
			       	  <td><?php include (TEMPLATEPATH . '/title-link.php'); ?></td>
			       	  <td><?php the_time('n/j/Y') ?></td>
			       	</tr>
			       	<?php endwhile; ?>
			       </table>
                <?php endif; ?>

			  </article>
			  <!-- end .span8 -->
		  <?php get_sidebar(); ?>
		</div>
		<!-- end row -->

<?php get_footer(); ?>
