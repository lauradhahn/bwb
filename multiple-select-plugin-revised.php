<?php
/*
Plugin Name: Multiple Category Selection Widget
Plugin URI: http://wp.zackdesign.biz/category-selection-widget/
Description: Select multiple categories at once using this widget!
Author: Isaac Rowntree
Version: 3.1.2
Author URI: http://zackdesign.biz

    Copyright (c) 2005, 2006 Isaac Rowntree (http://zackdesign.biz)
    QuickShop is released under the GNU General Public
    License (GPL) http://www.gnu.org/licenses/gpl.txt

    This is a WordPress plugin (http://wordpress.org).

*/

function wpmm_load_category()
{    
    session_start(); // Load the session in
    
    if (isset($_REQUEST['reset_mcsw']))
    {
       unset($_SESSION['wpmm_cats']);
       unset($_SESSION['wpmm_search_vars']);
       
       wp_redirect(get_bloginfo('url'));
       exit();
    }
    
    if (!empty($_POST['wpmm']))
    {       
        $cats = $_POST['wpmm'];
        
        $sql = '';
          $count = 0;
        foreach ($cats as $cat)
        {
            if ($cat == 0)
                unset($cats[$count]);
            else
                $sql .= $cat.',';
            $count++;
        }
        $sql = trim ($sql, ',');
        if (!empty($sql))
        {
          if (get_option('permalink_structure')!= '')
          {
              wp_redirect(get_bloginfo('url').'/categories/'.$sql.'/search_type/'.$_POST['mmctype'].'/order/'.$_POST['order'].'/');
                  exit();
          }
          else
          {
              wp_redirect(get_bloginfo('url').'/?cat='.$sql.'&search_type='.$_POST['mmctype'].'&order='.$_POST['order']);
                  exit();
          }
        } 
        else if ($_POST['blank'] != 'none') // Blank search
        {
            if (!$_POST['default'])
            {
                if ((get_option('show_on_front') == 'page') && (get_option('page_for_posts')))
                {
                    wp_redirect(get_permalink(get_option('page_for_posts')));
                    exit();
                }
                else
                {
                    wp_redirect(get_bloginfo('url'));
                    exit();
                }
            }
            else
            {
                wp_redirect(get_category_link($_POST['default']));
                exit();
            }
        }
    } 
}


function categories_queryvars( $qvars )
{
  $qvars[] = 'search_type';  
  return $qvars;
}

function wpmm_parse($vars)
{
    if (!empty($vars->query_vars['search_type']))
    {
        $cats = explode(',',$vars->query_vars['cat']);
        $type = $vars->query_vars['search_type'];
        $order = $vars->query_vars['order'];
    
        global $wp;
        $wp->set_query_var('category__'.$type, $cats);
        
        //$taxonomy = array('relation' => 'OR', array('terms' => $cats));
        //$wp->set_query_var('tax_query', $taxonomy);
        //print_r($wp);
        
        if ($order == 'title')
        {
            $wp->set_query_var('orderby', 'title');
            $wp->set_query_var('order', 'asc');
        }
        
        $_SESSION['wpmm_cats'] = $vars->query_vars['cat']; 
        $_SESSION['wpmm_search_vars'] = $type;
    }
}

function wpmm_add_rewrite_rules( $wp_rewrite ) 
{
  $new_rules = array( 
     'categories/(.+?)/search_type/(.+?)/order/(.+?)/page/(.+?)/?$' => 'index.php?cat=' .
       $wp_rewrite->preg_index(1).'&search_type=' . $wp_rewrite->preg_index(2).'&order='.$wp_rewrite->preg_index(3).'&paged='. $wp_rewrite->preg_index(4),
     'categories/(.+?)/search_type/(.+?)/order/(.+?)/?$' => 'index.php?cat=' .
       $wp_rewrite->preg_index(1).'&search_type=' . $wp_rewrite->preg_index(2).'&order='.$wp_rewrite->preg_index(3),     
     'categories/(.+)/page/(.+)/?$' => 'index.php?cat=' .
       $wp_rewrite->preg_index(1).'&paged=' . $wp_rewrite->preg_index(2),
     'categories/(.+)/?$' => 'index.php?cat=' .
       $wp_rewrite->preg_index(1));
  
  $wp_rewrite->rules = array_merge($new_rules, $wp_rewrite->rules);
   
}




function mcsw_admin_add_page() 
{
  add_options_page('Multiple Category Selection', 'Multiple Category Selection', 'administrator', __FILE__, 'wpmcsw_options_page',plugins_url('/images/icon.png', __FILE__));
  add_action('admin_init', 'mcsw_settings_api_init');
}

function wpmcsw_options_page() 
{
  require_once('admin-form.php');
}

function mcsw_settings_api_init()
{
  register_setting( 'mcsw', 'mcsw_ajax' ); 
  register_setting( 'mcsw', 'mcsw_form_display' ); 
  register_setting( 'mcsw', 'mcsw_form' );
  add_settings_section('mcsw_main', 'Main Settings', 'mcsw_main_text', 'mcsw');  
  add_settings_section('mcsw_form', 'Shortcode and Results Form Settings', 'mcsw_shortcode_text', 'mcsw');
  add_settings_field('mcsw_ajax', 'AJAX Chaining', 'mcsw_ajax', 'mcsw', 'mcsw_main');   
  add_settings_field('mcsw_form_display', 'Display Form', 'mcsw_form_display', 'mcsw', 'mcsw_main');  
  add_settings_field('mcsw_form', '', 'mcsw_form', 'mcsw', 'mcsw_form');
}

function mcsw_main_text() {
}

function mcsw_shortcode_text() 
{
  echo '<p>Use the shortcode [mcsw] to generate a form on any page you wish.</p>';
}

function mcsw_ajax() {
  $options = get_option('mcsw_ajax');
  if ($options)
    $selected = 'checked="checked"';
  else
    $selected=  '';
  echo "<fieldset><legend class='screen-reader-text'><span>AJAX Chaining</span></legend><label for='mcsw_ajax'>
        <input name='mcsw_ajax' type='checkbox' id='mcsw_ajax' value='1' {$selected} />
        Allow more than one level of categories to be displayed using AJAX</label>
        </fieldset>";
}

function mcsw_form_display() {
  $options = get_option('mcsw_form_display'); 
  if ($options)
    $selected = 'checked="checked"';
  else
    $selected=  '';
  echo "<fieldset><legend class='screen-reader-text'><span>Display form above results</span></legend><label for='mcsw_form_display'>
        <input name='mcsw_form_display' type='checkbox' id='mcsw_form_display' value='1' {$selected} />
        Above results</label>
        </fieldset>";
}

function mcsw_form()
{
  require_once('settings_fields.php');
}

function wpmm_activate() {
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}

register_activation_hook( __FILE__, 'wpmm_activate' );

// Get Wordpress to parse URL for query categories
add_filter('query_vars', 'categories_queryvars' );

// Run the category selection
add_action('parse_request','wpmm_parse');

// Rewrite URL
add_action('init','wpmm_load_category');  
add_action('init','wpmm_activate');
add_action('generate_rewrite_rules', 'wpmm_add_rewrite_rules');  
add_action('loop_start', 'mcsw_loop_form');

add_action('widgets_init', create_function('', 'return register_widget("MCSWwidget");'));

// Shortcode for page form
add_shortcode( 'mcsw', 'mcsw_shortcode_handler' );

// Options page
add_action('admin_menu', 'mcsw_admin_add_page');   

/**
 * wpmm widget Class
 */
class MCSWwidget extends WP_Widget {
    /** constructor */
    function MCSWwidget() {
        parent::WP_Widget(false, $name = 'Multi-Category');	
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {	
    
        prepare_mcsw_form($args, $instance);
        
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {				
        return $new_instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {				
        if (isset($instance['title'])) : $title = esc_attr($instance['title']); else: $title = ''; endif;
        if (isset($instance['excluded_cats'])) : $excluded_cats = esc_attr($instance['excluded_cats']); else: $excluded_cats = ''; endif;
        if (isset($instance['default_category'])) : $default_category = esc_attr($instance['default_category']); else: $default_category = ''; endif;
        
        if (isset($instance['def_search_type'])) : $def_search_type = esc_attr($instance['def_search_type']); else: $def_search_type = ''; endif;
        
        if ($def_search_type == 'in')
            $def_search_type_in = 'checked="checked"';
        else
            $def_search_type_and = 'checked="checked"';
        
        if (isset($instance['blank_search_type'])) : 
            $blank_search_type = esc_attr($instance['blank_search_type']); 
            if ($blank_search_type == 'none')
                $blank_search_none = 'checked="checked"';
            else
                $blank_search_all = 'checked="checked"';
        else :
                $blank_search_none = 'checked="checked"';
        endif;
	
        if (isset($instance['order'])) : 
            $order = esc_attr($instance['order']); 
            if ($order == 'default')
                $order_default = 'checked="checked"';
            else
                $order_title = 'checked="checked"';
        else :
                $order_default = 'checked="checked"';
        endif;
            
        if (isset($instance['user_choice'])) : $user_choice = esc_attr($instance['user_choice']); $user_choice_checked = 'checked="checked"'; endif;
        
        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
        <p><label for="<?php echo $this->get_field_id('excluded_cats'); ?>"><?php _e('Comma Seperated Excluded Category IDs:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('excluded_cats'); ?>" name="<?php echo $this->get_field_name('excluded_cats'); ?>" type="text" value="<?php echo $excluded_cats; ?>" /></label></p>
        <p><input id="<?php echo $this->get_field_id('user_choice'); ?>" name="<?php echo $this->get_field_name('user_choice'); ?>" type="checkbox" <?php echo $user_choice_checked; ?> /> <label for="<?php echo $this->get_field_id('user_choice'); ?>"><?php _e('User Chooses Search Type'); ?> </label></p>
        <p><label for="<?php echo $this->get_field_id('def_search_type'); ?>"><?php _e('Default Search Type:'); ?></label></p>
        <p><input id="<?php echo $this->get_field_id('def_search_type'); ?>" name="<?php echo $this->get_field_name('def_search_type'); ?>" type="radio" value="and" <?php echo $def_search_type_and; ?> /> <?php _e('All'); ?> </p>
        <p><input id="<?php echo $this->get_field_id('def_search_type'); ?>" name="<?php echo $this->get_field_name('def_search_type'); ?>" type="radio" value="in"  <?php echo $def_search_type_in; ?> /> <?php _e('Any'); ?> </p>
        <p><label for="<?php echo $this->get_field_id('default_category'); ?>"><?php _e('Default category ID shown for blank search:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('default_category'); ?>" name="<?php echo $this->get_field_name('default_category'); ?>" type="text" value="<?php echo $default_category; ?>" /></label></p>
         <p><label for="<?php echo $this->get_field_id('blank_search_type'); ?>"><?php _e('Blank Search Results:'); ?></label></p>
        <p><input id="<?php echo $this->get_field_id('blank_search_type'); ?>" name="<?php echo $this->get_field_name('blank_search_type'); ?>" type="radio" value="none" <?php echo $blank_search_none; ?> /> <?php _e('None'); ?> </p>
        <p><input id="<?php echo $this->get_field_id('blank_search_type'); ?>" name="<?php echo $this->get_field_name('blank_search_type'); ?>" type="radio" value="all"  <?php echo $blank_search_all; ?> /> <?php _e('All, or the default category ID above'); ?> </p>
        <p><label for="<?php echo $this->get_field_id('order'); ?>"><?php _e('Ordering:'); ?></label></p>
        <p><input id="<?php echo $this->get_field_id('order'); ?>" name="<?php echo $this->get_field_name('order'); ?>" type="radio" value="default" <?php echo $order_default; ?> /> <?php _e('Default'); ?> </p>
        <p><input id="<?php echo $this->get_field_id('order'); ?>" name="<?php echo $this->get_field_name('order'); ?>" type="radio" value="title"  <?php echo $order_title; ?> /> <?php _e('Title'); ?> </p>
        <?php 
    }

} // class MCSWidget    

function prepare_categories($categories, $callback = 0)
{
    // Get custom post taxonomies
    $args=array(
      'public'   => true,
      '_builtin' => false
    );    
    
    //$custom = get_taxonomies($args, 'objects');
    if (!empty($custom)) :
    foreach ($custom as $name => $object)
    {
      $custom_taxonomy = get_categories('taxonomy='.$name);
      
      if (!empty($custom_taxonomy))
        $categories = array_merge($categories, $custom_taxonomy);
    }
    endif;
    
    $parents = array();
    $children = array();
    
    $cat_id = NULL;
    
   if (isset($_POST['cat_id'])) : $cat_id = $_POST['cat_id']; endif; 
    
    foreach ($categories as $cat)
    {
        if (!$cat->parent || $cat->parent == $cat_id)
            $parents[] = $cat;
        else
            $children[] = $cat;
    }
    
    $html = '';
    
    foreach ($parents as $p)
    {
        if ($callback)
        $class = ' class="callback"';
    else
        $class = ''; 
    
    $html .= '
    <tr class="select_wrapper">
      <td>
        <select name="wpmm[]" '.$class.'>  
        <option value="0">&raquo; '.apply_filters('single_cat_title', stripslashes(str_replace('"', '', $p->name))).'</option>';
        
        foreach ($children as $c)
        {
            $selected = '';
            
            if (!empty($_SESSION['wpmm_cats']))
            {
                $cats = explode(',', $_SESSION['wpmm_cats']);
                
                foreach ($cats as $cat)
                {
                    if ($cat == $c->cat_ID)
                        $selected = 'selected="selected"';
                }
            }
            
            if ($p->cat_ID == $c->parent)
                $html .= '<option '.$selected.' value="'.$c->cat_ID.'"> '.apply_filters('single_cat_title', stripslashes(str_replace('"', '', $c->name))).'</option>';
        }
        
        $html .= '</select></td></tr>';
    }
    
    if (empty($html))
        return $html;
    
    if ($callback)
        $html .='<br />';
    
    return $html;
}

function prepare_mcsw_form($args, $instance)
{
  extract($args);
  
  $title = apply_filters('widget_title', $instance['title']);   
  global $wpdb;
                                 
  $categories = prepare_categories(get_categories('orderby=name&hide_empty=1&exclude=1,'.$instance['excluded_cats']));
  
  
  echo $before_widget;
  echo $before_title . $title. $after_title .'
  
  <form action="" method="post" class="wpmcsw form">
    <fieldset>
    <input type="hidden" name="ajax_url" class="ajax_url" value="'.admin_url('admin-ajax.php').'"  />
    <input type="hidden" name="ex_cats" class="ex_cats" value="'.$instance['excluded_cats'].'"  />
    <input type="hidden" name="default" value="'.$instance['default_category'].'"  />
    <input type="hidden" name="blank" value="'.$instance['blank_search_type'].'" />
    <input type="hidden" name="order" value="'.$instance['order'].'"  />
    <input type="hidden" name="mcsw" value="1"  />
  <div class="filter row">
  <table class="filter-labels span-4">
	  <tr>
	    <td>What am I craving?</td>
	  </tr>
	  <tr>
	    <td>What day is it?</td>
	  </tr>
	  <tr>
	    <td>What do I want?</td>
	  </tr>
	  <tr>
	    <td>Where do I want it?</td>
	  </tr>
	  <tr>
	    <td>What&apos;s in my wallet?</td>
	  </tr>
	  <tr>
	    <td>What do the Bitches say?</td>
	  </tr>
  </table>
  <table class="filter-selects span-4">    
  ';
  
  echo $categories;
  
  $checked1 = '';
  $checked2 = '';  
  
  if (!isset($_SESSION['wpmm_search_vars']))
    $_SESSION['wpmm_search_vars'] = $instance['def_search_type'];      
  
  //$instance['def_search_type']  $_SESSION['wpmm_search_vars']
  
  if ($_SESSION['wpmm_search_vars'] == 'and')
      $checked2 = 'checked="checked"';
  else 
      $checked1 = 'checked="checked"';

  if (!empty($instance['user_choice']))
  {    
      echo '
      <dl><dt>Search Type</dt>
      <dd><input type="radio" name="mmctype" value="in" '.$checked1.' title="Any" /><label for="mmctype">Any</label><br />
      <input type="radio" name="mmctype" value="and" '.$checked2.' /><label for="mmctype">All</label></dd></dl>
      <input type="submit" value="Search" name="search" class="search" /></fieldset></form>';
  }
  else
  { 
      echo '</table>
      </div>
      <div class="row">
      <div class="span-8">
      <input type="hidden" name="mmctype" value="'.$_SESSION['wpmm_search_vars'].'" />
      <input type="submit" value="Search" name="search" class="search" />
      </div>
      </div>
      </fieldset>
      </form>
      ';
  }
  
  echo '<form action="" method="post" class="wpmcsw reset"><input type="submit" value="Reset" /><input type="hidden" value="1" name="reset_mcsw" /></form>';
  
  echo $after_widget;
}


function mcsw_shortcode_handler( $atts, $content=null, $code="" ) {
  $instance = get_option('mcsw_form');
  $atts = array(    'before_widget' => '',
                    'after_widget' => '',
                    'before_title' => '<h3>', 
                    'after_title' => '</h3>',  ); 
   
  prepare_mcsw_form($atts, $instance);
}

function mcsw_loop_form( ) {

  if (is_category()) :
    
    $form_view = get_option('mcsw_form_display'); 

    if ($form_view) :
      $instance = get_option('mcsw_form');
      $atts = array(    'before_widget' => '',
                        'after_widget' => '',
                        'before_title' => '<h3>', 
                        'after_title' => '</h3>' ); 
     
     prepare_mcsw_form($atts, $instance);
   endif;
  
  endif;
}

/* Chained selection code */

add_action('init', 'do_AJAX_Chain');

function do_AJAX_Chain()
{
  if (!is_admin()) // Don't load the scripts in the admin area ever
  {
    $ajax = get_option('mcsw_ajax');
    
    if ($ajax)
    {
      add_action('wp_print_scripts', 'select_chain_list_scripts');
    }
  }
}

function select_chain_list_scripts ( ) 
{
  wp_enqueue_script( "mcsw-select-chain", path_join(WP_PLUGIN_URL, basename( dirname( __FILE__ ) )."/select-chain.js"), array( 'jquery' ) );
}


add_action('wp_ajax_show_chain', 'show_chain_callback');
add_action('wp_ajax_nopriv_show_chain', 'show_chain_callback');

function show_chain_callback() 
{	
    $categories = prepare_categories(get_categories('child_of='.$_REQUEST['cat_id'].'&orderby=name&hide_empty=1&exclude=1,'.$_REQUEST['ex_cats']), 1);
    
    if ($_POST['cat_id'])
        print '<div class="callback">'.$categories.'</div>';

    die();
}

?>