<?php
include_once 'login/header.php'; 
include ("login/includes/DBController.php");
require_once 'process.php';
$companycon = new DBController();
$editall = $companycon->runQuery("SELECT * FROM company JOIN postalcode ON company.postalCodee = postalcode.PostalCodeID");
if ($_SESSION['userid'] == 3 || $_SESSION['userid'] ==1 ){

    if (isset($_GET["message"])){ 
        switch($_GET['message']) {
            case "message3" : ?> 
            <div class="alert-success">New company detailed successfully updated to database</div>
            <?php
            break;
            case "message4" :  ?> 
                <div class="alert-success">Your email isn't valid!</div>
                <?php
                break;
            default: 
            echo 'hello there.';
        } 
     }


?>
    <div class="container">
    <div class="card mt-5">
    <div class="card-header">
        <h2>Edit Company information!</h2>
    </div>
    <div class="card-body">
        <form action="process.php" method="POST">
        <div class="form-group">
                <label for="CompanyName">Company Name</label>
                <input type="text" value="<?php echo $editall[0]["CompanyName"] ?>" name="CompanyName" id="CompanyName" class="form-control">
            </div>    
        <div class="form-group">
                <label for="dscription">Description</label>
                <input type="text" value="<?php echo $editall[0]["dscription"] ?>" name="dscription" id="dscription" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" value="<?php echo $editall[0]["email"] ?>" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="phoneNumber">Phone Number</label>
                <input type="number" value="<?php echo $editall[0]["phoneNumber"] ?>" name="phoneNumber" id="phoneNumber" class="form-control">
            </div>
            <div class="form-group">
                <label for="postalCodee">Postal Codee</label>
                <select id="postalCodee" value="<?php echo $postalCodee ?>" name="postalCodee"><?php
                $category = new DBController();
                $allcategorys = $category->runQuery("SELECT * FROM postalcode");
                if (!empty($allcategorys)) { 
                    foreach($allcategorys as $item){
                ?>
                <option value="<?php echo $item["PostalCodeID"] ?>"><?php echo $item["PostalCodeID"] . " - " . $item["city"]?></option>
                <?php
                   }} ?>
                    </select> 
                
            </div>
            <div class="form-group">
            <button type="submit" name="UpdateCopmpany" class="btn btn-info">Update company info</button>
        </div>
        </form>
    </div>
    </div>
</div> 







<?php
}
        
else {
    header("location: index.php");
}


include_once 'login/footer.php';