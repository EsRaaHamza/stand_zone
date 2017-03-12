<?php /* Smarty version Smarty-3.0.7, created on 2017-03-09 16:21:47
         compiled from "templates/project_details.tpl" */ ?>
<?php /*%%SmartyHeaderCode:52358c156eb967a27-00350474%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0a831945936e5a5e1e6b231f580c4ca67fa99b21' => 
    array (
      0 => 'templates/project_details.tpl',
      1 => 1489065705,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '52358c156eb967a27-00350474',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="page">

    <div class="container ">

        <h3 class="page_title"><img src="img/small_icon.png" />  <?php echo $_smarty_tpl->getVariable('projects')->value['title'];?>
</h3>

        <div class="page_c">

<!--             <p class="date_page pull-left"><span>Date added:</span> <?php echo $_smarty_tpl->getVariable('projects')->value['date'];?>
 </p> -->

            <div >
            <img src="uploads/projects/medium/<?php echo $_smarty_tpl->getVariable('projects')->value['image_name'];?>
" class="img-thumbnail imh animated bounceIn" /></div>

                <?php echo $_smarty_tpl->getVariable('projects')->value['content'];?>


            <div class="share">

                <span class='st_sharethis_large' displayText='ShareThis'></span>

                <span class='st_facebook_large' displayText='Facebook'></span>

                <span class='st_twitter_large' displayText='Tweet'></span>

                <span class='st_linkedin_large' displayText='LinkedIn'></span>

                <span class='st_pinterest_large' displayText='Pinterest'></span>

                <span class='st_email_large' displayText='Email'></span>    

            </div>

            <br>

            <div class="back" >

                <a href="projects.php" ><span>Back</span></a>

            </div>

        </div>       

    </div>

</div>

