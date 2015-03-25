/**
 * Created by kvu022 on 3/25/15.
 */

jQuery(document).ready(function(){
    
    jQuery('img.video_placeholder').on('click', function(){
    	// get the video-src attribute and replace the current item with an iframe
    	var video_src = jQuery(this).data("video-src");
    	
    	jQuery(this).attr("src", video_src);
    	
    	
    });

});