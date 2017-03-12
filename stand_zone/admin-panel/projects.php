<?php include('inc/header.php') ?>

<h2 class='page_title'>projects</h2>

<?php
if (isset($_POST['add']) && !empty($_POST['add'])) { # If the user pressed the (add) button
    # instructions to insert data for the first time
    if (!empty($_FILES['image']['tmp_name'])&& !empty($_POST['title'])) {        
        $title = mysql_real_escape_string(strip_tags($_POST['title']));
        $content = mysql_real_escape_string($_POST['content']);
        $desired_img_width = 1000;
        $desired_medium_width = 500;
        $desired_thumb_width = 120;
        include('inc/process_uploaded_projects.php');
        $result = mysql_query("
        INSERT INTO projects ( title, image_name, date, content, display)
        VALUES ( '{$title}', '{$image_name}', '{$_POST['date']}', '{$_POST['content']}', '{$_POST['display']}')
    ");
        if (mysql_affected_rows() == 1) {
            echo "<p class='success_message'>Data has been saved successfully<br /><br /><a href='projects.php' class='normal_link'>Add new project</a></p>";
        } else {
            echo "<p class='info_message'>An error occured. Try again </p>";
            $articles = array(
                'action' => "projects.php",
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'date' => $_POST['date'],
                'display' => $_POST['display'],                
                'submit_value' => 'save',
                'submit_name' => 'add',
                'cancel_url' => "projects.php",
                'cancel_caption' => 'back',
            );
            include('inc/projects_form.php');
        }
    } else {
        echo"<p class='info_message'><span>You must add an image and title to the project</span><br/><a href='projects.php' class='normal_link'>Try again</a></p>";
    }
} else { # If the user did not press the (add) button
    # instructions to display the form through which we add new projects
    $articles = array(
        'action' => "projects.php",
        'title' => '',
        'date' => date('Y-m-d'),
        'display' => 'yes',
        'content' => '',
        'submit_value' => 'save',
        'submit_name' => 'add',
        'cancel_url' => "projects.php",
        'cancel_caption' => 'back',
    );
    include('inc/projects_form.php');
}
?>
<a name="archive"></a>
<br /><br /><br /><br />
<h2 class='page_title' style="direction:ltr;">Archive .. </h2>
<table>
    <tr>
        <th style="width: 30px;"></th>
        <th>title </th>
        <th style="width: 150px;">Adding date:</th>
        <th style="width: 180px;">Is the project published?</th>     
        <th style="width: 150px;">Edit | Delete</th>
    </tr>
    <?php
    # Query to get total number of records we are going to fetch
    $result = mysql_query("
                SELECT COUNT(*) as num_of_records
                FROM projects              
            ");
    $row = mysql_fetch_array($result);
    $num_of_results_per_page = 50;
    $pagination = set_pagination($row['num_of_records'], $num_of_results_per_page); # set_pagination() is a user-defined function
    # Use total number of records with the set_pagination() function
    $result = mysql_query("
    SELECT *
    FROM projects
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
                <td class="<?php echo $td_class ?>"><a href="edit-projects.php?id=<?php echo $row['id'] ?>" class="normal_link">edit</a> | <a href="delete-projects.php?id=<?php echo $row['id'] ?>" class="normal_link">delete</a></td>
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