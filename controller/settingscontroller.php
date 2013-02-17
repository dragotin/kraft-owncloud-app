<?php
/**
 * Copyright (c) 2013 Klaas Freitag
 * Copyright (c) 2013 Georg Ehrke
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OCA\Kraft\Controller;

use OCA\AppFramework\Controller\Controller;

class SettingsController extends Controller {
	

	/**
	 * @param Request $request: an instance of the request
	 * @param API $api: an api wrapper instance
	 */
	public function __construct($api, $request){
		parent::__construct($api, $request);
	}


	/**
	 * @CSRFExemption 
	 *
	 * @brief renders the settings page
	 * @param array $urlParams: an array with the values, which were matched in 
	 *                          the routes file
	 */
	public function index(){
		$this->api->addScript('admin');
		
		$templateName = 'settings';
		$params = array(
			'url' => $this->api->getSystemValue('somesetting')
		);

		return $this->render($templateName, $params, 'blank');
	}

}