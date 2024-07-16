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
    $processo = $_POST['process'];
    $materiale = $_POST['material'];

    echo "<h2>Inserisci i dettagli per $materiale - $processo</h2>";
    echo "<form action='Output.php' method='post'>";
    echo "<table border='1'>";
    echo "<tr><th>Materiale</th><th>grammatura[g/m2]</th><th>grammatura(misto Mat)[g/m2]</th><th>Area[m2]</th></tr>";
    echo "<tr><td>$materiale</td></tr>";
    // Genera 15 righe di input
    for ($i = 0; $i < 15; $i++) {
        echo "<tr>";
        echo "<td><select name='materiale[]'>";
        echo "<option value='Gel coat'>Gel coat</option>";
        echo "<option value='Mat'>Mat</option>";
        echo "<option value='Multidirectional'>Multidirectional</option>";
        echo "<option value='Unidirectional'>Unidirectional</option>";
        echo "</select></td>";
        echo "<td><input type='number' name='grammatura[]'></td>";
        echo "<td><input type='number' name='grammatura_misto[]'></td>";
        echo "<td><input type='number' name='area[]'></td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "<br>";
    echo "<input type='submit' value='Calcola'>";
    echo "</form>";
} else {
    // Se non ci sono dati inviati, mostra un messaggio di errore o reindirizza altrove
    echo "<p>Nessun dato ricevuto.</p>";
}
?>
</body>
</html>
