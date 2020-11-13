<?php
$mysqli = new mysqli('localhost', 'root', '', 'duckshopdb') or die(mysqli_error($mysqli));
$update = false;
$pname = '';
$Image = '';
$inStock = '';
$rating = '';
$price = '';
$category = '';

if (isset($_POST['update'])) {
    if (isset($_POST['pname']) && isset($_POST['Image']) 
    && isset($_POST['inStock']) && isset($_POST['rating'])
    && isset($_POST['price']) && isset($_POST['category']) ){
        $pname = $_POST['pname'];
        $Image = $_POST['Image'];
        $inStock = $_POST['inStock'];
        $rating = $_POST['rating'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $curentproduct = $_GET["productID"];
        $mysqli->query("UPDATE product SET pname = '$pname', Image = '$Image', inStock = $inStock, rating = $rating, price = $price, category = $category WHERE productID = $curentproduct") or die($mysqli->error);
        header("location: editProduct.php?message=message1&productID=$curentproduct");
    }
}

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
        $mysqli->query("INSERT INTO product (pname, Image, inStock, rating, price, category) VALUES('$pname', '$Image', '$inStock', '$rating', '$price', '$category')") or die($mysqli->error);
        
        header("location: editProduct.php?message=message1");
}}

if (isset($_GET['delete'])) {
    $productID = $_GET['delete'];
    $mysqli->query("DELETE FROM product WHERE productID = $productID") or die($mysqli->error);
    header("location: editProduct.php?message=message2");
}

if (isset($_GET['edit'])) {
    $productID = $_GET['edit'];
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
        $category = $row['category'];
    }
}