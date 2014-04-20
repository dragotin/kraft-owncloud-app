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
use \OCP\IRequest;

use \OCA\Kraft\Db\Item;
use \OCA\Kraft\Db\ItemMapper;

class ItemController extends Controller {
	

	/**
	 * @param Request $request: an instance of the request
	 * @param API $api: an api wrapper instance
	 * @param ItemMapper $itemMapper: an itemwrapper instance
	 */
	public function __construct(IAppContainer $app, IRequest $request, ItemMapper $itemMapper){
		parent::__construct($app, $request);
		$this->itemMapper = $itemMapper;
	}

	
	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 */
	public function handleRemoteRequest(){
		$cmd = $this->params('cmd');
		$doctype = $this->params('doctype');
		var_dump($cmd);
		var_dump($doctype);
	}
}
