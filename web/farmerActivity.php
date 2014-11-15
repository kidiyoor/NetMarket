<html>
<title>
</title>
<head><link href="farmerlogin.css" rel="stylesheet" type="text/css" media="all">
</head>
<body>
<br>
<br>
<center><title1>Farmer Activity</title1></center>
<br>
<br>
<?php
$con=mysql_connect("mysql1.000webhost.com","a9702045_gautham","QwertY1");
mysql_select_db("a9702045_netloc",$con);
session_start();
if(isset($_SESSION['sno']))
{
$sno=$_SESSION['sno'];

$item="";
$err=0;
$errStatus="";
$result=mysql_query("select * from user where sno='$sno'");
$q=mysql_fetch_array($result);

$a=mysql_query("select * from data ");
$flag=mysql_num_rows($a);

if(isset($_POST['button']))
{
if($_POST['item1']=="a")
{
$item=$_POST['item'];
}
else{
$item=$_POST['item1'];
}

$quantity=$_POST['quantity'];
$date=$_POST['date']; 
$amount=$_POST['price'];
if(!(preg_match('/^\d{1}$/', $quantity)||preg_match('/^\d{2}$/', $quantity)||preg_match('/^\d{3}$/', $quantity)||preg_match('/^\d{4}$/', $quantity)))
{
$err=1;
$errStatus="incompatiable quantity";
}

if((!(preg_match('/^\d{3}$/',$amount)))&&(!(preg_match('/^\d{2}$/',$amount)))&&(!(preg_match('/^\d{1}$/',$amount))))
{$err=1;
$errStatus="invalid price or imaginary price";
}

if(!(preg_match("/^2([0-9]{3})-([0-9]|1[0-2]|0[0-9])-([1-9]|[0-2][0-9]|3[0-1])$/",$date)))
{$err=1;
$errStatus="date format mismatch or imaginary date mentioned";
}

if(($item=="")||(preg_match("/^[0-9]{1}$/",$item))||(preg_match("/^[0-9]{2}$/",$item))||(preg_match("/^[0-9]{3}$/",$item))||(preg_match("/^[0-9]{4}$/",$item)))
{
$err=1;
$errStatus="enter the proper product name";
}
}

?>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
<table>
<tr><td></td><td></td><td></td><td></td><td><input type="submit" name="logout" id="for" value="Logout"/></td>
</tr>
<tr><td>Enter the product name</td>
<td>
<select id="item1" name="item1">                      
<option value="Tomato">Tomato</option>
<option value="Carrot">Carrot</option>
<option value="Potato">Potato</option>
<option value="Onion">Onion</option>
<option value="a">Others</option>
</select>

<input type="text" size="40" maxlength="40" name="item" id="id="searchFieldText"  value="" placeholder="If other enter item name here " />

</td>
</tr>
<tr>
<td>Quantity  </td>
<td><input type="text" name="quantity" id="for" value=""/>   in kg</td><td></td>
</tr>
<tr>
<td>Price  </td>
<td><input type="text" name="price" id="for" value=""/>   per kg</td><td></td>
</tr>
<tr>
<tr>
<td>Expected Date on stock </td>
<td><input type="text" name="date" id="for" value="" />   format :  year-month-date</td><td></td>
</tr>
<tr><td></td><td><input type="submit" name="button" id="button" value="submit" /></td>
</table>

<?php

if(isset($_POST['button'])&&$err==0)
{
mysql_query("insert into data (phno,name,item,quantity,stockDate,amount) values('$q[3]','$q[1]','$item','$quantity','$date','$amount')");
$a=mysql_query("select * from data ");
$flag1=mysql_num_rows($a);

if($flag1>$flag)
echo "<br>data recorded";
else
echo "<br>data not recorded due to internet problem ... please try again";
}

echo "$errStatus<br>";

if(isset($_POST['logout']))
{
session_destroy();
header('location:home.php');
}

}
else
{?><font color=green size=5><?php
echo "Please login"; ?>
<br>
<a href=login.php>Login</a>
<?php
}
?>
<a href=home.php>Home</a>
</body>
</html>
