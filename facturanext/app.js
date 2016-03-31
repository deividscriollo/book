jQuery(function($) {	
    // formato calendario
	$('.date-picker').datepicker({
	    autoclose: true,
	    showOtherMonths: true,
	    format:'yyyy-mm-dd',
	    startView:0   
	}).datepicker('setDate', 'today');

	// maskara
	$('#txt_4').mask('999-999-999999999');

	// rango fechas
	$('input[name=date-range-picker]').daterangepicker({
		'applyClass' : 'btn-sm btn-success',
		'cancelClass' : 'btn-sm btn-default',
		format: 'yyyy-mm-dd',
		locale: {
			applyLabel: 'Aplicar',
			cancelLabel: 'Cancelar',						
		},
	})
	
	var arr = sacarid();
	var facturas = Array();
	var id = arr['id'];		
	var grid_selector = "#grid-table";
	var pager_selector = "#grid-pager";
	var grid_selector_1= "#grid-table_busqueda";
	var pager_selector_1 = "#grid-pager_busqueda";
	var grid_selector_2= "#grid-table_agregar";
	var pager_selector_2 = "#grid-pager_agregar";
	var grid_selector_3 = "#table";
	var pager_selector_3 = "#pager";

	$(window).on('resize.jqGrid', function () {
		$("#grid-table_agregar").jqGrid('setGridWidth', $("#grid_container").width(), true);
    }).trigger('resize');  

    var parent_column = $(grid_selector_2).closest('[class*="col-"]');
	$(document).on('settings.ace.jqGrid' , function(ev, event_name, collapsed) {
		if( event_name === 'sidebar_collapsed' || event_name === 'main_container_fixed' ) {
			//setTimeout is for webkit only to give time for DOM changes and then redraw!!!
			setTimeout(function() {
				$(grid_selector_2).jqGrid( 'setGridWidth', parent_column.width() );
			}, 0);
		}
    })

	validar_session(id);	

	//////////////
	$(".validar").keydown(function(e) {
        tecla = (document.all) ? e.keyCode : e.which; // 2
	    //console.log(e.keyCode)
	    if (tecla==8) return true; // backspace
	    if (tecla==13) return true; // enter
	    if (tecla==9) return true; // tab
	    if (tecla==116) return true; // f5
	    //if (tecla==109) return true; // menos
	    if (tecla==110) return true; // punto
	    //if (tecla==189) return true; // guion
	    if (tecla==39) return true; // atras
	    if (tecla==37) return true; // adelante
	    if (e.ctrlKey && tecla==86) { return true}; //Ctrl v
	    if (e.ctrlKey && tecla==67) { return true}; //Ctrl c
	    if (e.ctrlKey && tecla==88) { return true}; //Ctrl x
	    if (tecla>=96 && tecla<=105) { return true;} //numpad

	    patron = /[0-9]/; // patron

	    te = String.fromCharCode(tecla); 
	    return patron.test(te); // prueba
    });

	$('.chosen-select').chosen({
		width: '100%',
		allow_single_deselect: true,
		no_results_text: "No se encontraron resultados",
		placeholder_text_single: 'Seleccione una opción'
	});

	// buscar proveedor nombre
	var input_nombre = $("#txt_nombre_proveedor_chosen").children().next().children();   
	$(input_nombre).on("keyup",function(input_ci) {
		var text = $(this).children().val();
		if(text != "") {
		    $.ajax({        
		        type: "POST",
		        dataType: 'json', 
		        url: "mod_cell.php?fn=9&val="+text,       
		        success: function(data, status) {

		        $('#txt_nombre_proveedor').html("");            
		            for (var i = 0; i < data.length; i = i+4) {                                                 
		              appendToChosen(data[i],data[i+1],text,data[i+2],data[i+3],"txt_nombre_proveedor","txt_nombre_proveedor_chosen");
		            }           
		            $('#txt_nro_identificacion').html("");
		            $('#txt_nro_identificacion').append($("<option data-extra='"+data[1]+"'></option>").val(data[0]).html(data[2])).trigger('chosen:updated');                    
		            $('#txt_nombre_comercial').html("");
		            $('#txt_nombre_comercial').append($("<option data-comercial='"+data[3]+"'></option>").val(data[0]).html(data[3])).trigger('chosen:updated');                    
		            $("#id_proveedor").val(data[0]);
		        },
		        error: function (data) {
		        }         
		    });
		}
    });

    $("#txt_nombre_proveedor").chosen().change(function (event, params) {    
	    if(params == undefined) {      
	      $('#txt_nro_identificacion').html("");
	      $('#txt_nro_identificacion').append($("<option></option>"));          
	      $('#txt_nro_identificacion').trigger('chosen:updated')
	      $('#txt_nombre_proveedor').html("");
	      $('#txt_nombre_proveedor').append($("<option></option>"));          
	      $('#txt_nombre_proveedor').trigger('chosen:updated');
	      $('#txt_nombre_comercial').html("");
	      $('#txt_nombre_comercial').append($("<option></option>"));          
	      $('#txt_nombre_comercial').trigger('chosen:updated');      
	      $("#id_proveedor").val("")            
	    } else {        
	      var a = $("#txt_nombre_proveedor option:selected");            
	      $('#txt_nro_identificacion').html("");
	      $('#txt_nro_identificacion').append($("<option data-extra='"+$(a).text()+"'></option>").val($(a).val()).html($(a).data("extra"))).trigger('chosen:updated');
	      $('#txt_nombre_comercial').html("");
	      $('#txt_nombre_comercial').append($("<option data-comercial='"+$(a).text()+"'></option>").val($(a).val()).html($(a).data("comercial"))).trigger('chosen:updated');
	      $("#id_proveedor").val($(a).val());
	        console.log($(a).text())  
	    }
	});
	//fin buscador nombre proveedor

	//buscador proveedor identificacion
	var input_ci = $("#txt_nro_identificacion_chosen").children().next().children();		
	$(input_ci).on("keyup",function(input_ci) {
	  	var text = $(this).children().val();
	    if(text != "") {
			$.ajax({        
		        type: "POST",
		        dataType: 'json',        
		        url: "mod_cell.php?fn=6&val="+text,        
		        success: function(data, status) {
		          $('#txt_nro_identificacion').html("");	        	
		          for (var i = 0; i < data.length; i=i+4) {            				            		            	
		            appendToChosen(data[i],data[i+1],text,data[i+2],data[i+3],"txt_nro_identificacion","txt_nro_identificacion_chosen");
		          }		        
		          $('#txt_nombre_proveedor').html("");
		          $('#txt_nombre_proveedor').append($("<option data-extra='"+data[1]+"'></option>").val(data[0]).html(data[2])).trigger('chosen:updated');                    
		          $('#txt_nombre_comercial').html("");
		          $('#txt_nombre_comercial').append($("<option data-comercial='"+data[3]+"'></option>").val(data[0]).html(data[3])).trigger('chosen:updated');                    
		          $("#id_proveedor").val(data[0])            
		        },
		        error: function (data) {		        
		        }	        
	        });
	    }
	});	

	$("#txt_nro_identificacion").chosen().change(function (event,params) {
	    if(params == undefined){      
	      $('#txt_nro_identificacion').html("");
	      $('#txt_nro_identificacion').append($("<option></option>"));          
	      $('#txt_nro_identificacion').trigger('chosen:updated')
	      $('#txt_nombre_proveedor').html("");
	      $('#txt_nombre_proveedor').append($("<option></option>"));          
	      $('#txt_nombre_proveedor').trigger('chosen:updated');
	      $('#txt_nombre_comercial').html("");
	      $('#txt_nombre_comercial').append($("<option></option>"));          
	      $('#txt_nombre_comercial').trigger('chosen:updated');      
	      $("#id_proveedor").val("");            
	    } else {        
	      	var a = $("#txt_nro_identificacion option:selected");            
	      	$('#txt_nombre_proveedor').html("");
	     	$('#txt_nombre_proveedor').append($("<option data-extra='"+$(a).text()+"'></option>").val($(a).val()).html($(a).data("extra"))).trigger('chosen:updated');
	     	$('#txt_nombre_comercial').html("");
	        $('#txt_nombre_comercial').append($("<option data-comercial='"+$(a).text()+"'></option>").val($(a).val()).html($(a).data("comercial"))).trigger('chosen:updated');
	        $("#id_proveedor").val($(a).val());
	    }
	}); 
	// fin buscador identificacion

	//buscador nombre comercial
	var input_ci = $("#txt_nombre_comercial_chosen").children().next().children();		
	$(input_ci).on("keyup",function(input_ci) {
	  	var text = $(this).children().val();
	    if(text != "") {
			$.ajax({        
		        type: "POST",
		        dataType: 'json',        
		        url: "mod_cell.php?fn=10&val="+text,        
		        success: function(data, status) {
		          $('#txt_nombre_comercial').html("");	        	
		          for (var i = 0; i < data.length; i=i+4) {            				            		            	
		            appendToChosen(data[i],data[i+1],text,data[i+2],data[i+3],"txt_nombre_comercial","txt_nombre_comercial_chosen");
		          }		        
		          $('#txt_nro_identificacion').html("");
		          $('#txt_nro_identificacion').append($("<option data-extra='"+data[3]+"'></option>").val(data[0]).html(data[3])).trigger('chosen:updated');                    
		          $('#txt_nombre_proveedor').html("");
		          $('#txt_nombre_proveedor').append($("<option data-comercial='"+data[1]+"'></option>").val(data[0]).html(data[2])).trigger('chosen:updated'); 
		          $("#id_proveedor").val(data[0])            
		        },
		        error: function (data) {		        
		        }	        
	        });
	    }
	});	

	$("#txt_nombre_comercial").chosen().change(function (event,params) {
	    if(params == undefined){      
	      $('#txt_nro_identificacion').html("");
	      $('#txt_nro_identificacion').append($("<option></option>"));          
	      $('#txt_nro_identificacion').trigger('chosen:updated')
	      $('#txt_nombre_proveedor').html("");
	      $('#txt_nombre_proveedor').append($("<option></option>"));          
	      $('#txt_nombre_proveedor').trigger('chosen:updated');
	      $('#txt_nombre_comercial').html("");
	      $('#txt_nombre_comercial').append($("<option></option>"));          
	      $('#txt_nombre_comercial').trigger('chosen:updated');      
	      $("#id_proveedor").val("");            
	    } else {        
	      	var a = $("#txt_nombre_comercial option:selected");
	      	$('#txt_nro_identificacion').html("");
	        $('#txt_nro_identificacion').append($("<option  data-comercial='"+$(a).text()+"'></option>").val($(a).val()).html($(a).data("comercial"))).trigger('chosen:updated');            
	      	$('#txt_nombre_proveedor').html("");
	     	$('#txt_nombre_proveedor').append($("<option data-extra='"+$(a).text()+"'></option>").val($(a).val()).html($(a).data("extra"))).trigger('chosen:updated');
	        $("#id_proveedor").val($(a).data("extra"));
	    }
	}); 
	// fin buscador identificacion

	//resize to fit page size
	$(window).on('resize.jqGrid', function () {					
		var act = $("#myTab li.active").children().attr('href');
		var act = $(act).children().children().next().attr('id')				
		$(grid_selector).jqGrid( 'setGridWidth', $("#"+act).width() );
		$(grid_selector_1).jqGrid( 'setGridWidth', $("#"+act).width() );		
		$(grid_selector_2).jqGrid( 'setGridWidth', $("#"+act).width() );					
    })

	//resize on sidebar collapse/expand
	var parent_column = $(grid_selector).closest('[class*="col-"]');	
	$(document).on('settings.ace.jqGrid' , function(ev, event_name, collapsed) {		
		if( event_name === 'sidebar_collapsed' || event_name === 'main_container_fixed' ) {
			//setTimeout is for webkit only to give time for DOM changes and then redraw!!!
			setTimeout(function() {
				$(grid_selector).jqGrid('setGridWidth', parent_column.width());				
			}, 0);
		}
    });

    jQuery(grid_selector).jqGrid({				    	
	    url: 'xml_correos.php?id='+id,                		
	    datatype: "xml",
        mtype: "GET",
        autoencode: false,
		height: 250,
		colNames:['ID','DOCUMENTO','RAZÓN SOCIAL', 'TIPO CONSUMO', 'FECHA EMISIÓN','CORREO',''],
		colModel:[			
			{name:'id',index:'id',frozen:true,align:'left',search:false,editable: true, hidden: true, editoptions: {readonly: 'readonly'}},
            {name:'tipo_consumo',index:'tipo_consumo',frozen : true,align:'left',search:true,width:95},
            {name:'razon_social',index:'razon_social',frozen : true,align:'left',search:true,width:310},            
            {name:'consumo',index:'consumo',width:120, editable: true,formatter: 'select',edittype:"select",editoptions: {
                        value: {
							'4':'Alimentación',
							'1':'Auto y Transporte',
							'2':'Educación',
							'9':'Electrónicos',
							'3':'Entretenimiento',
							'12':'Financiero / Banco',
							'6':'Hogar',
							'17':'Honorarios Profesionales',
							'18':'Impuestos y Tributos',
							'15':'Mascota',
							'11':'Otros',
							'5S':'Salud',
							'13':'Seguro',
							'16':'Servicios Básicos',
							'14':'Telecomunicación / Internet',
							'7':'Vestimenta',
							'8':'Viajes',
							'10':'Vivienda',
							'0':'Sin Asignar',                            
                        },
                        dataEvents: [
                                {
                                	type: 'change',
						            fn: function(e) {						                						                
					                    var row = $(e.target).closest('tr.jqgrow');						                    
					                    var rowId = row.attr('id');
					                    jQuery("#grid-table").saveRow(rowId, false);
						            }
                                }
                            ]
                    }},
            {name:'fecha_correo',index:'fecha_correo',frozen : true,align:'left',search:false},
            {name:'remitente',index:'remitente',frozen : true,align:'left',search:false},                        
            {name:'remitente',index:'remitente',frozen : true,align:'left',search:false},                        
		],
		// viewrecords : true,
		rownumbers: true,
		rowNum:10,
		height: 350,
		rowList:[10,50,100,150],
		pager : pager_selector,
		altRows: true,
		sortname: 'id',
	    sortorder: 'asc',
	    cellEdit: true,
    	cellsubmit : 'remote',
    	shrinktofit:true,
		cellurl : 'mod_cell.php?fn=1',
		loadComplete : function() {
			var table = this;			
			setTimeout(function(){
				styleCheckbox(table);
				updateActionIcons(table);
				updatePagerIcons(table);
				enableTooltips(table);
			}, 0);
		},
		caption: "FACTURA NEXT"
	});

	$(window).triggerHandler('resize.jqGrid');//trigger window resize to make the grid get the correct size		
	//enable search/filter toolbar
	//jQuery(grid_selector).jqGrid('filterToolbar',{defaultSearch:true,stringResult:true})
	//jQuery(grid_selector).filterToolbar({});
	//switch element when editing inline
	function aceSwitch( cellvalue, options, cell ) {
		setTimeout(function(){
			$(cell) .find('input[type=checkbox]').addClass('ace ace-switch ace-switch-5').after('<span class="lbl"></span>');
		}, 0);
	}

	function sacarid() {
		var x;
		$.ajax({
			url: 'mod_cell.php',
			type: 'POST',
			dataType: 'json',
			data: {object_id: '5'},
			async:false,
			success:function(data) {
				x=data;
			}
		});
		return x;
	}

	//enable datepicker
	function pickDate( cellvalue, options, cell ) {
		setTimeout(function(){
			$(cell) .find('input[type=text]').datepicker({format:'yyyy-mm-dd' , autoclose:true}); 
		}, 0);
	}

	//navButtons
	jQuery(grid_selector).jqGrid('navGrid',pager_selector,
		{ 	//navbar options
			edit: false,
			editicon : 'ace-icon fa fa-pencil blue',
			add: false,
			addicon : 'ace-icon fa fa-plus-circle purple',
			del: false,
			delicon : 'ace-icon fa fa-trash-o red',
			search: true,
	        searchicon : 'ace-icon fa fa-search orange',
	        searchtext: 'Buscar',
			refresh: true,
			refreshicon : 'ace-icon fa fa-refresh green',
			refreshtext: 'Actualizar',
			view: true,
			viewicon : 'ace-icon fa fa-search-plus grey',
			viewtext: 'Ver Fila',
		},
		{
			recreateForm: true,
			beforeShowForm : function(e) {
				var form = $(e[0]);
				form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
				style_edit_form(form);
			}
		},
		{
			closeAfterAdd: true,
			recreateForm: true,
			viewPagerButtons: false,
			beforeShowForm : function(e) {
				var form = $(e[0]);
				form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar')
				.wrapInner('<div class="widget-header" />')
				style_edit_form(form);
			}
		},
		{
			//delete record form
			recreateForm: true,
			beforeShowForm : function(e) {
				var form = $(e[0]);
				if(form.data('styled')) return false;
				
				form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
				style_delete_form(form);
				
				form.data('styled', true);
			},
			onClick : function(e) { }
		},
		{
			//search form
			recreateForm: true,
			caption : 'Busqueda',
			afterShowSearch: function(e){
				var form = $(e[0]);
				form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
				style_search_form(form);
			},
			afterRedraw: function(){
				style_search_filters($(this));
			},
			// multipleSearch: true,
			overlay: false,
	        sopt: ['eq', 'cn'],
	        defaultSearch: 'eq', 
		},
		{
			//view record form
			recreateForm: true,
			width: 500,
			caption : 'Vista Previa',
			beforeShowForm: function(e){
				var form = $(e[0]);
				form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
			}
		}
	)

	////////////////otra////////////////////
	var parent_column_1 = $(grid_selector_1).closest('[class*="col-"]');
	$(document).on('settings.ace.jqGrid' , function(ev, event_name, collapsed) {
		if( event_name === 'sidebar_collapsed' || event_name === 'main_container_fixed' ) {
			//setTimeout is for webkit only to give time for DOM changes and then redraw!!!
			setTimeout(function() {
				$(grid_selector_1).jqGrid( 'setGridWidth', parent_column_1.width() );
			}, 0);
		}
    });

    ////// Tabla buscadores facturas en general ////////
    jQuery(grid_selector_1).jqGrid({				    	
	    //url: 'xml_busqueda.php?id='+id,                		
	    datatype: "xml",
        mtype: "GET",
        autoencode: false,
		height: 250,
		colNames:['ID','NRO FACTURA','id_proveedor','PROVEEDOR','SUBTOTAL','IMPUESTOS','PROPINA','TOTAL','FECHA EMISIÓN'],
		colModel:[			
			{name:'id',index:'id',frozen:true,align:'left',search:false,editable: true, hidden: true, editoptions: {readonly: 'readonly'}},
            {name:'num_factura',index:'num_factura',frozen : true,align:'left',search:true},
            {name:'id_proveedor',index:'id_proveedor',frozen : true,align:'left',search:true,hidden: true, editoptions: {readonly: 'readonly'}},                        	   
            {name:'nombre_proveedor',index:'nombre_proveedor',frozen : true,align:'left',search:false},
            {name:'subtotal',index:'subtotal',frozen : true,align:'left',search:false,sorttype:'number',formatter:'number',summaryType:'sum'},                        
            {name:'impuestos',index:'impuestos',frozen : true,align:'left',search:false,sorttype:'number',formatter:'number',summaryType:'sum'},                        
            {name:'propina',index:'propina',frozen : true,align:'left',search:false,sorttype:'number',formatter:'number',summaryType:'sum'},                        
            {name:'total_factura',index:'total_factura',frozen : true,align:'left',search:false,sorttype:'number',formatter:'number',summaryType:'sum'},                        
            {name:'fecha_emision',index:'fecha_emision',frozen : true,align:'left',search:false},         
		],
		viewrecords : true,
		rownumbers: true,
		rowNum:50,
		rowList:[50,100,150],
		pager : pager_selector_1,
		altRows: true,
		sortname: 'id',
	    sortorder: 'asc',	    
        footerrow: true,
    	userDataOnFooter: true,
		caption: "FACTURA NEXT",		
		loadComplete : function() {
			var table = this;			
			setTimeout(function() {
				styleCheckbox(table);
				updateActionIcons(table);
				updatePagerIcons(table);
				enableTooltips(table);
			}, 0);
			var colSum = $("#grid-table_busqueda").jqGrid('getCol','subtotal',false,'sum');
			$("#grid-table_busqueda").jqGrid('footerData','set', {num_factura: 'Totales', subtotal:colSum});

			var colSum = $("#grid-table_busqueda").jqGrid('getCol','impuestos',false,'sum');
			$("#grid-table_busqueda").jqGrid('footerData','set', {impuestos:colSum});

			var colSum = $("#grid-table_busqueda").jqGrid('getCol','propina',false,'sum');
			$("#grid-table_busqueda").jqGrid('footerData','set', {propina:colSum});

			var colSum = $("#grid-table_busqueda").jqGrid('getCol','total_factura',false,'sum');
			$("#grid-table_busqueda").jqGrid('footerData','set', {total_factura:colSum});
		},						
	});	

	$(window).triggerHandler('resize.jqGrid');//trigger window resize to make the grid get the correct size

	//switch element when editing inline
	function aceSwitch(cellvalue, options, cell ) {
		setTimeout(function(){
			$(cell) .find('input[type=checkbox]')
				.addClass('ace ace-switch ace-switch-5')
				.after('<span class="lbl"></span>');
		}, 0);
	}

	//enable datepicker
	function pickDate(cellvalue, options, cell ) {
		setTimeout(function(){
			$(cell) .find('input[type=text]').datepicker({format:'yyyy-mm-dd' , autoclose:true}); 
		}, 0);
	}

	//navButtons
	jQuery(grid_selector_1).jqGrid('navGrid',pager_selector_1,
		{ 	//navbar options
			edit: false,
			editicon : 'ace-icon fa fa-pencil blue',
			add: false,
			addicon : 'ace-icon fa fa-plus-circle purple',
			del: false,
			delicon : 'ace-icon fa fa-trash-o red',
			search: false,
			searchicon : 'ace-icon fa fa-search orange',
			searchtext: 'Buscar',
			refresh: true,
			refreshicon : 'ace-icon fa fa-refresh green',
			refreshtext: 'Actualizar',
			view: true,
			viewicon : 'ace-icon fa fa-search-plus grey',
			viewtext: 'Ver Fila',
		},
		{
			//edit record form
			//closeAfterEdit: true,
			//width: 700,
			recreateForm: true,
			beforeShowForm : function(e) {
				var form = $(e[0]);
				form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
				style_edit_form(form);
			}
		},
		{
			//new record form
			//width: 700,
			closeAfterAdd: true,
			recreateForm: true,
			viewPagerButtons: false,
			beforeShowForm : function(e) {
				var form = $(e[0]);
				form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar')
				.wrapInner('<div class="widget-header" />')
				style_edit_form(form);
			}
		},
		{
			//delete record form
			recreateForm: true,
			beforeShowForm : function(e) {
				var form = $(e[0]);
				if(form.data('styled')) return false;
				
				form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
				style_delete_form(form);
				
				form.data('styled', true);
			},
			onClick : function(e) { }
		},
		{
			//search form
			recreateForm: true,
			caption : 'Busqueda',
			afterShowSearch: function(e){
				var form = $(e[0]);
				form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
				style_search_form(form);
			},
			afterRedraw: function(){
				style_search_filters($(this));
			},
			// multipleSearch: true,
			/**
			multipleGroup:true,
			showQuery: true
			*/
		},
		{
			//view record form
			recreateForm: true,
			width: 500,
			caption : 'Vista Previa',
			beforeShowForm: function(e) {
				var form = $(e[0]);
				form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
			}
		}
	)

	/////////////////////////buscador facturas electronicas//////////////////////////////
    //cambiar el tamaño para ajustarse al tamaño de la página
    $(window).on('resize.jqGrid', function () {
        //$(grid_selector).jqGrid( 'setGridWidth', $("#myModal").width());	        
        $(grid_selector_3).jqGrid( 'setGridWidth', $("#myModal .modal-dialog").width()-30);
    })

    //cambiar el tamaño de la barra lateral collapse/expand
    var parent_column = $(grid_selector).closest('[class*="col-"]');
    $(document).on('settings.ace.jqGrid' , function(ev, event_name, collapsed) {
        if( event_name === 'sidebar_collapsed' || event_name === 'main_container_fixed' ) {
            //para dar tiempo a los cambios de DOM y luego volver a dibujar!!!
            setTimeout(function() {
                $(grid_selector_3).jqGrid( 'setGridWidth', parent_column.width() );
            }, 0);
        }
    })

    jQuery(grid_selector_3).jqGrid({	        
        datatype: "xml",
        url: 'xml_facturas_fisicas.php?id='+id,        
        colNames: ['ID','RUC PROVEEDOR','NOMBRE PROVEEDOR','FECHA EMISIÓN','SERIE','MONTO TOTAL'],
        colModel:[     
            {name:'id',index:'id',frozen:true,align:'left',search:false, hidden: true},
            {name:'ruc_proveedor',index:'ruc_proveedor',frozen : true,align:'left',search:true, width:120},
            {name:'nombre_proveedor',index:'nombre_proveedor',frozen : true,align:'left',search:true,width: 300},
            {name:'fecha_emision',index:'fecha_emision',frozen : true,align:'left',search:false,width:100},
            {name:'num_fac',index:'num_fac',frozen : true,align:'left',search:true},
            {name:'total_fac',index:'total_fac',frozen : true,align:'left',search:false,width:100} 
        ],          
        rowNum: 10,       
        width:600,
        shrinkToFit: false,
        height:200,
        rowList: [10,20,30],
        pager: pager_selector_3,
        altRows: true,
		multiselect: true,
        multiboxonly: true,        
        sortname: 'id_usuario',
        sortorder: 'asc',
        caption: 'LISTA FACTURAS',	        
        viewrecords : true,
        loadComplete : function() {
            var table = this;
            setTimeout(function(){
                styleCheckbox(table);
                updateActionIcons(table);
                updatePagerIcons(table);
                enableTooltips(table);
            }, 0);
        },
     
        ondblClickRow: function(rowid) {     	            	             	            
        },
    });

    $(window).triggerHandler('resize.jqGrid');//cambiar el tamaño para hacer la rejilla conseguir el tamaño correcto

    function aceSwitch( cellvalue, options, cell ) {
        setTimeout(function(){
            $(cell) .find('input[type=checkbox]').addClass('ace ace-switch ace-switch-5').after('<span class="lbl"></span>');
        }, 0);
    }	    	   
    //navButtons
    jQuery(grid_selector_3).jqGrid('navGrid',pager_selector_3,
    {   //navbar options
        edit: false,
        editicon : 'ace-icon fa fa-pencil blue',
        add: false,
        addicon : 'ace-icon fa fa-plus-circle purple',
        del: false,
        delicon : 'ace-icon fa fa-trash-o red',
        refresh: true,
        refreshicon : 'ace-icon fa fa-refresh green',
        search: true,
        searchicon : 'ace-icon fa fa-search orange',
        searchtext: 'Buscar',
        view: false,
        viewicon : 'ace-icon fa fa-search-plus grey'
    },
    {	        
        recreateForm: true,
        beforeShowForm : function(e) {
            var form = $(e[0]);
            form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
            style_edit_form(form);
        }
    },
    {
        //new record form
        //width: 700,
        closeAfterAdd: true,
        recreateForm: true,
        viewPagerButtons: false,
        beforeShowForm : function(e) {
            var form = $(e[0]);
            form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar')
            .wrapInner('<div class="widget-header" />')
            style_edit_form(form);
        }
    },
    {
        //delete record form
        recreateForm: true,
        beforeShowForm : function(e) {
            var form = $(e[0]);
            if(form.data('styled')) return false;
            form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
            style_delete_form(form);
            form.data('styled', true);
        },

        onClick : function(e) { }
    },
    {
        recreateForm: true,
        afterShowSearch: function(e){
            var form = $(e[0]);
            form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
            style_search_form(form);

            console.log(form)
        },
        afterRedraw: function(){
            style_search_filters($(this));
        },
       
        //multipleSearch: true
        overlay: false,
        sopt: ['eq', 'cn'],
        defaultSearch: 'eq',            	       
      },
    {
        //view record form
        recreateForm: true,
        beforeShowForm: function(e){
            var form = $(e[0]);
            form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')  
        }
    });

	jQuery(grid_selector_3).jqGrid('navButtonAdd',pager_selector_3, {caption: "Anular",buttonicon: "ace-icon fa fa-times red2",title:'Anular Facturas',
	       onClickButton: function() {
	       	var s;
			s = jQuery(grid_selector_3).jqGrid('getGridParam','selarrrow');
			if(s == '') {
				$.gritter.add({
					title: 'Seleccione la Factura Anular',
					class_name: 'gritter-error gritter-center',
					time: 1000,
				});
			} else {
				$('#confirma').modal('show');
			}
	    }
	});
    
    function style_edit_form(form) {
        //enable datepicker on "sdate" field and switches for "stock" field
        form.find('input[name=sdate]').datepicker({format:'yyyy-mm-dd' , autoclose:true})
        
        form.find('input[name=stock]').addClass('ace ace-switch ace-switch-5').after('<span class="lbl"></span>');
            
        //update buttons classes
        var buttons = form.next().find('.EditButton .fm-button');
        buttons.addClass('btn btn-sm').find('[class*="-icon"]').hide();//ui-icon, s-icon
        buttons.eq(0).addClass('btn-primary').prepend('<i class="ace-icon fa fa-check"></i>');
        buttons.eq(1).prepend('<i class="ace-icon fa fa-times"></i>')
        
        buttons = form.next().find('.navButton a');
        buttons.find('.ui-icon').hide();
        buttons.eq(0).append('<i class="ace-icon fa fa-chevron-left"></i>');
        buttons.eq(1).append('<i class="ace-icon fa fa-chevron-right"></i>');       
    }

    function style_delete_form(form) {
        var buttons = form.next().find('.EditButton .fm-button');
        buttons.addClass('btn btn-sm btn-white btn-round').find('[class*="-icon"]').hide();//ui-icon, s-icon
        buttons.eq(0).addClass('btn-danger').prepend('<i class="ace-icon fa fa-trash-o"></i>');
        buttons.eq(1).addClass('btn-default').prepend('<i class="ace-icon fa fa-times"></i>')
    }
    
    function style_search_filters(form) {
        form.find('.delete-rule').val('X');
        form.find('.add-rule').addClass('btn btn-xs btn-primary');
        form.find('.add-group').addClass('btn btn-xs btn-success');
        form.find('.delete-group').addClass('btn btn-xs btn-danger');
    }

    function style_search_form(form) {
        var dialog = form.closest('.ui-jqdialog');
        var buttons = dialog.find('.EditTable')
        buttons.find('.EditButton a[id*="_reset"]').addClass('btn btn-sm btn-info').find('.ui-icon').attr('class', 'ace-icon fa fa-retweet');
        buttons.find('.EditButton a[id*="_query"]').addClass('btn btn-sm btn-inverse').find('.ui-icon').attr('class', 'ace-icon fa fa-comment-o');
        buttons.find('.EditButton a[id*="_search"]').addClass('btn btn-sm btn-purple').find('.ui-icon').attr('class', 'ace-icon fa fa-search');
    }
    
    function beforeDeleteCallback(e) {
        var form = $(e[0]);
        if(form.data('styled')) return false;
        
        form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
        style_delete_form(form);
        form.data('styled', true);
    }
    
    function beforeEditCallback(e) {
        var form = $(e[0]);
        form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
        style_edit_form(form);
    }

    function styleCheckbox(table) { }
    
    function updateActionIcons(table) { }
    
    //replace icons with FontAwesome icons like above
    function updatePagerIcons(table) {
        var replacement = 
            {
            'ui-icon-seek-first' : 'ace-icon fa fa-angle-double-left bigger-140',
            'ui-icon-seek-prev' : 'ace-icon fa fa-angle-left bigger-140',
            'ui-icon-seek-next' : 'ace-icon fa fa-angle-right bigger-140',
            'ui-icon-seek-end' : 'ace-icon fa fa-angle-double-right bigger-140'
        };
        $('.ui-pg-table:not(.navtable) > tbody > tr > .ui-pg-button > .ui-icon').each(function() {
            var icon = $(this);
            var $class = $.trim(icon.attr('class').replace('ui-icon', ''));
            if($class in replacement) icon.attr('class', 'ui-icon '+replacement[$class]);
        })
    }

    function enableTooltips(table) {
        $('.navtable .ui-pg-button').tooltip({container:'body'});
        $(table).find('.ui-pg-div').tooltip({container:'body'});
    }

    $(document).one('ajaxloadstart.page', function(e) {
        $(grid_selector_3).jqGrid('GridUnload');
        $('.ui-jqdialog').remove();
    });

	jQuery(grid_selector_2).jqGrid({				    		    	            
        autoencode: false,
        datatype: "local",
		height: 250,
		colNames:['','ID','CANTIDAD','DESCRIPCIÓN','CÓDIGO','PRECIO UNITARIO','DESCUENTO','CAL-DES','PRECIO TOTAL', '% IVA 12', 'INCLUYE IVA'],
		colModel:[
			{name:'myac', width: 50, fixed: true, sortable: false, resize: false, formatter: 'actions',
		        formatoptions: {keys: false, delbutton: true, editbutton: false}
		    },
			{name:'id',index:'id', frozen:true,align:'left',search:false,editable: true, hidden: true, editoptions: {readonly: 'readonly'}},
			{name:'cantidad_fac', index:'cantidad_fac',editable:true, width: null, editrules: {required: false,number:true}, editoptions:{maxlength: 10, size:15,dataInit: function(elem){$(elem).bind("keypress", function(e) {return numeros(e)})}}},
            {name:'descripcion_fac', index:'descripcion_fac', frozen: true, editable:true, editrules: {required: false}, width: 300},
            {name:'codigo_fac', index:'codigo_fac',editable:true},
            {name:'precio_unitario', index:'precio_unitario',editable:true, editrules: {required: false}, editoptions:{maxlength: 10, size:15,dataInit: function(elem){$(elem).bind("keypress", function(e) {return punto(e)})}}},
            {name:'descuento', index:'descuento',editable:true, editrules: {required: false}, editoptions:{maxlength: 10, size:15,dataInit: function(elem){$(elem).bind("keypress", function(e) {return punto(e)})}}},
            {name:'cal_des', index:'cal_des', editable:true, hidden: true, editrules: {required: false}, editoptions:{maxlength: 10, size:15,dataInit: function(elem){$(elem).bind("keypress", function(e) {return punto(e)})}}},
            {name:'precio_total', index:'precio_total',editable:true, editrules: {required: false}, decimalPlaces: 2, editoptions:{maxlength: 10, size:15,dataInit: function(elem){$(elem).bind("keypress", function(e) {return punto(e)})}}},                
            {name:'iva',index:'iva', width:100, editable: true, edittype:"checkbox", editoptions: {value:"Si:No", defaultValue: 'Si'}, editable:true, formatoptions: {disabled : false}, align: 'center'},              
            {name:'incluye',index:'incluye', width:100, editable: true, edittype:"checkbox", editoptions: {value:"Si:No", defaultValue: 'Si'},editable:true,formatoptions: {disabled : false}, align: 'center'},              
		],
		viewrecords : true,
		rownumbers: true,
		autowidth:true,
		width: 100,
		shrinkToFit: true,
		rowNum:50,
		rowList:[50,100,150],
		pager: pager_selector_2,
		altRows: true,
		sortname: 'id',
	    sortorder: 'asc',
		viewrecords : true,
		cellEdit: false,
		shrinkToFit: true,		
		// editurl: 'clientArray',
		// cellSubmit: 'clientArray',
		delOptions: {
	    modal: true,
	    jqModal: true,
		    onclickSubmit: function(options,rowid,cantidad_fac,precio_unitario,precio_total) {
				var grid_id = $.jgrid.jqID(jQuery(grid_selector_2)[0].id),
                grid_p = jQuery(grid_selector_2)[0].p,
                newPage = grid_p.page;

                var rowData = jQuery(grid_selector_2).getRowData(rowid);	            	
	            facturas[rowData.rowid] = rowData;

	            // calcular los valores al momento del evento eliminar
	            var subtotal0 = 0;
                var subtotal12 = 0;
                var subtotal_total = 0;
                var iva12 = 0;
                var total_total = 0;
                var descu_total = 0;

                var subtotal = 0;
                var sub = 0;
                var sub2 = 0;
                var iva2 = 0;
                var suma_total = 0;

                var filas = jQuery("#grid-table_agregar").jqGrid("getRowData");
                for (var i = 0; i < filas.length; i++) {
                	var variables = filas[i];

                	if(rowData.iva == "Si") {
                		subtotal = rowData.precio_total;
                        sub2 = (subtotal / 1.12).toFixed(2);
                        iva2 = (sub2 * 0.12).toFixed(2);

                        subtotal0 = parseFloat($("#txt_5").val()) + 0;
                        subtotal12 = parseFloat($("#txt_6").val()) - parseFloat(sub2);
                        subtotal_total = parseFloat($("#txt_7").val()) - parseFloat(sub2);
                        iva12 = parseFloat($("#txt_8").val()) - parseFloat(iva2);
                        descu_total = parseFloat($("#txt_9").val()) - parseFloat(rowData.cal_des);

                        subtotal0 = parseFloat(subtotal0).toFixed(2);
                        subtotal12 = parseFloat(subtotal12).toFixed(2);
                        subtotal_total = parseFloat(subtotal_total).toFixed(2);
                        iva12 = parseFloat(iva12).toFixed(2);
                        descu_total = parseFloat(descu_total).toFixed(2);
                	} else {
                		if(rowData.iva == "No") {
                			subtotal = rowData.precio_total;
	                        sub = subtotal;

	                        subtotal0 = parseFloat($("#txt_5").val()) - parseFloat(sub);
	                        subtotal12 = parseFloat($("#txt_6").val()) + 0;
	                        subtotal_total = parseFloat($("#txt_7").val()) - parseFloat(sub);
	                        iva12 = parseFloat($("#txt_8").val()) + 0;
	                        descu_total = parseFloat($("#txt_9").val()) - parseFloat(rowData.cal_des);
	                          
	                        subtotal0 = parseFloat(subtotal0).toFixed(2);
	                        subtotal12 = parseFloat(subtotal12).toFixed(2);
	                        subtotal_total = parseFloat(subtotal_total).toFixed(2);
	                        iva12 = parseFloat(iva12).toFixed(2);
	                        descu_total = parseFloat(descu_total).toFixed(2);
                		}
                	}
                }

                total_total = parseFloat(total_total) + (parseFloat(subtotal0) + parseFloat(subtotal12) + parseFloat(iva12));
                total_total = parseFloat(total_total).toFixed(2);

                $("#txt_5").val(subtotal0);
                $("#txt_6").val(subtotal12);
                $("#txt_7").val(subtotal_total);
                $("#txt_8").val(iva12);
                $("#txt_9").val(descu_total);
                $("#txt_10").val(total_total);

            	// reset the value of processing option which could be modified
            	options.processing = true;

	            // delete the row
	            jQuery(grid_selector_2).delRowData(rowid); // borrar	            
	            delete facturas[rowid];	            
	            $.jgrid.hideModal("#delmod"+grid_id,{gb:"#gbox_"+grid_id,jqm:options.jqModal,onClose:options.onClose});

	            if (grid_p.lastpage > 1) {// on the multipage grid reload the grid
	                if (grid_p.reccount === 0 && newPage === grid_p.lastpage) {
	                    // if after deliting there are no rows on the current page
	                    // which is the last page of the grid
	                    newPage--; // go to the previous page
	                }
	                // reload grid to make the row from the next page visable.
	                jQuery(grid_selector_2).trigger("reloadGrid", [{page:newPage}]);
	            }
	            return true;
	        },
	        processing :true,
		},
		beforeRequest: function() {
			responsive_jqgrid($("#grid_container"));
        },
		// loadComplete : function() {
		// 	var table = this;
		// 	setTimeout(function() {
		// 		styleCheckbox(table);
		// 		updateActionIcons(table);
		// 		updatePagerIcons(table);
		// 		enableTooltips(table);
		// 	}, 0);			
		// },
    });
   
	function responsive_jqgrid(jqgrid) {
        jqgrid.find('.ui-jqgrid').css('width', '');
        jqgrid.find('.ui-jqgrid-view').css('width', '');
        jqgrid.find('.ui-jqgrid-view > div').eq(1).css('width', '').css('min-height', '0');
        jqgrid.find('.ui-jqgrid-view > div').eq(2).css('width', '').css('min-height', '0');
        jqgrid.find('.ui-jqgrid-sdiv').css('width', '');
        jqgrid.find('.ui-jqgrid-pager').css('width', '');
    }

	//switch element when editing inline
	function aceSwitch( cellvalue, options, cell ) {
		setTimeout(function() {
			$(cell) .find('input[type=checkbox]').addClass('ace ace-switch ace-switch-5').after('<span class="lbl"></span>');
		}, 0);	
	}

	//enable datepicker
	function pickDate( cellvalue, options, cell ) {
		setTimeout(function(){
			$(cell) .find('input[type=text]').datepicker({format:'yyyy-mm-dd' , autoclose:true}); 
		}, 0);
	}

	//navButtons		
	jQuery(grid_selector_2).jqGrid('navGrid',pager_selector_2,
		{ 	//navbar options
			edit: false,
			editicon : 'ace-icon fa fa-pencil blue',
			add: false,
			addicon : 'ace-icon fa fa-plus-circle purple',
			del: false,
			delicon : 'ace-icon fa fa-trash-o red',
			deltext: 'Eliminar',
			search: false,
			searchicon : 'ace-icon fa fa-search orange',
			refresh: false,
			refreshicon : 'ace-icon fa fa-refresh green',
			view: false,
			viewicon : 'ace-icon fa fa-search-plus grey',
		},
		{
			//edit record form
			//closeAfterEdit: true,
			//width: 700,
			recreateForm: true,
			beforeShowForm : function(e) {
				var form = $(e[0]);
				form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
				style_edit_form(form);	
			}
		},
		{
			//new record form
			//width: 700,
			closeAfterAdd: true,
			recreateForm: true,
			viewPagerButtons: false,
			beforeShowForm : function(e) {
				var form = $(e[0]);
				form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar')
				.wrapInner('<div class="widget-header" />')
				style_edit_form(form);	
			}
		},
		{
			//delete record form
			recreateForm: true,
			beforeShowForm : function(e) {
				var form = $(e[0]);
				if(form.data('styled')) return false;
				form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
				style_delete_form(form);				
				form.data('styled', true);				
			},
			onClick : function(e) { },
			// onclickSubmit: function(options,rowid,cantidad_fac,precio_unitario,precio_total) {
			// 	var grid_id = $.jgrid.jqID(jQuery(grid_selector_2)[0].id),
   //              grid_p = jQuery(grid_selector_2)[0].p,
   //              newPage = grid_p.page;

   //              var rowData = jQuery(grid_selector_2).getRowData(rowid);	            	
	  //           facturas[rowData.rowid] = rowData;

	  //           // calcular los valores al momento del evento eliminar
	  //           var subtotal0 = 0;
   //              var subtotal12 = 0;
   //              var subtotal_total = 0;
   //              var iva12 = 0;
   //              var total_total = 0;
   //              var descu_total = 0;

   //              var subtotal = 0;
   //              var sub = 0;
   //              var sub2 = 0;
   //              var iva2 = 0;
   //              var suma_total = 0;

   //              var filas = jQuery("#grid-table_agregar").jqGrid("getRowData");
   //              for (var i = 0; i < filas.length; i++) {
   //              	var variables = filas[i];

   //              	if(rowData.iva == "Si") {
   //              		subtotal = rowData.precio_total;
   //                      sub2 = (subtotal / 1.12).toFixed(2);
   //                      iva2 = (sub2 * 0.12).toFixed(2);

   //                      subtotal0 = parseFloat($("#txt_5").val()) + 0;
   //                      subtotal12 = parseFloat($("#txt_6").val()) - parseFloat(sub2);
   //                      subtotal_total = parseFloat($("#txt_7").val()) - parseFloat(sub2);
   //                      iva12 = parseFloat($("#txt_8").val()) - parseFloat(iva2);
   //                      descu_total = parseFloat($("#txt_9").val()) - parseFloat(rowData.cal_des);

   //                      subtotal0 = parseFloat(subtotal0).toFixed(2);
   //                      subtotal12 = parseFloat(subtotal12).toFixed(2);
   //                      subtotal_total = parseFloat(subtotal_total).toFixed(2);
   //                      iva12 = parseFloat(iva12).toFixed(2);
   //                      descu_total = parseFloat(descu_total).toFixed(2);
   //              	} else {
   //              		if(rowData.iva == "No") {
   //              			subtotal = rowData.precio_total;
	  //                       sub = subtotal;

	  //                       subtotal0 = parseFloat($("#txt_5").val()) - parseFloat(sub);
	  //                       subtotal12 = parseFloat($("#txt_6").val()) + 0;
	  //                       subtotal_total = parseFloat($("#txt_7").val()) - parseFloat(sub);
	  //                       iva12 = parseFloat($("#txt_8").val()) + 0;
	  //                       descu_total = parseFloat($("#txt_9").val()) - parseFloat(rowData.cal_des);
	                          
	  //                       subtotal0 = parseFloat(subtotal0).toFixed(2);
	  //                       subtotal12 = parseFloat(subtotal12).toFixed(2);
	  //                       subtotal_total = parseFloat(subtotal_total).toFixed(2);
	  //                       iva12 = parseFloat(iva12).toFixed(2);
	  //                       descu_total = parseFloat(descu_total).toFixed(2);
   //              		}
   //              	}
   //              }

   //              total_total = parseFloat(total_total) + (parseFloat(subtotal0) + parseFloat(subtotal12) + parseFloat(iva12));
   //              total_total = parseFloat(total_total).toFixed(2);

   //              $("#txt_5").val(subtotal0);
   //              $("#txt_6").val(subtotal12);
   //              $("#txt_7").val(subtotal_total);
   //              $("#txt_8").val(iva12);
   //              $("#txt_9").val(descu_total);
   //              $("#txt_10").val(total_total);

   //          	// reset the value of processing option which could be modified
   //          	options.processing = true;

	  //           // delete the row
	  //           jQuery(grid_selector_2).delRowData(rowid); // borrar	            
	  //           delete facturas[rowid];	            
	  //           $.jgrid.hideModal("#delmod"+grid_id,{gb:"#gbox_"+grid_id,jqm:options.jqModal,onClose:options.onClose});

	  //           if (grid_p.lastpage > 1) {// on the multipage grid reload the grid
	  //               if (grid_p.reccount === 0 && newPage === grid_p.lastpage) {
	  //                   // if after deliting there are no rows on the current page
	  //                   // which is the last page of the grid
	  //                   newPage--; // go to the previous page
	  //               }
	  //               // reload grid to make the row from the next page visable.
	  //               jQuery(grid_selector_2).trigger("reloadGrid", [{page:newPage}]);
	  //           }
	  //           return true;
	  //       },
			processing :true,
		},
		{
			recreateForm: true,
			caption : 'Busqueda',
			afterShowSearch: function(e) {
				var form = $(e[0]);
				form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
				style_search_form(form);
			},
			afterRedraw: function(){
				style_search_filters($(this));
			},
			multipleSearch: true,
		},
		{
			//view record form
			recreateForm: true,
			width: 500,
			caption : 'Vista Previa',
			beforeShowForm: function(e) {
				var form = $(e[0]);
				form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
			}
		}
	)	

	jQuery(grid_selector_2).inlineNav(pager_selector_2, {
		edit: true, 
        add: true, 
        del: true,
        cancel: true,
        addtext: 'Agregar',
        edittext: 'Modificar',
        addicon : 'ace-icon fa fa-plus-circle purple',
        delicon : 'ace-icon fa fa-trash-o red', 
       	addParams: {position: "first",
	        addRowParams: {
	            useFormatter:false,
	            keys: true,
	            aftersavefunc: function(rowid,cantidad_fac,precio_unitario,precio_total,iCol) {
	            	var rowData = jQuery(grid_selector_2).getRowData(rowid);	            	
	            	facturas[rowData.rowid] = rowData;

	            	//variables generales 
	            	var subtotal0 = 0;
				    var subtotal12 = 0;
				    var subtotal_total = 0;
				    var iva12 = 0;
				    var total_total = 0;
				    var descu_total = 0;

	            	// calcular valores de los detalles del jqgrid
                    var cantidad = 0;
                    var descripcion = 'Sin descripción';
                    var desc = 0;
                    var precio = 0;
                    var multi = 0;
                    var descuento = 0;
                    var flotante = 0;
                    var resultado = 0;
                    var total = 0;

                    if(rowData.cantidad_fac == '') {
	            		rowData.cantidad_fac = cantidad;
	            	}

	            	if(rowData.descripcion_fac == '') {
	            		rowData.descripcion_fac = descripcion;
	            	}

	            	if(rowData.precio_unitario == '') {
            			rowData.precio_unitario = precio;
            		}

            		if(rowData.descuento == '') {
            			rowData.descuento = descuento;
            		}

	            	desc = rowData.descuento;
	            	precio = (parseFloat(rowData.precio_unitario)).toFixed(4);
	            	multi = (parseFloat(rowData.cantidad_fac) * parseFloat(precio)).toFixed(4);
	            	descuento = ((multi * parseFloat(desc)) / 100);
	            	flotante = parseFloat(descuento);
	            	resultado = (Math.round(flotante * Math.pow(10,2)) / Math.pow(10,2)).toFixed(4);
	            	total = (multi - resultado).toFixed(4);

	            	jQuery(grid_selector_2).jqGrid('setRowData',rowid,{cantidad_fac:rowData.cantidad_fac,descripcion_fac:rowData.descripcion_fac, precio_unitario: precio, descuento: desc, cal_des: resultado, precio_total: total});

	            	// calcular porcentajes
	            	var subtotal = 0;
                    var sub1 = 0;
                    var sub2 = 0;
                    var iva = 0;
                    var iva1 = 0;
                    var suma_total = 0;
                    var proceso1 = 0;
                    var proceso2 = 0

                    var filas = jQuery("#grid-table_agregar").jqGrid("getRowData");
                    for (var i = 0; i < filas.length; i++) {
                    	var variables = filas[i];

                    	if (variables['iva']  == "Si") {
                    		if(variables['incluye'] == "Si") {
	                    		subtotal = variables['precio_total'];
	                            sub1 = (subtotal / 1.12).toFixed(2);
	                            proceso1 = (sub1 * 0.12);
	                            iva = (Math.floor(proceso1 * 100) / 100).toFixed(2);

	                            subtotal0 = parseFloat(subtotal0) + 0;
	                            subtotal12 = parseFloat(subtotal12) + parseFloat(sub1);
	                            subtotal_total = parseFloat(subtotal0) + parseFloat(subtotal12);
	                            iva12 = parseFloat(iva12) + parseFloat(iva);
	                            descu_total = parseFloat(descu_total) + parseFloat(variables['cal_des']);

	                            subtotal0 = parseFloat(subtotal0).toFixed(2);
	                            subtotal12 = parseFloat(subtotal12).toFixed(2);
	                            subtotal_total = parseFloat(subtotal_total).toFixed(2);
	                            iva12 = parseFloat(iva12).toFixed(2);
	                            descu_total = parseFloat(descu_total).toFixed(2);
                        	} else {
                        		if(variables['incluye'] == "No") {
                        			subtotal = variables['precio_total'];
	                                sub2 = subtotal;
	                                proceso2 = (sub2 * 0.12);
	                                iva1 = (Math.floor(proceso2 * 100) / 100).toFixed(2);                                        

	                                subtotal0 = parseFloat(subtotal0) + 0;
	                                subtotal12 = parseFloat(subtotal12) + parseFloat(sub2);
	                                subtotal_total = parseFloat(subtotal0) + parseFloat(subtotal12);
	                                iva12 = parseFloat(iva12) + parseFloat(iva1);
	                                descu_total = parseFloat(descu_total) + parseFloat(variables['cal_des']);
	                            
	                                subtotal0 = parseFloat(subtotal0).toFixed(2);
	                                subtotal12 = parseFloat(subtotal12).toFixed(2);
	                                subtotal_total = parseFloat(subtotal_total).toFixed(2);
	                                iva12 = parseFloat(iva12).toFixed(2);
	                                descu_total = parseFloat(descu_total).toFixed(2);
                        		}
                        	}
                    	} else {
                            if (variables['iva']  == "No") {
                            	subtotal = variables['precio_total'];
                                sub2 = subtotal;

                                subtotal0 = parseFloat(subtotal0) + parseFloat(sub2);
                                subtotal12 = parseFloat(subtotal12) + 0;
                                subtotal_total = parseFloat(subtotal0) + parseFloat(subtotal12);
                                iva12 = parseFloat(iva12) + 0;
                                descu_total = parseFloat(descu_total) + parseFloat(variables['cal_des']);
                                
                                subtotal0 = parseFloat(subtotal0).toFixed(2);
                                subtotal12 = parseFloat(subtotal12).toFixed(2);
                                subtotal_total = parseFloat(subtotal_total).toFixed(2);
                                iva12 = parseFloat(iva12).toFixed(2);
                                descu_total = parseFloat(descu_total).toFixed(2); 
                            }
                        }    
                    }

                    total_total = parseFloat(total_total) + (parseFloat(subtotal0) + parseFloat(subtotal12) + parseFloat(iva12));
                    total_total = parseFloat(total_total).toFixed(2);

                    $("#txt_5").val(subtotal0);
                    $("#txt_6").val(subtotal12);
                    $("#txt_7").val(subtotal_total);
                    $("#txt_8").val(iva12);
                    $("#txt_9").val(descu_total);
                    $("#txt_10").val(total_total);          		            		            	
	            }
	    	},
	    },
        editParams: {
            aftersavefunc: function (rowid,cantidad_fac,precio_unitario,precio_total,name) {
            	var rowData = jQuery(grid_selector_2).getRowData(rowid);
            	facturas[rowData.rowid] = rowData;	

            	//variables generales 
            	var subtotal0 = 0;
			    var subtotal12 = 0;
			    var subtotal_total = 0;
			    var iva12 = 0;
			    var total_total = 0;
			    var descu_total = 0;

            	// calcular valores de los detalles del jqgrid
            	var cantidad = 0;
                var descripcion = 'Sin descripción';
                var precio = 0;
                var desc = 0;
                var multi = 0;
                var descuento = 0;
                var flotante = 0;
                var resultado = 0;
                var total = 0;

                if(rowData.cantidad_fac == '') {
            		rowData.cantidad_fac = cantidad;
            	}

            	if(rowData.descripcion_fac == '') {
            		rowData.descripcion_fac = descripcion;
            	}

            	if(rowData.precio_unitario == '') {
        			rowData.precio_unitario = precio;
        		}

        		if(rowData.descuento == '') {
        			rowData.descuento = descuento;
        		}

            	desc = rowData.descuento;
            	precio = (parseFloat(rowData.precio_unitario)).toFixed(4);
            	multi = (parseFloat(rowData.cantidad_fac) * parseFloat(precio)).toFixed(4);
            	descuento = ((multi * parseFloat(desc)) / 100);
            	flotante = parseFloat(descuento);
            	resultado = (Math.round(flotante * Math.pow(10,2)) / Math.pow(10,2)).toFixed(4);
            	total = (multi - resultado).toFixed(4);

            	jQuery(grid_selector_2).jqGrid('setRowData',rowid,{cantidad_fac:rowData.cantidad_fac,descripcion_fac:rowData.descripcion_fac,precio_unitario: precio, descuento: desc, cal_des: resultado, precio_total: total});

            	// calcular porcentajes
            	var subtotal = 0;
                var sub1 = 0;
                var sub2 = 0;
                var iva = 0;
                var iva1 = 0;
                var suma_total = 0;
                var proceso1 = 0;
                var proceso2 = 0

                var filas = jQuery("#grid-table_agregar").jqGrid("getRowData");
                for (var i = 0; i < filas.length; i++) {
                	var variables = filas[i];

                	if (variables['iva']  == "Si") {
                		if(variables['incluye'] == "Si") {
	                		subtotal = variables['precio_total'];
                            sub1 = (subtotal / 1.12).toFixed(2);
                            proceso1 = (sub1 * 0.12);
                            iva = (Math.floor(proceso1 * 100) / 100).toFixed(2);

	                        subtotal0 = parseFloat(subtotal0) + 0;
	                        subtotal12 = parseFloat(subtotal12) + parseFloat(sub1);
	                        subtotal_total = parseFloat(subtotal0) + parseFloat(subtotal12);
	                        iva12 = parseFloat(iva12) + parseFloat(iva);
	                        descu_total = parseFloat(descu_total) + parseFloat(variables['cal_des']);

	                        subtotal0 = parseFloat(subtotal0).toFixed(2);
	                        subtotal12 = parseFloat(subtotal12).toFixed(2);
	                        subtotal_total = parseFloat(subtotal_total).toFixed(2);
	                        iva12 = parseFloat(iva12).toFixed(2);
	                        descu_total = parseFloat(descu_total).toFixed(2);
                      	} else {
                    		if(variables['incluye'] == "No") {
                    			subtotal = variables['precio_total'];
                                sub2 = subtotal;
                                proceso2 = (sub2 * 0.12);
                                iva1 = (Math.floor(proceso2 * 100) / 100).toFixed(2);                                        

                                subtotal0 = parseFloat(subtotal0) + 0;
                                subtotal12 = parseFloat(subtotal12) + parseFloat(sub2);
                                subtotal_total = parseFloat(subtotal0) + parseFloat(subtotal12);
                                iva12 = parseFloat(iva12) + parseFloat(iva1);
                                descu_total = parseFloat(descu_total) + parseFloat(variables['cal_des']);
                            
                                subtotal0 = parseFloat(subtotal0).toFixed(2);
                                subtotal12 = parseFloat(subtotal12).toFixed(2);
                                subtotal_total = parseFloat(subtotal_total).toFixed(2);
                                iva12 = parseFloat(iva12).toFixed(2);
                                descu_total = parseFloat(descu_total).toFixed(2);
                    		}
                    	}
                	} else {
                        if (variables['iva']  == "No") {
                        	subtotal = variables['precio_total'];
                            sub2 = subtotal;

                            subtotal0 = parseFloat(subtotal0) + parseFloat(sub2);
                            subtotal12 = parseFloat(subtotal12) + 0;
                            subtotal_total = parseFloat(subtotal0) + parseFloat(subtotal12);
                            iva12 = parseFloat(iva12) + 0;
                            descu_total = parseFloat(descu_total) + parseFloat(variables['cal_des']);
                            
                            subtotal0 = parseFloat(subtotal0).toFixed(2);
                            subtotal12 = parseFloat(subtotal12).toFixed(2);
                            subtotal_total = parseFloat(subtotal_total).toFixed(2);
                            iva12 = parseFloat(iva12).toFixed(2);
                            descu_total = parseFloat(descu_total).toFixed(2); 
                        }
                    }    
                }

                total_total = parseFloat(total_total) + (parseFloat(subtotal0) + parseFloat(subtotal12) + parseFloat(iva12));
                total_total = parseFloat(total_total).toFixed(2);

                $("#txt_5").val(subtotal0);
                $("#txt_6").val(subtotal12);
                $("#txt_7").val(subtotal_total);
                $("#txt_8").val(iva12);
                $("#txt_9").val(descu_total);
                $("#txt_10").val(total_total);
            },            
        }
	});

	///////////////////////le_
	function styedit_form(form) {
		//enable datepicker on "sdate" field and switches for "stock" field
		form.find('input[name=sdate]').datepicker({format:'yyyy-mm-dd' , autoclose:true})
		
		form.find('input[name=stock]').addClass('ace ace-switch ace-switch-5').after('<span class="lbl"></span>');

		//update buttons classes
		var buttons = form.next().find('.EditButton .fm-button');
		buttons.addClass('btn btn-sm').find('[class*="-icon"]').hide();//ui-icon, s-icon
		buttons.eq(0).addClass('btn-primary').prepend('<i class="ace-icon fa fa-check"></i>');
		buttons.eq(1).prepend('<i class="ace-icon fa fa-times"></i>')
		
		buttons = form.next().find('.navButton a');
		buttons.find('.ui-icon').hide();
		buttons.eq(0).append('<i class="ace-icon fa fa-chevron-left"></i>');
		buttons.eq(1).append('<i class="ace-icon fa fa-chevron-right"></i>');		
	}

	function style_delete_form(form) {
		var buttons = form.next().find('.EditButton .fm-button');
		buttons.addClass('btn btn-sm btn-white btn-round').find('[class*="-icon"]').hide();//ui-icon, s-icon
		buttons.eq(0).addClass('btn-danger').prepend('<i class="ace-icon fa fa-trash-o"></i>');
		buttons.eq(1).addClass('btn-default').prepend('<i class="ace-icon fa fa-times"></i>')
	}
	
	function style_search_filters(form) {
		form.find('.delete-rule').val('X');
		form.find('.add-rule').addClass('btn btn-xs btn-primary');
		form.find('.add-group').addClass('btn btn-xs btn-success');
		form.find('.delete-group').addClass('btn btn-xs btn-danger');
	}
	function style_search_form(form) {
		var dialog = form.closest('.ui-jqdialog');
		var buttons = dialog.find('.EditTable')
		buttons.find('.EditButton a[id*="_reset"]').addClass('btn btn-sm btn-info').find('.ui-icon').attr('class', 'ace-icon fa fa-retweet');
		buttons.find('.EditButton a[id*="_query"]').addClass('btn btn-sm btn-inverse').find('.ui-icon').attr('class', 'ace-icon fa fa-comment-o');
		buttons.find('.EditButton a[id*="_search"]').addClass('btn btn-sm btn-purple').find('.ui-icon').attr('class', 'ace-icon fa fa-search');
	}
	
	function beforeDeleteCallback(e) {
		var form = $(e[0]);
		if(form.data('styled')) return false;
		
		form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
		style_delete_form(form);
		
		form.data('styled', true);
	}
	
	function beforeEditCallback(e) {
		var form = $(e[0]);
		form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
		style_edit_form(form);
	}

	function styleCheckbox(table) { }

	function updateActionIcons(table) {	}
	
	//replace icons with FontAwesome icons like above
	function updatePagerIcons(table) {
		var replacement = 
		{
			'ui-icon-seek-first' : 'ace-icon fa fa-angle-double-left bigger-140',
			'ui-icon-seek-prev' : 'ace-icon fa fa-angle-left bigger-140',
			'ui-icon-seek-next' : 'ace-icon fa fa-angle-right bigger-140',
			'ui-icon-seek-end' : 'ace-icon fa fa-angle-double-right bigger-140'
		};
		$('.ui-pg-table:not(.navtable) > tbody > tr > .ui-pg-button > .ui-icon').each(function(){
			var icon = $(this);
			var $class = $.trim(icon.attr('class').replace('ui-icon', ''));
			
			if($class in replacement) icon.attr('class', 'ui-icon '+replacement[$class]);
		})
	}

	function enableTooltips(table) {
		$('.navtable .ui-pg-button').tooltip({container:'body'});
		$(table).find('.ui-pg-div').tooltip({container:'body'});
	}

	//var selr = jQuery(grid_selector).jqGrid('getGridParam','selrow');
	$(document).one('ajaxloadstart.page', function(e) {
		$(grid_selector).jqGrid('GridUnload');
		$('.ui-jqdialog').remove();
	});

	//cargar_proveedor();	///cargar proveedores
	//cargar_nombre_proveedor();	///cargar proveedores
	$("#btn_agregar_proveedor").on('click',function() {
		agregar_proveedor();
	})	
	
	/////actualizar correos al abrir la pagina///
	actualizar_correos(id);

	$("#btn_envio").on("click",function() {
		agregar_factura(id);
	});

	$("#btn_agregar").on("click",function() {
		agregar_factura_fisica(id,facturas);
	});

	nuevos_mensajes(id);

	$('.nav-tabs a').on('shown.bs.tab', function(e) {
        if($(this).attr('href') == '#buscar'){      	
        	var fecha_fin = moment(fecha_fin).subtract(0, 'months').endOf('month').format('YYYY-MM-DD');		        	        	
        	var fecha_ini = moment(fecha_ini).subtract(0, 'months').startOf('month').format('YYYY-MM-DD');		        	        	
        	var newUrl = 'xml_busqueda.php?id='+id+'&doc='+'01'+'&consumo='+'0'+'&ini='+fecha_ini+'&fin='+fecha_fin;
			$("#grid-table_busqueda").setGridParam({url:newUrl,page:1});
			$("#grid-table_busqueda").trigger("reloadGrid");
        }
    });

    $("#btn_consulta").on('click',function() {
    	var ini = $("#id-date-range-picker-1").data('daterangepicker').startDate.format('YYYY-MM-DD');
    	var fin = $("#id-date-range-picker-1").data('daterangepicker').endDate.format('YYYY-MM-DD');    	
    	var newUrl = 'xml_busqueda.php?id='+id+'&doc='+$("#slt_tipo_documento_1").val()+'&consumo='+$("#slt_consumo_1").val()+'&ini='+ini+'&fin='+fin;
    	$("#grid-table_busqueda").setGridParam({url:newUrl,page:1});
		$("#grid-table_busqueda").trigger("reloadGrid");
    });

    $("#btn_verificar").on('click',function() {
    	verificar();
    });

    $('#btn_cancelar').on('click',function() {
    	$('#confirma').modal('hide')
    });

    $('#btn_confirmar').on('click',function() {
    	verificar_acceso();
    })  
});		

function actualizar_correos(id) {
	$.ajax({        
    	type: "POST",
    	dataType: 'json',        
    	data: "id="+id,
    	url: "app.php",        
    	success: function(data, status) {      		
    		if(data == 1) {
    			jQuery("#grid-table").trigger("reloadGrid")
    		} else {
    			//window.location.reload(true);
    		}
    	}
    });
}

function verificar_acceso() {
	if($('#txt_confirmar').val() == ''){
		$.gritter.add({
			title: 'Ingrese una Contraseña',
			class_name: 'gritter-error gritter-center',
			time: 2000,
		});	
		$('#txt_confirmar').focus();
	} else {
		var s;
		s = jQuery('#table').jqGrid('getGridParam','selarrrow');
		$.ajax({       
			async:'false', 
	    	type: "POST",
	    	data: "vector="+s+"&clave="+$('#txt_confirmar').val(), 
	    	dataType: 'json',        
	    	url: "mod_cell.php?fn=11",        
	    	success: function(data, status, jqXHR) {      		
	    		if(data == 1) {
	    			$.gritter.add({
						title: 'FACTURA ANULADA CORRECTAMENTE',
						class_name: 'gritter-success gritter-center',
						time: 2000,
					});

	    			$('#confirma').modal('hide');
	    			$('#txt_confirmar').val('');
	    			jQuery('#table').trigger('reloadGrid');
	    		} else {
	    			if(data == 0) {
	    				$.gritter.add({
							title: 'CONTRASEÑA INCORRECTA',
							class_name: 'gritter-error gritter-center',
							time: 2000,
						});

					$('#txt_confirmar').val('');	
	    			} 
	    		}
	    	}
	    });	
	}
}

function descarga_archivos (id,ext,user) {	
	window.open("mod_cell.php?id="+id+"&fn=2"+"&ext="+ext+"&user="+user);   	
}

function reporte_pdf (id,ext,user) {	
	window.open("reporte_pdf.php?id="+id+"&fn=2"+"&ext="+ext+"&user="+user,"","width=900,height=800,scrollbars=NO");   			 
	return false;
}

function reporte_facturas () {
	window.open("facturas.php","","width=900,height=800,scrollbars=NO");   			 
	//return false;
}

function agregar_factura(id) {
	$('#form_proceso').validate({
		errorElement: 'div',
		errorClass: 'help-block',
		focusInvalid: false,
		ignore: "",
		rules: {
			txt_clave: {
				required: true,
		        //digits: true,
		        minlength: 49,
			    maxlength: 49			
			}
		},
		messages: {
			txt_clave: {
				required: "Campo Obligatorio"
			}
		},

		highlight: function (e) {
			$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
		},
		success: function (e) {
			$(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
			$(e).remove();
		},
		errorPlacement: function (error, element) {
			if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
				var controls = element.closest('div[class*="col-"]');
				if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
				else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
			}
			else if(element.is('.select2')) {
				error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
			}
			else if(element.is('.chosen-select')) {
				error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
			}
			else error.insertAfter(element.parent());
		},

		submitHandler: function (form) {
			var form=$("#form_proceso");
			$("#btn_envio").attr("disabled", true);
			$("#btn_envio").text("");
			$("#btn_envio").append("<span class='ace-icon fa fa-spinner fa-spin write bigger-125'></span> Procesando...");
			$.ajax({       
				async:'false', 
		    	type: "POST",
		    	dataType: 'json',        
		    	url: "mod_cell.php?fn=3&id="+id+"&acceso="+$("#txt_clave").val()+"&consumo="+$("#slt_consumo").val(),        
		    	success: function(data, status, jqXHR) {      		
		    		if(data == 1) {
		    			$.gritter.add({
							title: 'FACTURA AGREGADA CORRECTAMENTE',
							class_name: 'gritter-success gritter-center',
							time: 2000,
						});

		    			$('#modal-form2').modal('hide');
		    			$("#btn_envio").attr("disabled", false);
	    				$("#btn_envio").text("");
						$("#btn_envio").append("<span class='ace-icon fa fa-save'></span> Guardar Documento");
		    			jQuery('#grid-table').trigger('reloadGrid');
		    		} else {
		    			if(data == 2) {
		    				$.gritter.add({
								title: 'LA FACTURA QUE INTENTA AGREGAR NO ES VALIDA',
								class_name: 'gritter-error gritter-center',
								time: 2000,
							});

		    				$("#btn_envio").attr("disabled", false);
		    				$("#btn_envio").text("");
							$("#btn_envio").append("<span class='ace-icon fa fa-save'></span> Guardar Documento");
							$("#txt_clave").val("");
		    				$("#txt_clave").focus();		
		    			} else {
		    				if(data == 3) {
		    					$.gritter.add({
									title: 'ESTA CLAVE DE ACCESO YA ESTA REGISTRADA EN ESTE CLIENTE',
									class_name: 'gritter-error gritter-center',
									time: 2000,
								});

								$("#btn_envio").attr("disabled", false);
			    				$("#btn_envio").text("");
								$("#btn_envio").append("<span class='ace-icon fa fa-save'></span> Guardar Documento");
		    					$("#txt_clave").val("");
		    					$("#txt_clave").focus();
		    				} else {
		    					alert("OCURRIO UN ERROR AL MOMENTO DE ENVIAR LOS DATOS");
		    				}
		    			}
		    		}
		    	}
		    });
		},
		invalidHandler: function (form) {
			console.log('proceso invalido'+form)
		}
	});	
}

function nuevos_mensajes(id_user) {	
	jQuery.ajax({
		type: 'POST',
		url: 'mod_cell.php?fn=4&id_user='+id_user,		
		dataType: 'json',
		success: function(retorno) {				
			$("#id_nro_msg").text(retorno);
			if(retorno > 0){
				actualizar_correos(id_user);
			}
			setTimeout(function() {				
				nuevos_mensajes(id_user);
			},30000);
		},
		error: function(retorno) {
          	setTimeout(function() {				
				nuevos_mensajes(id_user);
			},30000);  
        }
	});
}

function getVarsUrl() {
    var url= location.search.replace("?", "");
    var arrUrl = url.split("&");
    var urlObj={};   
    for(var i=0; i<arrUrl.length; i++) {
        var x= arrUrl[i].split("=");
        urlObj[x[0]]=x[1]
    }    
    return urlObj;
}

function validar_session(session) {	
	jQuery.ajax({
		type: 'POST',
		url: 'mod_cell.php?fn=5&session='+session,		
		dataType: 'json',
		success: function(retorno) {
			// if(retorno == 1){
			// 	setTimeout(validar_session,20000,session);
			// }else{
			// 	window.location.href = 'http://www.nextbook.ec/exitsalir.php';
			// }
		}, error:function() {
			setTimeout(validar_session,20000,session);
		}
	});	
}

function punto(e) {
    var key;
    if (window.event) {
        key = e.keyCode;
    } else if (e.which) {
        key = e.which;
    }

    if (key < 48 || key > 57) {
        if (key == 46 || key == 8) {
            return true;
        } else {
            return false;
        }
    }
    return true;   
}

function numeros(e) { 
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 8) return true;
    patron = /\d/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
}

// function cargar_proveedor() {	
// 	jQuery.ajax({  
// 		async:'false',
//     	type: "POST",    	
//     	url: 'mod_cell.php?fn=6',    	    	
//         datatype: "text",        
//     	success: function(retorno) {      		    		    		
//     		$('#sel_proveedor').append(retorno);
// 			$('#sel_proveedor').trigger('chosen:updated');
//     	},
//     	error: function(retorno) {	
//         }
//     });
// }

// function cargar_nombre_proveedor() {	
// 	// jQuery.ajax({  
// 	// 	async:'false',
//  //    	type: "POST",    	
//  //    	url: 'mod_cell.php?fn=9',    	    	
//  //        datatype: "text",        
//  //    	success: function(retorno) {      		    		    		
//  //    		$('#sel_nombre_proveedor').append(retorno);
// 	// 		$('#sel_nombre_proveedor').trigger('chosen:updated');
//  //    	},
//  //    	error: function(retorno) {	
//  //        }
//  //    });
// }

function agregar_proveedor() {
	if($('#txt_m_1').val() == '') {
		$.gritter.add({
			title: 'Ingrese la Identificación del Proveedor',
			class_name: 'gritter-error gritter-center',
			time: 1000,
		});
		$('#txt_m_1').focus();
	} else {
		if($('#txt_m_1').val().length == 13) {
			if($('#txt_m_2').val() == '') {
				$.gritter.add({
					title: 'Ingrese nombre del Proveedor',
					class_name: 'gritter-error gritter-center',
					time: 1000,
				});
				$('#txt_m_2').focus();	
			} else {
				if($('#txt_m_3').val() == '') {
					$.gritter.add({
						title: 'Ingrese una dirección',
						class_name: 'gritter-error gritter-center',
						time: 1000,
					});	
					$('#txt_m_3').focus();	
				} else { 
					$.ajax({       
						async:'false', 
				    	type: "POST",
				    	dataType: 'json',        
				    	url: "mod_cell.php?fn=7&ruc="+$('#txt_m_1').val()+"&nombre="+$("#txt_m_2").val()+"&dir="+$("#txt_m_3").val()+"&com="+$("#txt_m_4").val(),        
				    	success: function(data, status) {      		
				    		if(data == 1) {		
				    			$.gritter.add({
									title: 'Datos Agregador Correctamente',
									class_name: 'gritter-success gritter-center',
									time: 1000,
								});	

				    			$('#txt_m_1').val('');	
				    			$('#txt_m_2').val('');	
				    			$('#txt_m_3').val('');
				    			$('#txt_1').val('');
				    			$('#sel_proveedor').html('');
				    			$('#sel_proveedor').append('<option value=""></option>');
				    			$('#modal-form').modal('hide');
				    		} else {
				    			if(data == 0) {		
				    				$.gritter.add({
										title: 'Error el proveedor ya exisite',
										class_name: 'gritter-error gritter-center',
										time: 1000,
									});
				    				$('#txt_m_1').val('');	
									$('#txt_m_1').focus();	
				    			} else {
				    				alert('Error al enviar datos');		    		
				    				window.location.reload(true);
				    			}
				    		}
				    	}
				    });		
				}	
			}	
		} else {
			$.gritter.add({
				title: 'El ruc debe tener mínimo 13 caractéres',
				class_name: 'gritter-error gritter-center',
				time: 1000,
			});
		    $('#txt_m_1').focus();	
		}
	}	
}

function verificar() {
	if($('#txt_m_1').val() == '') {
		$.gritter.add({
			title: 'Ingrese la Identificación del Proveedor',
				class_name: 'gritter-error gritter-center',
				time: 1000,
			});
			$('#txt_m_1').focus();
		} else {
			if($('#txt_m_1').val().length != 13) {
				$.gritter.add({
					title: 'El ruc debe tener mínimo 13 caractéres',
					class_name: 'gritter-error gritter-center',
					time: 1000,
				});
				$('#txt_m_1').focus();
			} else {
				var glo_existencia = 0;
				$.ajax({
	                type: "POST",
	                url: "consulta.php",          
	                data:{txt_ruc_consumed:'',txt_ruc:$("#txt_m_1").val()},
	                dataType: 'json',
	                beforeSend: function() {
	                	$("#btn_verificar").attr("disabled", true);
	                	$("#btn_verificar").text("");
						$("#btn_verificar").append("<span class='ace-icon fa fa-spinner fa-spin write bigger-125'></span> Verificando...");
	                },
                    success: function(data) {
                    Lockr.set('sri_resultado', data);                        
                    $.unblockUI();
                    var data1 = data[0];
                    var data2 = data[1];
                    if (data[0] != 0) {
           
                      var tipo;
                      var a = $(data1[12]).text();
                      if (a == '') {
                        tipo = data1[12];
                      };
                      if (a != '') {
                        tipo = $(data1[12]).text();
                      }

                      $("#txt_m_2").val(data1[2]);
                      $("#txt_m_3").val(data2[3]);
                      $("#txt_m_4").val(data1[6]);
                      
                      if (data1[6] == '') {
                        $("#txt_m_4").val('No dispone de un nombre comercial');
                      }
                      var i = data2.length;                                          
                    }  
                    if (data[0] == 0) {
                    	$.gritter.add({
							title: 'Lo sentimos", "Usted no dispone de un ruc registrado en el sri, o es Incorrecto el numero ingresado."',
							class_name: 'gritter-error gritter-center',
							time: 3000,
						});

						$("#btn_verificar").attr("disabled", false);
	    				$("#btn_verificar").text("");
						$("#btn_verificar").append("<span class='ace-icon fa fa-check'></span> Verificar");
    					$("#txt_m_1").val("");
    					$("#txt_m_1").focus();
                    } 
                }
            });
		}
	}
}

function agregar_factura_fisica(id,facturas) {
	var tam = jQuery("#grid-table_agregar").jqGrid("getRowData");
	
	if($("#id_proveedor").val() == '') {
		$.gritter.add({
			title: 'Seleccione un proveedor para continuar',
			class_name: 'gritter-error gritter-center',
			time: 1000,
		});
	} else {				
		if($("#txt_2").val() == '') {
			$.gritter.add({
				title: 'Indique la fecha de emisión de la factura',
				class_name: 'gritter-error gritter-center',
				time: 1000,
			});
			$("#txt_2").focus();
		} else {
			if($("#txt_3").val() == '') {
				$.gritter.add({
					title: 'Indique la fecha de creación de la factura',
					class_name: 'gritter-error gritter-center',
					time: 1000,
				});
				$("#txt_3").focus();
			} else {
				if($("#txt_4").val() == '') {
					$.gritter.add({
						title: 'Indique serie de la factura',
						class_name: 'gritter-error gritter-center',
						time: 1000,
					});
					$("#txt_4").focus();
				} else {
					if(tam.length == 0) {
						$.gritter.add({
							title: 'Ingrese datos a la factura',
							class_name: 'gritter-error gritter-center',
							time: 1000,
						});
					} else {	
						var v1 = new Array();
		                var v2 = new Array();
		                var v3 = new Array();
		                var v4 = new Array();
		                var v5 = new Array();
		                var v6 = new Array();
		                var v7 = new Array();

		                var string_v1 = "";
		                var string_v2 = "";
		                var string_v3 = "";
		                var string_v4 = "";
		                var string_v5 = "";
		                var string_v6 = "";
		                var string_v7 = "";

		                var filas = jQuery("#grid-table_agregar").jqGrid("getRowData");
		                for (var i = 0; i < filas.length; i++) {
		                    var datos = filas[i];
		                    v1[i] = datos['codigo_fac'];
		                    v2[i] = datos['cantidad_fac'];
		                    v3[i] = datos['descripcion_fac'];
		                    v4[i] = datos['precio_unitario'];
		                    v5[i] = datos['precio_total'];
		                    v6[i] = datos['descuento'];
		                    v7[i] = datos['iva'];
		                }
		                
		                for (i = 0; i < filas.length; i++) {
		                    string_v1 = string_v1 + "|" + v1[i];
		                    string_v2 = string_v2 + "|" + v2[i];
		                    string_v3 = string_v3 + "|" + v3[i];
		                    string_v4 = string_v4 + "|" + v4[i];
		                    string_v5 = string_v5 + "|" + v5[i];
		                    string_v6 = string_v6 + "|" + v6[i];
		                    string_v7 = string_v7 + "|" + v7[i];
		                }

		                var combo = document.getElementById("txt_nombre_proveedor");

						$.ajax({       
							async:'false', 
					    	type: "POST",
					    	dataType: 'json',        
					    	data: $("#id-facturas").serialize() + "&campo1=" + string_v1 + "&campo2=" + string_v2 + "&campo3=" + string_v3 + "&campo4=" + string_v4 + "&campo5=" + string_v5 + "&campo6=" + string_v6 + "&campo7=" + string_v7 + "&razon_social=" + combo.options[combo.selectedIndex].text,
					    	url: "mod_cell.php?fn=8&id="+id,
					    	success: function(data, status) {      		
					    		if(data == 1) {
					    			$.gritter.add({
										title: 'FACTURA FÍSICA AGREGADA CORRECTAMENTE',
										class_name: 'gritter-success gritter-center',
										time: 2000,
									});	

					    			// facturas = '';
					    			$('#txt_nro_identificacion').html('');
								    $('#txt_nro_identificacion').append($("<option></option>"));          
								    $('#txt_nro_identificacion').trigger('chosen:updated');
								    $('#txt_nombre_proveedor').html('');
								    $('#txt_nombre_proveedor').append($("<option></option>"));          
								    $('#txt_nombre_proveedor').trigger('chosen:updated');
								    $('#txt_nombre_comercial').html('');
								    $('#txt_nombre_comercial').append($("<option></option>"));          
								    $('#txt_nombre_comercial').trigger('chosen:updated');
								    $('#sel_consumo').prop('selectedIndex',0);         
								    $('#sel_consumo').trigger('chosen:updated'); 

								    $("#id_proveedor").val('')
			                		$("#txt_4").val('');
			                		$("#txt_5").val('0.00');
			                		$("#txt_6").val('0.00');
			                		$("#txt_7").val('0.00');
			                		$("#txt_8").val('0.00');
			                		$("#txt_9").val('0.00');
			                		$("#txt_10").val('0.00');
			                		
			                		jQuery("#grid-table_agregar").clearGridData(true).trigger("reloadGrid");
			                		$("#grid_selector_2").trigger("reloadGrid");
			                		$("#grid_selector_3").trigger("reloadGrid");
					    		} else {
					    			alert('error al enviar datos');
					    			window.location.reload(true);
					    		}
					    	}
					    });				
					}
				}	
			}
		}
	}		
}

function appendToChosen(id,value,text,extra,extra1,chosen,chosen1) {            
    $('#'+chosen).append($("<option data-extra='"+extra+"' data-comercial='"+extra1+"'></option>").val(id).html(value)).trigger('chosen:updated');        
    var input_ci = $("#"+chosen1).children().next().children(); 
    $(input_ci).children().val(text);               
}




