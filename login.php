<?php
session_start();
?>
<wml>
    <head>
    </head>
    <card>
    <h1>Login Page</h1>
<?php
// Get User submitted information
$userName = $_POST["UserName"];
$pass = $_POST["Password"];

// Connect to the database
$con = mysqli_connect("localhost", "id3927991_studentmaster80", "111333", "id3927991_mwt");

// Check connection
if (mysqli_connect_error()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "SELECT *  FROM User where userName = '" . $userName . "' AND password = '" . $pass . "'";
$sql = "SELECT *  FROM User where userName = 'riyad' AND password = 'riyad'";
$result = $con->query($sql);
if ($row = $result->fetch_assoc()) {
    $_SESSION['signed_in'] = true;
    $_SESSION['user_id'] = $row["id"];
    $_SESSION['username'] = $userName;
    echo "Login Successfully, Go to Home Page <a href=\"home.wml\">Home </a>.";
    //header("Location: home.wml");
} else {
    $_SESSION['signed_in'] = false;
    $_SESSION['username'] = null;
    $_SESSION['user_id'] = null;
    //header("Location: /AMW/login.php");
    echo "Sorry, user name and password are not valid... please try <a href=\"login.wml\">login </a> again.";
}

mysqli_close($con);
?>
    </card>
</wml>