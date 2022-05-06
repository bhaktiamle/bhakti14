$(document).ready(function(){

//ajax request for retriving data
function showdata()
{
	output="";
	$.ajax({
		url:"retrive.php",
		method:"POST",
		dataType:"json",
		success:function(data)
		{
			//console.log(data);
			if(data)
			{
				x=data;
			}
			else
			{
				x="";
			}
			for(i=0;i<x.length;i++)
			{
				output+="<tr><td>" + x[i].name + "</td><td>"+ x[i].salary+"</td><td>"+
				x[i].location+"</td><td>"+x[i].age+"</td></tr>";
			}
			$("#tbody").html(output);
		}
	});
}
showdata();
$("#btnadd").click(function(e){
	e.preventDefault();
	console.log("Click");
	let name=$("#name").val();
	let sal=$("#sal").val();
	let loc=$("#loc").val();
	let age=$("#age").val();

	//console.log(name);
	mydata={name:name,sal:sal,loc:loc,age:age};
	//console.log(mydata);
	$.ajax({
		url:"insert.php",
		method:"POST",
		data: JSON.stringify(mydata), 
		success:function(data)
		{
			console.log(data);
			$("#myform")[0].reset();
			showdata();
		}
	});
});



});