<?php /* Smarty version Smarty-3.0.7, created on 2017-03-12 16:40:30
         compiled from "templates/projects.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1816758c54fcee17b97-92421777%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '431298c483d18eb7ec1da4f65d8d7430969877c9' => 
    array (
      0 => 'templates/projects.tpl',
      1 => 1489326027,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1816758c54fcee17b97-92421777',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!-- begin of projects file in the front end templates-->

<div class="page"  >
    <div class="container ">
        <h3 class="page_title" 
        style="border-left: solid 6px #e9c531; text-align: left; margin-top: 18px; padding-left: 14px;"><?php echo $_smarty_tpl->getVariable('title_page')->value;?>

        </h3>

            <p><?php echo count($_smarty_tpl->getVariable('projects')->value);?>
 </p>

         <div class="page_c" style="background-image: url(img/bg_final.jpg); height: 709px; ">
            
            <?php if (((count($_smarty_tpl->getVariable('projects')->value))<=2)){?>
hi if
            <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('projects')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
?>
            inside foreach
                <div class="col-lg-4 pull-right data_new  data_new_p animated3 bounceIn wow">
                    <div class="marg_p">
                        
                        <img src="uploads/projects/medium/<?php echo $_smarty_tpl->tpl_vars['data']->value['image_name'];?>
" class="pull-right news_img"/>
                        
                        <h3><?php echo $_smarty_tpl->tpl_vars['data']->value['title'];?>
</h3>
                        
                        <div class="details details_news"><?php echo brief_text($_smarty_tpl->tpl_vars['data']->value['content'],10);?>
</div>
                        <div>

                                <a href="project_details.php?id=<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
" 
                                   style="hover{
                                                opacity: 2;
                                                } ">
                                <img src="img/button.png" alt="back"  >
                                </a>

                       </div>

                        <!-- <a href="project_details.php?id=<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
" class='news_more'><span>More</span></a> -->
            <p class="clear"> </p>
                    </div>
                </div>
            <?php }} ?>

            <?php }else{ ?>
           <!--  <?php $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['foo']->step = 1;$_smarty_tpl->tpl_vars['foo']->total = (int)ceil(($_smarty_tpl->tpl_vars['foo']->step > 0 ? 3+1 - (1) : 1-(3)+1)/abs($_smarty_tpl->tpl_vars['foo']->step));
if ($_smarty_tpl->tpl_vars['foo']->total > 0){
for ($_smarty_tpl->tpl_vars['foo']->value = 1, $_smarty_tpl->tpl_vars['foo']->iteration = 1;$_smarty_tpl->tpl_vars['foo']->iteration <= $_smarty_tpl->tpl_vars['foo']->total;$_smarty_tpl->tpl_vars['foo']->value += $_smarty_tpl->tpl_vars['foo']->step, $_smarty_tpl->tpl_vars['foo']->iteration++){
$_smarty_tpl->tpl_vars['foo']->first = $_smarty_tpl->tpl_vars['foo']->iteration == 1;$_smarty_tpl->tpl_vars['foo']->last = $_smarty_tpl->tpl_vars['foo']->iteration == $_smarty_tpl->tpl_vars['foo']->total;?> -->
                 inside else
                 <h3><?php echo $_smarty_tpl->getVariable('projects')->value[1]['title'];?>
</h3>
                
                        
                        <div class="details details_news"><?php echo brief_text($_smarty_tpl->getVariable('projects')->value[1]['content'],10);?>
</div>
                        content
                        <?php echo $_smarty_tpl->getVariable('projects')->value[1]['content'];?>


                        <div>

                                <a href="project_details.php?id=<?php echo $_smarty_tpl->getVariable('projects')->value[1]['id'];?>
" 
                                   style="hover{
                                                opacity: 2;
                                                } ">
                                <img src="img/button.png" alt="back"  >
                                </a>

                       </div>
                       <!-- <?php }} ?> -->


            <?php }?>
            <p class="clear"> </p>
        </div>
        <br/>
        <?php $_template = new Smarty_Internal_Template('pagination_bar.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
        <br/>    
    </div>
</div>

<!-- end of projects file in the front end templates-->
