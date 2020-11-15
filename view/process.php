<?php
$mysqli = new mysqli('mysql79.unoeuro.com', 'especialphoto_dk', 'ndwa4H69cD', 'especialphoto_dk_db', 3306) or die(mysqli_error($mysqli));
$update = false;
$pname = '';
$Image = '';
$inStock = '';
$rating = '';
$price = '';
$description = '';
$category = '';

if (isset($_POST['update'])) {
    if (isset($_POST['pname']) && isset($_POST['Image']) 
    && isset($_POST['inStock']) && isset($_POST['rating'])
    && isset($_POST['price']) && isset($_POST['category']) ){
        $pname = filter_var($_POST['pname'], FILTER_SANITIZE_SPECIAL_CHARS);
        $Image = filter_var($_POST['Image'], FILTER_SANITIZE_STRING);
        $inStock = $_POST['inStock'];
        $rating = ($_POST['rating']);
        $price = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_FLOAT);
        $description = filter_var($_POST['description'], FILTER_SANITIZE_SPECIAL_CHARS);
        $category = $_POST['category'];
        $curentproduct = filter_var($_GET["productID"], );
        $mysqli->query("UPDATE product SET pname = '$pname', Image = '$Image', inStock = $inStock, rating = $rating, price = $price, description = $description, category = $category WHERE productID = $curentproduct") or die($mysqli->error);
        header("location: editProduct.php?message=message1&productID=$curentproduct");
    }
}

if (isset($_POST['submit'])) {     
    echo "POSTSENTS"; 
    if (isset($_POST['pname']) && isset($_POST['Image']) 
    && isset($_POST['inStock']) && isset($_POST['rating'])
    && isset($_POST['price']) && isset($_POST['category']) ){
        //echo 'submited';
        $pname = filter_var($_POST['pname'], FILTER_SANITIZE_SPECIAL_CHARS);
        $Image = filter_var($_POST['Image'], FILTER_SANITIZE_STRING);
        $inStock = $_POST['inStock'];
        $rating = ($_POST['rating']);
        $price = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_FLOAT);
        $description = filter_var($_POST['description'], FILTER_SANITIZE_SPECIAL_CHARS);
        $category = $_POST['category'];
        $mysqli->query("INSERT INTO product (pname, Image, inStock, rating, price, description, category) VALUES('$pname', '$Image', '$inStock', '$rating', '$price', '$description', '$category')") or die($mysqli->error);
        
        header("location: editProduct.php?message=message1");
}}
if (isset($_POST['UpdateCopmpany'])) {
    if (isset($_POST['CompanyName']) && isset($_POST['dscription']) 
    && isset($_POST['email']) && isset($_POST['phoneNumber'])
    && isset($_POST['postalCodee']) ){
        if (filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
        $CompanyName = filter_var($_POST['CompanyName'], FILTER_SANITIZE_SPECIAL_CHARS);
        $description = filter_var($_POST['dscription'], FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $phoneNumber = filter_var($_POST['phoneNumber'], FILTER_SANITIZE_STRING);
        $postalCodee = filter_var($_POST['postalCodee'], FILTER_SANITIZE_STRING);
        $mysqli->query("UPDATE company SET CompanyName = '$CompanyName', dscription = '$description', email = '$email', phoneNumber = '$phoneNumber', postalCodee = $postalCodee WHERE cid = 1") or die($mysqli->error);
        header("location: companyinfo.php?message=message3");
    }
    else {
        header("location: companyinfo.php?message=message4");
    }
    }
    else{
        header("location: index.php?message=message4");
    }
}

if (isset($_GET['delete'])) {
    $productID = filter_var($_GET['delete'], FILTER_SANITIZE_NUMBER_INT);
    $mysqli->query("DELETE FROM product WHERE productID = $productID") or die($mysqli->error);
    header("location: editProduct.php?message=message2");
}

if (isset($_GET['edit'])) {
    $productID = filter_var($_GET['edit'], FILTER_SANITIZE_NUMBER_INT);
    $update = true;
    $result = $mysqli->query("SELECT * FROM product WHERE productID = $productID") 
    or die($mysqli->error);
    if ($result->num_rows == 1){
        $row = $result->fetch_array();
        $pname = $row['pname'];
        $Image = $row['Image'];
        $inStock = $row['inStock'];
        $rating = $row['rating'];
        $price = $row['price'];
        $description = $row['description'];
        $category = $row['category'];
    }
}