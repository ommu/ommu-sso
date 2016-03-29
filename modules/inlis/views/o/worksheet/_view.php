<?php
/**
 * Inlis Worksheets (inlis-worksheets)
 * @var $this WorksheetController
 * @var $data InlisWorksheets
 * version: 0.0.1
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 29 March 2016, 10:00 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 *
 */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID), array('view', 'id'=>$data->ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Name')); ?>:</b>
	<?php echo CHtml::encode($data->Name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CardFormat')); ?>:</b>
	<?php echo CHtml::encode($data->CardFormat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Format_id')); ?>:</b>
	<?php echo CHtml::encode($data->Format_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CreateBy')); ?>:</b>
	<?php echo CHtml::encode($data->CreateBy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CreateDate')); ?>:</b>
	<?php echo CHtml::encode($data->CreateDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CreateTerminal')); ?>:</b>
	<?php echo CHtml::encode($data->CreateTerminal); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('UpdateBy')); ?>:</b>
	<?php echo CHtml::encode($data->UpdateBy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UpdateDate')); ?>:</b>
	<?php echo CHtml::encode($data->UpdateDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UpdateTerminal')); ?>:</b>
	<?php echo CHtml::encode($data->UpdateTerminal); ?>
	<br />

	*/ ?>

</div>