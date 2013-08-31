<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" id="twentytwelve-style-css" href="http://thefreedomofthehills.com/wp-content/themes/twentytwelve/style.css" type="text/css" media="all">
<link rel="stylesheet" id="twentytwelve-fonts-css" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700&amp;subset=latin,latin-ext" type="text/css" media="all">


<link rel="stylesheet" type="text/css" media="screen" href="wp-content/plugins/jqgrid/css/smoothness/jquery-ui-1.10.3.custom.css" />
<link rel="stylesheet" type="text/css" media="screen" href="wp-content/plugins/jqgrid/css/ui.jqgrid.css" />
 
<script src="wp-content/plugins/jqgrid/js/jquery-1.9.0.min.js" type="text/javascript"></script>
<script src="wp-content/plugins/jqgrid/js/i18n/grid.locale-en.js" type="text/javascript"></script>
<script src="wp-content/plugins/jqgrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>

<script type="text/javascript">
$(function () {
    $("#list").jqGrid({
        url: "gear_driver.php",
        datatype: "xml",
        mtype: "GET",
        colNames: ["ID" , "Item Name", "Category", "Unit Weight", "Inventory", "Primary User", "Brand"],
        colModel: [
            { name: "id", width: 55 },
			{ name: "item_name", width: 90, editable:true },
			{ name: "category_name", width:90, editable:true },
            { name: "unit_weight", width: 90, editable:true },
            { name: "inventory", width: 80, align: "left", editable:true },
            { name: "primary_user", width: 80, align: "left", editable:true },
            { name: "brand", width: 80, align: "left", editable:true }
        ],
        pager: "#pager",
        rowNum: 30,
        rowList: [30, 100, 200],
		height: 400,
		width: 800,
        sortname: "id",
        sortorder: "desc",
        viewrecords: true,
        gridview: true,
        autoencode: true,
		cellEdit : true,
		cellsubmit : "remote",
		cellurl : "edit_cells.php",
        caption: "Gear List"
    }); 
}); 
</script>

</head>
<body>
   
<table id="list"><tr><td></td></tr></table> 
    <div id="pager"></div> 

	</body>

</html>
