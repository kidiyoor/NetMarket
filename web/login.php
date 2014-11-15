
<html >
<head>

<title></title><link href="farmerlogin.css" rel="stylesheet" type="text/css" media="all">
</head>
<body >
<br>
<center><title1> Farmer Login</title1></center>
<br>
<br>
<?php
session_start();
$err="";

if(isset($_POST['button']))
{
$con=mysql_connect("mysql1.000webhost.com","a9702045_gautham","QwertY1");
mysql_select_db("a9702045_netloc",$con);
$loginid=$_POST['loginid'];
$password=$_POST['password'];

$result=mysql_query("select * from user where phno='$loginid' and password='$password' ");
$z=mysql_fetch_array($result);

$_SESSION['sno']=$z[0];

$num=mysql_num_rows($result);

if($num==1)
{


header('location:farmerActivity.php');



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
      <td>Mobile number</td>
      <td><label for="loginid"></label>
      <input type="text" name="loginid" id="name" value="" /></td>
      <td></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="owner"></label>
      <input type="password" name="password" id="password" value="" /></td>
      <td></td>
    </tr>
<tr><td></td><td> <input type="submit" name="button" id="button" value="login" />&nbsp
</td>
<td>
</td>
</tr>

</table>

</form>
<font color="white">
<?php
echo "$err"; 
?>
<a href=home.php>Home</a>
</body>
</html>