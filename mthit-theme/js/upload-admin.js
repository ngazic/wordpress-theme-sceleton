//this is js for upload button 
console.log('this is js file')
jQuery(document).ready( function($){
	var mediaUploader;
	var container;
		$('body').on('click', '.upload-button', function(e) {
            e.preventDefault();
            console.log('button is pressed')
		container = jQuery(this).parents("*[id]");
		if( mediaUploader ){
			mediaUploader.open();
			return;
		}

		mediaUploader = wp.media.frames.file_frame = wp.media({
			title: 'Choose a Profile Picture',
			button: {
				text: 'Choose Picture'
			},
			multiple: false
		});

		mediaUploader.on('all', function(e) { console.log(this); });
		mediaUploader.on('select', function(){
			attachment = mediaUploader.state().get('selection').first().toJSON();
			var id=container[0].id;
			if(id!=''){
				jQuery("#"+id).find('.upload-picture').val(attachment.url);
				// jQuery("#"+id).find('.upload-picture-preview').css('background-image','url(' + attachment.url + ')').trigger('change');
				jQuery("#"+id).find('.upload-picture-preview')[0].src = attachment.url;
				jQuery("#"+id).find('.upload-picture-preview').trigger('change');
			}
		});

		mediaUploader.open();

	});
});