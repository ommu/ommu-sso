<?php
/**
 * Inlis Worksheet Subs (inlis-worksheet-sub)
 * @var $this WorksheetsubController
 * @var $model SyncWorksheetSub
 * version: 0.0.1
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (opensource.ommu.co)
 * @created date 29 March 2016, 10:00 WIB
 * @link https://github.com/ommu/ommu-inlis-sso
 * @contact (+62)856-299-4114
 *
 */

	$this->breadcrumbs=array(
		'Inlis Worksheet Subs'=>array('manage'),
		$model->Name,
	);
?>

<div class="dialog-content">
	<?php $this->widget('application.libraries.core.components.system.FDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			array(
				'name'=>'ID',
				'value'=>$model->ID,
				//'value'=>$model->ID != '' ? $model->ID : '-',
			),
			array(
				'name'=>'Name',
				'value'=>$model->Name,
				//'value'=>$model->Name != '' ? $model->Name : '-',
			),
			array(
				'name'=>'Main_Worksheet_ID',
				'value'=>$model->Main_Worksheet_ID,
				//'value'=>$model->Main_Worksheet_ID != '' ? $model->Main_Worksheet_ID : '-',
			),
		),
	)); ?>
</div>
<div class="dialog-submit">
	<?php echo CHtml::button(Yii::t('phrase', 'Close'), array('id'=>'closed')); ?>
</div>