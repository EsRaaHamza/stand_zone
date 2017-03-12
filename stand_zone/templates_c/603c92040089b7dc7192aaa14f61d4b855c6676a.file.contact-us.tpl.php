<?php /* Smarty version Smarty-3.0.7, created on 2017-03-06 10:44:07
         compiled from "templates/contact-us.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1694158bd13479c5b18-75934122%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '603c92040089b7dc7192aaa14f61d4b855c6676a' => 
    array (
      0 => 'templates/contact-us.tpl',
      1 => 1488786208,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1694158bd13479c5b18-75934122',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!-- begin of contact-us.tpl file in the front end templates-->
<div class="page">
    <div class="container " style="background-color: ">
        <h3 class="page_title" >ContactUs</h3>
        
        <div style="text-align: left; font-size:12px;">
            <ul>
            <?php  $_smarty_tpl->tpl_vars['hi'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('content')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['hi']->key => $_smarty_tpl->tpl_vars['hi']->value){
?>
             <li><?php echo $_smarty_tpl->tpl_vars['hi']->value['content'];?>
</li>
              <?php }} ?>
             </ul>
<!--                <?php echo $_smarty_tpl->getVariable('words')->value;?>
-->
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
                        <td class="caption_out">what is value  ( <b><?php echo $_smarty_tpl->getVariable('random_num_1')->value;?>
 + <?php echo $_smarty_tpl->getVariable('random_num_2')->value;?>
</b> ): <span class="required">*</span></td>
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


