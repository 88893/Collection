<?php
require("../config/configproject.php");
require("../config/toevoegcontact.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Formulier</title>
    <link rel="stylesheet" href="../css/contact.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
<div class="loader-wrapper">
    <div class="loader"></div>
</div>
    <header>
    <nav>
        <li><a href="index.html">Home</a></li>
        <li><a href="../pages/verzameling.php">verzameling</a></li>
        <li><a href="contact.php">Contact</a></li>
    </nav>
                  
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        </header> 

    <main>
        <div class="contact-form">
            <h2>Contact Formulier</h2>
            <form method="POST">
                <label for="naam">Naam:</label>
                <input type="text" id="naam" name="naam" required>
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                
                <label for="nummer">Telefoonnummer:</label>
                <input type="tel" id="nummer" name="nummer">
                
                <label for="Bericht">Bericht:</label>
                <textarea id="Bericht" name="Bericht" rows="8" required></textarea>
                
                <button type="submit">Verstuur</button>
            </form>
        </div>
    </main>
    <footer>
    <div class="footerContainer">
        <div class="socialIcons">
            <a href=""><i class="fa-brands fa-twitter"></i></a>
            <a href=""><i class="fa-brands fa-instagram"></i></a>
            <a href=""><i class="fa-brands fa-tiktok"></i></a>
            <a href=""><i class="fa-brands fa-github"></i></a>
        </div>
        <div class="footerNav">
            <ul>
                <a href="index.html">Home</a>
                <a href="verzameling.php">verzameling</a>
                <a href="contact.php">contact</a>

            </ul>
        </div>
    </footer>
 <script src="../javascript/contact.js"></script>
</body>
</html>
