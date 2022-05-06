<?php 

$con=mysqli_connect("localhost","root","","deepak");

$ID=$_POST['Id'];
$sql="delete from demo where id='$ID'";
$result=mysqli_query($con,$sql);

if ($result) 
{
	echo "Deleted";
}

?>