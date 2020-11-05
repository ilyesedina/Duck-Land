<?php 
 
include_once 'header.php';
require_once("login/includes/DBController.php");
$db_handle = new DBController();
?>

<br>
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-3">
            <div class="card bg-light mb-3">
                <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-list"></i> Categories</div>
                <ul class="list-group category_block">
                    <li class="list-group-item"><a href="category.html">Cras justo odio</a></li>
                    <li class="list-group-item"><a href="category.html">Dapibus ac facilisis in</a></li>
                    <li class="list-group-item"><a href="category.html">Morbi leo risus</a></li>
                    <li class="list-group-item"><a href="category.html">Porta ac consectetur ac</a></li>
                    <li class="list-group-item"><a href="category.html">Vestibulum at eros</a></li>
                </ul>
            </div>
            <div class="card bg-light mb-3">
                <div class="card-header bg-success text-white text-uppercase">Last product</div>
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

                        <img class="card-img-top" src="img/<?php echo $product_array[$aNumber]["Image"]; ?>" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title"><a href="product.php?id=<?php echo $product_array[$aNumber]["code"]; ?>" title="View Product"><?php echo $product_array[$aNumber]["pname"]; ?></a></h4>
                            
                            <div class="row">
                                <div class="col">
                                    <p class="btn btn-danger btn-block"><?php echo $product_array[$aNumber]["price"]." DKK"; ?></p>
                                </div>
                                <input type="text" name="quantity" value="1" size="2" />
                                <div class="col">
                                    <a href="#" class="btn btn-success btn-block">Add to cart</a>
                                                </form>
                                            </div>
                            </div>
                            </div>
                    </div>
                    </div>

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
