<?php
/**
 * Copyright (c) 2014 Georg Ehrke <oc.list@georgehrke.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */
namespace OCA\Kraft;

use \OCP\AppFramework\IAppContainer;

use \OCA\Kraft\Controller\ItemController;
use \OCA\Kraft\Controller\SettingsController;
use \OCA\Kraft\Controller\ViewController;

use \OCA\Kraft\Db\ItemMapper;

class App extends \OCP\AppFramework\App {

	public function __construct($params = array()) {
		parent::__construct('kraft', $params);

		/** 
		 * CONTROLLERS
		 */
		$this->getContainer()->registerService('ItemController', function(IAppContainer $c) {
			$reg = $c->query('Request');
			$imp = $c->query('ItemMapper');

			return new ItemController($c, $reg, $imp);
		});

		$this->getContainer()->registerService('SettingsController', function(IAppContainer $c) {
			$reg = $c->query('Request');

			return new SettingsController($c, $reg);
		});

		$this->getContainer()->registerService('ViewController', function(IAppContainer $c) {
			$reg = $c->query('Request');
			$imp = $c->query('ItemMapper');

			return new ViewController($c, $reg, $imp);
		});

		/**
		 * MAPPERS
		 */
		$this->getContainer()->registerService('ItemMapper', function(IAppContainer $c) {
			return new ItemMapper($c);
		});
	}
}