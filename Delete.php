
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
    $zapr="DELETE FROM `Vina` WHERE `path` = '".$max[$_GET['Vnum']][0]."'";
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
        $zapr="DELETE FROM `chees` WHERE `path` = '".$max[$_GET['Cnum']][0]."'";
        $rez=mysqli_query($con,$zapr);
        header('Location: admin.php');
        exit();
    }


?>
