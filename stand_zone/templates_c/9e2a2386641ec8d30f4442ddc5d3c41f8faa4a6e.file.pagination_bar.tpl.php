<?php /* Smarty version Smarty-3.0.7, created on 2017-03-02 17:55:43
         compiled from "templates/pagination_bar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2828458b8326f416327-16435634%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9e2a2386641ec8d30f4442ddc5d3c41f8faa4a6e' => 
    array (
      0 => 'templates/pagination_bar.tpl',
      1 => 1488442265,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2828458b8326f416327-16435634',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!-- BEGIN PAGINATION BAR template -->



<div id='pagination'>



    <?php echo $_smarty_tpl->getVariable('prev_link')->value;?>








    <?php  $_smarty_tpl->tpl_vars['page'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('page_number')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['page']->key => $_smarty_tpl->tpl_vars['page']->value){
?>



        <?php echo $_smarty_tpl->tpl_vars['page']->value;?>




    <?php }} ?>







    <?php echo $_smarty_tpl->getVariable('last_page')->value;?>




    <?php echo $_smarty_tpl->getVariable('next_link')->value;?>




</div>



<div style='text-align: center'><?php echo $_smarty_tpl->getVariable('first_last')->value;?>
</div>



<!-- END PAGINATION BAR template -->



