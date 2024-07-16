<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Resin calculator</title>

    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <?php

    include 'connection.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        global $conn;
        // Recupera i dati inviati dal form

        $processo = $_POST['processo'];
        $materiale = $_POST['materiale'];
        $tessuto = $_POST['tessuto'];
        $grammature = $_POST['grammatura'];
        $grammature_misto = $_POST['grammatura_misto'];
        $aree = $_POST['area'];

        echo "<div class='table-responsive'>";
        echo "<table class='table table-bordered'>";
        echo "<thead class='thead-dark'><tr>
              <th>Tessuto</th>
              <th>grammatura[g/m2]</th>
              <th>grammatura(misto Mat)[g/m2]</th>
              <th>Area [m2]</th>
              <th>Spessore[mm]</th>
              <th>Peso fibra[kg]</th>
              <th>Peso resina[kg]</th>
              <th>Peso lam.[kg]</th>
         </tr></thead>";
        echo "<tbody>";

        // Visualizza i dati inseriti
        for ($i = 0; $i < count($tessuto); $i++) {

            if (empty($materiali[$i]) && empty($grammature[$i]) && empty($grammature_misto[$i]) && empty($aree[$i])) {
                continue;
            }

            $stmt = $conn->prepare("SELECT TW FROM $materiale WHERE ProcessoID = $processo AND TessutoID = $tessuto[$i]");
            $stmt->execute();
            $stmt->bind_result($tw);
            $stmt->fetch();

            $spessore = $tw * $grammature[$i] * 0.001;

            //tutti i valori fissi 2.34 , 1.5 , 1 , 1 sono tw
            if (!empty($grammature_misto[$i])) {

                if ($materiale == 'glass' && $processo == 1) {

                    $spessore = $spessore + ($grammature_misto[$i] * 2.34 * 0.001);

                } else if ($materiale == 'glass' && $processo == 2) {

                    $spessore = $spessore + ($grammature_misto[$i] * 1.5 * 0.001);

                } else if ($materiale == 'basalt' && $processo == 1) {

                    $spessore = $spessore + ($grammature_misto[$i] * 1 * 0.001);

                } else if ($materiale == 'basalt' && $processo == 2) {

                    $peso_fibra = ($grammature_misto[$i] * 1 * 0.001);

                }
            }

            $stmt->close();

            echo "<tr>";

            if ($tessuto[$i] == 1) {

                echo "<td>Mat</td>";

            } else if ($tessuto[$i] == 2) {

                echo "<td>Multidirectional</td>";

            } else if ($tessuto[$i] == 3) {

                echo "<td>Unidirectional</td>";

            } else if ($tessuto[$i] == 4) {

                echo "<td>Gel coat</td>";
            }

            echo "<td>" . htmlspecialchars($grammature[$i]) . "</td>";
            echo "<td>" . htmlspecialchars($grammature_misto[$i]) . "</td>";
            echo "<td>" . htmlspecialchars($aree[$i]) . "</td>";
            echo "<td>" . $spessore . "</td>";
            echo "</tr>";
        }


        echo "</tbody></table>";
        echo "</div><br>";

    } else {
        // Se non ci sono dati inviati, mostra un messaggio di errore
        echo "<p>Nessun dato ricevuto.</p>";
    }
    ?>
</div>
<!-- Include Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

