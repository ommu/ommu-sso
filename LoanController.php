<?php
/**
 * LoanController
 * @var $this LoanController
 * @var $model InlisViews
 * @var $form CActiveForm
 * version: 0.0.1
 * Reference start
 *
 * TOC :
 *	Index
 *	Popular
 *
 *	LoadModel
 *	performAjaxValidation
 *
 * @author Putra Sudaryanto <putra.sudaryanto@gmail.com>
 * @copyright Copyright (c) 2016 Ommu Platform (ommu.co)
 * @created date 3 April 2016, 14:23 WIB
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 *
 *----------------------------------------------------------------------------------------------------------
 */

class LoanController extends Controller
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
				'actions'=>array('index','popular'),
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
	public function actionPopular()
	{
		if(Yii::app()->request->isPostRequest) 
		{
			$type = trim($_POST['type']);
			$query = trim($_POST['query']);
			
			$criteria=new CDbCriteria;
			$criteria->with = array(
				'collection' => array(
					'alias'=>'collection',
				),
			);
			$criteria->select = array('Collection_id, collection.Catalog_id as Catalog_id','COUNT(CollectionLoan_id) as loans');
			$criteria->together = true;
			$criteria->distinct = true;
			$criteria->group = 'collection.Catalog_id';
			$criteria->order = 'loans DESC';
			
			$dataProvider = new CActiveDataProvider('SyncCollectionloanitems', array(
				'criteria'=>$criteria,
				'pagination'=>array(
					'pageSize'=>(($query == null && $query == '') || $query != 'small') ? 20 : 6,
					
				),
			));
			$model = $dataProvider->getData();
			
			$data = '';
			if(!empty($model)) {
				$i=0-1;
				foreach($model as $key => $item) {					
					$i++;
					$data[$i] = array(
						'catalog_id'=>$item->collection->Catalog_id,
						'loans'=>$item->loans,
						'title'=>$item->collection->catalog->Title != null && $item->collection->catalog->Title != '' ? $item->collection->catalog->Title : '-',
						'author'=>$item->collection->catalog->Author != null && $item->collection->catalog->Author != '' ? $item->collection->catalog->Author : '-',
						'publish_year'=>$item->collection->catalog->PublishYear != null && $item->collection->catalog->PublishYear != '' ? $item->collection->catalog->PublishYear : '-',
					);
					if(($query == null && $query == '') || $query != 'small') {
						$data[$i]['publisher'] = $item->collection->catalog->Publisher != null && $item->collection->catalog->Publisher != '' ? $item->collection->catalog->Publisher : '-';
						$data[$i]['publish_location'] = $item->collection->catalog->PublishLocation != null && $item->collection->catalog->PublishLocation != '' ? $item->collection->catalog->PublishLocation : '-';
						$data[$i]['subject'] = $item->collection->catalog->Subject != null && $item->collection->catalog->Subject != '' ? $item->collection->catalog->Subject : '-';
					} else {
						$path = '/uploaded_files/sampul_koleksi/original/'.$item->collection->catalog->worksheet->Name;
						$cover = Yii::app()->params['inlis_address'].$path.'/'.$item->collection->catalog->CoverURL;
						$data[$i]['cover'] = $item->collection->catalog->CoverURL != null && $item->collection->catalog->CoverURL != '' ? (file_exists($cover) ? $cover : '-') : '-';
					}
				}
			} else
				$data = array();
		
			$pager = OFunction::getDataProviderPager($dataProvider);
			$get = array_merge($_GET, array($pager['pageVar']=>$pager['nextPage']));
			$nextPager = $pager['nextPage'] != 0 ? OFunction::validHostURL(Yii::app()->controller->createUrl('popular', $get)) : '-';
			$return = array(
				'data' => $data,
				'pager' => $pager,
				'nextPager' => $nextPager,
			);
				
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
		$model = SyncCollectionloans::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='inlis-views-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
