<?php
	session_start();
	$email = $_SESSION['email'];
	$database = "localhost";
	$user = "root";
	$pass = "";
	$db = "CODE032";
	
	$knjiga_ID = $_POST['knjige'];
	$prednja = $_POST['img'];
	$zadnja = $_POST['img2'];
	$cena = $_POST['cena'];
	$opis = $_POST['text'];
	
	$conn = new mysqli($database, $user, $pass, $db);
	if (!$conn)
	{
		die("Neuspelo povezivanje");
	}
	
	$sql1 = "SELECT * FROM nalog WHERE mail = '$email'";
	$upit = $conn->query($sql1);
	if ($upit->num_rows == 1)
	{
	$upit2 = $upit->fetch_assoc();
	$nalog_ID = $upit2["ID"];
	$ime = $upit2["ime"];
	$prezime = $upit2["prezime"];
	$telefon = $upit2["telefon"];
	
	$sql = "INSERT INTO oglasi (nalog_ID, knjiga_ID, Ime, Prezime, mail, telefon, prednja, zadnja, cena, opis)
	VALUES ('$nalog_ID', '$knjiga_ID', '$ime', '$prezime', '$email', '$telefon', '$prednja', '$zadnja', '$cena', '$opis')";
	$rez = $conn->query($sql);
	}
	
?>
<head>
    <link href='ulogovan.css' rel='stylesheet' type='text/css'>
</head>
<body>
    <a href="profil.php" ><div id="btn3">Moj profil</div></a>
    <form method="post" action="index.html">
        <div class="box">
            <h1>Uspesno ste okacili oglas!</h1>
            <a href="lista.php"><div class="btn">Trazi knjigu</div></a>
            <a href="oglas.php"><div id="btn2">Postavi oglas</div></a>
        </div>
    </form>
</body>