<?php
	
	$email = $_POST['email'];
	$password = $_POST['password'];
	$ime = $_POST['ime'];
	$prezime = $_POST['prezime'];
	$telefon = $_POST['telefon'];
	$adresa = $_POST['adresa'];
	
	$database = "localhost";
	$user = "root";
	$pass = "";
	$db = "CODE032";
	
	$conn = new mysqli($database, $user, $pass, $db);
	if (!$conn)
	{
		die("Neuspelo povezivanje");
	}
	if ($email != "" && $password != "" && $ime != "" && $prezime != "" && $adresa != "" && $telefon != ""){
	$sql = "SELECT * FROM nalog WHERE mail='$email'";
	$rez = $conn->query($sql);
	if ($rez->num_rows == 0)
	{
		$unos = "INSERT INTO nalog (mail, sifra, ime, prezime, adresa, telefon) VALUES ('$email', '$password', '$ime', '$prezime', '$adresa', '$telefon')";
		$conn->query($unos);
		header('Location: login2.html');
	}
	else
	{
		header('Location: signup2.html');
	}
	}
	else header('Location: signup3.html');
	$conn->close();
	
?>