<html>
<body>
<link rel="stylesheet" href="cp.css">

<hr>
<h1>Information of Customer and Product</h1>
<div style="text-align: right;">
  <?php include 'mainc.php'; ?>
</div>
<hr>
<h2>Displaying specific records<h2>
<hr>
<form method="post" action="wherec.php">
<h3>Enter Customer Id</h3>
<table border="1" align='center'>
<tr>
<td><input type="text" name="cid"></td>
</tr>
</table>
<input type="submit" name="submit" value="Display"><br><br>
<?php
$cid='';
include'connection.php';
if(isset($_POST['submit']))
{
if(!empty($_POST['cid']))
{
$cid=$_POST['cid'];
$sql1="SELECT * FROM customer where cid='".$cid."'";
$result=mysqli_query($con,$sql1);
echo"<h4>Records from customer table</h4><br>";
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
$sql1="SELECT * FROM product where cid='".$cid."'";
$result=mysqli_query($con,$sql1);
echo"<h4>Records from product table</h4><br>";
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
}
mysqli_close($con);
?>

</form>
</body>
</html>