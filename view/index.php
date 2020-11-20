<?php
include_once 'login/header.php';
?>
<body>
<div class="container">
            <div class="card mt-5">
            <div class="card-header">
                <h2>News</h2>
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
                    <button type="submit" name="submit" class="btn btn-info">Create a product</button>
                </div>
                </form>
            </div>
            </div>
        </div>
<?php
include_once 'login/footer.php';
?>


