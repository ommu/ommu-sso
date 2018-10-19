<?php
/**
 * Sso Users (sso-users)
 * @var $this AdminController
 * @var $model SsoUsers
 * @var $form CActiveForm
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @contact (+62)856-299-4114
 * @copyright Copyright (c) 2016 Ommu Platform (www.ommu.co)
 * @created date 29 March 2016, 16:14 WIB
 * @link https://github.com/ommu/ommu-inlis-sso
 *
 */

	$this->breadcrumbs=array(
		'Sso Users'=>array('manage'),
		$model->id=>array('view','id'=>$model->id),
		Yii::t('phrase', 'Update'),
	);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>