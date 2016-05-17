<?php
/**
 * View Inlis Sync Collectionloans (view-inlis-sync-collectionloans)
 * @var $this LoanController
 * @var $data ViewInlisSyncCollectionloans
 * version: 0.0.1
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 17 May 2016, 17:24 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 *
 */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_key')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->date_key), array('view', 'id'=>$data->date_key)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('loans')); ?>:</b>
	<?php echo CHtml::encode($data->loans); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('loan_collection')); ?>:</b>
	<?php echo CHtml::encode($data->loan_collection); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('returns')); ?>:</b>
	<?php echo CHtml::encode($data->returns); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('return_late')); ?>:</b>
	<?php echo CHtml::encode($data->return_late); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('return_collection')); ?>:</b>
	<?php echo CHtml::encode($data->return_collection); ?>
	<br />


</div>