<html>
	<?php 
		session_start();
		$_SESSION['id'] = 11111;
	?>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script language="JavaScript" type="text/javascript" src="js/all.js"></script>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

	<?php if(isset($_SESSION['id'])) {
		echo('href="logout.php" class="w3-button">Déconnection</a>');
	}else{
       		echo('Connection nécessaire');
	} ?>
</head>

<br><br>

<body>
	<?php if(isset($_SESSION['id'])) {
		echo 'Bienvenu '.$_SESSION['id'];
	} ?>
        

</body>

</html>