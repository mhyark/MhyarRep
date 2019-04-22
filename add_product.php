<?php
session_start();
?>
<wml>
    <head>
    </head>
    <card>
    <h1>Add Product</h1>
    <?php
	if(!isset($_SESSION['signed_in']) || $_SESSION['signed_in'] != true){
		echo "Please Login <a href=\"login.wml\">login</a>.";
                return;
        }
// Get User submitted information
    $productName = $_POST["productName"];
    $initialPrice = $_POST["initialPrice"];

// Connect to the database
    $con = mysqli_connect("localhost", "id3927991_studentmaster80", "111333", "id3927991_mwt");

// Check connection
    if (mysqli_connect_error()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $sql = "INSERT INTO Product (userId, productName, initialPrice, isSold) VALUES ('" . $_SESSION['user_id'] . "', '" . $productName . "', '" . $initialPrice . "', 0)";

    if ($con->query($sql) === TRUE) {
        echo "Added Successfully, Go to All Products Page <a href=\"all_products.php\">All Products</a>.";
    } else {
        echo"Sorry, Some errors were occurred... please try <a href=\"add_product.wml\">Add Product </a> again.";
    }
    mysqli_close($con);
    ?>
    </card>
</wml>