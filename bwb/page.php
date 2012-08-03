<?php
/*
Template Name: Page
*/
?>

<?php get_header(); ?>

		<div class="row">
		  <article class="span8">

		    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<section class="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php if ( is_front_page() ) { ?>
						<h2 class="entry-title"><?php the_title(); ?></h2>
					<?php } else { ?>
						<h2 class="entry-title"><?php the_title(); ?></h2>
					<?php } ?>

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:' ), 'after' => '</div>' ) ); ?>
						<?php edit_post_link( __( 'Edit' ), '<span class="edit-link">', '</span>' ); ?>
					</div>
				</section>

			<?php endwhile; ?>

			</article>
			<!-- end .span8 -->
			<?php get_sidebar(); ?>
		</div>
		<!-- end row -->
<?php get_footer(); ?>
