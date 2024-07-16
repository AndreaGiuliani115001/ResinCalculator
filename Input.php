<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Resin Calculator</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recupera i valori inviati dal form iniziale
    $processo = $_POST['processo'];
    $materiale = $_POST['materiale'];

    echo "<form action='Output.php' method='post'>";
    echo "<table border='1'>";
    echo "<tr><th>Tessuto</th><th>grammatura[g/m2]</th><th>grammatura(misto Mat)[g/m2]</th><th>Area[m2]</th></tr>";

    // Genera 15 righe di input
    for ($i = 0; $i < 15; $i++) {
        echo "<tr>";
        echo "<td><select name='tessuto[]'>";
        echo "<option value='1'>Mat</option>";
        echo "<option value='2'>Multidirectional</option>";
        echo "<option value='3'>Unidirectional</option>";
        echo "<option value='4'>Gel coat</option>";
        echo "</select></td>";
        echo "<td><input type='number' name='grammatura[]'></td>";
        echo "<td><input type='number' name='grammatura_misto[]'></td>";
        echo "<td><input type='number' name='area[]'></td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "<br>";

    //parametri $processo e $materiale da passare ad output.php
    echo "<input type='hidden' name='processo' value='" . htmlspecialchars($processo) . "'>";
    echo "<input type='hidden' name='materiale' value='" . htmlspecialchars($materiale) . "'>";


    echo "<input type='submit' value='Calcola'>";
    echo "</form>";
} else {
    // Se non ci sono dati inviati, mostra un messaggio di errore o reindirizza altrove
    echo "<p>Nessun dato ricevuto.</p>";
}
?>
</body>
</html>
