<head>
    <link href='oglas.css' rel='stylesheet' type='text/css'>
</head>
<body>
    <a href="ulogovan.html" ><div id="btn3">Nazad</div></a>
    <form method="post" action="ulogovan.php">
        <div class="box">
            <style>
                .textarea {
                    resize: none;
                    width: 80%;
                    height: 23%;
                    padding-top: 2%;
                    padding-left: 3.5%;
                    border: 2.5% dashed whitesmoke;
                }

            </style>
                <h1> OGLAS </h1> 
                <label for="img">Prednja strana knjige (slika 1):</label>
                <input type="file" id="img" name="img" accept="image/">
                <br><br>
                <label for="img2">Zadnja strana knjige (slika 2):</label>
                <input type="file" id="img2" name="img2" accept="image/">
                <br> <br>
			<label>Izaberi knjigu:&ensp;</label>
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
	
	$sql = "SELECT * FROM knjige";
	$rez = $conn->query($sql);
	
	echo "<select id=knjige name=knjige class='form-control' style='width:300px;'>";
	while ($red = $rez->fetch_assoc())
	{
		echo "<option value=$red[ID]>$red[naziv]</option>";
	}
	echo "</select>";
	
?>
<br><br>
			<label>Unesi cenu:&ensp;</label>
            <input name="cena" placeholder="Unesite cenu:" />
            <br> <br>
            <textarea name="text" class="textarea" placeholder="Unesite opis: "></textarea>
            <br> <br>
            <input id="btn4" type="submit" value="Okaci oglas"/>
        </div>
    </form>
</body>