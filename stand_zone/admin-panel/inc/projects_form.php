<!--
<?php

var_dump($articles);
?>
-->


<form id="news_form" action="<?php echo $articles['action'] ?>" method="post" enctype="multipart/form-data" >
    <table border="0">  
       
        <tr>
           <td class="caption">title:</td>
            <td><input type="text" name="title" value="<?php echo $articles['title'] ?>" class="textbox" style="width: 440px;" id="news_title" /></td>
            
        </tr>
       
        <tr>
             <td class='caption'>Attached image: </td> 
            <td>
                <?php
                echo!empty($articles['image_name']) ? "<p><img src='../uploads/projects/{$articles['image_name']}' alt='' width='150' style='padding: 3px; border: 1px solid #ccc;' /> </p>" : '';
                if ($current_page != 'delete-articles.php') {
                    echo "<input type='file' name='image' class='textbox' style='width: 225px; direction:ltr;' /> <span  class='hint' > Image dimensions must be Height 400 and width 1000 </span> ";
                }
                ?>
            </td>
                  
        </tr>
        <tr>
            <td class="caption">Date </td>
            <td><input type="text" name="date" value="<?php echo $articles['date'] ?>" class="textbox" style="width: 110px; text-align: center; direction: ltr;" maxlength="10" /></td>
        </tr>
        <tr>
            <td class="caption" style="vertical-align: top; padding-top: 20px;">content : </td>
            <td style="padding-top: 10px;">
                <p style="padding: 0 0 10px; text-align: center;"><a href="javascript:open_popup_window('upload-image.php', 'upload_image', 800, 400);" class="normal_link">&laquo; Click here to add photos to content &raquo;</a></p>
                <div class="container_shadow">
                    <textarea name="content" cols="50" rows="20" class="mceEditor"><?php echo $articles['content'] ?></textarea>
                    <!-- <textarea name="content" cols="50" rows="20" class="mceEditor"><?php var_dump($articles) ?></textarea> -->

                </div>
            </td>
        </tr>
        <tr>
            <td class="caption"></td>
            <td><input type="radio" name="display" value="yes" <?php echo $articles['display'] == 'yes' ? 'checked' : '' ?> /> Save project and publish on website now</td>
        </tr>
        <tr>
            <td class="caption"></td>
            <td><input type="radio" name="display" value="no" <?php echo $articles['display'] == 'no' ? 'checked' : '' ?> />  Save project but don't publish on website </td>
        </tr>     
        <tr>
            <td class="caption"></td>
            <td style="text-align: right;">
                <br />
                <input type="submit" name="<?php echo $articles['submit_name'] ?>" value="<?php echo $articles['submit_value'] ?>" class="submit_button" />
                <span class="hint">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <a href="<?php echo $articles['cancel_url'] ?>" class="normal_link"><?php echo $articles['cancel_caption'] ?></a>
            </td>
        </tr>
        <tr>
            <td class="caption"></td>
            <td>
                <p id="what_is_wrong" class="something_wrong">
                    <img src="../img/error.png" alt="" width="15" />
                    <span>There is missing data ...</span>
                </p>
            </td>
        </tr>             
    </table>
</form>
