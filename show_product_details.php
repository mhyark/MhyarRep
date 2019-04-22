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

// Connect to the database
    $con = mysqli_connect("localhost", "id3927991_studentmaster80", "111333", "id3927991_mwt");

// Check connection
    if (mysqli_connect_error()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $_SESSION['product_id'] = $_GET['id'];

    $sql = "Select * From Product as p INNER JOIN BidOffer as b ON p.id = b.productId  Where p.id = " . $_GET['id'] . " ORDER BY b.offeredPrice DESC";

    $result = $con->query($sql);

    if ($row = $result->fetch_assoc()) {
        ?>
        <h5>Product Name: <?php echo $row["productName"]; ?></h5>
        <h6>Initial Price: <?php echo $row["initialPrice"]; ?></h6>
        <h6>All Bids:</h6>
        <p><?php echo $row["offeredPrice"]; ?></p>
        <?php $_SESSION['highest_bid'] = $row["offeredPrice"]; ?>
        <?php
        while ($row = $result->fetch_assoc()) {
            ?>
            <p><?php echo $row["offeredPrice"]; ?></p>
            <?php
        }
        ?>
        <a href="bid_product.wml">Bid This Product</a><br/>
        <a href="all_products.php">All Products Page</a><br/>
        <?php
    } else {
        echo"There is no details ... please return to <a href=\"all_products.php\">All Products Page</a>.";
    }
    mysqli_close($con);
    ?>

    </card>
</wml>