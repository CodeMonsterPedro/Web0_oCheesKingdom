<!DOCTYPE html>
<html>
<head>
    <title>CheesKingdom</title>
    <style type="text/css">
        body{
            display: flex;
            justify-content: center;
            align-items: flex-end;
        }
        img {
            border-radius: 50%;
            -webkit-transition: -webkit-transform .7s ease-in-out;
            transition:         transform .7s ease-in-out;
        }
        img:hover {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    </style>
</head>
<body background="./fotki/new-bg.jpg">

<div style="display: flex;width:1000px;flex-wrap: nowrap;align-items: stretch;justify-content:space-between;height: 800px;">

    <div style="display: flex;align-items: center;">
        <a href="MainUserPage.php"><img width="260" height="200" src="./fotki/0_121218_ce2894a_orig.png"></a>
    </div>
    <div style="display: flex;align-items: center;">
        <span><img width="260" height="260" src="./fotki/Logo-Syrnoe-korolevstvo-2.png"></span>
    </div>
    <div style="display: flex;align-items: center;">
        <a href="MainUserCheess.php"><img width="220" height="200" src="./fotki/cheese_PNG2.png"></a>
    </div>
</div>
</body>
</html>
