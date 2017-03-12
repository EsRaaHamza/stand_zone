<?php include('inc/header.php') ?>
<h2 class='page_title'><img src="../img/clients.png" width="42" height="42"/>   Our Clients</h2>
<?php
if (isset($_POST['submit_form']) && !empty($_POST['submit_form'])) {
    # instructions to insert data for the first time
    $error_msg  = '';
    $error_msg .= empty($_POST['title']) ? '<span>Page name is required</span><br />' : ''; # if the user did not enter a title
    if (!empty($error_msg)) {
        die("<p class='info_message'>$error_msg<br /><a href='clients.php' class='normal_link'>Back to add page</a></p>");
    }
    $page = array();
    foreach ($_POST as $key => $value) {
        $page["$key"] = mysql_real_escape_string($value);
    }
        if (!empty($_FILES['image']['tmp_name'])) {        
        $desired_img_width = 940;
        $desired_medium_width = 500;
        $desired_thumb_width = 120;
        include('inc/process_uploaded_clients.php');
        }
    $result = mysql_query("
        INSERT INTO clients (title,image_name, url)
        VALUES ('{$page['title']}','{$image_name}', '{$page['url']}')
    ");
    if (mysql_affected_rows() == 1) {
        echo "<p class='success_message'>Data has been saved successfully<br /><br /><a href='clients.php' class='normal_link'>Add new page</a></p>";
    } else {
        echo "<p class='info_message'>An error occured. Try again</p>";
        $element = array(
            'action'        => 'clients.php',
            'title'         => $_POST['title'],
            'url'       => $_POST['url'],
            'submit_value'  => 'save',
            'cancel_url'    => 'clients.php',
            'cancel_caption'=> 'back',
        );
        include('inc/clients_form.php');
    }
} else { # If the user did not press the (add) button
    # instructions to display the form through which we add new news
    $element = array(
        'action'        => 'clients.php',
        'title'         => '',
        'url'       => '',
        'last_modified' => date('Y-m-d'),
        'submit_value'  => 'save',
        'cancel_url'    => 'clients.php',
        'cancel_caption'=> 'back',
    );
    include('inc/clients_form.php');
}
?>
<a name="archive"></a>
<br /><br /><br /><br />
<h2 class='page_title'>Archive  </h2>
<table>
    <tr>
        <th style="width: 30px;"></th>
        <th>Page name</th>
        <th style="width: 150px;">Edit | Delete</th>
    </tr>
<?php
$result = mysql_query("
    SELECT *
    FROM clients
    ORDER BY id desc
");
if ($result != false) {
    $counter = 1;
    while ($row = mysql_fetch_array($result)) {
        $td_class = ($counter % 2 == 0) ? 'even_row' : 'odd_row';
?>
            <tr>
            <td class="<?php echo $td_class ?>" style="padding: 0;"><?php echo $counter ?></td>
            <td class="<?php echo $td_class ?>" style="text-align: right;"><?php echo $row['title'] ?></td>
 <td class="<?php echo $td_class ?>"><a href="edit-clients.php?id=<?php echo $row['id'] ?>" class="normal_link">Edit</a> | <a href="javascript:confirm_redirect('Are you sure you want to delete this page?', 'delete-clients.php?id=<?php echo $row['id'] ?>');" class="normal_link">Delete</a></td>        </tr>
       <?php 
        $counter++;
    }
}
?>
</table>
<br /><br /><br />
<?php include('inc/footer.php') ?>