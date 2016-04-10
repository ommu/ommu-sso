<?php
/**
 * Inlis Searchs (inlis-searchs)
 * @var $this SearchController
 * @var $data InlisSearchs
 * version: 0.0.1
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 11 April 2016, 03:25 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 *
 */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('search_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->search_id), array('view', 'id'=>$data->search_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('publish')); ?>:</b>
	<?php echo CHtml::encode($data->publish); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('search_type')); ?>:</b>
	<?php echo CHtml::encode($data->search_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('search_key')); ?>:</b>
	<?php echo CHtml::encode($data->search_key); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creation_date')); ?>:</b>
	<?php echo CHtml::encode($data->creation_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creation_ip')); ?>:</b>
	<?php echo CHtml::encode($data->creation_ip); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('deleted_date')); ?>:</b>
	<?php echo CHtml::encode($data->deleted_date); ?>
	<br />

	*/ ?>

</div>