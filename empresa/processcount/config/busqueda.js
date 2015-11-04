$(function(){
	inicio();
	function inicio(){

		//-------------------------llenar categoria---------------------/
		$("#select_categoria").each(function(){
            $(this).select2($(this).data());
        });
		$.ajax({
			url: 'processcount/app.php',
			type: 'post',
			dataType:'json',
			data: {buscar_categoria:'32vacasdfv'},
			success: function (data) {
				for (var i = 0; i < data.length; i=i+2) {
					$("#select_categoria").append('<option value="'+data[i+0]+'">'+data[i+1]+'</option>');	
				};
			}
		});
		$("#select_categoria").select2().on("change", function(e) {
          // mostly used event, fired to the original element when the value changes
			$('#select_tipo').select2('enable');
			$('#select_tipo').html('<option value=""></option>');
			var id=e.val;
			$.ajax({
				url: 'processcount/app.php',
				type: 'post',
				dataType:'json',
				data: {buscar_tipo:'32vacasdfv', id:id},
				success: function (data) {
					for (var i = 0; i < data.length; i=i+2) {
						$("#select_tipo").append('<option value="'+data[i+0]+'">'+data[i+1]+'</option>');	
					};
				}
			});
        })
		
		//------------------------Informacion Tipo ----------------------//
		$("#select_tipo").each(function(){
            $(this).select2($(this).data());
        }).on('change',function(e){
        	$('#select_actividad').html('<option value=""></option>');
			var id=e.val;
			$.ajax({
				url: 'processcount/app.php',
				type: 'post',
				dataType:'json',
				data: {buscar_actividad:'32vacasdfv', id:id},
				success: function (data) {
					for (var i = 0; i < data.length; i=i+2) {
						$("#select_tipo").append('<option value="'+data[i+0]+'">'+data[i+1]+'</option>');	
					};
				}
			});
        });
        $('#select_tipo').select2('disable');

        
		
}
});