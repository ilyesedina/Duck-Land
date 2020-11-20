<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Site meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- CSS -->
    <<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600" rel="stylesheet" type="text/css"> 
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/nvendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/css/util.css">
	<link rel="stylesheet" type="text/css" href="login/css/main.css">
	<link rel="stylesheet" type="text/css" href="login/css/reset.css">
</head>


<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div >
        <a class="navbar-brand" href="index.php">Duck Land</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">
            <ul class="navbar-nav m-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="category.php">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
            
                <?php 
                    if (isset($_SESSION['userid'])) { ?> 
                        <?php 
                        if ($_SESSION['userid'] == 3 || $_SESSION['userid'] == 1){ ?> 
                            <li class="nav-item"> <a class="nav-link" href="editProduct.php">Create Products</a></li>
                            <li class="nav-item"> <a class="nav-link" href="editNews.php">Create News</a></li>
                            <li class="nav-item"> <a class="nav-link" href="companyinfo.php">Edit Company</a></li>
                            <?php
                        } ?>
                        <li class="nav-item"> <a class="nav-link" href="login.php?logout=true">Log out</a></li>
                        <?php
                        }
                    else {
                        echo '<li class="nav-item"> <a class="nav-link" href="signUp.php">Sign Up</a></li>';
                    }
                ?>
				<form class="form-inline my-2 my-lg-0">
                <div class="input-group input-group-sm">
                    
                    </div>
                </div>
                <a class="btn btn-success btn-sm ml-3" href="cart.php">
                    <i class="fa fa-shopping-cart"></i>Cart
                    <span class="badge badge-light"><?php echo count($_SESSION['cart']) ?></span>
                </a>
            </form>

        </div>
    </div>
</nav>
<?php
