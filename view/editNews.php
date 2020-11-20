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
            $editall = $edit->runQuery("SELECT * FROM news WHERE productID = $senetisedProductId");
            if (!empty($editall)) {
            ?>
            
        <?php
        require_once 'process.php'; ?> 
        <div class="container">
        <?php 
        $mysqli = new mysqli('mysql79.unoeuro.com', 'especialphoto_dk', 'ndwa4H69cD', 'especialphoto_dk_db', 3306) or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM news") or die($mysqli->error);
        //pre_r($result);
        ?>
        <div class="container">
            <div class="card mt-5">
            <div class="card-header">
                <h2>Edit <?php echo $editall[0]["pname"];?> news!</h2>
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
                        <label for="description">Description</label>
                        <textarea class="w-100 form-control" value="<?php echo $editall[0]["description"] ?>" rows="6" type="text"  id="description" name="description"></textarea>
                    </div>
                    <div class="form-group">
                    <button type="submit" name="updatenews" class="btn btn-info">Update a news</button>
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
                        <th>Description</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
        <?php
            while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['pname']; ?></td>
                    <td><?php echo $row['Image']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td>
                        <a href="editNews.php?NewsID=<?php echo $row['NewsID']; ?>"
                        class="btn btn-info">Edit</a>
                        <a href="editNews.php?delete=<?php echo $row['NewsID']; ?>"
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
                <h2>Create a news!</h2>
            </div>
            <div class="card-body">
                <form action="process.php" method="POST">
                    <div class="form-group">
                        <label for="pname">Name</label>
                        <input type="text" name="pname" id="pname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Image">Image</label>
                        <input type="text" name="Image" id="Image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="w-100 form-control" rows="6" type="text" id="description" name="description"></textarea>
                    </div>
                    <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-info">Create news</button>
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
