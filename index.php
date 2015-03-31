<html>
<head>
    <link rel="stylesheet" href="css/foundation.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="jquery-1.11.0.js" type="text/javascript"></script>
    <script src="foundation.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="app.js"></script>
    <title>Shopping</title>
</head>
<body>
<nav>
    <ul>
        <li><strong><a href="./">Shopping.com</a></strong></li>

        <li><a href="./#">All items</a></li>
        <li id="shoes"><a href="?cat=3#shoes">Shoes</a></li>
        <li id="earring"><a href="?cat=2#earring">Earrings</a></li>
        <li id="necklace"><a href="?cat=1#necklace">Necklaces</a></li>
        <li id="bracelet"><a href="?cat=4#bracelet">Bracelet</a></li>
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
        <div class="icon-cart">
            <span class="item_count"></span>
        </div>
        <div class="items">
            <div class="current_total">
                <span>Total: GHC</span>
                <span class="cost">0</span>
            </div>
            <ul>

            </ul>
            <div class='button check_out'>Checkout</div>
        </div>

    </div>

    <div class="row">
    <?php require 'cart_functions.php';
    $num_records_per_page=2;
    $start=0;
    $page="";
    $page=$_REQUEST['page'];
    if ($page="" || $page=="1"){
        $start=0;
    }
    else{
        $start=($page*2)-2;
    }

    $cart = new cart_functions();
    if(isset($_REQUEST['cat'])) {
        $v = $cart->get_products_inCategory($_REQUEST['cat']);
    }else if(isset($_REQUEST['search'])){
        $cart->search($_REQUEST['search']);
    }else if(isset($_REQUEST['page'])){
        $v=$cart->get_product($start,$num_records_per_page);
    }



    while($row = $cart->fetch()){

        $count = get_num_rows();

        $a=ceil($count/$num_records_per_page);

        for($b=1;$b<$a;$b++){
            echo "<a href='index.php?page='.$b></a>";
            echo $b;
        }
        ?>

        <div class="columns small-4" >
            <div class="item">
                <span class="itemId" style="display: none"><?php echo $row['product_id'] ?></span>
                <img data-reveal-id="details" src="<?php echo $row['imagelocation'] ?>" >
                <span data-reveal-id="details" class="product caption"><?php echo $row['product_name'] ?></span>
                <span class="add" onclick="addtoCart(this)">Add to cart</span>
                <span  data-reveal-id="details" class="price caption"><?php echo 'GHC '.$row['price'] ?></span>
            </div>
            <button id="load" value="Load more">
        </div>
    <?php
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
            <input class="button" type="submit" value="Add to cart" onclick="addtoCart(this)">
            <a class="close-reveal-modal">&times;</a>
        </div>
    </div>
</div>

<!--<div id="login" class="reveal-modal small" data-reveal>-->
<!--    <div class="row">-->
<!--        <div class="small-6 columns">-->
<!--            <div class="username">Username<input type="text"></div><br>-->
<!--            <input class="button" type="submit" value="Login">-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<script>
    $(document).foundation();
</script>
</body>
</html>