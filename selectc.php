<html>
<body>
<link rel="stylesheet" href="cp.css">

<hr>
<h1>Information of Customer and Product</h1>
<div style="text-align: right;">
  <?php include 'mainc.php'; ?>
</div>
<hr>
<h2>Displaying recodrs</h2>
<hr>
<form method="post" action="selectc.php">
<?php

include'connection.php';
if(isset($_POST['display']))
{
$sql1="SELECT * FROM customer";
$result=mysqli_query($con,$sql1);
echo"<h3>All records of customer table</h3><br>";
echo"<table border='1' align='center'>";
echo"<th>Customer ID</th><th>Customer Name</th><th>City</th>";

while($row=mysqli_fetch_array($result))
{
echo"<tr>";
echo"<td>".$row['cid']."</td>";
echo"<td>".$row['cname']."</td>";
echo"<td>".$row['city']."</td>";
echo"</tr>";
}
echo"</table>";

$sql1="SELECT * FROM product";
$result=mysqli_query($con,$sql1);
echo"<h3>All records of product table</h3><br>";
echo"<table border='1' align='center'>";
echo"<th>Product ID</th><th>Product Name</th><th>Price</th><th>Customer ID</th>";

while($row=mysqli_fetch_array($result))
{
echo"<tr>";
echo"<td>".$row['pid']."</td>";
echo"<td>".$row['pname']."</td>";
echo"<td>".$row['price']."</td>";
echo"<td>".$row['cid']."</td>";
echo"</tr>";
}
echo"</table>";
}

mysqli_close($con);
?>

</form>
</body>
</html>