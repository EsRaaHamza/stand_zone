<form style=" text-align: left;"  action="<?php echo $slider['action'] ?>" method="post" enctype="multipart/form-data" >

    <p style="color: red; ">
         you hould keep in mind image dimensions
       <br/> <span>Height :625px</span><br/>
        <span>Width :1000px</span>
    </p>
    <table border="0" >  


       


        <tr>
 <td class="caption" style=" text-align: left;">Title</td>
<td><input style=" text-align: left;" type="text" name="title" value="<?php echo $slider['title'] ?>" class="textbox" style="width: 440px;" id="news_title" /></td>
        </tr>


        <tr>
            <td class="caption" style=" text-align: left;">Link</td>
            <td><input style=" text-align: left;" type="text" name="url" value="<?php echo $slider['url'] ?>" class="textbox" style="width: 440px;" id="news_title" /></td>

        </tr>


    
        <tr>

             <td class='caption' style=" text-align: left;">Choose image: </td>
            
                        <td>


                <?php


                echo!empty($slider['image_name']) ? "<p><img src='../uploads/slider/{$slider['image_name']}' alt='' width='150' style='padding: 3px; border: 1px solid #ccc;' /> </p>" : '';


                if ($current_page != 'delete-slider.php') {


                    echo "<input type='file' name='image' class='textbox' style='width: 225px;' /> ";


                }


                ?>



            </td>


        </tr>


        <tr>


            
             <td class="caption" style=" text-align: left;">Adding date </td>
            <td><input type="text" name="date" value="<?php echo $slider['date'] ?>" class="textbox" style="width: 110px; text-align: center; direction: ltr;" maxlength="10" /></td>

           

        </tr>


        <tr>


<td class="caption" style="vertical-align: top; padding-top: 20px;  text-align: left;">Content  </td>
            <td style="padding-top: 10px;">


                <p style="padding: 0 0 10px; text-align: center;"><a href="javascript:open_popup_window('upload-image.php', 'upload_image', 800, 400);" class="normal_link">&laquo; Click Here to Add photo to the content &raquo;</a></p>


                <div class="container_shadow">


<!--            <textarea name="content" cols="50" rows="20" class="mceEditor"><?php echo $slider['content'] ?></textarea>-->
                    
                <textarea style="direction: ltr;" name="content" cols="50" rows="20" class="mceEditor">

                    
                    </textarea>
                    
                    
                    
                    
                </div>


            </td>
 

        </tr>


        <tr>


            <td class="caption"></td>


            <td style="float: left;"><input type="radio" name="display" value="yes" <?php echo $slider['display'] == 'yes' ? 'checked' : '' ?> /> Save photo and show on website now </td>


        </tr>


        <tr>


            <td class="caption"></td>


            <td style="float: left;"> <input type="radio" name="display" value="no" <?php echo $slider['display'] == 'no' ? 'checked' : '' ?> /> Save photo but Don't show on website now </td>


        </tr>     


        <tr>


            <td class="caption"></td>


            <td style="text-align: left;">


                <br />


                <input type="submit" name="<?php echo $slider['submit_name'] ?>" value="<?php echo $slider['submit_value'] ?>" class="submit_button" />


                <span class="hint">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>


                <a href="<?php echo $slider['cancel_url'] ?>" class="normal_link"><?php echo $slider['cancel_caption'] ?></a>


            </td>


        </tr>


        <tr>


            <td class="caption"></td>


            <td>


                <p id="what_is_wrong" class="something_wrong">


                    <img src="../img/error.png" alt="" width="15" />


                    <span>There is required data ..</span>


                </p>


            </td>


        </tr>             


    </table>


</form>


