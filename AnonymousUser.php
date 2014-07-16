<?php

namespace simonmesmith\anonymoususer;
use simonmesmith\anonymoususer\models;
use Yii;

class AnonymousUser extends \yii\base\component
{

	/**
	 * @var integer $id the ID of the anonymous user.
	 */
	private $id = null;

	/**
	 * @var datetime $created the date the entry was created.
	 */
	private $created = null;

	/**
	 * @var string $ip_address the IP address of the anonymous user entry.
	 */
	private $ip_address = null;
	
	/**
	 * Sets properties.
	 * @return void (sets properties).
	 */
	private function getAnonymousUser(){
		$anonymousUserId = $this->getCookie(); // Attempt to get an anonymous user ID cookie
		if($anonymousUserId){ // If we found an anonymous user ID in the cookie...
			$model = AnonymousUser::find()->where('id=:id', 'id' => $anonymousUserId); // Get the data for the existing anonymous user
		}else{ // If we found no anonymous user ID cookie...
			$model = new AnonymousUser; // Create a new anonymous user object
			$model->ip_address = Yii::$app->request->getUserIP(); // Add the IP address
			$model->created = date("Y-m-d H:i:s"); // Add the created value
			$model->save(); // Save the model
			$this->setCookie($model); // Set a cookie with the model data
		}
		$this->id = $model->id; // Set the id property
		$this->created = $model->created; // Set the created property
		$this->ip_address = $model->ip_address; // Set the ip_address property
	}

	/**
	 * Sets a cookie with the anonymous user ID.
	 * @var integer $id the ID of the anonymous user.
	 * @todo make cookie expiration a public property that can be set in the configuration file.
	 * @return void
	 */
	private function setCookie($model){
		$options['name'] = 'anonymous_user_id';
		$options['value'] = $model->id;
		$options['expire'] = time()+60*60*24*365;
		$cookie = new \yii\web\Cookie($options);
		Yii::$app->response->cookies->add($cookie); 
	}

	/**
	 * Attempts to get a cookie with the anonymous user ID.
	 * @return integer the anonymous user ID.
	 */
	private function getCookie(){
		$anonymousUserId = null;
		$cookie = Yii::$app->request->cookies->getValue('anonymous_user_id');
		if(isset($cookie)){
			$anonymousUserId = $cookie->value;
		}
		return($anonymousUserId);	
	}

	/**
	 * Magic method for getting property values.
	 * @var mixed the name of the property for which to retrieve data.
	 * @return mixed the value of the specified property.
	 */
	public function __get($property) {
		if (property_exists($this, $property)) {
			$this->getAnonymousUser(); // Get the anonymous user data
			return $this->$property; // Return the anonymous user data
		}
	}

}
