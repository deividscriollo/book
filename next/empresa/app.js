jQuery(function($){
			
	$('.dd').nestable();

	$('.dd-handle a').on('mousedown', function(e){
		e.stopPropagation();
	});	
	$('[data-rel="tooltip"]').tooltip();


	// baground banner
	var elemento=$('#dc_animated');
  	var pattern = Trianglify({
        width: elemento.width(),
        height: elemento.height()
    });
	elemento.append(pattern.canvas());


	//editables on first profile page
	$.fn.editable.defaults.mode = 'inline';
	$.fn.editableform.loading = "<div class='editableform-loading'><i class='ace-icon fa fa-spinner fa-spin fa-2x light-blue'></i></div>";
    $.fn.editableform.buttons = '<button type="submit" class="btn btn-info editable-submit"><i class="ace-icon fa fa-check"></i></button>'+
                                '<button type="button" class="btn editable-cancel"><i class="ace-icon fa fa-times"></i></button>';    
	// editable imagen
	$('#avatar').editable({
		type: 'image',
		name: 'avatar',
		value: null,
		image: {
			//specify ace file input plugin's options here
			btn_choose: 'Change Avatar',
			droppable: true,
			// maxSize: 110000,//~100Kb

			//and a few extra ones here
			name: 'avatar',//put the field name here as well, will be used inside the custom plugin
			on_error : function(error_type) {//on_error function will be called when the selected file has a problem
				// if(last_gritter) $.gritter.remove(last_gritter);
				// if(error_type == 1) {//file format error
				// 	last_gritter = $.gritter.add({
				// 		title: 'File is not an image!',
				// 		text: 'Please choose a jpg|gif|png image!',
				// 		class_name: 'gritter-error gritter-center'
				// 	});
				// } else if(error_type == 2) {//file size rror
				// 	last_gritter = $.gritter.add({
				// 		title: 'File too big!',
				// 		text: 'Image size should not exceed 100Kb!',
				// 		class_name: 'gritter-error gritter-center'
				// 	});
				// }
				// else {//other error
				// }
			},
			on_success : function() {
				$.gritter.removeAll();
			}
		},
	    url: function(params) {
			// ***UPDATE AVATAR HERE*** //
			//for a working upload example you can replace the contents of this function with 
			//examples/profile-avatar-update.js

			var deferred = new $.Deferred

			var value = $('#avatar').next().find('input[type=hidden]:eq(0)').val();
			if(!value || value.length == 0) {
				deferred.resolve();
				return deferred.promise();
			}


			//dummy upload
			setTimeout(function(){
				if("FileReader" in window) {
					//for browsers that have a thumbnail of selected image
					var thumb = $('#avatar').next().find('img').data('thumb');
					if(thumb) $('#avatar').get(0).src = thumb;
				}
				
				deferred.resolve({'status':'OK'});

				// if(last_gritter) $.gritter.remove(last_gritter);
				// last_gritter = $.gritter.add({
				// 	title: 'Avatar Updated!',
				// 	text: 'Uploading to server can be easily implemented. A working example is included with the template.',
				// 	class_name: 'gritter-info gritter-center'
				// });
				
			 } , parseInt(Math.random() * 800 + 800))

			return deferred.promise();
			
			// ***END OF UPDATE AVATAR HERE*** //
		},
		
		success: function(response, newValue) {
		}
	})
	$('.dropzone').html5imageupload({
		width: 200, 
		height: 200, 
		originalsize:true,
		ghost: false, 
		url: 'next/empresa/app.php',
		image: "next/dashboard/img/logo.jpg",
		data: {customValue: 'here'}
	});
	require(["esri/map", "dojo/domReady!"], function(Map) { 
	  var map = new Map("map", {
	    center: [-78.123203, 0.348663],
	    zoom: 12,
	    basemap: "streets",
	    logo:false
	  });
	});
	// informacion
	buscar_sucursal()


});

function buscar_sucursal(){
	$.ajax({
		url: 'next/empresa/app.php',
		type: 'post',
		data: {info_sucursal:''},
		dataType:'json',
		success: function (data) {
			
		}
	});
}