<?php
	session_start();
	$email = $_SESSION['email'];
	$database = "localhost";
	$user = "root";
	$pass = "";
	$db = "CODE032";
	$conn = new mysqli($database, $user, $pass, $db);
	if (!$conn)
	{
		die("Neuspelo povezivanje");
	}
	
	$sql1 = "SELECT * FROM nalog WHERE mail = '$email'";
	$upit = $conn->query($sql1);
	if ($upit->num_rows == 1)
	{
		$upit = $upit->fetch_assoc();
		$ime = $upit["ime"];
		$prezime = $upit["prezime"];
		$telefon = $upit["telefon"];
		$adresa = $upit["adresa"];
	}
?>
<html>
<head>
    <link href='profil.css' rel='stylesheet' type='text/css'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    ::-webkit-scrollbar {
    width: 10px;
    }
    ::-webkit-scrollbar-track {
    background: #f1f1f1; 
    }
    ::-webkit-scrollbar-thumb {
    background: #888; 
    }
    ::-webkit-scrollbar-thumb:hover {
    background: #555; 
    }
    </style>
</head>
<body>
    <br> 
    <form method="post" action="index.html">
        <a href="ulogovan.html" ><div id="btn3">Nazad</div></a>
        <a href="login.html" ><div id="btn31">Odjavi se</div></a>
        <h1>O korisniku</h1>
        <hr>
        <h3 style="display: inline;">Ime: </h3><?php echo "$ime"; ?><br><br>
        <h3 style="display: inline;">Prezime: </h3><?php echo "$prezime"; ?><br><br>
        <h3 style="display: inline;">Email: </h3><?php echo "$email"; ?><br><br>
        <h3 style="display: inline;">Broj telefona: </h3><?php echo "$telefon"; ?><br><br>
        <h3 style="display: inline;">Adresa: </h3><?php echo "$adresa"; ?><br><br>
        <h1>Moji oglasi</h1>
        <hr>
        <?php
			$sql = "SELECT * FROM oglasi WHERE mail = '$email'";
			$sql = $conn->query($sql);
			if ($sql->num_rows > 0)
			{
				while ($red = $sql->fetch_assoc())
				{
					echo '<div class="card"  style="width:200px; border-style:solid; border-width:3px; display:inline-block;">';
					echo '<img src="data:image;base64,'.base64_encode($red['prednja']).'" alt="SLIKA" style="width:200px; height:200px;">';
					echo '<div class="container">';
					echo '<h4><b>' . $red['cena'] . ' din</b></h4>';
					$knjiga = $red['knjiga_ID'];
					$sql2 = "SELECT naziv FROM knjige WHERE ID = $knjiga";
					$sql2 = $conn->query($sql2);
					$sql2 = $sql2->fetch_assoc();
					echo '<p>' . $sql2['naziv'] . '</p>';
					echo "</div></div>";
				}
			}
			else
			{
				echo "Ovaj nalog nema oglasa.";
			}
		?>

    </form>
</body>
</html>