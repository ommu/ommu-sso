<?php
/**
 * Inlis Locations (inlis-locations)
 * @var $this LocationController
 * @var $model InlisLocations
 * @var $form CActiveForm
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

<?php $form=$this->beginWidget('application.components.system.OActiveForm', array(
	'id'=>'inlis-locations-form',
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
		<?php echo $form->labelEx($model,'Code'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'Code',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'Code'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'Name'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'Name',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'Name'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'Description'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'Description',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'Description'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix publish">
		<?php echo $form->labelEx($model,'IsDelete'); ?>
		<div class="desc">
			<?php echo $form->checkBox($model,'IsDelete'); ?>
			<?php echo $form->labelEx($model,'IsDelete'); ?>
			<?php echo $form->error($model,'IsDelete'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'CreateBy'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'CreateBy',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'CreateBy'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'CreateDate'); ?>
		<div class="desc">
			<?php
			!$model->isNewRecord ? ($model->CreateDate != '0000-00-00' ? $model->CreateDate = date('d-m-Y', strtotime($model->CreateDate)) : '') : '';
			//echo $form->textField($model,'CreateDate');
			$this->widget('zii.widgets.jui.CJuiDatePicker',array(
				'model'=>$model,
				'attribute'=>'CreateDate',
				//'mode'=>'datetime',
				'options'=>array(
					'dateFormat' => 'dd-mm-yy',
				),
				'htmlOptions'=>array(
					'class' => 'span-4',
				 ),
			)); ?>
			<?php echo $form->error($model,'CreateDate'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'CreateTerminal'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'CreateTerminal',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'CreateTerminal'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'UpdateBy'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'UpdateBy',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'UpdateBy'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'UpdateDate'); ?>
		<div class="desc">
			<?php
			!$model->isNewRecord ? ($model->UpdateDate != '0000-00-00' ? $model->UpdateDate = date('d-m-Y', strtotime($model->UpdateDate)) : '') : '';
			//echo $form->textField($model,'UpdateDate');
			$this->widget('zii.widgets.jui.CJuiDatePicker',array(
				'model'=>$model,
				'attribute'=>'UpdateDate',
				//'mode'=>'datetime',
				'options'=>array(
					'dateFormat' => 'dd-mm-yy',
				),
				'htmlOptions'=>array(
					'class' => 'span-4',
				 ),
			)); ?>
			<?php echo $form->error($model,'UpdateDate'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'UpdateTerminal'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'UpdateTerminal',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'UpdateTerminal'); ?>
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


