<?php
/*
Template Name: Single
*/
?>

<?php get_header(); ?>

		<div class="row">
		  <article class="span8">

		  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header>
					  <h1 class="entry-title"><?php the_title(); ?></h1>
					  <?php include (TEMPLATEPATH . '/byline.php'); ?>
					</header>
					
					<div class="share-buttons">
						<ul class="buttons clearfix">
						  <li>
						   <div class="fb-like" data-href="<?php the_permalink(); ?>" data-send="false" data-layout="button_count" data-show-faces="false" data-font="lucida grande"></div>
						  </li>
						  <!-- end facebook -->
						  <li>
						    <a href="https://twitter.com/share" class="twitter-share-button" data-via="twitterapi" data-lang="en">Tweet</a>
						  </li>
						  <!-- end twitter -->
						  <li>
						    <a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo catch_that_image(); ?>&description=<?php the_title(); ?>" class="pin-it-button" count-layout="horizontal">Pin It</a>
						  </li>
						  <!-- end pinterest -->
						</ul>
					</div>
					<!-- end .share-buttons -->

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:' ), 'after' => '</div>' ) ); ?>
					</div>
					<!-- .entry-content -->
					
					<p class="tags"><?php the_tags(); ?></p>

					<div class="entry-utility">
						<?php edit_post_link( __( 'Edit'), '<span class="edit-link">', '</span>' ); ?>
					</div>
					<!-- end .entry-utility -->
				</section>
				<!-- end #post-## -->

				<?php comments_template( '', true ); ?>

<?php endwhile; // end of the loop. ?>

			</article>
			<!-- end .span8 -->
			<?php get_sidebar(); ?>
		</div>
		<!-- end .row -->

<?php get_footer(); ?>
