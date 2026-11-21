<?php
$con=mysqli_connect("localhost","user_name","password");
if(!$con)
{
die("Connection is not established");
}
$db=mysqli_select_db($con,"DB_Name");
if(!$db)
{
die("Database does not exists");
}
?>
