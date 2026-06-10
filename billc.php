<html>
<body>
<link rel="stylesheet" href="cp.css">

<hr>
<h1>Informaton of Customer and Product</h1>
<div style="text-align: right;">
  <?php include 'mainc.php'; ?>
</div>
<hr>
<h2>Bill Details</h2>
<hr>

<?php
include 'connection.php';


// Retrieve CID and PID from URL
$cid = isset($_GET['cid']) ? $_GET['cid'] : '';
$pid = isset($_GET['pid']) ? $_GET['pid'] : '';

if ($cid && $pid) {
    // Query to fetch transaction details based on CID and PID
    $sql = "SELECT * FROM transction WHERE cid = '$cid' AND pid = '$pid'";
    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<table border='1' align='center'>";
        echo "<tr><th>Transaction Id</th><th>Transaction Date</th><th>Customer Id</th><th>Product Id</th><th>Quantity</th><th>Price</th><th>Total</th></tr>";

        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['tid'] . "</td>";
            echo "<td>" . $row['tdate'] . "</td>";
            echo "<td>" . $row['cid'] . "</td>";
            echo "<td>" . $row['pid'] . "</td>";
            echo "<td>" . $row['qty'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>" . $row['total'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No transaction records found for this customer and product.</p>";
    }
} else {
    echo "<p>Invalid customer or product ID.</p>";
}

mysqli_close($con);
?>

</body>
</html>
