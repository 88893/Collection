<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $naam = $_POST['naam'];
    $email = $_POST['email'];
    $nummer = $_POST['nummer'];
    $bericht = $_POST['Bericht'];

    $query = "INSERT INTO contact (naam, email, nummer, bericht) VALUES ('$naam', '$email', '$nummer', '$bericht')";
    
    if (mysqli_query($conn, $query)) {
        echo "Bedankt! Je bericht is ontvangen";
    } else {
        echo "Sorry er is iets mis gegaan: " . mysqli_error($conn);
    }
}
?>
