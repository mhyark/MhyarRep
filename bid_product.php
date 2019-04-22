<?php
session_start();
?>
<wml>
    <head>
    </head>
    <card>
    <h1>Product Details</h1>
    <?php
    if (!isset($_SESSION['signed_in']) || $_SESSION['signed_in'] != true) {
        echo "Please Login <a href=\"login.wml\">login</a>.";
        return;
    }
// Get User submitted information
    $yourBid = $_POST["yourBid"];
    $productID = $_SESSION['product_id'];
    $userID = $_SESSION['user_id'];

    if ($_SESSION['highest_bid'] >= $yourBid) {
        echo "Your bid must be the highest... please bid <a href=\"bid_product.wml\"></a> again.";
        return;
    }
// Connect to the database
    $con = mysqli_connect("localhost", "id3927991_studentmaster80", "111333", "id3927991_mwt");

// Check connection
    if (mysqli_connect_error()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $sql = "INSERT INTO BidOffer (userId, productId, offeredPrice) VALUES ('" . $userID . "', '" . $productID . "', '" . $yourBid . "')";

     if ($con->query($sql) === TRUE) {
         echo "Successfully Bid Added, return to ";
        ?>
        
        <a href="all_products.php">All Products Page</a><br/>
        <?php
    } else {
        echo "Sorry, Some errors were occurred... please bid <a href=\"bid_product.wml\"></a> again.";
    }
    mysqli_close($con);
    ?>

    </card>
</wml>