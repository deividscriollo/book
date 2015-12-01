$(function(){
	// formacion cargado de pagina
	paceOptions = {
      elements: true
    };
});
function info_perfil_sucursal(){
	$.ajax({
		url: 'next/dashboard/app.php',
		type: 'post',
		dataType:'json',
		data: {info_perfil_sucursal:''},
		success: function (data) {
			// personal informacion
			var nombre=data['usuario']['nombre'].split(' ');
			$('#element_nav_nom_personal').html(nombre[2]);
			$('.element_text_nom_personal').html(nombre[2]+' '+nombre[0]);
			// empresarial informacion
			$('.element_text_nom_empresa').html(data['empresa']['nombre']);
			$('#element_nav_nom_empresa').html(data['empresa']['nombre']);
			if (data['empresa']['nombre']=='') {
				$('#element_nav_nom_empresa').html('Perfil Empresa');
				$('.element_text_nom_empresa').html('Perfil Empresa');
			}
			
			
		}
	});
}