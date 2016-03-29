<?php
/**
 * Inlis Locations (inlis-locations)
 * @var $this LocationController
 * @var $data InlisLocations
 * version: 0.0.1
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 29 March 2016, 11:07 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 *
 */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID), array('view', 'id'=>$data->ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Code')); ?>:</b>
	<?php echo CHtml::encode($data->Code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Name')); ?>:</b>
	<?php echo CHtml::encode($data->Name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Description')); ?>:</b>
	<?php echo CHtml::encode($data->Description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IsDelete')); ?>:</b>
	<?php echo CHtml::encode($data->IsDelete); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CreateBy')); ?>:</b>
	<?php echo CHtml::encode($data->CreateBy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CreateDate')); ?>:</b>
	<?php echo CHtml::encode($data->CreateDate); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('CreateTerminal')); ?>:</b>
	<?php echo CHtml::encode($data->CreateTerminal); ?>
	<br />

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