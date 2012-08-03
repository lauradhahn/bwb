<?php 
  $options = get_option('mcsw_form');
  
  $user_choice = '';
  if (isset($options['user_choice'])) : 
    if ($options['user_choice']):  $user_choice = 'checked="checked"'; endif;
  endif;
  
  $default_checked1 = '';
  $default_checked2 = '';
  if (isset($options['def_search_type'])) : 
    if ($options['def_search_type'] == 'in') :  $default_checked1 = 'checked="checked"'; else: $default_checked2 = 'checked="checked"'; endif; 
  endif;    
  
  $blank_checked1 = '';
  $blank_checked2 = '';  
  if (isset($options['blank_search_type'])) : 
    if ($options['blank_search_type'] == 'none') :  $blank_checked1 = 'checked="checked"'; else: $blank_checked2 = 'checked="checked"'; endif;
  endif;  
  
  $order_checked1 = '';
  $order_checked2 = '';  
  if (isset($options['order'])) : 
    if ($options['order'] == 'default') :  $order_checked1 = 'checked="checked"'; else: $order_checked2 = 'checked="checked"'; endif;
  endif;
  
  if (!isset($options['order'])) : $options['order'] = ''; endif;
  
  if (!isset($options['excluded_cats'])) : $options['excluded_cats'] = ''; endif;    
  
  if (!isset($options['submit_button'])) : $options['submit_button'] = ''; endif;                                    
  
  if (!isset($options['title'])) : $options['title'] = ''; endif;
     
  if (!isset($options['default_category'])) : $options['default_category'] = ''; endif;
?>

<table class="form-table">
<tbody>
<tr valign="top"> 
<th scope="row"><label for="mcsw_form[title]">Form Title</label></th> 
<td><input name="mcsw_form[title]" type="text" id="mcsw_form[title]" value="<?php echo $options['title']; ?>" class="regular-text"/></td> 
</tr>    
<tr valign="top"> 
<th scope="row"><label for="mcsw_form[submit_button]">Submit Button Text</label></th> 
<td><input name="mcsw_form[submit_button]" type="text" id="mcsw_form[submit_button]" value="<?php echo $options['submit_button']; ?>" class="regular-text"/></td> 
</tr>    
<tr valign="top"> 
<th scope="row"><label for="mcsw_form[excluded_cats]">Comma-Seperated Excluded Category IDs</label></th> 
<td><input name="mcsw_form[excluded_cats]" type="text" id="mcsw_form[excluded_cats]" value="<?php echo $options['excluded_cats']; ?>" class="regular-text"/></td> 
</tr>  
<tr valign="top">
<th scope="row">Search Type</th>
<td> <fieldset><legend class="screen-reader-text"><span>User chooses search type</span></legend><label for="mcsw_form[user_choice]">
<input name="mcsw_form[user_choice]" type="checkbox" id="mcsw_form[user_choice]" <?php echo $user_choice; ?> value="1"/> User Choice</label>
</fieldset></td>
</tr>  
<tr>
<th scope="row">Default Search Type</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Default Search Type</span></legend>
	<label title='In'><input type='radio' name='mcsw_form[def_search_type]' value='in' <?php echo $default_checked1; ?> /> <span>Any</span></label><br />
	<label title='And'><input type='radio' name='mcsw_form[def_search_type]' value='and' <?php echo $default_checked2; ?> /> <span>All</span></label><br />
	</fieldset>
</td>
</tr>    
<tr valign="top"> 
<th scope="row"><label for="mcsw_form[default_category]">Default Category ID shown for blank search</label></th> 
<td><input name="mcsw_form[default_category]" type="text" id="mcsw_form[default_category]" value="<?php echo $options['default_category']; ?>" class="regular-text"/></td> 
</tr> 
<tr>
<th scope="row">Blank Search Results</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Blank Search Results</span></legend>
	<label title='None'><input type='radio' name='mcsw_form[blank_search_type]' value='none' <?php echo $blank_checked1; ?> /> <span>None</span></label><br />
	<label title='All'><input type='radio' name='mcsw_form[blank_search_type]' value='all' <?php echo $blank_checked2; ?> /> <span>All, or the default category ID above</span></label><br />
	</fieldset>
</td>
</tr>   
<tr>
<th scope="row">Ordering</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Ordering</span></legend>
	<label title='None'><input type='radio' name='mcsw_form[order]' value='default' <?php echo $order_checked1; ?> /> <span>Default</span></label><br />
	<label title='All'><input type='radio' name='mcsw_form[order]' value='title' <?php echo $order_checked2; ?> /> <span>Title</span></label><br />
	</fieldset>
</td>
</tr>
</tbody>
</table>