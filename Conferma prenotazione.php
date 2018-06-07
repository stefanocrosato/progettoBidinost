<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>LuftWaffer</title>
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/styleFrom.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<style>
			h1, a, marquee {
				color: white;
			}
		</style>
	</head>
	<body>
		<div id="a">
		<marquee
            color:white
            loop="-1"
            scrollamount="1"
            scrolldelay="20"
            direction="up"
            height="150"
            width="200"
            align="right">
        Sito creato da <br>
        Crosato Stefano e<br>
        Micol Massimiliano<br>
        Benvenuti sul nostro sito di prenotazioni!<br>
        Se volete inserire dati sul database:<br>
        index.html<br>
        Grazie di usare il nostro servizio<br>
        <br><br><br><br>
    </marquee>
			<h1>Registrazione effettuata con successo!</h1><br/>
			<a href="/progettoBidinost/from.php">Clicca qui per tornare alla pagina principale</a>
			<?php
				$servername = "localhost";
				$username = "fahrenheit";
				$password = "ciao";
				$database = "excalibur";
				$cf = $_GET['cf'];
				$nome = $_GET['nome'];
				$cognome = $_GET['cognome'];
				$telefono = $_GET['telefono'];
				$nPartecipanti = $_GET['nPartecipanti'];
				$nMinori = $_GET['nMinori'];
				$idViaggio = $_GET['idViaggio'];
				$dataNascita = $_GET['dataNascita'];
				$millisecondiDataNascita = strtotime($dataNascita);
				$costo = $_GET['costo'];
				$costoTotale = $costo * ($nPartecipanti - $nMinori) + $costo * $nMinori * 0.8; //20% sconto sui minori
				// Create connection
				$conn = mysqli_connect($servername, $username, $password, $database);
				$sql = "INSERT INTO Prenotante VALUES ('".$cf."', ".$idViaggio.", '".$nome."', '".$cognome."', ".$millisecondiDataNascita.", '".$telefono."');";
				$result = $conn->query($sql);
				$sql = "INSERT INTO Prenotazione VALUES (".$idViaggio.", '".$cf."', ".$nPartecipanti.", ".$nMinori.", ".$costoTotale.");";
				$result = $conn->query($sql);
			?>
		</div>
	</body>
</html>