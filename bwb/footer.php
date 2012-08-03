<?php
/* Footer */
?>
</div>
<!-- end .container -->

	<footer class="footer">
		<div class="container">
			<div class="row">
				<section class="span4">
					<?php 
					// get filter widget
					if (function_exists('dynamic_sidebar') && dynamic_sidebar('about-us')) : else : ?>  
					  <p><strong>About us widget</strong></p>  
					<?php endif; ?>
					<span class="btn">
					  <a href="index.php?page_id=3384">More &raquo;</a>
					</span>
				</section>
				<section class="span4">
					<?php 
					// get filter widget
					if (function_exists('dynamic_sidebar') && dynamic_sidebar('stay-in-touch')) : else : ?>  
					  <p><strong>Stay in touch widget</strong></p>  
					<?php endif; ?>
					<ul class="social-media-links clearfix">
        			  <?php include (TEMPLATEPATH . '/social-media.php'); ?>
        			</ul>
					<form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=BitchesWhoBrunch', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
						<label>Get the Bitches in your inbox:</label>
						<input type="text" style="width:140px" name="email" placeholder="Your email address">
						<input type="hidden" value="BitchesWhoBrunch" name="uri">
						<input type="hidden" name="loc" value="en_US">
						<input type="submit" value="Subscribe" id="subscribe">
						<p class="wp-caption-text">Delivered by <a href="http://feedburner.google.com" target="_blank">FeedBurner</a></p>
					</form>
				</section>
				<section class="span4">
					<?php 
					// get filter widget
					if (function_exists('dynamic_sidebar') && dynamic_sidebar('partner-with-us')) : else : ?>  
					  <p><strong>Partner with us widget</strong></p>  
					<?php endif; ?>
					<span class="btn">
					  <a href="index.php?page_id=3386">Advertise &raquo;</a>
					</span>
				</section>
			</div>
			<div class="row">
				<div class="span12">
					<p>&copy; <?php echo date("Y") ?> Bitches Who Brunch</p>
				</div>
			</div>
		</div>
	</footer>
	<!-- end footer -->

<!-- scripts at the end of document for speedier page load -->
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.7.2.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.js"></script>

<!-- load share buttons -->
<!-- facebook -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=114648515229542";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<!-- twitter -->
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
</script>
<!-- pinterest -->
<script type="text/javascript">
(function() {
    window.PinIt = window.PinIt || { loaded:false };
    if (window.PinIt.loaded) return;
    window.PinIt.loaded = true;
    function async_load(){
        var s = document.createElement("script");
        s.type = "text/javascript";
        s.async = true;
        s.src = "http://assets.pinterest.com/js/pinit.js";
        var x = document.getElementsByTagName("script")[0];
        x.parentNode.insertBefore(s, x);
    }
    if (window.attachEvent)
        window.attachEvent("onload", async_load);
    else
        window.addEventListener("load", async_load, false);
})();
</script>

<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>
