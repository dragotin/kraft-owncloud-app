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

use \OCP\AppFramework\Http\TemplateResponse;

class ViewController extends Controller {


	/**
	 * @param Request $request: an instance of the request
	 * @param API $api: an api wrapper instance
	 */
	public function __construct(IAppContainer $app, IRequest $request, ItemMapper $itemMapper){
		parent::__construct($app, $request);
		$this->itemMapper = $itemMapper;
	}


	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 */
	public function index(){
		$coreAPI = $this->app->getCoreApi();
		// your own stuff
		$coreAPI->addStyle('style');
		$coreAPI->addScript('app');

		$response = new TemplateResponse('kraft', 'main');
		$kraft_doc_path = "/Kraft";
		$kraft_docs = array();
		//$files = \OC\Files\Filesystem::getDirectoryContent($kraft_doc_path);
		//$kraft_docs = array();
		//foreach( $files as $file ) {
		    // $url = $cache->getId( $kraft_doc_path . '/' . $file['name'] );
		    // $entry = array('url' => $url, 'name' => $file['name'] );
		    //$kraft_docs[] = $kraft_docs;
    	//}
    	//
		$response->setParams(array(
			'kraft_doc_path' => $kraft_doc_path,
			'docs' => $kraft_docs
		));

		return $response;
	}
}