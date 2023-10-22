<?php
require("../config/configproject.php");

$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);

// Controleer of de sessievariabele bestaat

if (isset($_SESSION['bestelling_geplaatst']) && $_SESSION['bestelling_geplaatst']) {
    echo '<div class="melding-box"><div class="melding">Uw bestelling is geplaatst!</div></div>';
    // Verwijder de sessievariabele om de melding slechts eenmaal te tonen
    unset($_SESSION['bestelling_geplaatst']);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/verzamel.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <nav>
    <nav>
        <li><a href="index.html">Home</a></li>
        <li><a href="../pages/verzameling.php">verzameling</a></li>
        <li><a href="contact.php">Contact</a></li>
    </nav>
    </nav>
    <main>
        <div class="project-container">
            <ul>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <li class="product">
                        <img src="<?php echo $row['image_url']; ?>" alt="Productafbeelding">
                        <h3><?php echo $row['name']; ?></h3>
                        <p><?php echo $row['description']; ?></p>
                        <p>Beschikbaar: <?php echo $row['available']; ?></p>
                        <p>Prijs: €<?php echo $row['price']; ?></p>
                        <form method="post" action="productdetails.php">
                            <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                            <input class="knop" type="submit" value="Bekijk">
                        </form>
                    </li>
                <?php } ?>

                <script src="../javascript/verzamel.js"></script>
            </ul>
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
</body>
</html>
