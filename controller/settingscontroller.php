<?php
/**
 * Copyright (c) 2013 Klaas Freitag
 * Copyright (c) 2013 Georg Ehrke
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OCA\Kraft\Controller;

use \OCP\Appframework\IAppContainer;
use \OCP\AppFramework\Controller;

class SettingsController extends Controller {

	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 */
	public function index(){
		//$this->api->addScript('admin');
		
		$templateName = 'settings';
		$params = array(
			'url' => '',//$this->api->getSystemValue('somesetting')
		);

		return $this->render($templateName, $params, 'blank');
	}
}