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
    <link rel="stylesheet" href="css/styleFrom.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div id="all">
    <div id="form">
        <h1 class="display-1" style="color:white">LuftWaffer</h1>
        <p class="font-weight-light" style="color:white">Benvenuti sul vostro sito di prenotazioni!</p>
        <form action="receive.php">
            <select class="selectpicker" name="partenza">
                <option>Seleziona la tua partenza</option>
                <?php
                $items = ConnectionDB::getFromSQL("SELECT * FROM viaggio;");
                var_dump($items);
                foreach ($items as $item) {
                    echo '<option value="' . $item['idViaggio'] . '">' . $item['partenza'] . '</option>';
                }
                ?>
            </select>
            <select name="arrivo">
                <option>Seleziona la tua partenza</option>
                <?php
                $items = ConnectionDB::getFromSQL("SELECT * FROM viaggio;");
                var_dump($items);
                foreach ($items as $item) {
                    echo '<option value="' . $item['idViaggio'] . '">' . $item['arrivo'] . '</option>';
                }
                ?>
            </select>
            <input type="submit" class="btn btn-default" value="Prenota il tuo viaggio!">
        </form>
    </div>
</div>
</body>
</html>