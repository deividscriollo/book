jQuery(function($){
	var global_direccion;
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

	// editable imagen
	$('.dropzone').html5imageupload({
		width: 200, 
		height: 200, 
		originalsize:true,
		ghost: false, 
		url: 'next/empresa/app.php',
		image: sacar_server,
		data: {customValue: 'edicion_img_empresa'},
	});
	
	require(["esri/map", "dojo/domReady!"], function(Map) { 
	  var map = new Map("map", {
	    center: [-78.123203, 0.348663],
	    zoom: 12,
	    basemap: "streets",
	    logo:false
	  });

	});
	$('#btn_buscar_mapa').click(function(){
		$('#my-modal').modal('show');
		$('#map_select').html('');
		require(["esri/map", "dojo/domReady!"], function(Map) { 
		  var map = new Map("map_select", {
		    center: [-78.123203, 0.348663],
		    zoom: 12,
		    basemap: "streets",
		    logo:false
		  });
		  map.on("load", function(){
	        map.infoWindow.resize(250,100);
	      });

	      map.on("click", addPoint);

	      function addPoint(evt) {
	        var latitude = evt.mapPoint.getLatitude();
	        var longitude = evt.mapPoint.getLongitude();
	        var empresa=$('#element_empresa').text();
	        map.infoWindow.setTitle("Mapa seleccionado en este punto");
	        map.infoWindow.setContent(
	        	empresa+' se encuentra en..!! <br>'+
	          "Latitud : " + latitude.toFixed(2) +'<br>'+
	          "Longitud : " + longitude.toFixed(2)
	        );
	        map.infoWindow.show(evt.mapPoint, map.getInfoWindowAnchor(evt.screenPoint));
	        $('#editable_mapa').text(latitude.toFixed(2)+', '+longitude.toFixed(2));

	        guardar_posicion_mapa(latitude, longitude);
	      }

		});
	});
	
	// informacion
	buscar_sucursal()
	
	info_sucursal_data()
	busca_informacion()

});
function guardar_posicion_mapa(latitude, longitude){
	var valor = latitude+','+longitude;
	$.ajax({
		url:  'next/empresa/app.php',
		type: 'post',
		data: {guardar_posicion_mapa:'', value:valor},
		dataType:'json',
		success: function (data) {
			console.log(data);
		}
	});
}
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
function sacar_server(){
	var img='next/dashboard/img/logo.png';
	$.ajax({
		url: 'next/empresa/app.php',
		type: 'post',
		async:false,
		dataType:'json',
		data: {buscar_imagen:''},
		success: function (data) {
			if (data[0]!='') {
				img=data[0];	
			}
		}
	});
	return 'next/empresa/'+img;
}
function info_sucursal_data(){
	$.ajax({
		url: 'next/empresa/app.php',
		type: 'post',
		async:false,
		dataType:'json',
		data: {info_sucursal_data:''},
		success: function (data) {
			console.log(data);
			for (var i = 0; i < data.length; i++) {
				var x=data[i];
				if (x['tipo']=='website') {
					$('#editable_web_site').text(x['data']);
				};
				if (x['tipo']=='mapa') {
					$('#editable_mapa').text(x['data']);
				};
				
			}
		}
	});
}
function busca_informacion(){
	

	//editables on first profile page
	$.fn.editable.defaults.mode = 'inline';
	$.fn.editableform.loading = "<div class='editableform-loading'><i class='ace-icon fa fa-spinner fa-spin fa-2x light-blue'></i></div>";
    $.fn.editableform.buttons = '<button type="submit" class="btn btn-info editable-submit"><i class="ace-icon fa fa-check"></i></button>'+
                                '<button type="button" class="btn editable-cancel"><i class="ace-icon fa fa-times"></i></button>';    
	
	//editables 
	
	//text editable
    $('#editable_web_site')
	.editable({
		type: 'text',
		name: 'editable_web_site',
		url:'next/empresa/app.php',
		pk:'editable-data',
		validate:function(value){
			var res=ValidURL(value);
	       if(ValidURL(value)==false) return 'Por favor solo url validos';
	    }   
    });
}
function ValidURL(str) {
  var urlPattern = new RegExp("(http|ftp|https)://[\w-]+(\.[\w-]+)+([\w.,@?^=%&amp;:/~+#-]*[\w@?^=%&amp;/~+#-])?")
  if(!urlPattern.test(str)) {
    return false;
  } else {
    return true;
  }
}