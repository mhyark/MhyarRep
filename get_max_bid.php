<?php

// Get User submitted information
$productID = $_POST['product_id'];

// Connect to the database
$con = mysqli_connect("localhost", "id3927991_studentmaster80", "111333", "id3927991_mwt");

// Check connection
if (mysqli_connect_error()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "Select Max(offeredPrice) As MaxOfferedPrice From BidOffer Where productId = '" . $productID . "'";

$result = $con->query($sql);
if ($row = $result->fetch_assoc()) {
    echo $row["MaxOfferedPrice"];
} else {
    echo 0;
}
mysqli_close($con);

