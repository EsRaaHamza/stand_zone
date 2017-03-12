<?php
/*
The next (authentication.php) file checks to see if the user is logged in or not
if not the user is redirected to the login page
and this file MUST be included in the beginning (very top) of each page we want to protect from unauthorized users
*/
require('inc/authentication.php');

include('inc/db_conn.php');
require_once('../inc/functions.php');
include( '../inc/website_options.php' );
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Website:  <?php echo $options['website_name'] ?> Upload image </title>
        <link rel="stylesheet" type="text/css" href="../css/general.css" />
        <!--[if lte IE 8]>
            <link rel="stylesheet" type="text/css" href="../css/style_ie.css" />
        <![endif]-->

        <style type="text/css">
            body {
                background: #63564D;
                color: #444;
                font: 0.813em tahoma, arial, sans-serif;
                text-align: center;
                border: solid 10px #501847 ;
            }
            #wrapper {
                direction: ltr;
                margin: 0 auto;
                padding-top: 50px;
                width: 90%;
            }
        </style>
    </head>
    <body>
        <div id="wrapper">
            <?php
            if (isset($_POST['upload']) && !empty($_POST['upload'])) {
                # Set accepted types of the uploaed images
                $accepted_image_types = array("image/gif", "image/jpg", "image/jpeg", "image/pjpeg", "image/png", "image/x-png");

                # Set a variable to hold all error message that may exist
                $error_message = '';

                # If there was an error resulting from the file upload process
                if ( $_FILES["image"]["error"] > 0 ) {
                    $error_message .= "<p>An error occured during uploading. Error number is: {$_FILES["image"]["error"]}</p>";
                }

                # If type of the uploaded image does not match any of the accepted types
                if ( !in_array( $_FILES['image']['type'], $accepted_image_types ) ) {
                    $error_message .= "<p>The type of the image you are trying to upload is unacceptable. It must be ( jpg ) or ( gif ) or ( png )</p>";
                }

                # If size of the uploaded image is greater than 200 KB
                /*
                if ($_FILES['image']['size']/1024 > 200) {
                    $uploaded_image_size = ceil($_FILES['image']['size']/1024);
                    $error_message .= "<p>حجم الصورة المرفوعة يجب ألا يزيد عن 200 كيلو بايت، فى حين أن حجم الصورة التى رفعتها هو $uploaded_image_size كيلو بايت</p>";
                }
                */
                
                # If there is any error
                if ( !empty( $error_message ) ) {
                    # display messages that tell what is wrong
                    echo( "<div class='info_message'>$error_message</div>" );
                } else { # If there is no error uploading the image
                    //list( $original_width, $original_height ) = getimagesize( $_FILES['image']["tmp_name"] );
                    $extension_with_dot = strrchr( $_FILES['image']['name'], "." );
                    $new_name_without_extension = $options['website_short_domain']. '-' . time();
                    $new_image_name = $new_name_without_extension . $extension_with_dot;

                    
//                              $myfile = "../uploads/img";
//                             if(is_dir($myfile))
//                                 {
//                                      echo ("$myfile is a directory");
//                                   }
//                             else
//                                     {
//                                       echo ("$myfile is not a directory");
//                                      }
                    $image_uploaded = move_uploaded_file($_FILES['image']['tmp_name'], "../uploads/img/$new_image_name");

                    if ($image_uploaded) {
                        //$image_full_path = str_replace('admin-panel/upload-image.php', "uploads/img/$new_image_name", get_current_url()) ;
                        $image_full_path = "{$options['website_domain']}/uploads/img/$new_image_name";
                        
                        
                        
                        echo "
                            <p class='success_message'>Image has been uploaded successfully<br /><br />Image URL: </p>
                            <input type='text' value='{$image_full_path}' style='width: 100%; text-align: center;' onclick='this.select();' />
                        ";
                        die();
                    }
                }

            }
            ?>
            
            <p style="font-family: Copperplate, Copperplate Gothic Light, fantasy; color:#fff;">choose the picture then press upload</p><br />
            <form action="upload-image.php" method="post" enctype="multipart/form-data">
                <input style="color:#fff; background-color: #501847;" type="file" name="image" /><br /><br />
                <input  style="color:#fff; background-color: #501847;" type="submit" name="upload" value="upload" />
            </form>
        </div>
    </body>
</html>
