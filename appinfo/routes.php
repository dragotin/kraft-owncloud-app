<?php
/**
 * Copyright (c) 2013 Klaas Freitag
 * Copyright (c) 2013 Georg Ehrke
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OCA\Kraft;

use \OCA\AppFramework\App;

use \OCA\Kraft\DependencyInjection\DIContainer;


/*************************
 * Define your routes here
 ************************/

/**
 * Normal Routes
 */
$this->create('kraft_index', '/')->action(
	function($params){
		App::main('ItemController', 'index', $params, new DIContainer());
	}
);

$this->create('kraft_index_redirect', '/redirect')->action(
	function($params){
		App::main('ItemController', 'redirectToIndex', $params, new DIContainer());
	}
);

/**
 * remote service
 */
$this->create('kraft_remote', '/r/{cmd}/{doctype}/')->action(
	function($params){
		App::main('ItemController', 'handleRemoteRequest', $params, new DIContainer());
	}
);

$this->create('kraft_remote_no_params', '/r')->action(
	function($params){
		header('HTTP/1.1 418 I\'m a teapot');
		echo 'no parameters given';
		exit;
	}
);