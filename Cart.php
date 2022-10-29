<?php
session_start();
if(!isset($_SESSION['cart'])){
	$_SESSION['cart'] = array();
}
if (isset($_POST['quantity'])){
    $_SESSION['cart'][] = ['productid'=>$subjectId, 'name'=>$row['name'], 'price'=>$row['price'], 'quantity'=>$_POST['quantity']] ;
}
if (isset($_GET['delete'])) {
    $_SESSION['subtotal'] -= $_SESSION['cart'][$_GET['delete']]['price'];
    unset($_SESSION['cart'][$_GET['delete']]);
    header('location: ' . $_SERVER['PHP_SELF']);
    exit();
 }  
?>




<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="styles.css">
<title>Fashsense Cart</title>
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
      
     <h1 class="title">Your Items</h1>
	 <?php
          if ($_SESSION['cart']) {
              echo "<form action='particulars.php' method='POST'>";
              echo "<div>
                      <table>
                          <tr>
                            <td></td>
                            <th>ITEM</th>
                            <th>SIZE</th>
                            <th>QTY</th>
                            <th>PRICE</th>
                          </tr>";
                  $subtotal = 0;
                  foreach ($_SESSION['cart'] as $key=>$value) {
                      $total = $value['price'] * $value['quantity'];
                    echo "<tr>
                            <td><img id='shoe' src='{$value['shoe_img']}' width='200px' ></td>
                            <td>{$value['name']}\n<div style='color:grey;font-size:16px'> </div></td> 
                            <td>{$value['size']}</td>
                            <td>{$value['quantity']}</td>
                            <td>\$<label id='itemCost'>$total</td>
                            <input type='hidden' id='itemPrice' value='{$value['price']}'>
                            <td><a href='{$_SERVER['PHP_SELF']}?delete=$key'><img id='delete' src='pics/trash.png'></a></td>
                          </tr>";
                    $subtotal = $subtotal + $total;
                  } 
              echo "</table>";
              echo "</div>";
              echo "<hr class='solid'><br>";
              echo "<span class='cartTotal'>SUBTOTAL: \$$subtotal </span><br><br><br><br>";
              echo "</form>";
              echo "<a href='particulars.php'><button id='checkoutBtn'>CHECKOUT</button></a>";
              echo "<a href='index.html'><button id='backBtn'>BACK TO SHOPPING</button></a>";
          } else {
            echo "<div align='center' style='font-size: 18px;'>Oops! Looks like your cart is empty!</div>";
          }
          ?>
	
    </header>
    
    <footer>Copyright &copy; 2022 Fashsense<br>
        <a href="mailto: fashsense@gmail.com">Contact Us</a>
    </footer>
</body>
</html>
