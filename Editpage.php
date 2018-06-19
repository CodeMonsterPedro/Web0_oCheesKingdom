

<!DOCTYPE html>
<html>
<head>
    <title>BOSS</title>
    <style type="text/css">
        body{
            display: flex;
            justify-content: center;
            align-items: flex-end;
        }
        .mainbox{
            display:flex;flex-wrap: wrap;align-content: space-between;width: 900px;margin-left: 200px;
        }
        .divpart{display: flex;align-items: center;justify-content: center;float:left;width: 200px;height: 200px;}
        .mainpart{display:flex;flex-wrap: nowrap;align-content: space-around;border: 1px black solid;margin-bottom: 20px;background-color: ghostwhite;opacity: 0.8;}
    </style>
</head>
<body background="./fotki/new-bg.jpg">
<br>
<div class="mainbox">
    <?php
    $con=mysqli_connect("localhost","root","12345","chesskindom");
    if(isset($_GET['Vnum']))$zapr="select * from Vina";
    else $zapr="select * from chees";
    $rez=mysqli_query($con,$zapr);
    $max=array();
    $kol=0;
    while ($row = mysqli_fetch_row($rez)) {
        $max[$kol++]=$row;
    }
    if(isset($_GET['Vnum']))
    {
        echo "<div class='mainpart'>
                                            <div class='divpart'><img width='190' height='190' src=".$max[$_GET['Vnum']][0]."></div>
                                            <div  class='divpart'><span>".$max[$_GET['Vnum']][1]."</span></div>
                                            <div  class='divpart'><span>".$max[$_GET['Vnum']][2]."</span></div>
                                            <div  class='divpart'><span>".$max[$_GET['Vnum']][3]."</span></div>
                                            <div  class='divpart'><span>".$max[$_GET['Vnum']][4]."</span></div>
                                            <div  class='divpart'><span>".$max[$_GET['Vnum']][6]."</span></div>
                                            
                                      </div>";

        echo "
    <form action=\"Edit.php\" method=\"get\">
    <input type=\"text\" name=\"name\" value=\"".$max[$_GET['Vnum']][1]."\">
    <input type=\"text\" name=\"type\" value=\"".$max[$_GET['Vnum']][2]."\">
    <input type=\"text\" name=\"color\" value=\"".$max[$_GET['Vnum']][3]."\">
    <input type=\"text\" name=\"price\" value=\"".$max[$_GET['Vnum']][4]."\">
    <input type=\"text\" name=\"country\" value=\"".$max[$_GET['Vnum']][6]."\">
    <input style='visibility: hidden;'  type='text' name='Vnum' value='".$_GET['Vnum']."'>
    <input type=\"submit\" value=\"Сохранить\">
    </form>
    ";

    }
    else
    {
        echo "<div class='mainpart'>
                                            <div class='divpart'><img width='190' height='190' src=".$max[$_GET['Cnum']][0]."></div>
                                            <div  class='divpart'><span>".$max[$_GET['Cnum']][1]."</span></div>
                                            <div  class='divpart'><span>".$max[$_GET['Cnum']][2]."</span></div>  
                                            <div  class='divpart'><span>".$max[$_GET['Cnum']][3]."</span></div>
                                            <div  class='divpart'><span>".$max[$_GET['Cnum']][5]."</span></div>
                                            <div  class='divpart'><span>".$max[$_GET['Cnum']][6]."</span></div>
                                            
                                      </div>";

        echo "
    <form action=\"Edit.php\" method=\"get\">
    <input type=\"text\" name=\"name\" value=\"".$max[$_GET['Cnum']][1]."\">
    <input type=\"text\" name=\"type\" value=\"".$max[$_GET['Cnum']][2]."\">
    <input type=\"text\" name=\"price\" value=\"".$max[$_GET['Cnum']][3]."\">
    <input type=\"text\" name=\"country\" value=\"".$max[$_GET['Cnum']][5]."\">
    <input type=\"text\" name=\"count\" value=\"".$max[$_GET['Cnum']][6]."\">
    <input style='visibility: hidden;'  type='text' name='Cnum' value='".$_GET['Cnum']."'>
    <input type=\"submit\" value=\"Сохранить\">
    </form>
    ";

    }



    ?>

</div>
</body>
</html>

