<?php
session_start();
$id = session_id();

// Check for cart items
if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = array();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="styles.css">
  <title>Fashsense  Female</title>
  <meta charset="utf-8">
</head>


<body>

 
  <header>

    <div class="navbar">
      <a href="index.html"><img src="pics/logo/logo 2.png" alt="Homepage" id="homelogo"></a>
      <a href="index.html">Home</a>
      <a href="Male.php">Male</a>
      <a href="Female.php">Female</a>
      <a href="Cart.php">Cart</a>
      <a href="News.html">News</a>
      <a href="Contact_Us.html">Contact Us</a>
    </div>


    <h1 class="title">Female Products</h1>
    <div class="cardLayout">
      <?php
      $category = 'women';
      include 'pmoCard.php';
      ?>
    </div>
    <footer>Copyright &copy; 2022 Fashsense<br>
        <a href="mailto: fashsense@gmail.com">Contact Us</a>
    </footer>
</body>

</html>