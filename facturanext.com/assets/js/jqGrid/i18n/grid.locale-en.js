;(function($){

$.jgrid = $.jgrid || {};
$.extend($.jgrid,{
	defaults : {
		recordtext: "Mostrando {0} - {1} de {2}",
		emptyrecords: "Sin registros que mostrar",
		loadtext: "Cargando...",
		pgtext : "Página {0} de {1}"
	},
	search : {
		caption: "Búsqueda...",
		Find: "Buscar",
		Reset: "Limpiar",
		odata: [{ oper:'eq', text:'Igual'},{ oper:'ne', text:'no igual a'},{ oper:'lt', text:'less'},{ oper:'le', text:'menor o igual'},{ oper:'gt', text:'mayor'},{ oper:'ge', text:'mayor o igual'},{ oper:'bw', text:'empezando con'},{ oper:'bn', text:'no comienza con'},{ oper:'in', text:'es en'},{ oper:'ni', text:'no está en'},{ oper:'ew', text:'termina con'},{ oper:'en', text:'no termina con'},{ oper:'cn', text:'contenga'},{ oper:'nc', text:'no contiene'},{ oper:'nu', text:'es nulo'},{ oper:'nn', text:'no es nulo'}],
		groupOps: [{ op: "AND", text: "Todos" },{ op: "OR",  text: "General" }],
		operandTitle : "Haga clic para seleccionar la operación de búsqueda.",
		resetTitle : "Reiniciar la Búsqueda"
	},
	edit : {
		addCaption: "Agregar Registro",
		editCaption: "Modificar Registro",
		bSubmit: "Guardar",
		bCancel: "Cancelar",
		bClose: "Close",
		saveData: "Guardar los cambios?",
		bYes : "Si",
		bNo : "No",
		bExit : "Cancelar",
		msg: {
			required:"Campo Obligatorio",
			number:"Por favor, ingrese un número válido",
			minValue:"Valor debe ser mayor que o igual a",
			maxValue:"Valor debe ser menor que o igual a",
			email: "E-mail incorrecto",
			integer: "Por favor, introduzca un valor entero válido",
			date: "Por favor, introduzca una fecha válida",
			url: "No es una URL válida ('http://' or 'https://')",
			nodefined : "No se define!",
			novalue : " Se requiere un valor de retorno!",
			customarray : "Función personalizada debe devolver array!",
			customfcheck : "Función personalizada debe estar presente en caso de comprobación!"
		}
	},
	view : {
		caption: "Consultar Registro",
		bClose: "Cerrar"
	},
	del : {
		caption: "Eliminar",
		msg: "Eliminar registro seleccionado(s)?",
		bSubmit: "Eliminar",
		bCancel: "Cancelar"
	},
	nav : {
		edittext: "",
		edittitle: "Modificar fila selecionada",
		addtext:"",
		addtitle: "Agregar nuevo registro",
		deltext: "",
		deltitle: "Eliminar fila selecionada",
		searchtext: "",
		searchtitle: "Buscar Información",
		refreshtext: "",
		refreshtitle: "Recargar datos",
		alertcap: "Aviso",
		alerttext: "Por favor, seleccione una fila",
		viewtext: "",
		viewtitle: "Ver fila selecionada"
	},
	col : {
		caption: "Seleccione una fila",
		bSubmit: "Ok",
		bCancel: "Cancelar"
	},
	errors : {
		errcap : "Error",
		nourl : "No url is set",
		norecords: "No hay registros que procesar",
		model : "Longitud de colNames <> colModel!"
	},
	formatter : {
		integer : {thousandsSeparator: ",", defaultValue: '0'},
		number : {decimalSeparator:".", thousandsSeparator: ",", decimalPlaces: 2, defaultValue: '0.00'},
		currency : {decimalSeparator:".", thousandsSeparator: ",", decimalPlaces: 2, prefix: "", suffix:"", defaultValue: '0.00'},
		date : {
			dayNames:   [
				"Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb",
				"Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"
			],
			monthNames: [
				"Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic",
				"Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
			],
			AmPm : ["am","pm","AM","PM"],
			S: function (j) {return j < 11 || j > 13 ? ['st', 'nd', 'rd', 'th'][Math.min((j - 1) % 10, 3)] : 'th';},
			srcformat: 'Y-m-d',
			newformat: 'n/j/Y',
			parseRe : /[#%\\\/:_;.,\t\s-]/,
			masks : {
				ISO8601Long:"Y-m-d H:i:s",
				ISO8601Short:"Y-m-d",
				ShortDate: "n/j/Y", 
				LongDate: "l, F d, Y",
				FullDateTime: "l, F d, Y g:i:s A",
				MonthDay: "F d", 
				ShortTime: "g:i A", 
					SortableDateTime: "Y-m-d\\TH:i:s",
				UniversalSortableDateTime: "Y-m-d H:i:sO",
				YearMonth: "F, Y"
			},
			reformatAfterEdit : false
		},
		baseLinkUrl: '',
		showAction: '',
		target: '',
		checkbox : {disabled:true},
		idName : 'id'
	}
});
})(jQuery);