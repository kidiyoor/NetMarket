
<html >
<head><link href="farmerlogin.css" rel="stylesheet" type="text/css" media="all">

<title>Customer Login</title>
</head>
<body >
<br>
<center><title1> Customer Login</title1></center>
<br>
<br>
<?php
session_start();
$err="";

if(isset($_POST['button']))
{

$loginid=$_POST['loginid'];
$password=$_POST['password'];
$con=mysql_connect("mysql1.000webhost.com","a9702045_gautham","QwertY1");
mysql_select_db("a9702045_netloc",$con);

$result=mysql_query("select * from usercustomer where phno='$loginid' and password='$password' ");
$num=mysql_num_rows($result);
$n=mysql_fetch_array($result);
$_SESSION['sno']=$n[0];
if($num==1)
{


header('location:customerActivity.php');



}
else if($num==0)
{
$err="invalid ID or password";

}
}

?>
 <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="100%" border="0">
    <tr>
      <td>mobile no</td>
      <td><label for="loginid"></label>
      <input type="text" name="loginid" id="name" value="" /></td>
      <td></td>
    </tr>
    <tr>
      <td>password</td>
      <td><label for="owner"></label>
      <input type="password" name="password" id="password" value="" /></td>
      <td></td>
    </tr>
<tr><td></td>


<td> 
<input type="submit" name="button" id="button" value="login"
 style="margin:7px 0" style="padding:1px 2px 1px 2px" />&nbsp
</td>
<td>
</td>
</tr>

</table>

</form>
<font color="red">
<?php
echo "$err"; 
?></font>
<a href=home.php>Home</a>
</body>
</html>