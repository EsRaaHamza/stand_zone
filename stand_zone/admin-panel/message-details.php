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

        <title>Website <?php echo $options['website_name'] ?> Inbox</title>

        <style type="text/css">

            body {

                background: #63564D;

                text-align: center;

            }

            #container {

                background: white;

                border: 5px solid #011b54;

                margin: 5% auto;

                padding: 30px;

                text-align: left;
                direction: ltr;

                width: 600px;

            }

            table {

                color: #555555;

                direction: ltr;

                font: 13px/22px tahoma, arial, sans-serif;

                text-align: justify;

                width: 100%;

            }

            .caption {

                color: #36383f;

/*                text-align: left;*/

                width: 100px;

            }

            .normal_link {

                border-bottom: 1px solid transparent;

                color: #8DD8F9 ;

                text-decoration: none;

            }

            .normal_link:hover {

                border-bottom: 1px solid #8DD8F9;

            }

        </style>

        <script type="text/javascript" src="../js/functions.js"></script>

    </head>

    <body>

        <div id="container">



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

                    <td class="caption">Name:</td>

                    <td><?php echo $row['name'] ?></td>

                </tr>

                <tr>

                    <td class="caption">Subject:</td>

                    <td><?php echo $row['subject'] ?></td>

                </tr>

                <tr>

                    <td class="caption">Message date:</td>

                    <td><?php echo $row['date'] ?></td>

                </tr>

                <tr>

                    <td class="caption" style="vertical-align: top;"><br />Message body:</td>

                    <td><br /><?php echo $row['message'] ?></td>

                </tr>

                <tr>

                    <td colspan="2" style="text-align: center;">

                        <br /><br />

                        <a href="reply.php?id=<?php echo $row['id'] ?>" class="normal_link">Reply</a>

                        <span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</span>

                        <a href="javascript:printMessage('print-message.php', <?php echo $_GET['id'] ?>);" class="normal_link">Print</a>

                        <span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</span>

                        <a href="index.php" class="normal_link"> Back to inbox </a>

                    </td>

                </tr>

            </table>

        </div>

    </body>

</html>

