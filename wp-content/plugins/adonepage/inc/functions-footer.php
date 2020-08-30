<?php

function adonepage_footer($ad_onepage_id) {
	$footer_text = get_post_meta( $ad_onepage_id, 'footer-text', true );
	$active_widget = get_post_meta( $ad_onepage_id, 'active-widget', true );
	$number_column_widget = get_post_meta( $ad_onepage_id, 'number-column-widget', true );	
?>
    <div class="adonepage-footer">

    	<div class="wrapper">
    <?php if($active_widget == 'on') {	 if($number_column_widget == '1') {	?>
    	<div class="column-12">
        	<?php dynamic_sidebar('adonapage-footer-1'); ?>  
        </div>
    <?php } ?>    
    
    <?php if($number_column_widget == '2') { ?>
    	<div class="column-6">
        	<?php dynamic_sidebar('adonapage-footer-1'); ?>
        </div>
    	<div class="column-6">
        	<?php dynamic_sidebar('adonapage-footer-2'); ?>
        </div>     
    
    <?php } ?> 
    
    <?php if($number_column_widget == '3') { ?>
    	<div class="column-4">
        	<?php dynamic_sidebar('adonapage-footer-1'); ?>
        </div>
    	<div class="column-4">
       	 	<?php dynamic_sidebar('adonapage-footer-2'); ?>
        </div>     
    	<div class="column-4">
        	<?php dynamic_sidebar('adonapage-footer-3'); ?>
        </div>      
    <?php } ?>
    
    <?php if($number_column_widget == '4') { ?>
    	<div class="column-3">
        	<?php dynamic_sidebar('adonapage-footer-1'); ?>
        </div>
    	<div class="column-3">
        	<?php dynamic_sidebar('adonapage-footer-2'); ?>
        </div>     
    	<div class="column-3">
        	<?php dynamic_sidebar('adonapage-footer-3'); ?>
        </div> 
    	<div class="column-3">
        	<?php dynamic_sidebar('adonapage-footer-4'); ?>
        </div>                   
    <?php } ?>
    <?php } else { ?>       
           
    	<?php echo do_shortcode($footer_text); ?>
    
    <?php } ?>
    	</div> <!-- END WRAPPER -->
		<div class="adclear"></div>
        <div class="footer-pattern"></div>
    </div>
<?php } ?>