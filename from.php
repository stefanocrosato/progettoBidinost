<?php
    require_once __DIR__."/ConnectionDB.php";
ini_set('display_errors',1);
error_reporting(E_ALL | E_STRICT);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LuftWaffer</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<div id="form">
    <h1 class="display-1">LuftWaffer</h1>
    <form action="receive.php">
        <select name="partenza">
            <option>Seleziona la tua partenza</option>
            <?php
            $items = ConnectionDB::getFromSQL("SELECT * FROM viaggio;");
            var_dump($items);
            foreach ($items as $item) {
                echo '<option value="' . $item['idViaggio'] . '">' . $item['partenza'] . '</option>';
            }
            ?>
        </select>
    </form>
</div>
</body>
</html>