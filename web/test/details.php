
<html>
<head>

<title></title>
</head>

<body background="">
<?php
$con=mysql_connect("mysql1.000webhost.com","a9702045_gautham","QwertY1");
mysql_select_db("a9702045_netloc",$con);
$key="";
$sno=$_GET['sno'];


$r=mysql_query("SELECT * FROM data WHERE sno LIKE '$sno'");
$z=mysql_fetch_array($r);
?><table border=0>
<tr><td>ITEM NAME </td><td></td><td><?php
echo "$z[3]";?></td></tr>
<tr><td>QUANTITY AVAILABLE </td><td></td><td><?php
echo " $z[4] <br>";?></td></tr>
<tr><td>COST PER KG</td><td></td><td><?php
echo " $z[6]";?></td></tr>
<tr><td><?php
echo "WILL BE ON STOCK ON ";?></td><td></td><td><?php
echo "$z[5] ";?></td></tr>
<tr><td><?php
echo "REPORTED DATE  <br><br>";?></td><td></td><td><?php
echo "$z[7] <br><br>";?></td></tr>
<tr><td><?php
echo "<b><u> FARMER DETALIS </u></b><br>";?></td><td></td><td></td></tr>
<tr><td><?php
echo "FARMER NAME ";?></td><td></td><td><?php
echo " $z[2] <br>";?></td></tr>
<tr><td><?php
echo "CONTACT NO <br>";?></td><td></td><td><?php
echo "$z[1]<br>";?></td></tr>

</table>

<a href=customerActivity.php>Back</a>
</body>
</html>