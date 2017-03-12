<?php include('inc/header.php') ?>













<?php






$id = mysql_real_escape_string($_GET['id']);













$result = mysql_query("






    SELECT *






    FROM aboutus






    WHERE id = $id






");






if ($result != false) {






    $row = mysql_fetch_array($result);






    






    foreach ($row as $key => $value) {






        $row["$key"] = stripslashes($value);






    }






}













echo "<h2 class='page_title'>update page content &laquo; <span style='color: red;'>{$row['title']}</span> &raquo;</h2>";




















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






    $result = mysql_query("






        UPDATE aboutus






        SET title         = '{$element['title']}',






            content       = '{$element['content']}',






            last_modified = '{$element['last_modified']}'






        WHERE id          = $id






    ");






    # display a message indicating if the data has been successfully updated or not






    if (mysql_affected_rows() == 1) {






        echo "<p class='success_message'>data has been saved successfully<br /><br /><a href='aboutus.php' class='normal_link'>Back to page archive</a></p>";






    } else {






        echo "<p class='info_message'>An error occured while trying to save changes. Make sure you made a change </p>";






        $element = array(






            'action'         => "edit-aboutus.php?id=$id",






            'title'          => $_POST['title'],






            'content'        => $_POST['content'],






            'last_modified'  => $_POST['last_modified'],






            'submit_value'   => 'save',






            'cancel_url'     => "aboutus.php",






            'cancel_caption' => 'back'






        );






        include('inc/aboutus_form.php');






    }






} else { # If the user did not press the submit button






    # instructions to display the form through which we edit data






    $element = array(






        'action'         => "edit-aboutus.php?id=$id",






        'title'          => $row['title'],






        'content'        => $row['content'],






        'last_modified'  => $row['last_modified'],






        'submit_value'   => 'save',






        'cancel_url'     => "aboutus.php",






        'cancel_caption' => 'back'






    );






    include('inc/aboutus_form.php');






}






?>






<br /><br /><br />













<?php include('inc/footer.php') ?>