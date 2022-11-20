<?php

	$email = $_POST['email'];
	$password = $_POST['password'];
	
	if ($email != "" && $password != "")
	{
	
	$database = "localhost";
	$user = "root";
	$pass = "";
	$db = "CODE032";
	
	$conn = new mysqli($database, $user, $pass, $db);
	if (!$conn)
	{
		die("Neuspelo povezivanje");
	}
	
	$sql = "SELECT * FROM nalog WHERE mail='$email' AND sifra='$password'";
	$rez = $conn->query($sql);
	if ($rez->num_rows == 1)
	{
		session_start();
		$_SESSION['email'] = $email;
		header('Location: ulogovan.html');
	}
	else
	{
		echo "<br>Pogresan mail/sifra.";
	}
	
	$conn->close();
	}
	else header('Location: login3.html');
?>