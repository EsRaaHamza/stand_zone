<?php
require('inc/authentication.php');
include('inc/db_conn.php');
require_once('../inc/functions.php');
include( '../inc/website_options.php' );
$current_page = get_current_page_name();
//error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Admin panel <?php echo $options['website_name'] ?></title>
        <link rel="stylesheet" type="text/css" href="../css/mygeneral.css" />
        <link rel="stylesheet" type="text/css" href="../css/back-end/mypagination.css" />

        <link rel="stylesheet" type="text/css" href="../css/back-end/mystyle.css" />
        <link rel="stylesheet" type="text/css" href="inc/tinymce/jscripts/tiny_mce/themes/advanced/skins/default/ui.css" />

        <!--[if lte IE 8]>
            <link rel="stylesheet" type="text/css" href="../css/back-end/style-ie.css" />
        <![endif]-->
        <script type="text/javascript" src="http://www.shawnolson.net/scripts/public_smo_scripts.js"></script>
        <script type="text/javascript" src="../js/functions.js"></script>
                <script type="text/javascript" src="../js/poem-format.js"></script>
        <script type="text/javascript" src="inc/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
        <script type="text/javascript" src="js/tiny_mce_custom_config.js"></script>
        <script type="text/javascript" src="js/jquery-1.6.4-min.js"></script>
        <script type="text/javascript" src="../js/my-jquery-functions.js"></script>
<!--        <script type="text/javascript" src="js/swfobject.js"></script>   //I cannot find it !!!!!!!-->
        <!--        <link rel="stylesheet" href="../css/jquery-ui.css">-->

    </head>
    <body>
        <!-- wrapper begins here -->
        <div id="wrapper" style="background: #050c35;">
            <!-- navbar begins here -->          
            <div id="navbar"  >
                <!-- begin .menu -->
                <ul class="menu" style="background-color: #501847;"    >
                    <li><a href="index.php" class="<?php echo $current_page == './index.php' ? 'current' : ''; ?>"><span>Inbox</span></a> </li>
                    <li><a href="edit-admin.php?id=7" class="<?php echo $current_page == 'edit-admin.php?id=7' ? 'current' : ''; ?>" style="border-left: none;" ><span>Website Admin </span></a></li>
                    <li><a href="./aboutus.php" class="<?php echo $current_page == 'aboutus.php' ? 'current' : ''; ?>">  About US </a></li>
                    <li><a href="./slider.php" class="<?php echo $current_page == 'slider.php' ? 'current' : ''; ?>">  Slider </a></li>
                    <li><a href="./projects.php" class="<?php echo $current_page == 'projects.php' ? 'current' : ''; ?>">  Projects </a></li>
                    <li><a href="./contact_us.php" class="<?php echo $current_page == 'contact_us.php' ? 'current' : ''; ?>">  ContactUs </a>
                    </li>
                    <li><a href="./setting.php" class="<?php echo $current_page == 'setting.php' ? 'current' : ''; ?>">  Settings </a></li>                    
                    <li><a href="./clients.php" class="<?php echo $current_page == 'setting.php' ? 'current' : ''; ?>">  Clients </a></li>                    
                    
                    <p class="clear"></p>
                </ul> 
                <!-- end .menu -->
            </div>
            <!-- navbar ends here -->
            <!-- container begins here -->
            <div id="container">
                <br/> <br/> 
                <br/> <br/> 
                
                <!-- Begin Header -->
                <div id="header">
                    <p style="text-align: right;">
                        <span class="gray_font"><?php echo $_SESSION['name']; ?></span>
                        <span class="gray_font">&nbsp; | &nbsp;</span>
                        <a href="../index.php" target="_blank" class="normal_link">Visit website</a>
                        <span class="gray_font">&nbsp; | &nbsp;</span>
                        <a href="login.php" class="normal_link">logout</a>
                    </p>
                    <h1 id="header_title" style=" text-align: right;">
                        <a href="index.php"><span class="control_panel" >Admin panel  &nbsp;</span><?php echo $options['website_name'] ?></a>
                    </h1>
                </div>
                <!-- End Header -->
