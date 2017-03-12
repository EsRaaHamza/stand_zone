<?php /* Smarty version Smarty-3.0.7, created on 2017-03-06 12:33:48
         compiled from "templates/aboutus.tpl" */ ?>
<?php /*%%SmartyHeaderCode:496258bd2cfc155127-91133757%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f90d9406b8c81eb68b43de732edd67160e0bbe5e' => 
    array (
      0 => 'templates/aboutus.tpl',
      1 => 1488792698,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '496258bd2cfc155127-91133757',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!-- begin of aboutus.tpl file in the front end template-->
<!--
<img src="bu.png" style="width:25px;height:40px; position: relative; left: -135px; top: -13px ;" >
<div style=" position: relative; left: 150px ; top:-70px; ">


<h4 style="color:#606060">  About STAND ZONE  </h4>
      
     <div id="pgrey">
      <p ><tt> It is a long established fact that a reader will be distracted by a readable content
      of a page when looking at its layout. The point of using Lorem lpsum that it has a-more- or less normal distrbution of letters , as opposed to using 'content here,content here' making it look like readable English . Many desktop publishing packagers and web pages editors now use Lorem lpsum
       <br>
       <b> Where does it come from</b>
       <br>
       Contrary to popular belief, Lorem lpsum isn't simply random text. It has roots in a piece of classical Latin Literature 45 BC, making it over 2000 years old. Richard McClientock.

      </tt></p>
    <button onclick="myFunction()"  class="button"> <h7 style="color: yellow;"> More>> </h7> </button>
   
<p id="seemore"></p>

<script>
function myFunction() 
{
    document.getElementById("seemore").innerHTML = "Hello World";
}
</script>
   
   </div>
    
</div>
-->

<title> About </title>
<div class="page">
    <div class="container">
<!--        <h3 class="page_title"><?php echo $_smarty_tpl->getVariable('page')->value['title'];?>
</h3>-->
        <h3 style="border-left: solid 6px #e9c531; text-align: left; margin-top: 18px; padding-left: 14px;"> About STAND ZONE </h3>
<!--
        //i tried to add a class called bullet_c fo the previous inline style but it didn't work 
        find the hashed class in the index_style.css
-->
<!--
        <div class="page_c">
            <?php echo $_smarty_tpl->getVariable('page')->value['content'];?>

            <br/>

        </div>       
-->
        
         <div >
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
    </div>
</div>


<!-- end of aboutus.tpl file in the front end templates-->
