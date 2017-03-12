<?php include('inc/header.php') ?>

<h2 class='page_title' style="text-align: left;">.. Add new photo </h2>

<?php

    $content ="";
if (isset($_POST['add']) && !empty($_POST['add'])) { # If the user pressed the (add) button
    # instructions to insert data for the first time
    if (!empty($_FILES['image']['tmp_name']) && !empty($_POST['title'])) {

        $title = mysql_real_escape_string(strip_tags($_POST['title']));

        $content = mysql_real_escape_string($_POST['content']);

        $desired_img_width = 1800;

        $desired_medium_width = 400;

        $desired_thumb_width = 120;

        include('inc/process_uploaded_slider.php');

        $result = mysql_query("

        INSERT INTO slider ( title, image_name,url , date,  display,content)

        VALUES ( '{$title}', '{$image_name}',  '{$_POST['url']}','{$_POST['date']}', '{$_POST['display']}','{$_POST['content']}')

    ");

        if (mysql_affected_rows() == 1) {

            echo "<p class='success_message'>Data has been saved successfully<br /><br /><a href='slider.php' class='normal_link'>Add new</a></p>";
        } else {

            echo "<p class='info_message'>An Error Occured, please Try again</p>";


            $slider = array(
                'action' => 'slider.php',
                'title' => $_POST['title'],
                'date' => $_POST['date'],
                'url' => $_POST['url'],
                'display' => $_POST['display'],
                'submit_value' => 'Save',
                'submit_name' => 'add',
                'cancel_url' => 'slider.php',
                'cancel_caption' => 'Back',
            );

            include('inc/slider_form.php');
        }
    } else {

        echo"<p class='info_message'><span>You should add the title and the image </span><br/><a href='slider.php' class='normal_link'>Try Again</a></p>";
    }
} else { # If the user did not press the (add) button
    # instructions to display the form through which we add new news
    $slider = array(
        'action' => 'slider.php',
        'title' => '',
        'date' => date('Y-m-d'),
        'display' => 'yes',
        'url' => '',
        'submit_value' => 'Save',
        'submit_name' => 'add',
        'cancel_url' => 'slider.php',
        'cancel_caption' => 'Back',
    );

    include('inc/slider_form.php');
}
?>

<a name="archive"></a>

<br /><br /><br /><br />

<h2 class='page_title'>Photos Archive..</h2>

<table>

    <tr>

        <th style="width: 30px;">index</th>

        <th>title </th>

        <th style="width: 150px;">Adding date</th>

        <th style="width: 150px;">Is the photo Displayed?</th>     

        <th style="width: 150px;">Edit | Delete </th>

    </tr>

<?php
# Query to get total number of records we are going to fetch

$result = mysql_query("

                SELECT COUNT(*) as num_of_records

                FROM slider              

            ");

$row = mysql_fetch_array($result);

$num_of_results_per_page = 50;

$pagination = set_pagination($row['num_of_records'], $num_of_results_per_page); # set_pagination() is a user-defined function
# Use total number of records with the set_pagination() function

$result = mysql_query("

    SELECT *

    FROM slider

    ORDER BY id DESC

    LIMIT {$pagination['start_record']}, {$pagination['num_of_results_per_page']}

");

if ($result != false) {

    $counter = 1;

    while ($row = mysql_fetch_array($result)) {

        $td_class = ($counter % 2 == 0) ? 'even_row' : 'odd_row';
        ?>

            <tr>

                <td class="<?php echo $td_class ?>"><?php echo $counter ?></td>

                <td class="<?php echo $td_class ?>" style="text-align: right;"><?php echo $row['title'] ?></td>

                <td class="<?php echo $td_class ?>"><?php echo $row['date'] ?></td>

                <td class="<?php echo $td_class ?>" style="padding: 10px 5px 0 5px;"><?php echo $row['display'] == 'yes' ? '<img src="../img/back-end/right.png" alt="معروض" title="معروض" />' : '<img src="../img/back-end/wrong.png" alt="غير معروض" title="غير معروض" />' ?></td>                 

                <td class="<?php echo $td_class ?>"><a href="edit-slider.php?id=<?php echo $row['id'] ?>" class="normal_link">Edit</a> | <a href="delete-slider.php?id=<?php echo $row['id'] ?>" class="normal_link">Delete</a></td>

            </tr>

            <?php
            $counter++;
        }
    }
    ?>

</table>

<br /><br /><br />

    <?php include( '../inc/pagination_bar.php' ); ?>

    <?php include('inc/footer.php') ?>