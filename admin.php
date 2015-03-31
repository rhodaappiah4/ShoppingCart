<?php
include("cart_functions.php");
$c=new cart_functions();
$category_name="";
if (isset($_REQUEST['category_name'])){
	$category_name=$_REQUEST['category_name'];
	$c->add_category($category_name);
}
$product_name="";
if (isset($_REQUEST['product_name'])){
	$product_name=$_REQUEST['product_name'];
}
$description="";
if (isset($_REQUEST['description'])){
	$description=$_REQUEST['description'];
}
$image="";
if (isset($_REQUEST['image'])){
	$image=$_REQUEST['image'];
}
$quantity=0;
if (isset($_REQUEST['quantity'])){
	$quantity=$_REQUEST['quantity'];
}
$color_name="";
if (isset($_REQUEST['color_name'])){
	$category_name=$_REQUEST['color_name'];
	$c->add_color($color_name);
}
$price=0.00;
if (isset($_REQUEST['price'])){
	$category_name=$_REQUEST['price'];
}
if(isset($_REQUEST['product'])){
	$c->add_product($product_name,$description,$image,$fk_category_id,$quantity,$fk_color_id,$price,$last_updated);
}
?>

<html>
	<form action="admin.php" method="GET">
		<h1>Add a New Product</h1>
		<div><br>Select Category: <select name="category"><br></div>
		<?php
		$c->get_category();
		$row = $c->fetch();
		if (!$row){
			echo "<option>--select--</option>";
		}
		else{
			while($row){
				echo "<option value='".$row['category_id']."'>" .$row['category_name']."</option>";
				$row = $c->fetch();
			}
		}
		?>
		</select>
		<b>If category doesn't exist, add here</b>
		Category: <input type="text" name="category_name">	
		<input type="submit" value="Add">
		<div><br>Name of Product: <input type="text" name="product_name"></br></div>
		<div><br>Description of Product: <input type="textarea" size=98 name="description"></br></div>
		<div><br>Click here to add image of product:
		<br><input type="file" name="image"></br></div>
		<div><br>Quantity: <input type="text" name="quantity"></br></div>
		<div><br>Select Color: <select name="color"><br></div>
		<?php
		$c->get_color();
		$row = $c->fetch();
		if (!$row){
			echo "<option>--select--</option>";
		}
		else{
			while($row){
				echo "<option value='".$row['color_id']."'>" .$row['color_name']."</option>";
				$row = $c->fetch();
			}
		}
		?>
		</select>
		<b>If color doesn't exist, add here</b>
		Category: <input type="text" name="color_name">	
		<input type="submit" value="Add">
		<div><br>Price: <input type="text" name="price"></br></div>
		<div><br><input type="submit" value="Add Product" name="product"></br></div>
	</form>

</html>

