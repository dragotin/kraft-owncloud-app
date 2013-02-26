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
use OCA\AppFramework\Db\DoesNotExistException;
use OCA\AppFramework\Http\RedirectResponse;

use OCA\Kraft\Db\Item;


class ItemController extends Controller {
	

	/**
	 * @param Request $request: an instance of the request
	 * @param API $api: an api wrapper instance
	 * @param ItemMapper $itemMapper: an itemwrapper instance
	 */
	public function __construct($api, $request, $itemMapper){
		parent::__construct($api, $request);
		$this->itemMapper = $itemMapper;
	}


	/**
	 * @CSRFExemption
	 * @IsAdminExemption
	 * @IsSubAdminExemption
	 *
	 * Redirects to the index page
	 */
	public function redirectToIndex(){
		$url = $this->api->linkToRoute('kraft_index');
		return new RedirectResponse($url);
	}


	/**
	 * @CSRFExemption
	 * @IsAdminExemption
	 * @IsSubAdminExemption
	 *
	 * @brief renders the index page
	 * @return an instance of a Response implementation
	 */
	public function index(){
		// thirdparty stuff
		$this->api->add3rdPartyScript('angular/angular');

		// your own stuff
		$this->api->addStyle('style');
		$this->api->addScript('app');
		
		//get all available kraft documents
		//$kraft_doc_path = "/Kraft";
		//$files = \OC\Files\Filesystem::getDirectoryContent($kraft_doc_path);
		//$kraft_docs = array();
		//foreach( $files as $file ) {
		    // $url = $cache->getId( $kraft_doc_path . '/' . $file['name'] );
		    // $entry = array('url' => $url, 'name' => $file['name'] );
		    //$kraft_docs[] = $kraft_docs;
    	//}
    	//
		//$tmpl->assign( 'kraft_doc_path', $kraft_doc_path);
		//$tmpl->assign( 'docs', $kraft_docs );

		return $this->render('main', array());
	}



	/**
	 * @Ajax
	 *
	 * @brief sets a global system value
	 * @param array $urlParams: an array with the values, which were matched in 
	 *                          the routes file
	 */
	public function setSystemValue(){
		$value = $this->params('somesetting');
		$this->api->setSystemValue('somesetting', $value);

		$params = array(
			'somesetting' => $value
		);

		return $this->renderJSON($params);
	}

	/**
	 * @Ajax
	 */
	public function getSystemValue(){
		$value = $this->api->getSystemValue('somesetting');

		$params = array(
			'somesetting' => $value
		);

		return $this->renderJSON($params);
	}
	
	/**
	 * todo - add doc
	 * @CSRFExemption
	 */ 
	public function handleRemoteRequest(){
		$cmd = $this->params('cmd');
		$doctype = $this->params('doctype');
		var_dump($cmd);
		var_dump($doctype);
	}
}
