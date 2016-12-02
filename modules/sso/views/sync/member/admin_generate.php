<?php
/**
 * Inlis Members (inlis-members)
 * @var $this MemberController
 * @var $model SyncMembers
 * version: 0.0.1
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 29 March 2016, 10:07 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 *
 */

	$this->breadcrumbs=array(
		'Inlis Members'=>array('manage'),
		$member->ID=>array('view','id'=>$member->ID),
		'Update',
	);
?>

<?php $form=$this->beginWidget('application.components.system.OActiveForm', array(
	'id'=>'sso-users-form',
	'enableAjaxValidation'=>true,
	'htmlOptions' => array(
		'enctype' => 'multipart/form-data',
		'on_post' => '',
	),
)); ?>

<div class="dialog-content">
	<fieldset>
		<?php //begin.Messages ?>
		<div id="ajax-message">
			<?php //echo $form->errorSummary($model); ?>
		</div>
		<?php //begin.Messages ?>

		<div class="clearfix">
			<?php echo $form->labelEx($model,'displayname_input'); ?>
			<div class="desc">
				<?php $model->displayname_input = ucwords(strtolower(trim($member->Fullname)));
				echo $form->textField($model,'displayname_input',array('maxlength'=>64,'class'=>'span-7')); ?>
				<?php echo $form->error($model,'displayname_input'); ?>
			</div>
		</div>

		<div class="clearfix">
			<?php echo $form->labelEx($model,'email_input'); ?>
			<div class="desc">
				<?php $model->email_input = $member->Email;
				echo $form->textField($model,'email_input',array('maxlength'=>32,'class'=>'span-7')); ?>
				<?php echo $form->error($model,'email_input'); ?>
			</div>
		</div>
		
		<?php if($setting->signup_random == 0) {?>
		<div class="clearfix">
			<?php echo $form->labelEx($model,'password_input'); ?>
			<div class="desc">
				<?php echo $form->textField($model,'password_input',array('maxlength'=>32,'class'=>'span-7')); ?>
				<?php echo $form->error($model,'password_input'); ?>
			</div>
		</div>
		<?php }?>

	</fieldset>
</div>
<div class="dialog-submit">
	<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('phrase', 'Create') : Yii::t('phrase', 'Save') ,array('onclick' => 'setEnableSave()')); ?>
	<?php echo CHtml::button(Yii::t('phrase', 'Cancel'), array('id'=>'closed')); ?>
</div>
<?php $this->endWidget(); ?>


