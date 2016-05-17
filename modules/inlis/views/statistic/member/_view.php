<?php
/**
 * View Inlis Sync Members (view-inlis-sync-members)
 * @var $this MemberController
 * @var $data ViewInlisSyncMembers
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

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_key')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->date_key), array('view', 'id'=>$data->date_key)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('members')); ?>:</b>
	<?php echo CHtml::encode($data->members); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('member_siswa')); ?>:</b>
	<?php echo CHtml::encode($data->member_siswa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('member_pelajar')); ?>:</b>
	<?php echo CHtml::encode($data->member_pelajar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('member_mahasiswa')); ?>:</b>
	<?php echo CHtml::encode($data->member_mahasiswa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('member_karyawan')); ?>:</b>
	<?php echo CHtml::encode($data->member_karyawan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('member_pegawai')); ?>:</b>
	<?php echo CHtml::encode($data->member_pegawai); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('member_umum')); ?>:</b>
	<?php echo CHtml::encode($data->member_umum); ?>
	<br />

	*/ ?>

</div>