<?php
/*
Template Name: Index
*/
?>

<?php get_header(); ?>

			<?php if ( have_posts() ) : ?>

			<div class="row">
			   <article class="span8">
			     <section class="primary-feature">
			       <?php
			         // only brunch posts
			         $my_query = new WP_Query('category_name=bitchtastic-brunches&posts_per_page=1');
			         while ($my_query->have_posts()) : $my_query->the_post();
			           $do_not_duplicate_brunch = $post->ID; ?>
			         <div class="primary-feature-post" style="background-image:url(<?php echo catch_that_image(); ?>);">
			         <?php include (TEMPLATEPATH . '/new-flag.php'); ?>
			           <header>
			             <div class="title">
  			               <h2>
  			                 <?php include (TEMPLATEPATH . '/title-link.php'); ?>  
    			           </h2>
    			           <?php include (TEMPLATEPATH . '/byline.php'); ?>
			             </div>
			           </header>
			           <!-- end .title -->
    			     </div>
    			     <!-- end .primary-feature-post -->
    			   <?php endwhile; wp_reset_query(); ?>
    			 </section>
    			 <!-- end .primary-feature -->
    		</article>
    		<!-- end span8 -->
      
    		<article class="span4">
    		  <section class="secondary-feature">
    		    <?php 
    		    // only this week posts
			       $my_query = new WP_Query('category_name=this-week&posts_per_page=1');
			         while ($my_query->have_posts()) : $my_query->the_post();
			           $do_not_duplicate_lifestyle = $post->ID; ?>
    		    <div class="secondary-feature-post" style="background-image:url(<?php echo catch_that_image(); ?>);">
    		      <?php include (TEMPLATEPATH . '/new-flag.php'); ?>
      		      <header>
      		        <div class="title">
      		          <h3>
      		            <?php include (TEMPLATEPATH . '/title-link.php'); ?>  
    			      </h3>
    			      <?php include (TEMPLATEPATH . '/byline.php'); ?>
      		        </div>
      		        <!-- end .title -->
			      </header>
        		</div>
        		<!-- end .secondary-feature-post -->
        		<?php endwhile; wp_reset_query(); ?>
    		  </section>
    		  <!-- end .secondary-feature -->
    		  
    		  <section class="tertiary-feature">
    		    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('home-ad-1')) : else : ?>  
			      <p><strong>Ads here</strong></p>  
			      <p>Add a text widget containing an ad.</p>  
			    <?php endif; ?>
    		  </section>
    		  <!-- end .tertiary-feature -->
        </article>
        <!-- end .span4 -->
      
	</div>
	<!-- end .row -->
	
	<div class="row">
	  <div class="span3">
        <?php 
          // only brunch posts that are not in the primary slot
          $my_query = new WP_Query('category_name=bitchtastic-brunches&showposts=2'); 
            if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); 
            if( $post->ID == $do_not_duplicate_brunch ) continue;?>	    
         <?php include (TEMPLATEPATH . '/feature-post.php'); ?>
       <?php endwhile; endif; wp_reset_query(); ?>
	 </div>
	 <!-- end .span3 -->
	 
	 <div class="span3">
       <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('home-ad-2')) : else : ?>  
         <p><strong>Ads here</strong></p>  
		 <p>Add a text widget containing an ad.</p>  
	   <?php endif; ?>
     </div>
     <!-- end .span3 -->
	 
     <div class="span3">
        <?php 
        // only fashion posts
        query_posts('category_name=fashion&showposts=1'); ?>
    	<?php while (have_posts()) : the_post(); ?>
    	  <?php include (TEMPLATEPATH . '/feature-post.php'); ?>
        <?php endwhile; ?>
      </div>
      <!-- end .span3 -->
      
      <div class="span3">
        <?php 
        // only lifestyle posts that are not in the secondary slot
        $my_query = new WP_Query('category_name=lifestyle&showposts=2'); 
          if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); 
          if( $post->ID == $do_not_duplicate_lifestyle ) continue;?>
    	  <?php include (TEMPLATEPATH . '/feature-post.php'); ?>
        <?php endwhile; endif; wp_reset_query(); ?>
      </div>
      <!-- end .span3 -->
      
	</div>
	<!-- end row -->
	
	<div class="row">
	  <div class="span3">
        <?php 
        // only talk to us posts
        query_posts('category_name=talk-to-us&showposts=1'); ?>
    	<?php while (have_posts()) : the_post(); ?>
    	  <?php include (TEMPLATEPATH . '/feature-post.php'); ?>
        <?php endwhile; ?>
      </div>
      <!-- end .span3 -->
      
      <div class="span3">
        <?php 
        // only bitches on vacay posts
        $my_query = new WP_Query('category_name=bitches-on-vacay&showposts=2'); 
          if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); 
          if( $post->ID == $do_not_duplicate_brunch ) continue;?>
    	  <?php include (TEMPLATEPATH . '/feature-post.php'); ?>
        <?php endwhile; endif; wp_reset_query(); ?>
      </div>
      <!-- end .span3 -->
	 
	 <div class="span3">
       <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('home-ad-3')) : else : ?>  
         <p><strong>Ads here</strong></p>  
		 <p>Add a text widget containing an ad.</p>  
	   <?php endif; ?>
     </div>
     <!-- end .span3 -->
	 
     <div class="span3">
        <?php 
        // only best and worst posts
        query_posts('category_name=best-and-worst-brunches&showposts=1'); ?>
    	<?php while (have_posts()) : the_post(); ?>
    	  <?php include (TEMPLATEPATH . '/feature-post.php'); ?>
        <?php endwhile; ?>
      </div>
      <!-- end .span3 -->
      
	</div>
	<!-- end row -->
	
	<?php include (TEMPLATEPATH . '/buckets-brunch.php'); ?>
          
	<?php else : ?>

	  <article class="post no-results not-found">
	    <header>
		  <h1>Nothing found</h1>
		</header>
	  </article>
				
	<?php endif; // end of the loop ?>
		
<?php get_footer(); ?>