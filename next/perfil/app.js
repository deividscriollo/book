$(function(){

	//editables on first profile page
	$.fn.editable.defaults.mode = 'inline';
	$.fn.editableform.loading = "<div class='editableform-loading'><i class='ace-icon fa fa-spinner fa-spin fa-2x light-blue'></i></div>";
    $.fn.editableform.buttons = '<button type="submit" class="btn btn-info editable-submit"><i class="ace-icon fa fa-check"></i></button>'+
                                '<button type="button" class="btn editable-cancel"><i class="ace-icon fa fa-times"></i></button>';    
	
	$('#avatar').editable({
		type: 'image',
		value: null,
		image: {
			//specify ace file input plugin's options here
			btn_choose: 'Cambiar Foto',
			droppable: true,
			maxSize: 110000,//~100Kb
			//and a few extra ones here
			name: 'avatar',//put the field name here as well, will be used inside the custom plugin
			on_error : function(error_type) {//on_error function will be called when the selected file has a problem
				if(error_type == 1) {//file format error
					$.gritter.add({
						title: 'El archivo no es una imagen!',
						text: 'Por favor, elija un jpg|gif|imagen png !',
						class_name: 'gritter-error gritter-center'
					});
				} else if(error_type == 2) {//file size rror
					$.gritter.add({
						title: 'Archivo muy grande!',
						text: 'Tamaño de la imagen no debe exceder a 100Kb!',
						class_name: 'gritter-error gritter-center'
					});
				}
				else {//other error
				}
			},			
			on_success : function() {
				$.gritter.removeAll();
			}
		},
		url: function(params) {
				var deferred = new $.Deferred
				var value = $('#avatar').next().find('input[type=file]:eq(0)').next().children().children().attr('src');
				$.ajax({
					url: 'next/perfil/app.php',    
					type: 'post',
					data: {archivo:'',id:value},
					success: function (data) {
						console.log(data);
					}
				});
				//dummy upload
				setTimeout(function(){
					console.log('test');
					
					
					if("FileReader" in window) {
						//for browsers that have a thumbnail of selected image
						var thumb = $('#avatar').next().find('img').data('thumb');
						if(thumb) $('#avatar').get(0).src = thumb;
					}
					
					deferred.resolve({'status':'OK'});

				 } , parseInt(Math.random() * 800 + 800))

				return deferred.promise();
				
				// ***END OF UPDATE AVATAR HERE*** //
			},
	 //    url: function(params) {
		// 	// ***UPDATE AVATAR HERE*** //
		// 	//for a working upload example you can replace the contents of this function with 
		// 	//examples/profile-avatar-update.js
		// 	console.log(params);
		// 	var deferred = new $.Deferred

		// 	var value = $('#avatar').next().find('input[type=hidden]:eq(0)').val();
		// 	if(!value || value.length == 0) {
		// 		deferred.resolve();
		// 		return deferred.promise();
		// 	}
		// 	//dummy upload
		// 	setTimeout(function(){
		// 		if("FileReader" in window) {
		// 			//for browsers that have a thumbnail of selected image
		// 			var thumb = $('#avatar').next().find('img').data('thumb');
		// 			if(thumb) $('#avatar').get(0).src = thumb;
		// 		}
		// 		$('#avatar')
		// 		deferred.resolve({'status':'OK'});

		// 		// $.gritter.add({
		// 		// 	title: 'Foto Actualizada!',
		// 		// 	text: 'Uploading to server can be easily implemented. A working example is included with the template.',
		// 		// 	class_name: 'gritter-info gritter-center'
		// 		// });
				
		// 	 } , parseInt(Math.random() * 800 + 800))

		// 	return deferred.promise();
			
		// 	// ***END OF UPDATE AVATAR HERE*** //
		// },
		
		// success: function(response, newValue) {
		// }
	});
	// edicion de perfil dueño empresa
	$('#editable_f_nacimiento').editable({
		type: 'adate',
		date: {
			//datepicker plugin options
			format: 'yyyy/mm/dd',
			viewformat: 'yyyy/mm/dd',
			stardate:'1990/01/02',
			weekStart: 1
			 
			//,nativeUI: true//if true and browser support input[type=date], native browser control will be used
			//,format: 'yyyy-mm-dd',
			//viewformat: 'yyyy-mm-dd'
		}
	});
});

