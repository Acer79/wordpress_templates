<?php
/*
File: inc/shortcodes-charts.php
Description: Shortocodes Functions
Plugin: ADTHEME SHORTCODES
Author: Ad-theme.com
*/

function adop_pie_charts($atts, $content = null)
{

		$random = rand(2,100000);
		extract(
			shortcode_atts(
				array(
					"percent" => '90',
					"bar_color" => '#FFF',
					"track_color" => '#2B2925',
					"width" => '300'
					), 
					$atts)
		);

		if(empty($width) || $width == '') { $width = '300'; }
		$return = '';
		$return .= '<div class="chart-container"><div class="chart-item-container hidden"><div class="chart rand'.$random.' easyPieChart" data-percent="'.$percent.'" data-color="'.$bar_color.'" data-colortrack="'.$track_color.'"><span class="percent">'.$percent.'</span></div></div></div>';
		$return .= '<style type="text/css">
		.chart.rand'.$random.' {
			width: '.$width.'px;
			height: '.$width.'px;
		}
		.rand'.$random.' .percent {
			line-height: '.$width.'px;
			color:'.$bar_color.';
		}
		</style>';
		
		$return .= "<script>
		jQuery(document).ready(function($){
		jQuery('.chart-container').appear(function() {
				var easy_pie_chart = {};
				jQuery('.chart-item-container').removeClass('hidden');
				jQuery('.chart.rand".$random."').each(function() {
				var text_span = jQuery(this).children('span');
				jQuery(this).easyPieChart(jQuery.extend(true, {}, easy_pie_chart, {
				size : ".$width.",
				animate : 2000,
				lineWidth : 6,
				lineCap : 'square',
				barColor : jQuery(this).data('color'),
				lineWidth : 10,
				trackColor : jQuery(this).data('colortrack'),
				scaleColor : false,
				onStep : function(from, to, percent) {
					$(this.el).find('.percent').text(Math.round(percent));
				}
				}));
			}); 
		 });
		}); 				
		</script>
	";
        return $return;
} 

add_shortcode("adop_pie_charts", "adop_pie_charts");			

function adop_bar_charts($atts, $content = null)
{

		$random = rand(2,100000);
		extract(
			shortcode_atts(
				array(
					"percent" => '90',
					"bar_color" => '#FFF',
					"track_color" => '#2B2925',
					"width" => '100%',
					"style" => '',
					), 
					$atts)
		);
	if($width != '100%') { $width = $width.'px'; }	
	$return = '';
	$return .= '<style type="text/css">
	#bar-'.$random.' .bar {
		background:'.$bar_color.';
	}
	#bar-'.$random.'.bar-main-container {
		width:'.$width.';
	}
	</style>';
	$return .= "
	<script>
	jQuery(document).ready(function($){
		jQuery('#bar-".$random."').appear(function() {
			$('.bar-percentage[data-percentage]').each(function () {
			  var progress = $(this);
			  var percentage = Math.ceil($(this).attr('data-percentage'));
			  $({countNum: 0}).animate({countNum: percentage}, {
				duration: 2000,
				easing:'linear',
				step: function() {
				  // What todo on every count
				var pct = '';
				if(percentage == 0){
				  pct = Math.floor(this.countNum) + '%';
				}else{
				  pct = Math.floor(this.countNum+1) + '%';
				}
				progress.text(pct) && progress.siblings().children().css('width',pct);
				}
			  });
			});
		});
	});
	</script>
	";
		
	$return .= '<div id="bar-'.$random.'" class="bar-main-container azure '.$style.'">
			<div class="wrap">
			  <div class="bar-percentage" data-percentage="'.$percent.'"></div>
			  <div class="bar-container">
				<div class="bar"></div>
			  </div>
			</div>
  		  </div>';
		
        return $return;
} 

add_shortcode("adop_bar_charts", "adop_bar_charts");	
		
?>