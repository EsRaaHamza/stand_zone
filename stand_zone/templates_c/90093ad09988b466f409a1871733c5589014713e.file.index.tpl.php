<?php /* Smarty version Smarty-3.0.7, created on 2017-03-07 14:03:26
         compiled from "templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1138758be937e55cb81-64368737%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '90093ad09988b466f409a1871733c5589014713e' => 
    array (
      0 => 'templates/index.tpl',
      1 => 1488884597,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1138758be937e55cb81-64368737',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!-- begin of index file in the front end templates-->

<div style="min-height: 29px;"></div>

<div class="slider_off"> </div>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		if(!device.mobile() && !device.tablet()){
			liteModeSwitcher = false;
		}else{
			liteModeSwitcher = true;
		}
		if($.browser.msie && parseInt($.browser.version) < 9){
	         liteModeSwitcher = true;
	    }

			jQuery('#parallax-slider-55e34d885f2eb').parallaxSlider({
				parallaxEffect: "parallax_effect_normal"
			,	parallaxInvert: false			,	animateLayout: "simple-fade-eff"
			,	duration: 1500			,	autoSwitcher: true			,	autoSwitcherDelay: 10000			,	scrolling_description: false			,	slider_navs: true			,	slider_pagination: "none_pagination"
			,	liteMode :liteModeSwitcher
			});

	});
</script>
<div id="parallax-slider-55e34d885f2eb" class="parallax-slider">
    <ul class="baseList">
        
                <?php  $_smarty_tpl->tpl_vars['hi'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('sliders')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['hi']->key => $_smarty_tpl->tpl_vars['hi']->value){
?>
        <li data-preview="uploads/slider/<?php echo $_smarty_tpl->tpl_vars['hi']->value['image_name'];?>
" data-thumb-url="uploads/slider/<?php echo $_smarty_tpl->tpl_vars['hi']->value['image_name'];?>
" data-ulr-link="">
            <div class="slider_caption">
                <strong><?php echo $_smarty_tpl->tpl_vars['hi']->value['title'];?>
</strong> 
                
                  <?php echo $_smarty_tpl->tpl_vars['hi']->value['content'];?>

                
            </div>
        </li>
        <?php }} ?>

    </ul>
</div>







<!-- end of index file in the front end templates-->
