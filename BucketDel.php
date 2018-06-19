<?php
if(isset($_GET['Cnum'])){

    $str=str_replace("".$_GET['Cnum']."",'',$_COOKIE['chees']);

    setcookie('chees',''.$str);
    header('Location: BucketPage.php');
    setcookie('bucketcount',''.$_COOKIE['bucketcount']-1);
    exit();

}
if(isset($_GET['Vnum'])){

    $str=str_replace("".$_GET['Vnum']."",'',$_COOKIE['vine']);

    setcookie('vine',''.$str);
    setcookie('bucketcount',''.$_COOKIE['bucketcount']-1);


    header('Location: BucketPage.php');
    exit();
}