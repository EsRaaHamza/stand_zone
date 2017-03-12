<form id="page_form" action="<?php echo $element['action'] ?>" method="post">



    <table border="0">



        <?php



        if (get_current_page_name() == 'aboutus.php') {



        ?>



            <tr>





                 <td class="caption">Adding date</td>
                <td><input type="text" name="last_modified" value="<?php echo date('Y-m-d') ?>" style="width: 110px; text-align: center; direction: ltr; margin-right= 110px" maxlength="10" /></td>
                               




            </tr>



        <?php



        } else {



        ?>



            <tr>



                <td class="caption">last date modified</td>

                <td><input type="text" name="last_date" value="<?php echo $element['last_modified'] ?>" style="width: 110px; text-align: center; direction: ltr;" maxlength="10" disdisabled /></td>



            </tr>



            <tr>



                <td class="caption">The current date modification:</td>



                <td><input type="text" name="last_modified" value="<?php echo date('Y-m-d') ?>" style="width: 110px; text-align: center; direction: ltr;" maxlength="10" /></td>



            </tr>



        <?php



        }



        ?>



        <tr>


             <td class="caption">page name</td>
            <td><input id="title" type="text" name="title" value="<?php echo $element['title'] ?>" /></td>
            

        </tr>



        <tr>




            
<!--
            <script>
                function open_popup_window(path_of_page_to_open, name_of_window, width_of_window, height_of_window){

    window.open(path_of_page_to_open, name_of_window, "scrollbars=yes, resizable=yes, width=" + width_of_window + ", height=" + height_of_window + "");

}
            </script>
-->
            <td class="caption" style="vertical-align: top; padding-top: 20px;">page content </td>

            <td style="padding-top: 10px;">



            <p style="padding: 0 0 10px; text-align: center;">
                
                <a href="javascript:open_popup_window('upload-image.php', 'upload_image', 800, 400);" class="normal_link">&laquo; Click here to add an image to the content &raquo;
                </a>
                
            </p>


                
            <div class="container_shadow">



            <textarea name="content" cols="50" rows="20" class="mceEditor"><?php echo $element['content'] ?></textarea>



                </div>



            </td>



        </tr>



        <tr>



            <td class="caption"></td>



            <td style="text-align: right;">



                <br />



                <input type="hidden" name="submit_form" value="ok" />


                <input type='button' name='button' value='<?php echo $element['submit_value'] ?>' onclick="verify_required_data('page_form', 'what_is_wrong', 'title');" />

                <a href="<?php echo $element['cancel_url'] ?>" class="normal_link"><?php echo $element['cancel_caption'] ?></a>
                <span class="hint">&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;</span>


            </td>



        </tr>



        <tr>



            <td class="caption"></td>



            <td>



                <p id="what_is_wrong" class="something_wrong">



                    <img src="../img/error.png" alt="" width="15" />



                    <span>There is data required .. </span>



                </p>



            </td>



        </tr>



    </table>



</form>


