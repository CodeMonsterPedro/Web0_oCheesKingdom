<?php
if(isset($_GET['chees'])){
    if(!isset($_COOKIE['chees']))setcookie('chees',''.$_GET['chees']);
    else {
        $idstring=explode(' ',$_COOKIE['chees']);
        for($i=0;$i<count($idstring);$i++)
        {
            if($idstring[$i]==$_GET['chees']){ header('Location: BucketPage.php');exit();}
        }
        setcookie('chees',$_COOKIE['chees'].' '.$_GET['chees']);
    }
    setcookie('bucketcount',$_COOKIE['bucketcount']+1);
    header('Location: BucketPage.php');
}
else if(isset($_GET['vine']))
{
    if(!isset($_COOKIE['vine']))setcookie('vine',''.$_GET['vine']);
    else {
        $idstring=explode(' ',$_COOKIE['vine']);
        for($i=0;$i<count($idstring);$i++)
        {
            if($idstring[$i]==$_GET['vine']){header('Location: BucketPage.php');exit();}
        }
        setcookie('vine', $_COOKIE['vine'] . ' ' . $_GET['vine']);

    }setcookie('bucketcount',$_COOKIE['bucketcount']+1);
    header('Location: BucketPage.php');
}
exit();
