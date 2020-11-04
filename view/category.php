<?php 
 
include_once 'header.php';

session_start();
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

<!-- Footer -->
<footer class="text-light">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-lg-4 col-xl-3">
                <h5>About</h5>
                <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                <p class="mb-0">
                    Duck Land has over 800 creative designs and sizes many will reflects your mood, hobby and caracter and situation!
                </p>
            </div>

            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto">
                <h5>Informations</h5>
                <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                <ul class="list-unstyled">
                    <li><a href="">Link 1</a></li>
                    <li><a href="">Link 2</a></li>
                    <li><a href="">Link 3</a></li>
                    <li><a href="">Link 4</a></li>
                </ul>
            </div>

            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto">
                <h5>Others links</h5>
                <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                <ul class="list-unstyled">
                    <li><a href="">Link 1</a></li>
                    <li><a href="">Link 2</a></li>
                    <li><a href="">Link 3</a></li>
                    <li><a href="">Link 4</a></li>
                </ul>
            </div>

            <div class="col-md-4 col-lg-3 col-xl-3">
                <h5>Contact</h5>
                <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                <ul class="list-unstyled">
                    <li><i class="fa fa-home mr-2"></i>Duck Land</li>
                    <li><i class="fa fa-envelope mr-2"></i> info@duckland.com</li>
                    <li><i class="fa fa-phone mr-2"></i> + 45 50 14 15 16</li>
                    <li><i class="fa fa-print mr-2"></i> + 45 50 14 15 16</li>
                </ul>
            </div>
            <div class="col-12 copyright mt-3">
                <p class="float-left">
                    <a href="#">Back to top</a>
                </p>
                <p class="text-right text-muted">created with <i class="fa fa-heart"></i> by <a href="https://t-php.fr/43-theme-ecommerce-bootstrap-4.html"><i>PHP and MySQL</i></a> 
            </div>
        </div>
    </div>
</footer>

<!-- JS -->
<script src="//code.jquery.com/jquery-3.2.1.slim.min.js" type="text/javascript"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" type="text/javascript"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" type="text/javascript"></script>

</body>
</html>
