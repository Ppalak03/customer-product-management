<html>
<body>
<link rel="stylesheet" href="cp.css">

<hr>
<h1>Information of Customer and Product</h1>

<div style="text-align: right;">
<?php include 'mainc.php'; ?>
</div>

<hr>
<h2>INSERT information into product table</h2>
<hr>

<form method="post" action="insertp.php">

<?php
include 'connection.php';

/* Create product table if not exists */
$sql="CREATE TABLE IF NOT EXISTS product(
pid INT PRIMARY KEY,
pname VARCHAR(50),
price INT,
cid INT
)";
mysqli_query($con,$sql);

if(isset($_POST['product']))
{

echo "<table border='1' align='center'>";
echo "<tr><td>Product ID</td><td><input type='text' name='pid'></td></tr>";
echo "<tr><td>Product name</td><td><input type='text' name='pname'></td></tr>";
echo "<tr><td>Price</td><td><input type='text' name='price'></td></tr>";
echo "<tr><td>Customer ID</td><td><input type='text' name='cid'></td></tr>";
echo "</table>";

echo "<input type='submit' name='product'>";

if(isset($_POST['pid']) && isset($_POST['pname']) && isset($_POST['price']) && isset($_POST['cid']))
{

$pid=$_POST['pid'];
$pname=$_POST['pname'];
$price=$_POST['price'];
$cid=$_POST['cid'];

$sql1="INSERT INTO product(pid,pname,price,cid) 
VALUES('$pid','$pname','$price','$cid')";

mysqli_query($con,$sql1);

echo "<br><h4>Record is inserted into table</h4>";
}

mysqli_close($con);

}
?>

</form>
</body>
</html>