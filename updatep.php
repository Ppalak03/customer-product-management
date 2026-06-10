<html>
<body>
<link rel="stylesheet" href="cp.css">

<hr>
<h1>Information of Customer and Product</h1>

<div style="text-align: right;">
<?php include 'mainc.php'; ?>
</div>

<hr>
<h2>Update records of product table</h2>
<hr>

<form method="post" action="updatep.php">

<h3>Enter Product ID to update product record</h3>

<table border="1" align="center">
<tr>
<td>Product ID: <input type="text" name="pid"></td>
</tr>
</table>

<br>
<input type="submit" name="submit" value="Submit">

<?php

include 'connection.php';

/* STEP 1 : SEARCH PRODUCT */

if(isset($_POST['submit']))
{

if(isset($_POST['pid']))
{

$pid = $_POST['pid'];

$query = "SELECT * FROM product WHERE pid='$pid'";

$result = mysqli_query($con,$query);

if($result && mysqli_num_rows($result) > 0)
{

$row = mysqli_fetch_assoc($result);

echo "<br>";

echo "<table border='1' align='center'>";

echo "<tr>
<td>Product ID</td>
<td><input type='text' name='pid' value='".$row['pid']."'></td>
</tr>";

echo "<tr>
<td>Product Name</td>
<td><input type='text' name='pname' value='".$row['pname']."'></td>
</tr>";

echo "<tr>
<td>Price</td>
<td><input type='text' name='price' value='".$row['price']."'></td>
</tr>";

echo "<tr>
<td>Customer ID</td>
<td><input type='text' name='cid' value='".$row['cid']."'></td>
</tr>";

echo "</table>";

echo "<br>";

echo "<input type='submit' name='submit1' value='Update'>";
}

else
{
echo "<h4>No matching product found</h4>";
}

}

}


/* STEP 2 : UPDATE RECORD */

if(isset($_POST['submit1']))
{

if(isset($_POST['pid']) && isset($_POST['pname']) && isset($_POST['price']) && isset($_POST['cid']))
{

$pid = $_POST['pid'];
$pname = $_POST['pname'];
$price = $_POST['price'];
$cid = $_POST['cid'];

$sql = "UPDATE product 
SET pname='$pname', price='$price', cid='$cid'
WHERE pid='$pid'";

$result1 = mysqli_query($con,$sql);

if($result1)
{
echo "<h4>Record updated successfully</h4>";
}
else
{
echo "<h4>Update failed</h4>";
}

}

}

mysqli_close($con);

?>

</form>

</body>
</html>