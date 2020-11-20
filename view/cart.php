<?php
include_once 'login/header.php';
require_once 'login/includes/DBController.php';
$shoppingcart = New DBController();

//for cart 
if(!(isset($_SESSION['cart']))) {
    $_SESSION['cart'] = array();
}//if cart not exist 

if(isset($_GET['clear'])) {
    $_SESSION['cart'] = array();
}//clear cart

if(isset($_GET['delete'])) {
    $delete1 = $_GET['delete'];
   unset($_SESSION['cart'][$delete1]);
}

?>

<body>


<section >
    <div class="container">
        <h4 class="jumbotron-heading">Your Shopping Card</h4>
     </div>
</section>

<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Item</th>
                            <th scope="col" class="text-right">Price</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col">Subtotal</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $grand = 0;
                        
                        foreach($_SESSION['cart'] as $key => $val) {
                            $sql = "SELECT * FROM product WHERE productID = '$key'";
                            $product = $shoppingcart->runQuery($sql);
                            $sub = $val*$product[0]['price'];
                            $grand += $sub;
                            echo "  
                            <tr> 
                                <td>{$product[0]['pname']}</td>
                                <td>{$product[0]['price']}</td>
                                <td>$val</td>
                                <td>$sub dkk</td>
                                <td  class='text-right'>
                                <a href='cart.php?delete={$product[0]['productID']}'><button class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> </button></a>
                                 </td>
                            </tr> 
                            ";
                        }

                        If(empty($_SESSION['cart'])) {
                            echo "<tr><td colspan='4'>Your cart is empty!</td></tr>";
                        } else {
                            echo "<tr><td colspan='4'>Grand Total: $grand</td></tr>";
                        }
                        
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <button class="btn btn-block btn-light">Continue Shopping</button>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                    <button class="btn btn-lg btn-block btn-success text-uppercase">Checkout</button>
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
