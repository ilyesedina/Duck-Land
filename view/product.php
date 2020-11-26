<?php
include_once 'login/header.php';

require_once("login/includes/DBController.php");
$db_handle = new DBController();
if (isset($_GET["productID"])) {
    $senetisedProductId = trim(intval($_GET["productID"]));
    $edit = new DBController();
    $editall = $edit->runQuery("SELECT * FROM product JOIN category ON product.category = category.catID WHERE productID = $senetisedProductId");
    if (!empty($editall)) {
?>
<body>
<br> 
<div class="container">
    <div class="row">
        <!-- Image -->
        <div class="col-12 col-lg-6">
            <div class="card bg-light mb-3">
                <div class="card-body">
                    <a href="" data-toggle="modal" data-target="#productModal">
                        <img class="img-fluid" src="img/<?php echo $editall[0]["Image"]?>" alt="Card image cap">
                        <p class="text-center">Zoom</p>
                    </a>
                </div>
            </div>
        </div>

        <!-- Add to cart -->
        <div class="col-12 col-lg-6 add_to_cart_block">
            <div class="card bg-light mb-3">
                <div class="card-body">
                <p class="price"><?php echo $editall[0]["pname"];?></p>
                <p><?php echo $editall[0]["categoryName"];?></p>
                    <h1><?php //echo $product_id?></h1>
                    
                    <p class="price"><?php echo $editall[0]["price"] ?>dkk</p>
                 <!--   <p class="price_discounted">149.90 $</p> -->
                    <form method="get" action="cart.php">
                        <div class="form-group">
                            <label>Quantity :</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control"  id="quantity" name="quantity" min="1" max="10000" value="1">
                                <div class="input-group-append">
                                    <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <a href="cart.php" class="btn btn-success btn-lg btn-block text-uppercase">
                            <i class="fa fa-shopping-cart"></i> Add To Cart
                        </a>
                    </form>
                    <div class="reviews_product p-3 mb-2 ">
                        Rating 
                        <?php
                        for ($x = 0; $x <= $editall[0]["rating"]; $x++) { ?>
                             <i class="fa fa-star"></i>
                              <?php
                          }
                         ?>
                        <a class="pull-right" href="#reviews">View all reviews</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Description -->
        <div class="col-12">
            <div class="card border-light mb-3">
                <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-align-justify"></i> Description</div>
                <div class="card-body">
                <?php 
                $messagedescript = "Dosen't have a description of this product.";
                
                if (isset($editall[0]["description"])) {
                echo $editall[0]["description"];
                }
                else {
                   echo $messagedescript ;
                }
                ?>
                </div>
            </div>
        </div>
        <?php 
        //include 'reviews.php';
        ?>
</div>


<?php
include_once 'login/footer.php';
?>


<!-- Modal image -->
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">Product title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img class="img-fluid" src="https://dummyimage.com/1200x1200/55595c/fff" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- JS -->
<script src="//code.jquery.com/jquery-3.2.1.slim.min.js" type="text/javascript"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" type="text/javascript"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript">
    //Plus & Minus for Quantity product
    $(document).ready(function(){
        var quantity = 1;

        $('.quantity-right-plus').click(function(e){
            e.preventDefault();
            var quantity = parseInt($('#quantity').val());
            $('#quantity').val(quantity + 1);
        });

        $('.quantity-left-minus').click(function(e){
            e.preventDefault();
            var quantity = parseInt($('#quantity').val());
            if(quantity > 1){
                $('#quantity').val(quantity - 1);
            }
        });

    });
</script>
</body>
</html>
<?php  
    }
    else {
    header('location: category.php');
} 
}
else {
    header('location: category.php');
}
    ?> 
<body>