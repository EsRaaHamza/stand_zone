<?php include('inc/header.php') ?>



<?php

echo "<h2 class='page_title'>  Add new website Admin    <span style='font-size: 16px;'>(Admin can access control panel and manage website contenet)</span>..</h2>";

if (isset($_POST['add']) && !empty($_POST['add'])) { # If the user pressed the (add) button

    # instructions to insert data for the first time

    $error_msg  = '';

    $error_msg .= empty($_POST['name'])     ? '<span>Name is required</span><br />'              : ''; # if the user did not enter a name

    $error_msg .= empty($_POST['email'])    ? '<span>اEmail is required</span><br />' : ''; # if the user did not enter an email

    $error_msg .= empty($_POST['password']) ? '<span>Password is required</span><br />'        : ''; # if the user did not enter a password



    if (!empty($error_msg)) { # if the user did not enter name OR email OR password

        die("<p class='info_message'>$error_msg<br /><a href='admin.php' class='normal_link'>Back to enter admin data again </a></p>");

    }



    $admin = array(

        'name'            => mysql_real_escape_string(trim($_POST['name'])),

        'email'           => mysql_real_escape_string(strtolower(trim($_POST['email']))),

        'password'        => sha1(sha1(trim($_POST['password']))),

        'job_title'       => mysql_real_escape_string($_POST['job_title']),

        'creation_date'   => $_POST['creation_date'],

        'notes'           => mysql_real_escape_string($_POST['notes'])

    );



    $result = mysql_query("

        INSERT INTO admins (name, email, password, job_title, creation_date, notes)

        VALUES ('{$admin['name']}', '{$admin['email']}', '{$admin['password']}', '{$admin['job_title']}', '{$admin['creation_date']}', '{$admin['notes']}')

    ");

    if (mysql_affected_rows() == 1) {

        echo "<p class='success_message'>Data has been saved successfully<br /><br /><a href='admin.php' class='normal_link'>أضف مدير جديد للموقع</a></p>";

    } else {

        echo "<p class='info_message'>An error occured, please try again </p>";

        $admin_form = array(

            'action'          => 'admin.php',

            'name'            => $_POST['name'],

            'email'           => $_POST['email'],

            'password'        => $_POST['password'],

            'job_title'       => $_POST['job_title'],

            'creation_date'   => $_POST['creation_date'],

            'notes'           => $_POST['notes'],

            'submit_value'    => 'save',

            'submit_name'     => 'add',

            'cancel_url'      => 'admin.php',

            'cancel_caption'  => 'back',

        );

        include('inc/admin_form.php');

    }

} else { # If the user did not press the (add) button

    # instructions to display the form through which we add new admins

    $admin_form = array(

        'action'          => 'admin.php',

        'name'            => '',

        'email'           => '',

        'password'        => '',

        'job_title'       => '',

        'creation_date'   => date('Y-m-d'),

        'notes'           => '',

        'submit_value'    => 'save',

        'submit_name'     => 'add',

        'cancel_url'      => 'admin.php',

        'cancel_caption'  => 'Back',

    );

    include('inc/admin_form.php');

}

?>



<a name="archive"></a>

<br /><br /><br /><br />

<h2 class='page_title'>.. Website recent Admins  </h2>

<table>

    <tr>

        <th style="width: 30px;">index</th>

        <th style="width: 190px;">Name</th>

        <th style="width: 190px;">Job-title</th>

        <th>ملاحظات</th>

        <th style="width: 90px;">Date</th>

        <th style="width: 90px;">Edit |Delete</th>

    </tr>



<?php

$result = mysql_query("

    SELECT *

    FROM admins

    ORDER BY id DESC

");

if ($result != false) {

    $counter = 1;

    while ($row = mysql_fetch_array($result)) {

        $td_class = ($counter % 2 == 0) ? 'even_row' : 'odd_row';

?>

        <tr>

            <td class="<?php echo $td_class ?>" style="padding: 0;"><?php echo $counter ?></td>

            <td class="<?php echo $td_class ?>" style="text-align: right;"><?php echo $row['name'] ?></td>

            <td class="<?php echo $td_class ?>" style="text-align: right;"><?php echo $row['job_title'] ?></td>

            <td class="<?php echo $td_class ?>" style="text-align: right;"><?php echo $row['notes'] ?></td>

            <td class="<?php echo $td_class ?>" style="text-align: center; direction: ltr;"><?php echo $row['creation_date'] ?></td>

            <td class="<?php echo $td_class ?>"><a href="edit-admin.php?id=<?php echo $row['id'] ?>" class="normal_link">Edit</a> | <a href="delete-admin.php?id=<?php echo $row['id'] ?>" class="normal_link">Delete</a></td>

        </tr>

<?php

        $counter++;

    }

}

?>

</table>

<br /><br /><br />



<?php include('inc/footer.php') ?>