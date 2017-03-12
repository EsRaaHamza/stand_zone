<?php
# Start a session
session_start();
# Set $_SESSION['logged'] equals false
$_SESSION['logged'] = false;

# If the user pressed the ( login ) button
if (isset($_POST['login']) && !empty($_POST['login'])) {
    # Make a connection to the database
    include('inc/db_conn.php');
    # Escape provided email and password
    $login_email    = mysql_real_escape_string(strtolower(trim($_POST['email'])));
    $login_password = sha1(sha1(trim($_POST['password'])));
    # Check to see if these provided email and password match those stored in the database or not
    $result = mysql_query("
        SELECT *
        FROM admins
        WHERE email  = '{$login_email}'
        AND password = '{$login_password}'
    ");
    # If provided email and password match those stored in the database
    if (mysql_num_rows($result) == 1) {
        $row = mysql_fetch_array($result);
        # Set $_SESSION['logged'] equals true
        $_SESSION['logged']      = true;
        $_SESSION['email']       = $row['email'];
        $_SESSION['password']    = $row['password'];
        $_SESSION['name']        = $row['name'];
        //$_SESSION['admin_level'] = $row['admin_level'];
        $_SESSION['admin_id']    = $row['id'];
        # Redirect to requested page
       echo "<script> window.location.replace('{$_POST['redirect']}') </script>" ;
//        header("Location: {$_POST['redirect']}");
    } else { # If provided email or password DO NOT match those stored in the database
?>
        <!DOCTYPE HTML>
        <html>
            <head>
                <title>Login</title>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                <link rel="stylesheet" type="text/css" href="../css/back-end/login-page.css" />
            </head>
            <body>
                <div id="login_box" style="margin: 209px auto 0 auto;">
                    <p style="color: #fff; padding: 0 0 0 180px; font: 13px tahoma, sans-serif;">username/password is incorrect</p>
                    <form action="login.php" method="post">
                        <input type="hidden" name="redirect" value="<?php echo $_POST['redirect']; ?>" />
                        <p class="login_label">Email: </p>
                        <input class="login_text_box" type="text" name="email" /><br /><br />
                        <p class="login_label">Password: </p>
                        <input class="login_text_box" type="password" name="password" /><br />
                        <input class="login_button" type="submit" name="login" value="Login" style="margin: 10px 0 0 271px;" />
                    </form>
                </div>
            </body>
        </html>
<?php
    }
} else { # If the user DID NOT press the ( login ) button
?>
    <!DOCTYPE HTML>
    <html>
        <head>
            <title>Login</title>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <link rel="stylesheet" type="text/css" href="../css/back-end/login-page.css" />
        </head>
        <body>
            <div id="login_box">
                <form action="login.php" method="post">
                    <?php
                    if (empty($_GET['redirect'])) {
                        $redirect = str_replace('login.php', 'index.php', $_SERVER['REQUEST_URI']);
                    } else {
                        $redirect = $_GET['redirect'];
                    }
                    ?>
                    <input type="hidden" name="redirect" value="<?php echo $redirect ?>" />
                    <p class="login_label">Email: </p>
                    <input class="login_text_box" type="text" name="email" /><br /><br />
                    <p class="login_label">Password: </p>
                    <input class="login_text_box" type="password" name="password" /><br />
                    <input class="login_button" type="submit" name="login" value="Login" style="margin: 10px 0 0 271px;" />
                </form>
            </div>
        </body>
    </html>
<?php
}
?>
