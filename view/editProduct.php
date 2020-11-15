<?php
include_once 'login/header.php'; 
include ("login/includes/DBController.php");
require_once 'process.php';
  
        if (isset($_GET["message"])){ 
        switch($_GET['message']) {
            case "message1" : ?> 
            <div class="alert-success">Item uploaded to database</div>
            <?php
            break;
            case "message2" :  ?> 
                <div class="alert-success">Item deleted from the database</div>
                <?php
        }  }


        if ($_SESSION['userid'] == 3 || $_SESSION['userid'] ==1 ){

        if (isset($_GET["productID"])) {
            $senetisedProductId = trim(intval($_GET["productID"]));
            $edit = new DBController();
            $editall = $edit->runQuery("SELECT * FROM product WHERE productID = $senetisedProductId");
            if (!empty($editall)) {
            ?>
            
        <?php
        require_once 'process.php'; ?> 
        <div class="container">
        <?php 
        $mysqli = new mysqli('mysql79.unoeuro.com', 'especialphoto_dk', 'ndwa4H69cD', 'especialphoto_dk_db', 3306) or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM product") or die($mysqli->error);
        //pre_r($result);
        ?>
        <div class="container">
            <div class="card mt-5">
            <div class="card-header">
                <h2>Edit <?php echo $editall[0]["pname"];?> product!</h2>
            </div>
            <div class="card-body">
                <form action="process.php?productID=<?php echo $_GET["productID"]; ?>" method="POST">
                    <div class="form-group">
                        <label for="pname">Product Name</label>
                        <input type="text" value="<?php echo $editall[0]["pname"] ?>" name="pname" id="pname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Image">Image</label>
                        <input type="text" value="<?php echo $editall[0]["Image"] ?>" name="Image" id="Image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inStock">In Stock</label>
                        <input type="number" value="<?php echo $editall[0]["inStock"] ?>" min="0" max="1" name="inStock" id="inStock" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="rating">Rating</label>
                        <input type="number" value="<?php echo $editall[0]["rating"] ?>" min="1" max="5" name="rating" id="rating" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" value="<?php echo $editall[0]["price"] ?>" min="0" max="9999" name="price" id="price" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="w-100 form-control" rows="6" type="text" id="description" name="description"><?php echo $editall[0]["description"] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select id="category" value="<?php echo $category ?>" name="category"><?php
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
        <br>

        <div class="row justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>In Stock</th>
                        <th>Rating</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
        <?php
            while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['pname']; ?></td>
                    <td><?php echo $row['Image']; ?></td>
                    <td><?php echo $row['inStock']; ?></td>
                    <td><?php echo $row['rating']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td>
                        <a href="editProduct.php?productID=<?php echo $row['productID']; ?>"
                        class="btn btn-info">Edit</a>
                        <a href="editProduct.php?delete=<?php echo $row['productID']; ?>"
                        class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
            </table>
        </div> </div>

        <?php 
        function pre_r( $array ) {
            echo '<pre>';
            print_r($array);
            echo '</pre>';
        }
        
        
        ?>
        
        
        <?php //   ?>

        <?php
        
            }
       }
       else {
        ?>
        <?php 
        $mysqli = new mysqli('mysql79.unoeuro.com', 'especialphoto_dk', 'ndwa4H69cD', 'especialphoto_dk_db', 3306) or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM product") or die($mysqli->error);
        //pre_r($result);
        //pre_r($result->fetch_assoc());

        function pre_r( $array ) {
            echo '<pre>';
            print_r($array);
            echo '</pre>';
        }
        ?>
        
        <div class="container">
            <div class="card mt-5">
            <div class="card-header">
                <h2>Create a product!</h2>
            </div>
            <div class="card-body">
                <form action="process.php" method="POST">
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
                        <input type="number" min="0" max="99999" name="price" id="price" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="w-100 form-control" rows="6" type="text" id="description" name="description"></textarea>
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
