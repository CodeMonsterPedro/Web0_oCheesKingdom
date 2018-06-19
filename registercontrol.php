<?php
$link=mysqli_connect("localhost", "root", "12345", "aaa");
$log=$_POST['log'];
$pass=$_POST['pass'];
$name=$_POST['name'];
//INSERT INTO `phpkek` (`login`, `password`, `name`) VALUES ('Igor', '123', 'Maxim');
$zapr="INSERT INTO `phpkek` (`login`, `password`, `name`) VALUES ('".$log."','".$pass."','".$name."');";
if(mysqli_query($link,$zapr)) header("Location: login.php");
else echo "bliat".$log."','".$pass."','".$name;
//mysql_close($link);
//$zapr=
//$res=mysqli_query($con,$zapr);
//if(!$res)echo "error";
?>