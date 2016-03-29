<?php
/**
 * Inlis Catalogs (inlis-catalogs)
 * @var $this CatalogController
 * @var $data InlisCatalogs
 * version: 0.0.1
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 29 March 2016, 10:02 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 *
 */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID), array('view', 'id'=>$data->ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ControlNumber')); ?>:</b>
	<?php echo CHtml::encode($data->ControlNumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BIBID')); ?>:</b>
	<?php echo CHtml::encode($data->BIBID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Title')); ?>:</b>
	<?php echo CHtml::encode($data->Title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Author')); ?>:</b>
	<?php echo CHtml::encode($data->Author); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Edition')); ?>:</b>
	<?php echo CHtml::encode($data->Edition); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Publisher')); ?>:</b>
	<?php echo CHtml::encode($data->Publisher); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('PublishLocation')); ?>:</b>
	<?php echo CHtml::encode($data->PublishLocation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PublishYear')); ?>:</b>
	<?php echo CHtml::encode($data->PublishYear); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Paging')); ?>:</b>
	<?php echo CHtml::encode($data->Paging); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Ill')); ?>:</b>
	<?php echo CHtml::encode($data->Ill); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Sizes')); ?>:</b>
	<?php echo CHtml::encode($data->Sizes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Item')); ?>:</b>
	<?php echo CHtml::encode($data->Item); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Subject')); ?>:</b>
	<?php echo CHtml::encode($data->Subject); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Description')); ?>:</b>
	<?php echo CHtml::encode($data->Description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ISBN')); ?>:</b>
	<?php echo CHtml::encode($data->ISBN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CallNumber')); ?>:</b>
	<?php echo CHtml::encode($data->CallNumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Note')); ?>:</b>
	<?php echo CHtml::encode($data->Note); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Languages')); ?>:</b>
	<?php echo CHtml::encode($data->Languages); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DeweyNo')); ?>:</b>
	<?php echo CHtml::encode($data->DeweyNo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ApproveDateOPAC')); ?>:</b>
	<?php echo CHtml::encode($data->ApproveDateOPAC); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IsOPAC')); ?>:</b>
	<?php echo CHtml::encode($data->IsOPAC); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IsBNI')); ?>:</b>
	<?php echo CHtml::encode($data->IsBNI); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IsKIN')); ?>:</b>
	<?php echo CHtml::encode($data->IsKIN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IsDelete')); ?>:</b>
	<?php echo CHtml::encode($data->IsDelete); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CoverURL')); ?>:</b>
	<?php echo CHtml::encode($data->CoverURL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FileURL')); ?>:</b>
	<?php echo CHtml::encode($data->FileURL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MARC')); ?>:</b>
	<?php echo CHtml::encode($data->MARC); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Branch_id')); ?>:</b>
	<?php echo CHtml::encode($data->Branch_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Worksheet_id')); ?>:</b>
	<?php echo CHtml::encode($data->Worksheet_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CreateBy')); ?>:</b>
	<?php echo CHtml::encode($data->CreateBy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CreateDate')); ?>:</b>
	<?php echo CHtml::encode($data->CreateDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CreateTerminal')); ?>:</b>
	<?php echo CHtml::encode($data->CreateTerminal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UpdateBy')); ?>:</b>
	<?php echo CHtml::encode($data->UpdateBy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UpdateDate')); ?>:</b>
	<?php echo CHtml::encode($data->UpdateDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UpdateTerminal')); ?>:</b>
	<?php echo CHtml::encode($data->UpdateTerminal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SLA_REGISTER')); ?>:</b>
	<?php echo CHtml::encode($data->SLA_REGISTER); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SENAYAN_ID')); ?>:</b>
	<?php echo CHtml::encode($data->SENAYAN_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NCIBookMan_ID')); ?>:</b>
	<?php echo CHtml::encode($data->NCIBookMan_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('collection_updated_count')); ?>:</b>
	<?php echo CHtml::encode($data->collection_updated_count); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal); ?>
	<br />

	*/ ?>

</div>