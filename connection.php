<?php
$servername = "localhost";
$username = "root"; // Il nome utente predefinito di MySQL su XAMPP è "root"
$password = ""; // La password predefinita di MySQL su XAMPP è vuota
$dbname = "resin_calculator"; // Nome del database che hai creato

// Crea la connessione
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

