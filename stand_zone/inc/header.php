<!-- begin of header.php file in the front end includes-->
<?php
# Start a session
session_start();
error_reporting(0);
# Set the default timezone to the client timezone..
date_default_timezone_set('Asia/Riyadh');
# Load your functions
require_once( 'inc/functions.php' );
# Load website options
include( 'inc/website_options.php' );
# Make a connection to the database
include( 'admin-panel/inc/db_conn.php' );
# Include Smarty class
require_once('smarty/Smarty.class.php');
# create a smarty object
$smarty = new Smarty();
#new HTMLPurifier configruation
require_once 'htmlpurifier/library/HTMLPurifier.auto.php';
$config = HTMLPurifier_Config::createDefault();
$config->set('Core.Encoding', 'Windows-1256'); // replace with your encoding
$config->set('HTML.Doctype', 'HTML 4.01 Transitional'); // replace with your doctype
$purifier = new HTMLPurifier($config);
# Define pathes to necessary folder to smarty
$smarty->template_dir = 'templates/';
$smarty->compile_dir = 'templates_c/';
$smarty->config_dir = 'smarty/configs/';
$smarty->cache_dir = 'smarty/cache/';
# Allow using php tag in template files
$smarty->allow_php_tag = true;
# Assign name of the current page
$smarty->assign('current_page', get_current_page_name());
$smarty->assign('subscribtion_result', "");
$smarty->assign('phone_subscribtion_result', "");
# Assign current url
$smarty->assign('current_url', get_current_url());
$smarty->assign('site_name', $options["website_name"]);


##############################################
# Cell phone
###############################################
if (isset($_POST['newsletter_phone']) && !empty($_POST['newsletter_phone'])) {
    $phone = mysql_real_escape_string($_POST['newsletter_phone']);
    $date = date('Y-m-d');
    $result = mysql_query("
        INSERT INTO phone_list (phone, date)
        VALUES ('{$phone}', '{$date}')
    ");
    if (mysql_affected_rows() == 1) {
        $smarty->assign('phone_subscribtion_result', "<p class='success_message' style='font-size: 12px;  margin: 0 10px 0 10px;'>تم تفعيل اشتراكك في قائمة الجوال<br />شكرا لك على اهتمامك</p>");
    } else {
        $smarty->assign('phone_subscribtion_result', "<p class='info_message' style='font-size: 12px; margin: 0 10px 0 10px;'>حدث خطأ أثناء محاولة تسجيل هاتفك المحمول<br />أو أن عدد المسجلين المحمول لدينا بالفعل<br />حاول مره اخري</p>");
    }
}
/////*    BEGIN "NEWSLETTER" SECTION
////  ================================================= */
if (isset($_POST['news_letter_email']) && !empty($_POST['news_letter_email'])) {
    $news_letter_email = mysql_real_escape_string(strtolower($_POST['news_letter_email']));
    $date = date('Y-m-d');
    $result = mysql_query("
        INSERT INTO newsletter_subscribers (email, date)
        VALUES ('{$news_letter_email}', '{$date}')
    ");
    if (mysql_affected_rows() == 1) {
        $smarty->assign('subscribtion_result', "<p class='success_message' style='padding: 3px; font-size: 12px; margin:0 auto;'>تم حفظ البريد الإلكتروني الخاص بك بنجاح<br />شكرا لك على اهتمامك</p>");
    } else {
        $smarty->assign('subscribtion_result', "<p class='info_message' style='padding: 3px; font-size: 12px;margin:0 auto;'>حدث خطأ أثناء محاولة حفظ البريد الإلكتروني.<br />أو لأننا قد سجلت بالفعل</p>");
    }
}

$result = mysql_query("
    SELECT *
    FROM setting
    WHERE id = 1
");
$setting = mysql_fetch_array($result);
$smarty->assign('setting', $setting);
$result = mysql_query("
    SELECT *
    FROM services
    order by id desc
    LIMIT 9
");
if ($result != false) {
    while ($row = mysql_fetch_array($result)) {
        $row['title'] = stripslashes($row['title']);
        $row['content'] = stripslashes(strip_tags($row['content']));
        $services_h[] = $row;
    }
    $smarty->assign('services_h', $services_h);
}
$result = mysql_query("
    SELECT *
    FROM companies
    order by id desc
");
if ($result != false) {
    while ($row = mysql_fetch_array($result)) {
        $row['title'] = stripslashes($row['title']);
        $companies[] = $row;
    }
    $smarty->assign('companies', $companies);
}
$result = mysql_query("
    SELECT *
    FROM branches
    order by id desc
");
if ($result != false) {
    while ($row = mysql_fetch_array($result)) {
        $row['title'] = stripslashes($row['title']);
        $branches[] = $row;
    }
    $smarty->assign('branches', $branches);
}

$result = mysql_query("

    SELECT *

    FROM groups

    where image_name!=''

    order by id desc

");

if ($result != false) {

    while ($row = mysql_fetch_array($result)) {

        $row['title'] = stripslashes($row['title']);

//        $row['content'] = stripslashes(strip_tags($row['content']));

        $groups[] = $row;

    }

//    $clients['num']= mysql_num_rows($result);

//    $clients['rounda']=round($num/8);

    $smarty->assign('groups', $groups);

}


?>
<!-- end of header.php file in the front end includes-->






