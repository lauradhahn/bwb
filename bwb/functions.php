<?php
/* widgets */
if ( function_exists('register_sidebar') )
	register_sidebar(array('name'=>'Sidebar-Main',
        'before_widget' => '<div class="sidebar-widget %1$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    register_sidebar(array('name'=>'Brunch filter widget',
    	'id' => 'brunch-filter',
        'before_widget' => '<div class="brunch-filter">',
        'after_widget' => '</div>',
    ));
    register_sidebar(array('name'=>'Sidebar ad widget',
    	'id' => 'sidebar-ads',
        'before_widget' => '<div class="ad">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    register_sidebar(array('name'=>'Home ad 1 widget',
    	'id' => 'home-ad-1',
    	'before_widget' => '<div class="home-ad-1 ad">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    register_sidebar(array('name'=>'Home ad 2 widget',
    	'id' => 'home-ad-2',
    	'before_widget' => '<div class="home-ad-2 ad">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    register_sidebar(array('name'=>'Home ad 3 widget',
    	'id' => 'home-ad-3',
    	'before_widget' => '<div class="home-ad-3 ad">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    register_sidebar(array('name'=>'About us widget',
    	'id' => 'about-us',
    	'before_widget' => '<div class="about-us">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    register_sidebar(array('name'=>'Stay in touch widget',
    	'id' => 'stay-in-touch',
    	'before_widget' => '<div class="stay-in-touch">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    register_sidebar(array('name'=>'Partner with us widget',
    	'id' => 'partner-with-us',
    	'before_widget' => '<div class="partner-with-us">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    
/* get post image */
add_theme_support( 'post-thumbnails' );

/* get first image */
function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

  if(empty($first_img)){ //Defines a default image
    $first_img = "/images/default.jpg";
  }
  return $first_img;
}

/* theme admin screen */

$fulltemplatepath=get_bloginfo('template_url');

$options = array (

array(  
	"name" => "Body Background Color",
	"desc" => "body",
	"id" => "bs_theme_body_background",
	"type" => "text",
	"std" => "#ffffff"
	),
	
array(
	"name" => "Page Wrapper Background Color",
	"desc" => "#wrap",
	"id" => "bs_theme_wrap_background",
	"type" => "text",
	"std" => "#ffffff"
	),
	
array(  
	"name" => "Page Wrapper Border Color",
	"desc" => "#wrap",
	"id" => "bs_theme_wrap_border",
	"type" => "text",
	"std" => "#cccccc"
	),
	
array(  
	"name" => "Header Background Color",
	"desc" => "#header",
	"id" => "bs_theme_header_background",
	"type" => "text",
	"std" => "#eeeeee"
	),
	
array(  
	"name" => "Header Background Image",
	"desc" => "#header (use full URL path to image) (approx size of image: 1000x140) ",
	"id" => "bs_theme_header_background_image",
	"type" => "text",
	"std" => $fulltemplatepath."/images/header.gif"
	),
	
array(  
	"name" => "Show/Hide Header Title & Description",
	"desc" => "#header h1, #header .description",
	"id" => "bs_theme_header_show_hide_text",
	"type" => "radioshowhide",
	"std" => "show"
	),

array(  
	"name" => "Show/Hide Posted By Line",
	"desc" => ".meta-postedby",
	"id" => "bs_theme_header_show_hide_postedby",
	"type" => "radioshowhide",
	"std" => "show"
	),

array(  
	"name" => "Show/Hide Tags Line",
	"desc" => ".meta-tags",
	"id" => "bs_theme_header_show_hide_tags",
	"type" => "radioshowhide",
	"std" => "show"
	),

array(  
	"name" => "Show/Hide Add Comment Line",
	"desc" => ".meta-addcomment",
	"id" => "bs_theme_header_show_hide_addcomment",
	"type" => "radioshowhide",
	"std" => "show"
	),
	
array(  
	"name" => "Navigation Bar Background Color",
	"desc" => "#navbar",
	"id" => "bs_theme_navbar_background",
	"type" => "text",
	"std" => "#cccccc"
	),
	
array(  
	"name" => "Navigation Bar Link Color",
	"desc" => "#navbar a",
	"id" => "bs_theme_navbar_link_color",
	"type" => "text",
	"std" => "#444444"
	),
	
array(  
	"name" => "Sidebar Text Color",
	"desc" => "#sidebar",
	"id" => "bs_theme_sidebar_text_color",
	"type" => "text",
	"std" => "#444444"
	),
	
array(  
	"name" => "Footer Text Color",
	"desc" => "#footer",
	"id" => "bs_theme_footer_text_color",
	"type" => "text",
	"std" => "#666666"
	),
	
array(  
	"name" => "Post Title Color",
	"desc" => "h1, h2, h3, h4",
	"id" => "bs_theme_title_color",
	"type" => "text",
	"std" => "#111111"
	),
        
array(  
	"name" => "General Link Color",
	"desc" => "a",
	"id" => "bs_theme_link_color",
	"type" => "text",
	"std" => "#333399"
	),
	
array(  
	"name" => "General Text Color",
	"desc" => ".the_content",
	"id" => "bs_theme_text_color",
	"type" => "text",
	"std" => "#222222"
	),
	
array(  
	"name" => "Google Verify Code",
	"desc" => "Go to <a href=\"http://www.google.com/webmasters/tools/\" target=\"_blank\">Google Webmaster Tools</a>, submit your XML Sitemap and grab your verify code to paste into this box.",
	"id" => "bs_theme_google_verify_code",
	"type" => "textarea",
	"std" => ""
	),
	
array(  
	"name" => "Good Analytics Code",
	"desc" => "Go to <a href=\"http://www.google.com/analytics\" target=\"_blank\">Google Analytics</a>, and grab your tracking code to paste into this box. You can also put your <a href=\"http://www.quantcast.com/\" target=\"_blank\">Quantcast</a> tracking code here.",
	"id" => "bs_theme_google_analytics_code",
	"type" => "textarea",
	"std" => ""
	),
	
array(  
	"name" => "Custom CSS",
	"desc" => "You can add any css into this box and it will override any code in the stylesheet or from the info above.",
	"id" => "bs_theme_custom_css",
	"type" => "textarea",
	"std" => ""
	),

);

function mytheme_add_admin() {

    global $options;

    if ( $_GET['page'] == basename(__FILE__) ) {

        if ( 'save' == $_REQUEST['action'] ) {

                foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

                header("Location: themes.php?page=functions.php&saved=true");
                die;

        } else if( 'reset' == $_REQUEST['action'] ) {

            foreach ($options as $value) {
                delete_option( $value['id'] ); }

            header("Location: themes.php?page=functions.php&reset=true");
            die;

        }
    }

    add_theme_page("Edit Basic Simplicity", "Edit Basic Simplicity", 'edit_themes', basename(__FILE__), 'basic_simplicity_theme_page');

}


function basic_simplicity_theme_page() {
	
	global $options;

	if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>Basic Simplicity: Settings saved.</strong></p></div>';
	if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>Basic Simplicity: Settings reset.</strong></p></div>';
	_e('<style type="text/css">th {background:#cccccc;} td {background:#eeeeee;} th, td {padding:4px;}</style>');
	_e('<div class="wrap">');
	_e('<div id="icon-themes" class="icon32"><br /></div>');
	_e('<h2>Manage Themes</h2>');
	_e('<h3>Edit Basic Simplicity</h3>');
	_e('<p>Below you can make simple style changes to Basic Simplicity as well as enter things like your Google Analytics tracking code.</p>');
	_e('<p>You are using Basic Simplicity v.1.4.1, learn more about <a href="http://www.basicsimplicity.com/" target="_blank">Basic Simplicity</a>.</p>');
	_e('<div id="current-theme">');
	_e('<form method="post">');
	_e('<fieldset>');	
	_e('<table border="0" cellpadding="4" cellspacing="1">');
	_e('<tr><th>Style</th><th>Value</th><th>CSS value</th></tr>');		
	foreach ($options as $value) {

	_e('<tr><td nowrap>');
	echo $value['name'];
	_e('</td><td>');
	
	if($value['type']=="textarea"){
	echo "<textarea name=\"".$value['id']."\" id=\"".$value['id']."\" rows=\"10\" cols=\"40\">";
	if ( get_settings( $value['id'] ) != "") { 
			echo stripslashes(get_settings($value['id'])); 
		} else { 
			echo stripslashes($value['std']); 
		}
	echo "</textarea>";
	}elseif($value['type']=="radioshowhide"){
	echo "<input name=\"".$value['id']."\" id=\"".$value['id']."\" type=\"radio\" value=\"hide\" ";
	if ( get_settings($value['id'])=="hide") { 
			echo "checked"; 
		} else { 
			echo "";
		}
	echo " /> Hide Text";
	echo " &nbsp;&nbsp;&nbsp; ";
	echo "<input name=\"".$value['id']."\" id=\"".$value['id']."\" type=\"radio\" value=\"show\" ";
	if ( get_settings($value['id'])=="show") { 
			echo "checked"; 
		} else { 
			echo "";
		}
	echo " /> Show Text";
	}else{
	echo "<input name=\"".$value['id']."\" id=\"".$value['id']."\" type=\"text\" value=\"";
	if ( get_settings( $value['id'] ) != "") { 
			echo stripslashes(get_settings($value['id'])); 
		} else { 
			echo stripslashes($value['std']); 
		}
	echo "\" />";
	}
	_e('</td><td>');
	echo $value['desc'];
	_e('</td></tr>');
	
	}
	_e('</table>');	
	_e('<p><input type="hidden" name="action" value="save" /><input type="submit" name="submit" value="Save" style="font-weight:bold; font-size:120%;" /></p>');
	_e('</fieldset>');
	_e('</form>');
	
	
	_e('<form method="post" style="margin-top:100px; padding:10px; background-color:#ccc;">');
	_e('<fieldset>');
	_e('<p style="color:#900;"><strong>Warning: All your edits will be lost if you reset back to the default settings.</strong></p>');
	_e('<p><input type="hidden" name="action" value="reset" /><input type="submit" name="reset" value="Reset to Default Settings" style="color:#999;" /></p>');
	_e('</fieldset>');
	_e(' </form>');
	
	_e(' </div>');
	_e(' </div>');

}
add_action('admin_menu', 'mytheme_add_admin');
?>