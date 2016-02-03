jQuery(function($) {	
	
	var arr = sacarid();
	console.log(sacarid());
	var facturas = Array();
	var id = arr['id'];		
	var grid_selector = "#grid-table";
	var pager_selector = "#grid-pager";
	var grid_selector_1= "#grid-table_busqueda";
	var pager_selector_1 = "#grid-pager_busqueda";
	var grid_selector_2= "#grid-table_agregar";
	var pager_selector_2 = "#grid-pager_agregar";

	validar_session(id);	
	//////////////
	$(".validar").keydown(function(e){
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
	/////////////////////
	$("#slt_consumo").css('width','100%').select2({allowClear:true})	
	$("#slt_tipo_documento_1").css('width','100%').select2({allowClear:true})	
	$("#slt_consumo_1").css('width','100%').select2({allowClear:true})		

	$("#sel_proveedor").css('width','100%').select2({allowClear:true})		
	$("#sel_consumo").css('width','100%').select2({allowClear:true})	
	$("#sel_documento").css('width','100%').select2({allowClear:true})	
	$('#sel_proveedor').on("change", function(e) {          
       $("#txt_1").val($( "#sel_proveedor option:selected" ).data('foo'));
    })
	
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
				$(grid_selector).jqGrid( 'setGridWidth', parent_column.width() );				
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
		viewrecords : true,
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

		//editurl: "/dummy.html",//nothing is saved
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
	function sacarid(){
		var x;
		$.ajax({
			url: 'mod_cell.php',
			type: 'POST',
			dataType: 'json',
			data: {object_id: '5'},
			async:false,
			success:function(data){
				x=data;
			}
		});
		return x;
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
			caption : 'Busqueda',
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
    ////////////////////////////////
    jQuery(grid_selector_1).jqGrid({				    	
	    //url: 'xml_busqueda.php?id='+id,                		
	    datatype: "xml",
        mtype: "GET",
        autoencode: false,
		height: 250,
		colNames:['ID','NRO FACTURA','id_proveedor','PROVEEDOR', 'SUBTOTAL', 'IMPUESTOS','PROPINA','TOTAL','FECHA EMISIÓN'],
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
			setTimeout(function(){
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
	jQuery(grid_selector_1).jqGrid('navGrid',pager_selector_1,
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
			caption : 'Busqueda',
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
			caption : 'Vista Previa',
			beforeShowForm: function(e){
				var form = $(e[0]);
				form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
			}
		}
	)	
	////////////////////////////
	 jQuery(grid_selector_2).jqGrid({				    		    	            
        autoencode: false,
        datatype: "local",
		height: 250,
		colNames:['ID','CODIGO','CANTIDAD','DESCRIPCION','P.UNITARIO','P. TOTAL'],
		colModel:[			
			{name:'id',index:'id',frozen:true,align:'left',search:false,editable: true, hidden: true, editoptions: {readonly: 'readonly'}},
            {name:'codigo_fac',index:'codigo_fac',editable:true},
            {name:'cantidad_fac',index:'cantidad_fac',editable:true},
            {name:'descripcion_fac',index:'descripcion_fac',editable:true},
            {name:'precio_unitario',index:'precio_unitario',editable:true},
            {name:'precio_total',index:'precio_total',editable:true},                       
            
		],
		viewrecords : true,
		rownumbers: true,
		rowNum:50,
		rowList:[50,100,150],
		pager : pager_selector_2,
		altRows: true,
		sortname: 'id',
	    sortorder: 'asc',	            
		caption: "",		
		editurl: 'clientArray',
		loadComplete : function() {
			var table = this;			
			setTimeout(function(){
				styleCheckbox(table);
				
				updateActionIcons(table);
				updatePagerIcons(table);
				enableTooltips(table);
			}, 0);			
		},						

	});

	$(window).triggerHandler('resize.jqGrid');//trigger window resize to make the grid get the correct size

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
	jQuery(grid_selector_2).jqGrid('navGrid',pager_selector_2,
		{ 	//navbar options
			edit: false,
			editicon : 'ace-icon fa fa-pencil blue',
			add: false,
			addicon : 'ace-icon fa fa-plus-circle purple',
			del: true,
			delicon : 'ace-icon fa fa-trash-o red',
			search: false,
			searchicon : 'ace-icon fa fa-search orange',
			refresh: true,
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
			onClick : function(e) {				

			},
			onclickSubmit: function(options, rowid) {
				var grid_id = $.jgrid.jqID(jQuery(grid_selector_2)[0].id),
                grid_p = jQuery(grid_selector_2)[0].p,
                newPage = grid_p.page;

            	// reset the value of processing option which could be modified
            	options.processing = true;

	            // delete the row
	            jQuery(grid_selector_2).delRowData(rowid);	            ///borrar	            
	            delete facturas[rowid];	            
	            $.jgrid.hideModal("#delmod"+grid_id,
	                              {gb:"#gbox_"+grid_id,
	                              jqm:options.jqModal,onClose:options.onClose});

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
			caption : 'Vista Previa',
			beforeShowForm: function(e){
				var form = $(e[0]);
				form.closest('.ui-jqdialog').find('.ui-jqdialog-title').wrap('<div class="widget-header" />')
			}
		}
	)	
	jQuery(grid_selector_2).inlineNav(pager_selector_2,{
		edit: true, 
        add: true, 
        addicon : 'ace-icon fa fa-plus-circle purple',
        del: true,
        delicon : 'ace-icon fa fa-trash-o red', 
        cancel: true,
       	addParams: {position: "last",
	        addRowParams: {
	            useFormatter:true,
	            keys: true,
	            aftersavefunc: function(id) {
	            	var rowData = jQuery(grid_selector_2).getRowData(id);	            	
	            	facturas[rowData.id] = rowData;	            		            		            		            	
	            }
	    	},//addParams
	    },
        editParams: {
            aftersavefunc: function (id) {
            	var rowData = jQuery(grid_selector_2).getRowData(id);
            	facturas[rowData.id] = rowData;	            	
            	//console.log(facturas)
	            
            },            
        
        }
        

	});
	///////////////////////le_
	function styedit_form(form) {
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

	//////////////////////////
	cargar_proveedor();	///cargar proveedores
	$("#btn_agregar_proveedor").on('click',function(){
		agregar_proveedor();
	})	
	
	/////actualizar correos al abrir la pagina///
	actualizar_correos(id);

	$("#btn_envio").on("click",function(){
		agregar_factura(id);
	});

	$("#btn_agregar").on("click",function(){
		agregar_factura_fisica(id,facturas);
	});
	////////////total mensajes nuevos/////////
	nuevos_mensajes(id);
	/////////////////////////////////////////

	$('.nav-tabs a').on('shown.bs.tab', function(e){
        if($(this).attr('href') == '#buscar'){
        	//console.log(moment().subtract(1, 'months').format('YYYY-MM-DD'));        	
        	var fecha_fin = moment(fecha_fin).subtract(0, 'months').endOf('month').format('YYYY-MM-DD');		        	        	
        	var fecha_ini = moment(fecha_ini).subtract(0, 'months').startOf('month').format('YYYY-MM-DD');		        	        	
        	var newUrl = 'xml_busqueda.php?id='+id+'&doc='+'01'+'&consumo='+'0'+'&ini='+fecha_ini+'&fin='+fecha_fin;
			$("#grid-table_busqueda").setGridParam({url:newUrl,page:1});
			$("#grid-table_busqueda").trigger("reloadGrid");
        }
    });

    $("#btn_consulta").on('click',function(){
    	var ini = $("#id-date-range-picker-1").data('daterangepicker').startDate.format('YYYY-MM-DD');
    	var fin = $("#id-date-range-picker-1").data('daterangepicker').endDate.format('YYYY-MM-DD');    	
    	var newUrl = 'xml_busqueda.php?id='+id+'&doc='+$("#slt_tipo_documento_1").val()+'&consumo='+$("#slt_consumo_1").val()+'&ini='+ini+'&fin='+fin;
    	$("#grid-table_busqueda").setGridParam({url:newUrl,page:1});
		$("#grid-table_busqueda").trigger("reloadGrid");
    })
});		

function actualizar_correos(id){
	$.ajax({        
    	type: "POST",
    	dataType: 'json',        
    	data: "id="+id,
    	url: "app.php",        
    	success: function(data, status) {      		
    		if(data == 1){
    			jQuery("#grid-table").trigger("reloadGrid")
    		}else{
    			//window.location.reload(true);
    		}
    	}
    });
}

function descarga_archivos (id,ext,user){	
	window.open("mod_cell.php?id="+id+"&fn=2"+"&ext="+ext+"&user="+user);   	
}
function reporte_pdf (id,ext,user){	
	window.open("reporte_pdf.php?id="+id+"&fn=2"+"&ext="+ext+"&user="+user,"","width=900,height=800,scrollbars=NO");   			 
	return false;
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
			//txt_2: {
			//	required: true				
			//}			
		},
		messages: {
			txt_clave: {
				required: "Campo Obligatorio"
			}
			//txt_2: {
			//	required: "Por favor, Digíte password / clave"
			//}			
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
			$("#btn_envio").append("<span class='ace-icon fa fa-spinner fa-spin write bigger-125'></span> Procesando");
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
		    		}else{
		    			if(data == 2) {
		    				$.gritter.add({
								title: 'LA FACTURA QUE INTENTA AGREGAR NO ES VALIDA',
								class_name: 'gritter-error gritter-center',
								time: 2000,
							});

		    				//alert('LA FACTURA QUE INTENTA AGREGAR NO ES VALIDA');
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
		    				}else{
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


	//if($("#txt_clave").val() == ''){
	//	alert('Debe Ingresar un valor');
	//	$("#txt_clave").focus();
	//} else {		
	//	if(isNaN($('#txt_clave').val())){
	//		alert('Solo valores numéricos');
	//		$("#txt_clave").val('');
	//		$("#txt_clave").focus();
	//	} else {
	//		if($("#txt_clave").val().length > 49 || $("#txt_clave").val().length < 49){
	//			alert('La clave de acceso debe contener 49 caractéres numéricos');
	//			$("#txt_clave").val('');
	//			$("#txt_clave").focus();
	//		}else{
	//			$.ajax({       
	//				async:'false', 
	//		    	type: "POST",
	//		    	dataType: 'json',        
	//		    	url: "mod_cell.php?fn=3&id="+id+"&acceso="+$("#txt_clave").val()+"&consumo="+$("#slt_consumo").val(),        
	//		    	success: function(data, status) {      		
	//		    		if(data == 1){
	//		    			alert('Factura Agregada Correctamente');
	//		    			jQuery('#grid-table').trigger('reloadGrid');
	//		    		}else{
	//		    			if(data == 2) {
	//		    				alert('LA FACTURA QUE INTENTA AGREGAR NO ES VALIDA');
	//		    			}else{
	//		    				if(data == 3) {
	//		    					alert('ESTA CLAVE DE ACCESO YA ESTA REGISTRADA EN ESTE CLIENTE')
	//		    				}else{
	//		    					alert("OCURRIO UN ERROR AL MOMENTO DE ENVIAR LOS DATOS");
	//		    				}
	//		    			}
	//		    		}
	//		    	}
	//		    });			
	//		}
	//	}			
	//}		
}

function nuevos_mensajes(id_user){	
	jQuery.ajax({
		type: 'POST',
		url: 'mod_cell.php?fn=4&id_user='+id_user,		
		dataType: 'json',
		success: function(retorno){				
			$("#id_nro_msg").text(retorno);
			if(retorno > 0){
				actualizar_correos(id_user);
			}
			setTimeout(function(){				
				nuevos_mensajes(id_user);
			},30000);
		},
		error: function(retorno) {
          	setTimeout(function(){				
				nuevos_mensajes(id_user);
			},30000);  
        }
	});
}

function getVarsUrl(){
    var url= location.search.replace("?", "");
    var arrUrl = url.split("&");
    var urlObj={};   
    for(var i=0; i<arrUrl.length; i++){
        var x= arrUrl[i].split("=");
        urlObj[x[0]]=x[1]
    }    
    return urlObj;
}
function validar_session(session){	
	jQuery.ajax({
		type: 'POST',
		url: 'mod_cell.php?fn=5&session='+session,		
		dataType: 'json',
		success: function(retorno){
			// if(retorno == 1){
			// 	setTimeout(validar_session,20000,session);
			// }else{
			// 	window.location.href = 'http://www.nextbook.ec/exitsalir.php';
			// }
		},error:function(){
			setTimeout(validar_session,20000,session);
		}
			
	});	
}

function cargar_proveedor(){	
	jQuery.ajax({  
		async:'false',
    	type: "POST",    	
    	url: 'mod_cell.php?fn=6',    	    	
        datatype: "text",        
    	success: function(retorno) {      		    		    		
    		$('#sel_proveedor').append(retorno);
			$('#sel_proveedor').trigger('chosen:updated');
    	},
    	error: function(retorno) {
        	
        }
    });
}

function agregar_proveedor(){
	if($('#txt_m_1').val() == ''){
		alert('Ingrese valores en el campo');
		$('#txt_m_1').focus();
	}else{
		if($('#txt_m_1').val().length == 13){
			if($('#txt_m_2').val() == ''){
				alert('Ingrese un nombre al proveedor');
				$('#txt_m_2').val('');	
				$('#txt_m_2').focus();	
			}else{
				if($('#txt_m_3').val() == ''){
					alert('Ingrese una dirección');
					$('#txt_m_3').val('');	
					$('#txt_m_3').focus();	
				}else{
					$.ajax({       
						async:'false', 
				    	type: "POST",
				    	dataType: 'json',        
				    	url: "mod_cell.php?fn=7&ruc="+$('#txt_m_1').val()+"&nombre="+$("#txt_m_2").val()+"&dir="+$("#txt_m_3").val(),        
				    	success: function(data, status) {      		
				    		if(data == 1){		
				    			alert('Datos Agregador Correctamente');	
				    			$('#txt_m_1').val('');	
				    			$('#txt_m_2').val('');	
				    			$('#txt_m_3').val('');
				    			$('#txt_1').val('');
				    			$('#sel_proveedor').html('');
				    			$('#sel_proveedor').append('<option value=""></option>');
				    			$('#modal-form').modal('hide');
				    			cargar_proveedor();
				    		}else{
				    			if(data == 0){		
				    				alert('Error el proveedor ya exisite');
				    				$('#txt_m_1').val('');	
									$('#txt_m_1').focus();	
				    			}else{
				    				alert('Error al enviar datos');		    		
				    				window.location.reload(true);
				    			}
				    			
				    		}
				    	}
				    });		
				}	
			}	
		}else{
			alert('El ruc debe tener 13 caractéres');
			$('#txt_m_1').val('');	
			$('#txt_m_1').focus();	
		}
	}	
}
function agregar_factura_fisica(id,facturas){
	
	if($("#sel_proveedor").val() == ''){
		alert('Seleccione un proveedor para poder continuar');		
	}else{				
		if($("#txt_2").val() == ''){
			alert('Indique la fecha de emisión de la factura')
			$("#txt_2").focus();
		}else{
			if($("#txt_3").val() == ''){
				alert('Indique la fecha de creación de la factura')
				$("#txt_3").focus();
			}else{
				if($("#txt_4").val() == '' || $("#txt_5").val() == '' || $("#txt_6").val() == '' || $("#txt_7").val() == ''){
					alert("Llene los datos de la factura");
					$("#txt_4").focus();
				}else{	
				var fac = '';							   					    				
    				for (var key in facturas) {
					    fac += JSON.stringify(facturas[key])+',';					    
					}										    				
					var parametros = {                		
                		"prov" : $('#sel_proveedor').val(),
                		"tipo" : $('#sel_consumo').val(),
                		"docu" : $('#sel_documento').val(),
                		"f_emi": $('#txt_2').val(),
                		"f_cre": $("#txt_3").val(),
                		"sub"  : $("#txt_4").val(),
                		"iva12": $("#txt_5").val(),
                		"iva0" : $("#txt_6").val(),
                		"tot"  : $("#txt_7").val(),
                		"num"  : $("#txt_8").val(),
                		"razon_social": $('#txt_1').val(),
                		"detalles":fac,
        			};
					$.ajax({       
						async:'false', 
				    	type: "POST",
				    	dataType: 'json',        
				    	data: parametros,
				    	url: "mod_cell.php?fn=8&id="+id,
				    	success: function(data, status) {      		
				    		if(data == 1){
				    			//console.log(jQuery('#grid-table_agregar').jqGrid('clearGridData'))
				    			alert('Factura Agregada Correctamente');				    			
				    			facturas = '';
				    			$('#txt_1').val('');
				    			$('#txt_2').val('');
		                		$("#txt_3").val('');
		                		$("#txt_4").val('');
		                		$("#txt_5").val('');
		                		$("#txt_6").val('');
		                		$("#txt_7").val('');
		                		$("#txt_8").val('');
		                		$("#sel_proveedor").val('');
		                		$('#sel_proveedor').select2().trigger('update');
		                		$("#sel_consumo").val('');
		                		$('#sel_consumo').select2().trigger('update');
		                		jQuery("#grid-table_agregar").clearGridData(true).trigger("reloadGrid");
		                		
		                		//$("#grid_selector_2").trigger("reloadGrid");

				    		}else{
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
