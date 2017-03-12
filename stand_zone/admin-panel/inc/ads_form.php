    <form action="<?php echo $ad['action'] ?>" method="post" enctype="multipart/form-data">
        <table border="0">
            <tr>
                <td colspan="2" style="text-align: center; line-height: 25px;">
                    <p class="some_info"><b>ملحوظة هامة:</b> أبعاد الإعلان المرفوع يجب أن تكون <b><?php echo $ad['width'] ?></b> بكسل عرض، و <b><?php echo $ad['height'] ?></b> بكسل إرتفاع، سواء كان هذا الإعلان صورة أو فلاش </p>
                </td>
            </tr>
            <?php
            if (!empty($ad['file_name'])) {
            ?>
                <tr>
                    <td class="caption">الإعلان الحالى:</td>
                    <td>
                        <?php
                        $possible_image_ext = array('.gif', '.jpg', '.jpeg', '.png');
                        $ext_with_dot = strtolower(strrchr($ad['file_name'], "."));
                        
                        if (in_array($ext_with_dot, $possible_image_ext)) {
                            echo "<img src='../uploads/ads/{$ad['file_name']}' class='ad_img' />";
                        } elseif ($ext_with_dot == '.swf') {
                            echo "
                                <script type='text/javascript'>
                                    var flashvars  = {};
                                    var attributes = {};
                                    var params     = {
                                        //wmode: 'transparent' // To make background of the flash trnsparent
                                    };
                                    swfobject.embedSWF('../uploads/ads/{$ad['file_name']}', '{$ad['type']}', '{$ad['width']}', '{$ad['height']}', '9.0.0', 'expressInstall.swf', flashvars, params, attributes);
                                </script>

                                <div class='flash_ad_container' style='width: {$ad['width']}px; margin: 0;'>
                                    <div id='{$ad['type']}'></div>
                                </div>
                            ";
                        }
                        ?>
                    </td>
                </tr>
            <?php
            }
            ?>
            <tr>
                <td class="caption"><br />أسم الإعلان:</td>
                <td><br /><input type="text" name="title" value="<?php echo $ad['title'] ?>" class="textbox" /><span class="hint"> &raquo; أى أسم لتمييز الإعلان</span></td>
            </tr>
            <tr>
                <td class="caption">ملف الإعلان:</td>
                <td><input type="file" name="ad_file" class="textbox" /><span class="hint"> &raquo; يجب أن يكون من النوع <b>jpg</b> أو <b>png</b> أو <b>gif</b> إذا كان صورة، أو من النوع <b>swf</b> إذا كان فلاش</span></td>
            </tr>
            <tr>
                <td class='caption'>رابط الإعلان:</td>
                <td><input type="text" name="url" value="<?php echo $ad['url'] ?>" class="textbox" style="direction: ltr;" /><span class="hint"> &raquo; عنوان الموقع أو الصفحة التى سيتم الإنتقال إليها عند الضغط على الإعلان (مطلوب مع الصور فقط)</span></td>
            </tr>
            <tr>
                <td class="caption">تاريخ بداية عرض الإعلان:</td>
                <td><input type="text" name="start_date" value="<?php echo $ad['start_date'] ?>" class="textbox" style="width: 110px; text-align: center; direction: ltr;" maxlength="10" /></td>
            </tr>
            <tr>
                <td class="caption">تاريخ نهاية عرض الإعلان:</td>
                <td><input type="text" name="end_date" value="<?php echo $ad['end_date'] ?>" class="textbox" style="width: 110px; text-align: center; direction: ltr;" maxlength="10" /></td>
            </tr>
            <tr>
                <td class="caption"></td>
                <td style="text-align: right;">
                    <br />
                    <input id="save" type="submit" name="<?php echo $ad['submit_name'] ?>" value="<?php echo $ad['submit_value'] ?>" class="submit_button" />
                    <span class="hint">&nbsp;&nbsp;&nbsp;&nbsp;أو&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <a href="<?php echo $ad['cancel_url'] ?>" class="normal_link"><?php echo $ad['cancel_caption'] ?></a>
                </td>
            </tr>
        </table>
    </form>
