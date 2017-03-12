<?php

# Set accepted types of the uploaed images

$accepted_image_types = array("image/gif", "image/jpg", "image/jpeg", "image/pjpeg", "image/png", "image/x-png");

# Set a variable to hold all error message that may exist

$error_message = '';

# If there was an error resulting from the file upload process

if ( $_FILES["image"]["error"] > 0 ) {

    $error_message .= "<p class='info_message'>Error resulting from the file upload process - error number: {$_FILES["image"]["error"]}</p>";

}

# If type of the uploaded image does not match any of the accepted types

if ( !in_array( $_FILES['image']['type'], $accepted_image_types ) ) {

    $error_message .= "<p class='info_message'>The image type isn't allowed<br /><br /> image must be of type ( jpg ) or ( gif ) or ( png )</p>";

}

# If there is any error

if ( !empty( $error_message ) ) {

    # display messages that tell what is wrong

    echo( $error_message );

    # load the form with the previously entered values

    //include( 'inc/photo_form.php' );

    # exit to prevent executing rest code of the script

    die();

}



# If there is no error the script will continue and execute the following code

list( $original_width, $original_height ) = getimagesize( $_FILES['image']["tmp_name"] );

$extension_with_preceding_dot = strrchr( $_FILES['image']['name'], "." );

$new_name_without_extension =  time();

$new_image_name = $new_name_without_extension . $extension_with_preceding_dot;

make_image_copy($_FILES['image']['tmp_name'], $_FILES['image']['type'], $original_width, $original_height, $desired_img_width,  "../uploads/clients/$new_image_name" );



# make another copy of the image to use as a medium size

//make_image_copy($_FILES['image']['tmp_name'], $_FILES['image']['type'], $original_width, $original_height, $desired_medium_width, $new_height, "../uploads/img/$new_image_name" );



# make another copy of the image to use as a thumbnail

make_image_copy($_FILES['image']['tmp_name'], $_FILES['image']['type'], $original_width, $original_height, $desired_thumb_width, "../uploads/clients/thumb/$new_image_name" );



# Insert data into database

//$image_name  = $new_name_without_extension . ".jpg";

$image_name  = $new_image_name;



?>



