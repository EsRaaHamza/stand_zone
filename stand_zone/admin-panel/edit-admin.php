<?php include('inc/header.php') ?>



<?php

$id = mysql_real_escape_string($_GET['id']);



echo "<h2 class='page_title'>Edit Admin's data <span style='font-size: 16px;'> Admin can access website control panel and manage website content </span></h2>";

if (isset($_POST['edit']) && !empty($_POST['edit'])) { # If the user pressed the (edit) button

    # instructions to update existing data

    $error_msg  = '';

    $error_msg .= empty($_POST['name'])     ? '<span>Name is required</span><br />'              : ''; # if the user did not enter a name

    $error_msg .= empty($_POST['email'])    ? '<span>Email is required</span><br />' : ''; # if the user did not enter an email

    $error_msg .= empty($_POST['password']) ? '<span>Password is required</span><br />'        : ''; # if the user did not enter a password



    if (!empty($error_msg)) { # if the user did not enter name OR email OR password

        die("<p class='info_message'>$error_msg<br /><a href='edit-admin.php?id=$id' class='normal_link'>back to the data edit page again </a></p>");

    }



    $admin = array(

        'name'            => mysql_real_escape_string(trim($_POST['name'])),

        'email'           => mysql_real_escape_string(strtolower(trim($_POST['email']))),

        'password'        => sha1(sha1(trim($_POST['password']))), //encrepted twice sha1 is oneway encryption  

        'job_title'       => mysql_real_escape_string($_POST['job_title']),

        //'creation_date'   => $_POST['creation_date'],

        'notes'           => mysql_real_escape_string($_POST['notes'])

    );



    $result = mysql_query("

        UPDATE admins

        SET name          = '{$admin['name']}',

            email         = '{$admin['email']}',

            password      = '{$admin['password']}',

            job_title     = '{$admin['job_title']}',

            notes         = '{$admin['notes']}'

        WHERE id = $id

    ");

    if (mysql_affected_rows() == 1) {

        echo "<p class='success_message'>Data has been saved successfully<br /><br /><a href='edit-admin.php?id=$id' class='normal_link'>Back to website admin list</a></p>";

    } else {

        echo "<p class='info_message'>you have entered same data </p>";

        $admin_form = array(

            'action'          => "edit-admin.php?id=$id",

            'name'            => $_POST['name'],

            'email'           => $_POST['email'],

            'password'        => $_POST['password'],

            'job_title'       => $_POST['job_title'],

            'creation_date'   => $_POST['creation_date'],

            'notes'           => $_POST['notes'],

            'submit_value'    => 'save',

            'submit_name'     => 'edit',

            'cancel_url'      => "edit-admin.php?id=$id"

//            'cancel_caption'  => 'ارجع إلى قائمة مديرى الموقع الحاليين'

        );

        include('inc/admin_form.php');

    }

} else { # If the user did not press the (edit) button

    # instructions to display the form through which we edit admins

    $result = mysql_query("

        SELECT *

        FROM admins

        WHERE id = $id

    ");

    if ($result != false) {

        $row = mysql_fetch_array($result);

    }



    $admin_form = array(

        'action'          => "edit-admin.php?id=$id",

        'name'            => stripslashes($row['name']),

        'email'           => stripslashes($row['email']),

        'password'        => '',

        'job_title'       => stripslashes($row['job_title']),

        'creation_date'   => $row['creation_date'],

        'notes'           => stripslashes($row['notes']),

        'submit_value'    => 'save',

        'submit_name'     => 'edit',

        'cancel_url'      => "edit-admin.php?id=$id"

//        'cancel_caption'  => 'ارجع إلى قائمة مديرى الموقع الحاليين'

    );

    include('inc/admin_form.php');

}

?>

<br /><br /><br />



<?php include('inc/footer.php') ?>