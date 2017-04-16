<?php
/**
 * SsoUtility class file
 *
 * Contains many function that most used :
 *
 * @author Putra Sudaryanto <putra@sudaryanto.id>
 * @created date 3 Juny 2016, 18:56 WIB
 * @version 1.0
 * @copyright Copyright (c) 2016 Ommu Platform (opensource.ommu.co)
 * @link http://company.ommu.co
 * @contect (+62)856-299-4114
 *
 */

class SsoUtility
{
	/**
	 * get alternatif connected domain for inlis sso server
	 * @param type $operator not yet using
	 * @return type
	 */
	public static function getConnected() {
		if(Yii::app()->params['sso_server_options']['default'] == true)
			$connectedUrl = Yii::app()->params['sso_server_options']['default_host'];
		
		else {
			$ssoServerOptions = Yii::app()->params['sso_server_options']['all'];
			$connectedUrl = 'neither-connected';
			
			foreach($ssoServerOptions as $val) {
				if(self::isServerAvailible($val)) {
					$connectedUrl = $val;
					break;
				}
			}
			file_put_contents('assets/sso_server_actived.txt', $connectedUrl);			
		}

		return $connectedUrl;
	}

	//returns true, if domain is availible, false if not
	public static function isServerAvailible($domain) 
	{
		if(Yii::app()->params['sso_server_options']['status'] == true) {
			//check, if a valid url is provided
			if (!filter_var($domain, FILTER_VALIDATE_URL))
				return false;

			//initialize curl
			$curlInit = curl_init($domain);
			curl_setopt($curlInit,CURLOPT_CONNECTTIMEOUT,10);
			curl_setopt($curlInit,CURLOPT_HEADER,true);
			curl_setopt($curlInit,CURLOPT_NOBODY,true);
			curl_setopt($curlInit,CURLOPT_RETURNTRANSFER,true);

			//get answer
			$response = curl_exec($curlInit);
			curl_close($curlInit);
			if($response)
				return true;

			return false;
			
		} else
			return false;
	}

	//returns true, if domain is availible, false if not
	public static function API($function, $methods, $data=array())
	{
		$i=0;
		$arrayMethods = Utility::formatFileType($methods, true, ',');
		$countMethods = count($arrayMethods);
		
		$object = $function;
		foreach($arrayMethods as $value) {
			$i++;
			
			if(!empty($data)) {
				if($i == $countMethods)
					$object = $object->$value($data);
				else
					$object = $object->$value();
				
			} else
				$object = $object->$value();
		}
		return $object;
	}

	//returns true, if domain is availible, false if not
	public static function getKeyVal($array, $a, $b)
	{
		$items = array();
		if(!empty($array)) {
			foreach($array as $val) {
				$items[$val[$a]] = $val[$b];
			}
			return $items;
		} else {
			return false;
		}
	}
}
