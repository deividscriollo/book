jQuery(function($){
	info_perfil_sucursal();
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
		// editstart:true,
		// dimensionsonly:true,
		
		url: 'next/empresa/app.php',
		image: sacar_server,
		data: {customValue: 'edicion_img_empresa'},
		onAfterProcessImage: function() {
    		$(this.element).closest('form').submit();
    		console.log('test');
    	}

	},function(){console.log('test');});
	
	
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
	        mostrar_mapa_principal(latitude, longitude);
	        guardar_posicion_mapa(latitude, longitude);
	      }

		});
	});

	
	// informacion
	buscar_sucursal()
	
	info_sucursal_data()
	busca_informacion()

});

function mostrar_mapa_principal(latitude, longitude){
	$('#map').html('');
		require(["esri/map", "dojo/domReady!"], function(Map) { 
		var map = new Map("map", {
			center: [longitude, latitude],
			zoom: 14,
			basemap: "streets",
			logo:false
		});

	  	var point = new esri.geometry.Point(longitude, latitude);
		point = esri.geometry.geographicToWebMercator(point);
		var symbol = new esri.symbol.PictureMarkerSymbol("next/empresa/img/logomap/logomap.fw.png", 36, 59);
		var graphic = new esri.Graphic(point, symbol);
		var layer = new esri.layers.GraphicsLayer();
		layer.add(graphic);
		map.addLayer(layer);
	});

}
function guardar_posicion_mapa(latitude, longitude){
	var valor = latitude+','+longitude;
	$.ajax({
		url:  'next/empresa/app.php',
		type: 'post',
		data: {guardar_posicion_mapa:'', value:valor},
		dataType:'json'		
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
	var img='next/dashboard/img/logo.jpg';
	$.ajax({
		url: 'next/empresa/app.php',
		type: 'post',
		async:false,
		dataType:'json',
		data: {buscar_imagen:''},
		success: function (data) {
			if (data[0]!='') {
				img='next/empresa/'+data[0];	
			}
		}
	});
	return img;
}
function info_sucursal_data(){
	$.ajax({
		url: 'next/empresa/app.php',
		type: 'post',
		async:false,
		dataType:'json',
		data: {info_sucursal_data:''},
		success: function (data) {
			for (var i = 0; i < data.length; i++) {
				var x=data[i];
				if (x['tipo']=='website') {
					$('#editable_web_site').text(x['data']);
				};
				if (x['tipo']=='correo1') {
					$('#editable_cor1').text(x['data']);
				};
				if (x['tipo']=='correo2') {
					$('#editable_cor2').text(x['data']);
				};
				if (x['tipo']=='correo3') {
					$('#editable_cor3').text(x['data']);
				};
				if (x['tipo']=='tel1') {
					$('#editable_tel1').text(x['data']);
				};
				if (x['tipo']=='tel2') {
					$('#editable_tel2').text(x['data']);
				};
				if (x['tipo']=='tel3') {
					$('#editable_tel3').text(x['data']);
				};
				if (x['tipo']=='descripcion') {
					$('#editable_descripcion').text(x['data']);
				};
				if (x['tipo']=='map') {					
					var posicion=x['data'].split(",");					
					var latitude=posicion[0];
					var longitude=posicion[1];
					var lat=parseFloat(latitude).toFixed(2);
					var lon=parseFloat(longitude).toFixed(2);
					$('#editable_mapa').text(lat+','+lon);					
					mostrar_mapa_principal(latitude, longitude);
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
    $('#editable_web_site').editable({
		type: 'text',
		name: 'editable_web_site',
		url:'next/empresa/app.php',
		pk:'editable-data',
		validate:function(value){
			var res=ValidURL(value);
	       if(ValidURL(value)==false) return 'Por favor solo url validos';
	    }
    });
    $('#editable_cor1').editable({
		type: 'text',
		name: 'editable_cor1',
		url:'next/empresa/app.php',
		pk:'editable_cor1',
		validate:function(value){
			var res=validateEmail(value);
			 if(res==false) return 'Por favor solo correos validos';
		}		
    });
    $('#editable_cor2').editable({
		type: 'text',
		name: 'editable_cor2',
		url:'next/empresa/app.php',
		pk:'editable_cor2',
		validate:function(value){
			var res=validateEmail(value);
			 if(res==false) return 'Por favor solo correos validos';
		}		
    });
    $('#editable_cor3').editable({
		type: 'text',
		name: 'editable_cor3',
		url:'next/empresa/app.php',
		pk:'editable_cor3',
		validate:function(value){
			var res=validateEmail(value);
			 if(res==false) return 'Por favor solo correos validos';
		}		
    });
    $('#editable_tel1').editable({
		type: 'text',
		name: 'editable_tel1',
		url:'next/empresa/app.php',
		pk:'editable_tel1',
		validate:function(value){
			var res=num_tel(value);
			 if(res==false) return 'Por favor solo numeros';
		}		
    });
    $('#editable_tel2').editable({
		type: 'text',
		name: 'editable_tel2',
		url:'next/empresa/app.php',
		pk:'editable_tel2',
		validate:function(value){
			var res=num_tel(value);
			 if(res==false) return 'Por favor solo numeros';
		}		
    });
    $('#editable_tel3').editable({
		type: 'text',
		name: 'editable_tel3',
		url:'next/empresa/app.php',
		pk:'editable_tel3',
		validate:function(value){
			var res=num_tel(value);
			 if(res==false) return 'Por favor solo numeros';
		}		
    });
    $('#editable_descripcion').editable({
		type: 'textarea',
		name: 'editable_descripcion',
		url:'next/empresa/app.php',
		pk:'editable_descripcion'
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
function validateEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
}
function num_tel(tel) {
    var re = /^([0-9])*$/;
    return re.test(tel);
}
