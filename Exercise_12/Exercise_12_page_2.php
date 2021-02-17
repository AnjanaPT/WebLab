<html>
<head>
<title>Fxercise_12_page_2</title>
<style>
#reg{
	text-align:center;margin-left:15%;
	margin-top:10%;margin-right:15%;margin-bottom:10%;
	box-shadow:1px 1px 20px 1px black;
	padding:20px 20px 20px 20px;
}
#reg table{
	width:90%;height:20%;
	margin-left:5%;	margin-bottom:5%;
	border-collapse:collapse;
	background-color:lightgray;
	text-align:center;font-size:20px;
	border:2px white;
}
#reg th{
	text-shadow:1px 1px 4px black;color:white;
}
h1{
	font-size:40px;color:white;
	text-shadow:1px 1px 4px brown;
	letter-spacing:5px;word-spacing:10px;
}
#rg tr{
	background-color:gray;
}
a{
	text-decoration:none;
	float:left;
	color:gray;
}
a:hover{
	background-color:gray;
	color:white;
	padding:2px 2px 2px;
}
</style>
</head>
<body>
<div id="reg">
<h1><big>R</big>EGISTERED <big>U</big>SERS....</h1>
<table border="1" cellpadding="10px">
	<tr id="tr3">
	<th>REG_NO</th>
	<th>NAME</th>
	<th>AGE</th>
	<th>GENDER</th>
	<th>EMAIL ID</th>
	<th>MOBILE_NO</th>
	</tr>
<?php
include("../phpcnctn.php");
$sql="SELECT * FROM Exercise_11";
$qry=mysqli_query($conn,"$sql") or die("Error:".mysqli_error($conn));
while($row=mysqli_fetch_array($qry))
{
 echo "<tr>
	<td>".$row['Reg_No']."</td>
	<td>".$row['Name']."</td>
	<td>".$row['Age']."</td>
	<td>".$row['Gender']."</td>
	<td>".$row['Email']."</td>
	<td>".$row['Phone_No']."</td>
	</tr>";
}
?>
</table>
<a href="Exercise_12_page_1.php">B A C K</a><br>
</div>
</body>
</html>