<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Output Dettagli Materiale</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera i dati inviati dal form
    $materiali = $_POST['materiale'];
    $grammature = $_POST['grammatura'];
    $grammature_misto = $_POST['grammatura_misto'];
    $aree = $_POST['area'];

    echo "<table border='1'>";
    echo "<tr><th>Materiale</th><th>grammatura[g/m2]</th><th>grammatura(misto Mat) [g/m2]</th><th>Area [m2]</th></tr>";

    // Visualizza i dati inseriti
    for ($i = 0; $i < count($materiali); $i++) {

        if (empty($materiali[$i]) && empty($grammature[$i]) && empty($grammature_misto[$i]) && empty($aree[$i])) {
            continue;
        }

        echo "<tr>";
        echo "<td>" . htmlspecialchars($materiali[$i]) . "</td>";
        echo "<td>" . htmlspecialchars($grammature[$i]) . "</td>";
        echo "<td>" . htmlspecialchars($grammature_misto[$i]) . "</td>";
        echo "<td>" . htmlspecialchars($aree[$i]) . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    // Se non ci sono dati inviati, mostra un messaggio di errore
    echo "<p>Nessun dato ricevuto.</p>";
}
?>

</body>
</html>

