<!-- begin of aboutus.php file in the front end-->
<?php
include('inc/header.php');
# description of this page that appears in the meta description tag
$smarty->assign('meta_description', '');
# keywords of this page that appears in the meta keywords tag
$smarty->assign('meta_keywords', '');
# Assign to the 'content_area' the template file that holds contents of this page
$smarty->assign('content_area', 'aboutus.tpl');
$smarty->assign('page_title', " {$options['website_name']}");
/* PAGE CONTENT
========================================================= */
$id = intval(mysql_real_escape_string($_GET['id']));
$result = mysql_query("
    SELECT *
    FROM aboutus
    WHERE display = 'yes'
");
//if ($result != false) {
//    echo "it worked!!!!!!!!!!!!!";
//    $row = mysql_fetch_array($result);
//    $row['title']   = stripslashes($row['title']);
//    $row['content'] = stripslashes($row['content']);
//    # title of the current page
//    $smarty->assign('page', $row);
//}

$arr_result = array();

if($result){
//     echo'hiiiiiiiiiiiiiiii0';
    while ($data = mysql_fetch_assoc($result) )
    
    {
//        echo'hiiiiiiiiiiiiiiii1';
                     $arr_result[] = $data;
   
    }

}
//var_dump($arr_result);
$smarty->assign('content',$arr_result);


# Display the assigned content in the current page
$smarty->display( 'template.tpl' );

?>


<!-- end of about-us.php file in the front end-->