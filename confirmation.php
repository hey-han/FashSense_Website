<?php
session_start();
$id=session_id();

if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = array();
}

$name=$_POST['myName'];
$address=$_POST['myAddress'];
$unit=$_POST['myUnit'];
$postal=$_POST['myPostal'];
$email=$_POST['myEmail'];
$phone=$_POST['myPhone'];

if (!$name || !$address || !$unit || !$postal || !$email || !$phone) {
	echo "You have not entered all the required details.<br />"
       ."Please go back and try again.";
	   exit;
}

@ $db = new mysqli('localhost', 'root', '', 'proj');
if (mysqli_connect_errno()) {
  echo 'Error: Could not connect to database.  Please try again later.';
  exit;
}

$query = "INSERT INTO customers values
            (null,'".$name."', '".$address."', '".$unit."', '".$postal."', '".$email."', '".$phone."')";
    $result = $db->query($query);
	
    if ($result) {
      $queryLastIndex = "SELECT MAX( customerid ) FROM customers;";
      $lastIndex = $db->query($queryLastIndex);
      $row = $lastIndex->fetch_assoc();
      $lastIndex = $row['MAX( customerid )'];
      
    } else {
      echo "An error has occurred.  The item was not added.";
    }
	
	
    foreach ($_SESSION['cart'] as $key=>$value) {
      $productid = $value['productid'];
      $size = $value['size'];
      $quantity = $value['quantity'];

      $query = "INSERT INTO orders values
            ($lastIndex,'".$productid."', '".$size."', '".$quantity."',NOW())";
      $result = $db->query($query);
    }
	
	
    $query="SELECT orders.*, customers.*, products.productid, customers.name 
    FROM products INNER JOIN orders
    ON orders.productid = products.productid INNER JOIN customers 
    ON orders.orderid = customers.customerid     
    ";
    $result = $db -> query($query);
    $num_results = $result->num_rows;
    $arr = array();    
    for ($i=0; $i <$num_results; $i++){
        $row = $result->fetch_assoc();        
        array_push($arr,$row);
        }    
    

    $query="SELECT orders.*, 
    products.productid, products.name, products.img_front
    FROM products INNER JOIN orders
    ON orders.productid = products.productid
    WHERE orders.orderid = (SELECT MAX(orders.orderid) FROM orders)";
    
    $result = $db -> query($query);
    $num_results = $result->num_rows;
    $item_names = array();
    $item_size = array();
    $item_quantity = array();  
	$item_pic = array();
    for ($j=0; $j <$num_results; $j++){
        $row = $result->fetch_assoc();        
        array_push($item_names,$row['name']);        
        array_push($item_size,$row['clothessize']);        
        array_push($item_quantity,$row['quantity']);
		array_push($item_pic,$row['img_front']);  
    }
    /*$to      = 'f32ee@localhost';
    $subject = 'Order Confirmed!';
    $message = "Hello {$arr[$i-1]['name']} Thank you for purchasing with Fashsense.\n Your order has been placed and confirmed! \nDate and Time: {$arr[$i-1]['orderdate']}\nOrder Id: {$lastIndex}.";
    $headers = 'From: f31ee@localhost' . "\r\n" .
        'Reply-To: f31ee@localhost' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers,'-ff31ee@localhost'); */
    session_destroy();
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
        <a href="Contact_Us.html">Contact Us</a>
      </div>
      
      
      <h1 class="title">Order Confirmation</h1>
	  <table class="orderconfirmTable">
          <tr>
            <th>Order ID: </th>
            <td><?php echo $arr[$i-1]['orderid']?></td>
          </tr>
          <tr>
            <th>Name: </th>
            <td><?php echo $arr[$i-1]['name']?></td>
          </tr>
		  <tr>
            <th>Address: </th>
            <td><?php echo $arr[$i-1]['address'].', '.$arr[$i-1]['unit'].', '.$arr[$i-1]['postal']?></td>
          </tr>
          <tr>
            <th>Email: </th>
            <td><?php echo $arr[$i-1]['email']?></td>
          </tr>
          <tr>
            <th>Contact: </th>
            <td><?php echo $arr[$i-1]['phone']?></td>
          </tr>
          <tr>
            <th>Order Date: </th>
            <td><?php echo $arr[$i-1]['orderdate']?></td>
          </tr>
        </table>
        <table class='itemsorderedTable'>
          <tr>

            <th style='font-size:x-large;background-color:#e8e8e8' colspan='4'>Items Ordered</th>
          </tr>          
          <tr>
		  <th></th>
          <th colspan='2'>Items Name</th>                  
          <th>Size</th>         
          <th>Quantity</th>
          </tr>                      
          <tr>
			<td><?php foreach($item_pic as $key=>$val)
            echo "<img id='shoe' src='{$val}' width='75px' ><br><br>"?>
            </td>
            <td colspan='2'><?php foreach($item_names as $key=>$val)
            echo "{$val}<br><br>"?>
            </td>
            <td><?php foreach($item_size as $key=>$val)
            echo "{$val}<br><br>"?>
            </td>
            <td><?php foreach($item_quantity as $key=>$val)
            echo "{$val}<br><br>"?>
            </td>
          </tr>         
        </table>
        <a href="index.html"><button id="backBtn">BACK TO SHOPPING</button></a>

    </header>
    
    <footer>Copyright &copy; 2022 Fashsense<br>
        <a href="mailto: fashsense@gmail.com">Contact Us</a>
    </footer>
</body>

