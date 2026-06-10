<?php
$con=mysqli_connect("localhost","root","");
if(!$con)
{
die("Connection is not established");
}
$db=mysqli_select_db($con,"pdb");
if(!$db)
{
die("Database does not exists");
}
?>