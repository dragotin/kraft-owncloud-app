<?php
/**
 * Copyright (c) 2013 Klaas Freitag
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */
OCP\App::addNavigationEntry( array( 
	'id' => 'kraft',
	'order' => 11,
	'href' => OCP\Util::linkToRoute( 'kraft_index' ),
	'icon' => OCP\Util::imagePath( 'kraft', 'kraft.png' ),
	'name' => 'Kraft'
));
