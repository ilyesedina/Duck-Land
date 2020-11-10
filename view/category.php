<?php 
 
include_once 'login/header.php';

require_once("login/includes/DBController.php");
$db_handle = new DBController();
?>

<br>
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-3">
            <div class="card bg-light mb-3">
                <div class="card-header bg-success text-white text-uppercase">Discount</div>
                <div class="card-body">
                    <img class="img-fluid" src="https://dummyimage.com/600x400/55595c/fff" />
                    <h5 class="card-title">Product title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <p class="bloc_left_price">99.00 $</p>
                </div>
            </div>
        </div>
<div class="col">
<div class="row">
<div class="col-12 col-md-6 col-lg-4">

<?php
	$product_array = $db_handle->runQuery("SELECT * FROM product ORDER BY productID ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $aNumber=> $value){
    ?>

                    <div class="card">
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
                                <a href="editProduct.php?delete=true&productID=<?php echo $product_array[$aNumber]["productID"]; ?>" class="btn btn-success btn-block">Delete</a>
                                <?php } }
                         ?>
                        </div>
                    </form>
                    </div>
                </div></div></div>

                <?php
			}
	}
    ?>
    </div>
    </div>
    </div>
    </div>
    </div>

<?php
include_once 'login/footer.php';
?>
</body>
</html>


<div class="container">
    <div class="row">

        <div class="col">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card">
                        <img class="card-img-top" src="https://dummyimage.com/600x400/55595c/fff" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title"><a href="product.html" title="View Product">Product title</a></h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <div class="row">
                                <div class="col">
                                    <p class="btn btn-danger btn-block">99.00 $</p>
                                </div>
                                <div class="col">
                                    <a href="#" class="btn btn-success btn-block">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
