<?php

function adonepage_custom_css_js($ad_onepage_id) {
	$custom_css = get_post_meta( $ad_onepage_id, 'custom-css', true );
	$custom_js = get_post_meta( $ad_onepage_id, 'custom-js', true );
	if(!empty($custom_css)) {
		?>
	<style type="text/css">
		
		<?php echo $custom_css; ?>
	
	</style>
	
    <?php }
	if(!empty($custom_js)) {
		?>
        <script type="text/javascript">
		
		<?php echo $custom_js; ?>
		
		</script>
        
<?php } 

} ?>