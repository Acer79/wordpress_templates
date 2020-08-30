<?php
/*
File: inc/menus.php
Description: Plugin Settings Page
Plugin: AD ONE PAGE
Author: Ad-theme.com
*/


function adonepage_settings() {
	
	
	if (!current_user_can('manage_options'))  {

		wp_die( __('You do not have sufficient permissions to access this page.', 'adgallery') );

	}
	
	echo '<h2 class="adonepage_number_menu-title">AD OnePage - Advanced Settings</h2>';
	
?>
   
    <div class="clear"></div>

<?php
	
	if (!empty($_POST['update'])) {
	
	// Check Posted Options
	if(empty($_POST['adonepage_number_menu'])) { $adonepage_number_menu = ''; } else { $adonepage_number_menu = $_POST['adonepage_number_menu']; }

	// Update Options
	update_option('adonepage_number_menu', $adonepage_number_menu );

	}
	// Check Saved Options
	$adonepage_number_menu = get_option( 'adonepage_number_menu', '' );
	
	// Load option fields
	echo '<form method="POST" action="'.$_SERVER['REQUEST_URI'].'">';
	?>

    <h4 class="position"><?php _e('Number Menu Wordpress: ', 'adonepage'); ?></h4>  
      
    <h4 class="position"><?php _e('With this option you can create n wp menu (aspects -> menu) for n ADOnePage: ', 'adonepage'); ?></h4>  
      
    <?php _e('Enter Number Menu (ex: 5): ', 'adonepage'); ?><input type="text" class="adonepage_number_menu" name="adonepage_number_menu" value="<?php echo $adonepage_number_menu; ?>">
    
	
	<?php
	echo '<p><input type="hidden" name="update" value="update">
	<input type="submit" value="'.__('Save Changes', PLG_NAME_ADONEPAGE).'" class="button-primary" id="submit" name="submit"></p>';
	echo '</form>';
	
}