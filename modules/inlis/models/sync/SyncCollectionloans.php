<?php
/**
 * SyncCollectionloans
 * version: 0.0.1
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 11 April 2016, 15:25 WIB
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
 * This is the model class for table "collectionloans".
 *
 * The followings are the available columns in table 'collectionloans':
 * @property string $ID
 * @property integer $CollectionCount
 * @property integer $LateCount
 * @property integer $ExtendCount
 * @property integer $LoanCount
 * @property integer $ReturnCount
 * @property double $Member_id
 * @property integer $Branch_id
 * @property string $CreateBy
 * @property string $CreateDate
 * @property string $CreateTerminal
 * @property string $UpdateBy
 * @property string $UpdateDate
 * @property string $UpdateTerminal
 * @property string $SENAYAN_ID
 *
 * The followings are the available model relations:
 * @property Collectionloanitems[] $collectionloanitems
 * @property Members $member
 * @property Branchs $branch
 */
class SyncCollectionloans extends OActiveRecord
{
	public $defaultColumns = array();

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SyncCollectionloans the static model class
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
		return self::getAdvertDbConnection();
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		preg_match("/dbname=([^;]+)/i", $this->dbConnection->connectionString, $matches);
		return $matches[1].'.collectionloans';
		//return 'collectionloans';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID', 'required'),
			array('CollectionCount, LateCount, ExtendCount, LoanCount, ReturnCount, Branch_id', 'numerical', 'integerOnly'=>true),
			array('Member_id', 'numerical'),
			array('ID', 'length', 'max'=>255),
			array('CreateBy, CreateTerminal, UpdateBy, UpdateTerminal', 'length', 'max'=>100),
			array('SENAYAN_ID', 'length', 'max'=>45),
			array('CreateDate, UpdateDate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID, CollectionCount, LateCount, ExtendCount, LoanCount, ReturnCount, Member_id, Branch_id, CreateBy, CreateDate, CreateTerminal, UpdateBy, UpdateDate, UpdateTerminal, SENAYAN_ID', 'safe', 'on'=>'search'),
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
			'member' => array(self::BELONGS_TO, 'SyncMembers', 'Member_id'),
			'loanitems' => array(self::HAS_MANY, 'SyncCollectionloanitems', 'CollectionLoan_id'),
			//'branch_relation' => array(self::BELONGS_TO, 'Branchs', 'Branch_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => Yii::t('attribute', 'ID'),
			'CollectionCount' => Yii::t('attribute', 'Collection Count'),
			'LateCount' => Yii::t('attribute', 'Late Count'),
			'ExtendCount' => Yii::t('attribute', 'Extend Count'),
			'LoanCount' => Yii::t('attribute', 'Loan Count'),
			'ReturnCount' => Yii::t('attribute', 'Return Count'),
			'Member_id' => Yii::t('attribute', 'Member'),
			'Branch_id' => Yii::t('attribute', 'Branch'),
			'CreateBy' => Yii::t('attribute', 'Create By'),
			'CreateDate' => Yii::t('attribute', 'Create Date'),
			'CreateTerminal' => Yii::t('attribute', 'Create Terminal'),
			'UpdateBy' => Yii::t('attribute', 'Update By'),
			'UpdateDate' => Yii::t('attribute', 'Update Date'),
			'UpdateTerminal' => Yii::t('attribute', 'Update Terminal'),
			'SENAYAN_ID' => Yii::t('attribute', 'Senayan'),
		);
		/*
			'ID' => 'ID',
			'Collection Count' => 'Collection Count',
			'Late Count' => 'Late Count',
			'Extend Count' => 'Extend Count',
			'Loan Count' => 'Loan Count',
			'Return Count' => 'Return Count',
			'Member' => 'Member',
			'Branch' => 'Branch',
			'Create By' => 'Create By',
			'Create Date' => 'Create Date',
			'Create Terminal' => 'Create Terminal',
			'Update By' => 'Update By',
			'Update Date' => 'Update Date',
			'Update Terminal' => 'Update Terminal',
			'Senayan' => 'Senayan',
		
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

		$criteria->compare('t.ID',strtolower($this->ID),true);
		$criteria->compare('t.CollectionCount',$this->CollectionCount);
		$criteria->compare('t.LateCount',$this->LateCount);
		$criteria->compare('t.ExtendCount',$this->ExtendCount);
		$criteria->compare('t.LoanCount',$this->LoanCount);
		$criteria->compare('t.ReturnCount',$this->ReturnCount);
		if(isset($_GET['Member']))
			$criteria->compare('t.Member_id',$_GET['Member']);
		else
			$criteria->compare('t.Member_id',$this->Member_id);
		if(isset($_GET['Branch']))
			$criteria->compare('t.Branch_id',$_GET['Branch']);
		else
			$criteria->compare('t.Branch_id',$this->Branch_id);
		$criteria->compare('t.CreateBy',strtolower($this->CreateBy),true);
		if($this->CreateDate != null && !in_array($this->CreateDate, array('0000-00-00 00:00:00', '0000-00-00')))
			$criteria->compare('date(t.CreateDate)',date('Y-m-d', strtotime($this->CreateDate)));
		$criteria->compare('t.CreateTerminal',strtolower($this->CreateTerminal),true);
		$criteria->compare('t.UpdateBy',strtolower($this->UpdateBy),true);
		if($this->UpdateDate != null && !in_array($this->UpdateDate, array('0000-00-00 00:00:00', '0000-00-00')))
			$criteria->compare('date(t.UpdateDate)',date('Y-m-d', strtotime($this->UpdateDate)));
		$criteria->compare('t.UpdateTerminal',strtolower($this->UpdateTerminal),true);
		$criteria->compare('t.SENAYAN_ID',strtolower($this->SENAYAN_ID),true);

		if(!isset($_GET['SyncCollectionloans_sort']))
			$criteria->order = 't.ID DESC';

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
			//$this->defaultColumns[] = 'ID';
			$this->defaultColumns[] = 'CollectionCount';
			$this->defaultColumns[] = 'LateCount';
			$this->defaultColumns[] = 'ExtendCount';
			$this->defaultColumns[] = 'LoanCount';
			$this->defaultColumns[] = 'ReturnCount';
			$this->defaultColumns[] = 'Member_id';
			$this->defaultColumns[] = 'Branch_id';
			$this->defaultColumns[] = 'CreateBy';
			$this->defaultColumns[] = 'CreateDate';
			$this->defaultColumns[] = 'CreateTerminal';
			$this->defaultColumns[] = 'UpdateBy';
			$this->defaultColumns[] = 'UpdateDate';
			$this->defaultColumns[] = 'UpdateTerminal';
			$this->defaultColumns[] = 'SENAYAN_ID';
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
			$this->defaultColumns[] = 'CollectionCount';
			$this->defaultColumns[] = 'LateCount';
			$this->defaultColumns[] = 'ExtendCount';
			$this->defaultColumns[] = 'LoanCount';
			$this->defaultColumns[] = 'ReturnCount';
			$this->defaultColumns[] = 'Member_id';
			$this->defaultColumns[] = 'Branch_id';
			$this->defaultColumns[] = 'CreateBy';
			$this->defaultColumns[] = array(
				'name' => 'CreateDate',
				'value' => 'Utility::dateFormat($data->CreateDate)',
				'htmlOptions' => array(
					'class' => 'center',
				),
				'filter' => Yii::app()->controller->widget('zii.widgets.jui.CJuiDatePicker', array(
					'model'=>$this,
					'attribute'=>'CreateDate',
					'language' => 'ja',
					'i18nScriptFile' => 'jquery.ui.datepicker-en.js',
					//'mode'=>'datetime',
					'htmlOptions' => array(
						'id' => 'CreateDate_filter',
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
			$this->defaultColumns[] = 'CreateTerminal';
			$this->defaultColumns[] = 'UpdateBy';
			$this->defaultColumns[] = array(
				'name' => 'UpdateDate',
				'value' => 'Utility::dateFormat($data->UpdateDate)',
				'htmlOptions' => array(
					'class' => 'center',
				),
				'filter' => Yii::app()->controller->widget('zii.widgets.jui.CJuiDatePicker', array(
					'model'=>$this,
					'attribute'=>'UpdateDate',
					'language' => 'ja',
					'i18nScriptFile' => 'jquery.ui.datepicker-en.js',
					//'mode'=>'datetime',
					'htmlOptions' => array(
						'id' => 'UpdateDate_filter',
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
			$this->defaultColumns[] = 'UpdateTerminal';
			$this->defaultColumns[] = 'SENAYAN_ID';
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

}