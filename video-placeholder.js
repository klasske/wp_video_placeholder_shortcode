/**
 * Created by kvu022 on 3/25/15.
 */

jQuery(document).ready(function(){
    
    jQuery('img.video_placeholder').on('click', function(){
    	// get the video-src attribute and replace the current item with an iframe
    	var video_src = jQuery(this).data("video-src");
    	var width = jQuery(this).width();
    	var height = jQuery(this).height();
    	
    	
    	jQuery(this).replaceWith(
    			"<iframe src='" + video_src + "' width=" + width + " height=" + height + " frameborder='0'></iframe>"
    			);
    	
    });

});