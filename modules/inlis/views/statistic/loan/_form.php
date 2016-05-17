<?php
/**
 * View Inlis Sync Collectionloans (view-inlis-sync-collectionloans)
 * @var $this LoanController
 * @var $model ViewInlisSyncCollectionloans
 * @var $form CActiveForm
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

<?php $form=$this->beginWidget('application.components.system.OActiveForm', array(
	'id'=>'view-inlis-sync-collectionloans-form',
	'enableAjaxValidation'=>true,
	//'htmlOptions' => array('enctype' => 'multipart/form-data')
)); ?>

<?php //begin.Messages ?>
<div id="ajax-message">
	<?php echo $form->errorSummary($model); ?>
</div>
<?php //begin.Messages ?>

<fieldset>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'date_key'); ?>
		<div class="desc">
			<?php
			!$model->isNewRecord ? ($model->date_key != '0000-00-00' ? $model->date_key = date('d-m-Y', strtotime($model->date_key)) : '') : '';
			//echo $form->textField($model,'date_key');
			$this->widget('zii.widgets.jui.CJuiDatePicker',array(
				'model'=>$model,
				'attribute'=>'date_key',
				//'mode'=>'datetime',
				'options'=>array(
					'dateFormat' => 'dd-mm-yy',
				),
				'htmlOptions'=>array(
					'class' => 'span-4',
				 ),
			)); ?>
			<?php echo $form->error($model,'date_key'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'loans'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'loans',array('size'=>21,'maxlength'=>21)); ?>
			<?php echo $form->error($model,'loans'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'loan_collection'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'loan_collection',array('size'=>32,'maxlength'=>32)); ?>
			<?php echo $form->error($model,'loan_collection'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'returns'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'returns',array('size'=>23,'maxlength'=>23)); ?>
			<?php echo $form->error($model,'returns'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'return_late'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'return_late',array('size'=>23,'maxlength'=>23)); ?>
			<?php echo $form->error($model,'return_late'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'return_collection'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'return_collection',array('size'=>32,'maxlength'=>32)); ?>
			<?php echo $form->error($model,'return_collection'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="submit clearfix">
		<label>&nbsp;</label>
		<div class="desc">
			<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('phrase', 'Create') : Yii::t('phrase', 'Save'), array('onclick' => 'setEnableSave()')); ?>
		</div>
	</div>

</fieldset>
<?php /*
<div class="dialog-content">
</div>
<div class="dialog-submit">
	<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('phrase', 'Create') : Yii::t('phrase', 'Save') ,array('onclick' => 'setEnableSave()')); ?>
	<?php echo CHtml::button(Yii::t('phrase', 'Cancel'), array('id'=>'closed')); ?>
</div>
*/?>
<?php $this->endWidget(); ?>


