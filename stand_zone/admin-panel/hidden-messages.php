<?php include('inc/header.php') ?>



<h2 class='page_title'>Replied Messages and Hidden messages</h2>

<?php

# if the user pressed (show) button

if (isset($_POST['show']) && !empty($_POST['show'])) {

    foreach ($_POST as $key => $value) {
         reset($_POST);
       $first_key = key($_POST);

        if ($value == 'on') {

            $result = mysql_query("

                UPDATE messages

                SET replied = 'no'

                WHERE id = $key

            ");

            if (mysql_affected_rows() == 1) {

                $error_msg = "<p class='success_message'>Messages have been updated<br /><br /><a href='index.php' class='normal_link'> Back to Inbox Archive</a></p>";
                echo $error_msg;

            } else {

                $error_msg = "<p class='info_message'>An Error occured during data update, try again<br /><br /><a href='index.php' class='normal_link'>Back to inbox archive</a></p>";
                echo $error_msg;

            }

        }elseif($value != 'on' && $first_key == 'show') 
        {
            $myerror_msg = "<p class='info_message'>An Error has occured,you must select at least one message. Please try again<br /><br /><a href='index.php' class='normal_link'>Back to inbox archive</a></p>";
                echo $myerror_msg; 
        }

    }



//    echo $error_msg;



} else { # if the user didn't press (show) button

    # display hidden messages

    $result = mysql_query("

        SELECT COUNT(*) as 'num_of_messages'

        FROM messages

        WHERE replied = 'yes'

        ");

    if ($result != false) {

        $row = mysql_fetch_array($result);

        $messages =  $row['num_of_messages'];

    }



    echo "<p class='some_info'>Replied messages and hidden messages number :  Message <b>( $messages )</b> </p>";



    ?>

    <form action="hidden-messages.php" method="post">

        <table>

            <tr>

                <th style="width: 30px;"></th>

                <th style="width: 80px;">Date</th>

                <th style="width: 190px;">Name</th>

                <th style="width: 190px;">Message type</th>

                <th style="width: 190px;"> Email</th>

                <th style="width: 190px;">Subject</th>

                <th>Text</th>

                <th style="width: 50px;">Print</th>

            </tr>



            <?php

            ############# Change values of the following 3 variable and everything will work properly #############

            $table_name = 'messages';

            $num_of_results_per_page = 50; # number of results that will be shown in every page

            $column_to_order_by = 'id';

            #######################################################################################################



            # Query to get total number of records we are going to fetch

            $result = mysql_query("

                SELECT COUNT(*) as num_of_records

                FROM $table_name

                WHERE replied = 'yes'

            ");

            $row = mysql_fetch_array( $result );



            # Use total number of records with the set_pagination() function

            $pagination = set_pagination( $row['num_of_records'], $num_of_results_per_page ); # set_pagination() is a user-defined function



            # Query to fetch data that will be shown in the current page

            $result = mysql_query("

                SELECT *

                FROM $table_name

                WHERE replied = 'yes'

                ORDER BY $column_to_order_by DESC

                LIMIT {$pagination['start_record']}, {$pagination['num_of_results_per_page']}

            ");

            if ( $result != false ) {

                $counter = 1; # we may want to use this to give different style to the odd or even results

                while( $row = mysql_fetch_array( $result ) ) {

                    $td_class = ($counter % 2 == 0) ? 'even_row' : 'odd_row';

            ?>

                    <tr>

                        <td class="<?php echo $td_class ?>"><input type="checkbox" name="<?php echo $row['id'] ?>" value="on" /></td>

                        <td class="<?php echo $td_class ?>"><?php echo $row['date'] ?></td>

                        <td class="<?php echo $td_class ?>" style="text-align: right;"><?php echo stripslashes($row['name']) ?></td>

                        <td class="<?php echo $td_class ?>" style="text-align: right;"><?php echo stripslashes($row['type']) ?></td>

                        <td class="<?php echo $td_class ?>" style="text-align: right; direction: ltr;"><?php echo stripslashes($row['email']) ?></td>

                        <td class="<?php echo $td_class ?>" style="text-align: right;"><?php echo stripslashes($row['subject']) ?></td>

                        <td class="<?php echo $td_class ?>"><a href="message-details.php?id=<?php echo $row['id'] ?>" class="normal_link"> Message body</a></td>

                        <td class="<?php echo $td_class ?>"><a href="javascript:printMessage('print-message.php', <?php echo $row['id'] ?>);"><img src="../img/back-end/printer.png" alt="طباعة" /></a></td>

                    </tr>

            <?php

                    $counter++;

                }

            }

            ?>

            <tr>

                <td colspan="7">

                    <br />

                    <input type="submit" name="show" value="unhide selected messages" class="submit_button" style="width: 180px; height: 35px;" />

                    &nbsp;&nbsp;&nbsp;&nbsp;<span class="hint"></span>&nbsp;&nbsp;&nbsp;&nbsp;

                    <a href="index.php" class="normal_link">Back to inbox</a>

                </td>

            </tr>

        </table>

    </form>

    <br /><br />

<?php

    # Display the pagination bar

    include( '../inc/pagination_bar.php' );

}

?>



<br /><br /><br />

<?php include('inc/footer.php') ?>