<?php

/*

The next (authentication.php) file checks to see if the user is logged in or not

if not the user is redirected to the login page

and this file MUST be included in the beginning (very top) of each page we want to protect from unauthorized users

*/

require('inc/authentication.php');



include('inc/db_conn.php');

require_once('../inc/functions.php');

include( '../inc/website_options.php' );

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <title>website <?php echo $options['website_name'] ?> | Inbox </title>

        <style type="text/css">

            body {
                background-color: #59301499;

                border: 5px solid ;

                margin: 5% auto;

                padding: 30px;

                width: 600px;

            }

            table {

                color: black;

                direction: ltr;

                font: 13px/22px tahoma, arial, sans-serif;

                text-align: left;

                width: 100%;
                background-color: azure;

            }

            .caption {

                color: dimgray ;

/*                text-align: left;*/

                width: 100px;

            }

            h3 {

                color: #555;

                font: bold 22px arial, serif;

                text-align: center;

            }

        </style>

    </head>

    <body>

        <?php

        $id = mysql_real_escape_string($_GET['id']);

        $result = mysql_query("

            SELECT *

            FROM messages

            WHERE id = $id

        ");

        if (mysql_num_rows($result) == 1) {

            $row = mysql_fetch_array($result);

        }

        ?>



        <table>

            <tr>

                <td colspan="2"><h3><u>Message details</u></h3><br /></td>

            </tr>

            <tr>

                <td class="caption">Name:</td>

                <td><?php echo $row['name'] ?></td>

            </tr>

            <tr>

                <td class="caption">Email:</td>

                <td><?php echo $row['email'] ?></td>

            </tr>

            <tr>

                <td class="caption">Subject:</td>

                <td><?php echo $row['subject'] ?></td>

            </tr>

            <tr>

                <td class="caption">Date:</td>

                <td><?php echo $row['date'] ?></td>

            </tr>

            <tr>

                <td class="caption" style="vertical-align: top;"><br />Message body:</td>

                <td><br /><?php echo $row['message'] ?></td>

            </tr>

        </table>

    </body>

</html>

