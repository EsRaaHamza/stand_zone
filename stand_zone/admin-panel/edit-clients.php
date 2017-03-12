<?php include('inc/header.php') ?>



<?php

$id = mysql_real_escape_string($_GET['id']);



$result = mysql_query("

    SELECT *

    FROM clients

    WHERE id = $id

");

if ($result != false) {

    $row = mysql_fetch_array($result);

    

    foreach ($row as $key => $value) {

        $row["$key"] = stripslashes($value);

    }

}



echo '<h2 class="page_title"> 
<img src="../img/edit.png" width="32" height="32"/> 
         Edit page:  
<span style="color: #555555;">'.$row["title"].'</span> 

</h2>';





# If the user pressed the submit button

if (isset($_POST['submit_form']) && !empty($_POST['submit_form'])) {

    # instructions to update existing data

    

    # set an array to hold all submitted values

    $element = array();

    # escape all submitted values and put each value in the array

    foreach ($_POST as $key => $value) {

        $element["$key"] = mysql_real_escape_string(trim($value));

    }



    # update data
   if (!empty($_FILES['image']['tmp_name'])) {        

        $desired_img_width = 940;

        $desired_medium_width = 500;

        $desired_thumb_width = 120;

        include('inc/process_uploaded_clients.php');
         $result = mysql_query("

        UPDATE clients

        SET  image_name = '{$image_name}'

        WHERE id          = $id

    ");
        }
    $result = mysql_query("

        UPDATE clients

        SET title         = '{$element['title']}'



        WHERE id          = $id

    ");
   
    # display a message indicating if the data has been successfully updated or not

    if (mysql_affected_rows() == 1) {

        echo "<p class='success_message'>Data has been saved successfully<br /><br /><a href='clients.php' class='normal_link'>Back to Archive</a></p>";

    } else {

        echo "<p class='info_message'>An error occured while saving data. Make sure you have made some changes and try again</p>";

        $element = array(

            'action'         => "edit-clients.php?id=$id",

            'title'          => $_POST['title'],

            'url'        => $_POST['url'],


            'submit_value'   => 'save',

            'cancel_url'     => "clients.php",

            'cancel_caption' => 'back'

        );

        include('inc/clients_form.php');

    }

} else { # If the user did not press the submit button

    # instructions to display the form through which we edit data

    $element = array(

        'action'         => "edit-clients.php?id=$id",

        'title'          => $row['title'],

        'url'        => $row['url'],
        'image_name'        => $row['image_name'],


        'submit_value'   => 'save',

        'cancel_url'     => "clients.php",

        'cancel_caption' => 'back'

    );

    include('inc/clients_form.php');

}

?>

<br /><br /><br />



<?php include('inc/footer.php') ?>