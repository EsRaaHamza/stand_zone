<?php include('inc/header.php') ?>



<h2 class='page_title'>Image edit</h2>

<?php
$id = mysql_real_escape_string($_GET['id']);

if (isset($_POST['edit']) && !empty($_POST['edit'])) { # If the user pressed the (edit) button
    if (!empty($_POST['title'])) {

        # instructions to update existing data

        $title = mysql_real_escape_string(strip_tags($_POST['title']));

        $content = mysql_real_escape_string($_POST['content']);

        if (!empty($_FILES['image']["tmp_name"])) { #if the user uploaded a new photo
            $desired_img_width = 1800;

            $desired_medium_width = 400;
            $desired_thumb_width = 120;

//        $new_height=300;

            include('inc/process_uploaded_slider.php');

            $result = mysql_query("

            UPDATE slider

            SET  title      = '{$title}',

                image_name = '{$image_name}',

                date       = '{$_POST['date']}',

                url       = '{$_POST['url']}',
                content       = '{$_POST['content']}',

                display    = '{$_POST['display']}'

            WHERE id       = $id

        ") or die(mysql_error());
        } else { #if the user didn't upload a new photo then we will keep the old one
            $result = mysql_query("

            UPDATE slider

            SET  title       = '{$title}',

                 date        = '{$_POST['date']}',

                 url        = '{$_POST['url']}',
                 content        = '{$_POST['content']}',

                  display     = '{$_POST['display']}'

            WHERE id       = $id

        ") or die(mysql_error());
        }

        if (mysql_affected_rows() == 1) {

            echo "<p class='success_message'>data has been saved successfully<br /><br /><a href='slider.php#archive' class='normal_link'>Back to archive </a></p>";
        } else {

            echo "<p class='info_message'>An error occured during data saving process. Make sure you have changed it and try again </p>";



            $slider = array(
                'action' => "edit-slider.php?id=$id",
                'title' => $_POST['title'],
                'date' => $_POST['date'],
                'url' => $_POST['url'],
                'display' => $_POST['display'],
                'submit_value' => 'save',
                'submit_name' => 'edit',
                'cancel_url' => 'slider.php#archive',
                'cancel_caption' => 'back to archive ',
            );

            include('inc/slider_form.php');
        }
    } else {

        echo"<p class='info_message'><span>You must add an image and a title </span><br/><a href='edit-slider.php?id=$id' class='normal_link'>Try again</a></p>";
    }
} else { # If the user did not press the (edit) button
    # instructions to display the form with data we are going to edit
    $result = mysql_query("

        SELECT *

        FROM slider

        WHERE id = $id

    ");

    if ($result != false) {

        $row = mysql_fetch_array($result);
    }



    $slider = array(
        'action' => "edit-slider.php?id=$id",
        'title' => stripslashes($row['title']),
        'date' => $row['date'],
        'display' => $row['display'],
        'url' => $row['url'],
        'content' => stripslashes($row['content']),
        'image_name' => $row['image_name'],
        'submit_value' => 'save',
        'submit_name' => 'edit',
        'cancel_url' => 'slider.php#archive',
        'cancel_caption' => 'back to archive ',
    );

    include('inc/slider_form.php');
}
?>

<br /><br /><br />



<?php include('inc/footer.php') ?>