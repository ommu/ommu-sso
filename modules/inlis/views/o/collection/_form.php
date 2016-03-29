<?php
/**
 * Inlis Collections (inlis-collections)
 * @var $this CollectionController
 * @var $model InlisCollections
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
	'id'=>'inlis-collections-form',
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
		<?php echo $form->labelEx($model,'NoInduk'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'NoInduk',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'NoInduk'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'Title'); ?>
		<div class="desc">
			<?php echo $form->textArea($model,'Title',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'Title'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'TitleAdded'); ?>
		<div class="desc">
			<?php echo $form->textArea($model,'TitleAdded',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'TitleAdded'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'Author'); ?>
		<div class="desc">
			<?php echo $form->textArea($model,'Author',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'Author'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'AuthorAdded'); ?>
		<div class="desc">
			<?php echo $form->textArea($model,'AuthorAdded',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'AuthorAdded'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'Cooperation'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'Cooperation',array('size'=>60,'maxlength'=>200)); ?>
			<?php echo $form->error($model,'Cooperation'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'PublishLocation'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'PublishLocation',array('size'=>60,'maxlength'=>200)); ?>
			<?php echo $form->error($model,'PublishLocation'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'Publisher'); ?>
		<div class="desc">
			<?php echo $form->textArea($model,'Publisher',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'Publisher'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'PublishYear'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'PublishYear',array('size'=>60,'maxlength'=>200)); ?>
			<?php echo $form->error($model,'PublishYear'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'KalaTerbit'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'KalaTerbit',array('size'=>60,'maxlength'=>200)); ?>
			<?php echo $form->error($model,'KalaTerbit'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'Edition'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'Edition',array('size'=>60,'maxlength'=>200)); ?>
			<?php echo $form->error($model,'Edition'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'Class'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'Class',array('size'=>60,'maxlength'=>200)); ?>
			<?php echo $form->error($model,'Class'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'PhysicalDescription'); ?>
		<div class="desc">
			<?php echo $form->textArea($model,'PhysicalDescription',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'PhysicalDescription'); ?>
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
		<?php echo $form->labelEx($model,'Currency'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'Currency',array('size'=>30,'maxlength'=>30)); ?>
			<?php echo $form->error($model,'Currency'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'ISBN'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'ISBN',array('size'=>60,'maxlength'=>2000)); ?>
			<?php echo $form->error($model,'ISBN'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'MapScale'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'MapScale',array('size'=>60,'maxlength'=>200)); ?>
			<?php echo $form->error($model,'MapScale'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'MapNumber'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'MapNumber',array('size'=>60,'maxlength'=>200)); ?>
			<?php echo $form->error($model,'MapNumber'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'MapSubject'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'MapSubject',array('size'=>60,'maxlength'=>200)); ?>
			<?php echo $form->error($model,'MapSubject'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'RFID'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'RFID',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'RFID'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'Price'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'Price'); ?>
			<?php echo $form->error($model,'Price'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'TanggalKirim'); ?>
		<div class="desc">
			<?php
			!$model->isNewRecord ? ($model->TanggalKirim != '0000-00-00' ? $model->TanggalKirim = date('d-m-Y', strtotime($model->TanggalKirim)) : '') : '';
			//echo $form->textField($model,'TanggalKirim');
			$this->widget('zii.widgets.jui.CJuiDatePicker',array(
				'model'=>$model,
				'attribute'=>'TanggalKirim',
				//'mode'=>'datetime',
				'options'=>array(
					'dateFormat' => 'dd-mm-yy',
				),
				'htmlOptions'=>array(
					'class' => 'span-4',
				 ),
			)); ?>
			<?php echo $form->error($model,'TanggalKirim'); ?>
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
		<?php echo $form->labelEx($model,'Branch_id'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'Branch_id'); ?>
			<?php echo $form->error($model,'Branch_id'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'Catalog_id'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'Catalog_id'); ?>
			<?php echo $form->error($model,'Catalog_id'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'Partner_id'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'Partner_id'); ?>
			<?php echo $form->error($model,'Partner_id'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'Location_id'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'Location_id'); ?>
			<?php echo $form->error($model,'Location_id'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'Rule_id'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'Rule_id'); ?>
			<?php echo $form->error($model,'Rule_id'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'Category_id'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'Category_id'); ?>
			<?php echo $form->error($model,'Category_id'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'Media_id'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'Media_id'); ?>
			<?php echo $form->error($model,'Media_id'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'Source_id'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'Source_id'); ?>
			<?php echo $form->error($model,'Source_id'); ?>
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
		<?php echo $form->labelEx($model,'GroupingNumber'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'GroupingNumber'); ?>
			<?php echo $form->error($model,'GroupingNumber'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'NomorBarcode'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'NomorBarcode',array('size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'NomorBarcode'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'Status'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'Status',array('size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'Status'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'Keterangan_Sumber'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'Keterangan_Sumber',array('size'=>60,'maxlength'=>200)); ?>
			<?php echo $form->error($model,'Keterangan_Sumber'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'Penempatan'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'Penempatan',array('size'=>60,'maxlength'=>200)); ?>
			<?php echo $form->error($model,'Penempatan'); ?>
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
		<?php echo $form->labelEx($model,'IsVerified'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'IsVerified'); ?>
			<?php echo $form->error($model,'IsVerified'); ?>
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


