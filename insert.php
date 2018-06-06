 <?php
$servername = "localhost";
$username = "fahrenheit";
$password = "ciao";
$database = "excalibur";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$partenza = $_POST['cittàPartenza'];
$arrivo = $_POST['cittàArrivo'];
$oraPartenza = $_POST['oraPartenza'];
$oraArrivo = $_POST['oraArrivo'];
$costo = $_POST['costo'];
$posti = $_POST['posti'];
$fields = array('cittàPartenza', 'cittàArrivo', 'oraPartenza', 'oraArrivo', 'costo', 'posti');

$error = false; //No errors yet
foreach($fields AS $fieldname) { //Loop trough each field
  if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])) {
    echo 'Inserisci un valore valido nel campo '.$fieldname.'!<br />';
	$error = true;
  }
}
//idViaggio	partenza	arrivo	oraPartenza	oraArrivo	costo	posti
$sql = "INSERT INTO viaggio VALUES (NULL, '$partenza', '$arrivo', $oraPartenza, $oraArrivo, $costo, $posti);";
if ($error === false) {
	if ($conn->query($sql) === true) {
		echo "Nuovo record creato con successo!";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
echo '<a href="index.html">Torna alla pagina di inserimento</a>';
$conn->close();
?>