    <form action="<?php echo $reply['action'] ?>" method="post">

        <table border="0">

            <tr>

                <td class="caption caption_ie">Subject:<span class="required_data">*</span></td>

                <td><input type="text" name="subject" value="Reply from <?php echo $options['website_name'] ?> for message: <?php echo $reply['subject'] ?>" class="textbox" style="width: 400px;" /></td>

            </tr>

            <tr>

                <td class="caption caption_ie">To:<span class="required_data">*</span></td>

                <td><input type="text" name="email" value="<?php echo $reply['email'] ?>" class="textbox" style="direction: ltr; width: 400px;" /></td>

            </tr>

            <tr>

                <td class="caption caption_ie" style="vertical-align: top; padding-top: 10px;">Body:<span class="required_data">*</span></td>

                <td>

                    <div class="container_with_shadow" style="width: 750px; padding-top: 10px;">

                        <textarea name="content" cols="50" rows="20" class="mceEditor"><?php echo $reply['content'] ?></textarea>

                    </div>

                </td>

            </tr>

            <tr>

                <td colspan="2" style="text-align: left; font-size: 11px; color: red; margin-left: 4px">* Required field</td>

            </tr>

            <tr>

                <td class="caption caption_ie" ></td>

                <td style="text-align: right; padding-right: 50px;">

                    <input type="submit" name="<?php echo $reply['submit_name'] ?>" value="<?php echo $reply['submit_value'] ?>" class="submit_button" />

                    <span class="hint">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>

                    <a href="<?php echo $reply['cancel_url'] ?>" class="normal_link"><?php echo $reply['cancel_caption'] ?></a>

                </td>

            </tr>

        </table>

    </form>

