<?php
session_start();
?>
<wml>
    <head>
    </head>
    <card>
    <h1>Search For Products</h1>
    <?php
    if (!isset($_SESSION['signed_in']) || $_SESSION['signed_in'] != true) {
        echo "Please Login <a href=\"login.wml\">login</a>.";
        return;
    }
// Get User submitted information
    $productName = $_POST["productName"];

// Connect to the database
    $con = mysqli_connect("localhost", "id3927991_studentmaster80", "111333", "id3927991_mwt");

// Check connection
    if (mysqli_connect_error()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $sql = "Select * From Product Where productName Like '_" . $productName . "_' And isSold = 0";

    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            ?>
            <h5>Product Name: <?php echo $row["productName"]; ?></h5>
            <h6>Initial Price: <?php echo $row["initialPrice"]; ?></h6>
            <p>Not Sold</p>
            <a href="show_product_details.php?id=<?php echo $row["id"]; ?>">Show Details</a><br/>
            <a href="buy_product.php?id=<?php echo $row["id"]; ?>">Buy Product</a>
            <?php
        }
    } else {
        echo"Sorry, Some errors were occurred... please try <a href=\"search.wml\">Search Product </a> again.";
    }
    mysqli_close($con);
    ?>
    </card>
</wml>