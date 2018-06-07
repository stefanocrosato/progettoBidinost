
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LuftWaffer</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/styleFrom.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<style>
		 html, body {
			height: 100%;
		}
		
		#div1 {
			height: 100%;
			width: 100%;
			display: table;
		}
		
		#div2 {
			vertical-align: middle;
			display: table-cell;
			height: 100%;
		}
	
		table, td, th {
			border: 1px solid black;
		}
		
		table {
			font-family: arial, sans-serif;
			width: 100%;
			margin: 0 auto;
		}

		td, th {
			border: 1px solid #dddddd;
			text-align: left;
			padding: 15px;
		}

		tr:nth-child(odd) {
			background-color: #5c5c5c;
			color: white;
		}
		
		tr:nth-child(even) {
			background-color: #dddddd;
		}
		
		marquee {
			color: white;
		}
		
		h1, a {
			text-align: middle;
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
			<?php
				$servername = "localhost";
				$username = "fahrenheit";
				$password = "ciao";
				$database = "excalibur";

				// Create connection
				$conn = mysqli_connect($servername, $username, $password, $database);
				$partenza = $_GET['partenza'];
				$arrivo = $_GET['arrivo'];
				// Check connection
				if (!$conn) {
					echo 'L';
					die("I nostri server sono al momento offline, impossibile effettuare la prenotazione!");
				}
				$sql = "SELECT * FROM viaggio WHERE partenza = '".$partenza."' && arrivo = '".$arrivo."';";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					echo '<div id="div1">';
					echo '<div id="div2">';
					echo '<table width="200" border="1" class="table">';
					echo '<tr>';
					echo '<th>Partenza</th>';
					echo '<th>Arrivo</th>';
					echo '<th>Data partenza</th>';
					echo '<th>Data arrivo</th>';
					echo '<th>Costo</th>';
					echo '<th>Posti disponibili</th>';
					echo '</tr>';
					while($row = $result->fetch_assoc()) {
						$link = "/progettoBidinost/prenotazione.php?idViaggio=".$row['idViaggio']."&costo=".$row['costo'];
						$oraPartenza = $row['oraPartenza'];
						$oraArrivo = $row['oraArrivo'];
						$costo = $row['costo'];
						$posti = $row['posti'];
						echo '<tr>';
						echo '<td onClick="location.href=&quot'.$link.'&quot">'.$partenza.'</td>';
						echo '<td onClick="location.href=&quot'.$link.'&quot">'.$arrivo.'</td>';
						echo '<td onClick="location.href=&quot'.$link.'&quot">'.date("d-m-Y H:i:s", $oraPartenza).'</td>';
						echo '<td onClick="location.href=&quot'.$link.'&quot">'.date("d-m-Y H:i:s", $oraArrivo).'</td>';
						echo '<td onClick="location.href=&quot'.$link.'&quot">'.$costo.' €</td>';
						echo '<td onClick="location.href=&quot'.$link.'&quot">'.$posti.'</td>';
						echo '</tr>';
					}
					echo '</table>';
					echo '</div>';
					echo '</div>';
				} else {
					echo "<h1>OOPS! Sono stati trovati 0 risultati per il volo richiesto </h1><br/>";
					echo '<a href="/progettoBidi/from.php">Clicca qui per tornare alla scelta del volo</a>';
				}
			?>
		</div>
	</body>
</html>