<?php
/**
 * View Inlis Sync Collectionloans (view-inlis-sync-collectionloans)
 * @var $this LoanController
 * @var $model ViewInlisSyncCollectionloans
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
		'View Inlis Sync Collectionloans'=>array('manage'),
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
			'name'=>'loans',
			'value'=>$model->loans,
			//'value'=>$model->loans != '' ? $model->loans : '-',
		),
		array(
			'name'=>'loan_collection',
			'value'=>$model->loan_collection,
			//'value'=>$model->loan_collection != '' ? $model->loan_collection : '-',
		),
		array(
			'name'=>'returns',
			'value'=>$model->returns,
			//'value'=>$model->returns != '' ? $model->returns : '-',
		),
		array(
			'name'=>'return_late',
			'value'=>$model->return_late,
			//'value'=>$model->return_late != '' ? $model->return_late : '-',
		),
		array(
			'name'=>'return_collection',
			'value'=>$model->return_collection,
			//'value'=>$model->return_collection != '' ? $model->return_collection : '-',
		),
	),
)); ?>

<div class="dialog-content">
</div>
<div class="dialog-submit">
	<?php echo CHtml::button(Yii::t('phrase', 'Close'), array('id'=>'closed')); ?>
</div>
