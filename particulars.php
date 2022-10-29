<?php
session_start();
if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = array();
}

@$db = new mysqli('localhost', 'root', '', 'proj');
if (mysqli_connect_errno()) {
  echo 'Error: Could not connect to database.  Please try again later.';
  exit;
}
?>



<head>
  <link rel="stylesheet" href="styles.css">
  <title>Fashsense</title>
  <meta charset="utf-8">
  <script type="text/javascript" src="script/java script/particulars.js"></script>
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


    <h1 class="title">Billing Address</h1>

    <div>Required fields are marked with an asterisk *</div>

    <form action="confirmation.php" method="post">
      <label for="myName">*Name:</label>
      <input type="text" name="myName" id="myName" onchange="validateName()" required>

      <label for="myAddress"><br>*Address:</label>
      <input type="text" name="myAddress" id="myAddress" onchange="validateAddress()" required>

      <label for="myUnit"><br>*Unit Number:</label>
      <input type="text" name="myUnit" id="myUnit" onchange="validateUnit()" required>

      <label for="myPostal"><br>*Postal Code:</label>
      <input type="text" name="myPostal" id="myPostal" onchange="validatePostal()" required>

      <label for="myEmail"><br>*E-mail:</label>
      <input type="email" name="myEmail" id="myEmail" onchange="validateEmail()" required>

      <label for="myPhone"><br>*Phone Number:</label>
      <input type="text" name="myPhone" id="myPhone" onchange="validatePhone()" required>



      <br><input type="reset" value="Clear">
      <br><input type="submit" value="Continue">
    </form>
    </div>

  </header>

  <footer>Copyright &copy; 2022 Fashsense<br>
        <a href="mailto: fashsense@gmail.com">Contact Us</a>
    </footer>
</body>