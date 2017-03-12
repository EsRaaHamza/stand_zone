<?php
include('inc/header.php');
# description of this page that appears in the meta description tag
$smarty->assign('meta_description', '');
# keywords of this page that appears in the meta keywords tag
$smarty->assign('meta_keywords', '');
# Assign to the 'content_area' the template file that holds contents of this page
$smarty->assign('content_area', 'project_details.tpl');
$smarty->assign('page_title', " {$options['website_name']}");
/* PAGE CONTENT
========================================================= */
$id = intval(mysql_real_escape_string($_GET['id']));
$result = mysql_query("
    SELECT *
    FROM projects
    WHERE id    = $id
    AND display = 'yes'
");
if ($result != false) {
    // echo "hello from the if statement";

    $row = mysql_fetch_array($result);
    // var_dump($row);
    $row['title']   = stripslashes($row['title']);
    $row['content'] = stripslashes($row['content']);

    // echo $row['title']."<br>";
    // echo $row['content'];

    # title of the current page
  
    $smarty->assign('projects', $row);
} 
$result=  mysql_query("
    UPDATE projects
    set read_times=read_times+1
    WHERE id=$id
    ");
# Display the assigned content in the current page
$smarty->display( 'template.tpl' );
?>








