<div class="wrap">
	<div id="icon-options-general" class="icon32"><br /></div>
<h2>Multiple Category Selection Settings</h2>

<form method="post" action="options.php">                                                                                                                
<?php settings_fields( 'mcsw' ); ?>
    <?php do_settings_sections( 'mcsw' ); ?>

<p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="<?php _e('Save Changes') ?>"/></p></form>

</div>