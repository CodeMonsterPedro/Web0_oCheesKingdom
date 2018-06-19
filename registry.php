<!DOCTYPE html>
<html>
<head>
    <title>Вход в сырное коросевство</title>
    <style type="text/css">
        body{
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .square {
            margin-top: 300px;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
            background-color: gold;
        }
        input {
            margin-left: 10px;
            margin-top: 10px;
            border: black 2px solid;
        }
    </style>
</head>
<body background="./fotki/new-bg.jpg">
<form action="registercontrol.php" method="POST">
	<div class="square">
		<input type="text" name="log" placeholder="login"><br>
		<input type="text" name="pass" placeholder="password"><br>
        <input type="text" name="name" placeholder="first name"><br>
		<input type="submit" value="registry">
	</div>
</form>
</body>
</html>




