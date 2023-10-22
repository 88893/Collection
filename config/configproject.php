<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

$host = "localhost"; // Je hoeft de poort niet op te geven voor XAMPP
$username = "root"; // Standaardgebruikersnaam voor XAMPP is "root"
$password = ""; // Standaardwachtwoord voor XAMPP is meestal leeg
$database = "verzameling"; // Gewijzigd naar de nieuwe database "verzameling"

session_start();

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    echo "FOUT: geen connectie naar database. <br>";
    echo "Error:" . mysqli_connect_error() . "<br>/";
    echo "Errno:" . mysqli_connect_errno() . "<br>/";
    exit;
}
?>
