 <?php
$servername = "localhost";
$username = "fahrenheit";
$password = "ciao";
$database = "excalibur";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
	echo 'L';
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM viaggio;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "idViaggio: ".$row["idViaggio"]." - Partenza: ". $row["partenza"]." - Arrivo: ".$row["arrivo"]." - oraPartenza: ".$row["oraPartenza"]." - oraArrivo: ". $row["oraArrivo"]." - Costo: ".$row["costo"]." - Posti: ".$row["posti"]."<br>";
    }
} else {
    echo "0 results";
}
echo '<a href="index.html">Torna alla pagina di inserimento</a>';
$conn->close();
?>