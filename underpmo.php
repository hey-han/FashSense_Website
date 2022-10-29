<?php
session_start();
if (isset($_GET['id'])) {
    $subjectId  = $_GET['id'];

    @$db = new mysqli('localhost', 'root', '', 'proj');
    if (mysqli_connect_errno()) {
        echo 'Error: Could not connect to database.  Please try again later.';
        exit;
    }
    $query = "SELECT * FROM products WHERE productid = $subjectId";
    $result = $db->query($query);
    $row = $result->fetch_assoc();

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    if (isset($_POST['quantity'])) {
        $_SESSION['cart'][] = ['productid' => $subjectId, 'shoe_img' => $row['img_front'], 'name' => $row['name'], 'size' => $_POST['clothessize'], 'price' => $row['price'], 'quantity' => $_POST['quantity']];
    }
} else {
    echo "provide Id";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="styles.css">
    <title>Fashsense</title>
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

        <div class="productpage-row">
            <div class="productpage-column-left">
                <!-- Container for the image gallery -->
                <div class="productPage-slidegallery-container">
                    <!-- Full-width images with number text -->
                    <div class="mySlides">
                        <div class="numbertext">1 / 5</div>
                        <img src="<?php echo $row['img_front'] ?>" style="width: 100% " />
                    </div>

                    <div class="mySlides">
                        <div class="numbertext">2 / 5</div>
                        <img src="<?php echo $row['img_side1'] ?>" style="width: 100%" />
                    </div>

                    <div class="mySlides">
                        <div class="numbertext">3 / 5</div>
                        <img src="<?php echo $row['img_side2'] ?>" style="width: 100%" />
                    </div>

                    <div class="mySlides">
                        <div class="numbertext">4 / 5</div>
                        <img src="<?php echo $row['img_top'] ?>" style="width: 100%" />
                    </div>

                    <div class="mySlides">
                        <div class="numbertext">5 / 5</div>
                        <img src="<?php echo $row['img_bottom'] ?>" style="width: 100%" />
                    </div>

                    <!-- Next and previous buttons -->
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>

                    <!-- Thumbnail images -->
                    <div class="row">
                        <div class="column">
                            <img class="demo cursor" src="<?php echo $row['img_front'] ?>" style="width: 100%" onclick="currentSlide(1)" />
                        </div>
                        <div class="column">
                            <img class="demo cursor" src="<?php echo $row['img_side1'] ?>" style="width: 100%" onclick="currentSlide(2)" />
                        </div>
                        <div class="column">
                            <img class="demo cursor" src="<?php echo $row['img_side2'] ?>" style="width: 100%" onclick="currentSlide(3)" />
                        </div>
                        <div class="column">
                            <img class="demo cursor" src="<?php echo $row['img_top'] ?>" style="width: 100%" onclick="currentSlide(4)" />
                        </div>
                        <div class="column">
                            <img class="demo cursor" src="<?php echo $row['img_bottom'] ?>" style="width: 100%" onclick="currentSlide(5)" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="productpage-column-right">
                <h4 class="product-title"><?php echo $row['name'] ?></h4>
                <p class="product-description"><?php echo $row['description'] ?><br></p>
                <span class="product-price">S$<?php echo $row['price'] ?></span><br /><br />
                <span class="product-size">Size</span><br /><br />
                <form action="underpmo.php?id=<?php echo $subjectId ?>" method="POST">
                    <div class="buttongroup">
                        <?php
                        $sizes = explode(",", $row['clothessize']);
                        for ($i = 0; $i < count($sizes); $i++) {
                            echo "<input id='$sizes[$i]' type='radio' value='$sizes[$i]' name='size' checked/>
                            <label for='$sizes[$i]'>$sizes[$i]</label>";
                        }
                        ?>
                    </div>
                    <br /><br />
                    <span class="product-size">Quantity</span><br />
                    <div class="quantity buttons_added">
                        <input type="number" id='qty_id' name="quantity" step="1" min="0" value="1" title="Qty" size="3" onchange="validateQty()">
                    </div>
                    <br /><br />
                    <input type="submit" id="addToCartBtn" value="Add to Cart">
                </form>
                <p class="product-description">
                <h2>DNA</h2><?php echo $row['DNA'] ?><br></p>
            </div>
        </div>
        <script type="text/javascript" src="script/java script/productPageSlideGallery.js"></script>
        <footer>Copyright &copy; 2022 Fashsense<br>
        <a href="mailto: fashsense@gmail.com">Contact Us</a>
    </footer>
</body>

</html>