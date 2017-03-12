<?php include('inc/header.php') ?>
<?php
$id = 1;
$row= array();
$result = mysql_query("
    SELECT *
    FROM setting
    WHERE id = $id
");
if ($result != false) {
   
    $row = mysql_fetch_assoc($result);
//    var_dump($row);
//     echo"from if";
//    foreach ($row as $key => $value) {
//         echo"from if";
//        
//         $row["$key"] = stripslashes($value);
//    }
    
}

// include('./inc/settingimg.php');

echo '  <h2 class="page_title">  <img src="../img/setting.png" width="42" height="42"/> <span style="color: #555555;">Settings</span> </h2>' ;

    $query = "SELECT * FROM setting";
 $check = mysql_query($query) or die ("Error in query: $query. ".mysql_error()); 


# If the user pressed the submit button
if (isset($_POST['submit_form']) && !empty($_POST['submit_form'])) {
    # instructions to update existing data
    # set an array to hold all submitted values
    $element = array();
    # escape all submitted values and put each value in the array
    foreach ($_POST as $key => $value) {
        $element["$key"] = mysql_real_escape_string(trim($value));
    }
    
    #check first if the table is empty or not 
    #if it is empty then use insert data 
    #if not then use update table 
    #that is because we cannot update table which doesn't contain data ... we insert data into empty tables andwe don't update them 
    
    // execute query 
   
    // see if any rows were returned 
    if (mysql_num_rows($check) > 0) {  // if the table isn't empty and already has one row so update this row using where $id =1
      $result =  mysql_query("
         UPDATE setting
        SET fb              = '{$element['facebook']}',
            tw              = '{$element['twitter']}',
            phone           = '{$element['phone']}',
            instgram           = '{$element['instgram']}',
            google           = '{$element['google']}',
            linkedin           = '{$element['linkedin']}',
            pinterest           = '{$element['pinterest']}',
            youtube           = '{$element['youtube']}',
            email           = '{$element['email']}'
            WHERE id        = 1  ") ;
        
        
    }else{ //the table is empty "it  happens in the first time only when the user insert data for the first time so dont use update and use               insert"
           
              $result = mysql_query("
                INSERT INTO setting (phone, fb, tw,flicker,email,google,youtube,instgram,pinterest,linkedin)
                 VALUES ('{$element['phone']}', '{$element['facebook']}' , '{$element['twitter']}' , '{$element['flicker']}','{$element['email']}','{$element['google']}','{$element['youtube']}','{$element['instgram']}','{$element['pinterest']}','{$element['linkedin']}')

                 ") ;
        
        
         } 

//        or die(mysql_error());
    # display a message indicating if the data has been successfully updated or not
    if (mysql_affected_rows() == 1) {
        echo "<p class='success_message'>Data has been saved successfully<br /><br /><a href='setting.php' class='normal_link'>back </a></p>";
    } else {
        echo "<p class='info_message'>An error occured while trying to save data. Make sure you have updated data and try again </p>";
    }
} else { # If the user did not press the submit button
    ?>
    <form id="page_form" action="setting.php" method="post">
        <table border="0">
            <tr>
                <td class="caption">Twitter:</td>
                <td style="padding-top: 10px;">
                    <input type="text" name="twitter" placeholder="twitter"  
                           
                           
                           value="<?php
    
                                    if (mysql_num_rows($check) > 0)                    
                                     {
                                       echo $row['tw'];
                                     }               
                                  ?>">
                </td>
            </tr>
            
            
            <tr>
                <td class="caption">Facebook:</td>
                <td style="padding-top: 10px;">
                    <input type="text" name="facebook" placeholder="Facebook"
                           value="<?php 
    
                                   if (mysql_num_rows($check) > 0)                    
                                     {
                                       echo $row['fb'] ;
                                      }
                                  
                                  ?>">
                </td>
            </tr>

            <tr>
                <td class="caption">Instgram:</td>
                <td style="padding-top: 10px;">
                    <input type="text" name="instgram" placeholder="Instgram"
                           
                           value="<?php
                                   if (mysql_num_rows($check) > 0)                    
                                     {
                                       echo $row['instgram']; 
                                     }
                                  
                                  ?>">
                </td>
            </tr>
            <tr>
                <td class="caption">Youtube :</td>
                <td style="padding-top: 10px;">
                    <input type="text" name="youtube" placeholder="Youtube"
                           value="<?php 
    
                                   if (mysql_num_rows($check) > 0)                    
                                     {
                                       echo $row['youtube'] ;
                                      }
                                  
                                  ?>">
                </td>
            </tr>
            <tr>
                <td class="caption"> pinterest :</td>
                <td style="padding-top: 10px;">
                    <input type="text" name="pinterest" placeholder="pinterest"
                           value="<?php 
    
                                   if (mysql_num_rows($check) > 0)                    
                                     {
                                       echo $row['pinterest'] ;
                                      }
                                  
                                  ?>">
                </td>
            </tr>
            <tr>
                <td class="caption">Google+ :</td>
                <td style="padding-top: 10px;">
                    <input type="text" name="google"  placeholder="Google+"
                           value="<?php 
    
                                   if (mysql_num_rows($check) > 0)                    
                                     {
                                       echo $row['google'] ;
                                      }
                                  
                                  ?>">
                </td>
            </tr>
            <tr>
                <td class="caption"> Linkedin:</td>
                <td style="padding-top: 10px;">
                    <input type="text" name="linkedin"  placeholder="linkedin"
                           value="<?php 
    
                                   if (mysql_num_rows($check) > 0)                    
                                     {
                                       echo $row['linkedin'] ;
                                      }
                                  
                                  ?>">
                </td>
            </tr>
            <tr>
                <td class="caption">Phone  :</td>
                <td style="padding-top: 10px;">
                    <input type="text" name="phone"  placeholder="phone"
                           value="<?php 
    
                                   if (mysql_num_rows($check) > 0)                    
                                     {
                                       echo $row['phone'] ;
                                      }
                                  
                                  ?>">
                </td>
            </tr>
            <tr>
                <td class="caption">flicker  :</td>
                <td style="padding-top: 10px;">
                    <input type="text" name="flicker"  placeholder="flicker"
                           value="<?php 
    
                                   if (mysql_num_rows($check) > 0)                    
                                     {
                                       echo $row['flicker'] ;
                                      }
                                  
                                  ?>">
                </td>
            </tr>
            <tr>
                <td class="caption"> Email  :</td>
                <td style="padding-top: 10px;">
                    <input type="text" name="email"  placeholder="someone@example.com"
                           value="<?php 
    
                                   if (mysql_num_rows($check) > 0)                    
                                     {
                                       echo $row['email'] ;
                                      }
                                  
                                  ?>">
                </td>
            </tr>
           

            <tr>
                <td class="caption"></td>
                <td style="text-align: right;">
                    <br />
                    <input type="hidden" name="submit_form" value="ok" />
                    <input type='submit' name='button' value='save'  />
                </td>
            </tr>
        </table>
    </form>

    <?php
}
?>
<br /><br /><br />



<?php include('inc/footer.php') ?>