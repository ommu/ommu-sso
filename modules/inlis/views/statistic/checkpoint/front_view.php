<?php
/**
 * View Inlis Sync Checkpoints (view-inlis-sync-checkpoints)
 * @var $this CheckpointController
 * @var $model ViewInlisSyncCheckpoints
 * version: 0.0.1
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 17 May 2016, 17:24 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 *
 */

	$this->breadcrumbs=array(
		'View Inlis Sync Checkpoints'=>array('manage'),
		$model->date_key,
	);
?>

<?php //begin.Messages ?>
<?php
if(Yii::app()->user->hasFlash('success'))
	echo Utility::flashSuccess(Yii::app()->user->getFlash('success'));
?>
<?php //end.Messages ?>

<?php $this->widget('application.components.system.FDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
			'name'=>'date_key',
			'value'=>!in_array($model->date_key, array('0000-00-00','1970-01-01')) ? Utility::dateFormat($model->date_key) : '-',
		),
		array(
			'name'=>'checkpoints',
			'value'=>$model->checkpoints,
			//'value'=>$model->checkpoints != '' ? $model->checkpoints : '-',
		),
		array(
			'name'=>'checkpoint_member',
			'value'=>$model->checkpoint_member,
			//'value'=>$model->checkpoint_member != '' ? $model->checkpoint_member : '-',
		),
		array(
			'name'=>'checkpoint_non_member',
			'value'=>$model->checkpoint_non_member,
			//'value'=>$model->checkpoint_non_member != '' ? $model->checkpoint_non_member : '-',
		),
	),
)); ?>

<div class="dialog-content">
</div>
<div class="dialog-submit">
	<?php echo CHtml::button(Yii::t('phrase', 'Close'), array('id'=>'closed')); ?>
</div>
