<?php
include_once 'login/header.php';
include ("login/includes/DBController.php");
$db_handle = new DBController();
?>
<body>
<?php
if (isset($_GET["delete"])) {
    $newsID = filter_var($_GET["delete"], FILTER_SANITIZE_NUMBER_INT);
    $deletenews = $db_handle->runQuery("DELETE FROM news WHERE newsID = $newsID");
    echo "<p class='alert alert-danger'>Article deleted!</p>" ;
}
    $product_array = $db_handle->runQuery("SELECT * FROM news ORDER BY newsID ASC");
    if (!empty($product_array)) { 
        foreach($product_array as $aNumber=> $value){ ?>
        <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h3><?php echo $product_array[$aNumber]["title"]; ?></h3>
            </div>
            <div class="card-body">
                <?php
                if ( $product_array[$aNumber]["image"] != NULL)  { ?>
                    <img class="card-img-top" src="img/<?php echo $product_array[$aNumber]["image"]; ?>" alt="Card image cap">
               <?php }?>
                <p class="card-text"><?php echo $product_array[$aNumber]["description"]; ?></p>
                <a href="index.php?delete=<?php echo $product_array[$aNumber]["newsID"]; ?>"><button class="btn btn-danger">DELETE</button></a>
                <a href="editNews.php?updatenews=<?php echo $product_array[$aNumber]["newsID"]; ?>"><button class="btn btn-success">EDIT</button></a>
            </div>
            
        </div>
        </div>
    <?php
            
        }
    }

    ?>
<?php
include_once 'login/footer.php';
?>


