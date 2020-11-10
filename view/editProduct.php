<?php
include_once 'login/header.php';
include ("login/includes/DBController.php");
    if ($_SESSION['userid'] == 3 || $_SESSION['userid'] ==1 ){ 
       if (isset($_GET["productID"])) {
            $senetisedProductId = trim(intval($_GET["productID"]));
            $edit = new DBController();
            $editall = $edit->runQuery("SELECT * FROM product WHERE productID = $senetisedProductId");
            if (!empty($editall)) {
            ?>
        <?php
        //require 'db.php';
        if (isset($_POST['update'])) {
            if (isset($_POST['pname']) && isset($_POST['Image']) 
            && isset($_POST['inStock']) && isset($_POST['rating'])
            && isset($_POST['price']) && isset($_POST['category']) ){
                //echo 'submited';
                $pname = $_POST['pname'];
                $Image = $_POST['Image'];
                $inStock = $_POST['inStock'];
                $rating = $_POST['rating'];
                $price = $_POST['price'];
                $category = $_POST['category'];
                $sql = 'INSERT INTO Product(pname, Image, inStock, rating, price, category) 
                VALUES(:pname, :Image, :inStock, :rating, :price, :category)';
                $statement = $connection->prepeare($sql);
                $statement->execute([':pname' => $pname, ':Image' => $Image, ':inStock' => $inStock, 
                ':rating' => $rating, ':price' => $price, ':category' => $category]);
            }
        }
        ?>
        
        <div class="container">
            <div class="card mt-5">
            <div class="card-header">
                <h2>Edit <?php echo $editall[0]["pname"];?> product!</h2>
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="form-group">
                        <label for="pname">Product Name</label>
                        <input type="text" value="<?php echo $editall[0]["pname"];?>" name="pname" id="pname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Image">Image</label>
                        <input type="text" value="<?php echo $editall[0]["Image"];?>" name="Image" id="Image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inStock">In Stock</label>
                        <input type="number" value="<?php echo $editall[0]["inStock"];?>" min="0" max="1" name="inStock" id="inStock" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="rating">Rating</label>
                        <input type="number" value="<?php echo $editall[0]["rating"];?>" min="1" max="5" name="rating" id="rating" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" value="<?php echo $editall[0]["price"];?>" min="0" max="9999" name="price" id="price" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select id="category" name="category"><?php
                        $category = new DBController();
                        $allcategorys = $category->runQuery("SELECT * FROM category");
                        if (!empty($allcategorys)) { 
                            foreach($allcategorys as $item){
                        ?>
                        <option value="<?php echo $item["catID"] ?>"><?php echo $item["catID"] . $item["categoryName"]?></option>
                        <?php
                           }} ?>
                            </select> 
                        
                    </div>
                    <div class="form-group">
                    <button type="submit" name="update" class="btn btn-info">Update a product</button>
                </div>
                </form>
            </div>
            </div>
        </div>
        <?php
            }
       }
       else {
        ?>
        <?php
        //require 'db.php';
        if (isset($_POST['submit'])) {     
            echo "POSTSENTS"; 
            if (isset($_POST['pname']) && isset($_POST['Image']) 
            && isset($_POST['inStock']) && isset($_POST['rating'])
            && isset($_POST['price']) && isset($_POST['category']) ){
                //echo 'submited';
                $pname = $_POST['pname'];
                $Image = $_POST['Image'];
                $inStock = $_POST['inStock'];
                $rating = $_POST['rating'];
                $price = $_POST['price'];
                $category = $_POST['category'];
                $sql = 'INSERT INTO Product(pname, Image, inStock, rating, price, category) 
                VALUES(:pname, :Image, :inStock, :rating, :price, :category)';
                $statement = $connection->prepeare($sql);
                $statement->execute([':pname' => $pname, ':Image' => $Image, ':inStock' => $inStock, 
                ':rating' => $rating, ':price' => $price, ':category' => $category,]);
        }}
        ?>
        
        <div class="container">
            <div class="card mt-5">
            <div class="card-header">
                <h2>Create a product!</h2>
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="form-group">
                        <label for="pname">Product Name</label>
                        <input type="text" name="pname" id="pname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Image">Image</label>
                        <input type="text" name="Image" id="Image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inStock">In Stock</label>
                        <input type="number" min="0" max="1" name="inStock" id="inStock" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="rating">Rating</label>
                        <input type="number" min="1" max="5" name="rating" id="rating" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" min="0.1" name="price" id="price" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select id="category" name="category"><?php
                        $category = new DBController();
                        $allcategorys = $category->runQuery("SELECT * FROM category");
                        if (!empty($allcategorys)) { 
                            foreach($allcategorys as $item){
                        ?>
                        <option value="<?php echo $item["catID"] ?>"><?php echo $item["catID"] . $item["categoryName"]?></option>
                        <?php
                           }} ?>
                            </select> 
                        
                    </div>
                    <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-info">Create a product</button>
                </div>
                </form>
            </div>
            </div>
        </div>
        <?php
       }
    
    }
        
else {
    header("location: index.php");
}


include_once 'login/footer.php';
