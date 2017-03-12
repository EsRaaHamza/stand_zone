    <form action="<?php echo $admin_form['action'] ?>" method="post">


        <table border="0">


            <tr>
                <td class="caption" style=" text-align: left;">Fisrt Name and last name:  </td>

                <td><input type="text" name="name" value="<?php echo $admin_form['name'] ?>" class="textbox" /></td>






            </tr>


            <tr>

                <td class="caption" style=" text-align: left;">Email:</td>
                <td><input type="text" name="email" value="<?php echo $admin_form['email'] ?>" class="textbox" style="direction: ltr;" /></td>


            </tr>


            <tr>

               <td class="caption" style=" text-align: left;">Password:</td>
                <td><input type="password" name="password" value="<?php echo $admin_form['password'] ?>" class="textbox" style="direction: ltr;" /></td>


            </tr>


            <tr>

                <td class="caption" style=" text-align: left;">job title:</td>

                <td><input type="text" name="job_title" value="<?php echo $admin_form['job_title'] ?>" class="textbox" /></td>


            </tr>


            <tr>



                 <td class="caption" style=" text-align: left;" >Date:</td>
                <td><input type="text" name="creation_date" value="<?php echo $admin_form['creation_date'] ?>" class="textbox" style="width: 110px; text-align: center; direction: ltr;" maxlength="10" /></td>
                               



            </tr>


            <tr>


               
                 <td class="caption" style="vertical-align: top; text-align: left;">Notes: <br /><span style="font-size: 11px; color: #777;">( Doesn't exceed 250 letters)</span></td>
                <td style="padding-top: 3px;"><textarea name="notes" cols="50" rows="20" class="text_area"><?php echo $admin_form['notes'] ?></textarea></td>
                 



            </tr>


            <tr>


                <td class="caption"></td>


                <td style="text-align: right;">


                    <br />


                    <input style="margin-right: 2cm; background-color:#501847; color: white;" type="submit" name="<?php echo $admin_form['submit_name'] ?>" value="<?php echo $admin_form['submit_value'] ?>" class="submit_button" />


                </td>


            </tr>


        </table>


    </form>


