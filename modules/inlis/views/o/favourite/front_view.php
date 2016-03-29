<?php
/**
 * Inlis Favourites (inlis-favourites)
 * @var $this FavouriteController
 * @var $model InlisFavourites
 * version: 0.0.1
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 29 March 2016, 15:15 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 *
 */

	$this->breadcrumbs=array(
		'Inlis Favourites'=>array('manage'),
		$model->favourite_id,
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
			'name'=>'favourite_id',
			'value'=>$model->favourite_id,
			//'value'=>$model->favourite_id != '' ? $model->favourite_id : '-',
		),
		array(
			'name'=>'catalog_id',
			'value'=>$model->catalog_id,
			//'value'=>$model->catalog_id != '' ? $model->catalog_id : '-',
		),
		array(
			'name'=>'user_id',
			'value'=>$model->user_id,
			//'value'=>$model->user_id != '' ? $model->user_id : '-',
		),
		array(
			'name'=>'creation_date',
			'value'=>!in_array($model->creation_date, array('0000-00-00 00:00:00','1970-01-01 00:00:00')) ? Utility::dateFormat($model->creation_date, true) : '-',
		),
		array(
			'name'=>'creation_ip',
			'value'=>$model->creation_ip,
			//'value'=>$model->creation_ip != '' ? $model->creation_ip : '-',
		),
	),
)); ?>

<div class="dialog-content">
</div>
<div class="dialog-submit">
	<?php echo CHtml::button(Yii::t('phrase', 'Close'), array('id'=>'closed')); ?>
</div>
