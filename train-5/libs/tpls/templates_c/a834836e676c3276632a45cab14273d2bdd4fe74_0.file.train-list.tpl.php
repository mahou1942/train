<?php
/* Smarty version 3.1.30, created on 2018-04-20 15:30:59
  from "C:\WAMP\Apache24\htdocs\train-5\libs\tpls\templates\train-list.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ad99733e80ab7_78362272',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a834836e676c3276632a45cab14273d2bdd4fe74' => 
    array (
      0 => 'C:\\WAMP\\Apache24\\htdocs\\train-5\\libs\\tpls\\templates\\train-list.tpl',
      1 => 1523627454,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:foot.tpl' => 1,
  ),
),false)) {
function content_5ad99733e80ab7_78362272 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<table width="<?php echo $_smarty_tpl->tpl_vars['width']->value;?>
" border="<?php echo $_smarty_tpl->tpl_vars['border']->value;?>
">

    <tr>
      <td><?php echo $_smarty_tpl->tpl_vars['thd1']->value;?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['thd2']->value;?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['thd3']->value;?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['thd4']->value;?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['thd5']->value;?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['thd6']->value;?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['thd7']->value;?>
</td>
    </tr>


  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['myDatas']->value, 'myData');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['myData']->value) {
?>
	<tr>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['myData']->value, 'value', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
?>
    <td><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</td>
  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

  </tr>
  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>



</table>

<?php $_smarty_tpl->_subTemplateRender("file:foot.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
