<?php
	require_once("dbcontroller.php");
	$db_handle = new DBController();
	$product_name = "";
	$product_code = "";
	$product_desc = "";
	$product_price = "";

	if(!empty($_POST["product_name"])) {
		$product_name = $db_handle->cleanData($_POST["product_name"]);
	}
	if(!empty($_POST["product_code"])) {
		$product_code = $db_handle->cleanData($_POST["product_code"]);
	}
	if(!empty($_POST["product_desc"])) {
		$product_desc = $db_handle->cleanData($_POST["product_desc"]);
	}
	if(!empty($_POST["product_price"])) {
		$product_price = $db_handle->cleanData($_POST["product_price"]);
	}

	$sql = "INSERT INTO tbl_product (product_name,product_code,product_desc,product_price) VALUES ('" . $product_name . "','" . $product_code . "','" . $product_desc . "','" . $product_price . "')";
	$product_id = $db_handle->executeInsert($sql);

	if(!empty($product_id)) {
		$sql = "SELECT * from tbl_product WHERE id = '$product_id' ";
		$productResult = $db_handle->readData($sql);
	}
?>
<?php 
	if(!empty($productResult)) { 
?>
<tr>
	<td><?php echo $productResult[0]["product_name"]; ?></td>
	<td><?php echo $productResult[0]["product_code"]; ?></td>
	<td><?php echo $productResult[0]["product_desc"]; ?></td>
	<td style="text-align:right;"><?php echo $productResult[0]["product_price"]; ?></td>
</tr>
<?php
	}
?>	
