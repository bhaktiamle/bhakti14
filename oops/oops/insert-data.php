<?php 

$con=mysqli_connect("localhost","root","","deepak");

$Name=$_POST['Name'];
$Gender=$_POST['Gender'];
$Dob=$_POST['Dob'];
$Location=$_POST['Loc'];
$sql="insert into demo(name,gender,dob,location) values('$Name','$Gender','$Dob','$Location')";
$result=mysqli_query($con,$sql);
if($result)
{
	echo "Record Inserted";
}

?>