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
            { name: "id", width: 25 },
			{ name: "item_name", width: 120, editable:true },
			{ name: "category_name", width:90, editable:true, edittype:"select", 
				editoptions:{value:"Backpacks:Backpacks;Camp Gear:Camp Gear;Electronics:Electronics;Emergency Supplies:Emergency Supplies;Eyewear:Eyewear;Fire Supplies:Fire Supplies;Food:Food;Foot Warmth:Foot Warmth;Gloves and Mittens:Gloves and Mittens;Head Warmth:Head Warmth;Jackets:Jackets;Layers:Layers;Lights:Lights;Mess Kit:Mess Kit;Mountaineering Gear:Mountaineering Gear;Navigation:Navigation;Pants:Pants;Personal Items:Personal Items;Stuff Sacks:Stuff Sacks;Sleeping Gear:Sleeping Gear;Tents:Tents;Toiletries:Toiletries;Water:Water;Other:Other"}},
            { name: "unit_weight", width: 45, editable:true, align:"center"},
            { name: "inventory", width: 40, align: "center", editable:true },
            { name: "primary_user", width: 50, align: "center", editable:true, edittype:"select", editoptions:{value:"Pat:Pat;Jessi:Jessi;N/A:N/A"} },
            { name: "brand", width: 80, align: "left", editable:true }
        ],
        pager: "#pager",
        rowNum: 30,
        rowList: [30, 100, 200],
		height: 400,
		width: 900,
        sortname: "id",
        sortorder: "desc",
        viewrecords: true,
        gridview: true,
        autoencode: true,
		cellEdit : true,
		cellsubmit : "remote",
		cellurl : "gear_edit_cells.php",
        caption: "Gear List",
		editurl:"gear.php"
    }); 
}); 


</script>


</head>
<body>
<!--Add Data-->
<input type="BUTTON" id="adddata" value="Add">
<script type="text/javascript">
	$("#adddata").click(function(){
		$("#list").jqGrid('editGridRow',"new",{
		height:280,
		reloadAfterSubmit:true, 
		closeAfterAdd : false
		});
	});
</script>   

<!--Delete Row-->
<input type="BUTTON" id="deleterow" value="Delete Selected">
<script type="text/javascript">
	$("#deleterow").click(function(){
		var gr = jQuery("#list").jqGrid('getGridParam','selrow');
		if( gr != null ) $("#list").jqGrid('delGridRow',gr,{reloadAfterSubmit:true});
		else alert("Please Select Row to delete!");
	});
</script>   
<table id="list"><tr><td></td></tr></table> 
    <div id="pager"></div> 

	</body>

</html>
