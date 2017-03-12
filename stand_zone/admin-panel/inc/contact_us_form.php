<form id="news_form" action="<?php echo $news['action'] ?>" method="post" enctype="multipart/form-data" >



    <table border="0">  



        <tr>



            <td class="caption caption_ie"><b>details</b></td>



            <td></td>



        </tr>



        <tr>



            <td colspan="2">            



<!--                <p style="padding: 0 0 10px; text-align: center;"><a href="javascript:open_popup_window('upload-image.php', 'upload_image', 800, 400);" class="normal_link">&laquo; أضغط هنا كلما أردت إضافة صورة إلى المحتوى &raquo;</a></p>-->



                <div class="container_shadow">



                    <textarea name="content" cols="50" rows="20" class="mceEditor"><?php echo $news['content'] ?></textarea>



                </div>             



            </td>



        </tr>



        <tr>



            <td class="caption"></td>



            <td style="text-align: left;">



                <br />



                <input type="submit" name="<?php echo $news['submit_name'] ?>" value="<?php echo $news['submit_value'] ?>" class="submit_button" />





            </td>



        </tr>



    </table>



</form>



