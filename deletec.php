<html>
<body>
<link rel="stylesheet" href="cp.css">

<hr>
<h1>Information of Customer and Product</h1>
<div style="text-align: right;">
  <?php include 'mainc.php'; ?>
</div>
<hr>
<h2>Delete records</h2>
<hr>

<form method="post" action="deletec.php">
<h3>Enter Customer id and Product id to delete record</h3>
<table border=1 align='center'>
<tr>
<td>Customer ID: <input type="text" name="cid"></td>
</tr>
<tr>
<td>Product ID: <input type="text" name="pid"></td>
</tr>
</table>
<input type="submit" name="delete" value="Delete">
<?php
$cid='';
$pid='';
include'connection.php';
if(isset($_POST['delete']))
{
if(isset($_POST['pid']) && isset($_POST['cid']))
{
$pid=$_POST['pid'];
$cid=$_POST['cid'];

$deleteProduct = "DELETE FROM product WHERE pid='".$pid."' AND cid='".$cid."'";
$deleteCustomer = "DELETE FROM customer WHERE cid='".$cid."'";

mysqli_query($con, $deleteProduct);
mysqli_query($con, $deleteCustomer);

echo"<h4>Product and Customer records deleted successfully</h4>";
}
}
mysqli_close($con);
?>