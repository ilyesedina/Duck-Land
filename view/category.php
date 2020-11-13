<?php 
 
include_once 'login/header.php';

require_once("login/includes/DBController.php");
$db_handle = new DBController();
?>



<?php
    $product_array = $db_handle->runQuery("SELECT * FROM product ORDER BY productID ASC");

	if (!empty($product_array)) { 
		foreach($product_array as $aNumber=> $value){
    ?>
                <div class="container">
                <div class="row">
                    <div class="card">
                    <div class="col-12 col-3">
                        
                    <form method="post" action="index.php?action=add&code=<?php echo $product_array[$aNumber]["code"]; ?>"> 
                        <div class="card-body">
                        <img class="card-img-top" src="img/<?php echo $product_array[$aNumber]["Image"]; ?>" alt="Card image cap">
                            <h4 class="card-title"><a href="product.php?id=<?php echo $product_array[$aNumber]["code"]; ?>" title="View Product"><?php echo $product_array[$aNumber]["pname"]; ?></a></h4>
                            <div class="row">
                                <div class="col">
                                    <p class="btn btn-danger btn-block"><?php echo $product_array[$aNumber]["price"]." DKK"; ?></p>
                                </div>
                                <input type="text" name="quantity" value="1" size="2" />
                                <div class="col">
                                </div>
                                </div>
                        <a href="#" class="btn btn-success btn-block">Add to cart</a>
                        <?php
                        if (isset($_SESSION['userid'])) { 
                            if ($_SESSION['userid'] == 3 || $_SESSION['userid'] ==1 ){ ?> 
                                <a href="editProduct.php?productID=<?php echo $product_array[$aNumber]["productID"]; ?>" class="btn btn-success btn-block">Edit</a>
                                <a href="editProduct.php?delete=true&productID=<?php echo $product_array[$aNumber]["productID"]; ?>" class="btn btn-danger btn-block">Delete</a>
                                <?php } }?>
                        </div>
                    </form>
                    </div></div>
                </div></div>

                <?php
			}
	}
    ?>

<?php
include_once 'login/footer.php';
?>
</body>
</html>