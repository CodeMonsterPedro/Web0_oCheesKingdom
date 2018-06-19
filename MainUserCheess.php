<?php
//if(!isset($_GET['class'])||$_GET['class']=='')header('Location: MainUserPage.php?class=1');

?>

<!DOCTYPE html>
<html>
<head>
    <title>Сыры</title>
    <style type="text/css">
        body{


        }
        .mainbox{
            display:flex;flex-wrap: wrap;align-content: space-between;width: 500px;
        }
    </style>
</head>
<body style="width: 1900px;" background="./fotki/new-bg.jpg">
<div style="width: 1900px; height: 280px;">
    <img width="160" height="160" src="fotki/Logo-Syrnoe-korolevstvo-2.png">
    <a href="MainUserPage.php"><img width="260" height="200" src="./fotki/0_121218_ce2894a_orig.png"></a>

    <div style="float: right;display: flex;justify-content: space-between; padding: 20px;">
        <a href="BucketPage.php" name="busket" style="margin-right: 70px;">
            <img style="width: 80px;height: 80px;" src="./fotki/inetrnet-store-cart.png">
            <?php echo "<span style='color: ghostwhite'>".$_COOKIE['bucketcount']."</span>"; ?>
        </a>


        <form action="returncontrol.php">
            <?php echo "<span style='color:white;font-size: 18pt;'>Здравствуйте, ".$_COOKIE['name']."!</span>"; ?>
            <input type="submit" value="Выйти из аккаунта">
        </form>
    </div>
</div>
<br/>
<div style="padding:20px;width: 160px;background-color: ghostwhite;opacity: 0.8;display: flex;flex-wrap: wrap;margin-left: 130px;float:left; margin: 50px; border: 2px solid black; border-radius: 15px;">
    <form  action="MainUserCheess.php" method="get">
        <span>Тип сыра:</span><br/>
        <input name="type[]" <?php for($i=0;$i<count($_GET['type']);$i++)if(($_GET['type'])[$i]=='Blue') echo "checked"?> value="Blue" type="checkbox">Голубые сыры с &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;плесенью<br/>
        <input name="type[]" <?php for($i=0;$i<count($_GET['type']);$i++)if(($_GET['type'])[$i]=='Cow') echo "checked"?> value="Cow" type="checkbox">Коровьи сыры<br/>
        <input name="type[]" <?php for($i=0;$i<count($_GET['type']);$i++)if(($_GET['type'])[$i]=='Goat') echo "checked"?> value="Goat" type="checkbox">Козьи и овечьи &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;сыры<br/>
        <br/>
        <span>Страна производитель:</span><br/>
        <input name="country[]" <?php for($i=0;$i<count($_GET['country']);$i++)if(($_GET['country'])[$i]=='France') echo "checked"?> value="France" type="checkbox">Франция<br/>
        <input name="country[]" <?php for($i=0;$i<count($_GET['country']);$i++)if(($_GET['country'])[$i]=='Sweeden') echo "checked"?> value="Sweeden" type="checkbox">Швеция<br/>
        <input name="country[]" <?php for($i=0;$i<count($_GET['country']);$i++)if(($_GET['country'])[$i]=='Germany') echo "checked"?> value="Germany" type="checkbox">Германия<br/>
        <input name="country[]" <?php for($i=0;$i<count($_GET['country']);$i++)if(($_GET['country'])[$i]=='Italy') echo "checked"?> value="Italy" type="checkbox">Италя<br/>
        <input name="country[]" <?php for($i=0;$i<count($_GET['country']);$i++)if(($_GET['country'])[$i]=='England') echo "checked"?> value="England" type="checkbox">Англия<br/>

        <input type="submit" value="Показать">
    </form>


</div>
<div style="float:left;width: 1400px; display: flex;flex-wrap:wrap;">
    <?php
    /*
    сортировка
    корзина
    оформление заказа
      */
    $con=mysqli_connect("localhost","root","12345","chesskindom");
    $country='';
    $type='';
    if(isset($_GET['country']))
    {
        $country = "(country="."'".($_GET['country'])[0]."' ";
        if(count($_GET['country'])>1)for($i=1;$i<count($_GET['country']);$i++) {
            $country=$country."or country="."'".($_GET['country'])[$i]."' ";
        }
        $country=$country.")";
        $zapr="select * from chees Where ".$country;

        if(isset($_GET['type']))
        {
            $type = " and (type="."'".($_GET['type'])[0]."' ";
            if(count($_GET['type'])>1)for($i=1;$i<count($_GET['type']);$i++) {
                $type=$type."or type="."'".($_GET['type'])[$i]."' ";
            }
            $type=$type.")";
            $zapr=$zapr.$type."";
        }

    }
    else if(isset($_GET['type']))
    {
        $type = "type="."'".($_GET['type'])[0]."' ";
        if(count($_GET['type'])>1)for($i=1;$i<count($_GET['type']);$i++) {
            $type=$type."or type="."'".($_GET['type'])[$i]."' ";
        }

        $zapr=$zapr." ".$type."";
    }

    else $zapr="select * from chees";
    $rez=mysqli_query($con,$zapr);
    $max=array();
    $kol=0;
    while ($row = mysqli_fetch_row($rez)) {
        $max[$kol++]=$row;
    }
    print_r($_GET['country']);
    //if($_GET['x']>count($max))header("Location: MainUserPage.php?x=".count($max)."&class=".$_GET['class']);

    for($i=0;$i<count($max);$i++)
        echo " <div style=\"background-color: ghostwhite;opacity: 0.8;margin: 15px;width: 260px;border:2px solid black;padding:20px; border-radius: 15px;\" >
        <img width='240' height='240' src=\"".$max[$i][0]."\"><br/>
        <span style=\"font-size: 14pt;\"><b>".$max[$i][1]."</b></span><br/>
        <span> Сорт: ".$max[$i][2]."</span><br/>
        <span> Страна производитель: ".$max[$i][5]."</span><br/>
        <span> Цена за 100 грамм: ".$max[$i][3]." грн</span><br/>
        <form style='float:left; width: 110px;padding: 10px;padding-bottom: 0px;'  action='Buy.php' method='get'>
        <input style='background-color: darkgreen; color: ghostwhite;height: 40px;;width: 100px;' name='buy' value='buy' type='submit'>
        <input style='visibility: hidden;'  type='text' name='chees' value='".$max[$i][4]."'>
        </form>
        <form style='float:left; width: 110px; padding: 10px;padding-bottom: 0px;' action='BucketAddPage.php' method='get'>
        <input style='background-color: darkgreen; color: ghostwhite;width: 100px; height: 40px;' name='add' value='add' type='submit'>
        <input style='visibility: hidden;'  type='text' name='chees' value='".$max[$i][4]."'>
        </form>
    </div>";

    // if($_GET['x']>1 && $_GET['x']<count($max))
    // {
    //     echo "<a href='MainUserPage.php?x=" . ($_GET['x'] - 1) . "&class=" . $_GET['class'] . "'>" . ($_GET['x'] - 1) . "</a>";
    //     echo "<a href='MainUserPage.php?x=" . ($_GET['x'] + 1) . "&class=" . $_GET['class'] . "'>" . ($_GET['x'] + 1) . "</a>";
    // }
    // if($_GET['x']==1)echo "<a href='MainUserPage.php?x=" . ($_GET['x'] + 1) . "&class=" . $_GET['class'] . "'>" . ($_GET['x'] + 1) . "</a>";
    //if($_GET['x']==count($max))echo "<a href='MainUserPage.php?x=" . ($_GET['x'] - 1) . "&class=" . $_GET['class'] . "'>" . ($_GET['x'] - 1) . "</a>";

    ?>

</div>





</body>
</html>

