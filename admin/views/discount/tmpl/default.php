<?php
/**
 * @version		2.0.1
 * @package		Joomla
 * @subpackage	EShop
 * @author  	Giang Dinh Truong
 * @copyright	Copyright (C) 2012 Ossolution Team
 * @license		GNU/GPL, see LICENSE.php
 */
// no direct access
defined( '_JEXEC' ) or die();
$translatable = JLanguageMultilang::isEnabled() && count($this->languages) > 1;
EshopHelper::chosen();
?>
<script type="text/javascript">	
	Joomla.submitbutton = function(pressbutton)
	{
		var form = document.adminForm;
		if (pressbutton == 'discount.cancel') {
			Joomla.submitform(pressbutton, form);
			return;
		} else {
			//Validate the entered data before submitting
			if (form.discount_value.value == '') {
				alert("<?php echo JText::_('ESHOP_ENTER_DISCOUNT_VALUE'); ?>");
				form.discount_value.focus();
				return;
			}
			if (form.discount_start_date.value != '' && form.discount_end_date.value != '' && form.discount_start_date.value > form.discount_end_date.value) {
				alert("<?php echo JText::_('ESHOP_DATE_VALIDATE'); ?>");
				form.discount_start_date.focus();
				return;
			}
			Joomla.submitform(pressbutton, form);
		}
	}
</script>
<form action="index.php" method="post" name="adminForm" id="adminForm" enctype="multipart/form-data">
	<div class="row-fluid">
		<div class="span11">
			<table class="admintable adminform" style="width: 100%;">
				<tr>
					<td class="key" width="15%">
						<span class="required">*</span>
						<?php echo  JText::_('ESHOP_DISCOUNT_VALUE'); ?>
					</td>
					<td width="25%">
						<input class="input-large" type="text" name="discount_value" id="discount_value" maxlength="255" value="<?php echo $this->item->discount_value; ?>" />
					</td>
					<td width="60%" valign="top">
						<small><?php echo JText::_('ESHOP_DISCOUNT_VALUE_HELP'); ?></small>
					</td>
				</tr>
				<tr>
					<td class="key" width="15%">
						<?php echo JText::_('ESHOP_DISCOUNT_TYPE'); ?>
					</td>
					<td width="25%">
						<?php echo $this->lists['discount_type']; ?>
					</td>
					<td width="60%" valign="top">
						<small><?php echo JText::_('ESHOP_DISCOUNT_TYPE_HELP'); ?></small>
					</td>
				</tr>
				<tr>
					<td class="key" width="15%">
						<?php echo JText::_('ESHOP_CUSTOMERGROUPS'); ?>
					</td>
					<td width="25%">
						<?php echo $this->lists['discount_customergroups']; ?>
					</td>
					<td width="60%" valign="top">
						<small><?php echo JText::_('ESHOP_CUSTOMERGROUPS_HELP'); ?></small>
					</td>
				</tr>
				<tr>
					<td class="key" width="15%">
						<?php echo JText::_('ESHOP_SELECT_PRODUCTS'); ?>
					</td>
					<td width="25%">
						<?php echo $this->lists['products']; ?>
					</td>
					<td width="60%" valign="top">
						<small><?php echo JText::_('ESHOP_DISCOUNT_PRODUCTS_HELP'); ?></small>
					</td>
				</tr>
				<tr>
					<td class="key" width="15%">
						<?php echo JText::_('ESHOP_SELECT_MANUFACTURERS'); ?>
					</td>
					<td width="25%">
						<?php echo $this->lists['manufacturers']; ?>
					</td>
					<td width="60%" valign="top">
						<small><?php echo JText::_('ESHOP_DISCOUNT_MANUFACTURERS_HELP'); ?></small>
					</td>
				</tr>
				<tr>
					<td class="key" width="15%">
						<?php echo JText::_('ESHOP_CATEGORIES'); ?>
					</td>
					<td width="25%">
						<?php echo $this->lists['categories']; ?>
					</td>
					<td width="60%" valign="top">
						<small><?php echo JText::_('ESHOP_DISCOUNT_CATEGORIES_HELP'); ?></small>
					</td>
				</tr>
				<tr>
					<td class="key" width="15%">
						<?php echo  JText::_('ESHOP_START_DATE'); ?>
					</td>
					<td width="25%">
						<?php echo JHtml::_('calendar', (($this->item->discount_start_date == $this->nullDate) ||  !$this->item->discount_start_date) ? '' : JHtml::_('date', $this->item->discount_start_date, 'Y-m-d', null), 'discount_start_date', 'discount_start_date', '%Y-%m-%d', array('style' => 'width: 100px;')); ?>
					</td>
					<td width="60%" valign="top">
						<small><?php echo JText::_('ESHOP_DISCOUNT_START_DATE_HELP'); ?></small>
					</td>
				</tr>
				<tr>
					<td class="key" width="15%">
						<?php echo  JText::_('ESHOP_END_DATE'); ?>
					</td>
					<td width="25%">
						<?php echo JHtml::_('calendar', (($this->item->discount_end_date == $this->nullDate) ||  !$this->item->discount_end_date) ? '' : JHtml::_('date', $this->item->discount_end_date, 'Y-m-d', null), 'discount_end_date', 'discount_end_date', '%Y-%m-%d', array('style' => 'width: 100px;')); ?>
					</td>
					<td width="60%" valign="top">
						<small><?php echo JText::_('ESHOP_DISCOUNT_END_DATE_HELP'); ?></small>
					</td>
				</tr>
				<tr>
					<td class="key" width="15%">
						<?php echo JText::_('ESHOP_PUBLISHED'); ?>
					</td>
					<td width="25%">
						<?php echo $this->lists['published']; ?>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<?php echo JHtml::_( 'form.token' ); ?>
	<input type="hidden" name="option" value="com_eshop" />
	<input type="hidden" name="cid[]" value="<?php echo $this->item->id; ?>" />
	<input type="hidden" name="task" value="" />
</form>