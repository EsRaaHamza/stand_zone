<?php include('inc/header.php') ?>





<?php


$id = mysql_real_escape_string($_GET['id']);





echo "<h2 class='page_title'>Delete page</h2>";





$result = mysql_query("


    DELETE FROM clients


    WHERE id = $id


");


if (mysql_affected_rows() == 1) {


    echo "<p class='success_message'>Data has been deleted successfully<br /><br /><a href='clients.php#archive' class='normal_link'>Back to archive </a></p>";


} else {


    echo "<p class='info_message'>An error occured<br /><br /><a href='clients.php#archive' class='normal_link'>Back to archive</a></p>";


}





?>


<br /><br /><br />





<?php include('inc/footer.php') ?>