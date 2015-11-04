jQuery(function($) {
	// formato input cedula
	$("#txt_ruc").inputmask({mask: "9999999999001"});
	$("#txt_telefono_1").inputmask({mask: "(999)-999-999"});
	$("#txt_telefono_2").inputmask({mask: "(999)-999-999"});
	$("#txt_celular").inputmask({mask: "(99)-9999-9999"});
});