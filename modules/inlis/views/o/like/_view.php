<?php
/**
 * Inlis Likes (inlis-likes)
 * @var $this LikeController
 * @var $data InlisLikes
 * version: 0.0.1
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 29 March 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 *
 */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('like_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->like_id), array('view', 'id'=>$data->like_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('catalog_id')); ?>:</b>
	<?php echo CHtml::encode($data->catalog_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creation_date')); ?>:</b>
	<?php echo CHtml::encode($data->creation_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creation_ip')); ?>:</b>
	<?php echo CHtml::encode($data->creation_ip); ?>
	<br />


</div>