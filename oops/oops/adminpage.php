<?php session_start(); ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin || Welcome</title>
	<link rel="stylesheet" type="text/css" href="../oops/css/bootstrap.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-12 my-3" style="background:limegreen;">
				<h1 class="text-center text-light">Admin Management System</h1>
				<h4 class="text-center">Hello :<?php echo $_SESSION['username']?></h4>
				<h5 class="text-center"><a href="logout.php">Logout</a></h5>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<form id="myform">
					<table cellpadding="10px">
						<tr>
							<td>Name :</td>
							<td><input type="text" name="" id="ename"></td>
						</tr>
						<tr>
							<td>Gender :</td>
							<td><input type="radio" name="radio" id="gender" value="Male">Male
								<input type="radio" name="radio" id="gender" value="Female">Female
							</td>
						</tr>
						<tr>
							<td>Date Of Birth :</td>
							<td><input type="date" name="" id="edob"></td>
						</tr>
						<tr>
							<td>Location :</td>
							<td><input type="text" name="" id="eloc"></td>
						</tr>
						<tr>
							<td><input type="submit" class="btn btn-success" id="save-btn"></td>
							<td><input type="reset" class="btn btn-warning" ></td>
						</tr>
					</table>
				</form>
			</div>
			<div class="col-md-8">
				<table class="table" id="tbody">
					<thead>
						<th>Name</th>
						<th>Gender</th>
						<th>Date Of Birth</th>
						<th>Location</th>
						<th>Action</th>
					</thead>
					<tbody></tbody>
				</table>
				
			</div>
		</div>
		<div id="edit-form">
					<table id="load-form ">
						
					</table>
				</div>
	</div>
<script type="text/javascript" src="../oops/js/jquery.js"></script>
<script type="text/javascript">
	
	$(document).ready(function(){

		//to show table 

		function showtable()
		{
			$.ajax({
				url:"show-table.php",
				type:"post",
				success:function(data)
				{
					$("#tbody").html(data);
					//console.log(data);
				}
			});
		}
		showtable();
		//insert data in database

		$("#save-btn").on("click",function(e){
			e.preventDefault();
			//console.log("Hello");
			var name=$("#ename").val();
			var loc=$("#eloc").val();
			var dob=$("#edob").val();
			var gender=$("input[type='radio']:checked").val();
			console.log(gender);
			$.ajax({
				url:"insert-data.php",
				type:"post",
				data:{Name:name,Loc:loc,Dob:dob,Gender:gender},
				success:function(data)
				{
					$("#myform")[0].reset();
					//console.log(data);
					showtable();
				}
			});
		});

		//to delete data

		$(document).on("click","#del-btn",function(){
			//console.log("Bharat");
			var id=$(this).data("id");
			$.ajax({
				url:"delete-data.php",
				type:"post",
				data:{Id:id},
				success:function(data)
				{
					//console.log(data);
					showtable();
				}
			});
		});

		//to update details

		$(document).on("click","#edit-btn",function(){
			console.log("India");
			// $("#edit-form").show();
			// var id=$(this).val();
			// $.ajax({
			// 	url:"upload-modal.php",
			// 	type:"post",
			// 	data:{id:id},
			// 	success:function(data)
			// 	{

			// 	}
			// });

		});

	});
</script>
</body>
</html>