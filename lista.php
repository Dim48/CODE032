<head>
    <link href='profil.css' rel='stylesheet' type='text/css'>
</head>
<body>
    <a href="ulogovan.html" ><div id="btn3">Nazad</div></a>
        <h1 style='margin-left:4.5%;'> OGLASI </h1>
		<?php
			$database = "localhost";
		$user = "root";
		$pass = "";
		$db = "CODE032";
	
		$conn = new mysqli($database, $user, $pass, $db);
		if (!$conn)
		{
			die("Neuspelo povezivanje");
		}
		echo "<div style='margin-top:3%; margin-bottom:3%;'><form action='' method='POST'>";
		
		$faks = "SELECT * FROM fakulteti";
		$rez = $conn->query($faks);
		echo "<select id=fakulteti name=fakulteti class='form-control' style='width:12%; float:left; margin-left:10%;'>";
		while ($red = $rez->fetch_assoc())
		{
			echo "<option value=$red[ID]>$red[naziv]</option>";
		}
		echo "</select>";
		
		$smer = "SELECT * FROM smerovi";
		$smer = $conn->query($smer);
		echo "<select id=smerovi name=smerovi class='form-control' style='width:12%; float:left; margin-left:10%;'>";
		while ($red = $smer->fetch_assoc())
		{
			echo "<option value=$red[ID]>$red[naziv]</option>";
		}
		echo "</select>";
	
	
		echo "<select name='godine' class='form-control' style='width:12%; float:left; margin-left:10%;'>
		<option value='I'>I</option>
		<option value='II'>II</option>
		<option value='III'>III</option>
		<option value='IV'>IV</option>
		</select>";
		$predmeti = "SELECT * FROM predmeti";
		$predmeti = $conn->query($predmeti);
		echo "<select id=predmeti name=predmeti class='form-control' style='width:12%; float:left; margin-left:10%;'>";
		while ($red = $predmeti->fetch_assoc())
		{
			echo "<option value=$red[ID]>$red[naziv]</option>";
		}
		echo "</select>";
		echo "<input type='submit' value='Pretrazi'>";
		echo "</form></div>";
		echo "<div>";
		if (isset($_POST['predmeti']))
		{
			$p = $_POST['predmeti'];
			$sql = "SELECT * FROM oglasi INNER JOIN knjige ON oglasi.knjiga_ID = knjige.ID INNER JOIN predmet_knjiga ON knjige.ID = predmet_knjiga.knjiga_ID INNER JOIN predmeti ON predmet_knjiga.predmet_ID = predmeti.ID WHERE predmeti.ID = $p";
			$sql = $conn->query($sql);
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
		echo "</div>";
		?>
    </form>
</body>