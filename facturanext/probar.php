
<!DOCTYPE html>
<!-- saved from url=(0028)http://localhost:21031/Admin -->
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/start/jquery-ui.css" />
    <link href="Admin_files/Site.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="http://www.ok-soft-gmbh.com/jqGrid/jquery.jqGrid-4.1.2/css/ui.jqgrid.css" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://www.ok-soft-gmbh.com/jqGrid/jquery.jqGrid-4.1.2/js/i18n/grid.locale-en.js"></script>
    <script type="text/javascript">
        $.jgrid.no_legacy_api = true;
        $.jgrid.useJSON = true;
    </script>
    <script type="text/javascript" src="http://www.ok-soft-gmbh.com/jqGrid/jquery.jqGrid-4.1.2/js/jquery.jqGrid.min.js"></script>

    <!--<script src="./Admin_files/jquery.ui.widget.js" type="text/javascript"></script>
    <script src="./Admin_files/jquery.ui.mouse.js" type="text/javascript"></script>
    <script src="./Admin_files/jquery.ui.slider.js" type="text/javascript"></script>-->
    <script src="Admin_files/jquery.validate.min.js" type="text/javascript"></script>
    <script src="Admin_files/jquery.validate.unobtrusive.min.js" type="text/javascript"></script>
    <script src="Admin_files/jquery.unobtrusive-ajax.min.js" type="text/javascript"></script>

    <style type="text/css">
        /* fix the size of the pager */ input.ui-pg-input { width: auto; }
        div.ui-jqgrid-view table.ui-jqgrid-btable { border-style:none; /*border-top-style:none;*/ border-collapse:separate; }
        div.ui-jqgrid-view table.ui-jqgrid-btable td { border-left-style:none }
        div.ui-jqgrid-view table.ui-jqgrid-htable { border-style:none; /*border-top-style:none;*/ border-collapse:separate; }
        div.ui-jqgrid-view table.ui-jqgrid-btable th { border-left-style:none }
    </style>
</head>
<body>
<!--Grid First -->
    <script type="text/javascript">
    //<![CDATA[
    $(document).ready(function () {
        var mydata = [
                { id: "1",  race: "20 Mar 2010 10:40 Normal 1 1000", name: "test",   online: true },
                { id: "2",  race: "20 Mar 2010 10:40 Normal 1 1000", name: "test2",  online: true },
                { id: "3",  race: "20 Mar 2010 10:40 Normal 1 1000", name: "test3",  online: true },
                { id: "4",  race: "22 Mar 2010 10:40 Bad 1 1000",    name: "test4",  online: true },
                { id: "5",  race: "22 Mar 2010 10:40 Bad 1 1000",    name: "test5",  online: true },
                { id: "6",  race: "22 Mar 2010 10:40 Bad 1 1000",    name: "test6",  online: true },
                { id: "7",  race: "20 Mar 2010 10:40 Good 1 1000",   name: "test7",  online: true },
                { id: "8",  race: "20 Mar 2010 10:40 Good 1 1000",   name: "test8",  online: true },
                { id: "9",  race: "12 Mar 2010 10:40 Normal 1 1000", name: "test9",  online: true },
                { id: "10", race: "12 Mar 2009 10:40 Normal 1 1000", name: "test10", online: true },
                { id: "11", race: "16 Mar 2009 10:40 Good 1 1000",   name: "test11", online: true },
                { id: "12", race: "16 Mar 2009 10:40 Good 1 1000",   name: "test12", online: true }
            ],
            lastSel,
            grid = $("#List1"),
            getColumnIndexByName = function(grid,columnName) {
                var cm = grid.jqGrid('getGridParam','colModel'), i=0,l=cm.length;
                for (; i<l; i+=1) {
                    if (cm[i].name===columnName) {
                        return i; // return the index
                    }
                }
                return -1;
            },
            myDelOptions = {
                // because I use "local" data I don't want to send the changes to the server
                // so I use "processing:true" setting and delete the row manually in onclickSubmit
                onclickSubmit: function (rp_ge, rowid) {
                    // reset the value of processing option to true to
                    // skip the ajax request to 'clientArray'.
                    rp_ge.processing = true;

                    // we can use onclickSubmit function as "onclick" on "Delete" button
                    // delete row
                    grid.jqGrid('delRowData', rowid);
                    $("#delmod" + grid[0].id).hide();

                    if (grid[0].p.lastpage > 1) {
                        // reload grid to make the row from the next page visable.
                        // TODO: deleting the last row from the last page which number is higher as 1
                        grid.trigger("reloadGrid", [{ page: grid[0].p.page}]);
                    }

                    return true;
                },
                processing: true
            };

        grid.jqGrid({
            datatype: "local",
            data: mydata,
            colNames: ['Actions', 'Id', 'Race', 'Name', 'Online'],
            colModel: [
                    { name: 'act', index: 'act', width: 75, align: 'center', sortable: false, formatter: 'actions',
                        formatoptions: {
                            keys: true, // we want use [Enter] key to save the row and [Esc] to cancel editing.
                            delOptions: myDelOptions
                        }
                    },
                    { name: 'id', index: 'id', width: 70, align: 'center', sorttype: 'int', searchoptions: { sopt: ['eq', 'ne'] }, hidden: true },
                    { name: 'race', index: 'race', width: 100, editable: false },
                    { name: 'name', index: 'name', editable: true, width: 340, editrules: { required: true} },
                    { name: 'online', index: 'online', width: 60, align: 'center', editable: true, formatter: 'checkbox',
                        edittype: "checkbox", editoptions: { value: "Yes:No", defaultValue: "Yes" },
                        stype: "select", searchoptions: { sopt: ['eq', 'ne'], value: ":All;true:Yes;false:No" }
                    }
                ],
            rowNum: 10,
            rowList: [5, 10, 20],
            pager: '#Pager1',
            gridview: true,
            rownumbers: true,
            ignoreCase: true,
            sortname: 'invdate',
            viewrecords: true,
            sortorder: "desc",
            caption: "How to use custom 'action' button",
            height: "100%",
            editurl: 'clientArray',
            grouping: true,
            groupingView: {
                groupField: ['race'],
                groupColumnShow: [false],
                groupText: ['<b>{0}</b>'],
                groupDataSorted: true
            },
            ondblClickRow: function (id) {
                // edit the row and save it on press "enter" key
                grid.jqGrid('editRow', id, true, null, null, 'clientArray');

            },
            onSelectRow: function (id) {
                if (id && id !== lastSel) {
                    // cancel editing of the previous selected row if it was in editing state.
                    // jqGrid hold intern savedRow array inside of jqGrid object,
                    // so it is safe to call restoreRow method with any id parameter
                    // if jqGrid not in editing state
                    if (typeof lastSel !== "undefined") {
                        grid.jqGrid('restoreRow', lastSel);
                    }
                    lastSel = id;
                }
                 alert(lastSel)

            },
            loadComplete: function () {
                var iCol = getColumnIndexByName(grid,'act');
                grid.children("tbody")
                    .children("tr.jqgrow")
                    .children("td:nth-child("+(iCol+1)+")")
                    .each(function() {
                        $("<div>",
                            {
                                //style: "margin-left: 5px; float:left",
                                //class: "ui-pg-div ui-inline-custom",
                                title: "Custom",
                                mouseover: function() {
                                    $(this).addClass('ui-state-hover');
                                },
                                mouseout: function() {
                                    $(this).removeClass('ui-state-hover');
                                },
                                click: function(e) {
                                    alert("'Custom' button is clicked in the rowis="+
                                          $(e.target).closest("tr.jqgrow").attr("id") +" !");
                                }
                            }
                          ).css({"margin-left": "5px", float:"left"})
                           .addClass("ui-pg-div ui-inline-custom")
                           .append('<span class="ui-icon ui-icon-document"></span>')
                           .appendTo($(this).children("div"));
                });
            }
        }).jqGrid('navGrid', '#Pager1', { add: true, edit: false }, {}, {},
                  myDelOptions, { multipleSearch: true, overlay: false });
    });
    //]]>
    </script>
    <table id="List1"><tr><td></td></tr></table>
    <div id="Pager1"></div>
</body>
</html>