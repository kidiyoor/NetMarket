
<html>
<head><link href="farmerlogin.css" rel="stylesheet" type="text/css" media="all">

<title></title>
</head>

<body >
<br>
<br>
<?php
session_start();
$con=mysql_connect("mysql1.000webhost.com","a9702045_gautham","QwertY1");
mysql_select_db("a9702045_netloc",$con);
if(isset($_SESSION['sno']))
{
$sno=$_SESSION['sno'];

?>

<center>
<h1><font color=white>
CUSTOMER ACTIVITY</font>	
</h1>
</center>

<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
<h2>SEARCH BY</h2>
<input type="submit" name="logout" id="button" value="Logout" />
<br>
<input type="radio" name="group" value="1">Product Name
<input type="radio" name="group" value="2"> Quantity
<input type="radio" name="group" value="3"> Price
<input type="radio" name="group" value="4"> Month wise

<table>
<tr>
<td><select id="item1" name="item1">                      
<option value="Tomato">Tomato</option>
<option value="Carrot">Carrot</option>
<option value="Potato">Potato</option>
<option value="Onion">Onion</option>
<option value=20>20</option>
<option value=30>30</option>
<option value=50>50</option>
<option value=100>100</option>
<option value="a">Others</option>
</select><input type="text" name="key" id="for" value="" placeholder="If other enter item name here "/>

</td>
<tr>
<td>
<input type="submit" name="button" id="button" value="search" />
</td></tr>


</table>

</form>
<font color=cream>
<?php

if(isset($_POST['button']))
{

if($_POST['item1']=="a")
{
$key=$_POST['key'];
}
else{
$key=$_POST['item1'];
}
if(!isset($_POST['group']))
	{
	echo "Select your category of search ";	
	}
else
	{
	if($_POST['group']==1)
	{
		$r=mysql_query("SELECT * FROM data WHERE item LIKE '$key'");
		if(mysql_num_rows($r)==0)
		{$r=mysql_query("SELECT * FROM data WHERE item LIKE 'substr($key,0,strlrn($key-1))'");}
if(mysql_num_rows($r)==0)
		{$r=mysql_query("SELECT * FROM data WHERE item LIKE 'substr($key,0,strlrn($key-2))'");}
if(mysql_num_rows($r)==0)
		{$r=mysql_query("SELECT * FROM data WHERE item LIKE 'substr($key,0,strlrn($key-3))'");}

	}
	else if($_POST['group']==2)
	$r=mysql_query("SELECT * FROM data WHERE quantity LIKE '$key'");
	else if($_POST['group']==3)
	{$r1=$key-10;$r2=$key+10;$r=mysql_query("select * from data where amount between $r1 and $r2");}
else if($_POST['group']==4)
	{$r=mysql_query("select * from data where stockDate datefield BETWEEN '2000-$key-01' AND '3000-$key-31'");}

	if(mysql_num_rows($r)>0)
	{
		for($i=0;$i<mysql_num_rows($r);$i++)
		{$s=$i+1;echo "$s";
		$z=mysql_fetch_array($r); 
		?>
		<a href=details.php?sno=<?php echo "$z[0]"; ?>><font color=white><?php echo "$z[3]"; ?></font></a><br>
		<?php 
	}
	}
	else
{
	echo "no item found , try with suitable key word";
}

}
}


if(isset($_POST['logout']))
{
session_destroy();
header('location:home.php');
}

}
else{?><font color=green size=5><?php
echo "Please login<br>"; ?>
<a href=loginCustomer.php>Login</a>
<?php
}
?>
<br>
</font>
<a href=home.php>Home</a>
</body>
</html>