<?php
session_start();
?>
<html>
<head>
    <link rel="stylesheet" href="css/foundation.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="jquery-1.11.0.js" type="text/javascript"></script>
    <script src="foundation.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="app.js"></script>
    <title>View Order Page</title>
</head>
<body>
<nav>
    <ul>
        <li><strong><a href="./">Shopping.com</a></strong></li>

        <li><a href="./#">Your shopping cart</a></li>
    </ul>
    <form class="right search" action="index.php">
        <label><input type="text" name="search" placeholder="Search..."><i class="icon-search"></i></label>
    </form>

</nav>
<header>
    <div>
        <img src="./img/BANNERA.jpg">
    </div>
</header>

<main>

    <div id="cart">
        <div>
            <input class="button" type="submit" value="Buy all items" onclick="buy(this)">
        </div>
    </div>


    <div class="row">
    <?php
    require_once ("cart_functions.php");

    $cart_data = $_SESSION['cart_data'];//TODO: used the session instead of REQUEST; store that in the login.
    $cart_decoded = json_decode($cart_data);
    $i=0;
    while($i < count($cart_decoded) ) {
        $cart = new cart_functions();
        $cart->get_product_by_id($cart_decoded[$i]->pid);
        if ($row = $cart->fetch()) {
            ?>

            <div class="columns small-4 ">
                <div class="item cart-item">
                    <span class="itemId" style="display: none"><?php echo $row['product_id'] ?></span>
                    <img data-reveal-id="details" src="<?php echo $row['imagelocation'] ?>">
                    <span data-reveal-id="details" class="product caption"><?php echo $row['product_name'] ?></span>
                    <span class="remove" onclick="removefromCart(this)">Remove from cart</span>
                    <span data-reveal-id="details" class="price caption"><?php echo 'GHC ' . $row['price'] ?></span>
                    <span data-reveal-id="qty" class="qty caption"><?php echo $cart_decoded[$i]->qty ?></span>
                </div>
            </div>

        <?php
        }
        $i++;
    }
    ?>
</div>

</main>
<footer></footer>

<div id="details" class="reveal-modal small" data-reveal>
    <div class="row">
        <div class="small-6 columns">
            <div id="imageHolder">
                <img src="img/accessory1.jpeg"/>
            </div>
        </div>
        <div class="small-6 columns">
            <div class="product_id" style="display: none"></div>
            <div class="product_name"></div><br>
            <div class="description"></div><br>
            <div class="category_name"></div><br>
            <div class="quantity"></div><br>
            <div class="color_name"></div><br>
            <div class="price"></div><br>
<!--            <input class="button" type="submit" value="Buy" onclick="addtoCart(this)">-->
            <a class="close-reveal-modal">&times;</a>
        </div>
    </div>
</div>

<script>
    $(document).foundation();
</script>
</body>
</html>