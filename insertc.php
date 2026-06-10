<html>
<body>

<link rel="stylesheet" href="cp.css">
<center>
<hr>
<h1>Information of Customer and Product</h1>

<div style="text-align: right;">
<?php include 'mainc.php'; ?>
</div>

<hr>
<h2>Insert information into customer table</h2>
<hr>

<form method="post" action="insertc.php" align="center">

<?php
include 'connection.php';

/* Create table if not exists */
$sql="CREATE TABLE IF NOT EXISTS customer(
cid INT PRIMARY KEY,
cname VARCHAR(50),
city VARCHAR(50)
)";
mysqli_query($con,$sql);

if(isset($_POST['customer']))
{

echo "<table border='1' align='center'>";
echo "<tr><td>ID</td><td><input type='text' name='cid'></td></tr>";
echo "<tr><td>Customer name</td><td><input type='text' name='cname'></td></tr>";
echo "<tr><td>City</td><td><input type='text' name='city'></td></tr>";
echo "</table>";

echo "<input type='submit' name='customer'>";

if(isset($_POST['cid']) && isset($_POST['cname']) && isset($_POST['city']))
{

$cid=$_POST['cid'];
$cname=$_POST['cname'];
$city=$_POST['city'];

$sql1="INSERT INTO customer(cid,cname,city) 
VALUES('$cid','$cname','$city')";

mysqli_query($con,$sql1);

echo "<br><h4>Record is inserted into table</h4>";
}

mysqli_close($con);

}
?>

</form>
</body>
</html>