<!-- Reviews -->
        <div class="col-12" id="reviews">
            <div class="card border-light mb-3">
                <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-comment"></i> Reviews</div>
                <div class="card-body">
                    <!--<form action="process.php?productID=<//?php echo $_GET["productID"]; ?>" method="POST"> -->
                    <form id="reviewForm" method="POST" action="business/handleReview.php?action=create">
                        <input type="hidden" id='reviewID' name="reviewID" value="">
                        <div class="form-group">
                        <label for="fullName">Full Name</label>
                        <input type="text" 
                        value="<?php echo $editall[0]["fullName"] ?>" 
                        id='fullName' name="fullName" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label for="message">Review Contents</label>
                        <textarea class="w-100 form-control" value="<?php echo $editall[0]["message"] ?>" rows="6" type="text"  name="message" id='message'></textarea>
                    </div>
                        <br/>
                        <button class="waves-effect waves-light btn" type='submitReviews'>Add / Update Review</button>
                        <ul id='reviews'>
                            <?php //readReviews(); ?>
                        </ul>
                        </form>
                    <div class='container'>
                </div>
            </div>
        </div>
    </div>