<!-- begin of contact-us.php file in the front end-->
<?php
include('inc/header.php');
# title of the current page
$smarty->assign('page_title', "{$options['website_name']} | Contact Us");
# description of this page that appears in the meta description tag
$smarty->assign('meta_description', '');
# keywords of this page that appears in the meta keywords tag
$smarty->assign('meta_keywords', '');
#  Assign to the 'content_area' the template file that holds contents of this page
$smarty->assign('content_area', 'contact-us.tpl');
################################################################################
#  CONTACT US
################################################################################
# Set 2 random numbers to verify that who uses the form is a human not a robot ( to prevent spam )
$smarty->assign('random_num_1', $_SESSION['num_1'] = rand(1, 10));
$smarty->assign('random_num_2', $_SESSION['num_2'] = rand(1, 10));

# Display the assigned content in the current page
//$result=  mysql_query("SELECT * FROM contactus	 where id=1") ;
$arr_result = array();
$result=  mysql_query("SELECT * FROM contactus") ;
if($result){
    while ($data = mysql_fetch_assoc($result) )
    
    {
                     $arr_result[] = $data;
   
    }

}
//var_dump($arr_result);
$smarty->assign('content',$arr_result);

//$arr = array(1000, 1001, 1002);
//$smarty->assign('content', $arr);

$smarty->display( 'template.tpl' );

?>









<!-- end of contact-us.php file in the front end-->