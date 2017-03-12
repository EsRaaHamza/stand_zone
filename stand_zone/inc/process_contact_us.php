<!-- begin of process_contact_us.php file in the front end includes-->
<?php

session_start();

# Load your functions

require_once( 'functions.php' );

# Load website options

include('website_options.php' );



# Make a connection to the database

include( '../admin-panel/inc/db_conn.php' );



# if the entered 'norobot' value was wrong

if ($_POST['norobot'] != $_SESSION['num_1'] + $_SESSION['num_2']) {

    die("<p class='info_message'><img src='img/error.png' width='17' style='margin: 0 0 0 8px; position: relative; top: 2px;'>The summtion value you entered isn't correct</p>");

}



# 1- Insert data of the message into the database

#=================================================#

$contact = array();

foreach($_POST as $key => $value) {

    $contact["$key"] = mysql_real_escape_string($value);

}

$ip      = get_ip_address();

$date    = date('Y-m-d');



$result = mysql_query("

    INSERT INTO messages (name, email, subject, message, ip, date, replied)

    VALUES ('{$contact['name']}', '{$contact['email']}', '{$contact['subject']}', '{$contact['message']}', '{$ip}', '{$date}', 'no')

");





# 2- Send the message

#=================================================#

$from = "{$_POST['name']} <{$_POST['email']}>";

//$to = "Amr Mekkawy <amr.mekkawy@gmail.com>";

$to = $options["website_email"];

$subject = "website {$options['website_name']} | " . $_POST['subject'];

$message = $_POST['message'];



if (send_email($from, $to, $subject, $message, '', '')) {
//    rory_fcih@yahoo.com

    # if the email has been successfully sent

    echo "<p class='success_message' style='line-height: 25px;'><img src='img/right.png' width='20' style='margin: 0 0 0 8px; position: relative; top: 2px;'>Message has been sent successfully. We will reply as soon as possible. Thanks for your concern</p>";

} else {

    # if the email failed

    echo "<p class='info_message'><img src='img/error.png' width='17' style='margin: 0 0 0 8px; position: relative; top: 2px;'>An error occured. Please try again </p>";

}




    

?>