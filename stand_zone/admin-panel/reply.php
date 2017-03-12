<?php include('inc/header.php') ?>



<h2 class='page_title'>Message Reply</h2>

<?php

# If the user pressed (Send) button and subject is not empty and email is not empty content is not empty

if ( isset( $_POST['send'] ) && !empty( $_POST['send'] ) && !empty( $_POST['subject'] ) && !empty( $_POST['email'] ) && !empty( $_POST['content'] ) ) {

    ############################################################

    # Instructions to send the reply                           #

    ############################################################



    # email address of recipient

    $to = $_POST['email'];

    # Subject of of the newsletter

    $subject = $_POST['subject'];

    # Content of the newsletter

    $message =<<<EOF

        <!DOCTYPE html>

        <html>

            <head>

                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

                <title></title>

            </head>

            <body>

                <div style='direction: rtl; text-align: justify; font: 13px/22px tahoma, verdana, sans-serif;'>

                    {$_POST['content']}

                </div>

            </body>

        </html>

EOF;



    # In case any of our lines are larger than 70 characters, we should use wordwrap()

    $message = wordwrap( $message, 70 );

    # To send HTML mail, the Content-type header must be set

    $headers  = "MIME-Version: 1.0" . "\r\n";

    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    $headers .= "From: website {$options['website_name']} <{$options['website_email']}>" . "\r\n";



    # Send the email

    if ( mail( $to, $subject, $message, $headers ) ) {

        echo("<p class='success_message'>Message has been sent successfully<br /><br /><a href='index.php' class='normal_link'>Back to Inbox</a></p>");

        $result = mysql_query("

            UPDATE messages

            SET replied = 'yes'

            WHERE id = '{$_GET['id']}'

        ");

    } else { # If the mail failed to be sent

        echo("<p class='info_message'>An error occured during sending the message<br /><br /><a href='index.php' class='normal_link'> Try again</a></p>");

    }



} else { # If the user did not press the (add) button or subject is empty or content is empty

    # instructions to display the form through which we send messages

    $result = mysql_query("

        SELECT *

        FROM messages

        WHERE id = '{$_GET['id']}'

        ");

    if ($result != false) {

        $row = mysql_fetch_array($result);

        $row['name'] = stripslashes($row['name']);

        $row['email'] = stripslashes($row['email']);

        $row['subject'] = stripslashes($row['subject']);

    }



    $reply = array(

        'action'         => "reply.php?id={$row['id']}",

        'subject'        => $row['subject'],

        'email'          => $row['email'],

        'content'        => '',

        'submit_value'   => 'send',

        'submit_name'    => 'send',

        'cancel_url'     => "message-details.php?id={$row['id']}",

        'cancel_caption' => 'back to message'

    );

    include('inc/reply_form.php');

}

?>

<br /><br />

<?php include('inc/footer.php') ?>