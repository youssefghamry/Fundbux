
(function($) {
    "use strict";

    $(document).ready( function() {

		$("button#author_img").on("click", function(event){
			
			event.preventDefault();

			var logoImageUpload = wp.media({
				'title' : "Upload Image",
				'button' : {
					'text' : "Set Profile Image",
				},
				'multiple' : false,
			});

			logoImageUpload.open();

			var button = $(this); 

			logoImageUpload.on("select", function(){

				var image = logoImageUpload.state().get("selection").first().toJSON();

				var image_url = image.url;

				button.next("input.img_link").val( image_url );

				button.parent(".website_fields").find('img').attr('src', image_url );

			});
		});

    }); // end document ready function
})(jQuery); // End jQuery
