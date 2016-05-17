<?php
/**
 * View Inlis Sync Members (view-inlis-sync-members)
 * @var $this MemberController
 * @var $model ViewInlisSyncMembers
 * @var $form CActiveForm
 * version: 0.0.1
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 17 May 2016, 17:25 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 *
 */
?>

<?php $form=$this->beginWidget('application.components.system.OActiveForm', array(
	'id'=>'view-inlis-sync-members-form',
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
		<?php echo $form->labelEx($model,'members'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'members',array('size'=>21,'maxlength'=>21)); ?>
			<?php echo $form->error($model,'members'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'member_siswa'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'member_siswa',array('size'=>23,'maxlength'=>23)); ?>
			<?php echo $form->error($model,'member_siswa'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'member_pelajar'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'member_pelajar',array('size'=>23,'maxlength'=>23)); ?>
			<?php echo $form->error($model,'member_pelajar'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'member_mahasiswa'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'member_mahasiswa',array('size'=>23,'maxlength'=>23)); ?>
			<?php echo $form->error($model,'member_mahasiswa'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'member_karyawan'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'member_karyawan',array('size'=>23,'maxlength'=>23)); ?>
			<?php echo $form->error($model,'member_karyawan'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'member_pegawai'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'member_pegawai',array('size'=>23,'maxlength'=>23)); ?>
			<?php echo $form->error($model,'member_pegawai'); ?>
			<?php /*<div class="small-px silent"></div>*/?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'member_umum'); ?>
		<div class="desc">
			<?php echo $form->textField($model,'member_umum',array('size'=>23,'maxlength'=>23)); ?>
			<?php echo $form->error($model,'member_umum'); ?>
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


