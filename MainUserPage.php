<?php
//if(!isset($_GET['class'])||$_GET['class']=='')header('Location: MainUserPage.php?class=1');

?>

<!DOCTYPE html>
<html>
<head>

    <title>Вина</title>
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

    <a href="MainUserCheess.php"><img width="220" height="200" src="./fotki/cheese_PNG2.png"></a>
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
<div style="padding:20px;width: 140px;background-color: ghostwhite;opacity: 0.8;display: flex;flex-wrap: wrap;margin-left: 130px;float:left; margin: 50px; border: 2px solid black; border-radius: 15px;">
    <form  action="MainUserPage.php" method="get">
        <span>Вид вина:</span><br/>
        <input name="color[]" <?php for($i=0;$i<count($_GET['color']);$i++)if(($_GET['color'])[$i]=='White') echo "checked"?> value="White" type="checkbox">Белое<br/>
        <input name="color[]" <?php for($i=0;$i<count($_GET['color']);$i++)if(($_GET['color'])[$i]=='Red') echo "checked"?> value="Red" type="checkbox">Красное<br/>
        <input name="color[]" <?php for($i=0;$i<count($_GET['color']);$i++)if(($_GET['color'])[$i]=='Blue') echo "checked"?> value="Blue" type="checkbox">Голубое<br/>
        <br/>
        <span>Тип вина:</span><br/>
        <input name="type[]" <?php for($i=0;$i<count($_GET['type']);$i++)if(($_GET['type'])[$i]=='Dry') echo "checked"?> value="Dry" type="checkbox">Сухое<br/>
        <input name="type[]" <?php for($i=0;$i<count($_GET['type']);$i++)if(($_GET['type'])[$i]=='Semidry') echo "checked"?> value="Semidry" type="checkbox">Полу сухое<br/>
        <input name="type[]" <?php for($i=0;$i<count($_GET['type']);$i++)if(($_GET['type'])[$i]=='Semisweet') echo "checked"?> value="Semisweet" type="checkbox">Полу сладкое<br/>
        <input name="type[]" <?php for($i=0;$i<count($_GET['type']);$i++)if(($_GET['type'])[$i]=='Sweet') echo "checked"?> value="Sweet" type="checkbox">Сладкое<br/>
        <?php //echo "<input style='visibility: hidden;'  type='text' name='class' value='".$_GET['class']."'>"; ?>
        <input type="submit" value="Показать">
    </form>


</div>
<div style="float:left;width: 1400px; display: flex;flex-wrap:wrap;">
    <?php
    /*
    сортировка
    добавление
      */
    //print_r($_GET['color']);
    $con=mysqli_connect("localhost","root","12345","chesskindom");
    $color='';
    $type='';
    if(isset($_GET['color']))
    {
        $color = "(color="."'".($_GET['color'])[0]."' ";
        if(count($_GET['color'])>1)for($i=1;$i<count($_GET['color']);$i++) {
            $color=$color."or color="."'".($_GET['color'])[$i]."' ";
        }
        $color=$color.")";
        $zapr="select * from Vina Where ".$color;

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

            $zapr="select * from Vina Where "." ".$type." ";
        }

    else $zapr="select * from Vina";
    //echo $zapr;
        //else if($_GET['class']==2)$zapr="select path from  chees ";
       // else $zapr="select path from chees";
  //  $zapr="select way from foto where class='".$class."'";
    $rez=mysqli_query($con,$zapr);
    $max=array();
    $kol=0;

    while ($row = mysqli_fetch_row($rez)) {
        $max[$kol++]=$row;
    }
    //print_r($max);
    //if($_GET['x']>count($max))header("Location: MainUserPage.php?x=".count($max)."&class=".$_GET['class']);

    for($i=0;$i<count($max);$i++)
        echo " <div style=\"background-color: ghostwhite;opacity: 0.8;margin: 15px;width: 260px;border:2px solid black;padding:20px; border-radius: 15px;\" >
        <img width='240' height='240' src=\"".$max[$i][0]."\"><br/>
        <span style=\"font-size: 14pt;\"><b>".$max[$i][1]."</b></span><br/>
        <span> Цвет: ".$max[$i][3]."</span><br/>
        <span> Тип: ".$max[$i][2]."</span><br/>
        <span> Страна производитель: ".$max[$i][6]."</span><br/>
        <span> Цена за бутылку: ".$max[$i][4]." грн</span><br/>
        <form style='float:left; width: 110px;padding: 10px;padding-bottom: 0px;'  action='Buy.php' method='get'>
        <input style='background-color: darkgreen; color: ghostwhite;height: 40px;;width: 100px;' name='buy' value='buy' type='submit'>
        <input style='visibility: hidden;'  type='text' name='vine' value='".$max[$i][5]."'>
        </form>
        <form style='float:left; width: 110px; padding: 10px;padding-bottom: 0px;' action='BucketAddPage.php' method='get'>
        <input style='background-color: darkgreen; color: ghostwhite;width: 100px; height: 40px;' name='add' value='add' type='submit'>
        <input style='visibility: hidden;'  type='text' name='vine' value='".$max[$i][5]."'>
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

