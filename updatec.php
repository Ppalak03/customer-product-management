<html>
<body>
<link rel="stylesheet" href="cp.css">

<hr>
<h1>Information of Customer and Product</h1>

<div style="text-align: right;">
<?php include 'mainc.php'; ?>
</div>

<hr>
<h2>Update records of customer table</h2>
<hr>

<form method="post" action="updatec.php">

<h3>Enter Customer ID to update record</h3>

<table border="1" align="center">
<tr>
<td>Customer ID: <input type="text" name="cid"></td>
</tr>
</table>

<br>
<input type="submit" name="submit" value="Submit">

<?php

include 'connection.php';

/* STEP 1 : SEARCH CUSTOMER */

if(isset($_POST['submit']))
{

if(isset($_POST['cid']))
{

$cid = $_POST['cid'];

$query = "SELECT * FROM customer WHERE cid='$cid'";

$result = mysqli_query($con,$query);

if($result && mysqli_num_rows($result) > 0)
{

$row = mysqli_fetch_assoc($result);

echo "<br>";

echo "<table border='1' align='center'>";

echo "<tr>
<td>Customer ID</td>
<td><input type='text' name='cid' value='".$row['cid']."'></td>
</tr>";

echo "<tr>
<td>Customer Name</td>
<td><input type='text' name='cname' value='".$row['cname']."'></td>
</tr>";

echo "<tr>
<td>City</td>
<td><input type='text' name='city' value='".$row['city']."'></td>
</tr>";

echo "</table>";

echo "<br>";

echo "<input type='submit' name='submit1' value='Update'>";

}

else
{
echo "<h4>No matching customer found</h4>";
}

}

}


/* STEP 2 : UPDATE RECORD */

if(isset($_POST['submit1']))
{

if(isset($_POST['cid']) && isset($_POST['cname']) && isset($_POST['city']))
{

$cid = $_POST['cid'];
$cname = $_POST['cname'];
$city = $_POST['city'];

$sql = "UPDATE customer 
SET cname='$cname', city='$city'
WHERE cid='$cid'";

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