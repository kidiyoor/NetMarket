<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>Untitled Document</title>
</head>

<body background="">
<h1>
FARMER REGISTRATION
</h1>
<?php

$flagPassword=0;
$regStatus="";
$passStatus=1;

if(isset($_POST['button']))
{
$name=$_POST['name'];
$address=$_POST['address'];
$phno=$_POST['phno'];
$place=$_POST['place'];

$password=$_POST['password'];
$repassword=$_POST['repassword'];
if(($password==$repassword))
{
	if(preg_match('/^\d{9}$/', $phno))
	$flagPassword=1;
	else
	$regStatus="enter a valid mobile number";
}
else
$regStatus="pasword mismatch ! registration failed";
}

 
 


 if(isset($_POST['button'])&&($flagPassword==1))
{

$con=mysql_connect("mysql1.000webhost.com","a9702045_gautham","QwertY1");
mysql_select_db("a9702045_netloc",$con);
$result=mysql_query("select * from user");
$num1=mysql_num_rows($result);

$pass = mysql_fetch_assoc($result);
while($row = mysql_fetch_array($result))
{
 if($row[3]==$phno)   
{$passStatus=0;$regStatus=="mobile no already registered";}

}

if($passStatus==1)
{
$sql="insert into user (name,address,phno,place,password) values ( '$name','$address','$phno','$place','$password')";
mysql_query($sql);
}
$result=mysql_query("select * from user");
$num2=mysql_num_rows($result);	

if(!($num1==$num2))
{
$regStatus="Registration successful";
}

else
{
$regStatus="Registration Failed";
}

mysql_close($con);
}
?>	


<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  
<table width="100%"  border="0">
    
    <tr>
      <td>name</td>
      <td><label for="for"></label>
      <input type="text" name="name" id="for" value=""/></td>
      <td></td>
    </tr>
    <tr>
      <td>address</td>
      <td><label for="catgry"></label>
        <input type="text" name="address" id="for" value=""/></td></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      
    
    <tr>
      <td>phno</td>
      <td><label for="amount"></label>
      <input type="text" name="phno" id="amount" value=""/></td>
      <td></td>
    </tr>
    
   
 <tr>
      <td>place</td>
      <td><label for="amount"></label>
      <input type="text" name="place" id="amount" value=""/></td>
      <td></td>
    </tr>
    
     <tr>
      <td>new password</td>
      <td><label for="password"></label>
      <input type="text" name="password" id="password" value=""/></td>
      <td></td>
    </tr>
<tr>
      <td>re-enter password</td>
      <td><label for="repassword"></label>
      <input type="text" name="repassword" id="repassword" value=""/></td>
      <td></td>
    </tr>
<tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="button" id="button" value="done" /></td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
<?php
if(isset($_POST['button']))
{
echo "<br>$regStatus<br>";
}
?>
<a href=login.php>log in </a>


</body>
</html>