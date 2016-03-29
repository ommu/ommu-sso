<?php
/**
 * Inlis Collections (inlis-collections)
 * @var $this CollectionController
 * @var $data InlisCollections
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('NoInduk')); ?>:</b>
	<?php echo CHtml::encode($data->NoInduk); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Title')); ?>:</b>
	<?php echo CHtml::encode($data->Title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TitleAdded')); ?>:</b>
	<?php echo CHtml::encode($data->TitleAdded); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Author')); ?>:</b>
	<?php echo CHtml::encode($data->Author); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('AuthorAdded')); ?>:</b>
	<?php echo CHtml::encode($data->AuthorAdded); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Cooperation')); ?>:</b>
	<?php echo CHtml::encode($data->Cooperation); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('PublishLocation')); ?>:</b>
	<?php echo CHtml::encode($data->PublishLocation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Publisher')); ?>:</b>
	<?php echo CHtml::encode($data->Publisher); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PublishYear')); ?>:</b>
	<?php echo CHtml::encode($data->PublishYear); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('KalaTerbit')); ?>:</b>
	<?php echo CHtml::encode($data->KalaTerbit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Edition')); ?>:</b>
	<?php echo CHtml::encode($data->Edition); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Class')); ?>:</b>
	<?php echo CHtml::encode($data->Class); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PhysicalDescription')); ?>:</b>
	<?php echo CHtml::encode($data->PhysicalDescription); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Note')); ?>:</b>
	<?php echo CHtml::encode($data->Note); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Currency')); ?>:</b>
	<?php echo CHtml::encode($data->Currency); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ISBN')); ?>:</b>
	<?php echo CHtml::encode($data->ISBN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MapScale')); ?>:</b>
	<?php echo CHtml::encode($data->MapScale); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MapNumber')); ?>:</b>
	<?php echo CHtml::encode($data->MapNumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MapSubject')); ?>:</b>
	<?php echo CHtml::encode($data->MapSubject); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RFID')); ?>:</b>
	<?php echo CHtml::encode($data->RFID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Price')); ?>:</b>
	<?php echo CHtml::encode($data->Price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TanggalKirim')); ?>:</b>
	<?php echo CHtml::encode($data->TanggalKirim); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IsDelete')); ?>:</b>
	<?php echo CHtml::encode($data->IsDelete); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Branch_id')); ?>:</b>
	<?php echo CHtml::encode($data->Branch_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Catalog_id')); ?>:</b>
	<?php echo CHtml::encode($data->Catalog_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Partner_id')); ?>:</b>
	<?php echo CHtml::encode($data->Partner_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Location_id')); ?>:</b>
	<?php echo CHtml::encode($data->Location_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Rule_id')); ?>:</b>
	<?php echo CHtml::encode($data->Rule_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Category_id')); ?>:</b>
	<?php echo CHtml::encode($data->Category_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Media_id')); ?>:</b>
	<?php echo CHtml::encode($data->Media_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Source_id')); ?>:</b>
	<?php echo CHtml::encode($data->Source_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Worksheet_id')); ?>:</b>
	<?php echo CHtml::encode($data->Worksheet_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GroupingNumber')); ?>:</b>
	<?php echo CHtml::encode($data->GroupingNumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NomorBarcode')); ?>:</b>
	<?php echo CHtml::encode($data->NomorBarcode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Status')); ?>:</b>
	<?php echo CHtml::encode($data->Status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Keterangan_Sumber')); ?>:</b>
	<?php echo CHtml::encode($data->Keterangan_Sumber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Penempatan')); ?>:</b>
	<?php echo CHtml::encode($data->Penempatan); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('IsVerified')); ?>:</b>
	<?php echo CHtml::encode($data->IsVerified); ?>
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

	*/ ?>

</div>