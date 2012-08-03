<?php
/* Header */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title>
<?php
  $title = get_the_title();
  if ( is_home() ) {
    echo "Bitches Who Brunch";
  } else {
    echo "Bitches Who Brunch | $title";
  }
?>
</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="" />
<meta name="keywords" content="" />
<!-- styles -->
<link href="<?php bloginfo('template_url'); ?>/images/favicon.ico" rel="icon" type="image/x-icon">
<link href="http://fonts.googleapis.com/css?family=Droid+Sans|Droid+Serif" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap-responsive.css">
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<!-- support for HTML5 in older browsers -->
<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>> 

<div class="container">
  <div class="global-header">
  <div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
    <div class="container">
    <div class="nav-utility clearfix">
      <ul class="nav social-media-links">
        <?php include (TEMPLATEPATH . '/social-media.php'); ?>
      </ul>
      <ul class="nav utility-links">
        <li class="first"><a href="index.php?page_id=3384">About Us</a></li>
        <li class="last"><a href="index.php?page_id=3386">Partner With Us</a></li>
        <li><?php get_search_form(); ?></li>
      </ul>
    </div>
    <!-- end .nav-utility -->
    <div class="nav-main clearfix">
     <a class="brand" href="<?php echo get_option('home'); ?>">
	   <img src="http://forloveofbacon.com/wordpress/wp-content/themes/bwb/images/bwb-logo.png" alt="Bitches Who Brunch" />
     </a>
     <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
     </a>
     <div class="nav-collapse collapse">
       <ul class="nav">
         <li class="first"><a href="<?php echo get_option('home'); ?>">
           <p class="brand-text">Bitches Who Brunch</p><p>Home</p></a>
         </li>
         <li><a href="index.php?page_id=2">
           <p class="brand-text">Bitchtastic</p><p>Brunches</p></a>
         </li>
         <li><a href="index.php?page_id=3377">
           <p class="brand-text">The Lust List</p><p>Fashion</p></a>
         </li>
         <li class="last"><a href="index.php?page_id=3379">
           <p class="brand-text">District Divas</p><p>Lifestyle</p></a>
         </li>
       </ul>
     </div>
     <!-- end .nav-collapse -->
    </div>
    <!-- end .nav-main -->
    </div>
    <!-- end .container -->
    </div>
    <!-- end .navbar-inner -->
  </div>
  <!-- end .navbar -->
  </div>
<!-- end header.php -->