<?php
	require_once("dbcontroller.php");
	$db_handle = new DBController();
	
	$sql = "SELECT * from tbl_product";
	$productResult = $db_handle->readData($sql);
?>
<style>
body{width:610px;font-family:calibri;}
#add-product table{width:100%;background-color:#F0F0F0;}
#add-product table th{text-align:left;}
#add-product table td{background-color:#FFFFFF;border-bottom:#F0F0F0 1px solid;text-align:left;word-break: break-all;max-width: 10px;vertical-align: top;}
#list-product table{width:100%;}
#list-product table th{border-bottom:#F0F0F0 2px solid;text-align:left;}
#list-product table td{border-bottom:#F0F0F0 1px solid;text-align:left;word-break: break-all;max-width: 10px;vertical-align: top;}
#btnSaveAction {
	background-color: #7fb378;
    padding: 5px 10px;
    color: #fff;
    border-radius: 4px;
	cursor:pointer;
	margin:10px 0px 40px;
	display:inline-block;
}

.txt-heading{    
	padding: 10px 10px;
    border-radius: 2px;
    color: #333;
    background: #d1e6d6;
	margin:20px 0px 5px;
}
</style>
<div id="add-product">
<div class="txt-heading">Add Product</div>
	<table cellpadding="10" cellspacing="1">
		<tbody>
			<tr>
				<th><strong>Name</strong></th>
				<th><strong>Code</strong></th>
				<th><strong>Description</strong></th>
				<th style="text-align:right;"><strong>Price</strong></th>
			</tr>	
			<tr>
				<td contentEditable="true" data-id="product_name"></td>
				<td contentEditable="true" data-id="product_code"></td>
				<td contentEditable="true" data-id="product_desc"></td>
				<td contentEditable="true" data-id="product_price" style="text-align:right;"></td>
			</tr>
		</tbody>
	</table>	
<div id="btnSaveAction">Save to Database</div>
</div>
<div id="list-product">
<div class="txt-heading">Products</div>
	<table cellpadding="10" cellspacing="1">
		<tbody id="ajax-response">
			<tr>
				<th><strong>Name</strong></th>
				<th><strong>Code</strong></th>
				<th><strong>Description</strong></th>
				<th style="text-align:right;"><strong>Price</strong></th>
			</tr>
			<?php 
				if(!empty($productResult)) { 
					foreach($productResult as $k=>$v) {
			?>
			<tr>
				<td><?php echo $productResult[$k]["product_name"]; ?></td>
				<td><?php echo $productResult[$k]["product_code"]; ?></td>
				<td><?php echo $productResult[$k]["product_desc"]; ?></td>
				<td style="text-align:right;"><?php echo $productResult[$k]["product_price"]; ?></td>
			</tr>
			<?php
					}
				}
			?>
		</tbody>
	</table>
</div>
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script>
$("#btnSaveAction").on("click",function(){
	params = ""
	$("td[contentEditable='true']").each(function(){
		if($(this).text() != "") {
			if(params != "") {
				params += "&";
			}
			params += $(this).data('id')+"="+$(this).text();
		}
	});
	if(params!="") {
		$.ajax({
			url: "insert-row.php",
			type: "POST",
			data:params,
			success: function(response){
			  $("#ajax-response").append(response);
			  $("td[contentEditable='true']").text("");
			}
		});
	}
});
</script>