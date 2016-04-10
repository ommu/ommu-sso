<?php
/**
 * CollectionController
 * @var $this CollectionController
 * @var $model SyncCollections
 * @var $form CActiveForm
 * version: 0.0.1
 * Reference start
 *
 * TOC :
 *	Index
 *	List
 *	Detail
 *
 *	LoadModel
 *	performAjaxValidation
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 30 March 2016, 13:41 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 *
 *----------------------------------------------------------------------------------------------------------
 */

class CollectionController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/column2';
	public $defaultAction = 'index';

	/**
	 * @return array action filters
	 */
	public function filters() 
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			//'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules() 
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','list','detail'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array(),
				'users'=>array('@'),
				'expression'=>'isset(Yii::app()->user->level)',
				//'expression'=>'isset(Yii::app()->user->level) && (Yii::app()->user->level != 1)',
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array(),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	/**
	 * Lists all models.
	 */
	public function actionIndex() 
	{
		$this->redirect(Yii::app()->createUrl('site/index'));
	}
	
	/**
	 * Lists all models.
	 */
	public function actionList()
	{
		if(Yii::app()->request->isPostRequest) {
			$id = trim($_POST['id']);
			
			$criteria=new CDbCriteria;
			$criteria->select = array('ID','Title','Catalog_id','Location_id','Worksheet_id','Status');
			$criteria->compare('t.Catalog_id',$id);

			/*
			$dataProvider = new CActiveDataProvider('SyncCollections', array(
				'criteria'=>$criteria,
				'pagination'=>array(
					'pageSize'=>20,
				),
			));			
			$model = $dataProvider->getData();
			*/
			$model = SyncCollections::model()->findAll($criteria);
			
			$data = '';
			if(!empty($model)) {
				foreach($model as $key => $item) {
					$data[] = array(
						'id'=>$item->ID,
						'title'=>$item->Title != null && $item->Title != '' ? $item->Title : '-',
						//'author'=>$item->Author != null || $item->Author != '' ? $item->Author : ($item->AuthorAdded != null || $item->AuthorAdded != '' ? $item->AuthorAdded : ($item->catalog->Author != null && $item->catalog->Author != '' ? $item->catalog->Author : '-')),
						//'publisher'=>$item->Publisher != null && $item->Publisher != '' ? $item->Publisher : ($item->catalog->Publisher != null && $item->catalog->Publisher != '' ? $item->catalog->Publisher : '-'),
						//'publish_location'=>$item->PublishLocation != null && $item->PublishLocation != '' ? $item->PublishLocation : ($item->catalog->PublishLocation != null && $item->catalog->PublishLocation != '' ? $item->catalog->PublishLocation : '-'),
						//'publish_year'=>$item->PublishYear != null && $item->PublishYear != '' ? $item->PublishYear : ($item->catalog->PublishYear != null && $item->catalog->PublishYear != '' ? $item->catalog->PublishYear : '-'),
						//'isbn'=>$item->ISBN != null || $item->ISBN != '' ? $item->ISBN : ($item->catalog->ISBN != null && $item->catalog->ISBN != '' ? $item->catalog->ISBN : '-'),
						'location'=>$item->location->Name,
						//'worksheet'=>$item->Worksheet_id != null || $item->Worksheet_id != '' ? $item->worksheet->Name : ($item->catalog->Worksheet_id != null || $item->catalog->Worksheet_id != '' ? $item->catalog->worksheet->Name : '-'),
						'status'=>$item->Status != null && $item->Status != '' ? strtoupper($item->Status) : '-',
					);
				}
			} else
				$data = array();
		
			/*
			$pager = OFunction::getDataProviderPager($dataProvider);
			$get = array_merge($_GET, array($pager['pageVar']=>$pager['nextPage']));
			$nextPager = $pager['nextPage'] != 0 ? OFunction::validHostURL(Yii::app()->controller->createUrl('list', $get)) : '-';
			$return = array(
				'data' => $data,
				'pager' => $pager,
				'nextPager' => $nextPager,
			);
			*/
				
			echo CJSON::encode($data);
			
		} else 
			$this->redirect(Yii::app()->createUrl('site/index'));
	}
	
	/**
	 * Lists all models.
	 */
	public function actionDetail()
	{
		if(Yii::app()->request->isPostRequest) {
			$id = trim($_POST['id']);
			
			$model=$this->loadModel($id);
			
			if(!empty($model)) {
				$return = array(
					'success'=>'1',
					'id'=>$model->ID,
					'title'=>$model->Title != null && $model->Title != '' ? $model->Title : '-',
					'author'=>$model->Author != null || $model->Author != '' ? $model->Author : ($model->AuthorAdded != null || $model->AuthorAdded != '' ? $model->AuthorAdded : ($model->catalog->Author != null && $model->catalog->Author != '' ? $model->catalog->Author : '-')),
					'publisher'=>$model->Publisher != null && $model->Publisher != '' ? $model->Publisher : ($model->catalog->Publisher != null && $model->catalog->Publisher != '' ? $model->catalog->Publisher : '-'),
					'publish_location'=>$model->PublishLocation != null && $model->PublishLocation != '' ? $model->PublishLocation : ($model->catalog->PublishLocation != null && $model->catalog->PublishLocation != '' ? $model->catalog->PublishLocation : '-'),
					'publish_year'=>$model->PublishYear != null && $model->PublishYear != '' ? $model->PublishYear : ($model->catalog->PublishYear != null && $model->catalog->PublishYear != '' ? $model->catalog->PublishYear : '-'),
					'isbn'=>$model->ISBN != null || $model->ISBN != '' ? $model->ISBN : ($model->catalog->ISBN != null && $model->catalog->ISBN != '' ? $model->catalog->ISBN : '-'),
					'location'=>$model->location->Name,
					'worksheet'=>$model->Worksheet_id != null || $model->Worksheet_id != '' ? $model->worksheet->Name : ($model->catalog->Worksheet_id != null || $model->catalog->Worksheet_id != '' ? $model->catalog->worksheet->Name : '-'),
					'status'=>$model->Status != null && $model->Status != '' ? strtoupper($model->Status) : '-',
				);
			} else {
				$return = array(
					'success'=>'0',
					'error'=>'NULL',
					'message'=>'error, collection tidak ditemukan',
				);
			}				
			echo CJSON::encode($return);
			
		} else 
			$this->redirect(Yii::app()->createUrl('site/index'));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id) 
	{
		$model = SyncCollections::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404, Yii::t('phrase', 'The requested page does not exist.'));
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model) 
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='sync-collections-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
