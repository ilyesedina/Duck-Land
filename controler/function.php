<?php
//helper function

// function query($sql) {
//     global connection;
// }


//get products 

function get_product() {
$query = query("SELECT * FROM product");
confirm($query);

while($row = fetch_array($query)) {
echo $row['price'];
}
}