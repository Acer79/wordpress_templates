<?php


function adonepage_seo($ad_onepage_id) {
	$title_page = get_post_meta( $ad_onepage_id, 'title-page', true );
	$description_page = get_post_meta( $ad_onepage_id, 'description-page', true );
	$keyword_page = get_post_meta( $ad_onepage_id, 'keyword-page', true );
?>
    <!-- SEO -->
    <title>
	<?php
		if($title_page=='') { $title_page = 'Title page'; }
		echo $title_page; 
	?>
    </title>
    <meta name="description" content="
	<?php 		
		if($description_page=='') { $description_page = 'Description Page'; }
		echo $description_page;	
	?>
    ">
    <meta name="keywords" content="
	<?php 		
		if($keyword_page=='') { $keyword_page = 'Keyword'; }
		echo $keyword_page;	  
	?>
    ">
    <!-- END SEO -->
  
<?php } ?>