<?php
/**
 * Inlis Catalogs (inlis-catalogs)
 * @var $this CatalogController
 * @var $model InlisCatalogs
 * @var $form CActiveForm
 * version: 0.0.1
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 29 March 2016, 10:02 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 *
 */
?>

<?php $form=$this->beginWidget('application.components.system.OActiveForm', array(
	'id'=>'inlis-catalogs-form',
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
		<?php echo $form->labelEx($model,'ControlNumber'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'ControlNumber',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'ControlNumber'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'BIBID'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'BIBID',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'BIBID'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'Title'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'Title',array('size'=>60,'maxlength'=>500)); ?>
			<?php echo $form->error($model,'Title'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'Author'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'Author',array('size'=>60,'maxlength'=>300)); ?>
			<?php echo $form->error($model,'Author'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'Edition'); ?>
		<div class="desc">
			<?php echo $form->textArea($model,'Edition',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'Edition'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'Publisher'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'Publisher',array('size'=>60,'maxlength'=>300)); ?>
			<?php echo $form->error($model,'Publisher'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'PublishLocation'); ?>
		<div class="desc">
			<?php echo $form->textArea($model,'PublishLocation',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'PublishLocation'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'PublishYear'); ?>
		<div class="desc">
			<?php echo $form->textArea($model,'PublishYear',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'PublishYear'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'Paging'); ?>
		<div class="desc">
			<?php echo $form->textArea($model,'Paging',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'Paging'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'Ill'); ?>
		<div class="desc">
			<?php echo $form->textArea($model,'Ill',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'Ill'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'Sizes'); ?>
		<div class="desc">
			<?php echo $form->textArea($model,'Sizes',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'Sizes'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'Item'); ?>
		<div class="desc">
			<?php echo $form->textArea($model,'Item',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'Item'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'Subject'); ?>
		<div class="desc">
			<?php echo $form->textArea($model,'Subject',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'Subject'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'Description'); ?>
		<div class="desc">
			<?php echo $form->textArea($model,'Description',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'Description'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'ISBN'); ?>
		<div class="desc">
			<?php echo $form->textArea($model,'ISBN',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'ISBN'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'CallNumber'); ?>
		<div class="desc">
			<?php echo $form->textArea($model,'CallNumber',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'CallNumber'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'Note'); ?>
		<div class="desc">
			<?php echo $form->textArea($model,'Note',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'Note'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'Languages'); ?>
		<div class="desc">
			<?php echo $form->textArea($model,'Languages',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'Languages'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'DeweyNo'); ?>
		<div class="desc">
			<?php echo $form->textArea($model,'DeweyNo',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'DeweyNo'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'ApproveDateOPAC'); ?>
		<div class="desc">
			<?php
			!$model->isNewRecord ? ($model->ApproveDateOPAC != '0000-00-00' ? $model->ApproveDateOPAC = date('d-m-Y', strtotime($model->ApproveDateOPAC)) : '') : '';
			//echo $form->textField($model,'ApproveDateOPAC');
			$this->widget('zii.widgets.jui.CJuiDatePicker',array(
				'model'=>$model,
				'attribute'=>'ApproveDateOPAC',
				//'mode'=>'datetime',
				'options'=>array(
					'dateFormat' => 'dd-mm-yy',
				),
				'htmlOptions'=>array(
					'class' => 'span-4',
				 ),
			)); ?>
			<?php echo $form->error($model,'ApproveDateOPAC'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix publish">
		<?php echo $form->labelEx($model,'IsOPAC'); ?>
		<div class="desc">
			<?php echo $form->checkBox($model,'IsOPAC'); ?>
			<?php echo $form->labelEx($model,'IsOPAC'); ?>
			<?php echo $form->error($model,'IsOPAC'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix publish">
		<?php echo $form->labelEx($model,'IsBNI'); ?>
		<div class="desc">
			<?php echo $form->checkBox($model,'IsBNI'); ?>
			<?php echo $form->labelEx($model,'IsBNI'); ?>
			<?php echo $form->error($model,'IsBNI'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix publish">
		<?php echo $form->labelEx($model,'IsKIN'); ?>
		<div class="desc">
			<?php echo $form->checkBox($model,'IsKIN'); ?>
			<?php echo $form->labelEx($model,'IsKIN'); ?>
			<?php echo $form->error($model,'IsKIN'); ?>
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
		<?php echo $form->labelEx($model,'CoverURL'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'CoverURL',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'CoverURL'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'FileURL'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'FileURL',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'FileURL'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'MARC'); ?>
		<div class="desc">
			<?php echo $form->textArea($model,'MARC',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'MARC'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'Branch_id'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'Branch_id'); ?>
			<?php echo $form->error($model,'Branch_id'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'Worksheet_id'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'Worksheet_id'); ?>
			<?php echo $form->error($model,'Worksheet_id'); ?>
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

	<div class="clearfix">
		<?php echo $form->labelEx($model,'SLA_REGISTER'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'SLA_REGISTER',array('size'=>45,'maxlength'=>45)); ?>
			<?php echo $form->error($model,'SLA_REGISTER'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'SENAYAN_ID'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'SENAYAN_ID',array('size'=>45,'maxlength'=>45)); ?>
			<?php echo $form->error($model,'SENAYAN_ID'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'NCIBookMan_ID'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'NCIBookMan_ID',array('size'=>45,'maxlength'=>45)); ?>
			<?php echo $form->error($model,'NCIBookMan_ID'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'collection_updated_count'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'collection_updated_count'); ?>
			<?php echo $form->error($model,'collection_updated_count'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'tanggal'); ?>
		<div class="desc">
			<?php
			!$model->isNewRecord ? ($model->tanggal != '0000-00-00' ? $model->tanggal = date('d-m-Y', strtotime($model->tanggal)) : '') : '';
			//echo $form->textField($model,'tanggal');
			$this->widget('zii.widgets.jui.CJuiDatePicker',array(
				'model'=>$model,
				'attribute'=>'tanggal',
				//'mode'=>'datetime',
				'options'=>array(
					'dateFormat' => 'dd-mm-yy',
				),
				'htmlOptions'=>array(
					'class' => 'span-4',
				 ),
			)); ?>
			<?php echo $form->error($model,'tanggal'); ?>
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


