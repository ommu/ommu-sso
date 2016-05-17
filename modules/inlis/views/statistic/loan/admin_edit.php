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

	$this->breadcrumbs=array(
		'View Inlis Sync Collectionloans'=>array('manage'),
		$model->date_key=>array('view','id'=>$model->date_key),
		'Update',
	);
?>

<div class="form">
	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
