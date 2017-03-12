<?php
/*
This file checks to see if the user has successfully started a session by logging in or not
if not the user is redirected to login page which is ( login.php ) in our case
*/

session_start();
if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
    # Do Nothing
} else {# If the user is not logged
    # Get full path of the current page in order to redirect the user to it again if he successfully logged in
    $redirect = $_SERVER['REQUEST_URI'];
    # Redirect to ( login.php )
    header("Location: login.php?redirect=$redirect");

    # The next line is for those whose their browsers do not support redirecting, in order to redirect manually
    echo "<h4 style='text-align: center;'>If your browser does not support redirecting, <a href='login.php?redirect={$redirect}'>click here</a></h4>";
    
    die();
}
?>