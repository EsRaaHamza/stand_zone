<?php include('inc/header.php') ?>

<h2 class='page_title'>Inbox</h2>

<?php



# if the user pressed (delete) button

if (isset($_POST['delete']) && !empty($_POST['delete'])) {

    foreach ($_POST as $key => $value) {
//         echo "inside the foreach:: <br>";
       
        reset($_POST);
       $first_key = key($_POST);
//        echo $first_key;
//        if ($first_key == 'delete')
//        {
//            echo "inside my if condition!:: <br>";
//         echo $key." this is the key <br>";
//         echo $value." this is the value <br>";
//           echo '<script type = "text/javascript">
//          alert("You must select one message to perform deletion");
//          window.location = "index.php";
//
//          </script>'; 
//        }
//            echo "inside the else:: <br>";
//           echo $key.": this is the key <br>";
//           echo $value.": this is the value <br>";
  
           if ($value == 'on') {
 
                 $result = mysql_query("

                 DELETE FROM messages

                  WHERE id = $key

                   ");

                 if (mysql_affected_rows() == 1) {

                 $error_msg = "<p class='success_message'>Data deletion has been done<br /><br /><a href='index.php' class='normal_link'>Back to inbox Archive</a></p>";
                    
                     echo $error_msg;

                 } else {
                    

                  $error_msg = "<p class='info_message'>An Error has occured, please try again<br /><br /><a href='index.php' class='normal_link'>Back to inbox Archive</a></p>";
                     echo $error_msg;
                 }

          } elseif($value != 'on' && $first_key == 'delete')
           {
              $myerror_msg = "<p class='info_message'>An Error has occured,you must select at least one message. Please try again<br /><br /><a href='index.php' class='normal_link'>Back to inbox archive</a></p>";
                echo $myerror_msg;    
           }
    
        
  
        
    }

     
    
    

# if the user pressed (replied) button

} elseif (isset($_POST['replied']) && !empty($_POST['replied'])) {

    foreach ($_POST as $key => $value) {
         reset($_POST);
       $first_key = key($_POST);

        if ($value == 'on') {

            $result = mysql_query("

                UPDATE messages

                SET replied = 'yes'

                WHERE id = $key

            ");

            if (mysql_affected_rows() == 1) {

                $error_msg = "<p class='success_message'>The selected message has been updated<br /><br /><a href='index.php' class='normal_link'>Back to inbox archive</a></p>";

            } else {

                $error_msg = "<p class='info_message'>An Error has occured, please try again<br /><br /><a href='index.php' class='normal_link'>Back to inbox archive</a></p>";

            }

        }elseif($value != 'on' && $first_key == 'replied')
           {
              $myerror_msg = "<p class='info_message'>An Error has occured,you must select at least one message. Please try again<br /><br /><a href='index.php' class='normal_link'>Back to inbox archive</a></p>";
                echo $myerror_msg;    
           }

    }



} else { # if the user didn't press (delete) button

    # display coming messages

    $result = mysql_query("

        SELECT COUNT(*) as 'num_of_messages'

        FROM messages

        WHERE replied = 'no'

        ");

    if ($result != false) {

        $row = mysql_fetch_array($result);

        $messages =  $row['num_of_messages'];

    }

    echo "<p class='some_info'>Inbox messages number:  Message <b>( $messages )</b> <br /><br /> <b>Note:</b> When a message gets a reply it will be displayed automatically in the <a href='hidden-messages.php' class='normal_link'>Replied messages page</a></p>";

    ?>

    <form action="index.php" method="post">

        <table>

            <tr>

                <th style="width: 30px;">Select</th>

                <th style="width: 70px;">Date</th>

                <th style="width: 170px;">Name</th>

                <th style="width: 170px;">Email</th>

                <th style="width: 150px;">Subject</th>

                <th style="width: 90px;"> IP Number</th>

                <th>Message body</th>

                <th style="width: 50px;">print</th>

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

                WHERE replied = 'no'

            ");

            $row = mysql_fetch_array( $result );



            # Use total number of records with the set_pagination() function

            $pagination = set_pagination( $row['num_of_records'], $num_of_results_per_page ); # set_pagination() is a user-defined function



            # Query to fetch data that will be shown in the current page

            $result = mysql_query("

                SELECT *

                FROM $table_name

                WHERE replied = 'no'

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

                        <td class="<?php echo $td_class ?>" style="text-align: left;"><?php echo stripslashes($row['name']) ?></td>

                        <td class="<?php echo $td_class ?>" style="text-align: left; direction: ltr;"><?php echo stripslashes($row['email']) ?></td>

                        <td class="<?php echo $td_class ?>" style="text-align: left;"><?php echo stripslashes($row['subject']) ?></td>

                        <td class="<?php echo $td_class ?>" style="text-align: left;"><?php echo $row['ip'] ?></td>

                        <td class="<?php echo $td_class ?>"><a href="message-details.php?id=<?php echo $row['id'] ?>" class="normal_link">Message Body</a></td>

                        <td class="<?php echo $td_class ?>"><a href="javascript:printMessage('print-message.php', <?php echo $row['id'] ?>);"><img src="../img/back-end/printer.png" alt="print" /></a></td>

                    </tr>

            <?php

                    $counter++;

                }

            }

            ?>

            <tr>

                <td colspan="7">

                    <br />

                    <input type="submit" name="replied" value="Hide selected messages" class="submit_button" style="width: 150px; height: 35px;" />

                    <input type="submit" name="delete" value="Delete selected messages" class="submit_button" style="width: 150px; height: 35px;" />
                    

                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    <a href="hidden-messages.php" class="normal_link">Click here to check the replied messages and the ignored ones</a>

                </td>

            </tr>

        </table>

    </form>

    <br /><br />

<?php

    # Display the pagination bar

$query_string="";

    include( '../inc/pagination_bar.php' );

    

}

?>

<br /><br /><br />

<?php include('inc/footer.php') ?>