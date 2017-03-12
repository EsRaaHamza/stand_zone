<!-- begin of contact-us.tpl file in the front end templates-->
<div class="page">
    <div class="container " style="background-color: ">
        <h3 class="page_title" >ContactUs</h3>
        
        <div style="text-align: left; font-size:12px;">
            <ul>
            {foreach from=$content item=hi}
             <li>{$hi.content}</li>
              {/foreach}
             </ul>
<!--                {$words}-->
            <br/>

        </div>
        
<h4 style="text-align: left;">or use the following form</h4>
        
        <div class="page_c" style="">
            <br/>
            <form id="contact_form" action="contact-us.php" method="post" onsubmit="return false;"><br/>
                <div id="send_result" ></div>
                <br/>
                <table border="0" style="padding:0 10px 0 15px ">
                    
                    <tr>
                        <td class="caption_out"></td>
                        <td style="text-align: left; color: red; font-size: 12px;padding:0 0 0 10px;">*  data required</td>
                    </tr>
                    
                    <tr>
                        <td class="caption_out">Name: <span class="required">*</span></td>
                        <td><input type="text" name="name" value="" maxlength="30" /></td>
                    </tr>
                    <tr>
                        <td class="caption_out">Email: <span class="required">*</span></td>
                        <td><input id="contact_email" type="text" name="email" value="" style="direction: ltr;" maxlength="40" /></td>
                    </tr>
                    <tr>
                        <td class="caption_out"> Subject: <span class="required">*</span></td>
                        <td><input type="text" name="subject" value="" /></td>
                    </tr>
                    <tr>
                        <td class="caption_out" style="vertical-align: top; padding-top: 5px;">Message: <span class="required">*</span></td>
                        <td><textarea name="message" rows="20" cols="10" style="font-size: 1em; height: 200px; width: 300px;"></textarea></td>
                    </tr>
                    <tr>
                        <td class="caption_out">what is value  ( <b>{$random_num_1} + {$random_num_2}</b> ): <span class="required">*</span></td>
                        <td><input type="text" name="norobot" style="width: 100px; text-align: center;" maxlength="2" /></td>
                    </tr>
                    <tr>
                        <td class="caption_out"></td>
                        <td style="padding: 10px 0 0 0;">
                            <!--<input type="hidden" name="ok" value="ok" />-->
                            <input type="button" name="send" value="Send" onclick="send_message();"  style="width:80px;"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="caption_out"></td>
                        <td>
                            <p id="what_is_wrong" class="something_wrong">
                                <img src="img/error.png" alt="" width="15" />
                                <span style="color: red; padding-left: 15px">Data required...</span>
                            </p> <br/><br/>
                        </td>
                    </tr>
                    
                </table>
            </form>  
        </div>       
    </div>
    
    
 
</div>



<!-- end of contact-us.tpl file in the front end templates-->


