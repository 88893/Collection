<?php
require("../config/configproject.php");

$product = null;

if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    $query = "SELECT * FROM products WHERE id = $product_id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $product = mysqli_fetch_assoc($result);
    } else {
        echo "Product niet gevonden.";
        exit;
    }
} else {
    echo "Ongeldige aanvraag.";
    exit;
}

if (isset($_POST['bestel'])) {
    $naam = $_POST['naam'];
    $email = $_POST['email'];
    $adres = $_POST['adres'];
    $nummer = $_POST['nummer'];

    $product_naam = $product['name'];
    $besteld_op = date('Y-m-d H:i:s');

    // Insert order into bestellingen table
    $insertQuery = "INSERT INTO bestellingen (product_naam, naam, email, adres, nummer, besteld_op) VALUES ('$product_naam', '$naam', '$email', '$adres', $nummer, '$besteld_op')";

    // Decrement product availability
    $decrementQuery = "UPDATE products SET available = available - 1 WHERE id = $product_id";

    if (mysqli_query($conn, $insertQuery) && mysqli_query($conn, $decrementQuery)) {
        session_start();
        $_SESSION['bestelling_geplaatst'] = true;
        header('Location: ../pages/verzameling.php');
        exit;
    } else {
        echo "Fout bij het plaatsen van de bestelling.";
    }
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/product.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
<nav>
        <li><a href="../pages/index.html">Home</a></li>
        <li><a href="../pages/verzameling.php">verzameling</a></li>
        <li><a href="../pages/contact.php">Contact</a></li>
    </nav>
    <main>
        <div class="product-details">
            <img src="<?php echo $product['image_url']; ?>" alt="Productafbeelding">
            <div class="rechts">
                <h2 class="titel"><?php echo $product['name']; ?></h2>
                <p class="beschrijving-box"><?php echo $product['description']; ?></p>
                <p class="prijs">Prijs: €<?php echo $product['price']; ?></p>
                <p class="avail">Beschikbaar: <?php echo $product['available']; ?></p>
                <form method="post" action="">
                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                    <label for="naam">Naam:</label>
                    <input type="text" id="naam" name="naam" required>
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" required>
                    <label for="adres">Adres:</label>
                    <input type="text" id="adres" name="adres" required>
                    <label for="nummer">Nummer:</label>
                    <input type="number" id="nummer" name="nummer" required>
                    <input class="bestel" type="submit" name="bestel" value="Bestel">
                </form>
            </div>
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
    <script src="../javascript/product.js"></script>
</body>
</html>
