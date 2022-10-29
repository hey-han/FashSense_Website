<?php
    // Establish connection with DB
    @ $db = new mysqli('localhost', 'root', '', 'proj');
    if (mysqli_connect_errno()) {
      echo 'Error: Could not connect to database.  Please try again later.';
      exit;
    }
    // Switch case to fetch shoes from their respective categories
    switch ($category) {
      case "men":
        $fetchData = mysqli_query($db , "SELECT * FROM products WHERE category in ('men', 'unisex')");
        break;
      case "women":
        $fetchData = mysqli_query($db , "SELECT * FROM products WHERE category in ('women','unisex')");
        break;
      default:
        $fetchData = mysqli_query($db , "SELECT * FROM products");
    }
    // Append to array to render product card
    $num_results = $fetchData->num_rows;  
    $arr = array();
    for ($i=0; $i <$num_results; $i++) {
      $row = $fetchData->fetch_assoc();
      array_push($arr, $row);
      echo "<div class='card'>
                <a href='underpmo.php?id={$arr[$i]['productid']}'>
                  <img src='{$arr[$i]['img_front']}' width='100%'>
                </a>
                <div class='container'>
                    <p class='card-shoe-price'>\${$arr[$i]['price']}</p> 
                    <p class='card-shoe-name'>{$arr[$i]['name']}</p> 
                </div>
            </div>";
    }
?>