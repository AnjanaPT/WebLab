<?php
include("../phpcnctn.php");
$sql="SELECT * FROM Exercise_11";
$qry=mysqli_query($conn,"$sql") or die("Error:".mysqli_error($conn));
$no=mysqli_num_rows($qry);
if($no>0)
{
	$no++;	
}
else
{ 
	$no=1;
}
$nameEr = $ageEr = $genderEr = $pwdEr = $emailEr = $mnoEr = "";
$name = $age = $gender = $pwd = $email = $mno = $radio = $check = "";
if(isset($_POST['submit']))
	{
		$regno=$_POST['regno'];
		$n=$_POST['name'];$a=$_POST['age'];$g=$_POST['gender'];
		$p=$_POST['pwd'];$e=$_POST['email'];$m=$_POST['mno'];
		//name
		if(empty($n)){
			$nameEr="Please Enter Your Name";
		}
		else if (!preg_match("/^[A-Za-z ]{2,20}$/",$n)) {  
            $nameEr = "Please Enter A Valid Name";  
        }
		else{
			$name=$n;
		}
		//age
		if(empty($a) || $a=='none'){
			$ageEr="Please Select Your Age";
		}
		else{
			$age=$a;
			$check='selected';
		}
		//gender
		if(empty($g) || $g=='none'){
			$genderEr="Please Select Your Gender";
		}
		else{
			$gender=$g;
			$radio='checked';
		}
		//password
		if(empty($p)){
			$pwdEr="Please Enter Your Password";
		}
		else if (!preg_match("/^[A-Za-z]+/",$p)) {  
            $pwdEr = "Required Atleast One Alphabet";  
        }
		else if (!preg_match("/\d+/",$p)) {  
            $pwdEr = "Required Atleast One Digit";  
        }
		else{
			$pwd=$p;
		}
		//email
		if(empty($e)){
			$emailEr="Please Enter Your Email Id";
		}
		else if (!strpos($e,"@") || !strpos($e,".com")) {  
            $emailEr="Invalid Email Address";  
        }
		else{
			$email=$e;
		}
		//mobile_number
		if(empty($m)){
			$mnoEr="Please Enter Your Phone Number";
		}
		else if (!preg_match("/^[0-9]{10}$/",$m)) {  
            $mnoEr="Required 10 digits";  
        }
		else{
			$mno=$m;
		}
		if($regno!="" && $name!="" && $age!="" && $gender!="" && $pwd!="" && $email!="" && $mno!=""){
			$sql=mysqli_query($conn,"INSERT INTO Exercise_11(Reg_No,Name,Age,Gender,Password,Email,Phone_No) VALUES('$regno','$name','$age','$gender','$pwd','$email','$mno')") or die("Could not connect: ".mysqli_error());
			if($sql){
				header("refresh:1;url=Exercise_12_page_2.php");
			}
		}
	}
?>
<html>
<head>
<title>Exercise_12_Form Validation_Table_Insertion_And_Retrieval</title>
<link rel="stylesheet" type="text/css" href="Ex_12.css">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<style>
#error{
	color:tomato;
	font-size:15px;
}
</style>
</head>
<body topmargin="10px" leftmargin="20px" rightmargin="20px" bottommargin="20px">
<div class="body">
<h1><marquee scrollamount="5" behavior="alternate" loop="infinite" onmouseover="this.stop()" onmouseout="this.start()" >REGISTER HERE !!!</marquee></h1>
<form name="frm" method="post">
<table align="center" border="5" cellpadding="10px">

<tr><td>Reg_No</td><td colspan="100%"><input type="text" name="regno" value="R<?php echo $no;?>" readonly></td></tr>

<tr><td>Name</td><td colspan="100%"><input type="text" name="name" placeholder="Enter Your Name" value="<?php echo $name;?>"><br>
<span id="error"><small><?php echo $nameEr;?></small></span></td></tr>

<tr><td>Age</td><td colspan="100%"><select name="age">
<option value="none">---------------Select---------------</option>
<option <?php if($age=='20') echo $check;?>>20</option>
<option <?php if($age=='21') echo $check;?>>21</option>
<option <?php if($age=='22') echo $check;?>>22</option>
<option <?php if($age=='23') echo $check;?>>23</option>
<option <?php if($age=='24') echo $check;?>>24</option>
<option <?php if($age=='25') echo $check;?>>25</option></select><br>
<span id="error"><small><?php echo $ageEr;?></small></span></td></tr>

<tr><td>Gender</td><td colspan="100%">
<input type="radio" name="gender" value="none" style="display:none;" checked> 
<input type="radio" name="gender" value="Male" <?php if($gender=='Male') echo $radio;?>> Male 
<input type="radio" name="gender" value="Female" <?php if($gender=='Female') echo $radio;?>>Female
<input type="radio" name="gender" value="Others" <?php if($gender=='Others') echo $radio;?>>Others<br>
<span id="error"><small><?php echo " ".$genderEr;?></small></span></td></tr>

<tr><td>Password</td><td colspan="100%">
<input type="password" name="pwd" placeholder="Enter Your Password" value="<?php echo $pwd;?>"><br>
<span id="error"><small><?php echo $pwdEr;?></small></span></td></tr>

<tr><td>Email Id</td>
<td colspan="100%"><input type="text" name="email" placeholder="Enter Your Email"  value="<?php echo $email;?>"><br>
<span id="error"><small><?php echo $emailEr;?></small></span></td></tr>
<tr><td>Phone Number</td>
<td colspan="100%"><input type="number" name="mno" placeholder="Enter Your Phone Number"  value="<?php echo $mno;?>"><br>
<span id="error"><small><?php echo $mnoEr;?></small></span></td></tr>

<tr height="50px"><td colspan="100%"><input type="reset" name="reset" value="CLEAR"><input type="submit" name="submit" value="SUBMIT"></td></tr>
</table></form>
<br>
</div></body>
</html>