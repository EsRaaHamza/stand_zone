<?php include('inc/header.php') ?>

<h2 class='page_title'>حذف الصوره..</h2>
<?php
$id = mysql_real_escape_string($_GET['id']);

if (isset($_POST['delete']) && !empty($_POST['delete'])) { # If the user pressed the (delete) button
    # instructions to delete existing data
    $result = mysql_query("
        DELETE FROM slider
        WHERE id = $id
    ");
    if (mysql_affected_rows() == 1) {
        echo "<p class='success_message'>تم حذف البيانات بنجاح<br /><br /><a href='slider.php#archive' class='normal_link'>ارجع لأرشيف </a></p>";
    } else {
        echo "<p class='info_message'>حدث خطأ أثناء محاولة حذف البيانات، حاول مرة أخرى</p>";

        $slider = array(
            'action' => "delete-slider.php?id=$id",
            'title' => $_POST['title'],
            'date' => $_POST['date'],
            'display' => $_POST['display'],
            'url' => $_POST['url'],
            'submit_value' => 'حذف',
            'submit_name' => 'delete',
            'cancel_url' => 'slider.php#archive',
            'cancel_caption' => 'ارجع لأرشيف ',
        );
        include('inc/slider_form.php');
    }
} else { # If the user did not press the (delete) button
    # instructions to display the form with data we are going to delete
    $result = mysql_query("
        SELECT *
        FROM slider
        WHERE id = $id
    ");
    if ($result != false) {
        $row = mysql_fetch_array($result);
    }

    $slider = array(
        'action' => "delete-slider.php?id=$id",
        'title' => stripslashes($row['title']),
        'date' => $row['date'],
        'display' => $row['display'],
        'image_name' => $row['image_name'],
        'url' => $row['url'],
        'submit_value' => 'حذف',
        'submit_name' => 'delete',
        'cancel_url' => 'slider.php#archive',
        'cancel_caption' => 'ارجع لأرشيف ',
    );
    include('inc/slider_form.php');
}
?>
<br /><br /><br />

<?php include('inc/footer.php') ?>