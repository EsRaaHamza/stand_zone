<!-- begin of functions.php file in the front end includes-->
<?php

# This function generates a random strong password that consists of letters, numbers and symbols

function generate_password($password_length = 15) {

    # make an array of numbers

    $a = range(0, 9);

    # make an array of lowercase letters

    $b = range('a', 'z');

    # make an array of uppercase letters

    $c = range('A', 'Z');

    # make an array of symbols

    $d = array('~', '!', '@', '#', '%', '^', '&', '*', '{', '}');

    # merge all arrays in one array

    $values = array_merge($a, $b, $c, $d);

    # re-arrange values of the array randomly

    shuffle($values);

    # get number of elements of the array

    $num_of_elements = count($values);

    # generate the password

    $password = '';

    for ($i = 0; $i <= $password_length; $i++) {

        $password .= $values[rand(0, $num_of_elements)];

    }

    

    return $password;

}











# This function change width and height of any YouTube video or any flash object.

# We can use it to change dimensions of any flash object to fit our design or purposes.

# I have found this function in this website http://www.copterlabs.com/blog/dynamically-change-width-height-flash-objects

function resizeMarkup( $markup, $dimensions) {

    $w = $dimensions['width'];

    $h = $dimensions['height'];

    $patterns = array();

    $replacements = array();

    if ( !empty( $w ) ) {

        $patterns[] = '/width="([0-9]+)"/';

        $patterns[] = '/width:([0-9]+)/';

        $replacements[] = 'width="' . $w . '"';

        $replacements[] = 'width:' . $w;

    }

    if ( !empty( $h ) ) {

        $patterns[] = '/height="([0-9]+)"/';

        $patterns[] = '/height:([0-9]+)/';

        $replacements[] = 'height="' . $h . '"';

        $replacements[] = 'height:' . $h;

    }

    return preg_replace( $patterns, $replacements, $markup );

}









# this function replaces spaces with the provided character

function replace_spaces($str, $character_to_use) {

    for ($i = 0; $i < 5; $i++) {

        $str = str_replace('  ', ' ', $str);

    }

    

    $str = str_replace(' ', "$character_to_use", trim($str));

    

    for ($i = 0; $i < 5; $i++) {

        $str = str_replace("{$character_to_use}{$character_to_use}", "$character_to_use", $str);

    }

    

    return $str;

}









# This function fetchs the embed code of a youtube video from its url

function fetch_youtube_embed_code($url_of_youtube_video, $desired_width, $desired_height) {

    # we get the unique video id from the url by matching the pattern

    preg_match("/v=([^&]+)/i", $url_of_youtube_video, $matches);

    $id = $matches[1];



    # this is your template for generating embed codes

    //$code = '<object width="425" height="344"><param name="movie" value="http://www.youtube.com/v/{id}&hl=en_US&fs=1&"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/{id}&hl=en_US&fs=1&" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="425" height="344"></embed></object>';

    $code = "<iframe width='$desired_width' height='$desired_height' src='http://www.youtube.com/embed/{id}' frameborder='0' allowfullscreen></iframe>";



    # we replace each {id} with the actual ID of the video to get embed code for this particular video

    $code = str_replace('{id}', $id, $code);

    return $code;

}





# This function extract id of the youtube video from its url

function extract_youtube_video_id($url_of_youtube_video) {

    # we get the unique video id from the url by matching the pattern

    preg_match("/v=([^&]+)/i", $url_of_youtube_video, $matches);

    $id = $matches[1];

    

    return $id;

}







# This function returns name of the current page with its extension like ( index.html ) or ( about_us.php )...

# I have found this function somewhere on the internet

function get_current_page_name() {

    $current_page_name = substr( $_SERVER["SCRIPT_NAME"], strrpos( $_SERVER["SCRIPT_NAME"],"/" ) + 1 );

    return $current_page_name;

}







# This function returns the full current url (like http://amazon.com/buy-online.php?section=books&cat=computers&id=15 )

function get_current_url() {

    $current_url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

    return $current_url;

}





# This function gets ip address of the website visitor

# it is from here -> http://www.kavoir.com/2010/03/php-how-to-detect-get-the-real-client-ip-address-of-website-visitors.html

function get_ip_address() {

    foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {

        if (array_key_exists($key, $_SERVER) === true) {

            foreach (explode(',', $_SERVER[$key]) as $ip) {

                if (filter_var($ip, FILTER_VALIDATE_IP) !== false) {

                    return $ip;

                }

            }

        }

    }

}







# this function is to remove spaces, duplicated values and empty values from a string

function format_data($data_to_format) {

    $data = explode('*', $data_to_format);

    

    # remove the spaces from the beginning and from the end of each element of the array

    //foreach ($data as $key => $value) {

    //    $data["$key"] = trim($value);

    //}

    $data = array_map("trim", $data);

    # remove the duplicated values from the array

    $data = array_unique($data);

    # remove (0), (null), (false) and ('') from the array

    $data = array_filter($data);

    

    $formatted_data = implode('*', $data);

    return $formatted_data;

}









# This function used with the pagination bar

# Note that this function needs the get_current_page_name() function to work properly

function set_pagination( $total_num_of_records_we_are_going_to_fetch, $num_of_results_per_page = 50 ) {

    # $pagination() array is necessary for ( Pagination Bar )

    $pagination['current_page_name']       = get_current_page_name(); # get_current_page_name() is a user-defined function

    $pagination['first_page']              = 1;

    $pagination['current_page']            = empty( $_GET['page'] ) ? 1 : $_GET['page']; # If current page is empty (have no value) then make it equals to 1

    $pagination['next_page']               = $pagination['current_page'] + 1;

    $pagination['previous_page']           = $pagination['current_page'] - 1;

    $pagination['num_of_results_per_page'] = $num_of_results_per_page;

    $pagination['start_record']            = ( $pagination['current_page'] - 1 ) * $pagination['num_of_results_per_page'];



    # Determine last page number

    $pagination['last_page'] = ceil( $total_num_of_records_we_are_going_to_fetch / $pagination['num_of_results_per_page'] );



    # If there was no result then make the last page equals to 1

    if ( $pagination['last_page'] == 0 ) { $pagination['last_page'] = 1; }



    return $pagination;

}







# This function adds "http://" to any url that does not include it in the beginning

# this function has been defined by me ( Amr Mekkawy )

function add_http_to_url( $url ) {

    if ( substr( $url, 0, 8 ) != 'https://' ) {

        if ( substr( $url, 0, 7 ) != 'http://' ) {

            $url = 'http://' . $url;

        }

    }

    return $url;

}













# This function returns a the first given (number of words) from the given string

function brief_text($full_text, $number_of_returned_words) {

    $retval = $full_text;	//Just in case of a problem

    $words_array = explode(" ", $full_text);

    if (count($words_array) <= $number_of_returned_words) {    //Already short enough, return the whole thing

        $retval = $full_text;

    } else {    //Need to chop of some words

        array_splice($words_array, $number_of_returned_words);

        $retval = implode(" ", $words_array);

    }

    return $retval;

}





# This function will resize and save a copy of an uploaded image

# It will maintain the proportion and disproportion between width and height of the image

//function make_image_copy( $temporary_name, $original_type, $original_width, $original_height, $new_width, $new_height, $new_image_path ) {
function make_image_copy( $temporary_name, $original_type, $original_width, $original_height, $new_width, $new_image_path ) {

    # 1- Create the temporary source image according to type of the uploaded image

    if ( $original_type == "image/jpg" || $original_type == "image/jpeg" || $original_type == "image/pjpeg" ) {

        $source_image = imagecreatefromjpeg( $temporary_name );

    } elseif ( $original_type == "image/gif" ) {

        $source_image = imagecreatefromgif( $temporary_name );

    } elseif ( $original_type == "image/png" || $original_type == "image/x-png" ) {

        $source_image = imagecreatefrompng( $temporary_name );

    }



    # 2- Create the temporary destination image with the desired width and height

    # Set new height of the image Maintaining the proportion and disproportion between dimensions of the image

    $new_height = ceil( $original_height * $new_width / ($original_width *0.5) );

    $destination_image = imagecreatetruecolor( $new_width, $new_height );



    # 3- Copy the image from the temporary source to the temporary destination image

    imagecopyresampled( $destination_image, $source_image, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height);



    # 4- Save the new created image according to its type

    if ( $original_type == "image/jpg" || $original_type == "image/jpeg" || $original_type == "image/pjpeg" ) {

        imagejpeg( $destination_image, $new_image_path, 70 );

    } elseif ( $original_type == "image/gif" ) {

        imagegif($destination_image, $new_image_path);

    } elseif ( $original_type == "image/png" || $original_type == "image/x-png" ) {

        imagepng($destination_image, $new_image_path);

    }



    # 5- Destroy source image and destination image

    imagedestroy( $source_image );

    imagedestroy( $destination_image );

    return true;

}



# This function will resize and save a copy of an uploaded image

# It will maintain the proportion and disproportion between width and height of the image

function make_image_copy_thumb( $temporary_name, $original_type,$start_width, $start_height, $original_width, $original_height, $new_width, $new_height, $new_image_path ) {

    # 1- Create the temporary source image according to type of the uploaded image

    if ( $original_type == "image/jpg" || $original_type == "image/jpeg" || $original_type == "image/pjpeg" ) {

        $source_image = $temporary_name;

    } elseif ( $original_type == "image/gif" ) {

        $source_image = $temporary_name;

    } elseif ( $original_type == "image/png" || $original_type == "image/x-png" ) {

        $source_image =$temporary_name;

    }



    # 2- Create the temporary destination image with the desired width and height

    # Set new height of the image Maintaining the proportion and disproportion between dimensions of the image

//    $new_height = ceil( $original_height * $new_width / $original_width );

    $destination_image = imagecreatetruecolor( $new_width, $new_height );



    # 3- Copy the image from the temporary source to the temporary destination image



    # 4- Save the new created image according to its type

    if ( $original_type == "image/jpg" || $original_type == "image/jpeg" || $original_type == "image/pjpeg" ) {

        imagejpeg( $destination_image, $new_image_path, 70 );

    } elseif ( $original_type == "image/gif" ) {

        imagegif($destination_image, $new_image_path);

    } elseif ( $original_type == "image/png" || $original_type == "image/x-png" ) {

        imagepng($destination_image, $new_image_path);

    }



    # 5- Destroy source image and destination image

    imagedestroy( $destination_image );

    return true;

}







// this function will send a formatted email

function send_email ($from, $to, $subject, $message, $Cc = '', $Bcc = '') {

    # Content of the newsletter

    $message_body =<<<EOF

        <!DOCTYPE html>

        <html>

            <head>

                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

                <title>$subject</title>

            </head>

            <body>

                <div style='direction: rtl; text-align: justify; font: 13px/21px tahoma, verdana, sans-serif;'>

                    $message

                </div>

            </body>

        </html>

EOF;



    # In case any of our lines are larger than 70 characters, we should use wordwrap()

    $message_body = wordwrap( $message_body, 70 );

    # To send HTML mail, the Content-type header must be set

    $headers  = "MIME-Version: 1.0" . "\r\n";

    $headers .= "Content-type:text/html; charset=UTF-8" . "\r\n";

    $headers .= "From: $from" . "\r\n";

    $headers .= "Cc: $Cc" . "\r\n";

    $headers .= "Bcc: $Bcc" . "\r\n";

    

    # Send the email

    return mail( $to, $subject, $message_body, $headers ); // Returns TRUE if the mail was successfully accepted for delivery, FALSE otherwise.

}











function show_flash($file_name, $path, $name, $width, $height) {

 $x = "

    <object id='FlashID' classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' width='$width' height='$height'>

        <param name='movie' value='$path'>

        <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->

        <!--[if !IE]>-->

        <object type='application/x-shockwave-flash' data='$path' width='$width' height='$height'>

            <!--<![endif]-->

            <param name='quality' value='high' />

            <PARAM NAME=wmode VALUE='transparent'>

            <param name='wmode' value='opaque' />

            <param name='swfversion' value='6.0.65.0' />

            <param name='wmode' value='transparent'>

            <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you dont want users to see the prompt. -->

            <param name='expressinstall' value='Scripts/expressInstall.swf'>

            <EMBED src='$file_name' quality='high' WMODE='transparent' WIDTH='$width' HEIGHT='$height' NAME='$name' ALIGN='' TYPE='application/x-shockwave-flash' PLUGINSPAGE='http://www.macromedia.com/go/getflashplayer'></EMBED>

            <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->

            <div>

                <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>

                <p><a href='http://www.adobe.com/go/getflashplayer'><img src='http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif' alt='Get Adobe Flash player' width='112' height='33' /></a></p>

            </div>

            <!--[if !IE]>-->

        </object>

        <!--<![endif]-->

    </object>

   ";

 return $x;

}

#merge image 



function merge($filename_x, $filename_y, $filename_result) {

 // Get dimensions for specified images

 list($width_x, $height_x) = getimagesize($filename_x);

 list($width_y, $height_y) = getimagesize($filename_y);

 // Create new image with desired dimensions

 $image = imagecreatetruecolor($width_x , $height_x );

 // Load images and then copy to destination image

$exe=explode(".",$filename_x);

$exe = strtolower(array_pop($exe));

if($exe=='gif'){

      $image_x = imagecreatefromgif($filename_x); 

}elseif($exe=='jpg'||$exe=='jpeg'||$exe=='pjpeg'){

  $image_x = imagecreatefromjpeg($filename_x);   

}elseif($exe=='png'||$exe=='x-png'){

      $image_x = imagecreatefrompng($filename_x); 

}else{

  $image_x = imagecreatefromjpeg($filename_x); 

}



 $image_y = imagecreatefrompng($filename_y);

 

 imagecopy($image, $image_x, 0, 0, 0, 0, $width_x, $height_x);

//imagecopy($image, $image_y,0,$height_x, 0, 0, $width_y, $height_y);

 imagecopy($image, $image_y,0,$height_x-$height_y, 0, 0, $width_y, $height_y);



 // Save the resulting image to disk (as JPEG)



 imagejpeg($image, $filename_result);

 if ($exe=='jpg'||$exe=='jpeg'||$exe=='pjpeg') {

        //unlink($img_to_apply_watermark_to);

        imagejpeg($image, $filename_result);

    } else if ($exe=='png'||$exe=='x-png') {

        //unlink($img_to_apply_watermark_to);

        imagepng($image, $filename_result);

    } else if ($exe == "gif") {

        //unlink($img_to_apply_watermark_to);

        imagegif($image, $filename_result);

    }

 // Clean up



 imagedestroy($image);

 imagedestroy($image_x);

 imagedestroy($image_y);



}



#merge image 



function merge_store($filename_x, $filename_y, $filename_result) {

 // Get dimensions for specified images

 list($width_x, $height_x) = getimagesize($filename_x);

 list($width_y, $height_y) = getimagesize($filename_y);

 // Create new image with desired dimensions

 $image = imagecreatetruecolor($width_x , $height_x );

 // Load images and then copy to destination image

$exe=explode(".",$filename_x);

$exe = strtolower(array_pop($exe));

if($exe=='gif'){

      $image_x = imagecreatefromgif($filename_x); 

}elseif($exe=='jpg'||$exe=='jpeg'||$exe=='pjpeg'){

  $image_x = imagecreatefromjpeg($filename_x);   

}elseif($exe=='png'||$exe=='x-png'){

      $image_x = imagecreatefrompng($filename_x); 

}else{

  $image_x = imagecreatefromjpeg($filename_x); 

}



 $image_y = imagecreatefrompng($filename_y);

 

 imagecopy($image, $image_x, 0, 0, 0, 0, $width_x, $height_x);

// imagecopy($image, $image_y,0,$height_x-$height_y, 0, 0, $width_y, $height_y);

 imagecopy($image, $image_y, $width_x, 0, $height_x, 0, $width_y, $height_y);



 // Save the resulting image to disk (as JPEG)



 imagejpeg($image, $filename_result);

 if ($exe=='jpg'||$exe=='jpeg'||$exe=='pjpeg') {

        //unlink($img_to_apply_watermark_to);

        imagejpeg($image, $filename_result);

    } else if ($exe=='png'||$exe=='x-png') {

        //unlink($img_to_apply_watermark_to);

        imagepng($image, $filename_result);

    } else if ($exe == "gif") {

        //unlink($img_to_apply_watermark_to);

        imagegif($image, $filename_result);

    }

 // Clean up



 imagedestroy($image);

 imagedestroy($image_x);

 imagedestroy($image_y);



}

##############################################3

# this function will copy a watermark image to the given image and will place the new image in the given place

function make_watermark($watermark_img, $img_to_apply_watermark_to, $place_to_save_new_img_at, $margin_right = 0, $margin_bottom = 0, $img_quality = 100) {

    # "$watermark_img" the full path and file name of the watermark image (must be a .png image)

    # "$img_to_apply_watermark_to" is the full path and file name of the image we are going to apply watermark to

    # "$place_to_save_new_img_at" is the full path and file name of the new image after applying watermark to and it could be the same as "$img_to_apply_watermark_to" if we want to save it in the same place

    # "$margin_right" is the margin from the right edge

    # "$margin_bottom" is the margin from the bottom edge

    

    $stamp = imagecreatefrompng($watermark_img);

    

    $img_type = explode(".", $img_to_apply_watermark_to);

    $img_ext  = strtolower(array_pop($img_type));

    if ($img_ext == "jpg" || $img_ext == "jpeg") {

        $im = imagecreatefromjpeg($img_to_apply_watermark_to);

    } else if ($img_ext == "png") {

        $im = imagecreatefrompng($img_to_apply_watermark_to);

    } else if ($img_ext == "gif") {

        $im = imagecreatefromgif($img_to_apply_watermark_to);

    }

    

    // get the height/width of the stamp image

    $sx = imagesx($stamp); // returns the width of the given image of FALSE on error

    $sy = imagesy($stamp); // returns the height of the given image of FALSE on error

    

    // Copy the stamp image onto our photo using the margin offsets and the photo width to calculate positioning of the stamp. 

    imagecopy($im, $stamp, imagesx($im) - $sx - $margin_right, imagesy($im) - $sy - $margin_bottom, 0, 0, imagesx($stamp), imagesy($stamp));

    

    if ($img_ext == "jpg" || $img_ext == "jpeg") {

        //unlink($img_to_apply_watermark_to);

        imagejpeg($im, $place_to_save_new_img_at, $img_quality);

    } else if ($img_ext == "png") {

        //unlink($img_to_apply_watermark_to);

        imagepng($im, $place_to_save_new_img_at);

    } else if ($img_ext == "gif") {

        //unlink($img_to_apply_watermark_to);

        imagegif($im, $place_to_save_new_img_at);

    }

    

    imagedestroy($stamp);

    imagedestroy($im);

}





//You do not need to alter these functions

function resizeThumbnailImage($thumb_image_name, $image, $width, $height, $start_width, $start_height, $scale){

	list($imagewidth, $imageheight, $imageType) = getimagesize($image);

	$imageType = image_type_to_mime_type($imageType);

	

	$newImageWidth = ceil($width * $scale);

	$newImageHeight = ceil($height * $scale);

	$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);

	switch($imageType) {

		case "image/gif":

			$source=imagecreatefromgif($image); 

			break;

	    case "image/pjpeg":

		case "image/jpeg":

		case "image/jpg":

			$source=imagecreatefromjpeg($image); 

			break;

	    case "image/png":

		case "image/x-png":

			$source=imagecreatefrompng($image); 

			break;

  	}



	imagecopyresampled($newImage,$source,0,0,$start_width,$start_height,$newImageWidth,$newImageHeight,$width,$height);

	switch($imageType) {

		case "image/gif":

	  		imagegif($newImage,$thumb_image_name); 

			break;

      	case "image/pjpeg":

		case "image/jpeg":

		case "image/jpg":

	  		imagejpeg($newImage,$thumb_image_name,90); 

			break;

		case "image/png":

		case "image/x-png":

			imagepng($newImage,$thumb_image_name);  

			break;

    }

	chmod($thumb_image_name, 0777);

	return $thumb_image_name;

}

//You do not need to alter these functions

function getHeight($image) {

	$size = getimagesize($image);

	$height = $size[1];

	return $height;

}

//You do not need to alter these functions

function getWidth($image) {

	$size = getimagesize($image);

	$width = $size[0];

	return $width;

}



?>
<!-- end of functions.php file in the front end includes-->
