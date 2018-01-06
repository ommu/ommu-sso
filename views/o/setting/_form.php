<?php
/**
 * Sso Settings (sso-settings)
 * @var $this SettingController
 * @var $model SsoSettings
 * @var $form CActiveForm
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2016 Ommu Platform (opensource.ommu.co)
 * @created date 27 April 2016, 12:11 WIB
 * @link https://github.com/ommu/ommu-inlis-sso
 *
 */
?>

<?php $form=$this->beginWidget('application.libraries.core.components.system.OActiveForm', array(
	'id'=>'sso-settings-form',
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
		<label>
			<?php echo $model->getAttributeLabel('license');?> <span class="required">*</span><br/>
			<span><?php echo Yii::t('phrase', 'Enter the your license key that is provided to you when you purchased this plugin. If you do not know your license key, please contact support team.');?></span>
		</label>
		<div class="desc">
			<?php 
			if($model->isNewRecord || (!$model->isNewRecord && $model->license == ''))
				$model->license = SsoSettings::getLicense();
			
			if($model->isNewRecord || (!$model->isNewRecord && $model->license == ''))
				echo $form->textField($model,'license',array('maxlength'=>32,'class'=>'span-4'));
			else
				echo $form->textField($model,'license',array('maxlength'=>32,'class'=>'span-4','disabled'=>'disabled'));?>
			<?php echo $form->error($model,'license'); ?>
			<span class="small-px"><?php echo Yii::t('phrase', 'Format: XXXX-XXXX-XXXX-XXXX');?></span>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'permission'); ?>
		<div class="desc">
			<span class="small-px"><?php echo Yii::t('phrase', 'Select whether or not you want to let the public (visitors that are not logged-in) to view the following sections of your social network. In some cases (such as Profiles, Blogs, and Albums), if you have given them the option, your users will be able to make their pages private even though you have made them publically viewable here. For more permissions settings, please visit the General Settings page.');?></span>
			<?php echo $form->radioButtonList($model, 'permission', array(
				1 => Yii::t('phrase', 'Yes, the public can view SSO unless they are made private.'),
				0 => Yii::t('phrase', 'No, the public cannot view SSO.'),
			)); ?>
			<?php echo $form->error($model,'permission'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'meta_keyword'); ?>
		<div class="desc">
			<?php echo $form->textArea($model,'meta_keyword',array('rows'=>6, 'cols'=>50, 'class'=>'span-7 smaller')); ?>
			<?php echo $form->error($model,'meta_keyword'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'meta_description'); ?>
		<div class="desc">
			<?php echo $form->textArea($model,'meta_description',array('rows'=>6, 'cols'=>50, 'class'=>'span-7 smaller')); ?>
			<?php echo $form->error($model,'meta_description'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->labelEx($model,'password_safe'); ?>
		<div class="desc">
			<?php echo $form->checkBox($model,'password_safe'); ?>
			<?php echo $form->error($model,'password_safe'); ?>
		</div>
	</div>

	<div class="submit clearfix">
		<label>&nbsp;</label>
		<div class="desc">
			<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('phrase', 'Create') : Yii::t('phrase', 'Save'), array('onclick' => 'setEnableSave()')); ?>
		</div>
	</div>

</fieldset>
<?php $this->endWidget(); ?>


