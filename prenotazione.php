<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>LuftWaffer</title>
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/styleFrom.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<style>
			.submit {
				color: #0b0b0b
			}
			
			h5 {
				color: #444444;
			}
		</style>
	</head>
		<body>
			<div id="a">
				<font color="white">
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
	    <div id="form">
        <h1 class="display-1">LuftWaffer</h1>
        <form method="GET" action="Conferma prenotazione.php">
            <input type="text" class="form-control" name="nome" placeholder="Nome"><br/>
            <input type="text" class="form-control" name="cognome" placeholder="Cognome"><br/>
			
            <input type="text" class="form-control" name="cf" placeholder="Codice fiscale"><br/>
			
            <input type="tel" class="form-control" name="telefono" placeholder="Numero di telefono"><br/>
            <input type="text" class="form-control" name="nPartecipanti" placeholder="Numero di partecipanti"><br/>
            <input type="text" class="form-control" name="nMinori" placeholder="Di cui minori"><br/>

			<?php
				echo '<input type="hidden" name="idViaggio" value='.$_GET['idViaggio'].'>';
				echo '<input type="hidden" name="costo" value='.$_GET['costo'].'>';
			?>
			
			
            <h5>Data di nascita</h5>
            <input type="date" class="form-control" name="dataNascita" placeholder="Data di nascita">
			<input type="submit" class="form-control" value="Inserisci">
        </form>
    </div>
		</body>
</html>