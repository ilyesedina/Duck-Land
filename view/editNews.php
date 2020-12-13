<?php 
include ("login/includes/DBController.php");
require_once 'process.php';
include_once 'login/header.php';

  
        if (isset($_GET["message"])){ 
        switch($_GET['message']) {
            case "message1" : ?> 
            <div class="alert-success">Item uploaded to database</div>
            <?php
            break;
            case "message2" :  ?> 
                <div class="alert-success">Item deleted from the database</div>
                <?php
             break;
             case "message3" :  ?> 
                 <div class="alert-success">Faild!</div>
                 <?php
        }  }


        if ($_SESSION['userid'] == 3 || $_SESSION['userid'] ==1 ){
            
            if (isset($_GET["deletennews"])) {
                $db_handle = new DBController();
                $newsID = filter_var($_GET["deletennews"], FILTER_SANITIZE_NUMBER_INT);
                $deletenews = $db_handle->runQuery("DELETE FROM news WHERE newsID = $newsID");
                echo "<p class='alert alert-danger'>Article deleted!</p>" ;
            }  
        if (isset($_GET["updatenews"])) {
            $senetisedProductId = trim(intval($_GET["updatenews"]));
            $edit = new DBController();
            $editall = $edit->runQuery("SELECT * FROM news WHERE newsID = $senetisedProductId");
            if (!empty($editall)) {
            ?>            
        <div class="container">
        <?php 
        $mysqli = new mysqli('mysql79.unoeuro.com', 'especialphoto_dk', 'ndwa4H69cD', 'especialphoto_dk_db', 3306) or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM news") or die($mysqli->error);
        ?>
        <div class="container">
            <div class="card mt-5">
            <div class="card-header">
                <h2>Edit <b><?php echo $title ;?></b> news!</h2>
            </div>
            <div class="card-body">
                <form action="editNews.php?updatenews=<?php echo $newsID; ?>" method="POST">
                    <div class="form-group">
                        <label for="title">Tilte</label>
                        <input type="text" value="<?php echo $title ?>" name="title" id="title" class="form-control">
                    </div> 
                    <div class="form-group">
                        <label for="Image">Image</label>
                        <input type="text" value="<?php echo $image ?>" name="image" id="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="w-100 form-control" rows="6" type="text"  id="description" name="description"><?php echo $description ?></textarea>
                    </div>
                    <div class="form-group"> 
                    <button type="submit" name="updatenewsall" class="btn btn-info">Update a news</button>
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
                        <th>Title</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
        <?php
            while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['image']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td>
                        <a href="editNews.php?updatenews=<?php echo $row['newsID']; ?>"
                        class="btn btn-info">Edit</a>
                        
                        <a href="editNews.php?deletennews=<?php echo $row['newsID']; ?>"
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

        <?php
        
            }
       }
       else {
        ?>
        <?php 
        $mysqli = new mysqli('mysql79.unoeuro.com', 'especialphoto_dk', 'ndwa4H69cD', 'especialphoto_dk_db', 3306) or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM news") or die($mysqli->error);
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
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="image">image</label>
                        <input type="text" name="image" id="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="w-100 form-control" rows="6" type="text" id="description" name="description"></textarea>
                    </div>
                    <div class="form-group">
                    <button type="submit" name="submitnews" class="btn btn-info">Create news</button>
                </div>
                </form>
            </div>
            </div> 
            <br>
        <div class="row justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
        <?php
            while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['image']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td>
                        <a href="editNews.php?updatenews=<?php echo $row['newsID']; ?>"
                        class="btn btn-info">Edit</a>
                        
                        <a href="editNews.php?deletennews=<?php echo $row['newsID']; ?>"
                        class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
            </table>
        </div>
        </div>
        
        <?php
       }
    
    }
        
else {
    header("location: index.php");
}


include_once 'login/footer.php';
