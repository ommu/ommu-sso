<?php
/**
 * Inlis Worksheet Subs (inlis-worksheet-sub)
 * @var $this WorksheetsubController
 * @var $model InlisWorksheetSub
 * @var $form CActiveForm
 * version: 0.0.1
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 29 March 2016, 10:00 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 *
 */

	$this->breadcrumbs=array(
		'Inlis Worksheet Subs'=>array('manage'),
		'Create',
	);
?>

<div class="form">
	<?php echo $this->renderPartial('/o/worksheet_sub/_form', array('model'=>$model)); ?>
</div>
