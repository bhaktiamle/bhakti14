<?php 

$con=mysqli_connect("localhost","root","","deepak");

$id=$_POST['id'];

$sql="select * from demo where id='$id'";
$result=mysqli_query($con,$sql);

$output="";
if(mysqli_num_rows($result)>0)
{
	$output='';
	while($arr=mysqli_fetch_assoc($result))
	{
		$output .="<tr>
							<td>Name :</td>
							<td><input type="text" name="" id="ename" value='{$arr['name']}'></td>
						</tr>
						<tr>
							<td>Gender :</td>
							<td><input type="radio" name="radio" id="gender" value="Male">Male
								<input type="radio" name="radio" id="gender" value="Female">Female
							</td>
						</tr>
						<tr>
							<td>Date Of Birth :</td>
							<td><input type="date" name="" id="edob" value='{$arr['dob']}'></td>
						</tr>
						<tr>
							<td>Location :</td>
							<td><input type="text" name="" id="eloc" value='{$arr['location']}'></td>
						</tr>
						<tr>
							<td><input type="submit" class="btn btn-success" id="save-btn"></td>
							<td><input type="reset" class="btn btn-warning" ></td>
						</tr>";
	}
	
	echo $output;
}

?>