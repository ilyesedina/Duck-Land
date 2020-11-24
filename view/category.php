<?php 
include_once 'login/header.php';
require_once("login/includes/DBController.php");
$db_handle = new DBController();
?>

<?php
//for cart 
if(!(isset($_SESSION['cart']))) {
    $_SESSION['cart'];
}//if cart not exist 
$out = "";
//buy
if(isset($_GET['productID'])) {
    $productID = $_GET['productID'];
    $quantity = $_POST['quantity'];

    if($quantity > 0 && filter_var($quantity, FILTER_VALIDATE_INT)) {
       if(isset($_SESSION['cart'][$productID])) {
        $_SESSION['cart'][$productID] += $quantity;
       } else {
        $_SESSION['cart'][$productID] = $quantity;
       }
    } else {
        //if bad input
        $out = "Bad Input";

    }
}



echo $out;
?>

<div class="container mt-4" >
                <div class="row">
                    
<?php
    $product_array = $db_handle->runQuery("SELECT * FROM product ORDER BY productID ASC");

	if (!empty($product_array)) { 
		foreach($product_array as $aNumber=> $value){
    ?>
                   
                    <div class="col-4 mb-4">
                    <div class="card">
                    <form method="POST" action="category.php?action=add&productID=<?php echo $product_array[$aNumber]["productID"]; ?>"> 
                        <div class="card-body">
                        <img class="card-img-top" src="img/<?php echo $product_array[$aNumber]["Image"]; ?>" alt="Card image cap">
                            <h4 class="card-title"><a href="product.php?productID=<?php echo $product_array[$aNumber]["productID"]; ?>" title="View Product"><?php echo $product_array[$aNumber]["pname"]; ?></a></h4>
                            <div class="row">
                                <div class="col">
                                    <p class="btn btn-success btn-block"><?php echo $product_array[$aNumber]["price"]." DKK"; ?></p>
                                </div>
                                <div class="col">
                                    <?php
                                    if($product_array[$aNumber]["inStock"] == 1) {
                                      echo "<p>In Stock</p>";
                                    }
                                    else{
                                        echo "<p>Out of Stock</p>";
                                    }
                                    ?>
                                </div> </div>
        
                               <?php
                               if (isset($_SESSION['userid'])){
                                if($product_array[$aNumber]["inStock"] == 1) { ?>
                                
                                <div class="row"> 
                                <label for="quantity">Product quantity</label>
                                <input type="number" name="quantity" >
                                </div> 
                              <?php }}
                              ?>
                                
                                <div class="col">
                                
                               <?php 
                               if (isset($_SESSION['userid'])){
                               if($product_array[$aNumber]["inStock"] == 1) { ?> <br>
                                  <button type="submit" name="update" class="btn btn-info">Add to cart</button>
                            <?php }}
                            else {
                                echo "Login for shop items!";
                            } ?>
                            </div> <br>  <?php
                        if (isset($_SESSION['userid'])) { 
                            if ($_SESSION['userid'] == 3 || $_SESSION['userid'] ==1 ){ ?> 
                                <a href="editProduct.php?productID=<?php echo $product_array[$aNumber]["productID"]; ?>" class="btn btn-success btn-block">Edit</a>
                                <a href="editProduct.php?delete=<?php echo $product_array[$aNumber]["productID"]; ?>" class="btn btn-danger btn-block">Delete</a>
                                <?php } }?>
                        </div>
                    </form>
                    </div></div>

                <?php
			}
	}
    ?>
</div></div>
<?php
include_once 'login/footer.php';
?>
</body>
</html>