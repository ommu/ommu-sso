<?php
/**
 * SyncCollectionloanitems
 * version: 0.0.1
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 22 April 2016, 16:03 WIB
 * @link http://company.ommu.co
 * @contact (+62)856-299-4114
 *
 * This is the template for generating the model class of a specified table.
 * - $this: the ModelCode object
 * - $tableName: the table name for this class (prefix is already removed if necessary)
 * - $modelClass: the model class name
 * - $columns: list of table columns (name=>CDbColumnSchema)
 * - $labels: list of attribute labels (name=>label)
 * - $rules: list of validation rules
 * - $relations: list of relations (name=>relation declaration)
 *
 * --------------------------------------------------------------------------------------
 *
 * This is the model class for table "collectionloanitems".
 *
 * The followings are the available columns in table 'collectionloanitems':
 * @property string $CollectionLoan_id
 * @property string $ControlNumber
 * @property string $Title
 * @property string $Author
 * @property string $Publisher
 * @property string $LoanDate
 * @property string $DueDate
 * @property string $ActualReturn
 * @property double $LateDays
 * @property double $PenaltyDaily
 * @property double $PenaltyAmount
 * @property string $LoanSource
 * @property string $ReturnSource
 * @property string $LoanStatus
 * @property integer $Paid
 * @property double $Collection_id
 * @property double $member_id
 *
 * The followings are the available model relations:
 * @property Collections $collection
 * @property Collectionloans $collectionLoan
 * @property Members $member
 */
class SyncCollectionloanitems extends CActiveRecord
{
	public $defaultColumns = array();

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SyncCollectionloanitems the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return CDbConnection the database connection used for this class
	 */
	public function getDbConnection()
	{
		return Yii::app()->inlis;
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'collectionloanitems';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('CollectionLoan_id', 'required'),
			array('Paid', 'numerical', 'integerOnly'=>true),
			array('LateDays, PenaltyDaily, PenaltyAmount, Collection_id, member_id', 'numerical'),
			array('CollectionLoan_id, ControlNumber, Title, Author, Publisher, LoanSource, ReturnSource, LoanStatus', 'length', 'max'=>255),
			array('LoanDate, DueDate, ActualReturn', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('CollectionLoan_id, ControlNumber, Title, Author, Publisher, LoanDate, DueDate, ActualReturn, LateDays, PenaltyDaily, PenaltyAmount, LoanSource, ReturnSource, LoanStatus, Paid, Collection_id, member_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'collection_relation' => array(self::BELONGS_TO, 'Collections', 'Collection_id'),
			'collectionLoan_relation' => array(self::BELONGS_TO, 'Collectionloans', 'CollectionLoan_id'),
			'member_relation' => array(self::BELONGS_TO, 'Members', 'member_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'CollectionLoan_id' => Yii::t('attribute', 'Collection Loan'),
			'ControlNumber' => Yii::t('attribute', 'Control Number'),
			'Title' => Yii::t('attribute', 'Title'),
			'Author' => Yii::t('attribute', 'Author'),
			'Publisher' => Yii::t('attribute', 'Publisher'),
			'LoanDate' => Yii::t('attribute', 'Loan Date'),
			'DueDate' => Yii::t('attribute', 'Due Date'),
			'ActualReturn' => Yii::t('attribute', 'Actual Return'),
			'LateDays' => Yii::t('attribute', 'Late Days'),
			'PenaltyDaily' => Yii::t('attribute', 'Penalty Daily'),
			'PenaltyAmount' => Yii::t('attribute', 'Penalty Amount'),
			'LoanSource' => Yii::t('attribute', 'Loan Source'),
			'ReturnSource' => Yii::t('attribute', 'Return Source'),
			'LoanStatus' => Yii::t('attribute', 'Loan Status'),
			'Paid' => Yii::t('attribute', 'Paid'),
			'Collection_id' => Yii::t('attribute', 'Collection'),
			'member_id' => Yii::t('attribute', 'Member'),
		);
		/*
			'Collection Loan' => 'Collection Loan',
			'Control Number' => 'Control Number',
			'Title' => 'Title',
			'Author' => 'Author',
			'Publisher' => 'Publisher',
			'Loan Date' => 'Loan Date',
			'Due Date' => 'Due Date',
			'Actual Return' => 'Actual Return',
			'Late Days' => 'Late Days',
			'Penalty Daily' => 'Penalty Daily',
			'Penalty Amount' => 'Penalty Amount',
			'Loan Source' => 'Loan Source',
			'Return Source' => 'Return Source',
			'Loan Status' => 'Loan Status',
			'Paid' => 'Paid',
			'Collection' => 'Collection',
			'Member' => 'Member',
		
		*/
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		if(isset($_GET['CollectionLoan']))
			$criteria->compare('t.CollectionLoan_id',$_GET['CollectionLoan']);
		else
			$criteria->compare('t.CollectionLoan_id',$this->CollectionLoan_id);
		$criteria->compare('t.ControlNumber',strtolower($this->ControlNumber),true);
		$criteria->compare('t.Title',strtolower($this->Title),true);
		$criteria->compare('t.Author',strtolower($this->Author),true);
		$criteria->compare('t.Publisher',strtolower($this->Publisher),true);
		if($this->LoanDate != null && !in_array($this->LoanDate, array('0000-00-00 00:00:00', '0000-00-00')))
			$criteria->compare('date(t.LoanDate)',date('Y-m-d', strtotime($this->LoanDate)));
		if($this->DueDate != null && !in_array($this->DueDate, array('0000-00-00 00:00:00', '0000-00-00')))
			$criteria->compare('date(t.DueDate)',date('Y-m-d', strtotime($this->DueDate)));
		if($this->ActualReturn != null && !in_array($this->ActualReturn, array('0000-00-00 00:00:00', '0000-00-00')))
			$criteria->compare('date(t.ActualReturn)',date('Y-m-d', strtotime($this->ActualReturn)));
		$criteria->compare('t.LateDays',$this->LateDays);
		$criteria->compare('t.PenaltyDaily',$this->PenaltyDaily);
		$criteria->compare('t.PenaltyAmount',$this->PenaltyAmount);
		$criteria->compare('t.LoanSource',strtolower($this->LoanSource),true);
		$criteria->compare('t.ReturnSource',strtolower($this->ReturnSource),true);
		$criteria->compare('t.LoanStatus',strtolower($this->LoanStatus),true);
		$criteria->compare('t.Paid',$this->Paid);
		if(isset($_GET['Collection']))
			$criteria->compare('t.Collection_id',$_GET['Collection']);
		else
			$criteria->compare('t.Collection_id',$this->Collection_id);
		if(isset($_GET['member']))
			$criteria->compare('t.member_id',$_GET['member']);
		else
			$criteria->compare('t.member_id',$this->member_id);

		if(!isset($_GET['SyncCollectionloanitems_sort']))
			$criteria->order = 't. DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>30,
			),
		));
	}


	/**
	 * Get column for CGrid View
	 */
	public function getGridColumn($columns=null) {
		if($columns !== null) {
			foreach($columns as $val) {
				/*
				if(trim($val) == 'enabled') {
					$this->defaultColumns[] = array(
						'name'  => 'enabled',
						'value' => '$data->enabled == 1? "Ya": "Tidak"',
					);
				}
				*/
				$this->defaultColumns[] = $val;
			}
		} else {
			$this->defaultColumns[] = 'CollectionLoan_id';
			$this->defaultColumns[] = 'ControlNumber';
			$this->defaultColumns[] = 'Title';
			$this->defaultColumns[] = 'Author';
			$this->defaultColumns[] = 'Publisher';
			$this->defaultColumns[] = 'LoanDate';
			$this->defaultColumns[] = 'DueDate';
			$this->defaultColumns[] = 'ActualReturn';
			$this->defaultColumns[] = 'LateDays';
			$this->defaultColumns[] = 'PenaltyDaily';
			$this->defaultColumns[] = 'PenaltyAmount';
			$this->defaultColumns[] = 'LoanSource';
			$this->defaultColumns[] = 'ReturnSource';
			$this->defaultColumns[] = 'LoanStatus';
			$this->defaultColumns[] = 'Paid';
			$this->defaultColumns[] = 'Collection_id';
			$this->defaultColumns[] = 'member_id';
		}

		return $this->defaultColumns;
	}

	/**
	 * Set default columns to display
	 */
	protected function afterConstruct() {
		if(count($this->defaultColumns) == 0) {
			/*
			$this->defaultColumns[] = array(
				'class' => 'CCheckBoxColumn',
				'name' => 'id',
				'selectableRows' => 2,
				'checkBoxHtmlOptions' => array('name' => 'trash_id[]')
			);
			*/
			$this->defaultColumns[] = array(
				'header' => 'No',
				'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1'
			);
			$this->defaultColumns[] = 'CollectionLoan_id';
			$this->defaultColumns[] = 'ControlNumber';
			$this->defaultColumns[] = 'Title';
			$this->defaultColumns[] = 'Author';
			$this->defaultColumns[] = 'Publisher';
			$this->defaultColumns[] = array(
				'name' => 'LoanDate',
				'value' => 'Utility::dateFormat($data->LoanDate)',
				'htmlOptions' => array(
					'class' => 'center',
				),
				'filter' => Yii::app()->controller->widget('zii.widgets.jui.CJuiDatePicker', array(
					'model'=>$this,
					'attribute'=>'LoanDate',
					'language' => 'ja',
					'i18nScriptFile' => 'jquery.ui.datepicker-en.js',
					//'mode'=>'datetime',
					'htmlOptions' => array(
						'id' => 'LoanDate_filter',
					),
					'options'=>array(
						'showOn' => 'focus',
						'dateFormat' => 'dd-mm-yy',
						'showOtherMonths' => true,
						'selectOtherMonths' => true,
						'changeMonth' => true,
						'changeYear' => true,
						'showButtonPanel' => true,
					),
				), true),
			);
			$this->defaultColumns[] = array(
				'name' => 'DueDate',
				'value' => 'Utility::dateFormat($data->DueDate)',
				'htmlOptions' => array(
					'class' => 'center',
				),
				'filter' => Yii::app()->controller->widget('zii.widgets.jui.CJuiDatePicker', array(
					'model'=>$this,
					'attribute'=>'DueDate',
					'language' => 'ja',
					'i18nScriptFile' => 'jquery.ui.datepicker-en.js',
					//'mode'=>'datetime',
					'htmlOptions' => array(
						'id' => 'DueDate_filter',
					),
					'options'=>array(
						'showOn' => 'focus',
						'dateFormat' => 'dd-mm-yy',
						'showOtherMonths' => true,
						'selectOtherMonths' => true,
						'changeMonth' => true,
						'changeYear' => true,
						'showButtonPanel' => true,
					),
				), true),
			);
			$this->defaultColumns[] = array(
				'name' => 'ActualReturn',
				'value' => 'Utility::dateFormat($data->ActualReturn)',
				'htmlOptions' => array(
					'class' => 'center',
				),
				'filter' => Yii::app()->controller->widget('zii.widgets.jui.CJuiDatePicker', array(
					'model'=>$this,
					'attribute'=>'ActualReturn',
					'language' => 'ja',
					'i18nScriptFile' => 'jquery.ui.datepicker-en.js',
					//'mode'=>'datetime',
					'htmlOptions' => array(
						'id' => 'ActualReturn_filter',
					),
					'options'=>array(
						'showOn' => 'focus',
						'dateFormat' => 'dd-mm-yy',
						'showOtherMonths' => true,
						'selectOtherMonths' => true,
						'changeMonth' => true,
						'changeYear' => true,
						'showButtonPanel' => true,
					),
				), true),
			);
			$this->defaultColumns[] = 'LateDays';
			$this->defaultColumns[] = 'PenaltyDaily';
			$this->defaultColumns[] = 'PenaltyAmount';
			$this->defaultColumns[] = 'LoanSource';
			$this->defaultColumns[] = 'ReturnSource';
			$this->defaultColumns[] = 'LoanStatus';
			if(!isset($_GET['type'])) {
				$this->defaultColumns[] = array(
					'name' => 'Paid',
					'value' => 'Utility::getPublish(Yii::app()->controller->createUrl("Paid",array("id"=>$data->)), $data->Paid, 1)',
					'htmlOptions' => array(
						'class' => 'center',
					),
					'filter'=>array(
						1=>Yii::t('phrase', 'Yes'),
						0=>Yii::t('phrase', 'No'),
					),
					'type' => 'raw',
				);
			}
			$this->defaultColumns[] = 'Collection_id';
			$this->defaultColumns[] = 'member_id';
		}
		parent::afterConstruct();
	}

	/**
	 * User get information
	 */
	public static function getInfo($id, $column=null)
	{
		if($column != null) {
			$model = self::model()->findByPk($id,array(
				'select' => $column
			));
			return $model->$column;
			
		} else {
			$model = self::model()->findByPk($id);
			return $model;			
		}
	}

	/**
	 * before validate attributes
	 */
	/*
	protected function beforeValidate() {
		if(parent::beforeValidate()) {
			// Create action
		}
		return true;
	}
	*/

	/**
	 * after validate attributes
	 */
	/*
	protected function afterValidate()
	{
		parent::afterValidate();
			// Create action
		return true;
	}
	*/
	
	/**
	 * before save attributes
	 */
	/*
	protected function beforeSave() {
		if(parent::beforeSave()) {
			//$this->LoanDate = date('Y-m-d', strtotime($this->LoanDate));
			//$this->DueDate = date('Y-m-d', strtotime($this->DueDate));
			//$this->ActualReturn = date('Y-m-d', strtotime($this->ActualReturn));
		}
		return true;	
	}
	*/
	
	/**
	 * After save attributes
	 */
	/*
	protected function afterSave() {
		parent::afterSave();
		// Create action
	}
	*/

	/**
	 * Before delete attributes
	 */
	/*
	protected function beforeDelete() {
		if(parent::beforeDelete()) {
			// Create action
		}
		return true;
	}
	*/

	/**
	 * After delete attributes
	 */
	/*
	protected function afterDelete() {
		parent::afterDelete();
		// Create action
	}
	*/

}