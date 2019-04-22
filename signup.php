<?php
session_start();
?>
<wml>
    <head>
    </head>
    <card>
    <h1>Register Page</h1>
    <?php
// Get User submitted information
    $userName = $_POST["UserName"];
    $tel = $_POST["Tel"];
    $pass = $_POST["Password"];

// Connect to the database
    $con = mysqli_connect("localhost", "id3927991_studentmaster80", "111333", "id3927991_mwt");

// Check connection
    if (mysqli_connect_error()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $sql = "INSERT INTO User (userName, tel, password) VALUES ('" . $userName . "', '" . $tel . "', '" . $pass . "')";
    
    if ($con->query($sql) === TRUE) {
        $last_id = $con->insert_id;
        $_SESSION['signed_in'] = true;
        $_SESSION['username'] = $userName;
        $_SESSION['user_id'] = $last_id;

        echo "Register Successfully, Go to Home Page <a href=\"home.wml\">Home</a>.";
    } else {
        $_SESSION['signed_in'] = false;
        $_SESSION['username'] = null;
        $_SESSION['user_id'] = null;

        echo "Sorry, Some errors were occurred... please try <a href=\"signup.wml\">Register </a> again.";
    }
    mysqli_close($con);
    ?>
    </card>
</wml>