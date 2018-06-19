<?php
if(isset($_GET['type'])){setcookie('name',"Anonim");header('Location: php8.php');exit();}
unset($_COOKIE['name']);
$login = $_POST[ 'log' ];
$password = $_POST[ 'pass' ];
if($login=="adm"&&$password=="adm"){header('Location: admin.php');exit();}
$con=mysqli_connect("localhost","root","12345","aaa");
if($con)echo "OK";
$zapr="select * from phpkek";
$rez=mysqli_query($con,$zapr);
$max=array();
$kol=0;
while ($row = mysqli_fetch_row($rez)) {
    $max[$kol++]=$row;
}

for($i=0;$i<count($max);$i++)
{
    if($login==$max[$i][0]&& $password==$max[$i][1]){setcookie('name',$max[$i][2]);header('Location: php8.php');exit();}

}
header('Location: login.php');

?>