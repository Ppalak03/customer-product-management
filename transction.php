<html>
<body>
<link rel="stylesheet" href="cp.css">

<hr>
<h1>Information of Customer and Product</h1>
<div style="text-align: right;">
<?php include 'mainc.php'; ?>
</div>
<hr>

<?php
include 'connection.php';

if (isset($_POST['bill'])) 
{
header("Location: billc.php?cid=" . $_POST['cid'] . "&pid=" . $_POST['pid']);
exit();
}
echo "<h2>Bill Calculation</h2>";
echo "<hr>";
?>


<form method="post" action="transction.php">
<?php
$sql = "CREATE TABLE IF NOT EXISTS transction (
    tid INT AUTO_INCREMENT PRIMARY KEY,
    tdate DATE DEFAULT CURRENT_DATE,
    qty INT,
    price FLOAT,
    cid INT,
    pid INT,
    total FLOAT,
    FOREIGN KEY (cid) REFERENCES customer(cid),
    FOREIGN KEY (pid) REFERENCES product(pid)
)";
mysqli_query($con, $sql);

echo "<h3>Select Customer Id</h3>";
$sql1 = "SELECT * FROM customer";
$result = mysqli_query($con, $sql1);

echo "<select name='cid'>";
echo "<option value=''>Customer Id</option>";
while ($row = mysqli_fetch_array($result)) 
{
$selected = (isset($_POST['cid']) && $_POST['cid'] == $row['cid']) ? "selected" : "";
echo "<option value='{$row['cid']}' $selected>{$row['cid']}.{$row['cname']}</option>";
}
echo "</select>";

echo "<h3>Select Product Id</h3>";
$sql2 = "SELECT * FROM product";
$result1 = mysqli_query($con, $sql2);

echo "<select name='pid'>";
echo "<option value=''>Product Id</option>";
while ($row = mysqli_fetch_array($result1))
{
$selected = (isset($_POST['pid']) && $_POST['pid'] == $row['pid']) ? "selected" : "";
echo "<option value='{$row['pid']}' $selected>{$row['pid']}.{$row['pname']}</option>";
}
echo "</select><br><br>";

$qty='';
if(isset($_POST['qty']))
{
$qty=$_POST['qty'];
}
echo'<h3>Enter Quantity</h3>';
echo'<input type="text" name="qty" value="'. htmlspecialchars($qty) . '"><br>';

$price = $total = '';
if (isset($_POST['submit']))
{
if(isset($_POST['pid']) && isset($_POST['cid'])) 
{
$pid =$_POST['pid'];
$cid = $_POST['cid'];

if (!empty($pid) && !empty($cid)) 
{
       
$sql = "SELECT * FROM product WHERE pid = '$pid' AND cid='$cid'";
$result = mysqli_query($con, $sql);

if ($row = mysqli_fetch_array($result)) 
{
$qty=$_POST['qty'];
$price = $row['price'];
$total = (int)$qty*(int)$price;
} 
else 
{
echo "<p>Record Not Found</p>";
        }
    } 
    else 
    {
        echo "<p style='color:red;'>Please select both Customer ID and Product ID.</p>";
    }
}
}


echo "<label><h3>Price:</h3></label> <input type='text' name='price' value='" . htmlspecialchars($price) . "'><br>";
echo "<label><h3>Total:</h3></label> <input type='text' name='total' value='" . htmlspecialchars($total) . "'><br><br>";

echo "<input type='submit' name='submit' value='Get Details'>";
echo "<input type='submit' name='save' value='Save'>";
echo"<input type='submit' name='bill' value='Display Bill'>";
if (isset($_POST['save'])) 
{
    $cid = $_POST['cid'];
    $pid = $_POST['pid'];
    $qty = $_POST['qty'];
    $price = $_POST['price'];
    $total = $_POST['total'];

    $sql = "INSERT INTO transction(tdate, qty, price, total, cid, pid) 
            VALUES (CURRENT_DATE, '$qty', '$price', '$total', '$cid', '$pid')";

    if (mysqli_query($con, $sql)) 
    {
        echo "<h4>Record inserted successfully</h4>";
    } 
    else 
    {
        echo "<p>Error: " . mysqli_error($con) . "</p>";
    }
}

mysqli_close($con);
?>
</form>
</body>
</html>
