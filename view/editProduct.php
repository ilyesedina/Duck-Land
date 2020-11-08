<?php
include_once 'login/header.php';
    if ($_SESSION['userid'] == 3 || $_SESSION['userid'] ==1 ){ ?> 
        <li class="nav-item"> <a class="nav-link" href="editProduct.php">Edit</a></li>
        <?php
    }
else {
    header("location: index.php");
}
?>











<?php
include_once 'login/footer.php';
?>
