<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Resin Calculator</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Recupera i valori inviati dal form iniziale
        $processo = $_POST['processo'];
        $materiale = $_POST['materiale'];

        echo "<form action='Output.php' method='post'>";
        echo "<div class='table-responsive'>";
        echo "<table class='table table-bordered'>";
        echo "<thead class='thead-dark'><tr><th>Tessuto</th><th>grammatura [g/m2]</th><th>grammatura (misto Mat) [g/m2]</th><th>Area [m2]</th></tr></thead>";
        echo "<tbody>";

        // Genera 15 righe di input
        for ($i = 0; $i < 15; $i++) {
            echo "<tr>";
            echo "<td><select class='form-control' name='tessuto[]'>";
            echo "<option value='1'>Mat</option>";
            echo "<option value='2'>Multidirectional</option>";
            echo "<option value='3'>Unidirectional</option>";
            echo "<option value='4'>Gel coat</option>";
            echo "</select></td>";
            echo "<td><input class='form-control' type='number' name='grammatura[]'></td>";
            echo "<td><input class='form-control' type='number' name='grammatura_misto[]'></td>";
            echo "<td><input class='form-control' type='number' name='area[]'></td>";
            echo "</tr>";
        }

        echo "</tbody></table>";
        echo "</div><br>";

        //parametri $processo e $materiale da passare ad output.php
        echo "<input type='hidden' name='processo' value='" . htmlspecialchars($processo) . "'>";
        echo "<input type='hidden' name='materiale' value='" . htmlspecialchars($materiale) . "'>";

        echo "<button type='submit' class='btn btn-primary btn-block'>Calcola</button>";
        echo "</form>";
    } else {
        // Se non ci sono dati inviati, mostra un messaggio di errore o reindirizza altrove
        echo "<div class='alert alert-danger' role='alert'>Nessun dato ricevuto.</div>";
    }
    ?>
</div>

<!-- Include Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
