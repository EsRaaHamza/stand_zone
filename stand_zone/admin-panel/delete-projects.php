<?php include('inc/header.php') ?>

<h2 class='page_title'>Delete ..</h2>
<?php
$id = mysql_real_escape_string($_GET['id']);

if (isset($_POST['delete']) && !empty($_POST['delete'])) { # If the user pressed the (delete) button
    # instructions to delete existing data
    $result = mysql_query("
        DELETE FROM projects
        WHERE id = $id
    ");
    if (mysql_affected_rows() == 1) {
        echo "<p class='success_message'>Data has been deleted successfully<br /><br /><a href='projects.php' class='normal_link'>Back to archive </a></p>";
    } else {
        echo "<p class='info_message'>An error occured. Please try again</p>";

        $articles = array(
            'action' => "delete-projects.php?id=$id",
            'title' => $_POST['title'],
            'date' => $_POST['date'],
            'display' => $_POST['display'],
            'content' => $_POST['content'],
            'submit_value' => 'delete',
            'submit_name' => 'delete',
            'cancel_url' => "projects.php",
            'cancel_caption' => 'back to archive',
        );
        include('inc/projects_form.php');
    }
} else { # If the user did not press the (delete) button
    # instructions to display the form with data we are going to delete
    $result = mysql_query("
        SELECT *
        FROM projects
        WHERE id = $id
    ");
    if ($result != false) {
        $row = mysql_fetch_array($result);
    }

    $articles = array(
        'action' => "delete-projects.php?id=$id",
        'title' => stripslashes($row['title']),
        'date' => $row['date'],
        'display' => $row['display'],
        'image_name' => $row['image_name'],
        'content' => $row['content'],
        'image_name' => $row['image_name'],
        'submit_value' => 'delete',
        'submit_name' => 'delete',
       'cancel_url' => "projects.php",
        'cancel_caption' => 'back to archive ',
    );
    include('inc/projects_form.php');
}
?>
<br /><br /><br />

<?php include('inc/footer.php') ?>