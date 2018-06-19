<?php
if(!isset($_GET['zero']))header('Location: admin.php?zero=1');
?>

<!DOCTYPE html>
<html>
<head>
    <title>admin</title>
    <style type="text/css">
        body{

        }
        .mainbox{
            display:flex;flex-wrap: wrap;align-content: space-between;width: 900px;
        }
        .divpart{display: flex;align-items: center;justify-content: center;float:left;width: 200px;height: 200px;}
        .mainpart{display:flex;flex-wrap: nowrap;align-content: space-around;border: 1px black solid;margin-bottom: 20px;margin-left:40px;background-color: ghostwhite;opacity: 0.8;}

    </style>
</head>
<body background="./fotki/new-bg.jpg">
<div>
<form action="admin.php" method="get">
    <select name="zero">
        <option value="1">Все</option>
        <option value="vine">Вина</option>
        <option value="chees">Сыры</option>
        <input type="submit" value="Показать">

    </select>
</form>
<form action="returncontrol.php" method="get">
    <input type="submit" value="ВЫХОД">
</form>
</div>

<div class="mainbox">
    <?php
 class Brain{
     public $max=array();
     public $con;
     public function __construct()
     {
         try{


         }
         catch (Exception $e){echo ("БД не робит".$e->getMessage());}

     }


     public function showChees()
     {
         {
             $con=mysqli_connect("localhost","root","12345","chesskindom");
             $zapr="select * from chees";
             $rez=mysqli_query($con,$zapr);

             $kol=0;
             while ($row = mysqli_fetch_row($rez)) {
                 $this->max[$kol++]=$row;
             }

             echo "<div class='mainpart'>
            <div class='divpart'><span>Фото</span></div>
            <div class='divpart'><span>Название</span></div>
            <div class='divpart'><span>Вид</span></div>
            <div class='divpart'><span>Цена за 100 грамм</span></div>
            <div class='divpart'><span>Страна производитель</span></div>
            <div class='divpart'><span>Количество на складе</span></div>
        </div>";
                 for($i=0;$i<count($this->max);$i++)echo "<div class='mainpart'>
                                            <div class='divpart'><img width='190' height='190' src=".$this->max[$i][0]."></div>
                                            <div  class='divpart'><span>".$this->max[$i][1]."</span></div>
                                            <div  class='divpart'><span>".$this->max[$i][2]."</span></div>
                                            <div  class='divpart'><span>".$this->max[$i][3]."</span></div>
                                            <div  class='divpart'><span>".$this->max[$i][5]."</span></div>
                                            <div  class='divpart'><span>".$this->max[$i][6]."</span></div>
                                            <div  class='divpart'><a href='Editpage.php?Cnum=".$i."'>Edit</a></div>
                                            <div  class='divpart'><a href='Delete.php?Cnum=".$i."'>Del</a></div>
                                      </div>";
                 $i++;
             }

     }
     public function showVine()
     {
         {
             $con=mysqli_connect("localhost","root","12345","chesskindom");
             $zapr="select * from Vina";
             $rez=mysqli_query($con,$zapr);
             $kol=0;
             while ($row = mysqli_fetch_row($rez)) {
                 $this->max[$kol++]=$row;
             }

             echo "<div class='mainpart'>
            <div class='divpart'><span>Фото</span></div>
            <div class='divpart'><span>Название</span></div>
            <div class='divpart'><span>Вид</span></div>
            <div class='divpart'><span>Цвет</span></div>
            <div class='divpart'><span>Цена за бутылку</span></div>
            <div class='divpart'><span>Страна производитель</span></div>
            
            
        </div>";
             for($i=0;$i<count( $this->max);$i++)echo "<div class='mainpart'>
                                            <div class='divpart'><img width='190' height='190' src=".$this->max[$i][0]."></div>
                                            <div  class='divpart'><span>".$this->max[$i][1]."</span></div>
                                            <div  class='divpart'><span>".$this->max[$i][2]."</span></div>
                                            <div  class='divpart'><span>".$this->max[$i][3]."</span></div>
                                            <div  class='divpart'><span>".$this->max[$i][4]."</span></div>
                                            <div  class='divpart'><span>".$this->max[$i][6]."</span></div>
                                            <div  class='divpart'><a href='Editpage.php?Vnum=".$i."'>Edit</a></div>
                                            <div  class='divpart'><a href='Delete.php?Vnum=".$i."'>Del</a></div>
                                      </div>";
             $i++;
         }
     }

     public function NameSort()
     {}
     public function DataSort()
     {}


 }

    $obj = new Brain();

    if($_GET['zero']==1)
    {
        $obj->showChees();
        $obj->showVine();
    }
    else if($_GET['zero']=='vine')$obj->showVine();
    else $obj->showChees();





    ?>

</div>


</body>
</html>

