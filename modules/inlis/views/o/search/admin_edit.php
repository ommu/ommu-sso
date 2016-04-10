<?php
/**
 * Inlis Searchs (inlis-searchs)
 * @var $this SearchController
 * @var $model InlisSearchs
 * @var $form CActiveForm
 * version: 0.0.1
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 11 April 2016, 03:25 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 *
 */

	$this->breadcrumbs=array(
		'Inlis Searchs'=>array('manage'),
		$model->search_id=>array('view','id'=>$model->search_id),
		'Update',
	);
?>

<div class="form">
	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
