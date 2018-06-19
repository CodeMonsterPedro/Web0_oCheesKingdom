<?php

?>

<!DOCTYPE html>
<html>
<head>
    <title>Ваша корзина покупок</title>
    <style type="text/css">
        .square {
            margin-top: 150px;
            margin-left: 300px;
            margin-right: 300px;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
            background-color: ghostwhite;
            opacity: 0.8;
        }
        .mainbox{
            display:flex;flex-wrap: wrap;align-content: space-between;width: 900px;margin-left: 200px;margin-left: 280px;
        }
        .divpart{display: flex;align-items: center;justify-content: center;float:left;width: 200px;height: 200px;}
        .mainpart{display:flex;flex-wrap: nowrap;align-content: space-around;border: 1px black solid;margin-bottom: 20px;margin-left:40px;background-color: ghostwhite;opacity: 0.8;}
        .sum{}
        .count{}
    </style>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
    <script>
        function f() {
            alert("Ваш заказ успешно оформлен, вам перезвонит оператор для подтверждения");
        }
        function f1() {
            var i=0;
            var total=0;

//доделать сумарную сумму
            for(i=0;i<$('sum').length;i++) tolat+=($('sum')[i]*$('count')[i]);
            var str=str.parseInt($('.sum')[0].innerText)
            alert(str);
            $('total').value=total;
        }
    </script>
</head>
<body onload='f1()' background="./fotki/new-bg.jpg" >

    <div class="mainbox">

    <?php
    if($_COOKIE['bucketcount']>0)
    if(isset($_COOKIE['chees'])&&isset($_COOKIE['vine'])){
        $idstring=explode(' ',$_COOKIE['chees']);

        $con=mysqli_connect("localhost","root","12345","chesskindom");
        $i=0;
        echo "<div class='mainpart'>
            <div class='divpart'><span>Фото</span></div>
            <div class='divpart'><span>Название</span></div>
            <div class='divpart'><span>Страна производитель</span></div>
            <div class='divpart'><span>Цена за 100 грамм</span></div>



        </div>";
        while ($i<count($idstring)) {
            $zapr="select * from chees where id=".$idstring[$i];
            if($idstring[$i]==''){$i++;continue;}
            $rez=mysqli_query($con,$zapr);
            $row = mysqli_fetch_row($rez);
            $max=$row;
            echo "<div class='mainpart'>
                                            <div class='divpart'><img width='190' height='190' src=".$max[0]."></div>
                                            <div  class='divpart'><span>".$max[1]."</span></div>
                                            <div  class='divpart'><span>".$max[5]."</span></div>
                                            <div  class='divpart'><span class='sum' >".$max[3]."</span></div>
                                               <form  class='divpart'>x<input class='count' onchange='f1()' type='number' min='1' max='".$max[6]."' value='1'></form>
                                               <a class='divpart' href='BucketDel.php?Cnum=".$idstring[$i]."'><img style='width: 30px; height: 30px;' src='./fotki/krest.png'></a>
                                           
                                      </div>";
            $i++;
        }

        $idstring=explode(' ',$_COOKIE['vine']);
        $con=mysqli_connect("localhost","root","12345","chesskindom");
        $i=0;
        echo "<div class='mainpart'>
            <div class='divpart'><span>Фото</span></div>
            <div class='divpart'><span>Название</span></div>
            <div class='divpart'><span>Страна производитель</span></div>
            <div class='divpart'><span>Цена за бутылку</span></div>



        </div>";
        while ($i<count($idstring)) {
            $zapr="select * from Vina where id=".$idstring[$i];
            if($idstring[$i]==''){$i++;continue;}
            $rez=mysqli_query($con,$zapr);
            $row = mysqli_fetch_row($rez);
            $max=$row;
            echo "<div class='mainpart'>
                                            <div class='divpart'><img width='190' height='190' src=".$max[0]."></div>
                                            <div  class='divpart'><span>".$max[1]."</span></div>
                                            <div  class='divpart'><span>".$max[6]."</span></div>
                                            <div   class='divpart'><span class='sum'>".$max[4]."</span></div>
                                             <form class='divpart'>x<input class='count' onchange='f1()' type='number' min='1' max='".$max[7]."' value='1'></form>
                                             <a class='divpart' href='BucketDel.php?Vnum=".$idstring[$i]."'><img style='width: 30px; height: 30px;' src='./fotki/krest.png'></a>
                                           
                                      </div>";
            $i++;
        }
    }
    else
        if(isset($_COOKIE['chees'])&&!isset($_COOKIE['vine'])) {
        $idstring = explode(' ', $_COOKIE['chees']);
        $con = mysqli_connect("localhost", "root", "12345", "chesskindom");
        $i = 0;
            echo "<div class='mainpart'>
            <div class='divpart'><span>Фото</span></div>
            <div class='divpart'><span>Название</span></div>
            <div class='divpart'><span>Страна производитель</span></div>
            <div class='divpart'><span>Цена за 100 грамм</span></div>



        </div>";
        while ($i < count($idstring)) {
            $zapr = "select * from chees where id=" . $idstring[$i];
            if($idstring[$i]==''){$i++;continue;}
            $rez = mysqli_query($con, $zapr);
            $row = mysqli_fetch_row($rez);
            $max = $row;
            echo "<div class='mainpart'>
                                            <div class='divpart'><img width='190' height='190' src=" . $max[0] . "></div>
                                            <div  class='divpart'><span>" . $max[1] . "</span></div>
                                            <div  class='divpart'><span>" . $max[5] . "</span></div>
                                            <div   class='divpart'><span class='sum'>" . $max[3] . "</span></div>
                                              <form class='divpart'>x<input class='count' onchange='f1()' type='number' min='1' max='".$max[6]."' value='1'></form>
                                               <a class='divpart' href='BucketDel.php?Cnum=".$idstring[$i]."'><img style='width: 30px; height: 30px;' src='./fotki/krest.png'></a>
        
                                           
                                      </div>";
            $i++;
        }
    }
    else if(!isset($_COOKIE['chees'])&&isset($_COOKIE['vine'])) {
        $idstring=explode(' ',$_COOKIE['vine']);
        $con=mysqli_connect("localhost","root","12345","chesskindom");
        $i=0;
        echo "<div class='mainpart'>
            <div class='divpart'><span>Фото</span></div>
            <div class='divpart'><span>Название</span></div>
            <div class='divpart'><span>Страна производитель</span></div>
            <div class='divpart'><span>Цена за бутылку</span></div>



        </div>";
        while ($i<count($idstring)) {
            $zapr="select * from Vina where id=".$idstring[$i];
            if($idstring[$i]==''){$i++;continue;}
            $rez=mysqli_query($con,$zapr);
            $row = mysqli_fetch_row($rez);
            $max=$row;
            echo "<div class='mainpart'>
                                            <div class='divpart'><img width='190' height='190' src=".$max[0]."></div>
                                              <div  class='divpart'><span>".$max[1]."</span></div>
                                            <div  class='divpart'><span>".$max[6]."</span></div>
                                            <div   class='divpart'><span class='sum'>".$max[4]."</span></div>
                                             <form class='divpart'>x<input class='count' onchange='f1()' type='number' min='1' max='".$max[7]."' value='1'></form>
                                             <a class='divpart' href='BucketDel.php?Vnum=".$idstring[$i]."'><img style='width: 30px; height: 30px;' src='./fotki/krest.png'></a>
        
                                           
                                      </div>";
            $i++;
        }
    }


    echo "<form action='backcontrol.php'><input onclick='f()' style='opacity: 0.8; background-color: ghostwhite; width: 200px;height: 100px;' type='submit' value='Оформить заказ'></form>";
    echo "<span name='total'></span>";
     ?>
    </div>


</body>
</html>

