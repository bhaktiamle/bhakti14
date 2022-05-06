<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="../oops/css/bootstrap.css">
	
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-12 my-3" style="background:limegreen;">
				<h1 class="text-center text-light">Admin Management System</h1>
			</div>
		</div>
		<div class="row" style="background:yellowgreen;">
			 <div class="col-12">
			 	<form method="post">
			 	<table cellpadding="10px" align="center">
			 		<tr>
			 			<td>Username :</td>
			 			<td><input type="text" name="username"></td>
			 		</tr>
			 		<tr>
			 			<td>Password :</td>
			 			<td><input type="text" name="password"></td>
			 		</tr>
			 		<tr>
			 			<td></td>
			 			<td><input type="submit" class="btn btn-primary" value="Login" name="sub"></td>
			 			<td><a href="index.php">Back to Home</a></td>
			 		</tr>
			 	</table>
			 	</form>
			 </div>
		</div>
	</div>
	<?php 

	$con=mysqli_connect("localhost","root","","deepak");
	if(isset($_POST['sub']))
	{
		$user=mysqli_real_escape_string($con,$_POST['username']);
		$pass=mysqli_real_escape_string($con,$_POST['password']);

		$sql="select * from admin where username='$user' && password='$pass'";
		$result=mysqli_query($con,$sql);
		if(mysqli_num_rows($result)>0)
		{
			while($row=mysqli_fetch_assoc($result))
			{
				$_SESSION['username']=$row['username'];
				$_SESSION['id']=$row['id'];
				header("location:adminpage.php");
			}
		}
		else
		{
			echo "Username and Password Wrong";
		}
	}

	?>
<script type="text/javascript" src="../oops/js/jquery.js"></script>
</body>
</html>