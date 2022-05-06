<?php 

$con=mysqli_connect("localhost","root","","deepak");

$sql="select * from demo";
$result=mysqli_query($con,$sql);
$output="";
if(mysqli_num_rows($result)>0)
{
	$output="<table>
				<tr>
					<th>Name</th>
					<th>Gender</th>
					<th>DOB</th>
					<th>Location</th>
					<th>Action</th>
				</tr>";
		while($row=mysqli_fetch_assoc($result))
		{
			$output.="<tr>
						<td>{$row['name']}</td>
						<td>{$row['gender']}</td>
						<td>{$row['dob']}</td>
						<td>{$row['location']}</td>
						<td><button class='btn btn-success' id='edit-btn' data-id='{$row['id']}'>Edit</button><button class='btn btn-danger' id='del-btn' data-id='{$row['id']}'>Delete</button></td>
						</tr>";
		}
		$output.="</table>";
}
echo $output;
?>