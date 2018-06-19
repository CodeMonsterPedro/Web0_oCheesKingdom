<?php
$con=mysqli_connect("localhost","root","12345","chesskindom");
if(isset($_GET['Vnum']))
{
    $zapr="select * from Vina";
    $rez=mysqli_query($con,$zapr);
    $max=array();
    $kol=0;
    while ($row = mysqli_fetch_row($rez)) {
        $max[$kol++]=$row;
    }
    echo $_GET['num'];
//$zapr="DELETE FROM `foto` WHERE `way` = '".$max[$_GET['num']][1]."'";
    $zapr="UPDATE `Vina` SET `name` = '".$_GET['name']."' WHERE `Vina`.`id` = '".($_GET['Vnum']+1)."'";
    $rez=mysqli_query($con,$zapr);
    $zapr="UPDATE `Vina` SET `type` = '".$_GET['type']."' WHERE `Vina`.`id` = '".($_GET['Vnum']+1)."'";
    $rez=mysqli_query($con,$zapr);
    $zapr="UPDATE `Vina` SET `color` = '".$_GET['color']."' WHERE `Vina`.`id` = '".($_GET['Vnum']+1)."'";
    $rez=mysqli_query($con,$zapr);
    $zapr="UPDATE `Vina` SET `price` = '".$_GET['price']."' WHERE `Vina`.`id` = '".($_GET['Vnum']+1)."'";
    $rez=mysqli_query($con,$zapr);
    $zapr="UPDATE `Vina` SET `country` = '".$_GET['country']."' WHERE `Vina`.`id` = '".($_GET['Vnum']+1)."'";
    $rez=mysqli_query($con,$zapr);

    header('Location: admin.php');
    exit();
}
    if(isset($_GET['Cnum']))
    {
        $zapr="select * from chees";
        $rez=mysqli_query($con,$zapr);
        $max=array();
        $kol=0;
        while ($row = mysqli_fetch_row($rez)) {
            $max[$kol++]=$row;
        }
        echo $_GET['num'];
//$zapr="DELETE FROM `foto` WHERE `way` = '".$max[$_GET['num']][1]."'";
        $zapr="UPDATE `chees` SET `name` = '".$_GET['name']."' WHERE `chees`.`id` = '".($_GET['Cnum']+1)."'";
        $rez=mysqli_query($con,$zapr);
        $zapr="UPDATE `chees` SET `type` = '".$_GET['type']."' WHERE `chees`.`id` = '".($_GET['Cnum']+1)."'";
        $rez=mysqli_query($con,$zapr);
        $zapr="UPDATE `chees` SET `price` = '".$_GET['price']."' WHERE `chees`.`id` = '".($_GET['Cnum']+1)."'";
        $rez=mysqli_query($con,$zapr);
        $zapr="UPDATE `chees` SET `country` = '".$_GET['country']."' WHERE `chees`.`id` = '".($_GET['Cnum']+1)."'";
        $rez=mysqli_query($con,$zapr);
        $zapr="UPDATE `chees` SET `count` = '".$_GET['count']."' WHERE `chees`.`id` = '".($_GET['Cnum']+1)."'";
        $rez=mysqli_query($con,$zapr);
        header('Location: admin.php');
        exit();
    }


?>