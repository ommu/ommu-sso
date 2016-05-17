<?php
/**
 * View Inlis Sync Members (view-inlis-sync-members)
 * @var $this MemberController
 * @var $model ViewInlisSyncMembers
 * version: 0.0.1
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 17 May 2016, 17:25 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 *
 */

	$this->breadcrumbs=array(
		'View Inlis Sync Members'=>array('manage'),
		$model->date_key,
	);
?>

<?php //begin.Messages ?>
<?php
if(Yii::app()->user->hasFlash('success'))
	echo Utility::flashSuccess(Yii::app()->user->getFlash('success'));
?>
<?php //end.Messages ?>

<?php $this->widget('application.components.system.FDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		array(
			'name'=>'date_key',
			'value'=>!in_array($model->date_key, array('0000-00-00','1970-01-01')) ? Utility::dateFormat($model->date_key) : '-',
		),
		array(
			'name'=>'members',
			'value'=>$model->members,
			//'value'=>$model->members != '' ? $model->members : '-',
		),
		array(
			'name'=>'member_siswa',
			'value'=>$model->member_siswa,
			//'value'=>$model->member_siswa != '' ? $model->member_siswa : '-',
		),
		array(
			'name'=>'member_pelajar',
			'value'=>$model->member_pelajar,
			//'value'=>$model->member_pelajar != '' ? $model->member_pelajar : '-',
		),
		array(
			'name'=>'member_mahasiswa',
			'value'=>$model->member_mahasiswa,
			//'value'=>$model->member_mahasiswa != '' ? $model->member_mahasiswa : '-',
		),
		array(
			'name'=>'member_karyawan',
			'value'=>$model->member_karyawan,
			//'value'=>$model->member_karyawan != '' ? $model->member_karyawan : '-',
		),
		array(
			'name'=>'member_pegawai',
			'value'=>$model->member_pegawai,
			//'value'=>$model->member_pegawai != '' ? $model->member_pegawai : '-',
		),
		array(
			'name'=>'member_umum',
			'value'=>$model->member_umum,
			//'value'=>$model->member_umum != '' ? $model->member_umum : '-',
		),
	),
)); ?>

<div class="dialog-content">
</div>
<div class="dialog-submit">
	<?php echo CHtml::button(Yii::t('phrase', 'Close'), array('id'=>'closed')); ?>
</div>
