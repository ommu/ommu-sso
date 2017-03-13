<?php
/**
 * Sso Settings (sso-settings)
 * @var $this SettingController
 * @var $model SsoSettings
 * @var $form CActiveForm
 * version: 0.0.1
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 27 April 2016, 12:11 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 *
 */

	$this->breadcrumbs=array(
		'Sso Settings'=>array('manage'),
		$model->id=>array('view','id'=>$model->id),
		'Update',
	);
	
	Yii::import('application.modules.sso.components.plugins.routeros.*');
?>

<div class="form" name="post-on">
	<?php $form=$this->beginWidget('application.components.system.OActiveForm', array(
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
				<?php echo $model->getAttributeLabel('network_radius_enable');?> <span class="required">*</span>
			</label>
			<div class="desc">
				<?php echo $form->checkBox($model,'network_radius_enable'); ?>
				<?php echo $form->error($model,'network_radius_enable'); ?>
			</div>
		</div>

		<div class="clearfix">
			<label>
				<?php echo $model->getAttributeLabel('network_radius_customer');?> <span class="required">*</span>
			</label>
			<div class="desc">
				<?php 
				$api = new ORouterosAPI;
				$network_radius_customer = $api->command('/tool/user-manager/customer/getall');
				if(!empty($network_radius_customer))
					echo $form->dropDownList($model,'network_radius_customer', SsoUtility::getKeyVal($network_radius_customer, 'login', 'login'), array('prompt'=>Yii::t('phrase', 'Select One')));
				else
					echo $form->dropDownList($model,'network_radius_customer', array('prompt'=>Yii::t('phrase', 'Select One'))); ?>
				<?php echo $form->error($model,'network_radius_customer'); ?>
			</div>
		</div>

		<div class="clearfix">
			<label>
				<?php echo $model->getAttributeLabel('network_radius_profile');?> <span class="required">*</span>
			</label>
			<div class="desc">
				<?php 
				$api = new ORouterosAPI;
				$network_radius_profile = $api->command('/tool/user-manager/profile/getall');
				if(!empty($network_radius_profile))
					echo $form->dropDownList($model,'network_radius_profile', SsoUtility::getKeyVal($network_radius_profile, 'name', 'name'), array('prompt'=>Yii::t('phrase', 'Select One')));
				else
					echo $form->dropDownList($model,'network_radius_profile', array('prompt'=>Yii::t('phrase', 'Select One'))); ?>
				<?php echo $form->error($model,'network_radius_profile'); ?>
			</div>
		</div>

		<div class="clearfix">
			<label>
				<?php echo $model->getAttributeLabel('network_radius_shared');?> <span class="required">*</span>
			</label>
			<div class="desc">
				<?php echo $form->textField($model,'network_radius_shared',array('maxlength'=>2, 'class'=>'span-4')); ?>
				<?php echo $form->error($model,'network_radius_shared'); ?>
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
</div>
