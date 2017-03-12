<?php include('inc/header.php') ?>







<h2 class='page_title'>Data edit</h2>



<?php





if (isset($_POST['edit']) && !empty($_POST['edit'])) { # If the user pressed the (edit) button



        # instructions to update existing data



        $content = mysql_real_escape_string($_POST['content']);



        #if the user uploaded a new photo



            $desired_img_width = 160;



//        $new_height=300;


    
    
//            UPDATE  contactus
//
//
//
//            SET   content    = '{$content}'
//
//
//
//            WHERE id       = 1

            $result = mysql_query("


            INSERT INTO contactus (content)



            VALUES ('{$content}')



        ") or die(mysql_error());       



        if (mysql_affected_rows() == 1) {



            echo "<p class='success_message'>Data has been save successfully<br /><br /> <a href='contact_us.php' class='normal_link'>Back to archive </a></p>";



        } else {



            echo "<p class='info_message'>An error occured </p>";







            $news = array(



                'action' => "contact_us.php",



//                'advisor' => $_POST['advisor'],



                'content' => $_POST['content'],



                'submit_value' => 'save',



                'submit_name' => 'edit',



                'cancel_url' => 'contact_us.php#archive',



            );



            include('inc/contact_us_form.php');



        }



    



} else { # If the user did not press the (edit) button



    # instructions to display the form with data we are going to edit



    $result = mysql_query("



        SELECT *



        FROM contactus



        WHERE id = 1



    ");



    if ($result != false) {



        $row = mysql_fetch_array($result);



    }







    $news = array(



        'action' => "contact_us.php",



        'content' => stripslashes($row['content']),



        'submit_value' => 'save',



        'submit_name' => 'edit',







    );



    include('inc/contact_us_form.php');



}



?>



<br /><br /><br />







<?php include('inc/footer.php') ?>