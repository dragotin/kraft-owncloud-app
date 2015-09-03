<?php
/**
 * Copyright (c) 2013 Klaas Freitag
 * Copyright (c) 2013 Georg Ehrke
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */
$this->create('kraft_index', '/')->action(function($params){
	$app = new \OCA\Kraft\App($params);
	$app->dispatch('ViewController', 'index');
});

$this->create('kraft_remote', '/r/{cmd}/{doctype}/')->action(function($params){
	$app = new \OCA\Kraft\App($params);
	$app->dispatch('ItemController', 'handleRemoteRequest');
});