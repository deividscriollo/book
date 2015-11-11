jQuery(function($) {
	var id = '201511091317015640e31dec2ad';
	var grid_selector = "#grid-table";
	var pager_selector = "#grid-pager";
	
	//resize to fit page size
	$(window).on('resize.jqGrid', function () {
		$(grid_selector).jqGrid( 'setGridWidth', $("#obj_tabla_contenedor").width() );
    })
	//resize on sidebar collapse/expand
	var parent_column = $(grid_selector).closest('[class*="col-"]');
	$(document).on('settings.ace.jqGrid' , function(ev, event_name, collapsed) {
		if( event_name === 'sidebar_collapsed' || event_name === 'main_container_fixed' ) {
			//setTimeout is for webkit only to give time for DOM changes and then redraw!!!
			setTimeout(function() {
				$(grid_selector).jqGrid( 'setGridWidth', parent_column.width() );
			}, 0);
		}
    });
    jQuery(grid_selector).jqGrid({				    	
	    url: 'xml_correos.php?id='+id,                		
	    datatype: "xml",
        mtype: "GET",
        autoencode: false,
		// height: 350,
		colNames:['ID','TIPO DE DOCUMENTO','RAZÓN SOCIAL', 'TIPO CONSUMO', 'FECHA','REMITENTE',''],
		colModel:[			
			{name:'id',index:'id',frozen:true,align:'left',search:false,editable: true, hidden: true, editoptions: {readonly: 'readonly'}},
            {name:'tipo_consumo',index:'tipo_consumo',frozen : true,align:'left',search:true},
            {name:'razon_social',index:'razon_social',frozen : true,align:'left',search:true},            
            {name:'consumo',index:'consumo',width:70, editable: true,formatter: 'select',edittype:"select",editoptions: {
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
		viewrecords : true,
		rownumbers: true,
		rowNum:10,
		rowList:[10,20,30],
		pager : pager_selector,
		altRows: true,
		sortname: 'id',
	    sortorder: 'asc',
	    cellEdit: true,
    	cellsubmit : 'remote',
		cellurl : 'mod_cell.php?fn=1',
		//toppager: true,
		
		//multiselect: true,
		//multikey: "ctrlKey",
        //multiboxonly: true,         
      
		loadComplete : function() {
			var table = this;			
			setTimeout(function(){
				styleCheckbox(table);
				
				updateActionIcons(table);
				updatePagerIcons(table);
				enableTooltips(table);
			}, 0);
		},

		editurl: "/dummy.html",//nothing is saved
		caption: "FACTURA NEXT"

		//,autowidth: true,


		/**
		,
		grouping:true, 
		groupingView : { 
			 groupField : ['name'],
			 groupDataSorted : true,
			 plusicon : 'fa fa-chevron-down bigger-110',
			 minusicon : 'fa fa-chevron-up bigger-110'
		},
		caption: "Grouping"
		*/

	});
	$(window).triggerHandler('resize.jqGrid');//trigger window resize to make the grid get the correct size
	
	

	//enable search/filter toolbar
	//jQuery(grid_selector).jqGrid('filterToolbar',{defaultSearch:true,stringResult:true})
	//jQuery(grid_selector).filterToolbar({});


	//switch element when editing inline
	function aceSwitch( cellvalue, options, cell ) {
		setTimeout(function(){
			$(cell) .find('input[type=checkbox]')
				.addClass('ace ace-switch ace-switch-5')
				.after('<span class="lbl"></span>');
		}, 0);
	}
	//enable datepicker
	function pickDate( cellvalue, options, cell ) {
		setTimeout(function(){
			$(cell) .find('input[type=text]')
					.datepicker({format:'yyyy-mm-dd' , autoclose:true}); 
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
			refresh: true,
			refreshicon : 'ace-icon fa fa-refresh green',
			view: true,
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
			onClick : function(e) {
				//alert(1);
			}
		},
		{
			//search form
			recreateForm: true,
			afterShowSearch: function(e){
				var form = $(e[0]);
				form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
				style_search_form(form);
			},
			afterRedraw: function(){
				style_search_filters($(this));
			}
			,
			multipleSearch: true,
			/**
			multipleGroup:true,
			showQuery: true
			*/
		},
		{
			//view record form
			recreateForm: true,
			width: 500,
			beforeShowForm: function(e){
				var form = $(e[0]);
				form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
			}
		}
	)


	
	function style_edit_form(form) {
		//enable datepicker on "sdate" field and switches for "stock" field
		form.find('input[name=sdate]').datepicker({format:'yyyy-mm-dd' , autoclose:true})
		
		form.find('input[name=stock]').addClass('ace ace-switch ace-switch-5').after('<span class="lbl"></span>');
				   //don't wrap inside a label element, the checkbox value won't be submitted (POST'ed)
				  //.addClass('ace ace-switch ace-switch-5').wrap('<label class="inline" />').after('<span class="lbl"></span>');

				
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



	//it causes some flicker when reloading or navigating grid
	//it may be possible to have some custom formatter to do this as the grid is being created to prevent this
	//or go back to default browser checkbox styles for the grid
	function styleCheckbox(table) {
	/**
		$(table).find('input:checkbox').addClass('ace')
		.wrap('<label />')
		.after('<span class="lbl align-top" />')


		$('.ui-jqgrid-labels th[id*="_cb"]:first-child')
		.find('input.cbox[type=checkbox]').addClass('ace')
		.wrap('<label />').after('<span class="lbl align-top" />');
	*/
	}
	

	//unlike navButtons icons, action icons in rows seem to be hard-coded
	//you can change them like this in here if you want
	function updateActionIcons(table) {
		/**
		var replacement = 
		{
			'ui-ace-icon fa fa-pencil' : 'ace-icon fa fa-pencil blue',
			'ui-ace-icon fa fa-trash-o' : 'ace-icon fa fa-trash-o red',
			'ui-icon-disk' : 'ace-icon fa fa-check green',
			'ui-icon-cancel' : 'ace-icon fa fa-times red'
		};
		$(table).find('.ui-pg-div span.ui-icon').each(function(){
			var icon = $(this);
			var $class = $.trim(icon.attr('class').replace('ui-icon', ''));
			if($class in replacement) icon.attr('class', 'ui-icon '+replacement[$class]);
		})
		*/
	}
	
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
	/////actualizar correos al abrir la pagina///
	actualizar_correos(id);

	//////agrega nuevas facturas ////

	$("#btn_envio").on("click",function(){
		agregar_factura(id);
	});
});		

function actualizar_correos(){
	$.ajax({        
    	type: "POST",
    	dataType: 'json',        
    	url: "app.php",        
    	success: function(data, status) {      		
    		if(data == 1){
    			jQuery("#grid-table").trigger("reloadGrid")
    		}else{
    			window.location.reload(true);
    		}
    	}
    });
}

function descarga_archivos (id,ext,user){	
	window.open("mod_cell.php?id="+id+"&fn=2"+"&ext="+ext+"&user="+user,'_blank');   	
}
function reporte_pdf (id,ext,user){	
	window.open("reporte_pdf.php?id="+id+"&fn=2"+"&ext="+ext+"&user="+user,'_blank');   		
}

function agregar_factura(id){
	$.ajax({        
    	type: "POST",
    	dataType: 'json',        
    	url: "mod_cell.php?fn=3&id="+id+"&acceso="+$("#txt_clave").val()+"&consumo="+$("#slt_consumo").val(),        
    	success: function(data, status) {      		
    		if(data == 1){
    			alert('Factura Agregada Correctamente');
    			jQuery('#grid-table').trigger('reloadGrid');
    		}else{
    			if(data == 2){
    				alert('LA FACTURA QUE INTENTA AGREGAR NO ES VALIDA');
    			}else{
    				if(data == 3){
    					alert('ESTA CLAVE DE ACCESO YA ESTA REGISTRADA EN ESTE CLIENTE')
    				}else{
    					alert("OCURRIO UN ERROR AL MOMENTO DE ENVIAR LOS DATOS");
    				}
    			}
    		}
    	}
    });	
}

