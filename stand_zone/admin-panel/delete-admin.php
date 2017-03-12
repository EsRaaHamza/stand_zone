<?php include('inc/header.php') ?>

<?php
$id = mysql_real_escape_string($_GET['id']);

echo "<h2 class='page_title'>حذف مدير موقع <span style='font-size: 16px;'>(لن يكون بمقدورة -بعدالحذف-  أن يدخل إلى لوحة تحكم الموقع)</span>..</h2>";
if (isset($_POST['delete']) && !empty($_POST['delete'])) { # If the user pressed the (delete) button
    # instructions to delete existing data
    $result = mysql_query("
        DELETE FROM admins
        WHERE id = $id
    ");
    if (mysql_affected_rows() == 1) {
        echo "<p class='success_message'>تم حذف البيانات بنجاح<br /><br /><a href='admin.php#archive' class='normal_link'>ارجع لقائمة مديرى الموقع</a></p>";
    } else {
        echo "<p class='info_message'>حدث خطأ أثناء محاولة حذف البيانات، حاول مرة أخرى</p>";
        $admin_form = array(
            'action'          => "delete-admin.php?id=$id",
            'name'            => $_POST['name'],
            'email'           => $_POST['email'],
            'password'        => $_POST['password'],
            'job_title'       => $_POST['job_title'],
            'creation_date'   => $_POST['creation_date'],
            'notes'           => $_POST['notes'],
            'submit_value'    => 'حذف',
            'submit_name'     => 'delete',
            'cancel_url'      => 'admin.php#archive',
            'cancel_caption'  => 'ارجع إلى قائمة مديرى الموقع الحاليين'
        );
        include('inc/admin_form.php');
    }
} else { # If the user did not press the (delete) button
    # instructions to display the form through which we delete admins
    $result = mysql_query("
        SELECT *
        FROM admins
        WHERE id = $id
    ");
    if ($result != false) {
        $row = mysql_fetch_array($result);
    }

    $admin_form = array(
        'action'          => "delete-admin.php?id=$id",
        'name'            => stripslashes($row['name']),
        'email'           => stripslashes($row['email']),
        'password'        => '',
        'job_title'       => stripslashes($row['job_title']),
        'creation_date'   => $row['creation_date'],
        'notes'           => stripslashes($row['notes']),
        'submit_value'    => 'حذف',
        'submit_name'     => 'delete',
        'cancel_url'      => 'admin.php#archive',
        'cancel_caption'  => 'ارجع إلى قائمة مديرى الموقع الحاليين'
    );
    include('inc/admin_form.php');
}
?>
<br /><br /><br />

<?php include('inc/footer.php') ?>