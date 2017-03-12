<form id="page_form" action="<?php echo $element['action'] ?>" method="post" enctype="multipart/form-data">
    <table border="0">
        <tr>
           <td class="caption">Name :</td>
            <td><input id="title" type="text" name="title" value="<?php echo $element['title'] ?>" /></td>
        </tr>
        <tr>
            <td class="caption">URL :</td>
            <td><input id="title" type="text" name="url" value="<?php echo $element['url'] ?>" /></td>
        </tr>
        <tr>
            <td class='caption'>Attached image: </td>
            <td>
                <?php
                echo!empty($element['image_name']) ? "<p><img src='../uploads/clients/{$element['image_name']}' alt='' width='150' style='padding: 3px; border: 1px solid #ccc;' /> </p>" : '';
                if ($current_page != 'delete-clients.php') {
                    echo "<input type='file' name='image' class='textbox' style='width: 225px;' /> ";
                }
                ?>
            </td>
        </tr>
       <tr>
            <td class="caption"></td>
            <td style="text-align: right;">
                <br />
                <input type="hidden" name="submit_form" value="ok" />
                <input type='button' name='button' value='<?php echo $element['submit_value'] ?>' onclick="verify_required_data('page_form', 'what_is_wrong', 'title');" />
                <span class="hint">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                <a href="<?php echo $element['cancel_url'] ?>" class="normal_link"><?php echo $element['cancel_caption'] ?></a>
            </td>
        </tr>
        <tr>
            <td class="caption"></td>
            <td>
                <p id="what_is_wrong" class="something_wrong">
                    <img src="../img/error.png" alt="" width="15" />
                    <span>There is required data missing ...</span>
                </p>
            </td>
        </tr>
    </table>
</form>
