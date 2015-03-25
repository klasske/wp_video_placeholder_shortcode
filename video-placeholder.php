<?php
/*
Plugin Name: Video placeholder shortcode
Plugin URI: https://github.com/klasske/wp_video-placeholder-shortcode
Description: Ligthweight shortcode plugin that avoids preloading videos by loading an image placeholder instead
Version: 0.1
Author: Klaske van Vuurden
Author URI: https://github.com/klasske/
Copyright: Klaske van Vuurden
*/


defined('ABSPATH') or die("Don't access directly!");

//[video_placeholder src="image-url" videosrc="video-url" caption="caption" align="left"]
function video_placeholder_shortcode($atts){
	$a = shortcode_atts( array(
			'src' => includes_url() . 'images/wlw/wp-watermark.png',
			'videosrc' => '',
			'caption' => '',
			'align' => 'left',
			'width' => 0,
			'height' => 0,
			'alt' => '',
			'class' => ''
	), $atts );
   
	ob_start();
	?>

	<div class="<?php echo '' != $a['caption'] ? 'wp-caption ': ''; ?>align<?php echo $a['align']; ?>">
	<img src="<?php echo $a['src']; ?>" 
		 data-video-src="<?php echo $a['videosrc']; ?>"
	     alt="<?php echo $a['alt']; ?>"	     
	     class="video_placeholder<?php 
	     echo ($a['class'] != '') ? ' ' . $a['class'] : ''; 
	     ?>" 
	     <?php echo ($a['width'] > 0) ? 'width="' . $a['width'] . '"' : '' ?>
	     <?php echo ($a['height'] > 0) ? 'height="' . $a['height'] . '"' : '' ?>
	     >
	<?php echo '' != $a['caption'] ? '<p class="wp-caption-text">' . $a['caption'] . '</p>' : ''; ?>
	</div>
	<?php
	return ob_get_clean();
}

//enqueue script (if not already there)
function video_placeholder_scripts() {
    wp_enqueue_script("jquery-video-placeholder", plugins_url("/video-placeholder.js", __FILE__ )  , array('jquery', 'jquery-ui-core'));
}

add_action( 'wp_enqueue_scripts', 'video_placeholder_scripts' );
add_shortcode('video_placeholder', 'video_placeholder_shortcode');


