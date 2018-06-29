<?php
/**
 * Sso Users (sso-users)
 * @var $this AdminController
 * @var $model SsoUsers
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2016 Ommu Platform (opensource.ommu.co)
 * @created date 29 March 2016, 16:14 WIB
 * @link https://github.com/ommu/ommu-inlis-sso
 *
 */

	$this->breadcrumbs=array(
		'Sso Users'=>array('manage'),
		$model->id,
	);
?>

<div class="dialog-content">
	<?php $this->widget('application.libraries.core.components.system.FDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			array(
				'name'=>'id',
				'value'=>$model->id,
				//'value'=>$model->id != '' ? $model->id : '-',
			),
			array(
				'name'=>'user_id',
				'value'=>$model->user_id,
				//'value'=>$model->user_id != '' ? $model->user_id : '-',
			),
			array(
				'name'=>'member_id',
				'value'=>$model->member_id,
				//'value'=>$model->member_id != '' ? $model->member_id : '-',
			),
			array(
				'name'=>'creation_date',
				'value'=>!in_array($model->creation_date, array('0000-00-00 00:00:00','1970-01-01 00:00:00','0002-12-02 07:07:12','-0001-11-30 00:00:00')) ? Utility::dateFormat($model->creation_date, true) : '-',
			),
			array(
				'name'=>'creation_id',
				'value'=>$model->creation_id,
				//'value'=>$model->creation_id != 0 ? $model->creation_id : '-',
			),
			array(
				'name'=>'modified_date',
				'value'=>!in_array($model->modified_date, array('0000-00-00 00:00:00','1970-01-01 00:00:00','0002-12-02 07:07:12','-0001-11-30 00:00:00')) ? Utility::dateFormat($model->modified_date, true) : '-',
			),
			array(
				'name'=>'modified_id',
				'value'=>$model->modified_id,
				//'value'=>$model->modified_id != 0 ? $model->modified_id : '-',
			),
		),
	)); ?>
</div>
<div class="dialog-submit">
	<?php echo CHtml::button(Yii::t('phrase', 'Close'), array('id'=>'closed')); ?>
</div>
