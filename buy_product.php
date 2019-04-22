<?php
session_start();
?>
<wml>
    <head>
    </head>
    <card>
    <h1>Buy The Product</h1>
    <?php
    if (!isset($_SESSION['signed_in']) || $_SESSION['signed_in'] != true) {
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

    $sql = "Update Product Set isSold = 1 Where id = " . $_GET['id'];

    if ($con->query($sql) === TRUE) {
        echo "The product buyed successfully";
        ?>
        <a href="all_products.php">All Products Page</a><br/>
        <?php
    } else {
        echo "Sorry, Some errors were occurred... please go to <a href=\"all_products.php\">All Products</a>.";
    }
    mysqli_close($con);
    ?>
    </card>
</wml>